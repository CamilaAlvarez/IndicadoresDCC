<?php
class Metrics_model extends CI_Model{


	function addMetric($data){
		$this->db->insert('Metric', $data); 
		
	}

	function getAllMetrics(){
		$q = $this->db->get('Metric');
		
		if($q->num_rows() > 0){
			foreach ($q->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}


    function buildAllMetric($q){
        $me = array();
        foreach ($q->result() as $row){
            array_push($me, $this->buildMetric($row));
        }
        return $me;
    }

    function buildMetric($row){
        $this->load->library('Metrics_library');
        $parameters = array(
            'id' => $row->id,
            'category' => $row->category,
            'unit' => $row->unit,
            'name' => $row->name
        );        
        $me = new Metrics_library();        
        return $me->initialize($parameters);
    }

}