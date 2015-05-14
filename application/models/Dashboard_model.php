<?php
class Dashboard_model extends CI_Model
{

    function getAllMetrics($id)
    {
        $query = "SELECT mo.id AS id, met.name AS name
                    FROM MetOrg AS mo, Metric AS met, Organization AS org 
                    WHERE mo.metric=met.id AND mo.org =".$id." AND org.id =".$id;
        $q = $this->db->query($query);
        if($q->num_rows() > 0)
            return $this->buildAllMetrics($q);
        else
            return false;
    }

    function getAllMeasurements($id)
    {
        $query = "SELECT mo.id AS id FROM MetOrg AS mo WHERE mo.org=".$id;
        $q = $this->db->query($query);
        if(($size=$q->num_rows()) > 0){
            $rows = $q->result();
        
        
        $morgs = "";
        for($i=0; $i<$size-1; $i++){
            $id = $rows[$i]->id;
            $morgs = $morgs."metorg= ".$id." OR ";
        }
        $morgs = $morgs."metorg =".$rows[$size-1]->id.")";

        $query = "SELECT m.id AS id, m.metorg AS org, m.value AS val, m.target AS target, m.expected AS expected, m.year AS year
                    FROM Measure AS m
                    WHERE m.state=1 AND (".$morgs;

        $q = $this->db->query($query);
        if($q->num_rows() > 0)
            return $this->buildAllMeasuresments($q);
        else
            return false;
        }
        return false;
    }

    function getRoute($id){

        $aux=$id;
        $aux_id = 0;
        $i = 1;
        while(1){
            $query = "SELECT org.name AS name, org.parent AS parent FROM Organization AS org WHERE org.id =".$id;
            $q = $this->db->query($query);

            if($q->num_rows() > 0){
                $row = $q->result()[0];
            }

            $route[$i] = $row->name;

            $aux_id = $id;
            $id = $row->parent;

            if($aux_id==$id)
                break;
            
            $i++;
        }

        $query = "SELECT type.name AS name FROM Organization AS org, OrgType AS type WHERE org.type=type.id AND org.id =".$aux;
        $q = $this->db->query($query);

        if($q->num_rows() > 0){
            $row = $q->result()[0];
        }
        if($row->name!="")
            $route[$i]=$row->name;

        return $route;

    }

    function getAllMetricOrgIds($id){
        $this->load->library('Dashboard_library');
        $query = "SELECT metorg.id AS id FROM MetOrg AS metorg WHERE metorg.org =".$id;
        $q = $this->db->query($query);

        if($q->num_rows() > 0){
            foreach ($q->result() as $row){
                $parameters=  array(
                                'id' => $row->id
                            );  
            
            $id = new Dashboard_library();
            $id_array[] = $id->initializeIds($parameters);
            }
        }
        return $id_array;

    }

    function buildAllMetrics($q)  // Contruye y retorna el objeto persona
    {
        $this->load->library('Dashboard_library');
        $row = $q->result();
        foreach ($q->result() as $row)
        {
            $parameters = array
            (
                'id' => $row->id,
                'name' => $row->name
            );

            $metrica = new Dashboard_library();
            $metrica_array[] = $metrica->initialize($parameters);

        }

        return $metrica_array;
    }

    function buildAllMeasuresments($q)  // Contruye y retorna el objeto persona
    {
        $this->load->library('Dashboard_library');
        $row = $q->result();
        foreach ($q->result() as $row)
        {
            $parameters = array
            (
                'id' => $row->id,
                'metorg' => $row->org,
                'value' => $row->val,
                'target' => $row->target,
                'expected' => $row->expected,
                'year' => $row->year
            );

            $measurement = new Dashboard_library();
            $measurement_array[] = $measurement->initializeMeasurement($parameters);

        }

        return $measurement_array;
    }

    function insertData($id_met, $year, $value, $target, $expected, $user){ //Inserta datos en la tabla de mediciones

        $query = "INSERT INTO Measure (metorg, state, value, target, expected, year, updater, dateup) 
                    VALUES (?, 1, ?, ?, ? ,?, ?, NOW())";

        $q = $this->db->query($query, array($id_met, $value, $target, $expected, $year, $user)); 

        return $q;
    }

    function updateData($id_met, $year, $value, $target, $expected, $user){ //Aqui hay que guardar datos antiguos

        $query = " UPDATE Measure SET state = 0, value =? , target = ?, expected = ?, updater = ? , dateup = NOW()  
        WHERE metorg = ? AND year = ?";

        $q = $this->db->query($query, array($value, $target, $expected, $user, $id_met, $year)); 

        return $q;
    }


    function getDashboardMetrics($id)
    {
        $query = "SELECT d.id AS id FROM Dashboard AS d WHERE d.org=".$id;
        $q = $this->db->query($query);
        if($q->num_rows() > 0)
            $dashboard = $q->result()[0]->id;
        else
            return false;

        $query = "SELECT gd.graphic AS graph FROM GraphDash AS gd WHERE gd.dashboard=".$dashboard;
        $q = $this->db->query($query);
        if(($size=$q->num_rows()) > 0)
            $graphs = $q->result();
        else
            return false;
        
        $g_id = "";
        for($i=0; $i<$size-1; $i++){
            $id = $graphs[$i]->graph;
            $g_id = $g_id."g.id= ".$id." OR ";
        }
        $g_id = $g_id."g.id =".$graphs[$size-1]->graph;

        $query = "SELECT g.metorg AS org, g.type AS type, g.min_year AS min_year, g.max_year AS max_year
                    FROM Graphic AS g 
                    WHERE g.position<>0 AND ".$g_id;

        $q = $this->db->query($query);
        if($q->num_rows() > 0)
            return $this->buildDashboardMetrics($q);
        else
            return false;
    }

    function buildDashboardMetrics($q)  // Contruye y retorna el objeto persona
    {
        $this->load->library('Dashboard_library');
        $row = $q->result();
        foreach ($q->result() as $row)
        {
            $parameters = array
            (
                'met_org' => $row->org,
                'type' => $row->type,
                'min_year' => $row->min_year,
                'max_year' => $row->max_year
            );

            $metrica = new Dashboard_library();
            $metrica_array[] = $metrica->initializeDashboardMetrics($parameters);

        }

        return $metrica_array;
    }
   
    function getDashboardMeasurements($metorgs)
    {   
        foreach ($metorgs as $met) {
            $query = "SELECT m.metric AS metric FROM MetOrg AS m WHERE m.id= ".$met->getMetOrg();
            $q = $this->db->query($query);
            if(($size=$q->num_rows()) > 0)
                $metric = $q->result()[0]->metric;
            else 
                return false;

            $query = "SELECT m.name AS name FROM Metric AS m WHERE m.id=".$metric;
            $q = $this->db->query($query);
            if(($size=$q->num_rows()) > 0)
                $name = $q->result()[0]->name;
            else 
                return false;

            $query = "SELECT m.id AS id, m.metorg AS org, m.value AS val, m.target AS target, m.expected AS expected, m.year AS year
                    FROM Measure AS m
                    WHERE m.state=1 AND m.metorg=".$met->getMetOrg()." AND m.year>=".$met->getMinYear()." AND m.year<=".$met->getMaxYear();
            $q = $this->db->query($query);
            if(($size=$q->num_rows()) > 0){
                $rows = $this->buildAllMeasuresments($q);
                $result[] = array(
                                'id' => $met->getMetOrg(),
                                'name' => $name,
                                'measurements' => $rows
                                );
            }
            
        }
        
        return $result;
    }

}