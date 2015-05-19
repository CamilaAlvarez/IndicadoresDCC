<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

    public function inicio(){

    	//$user= "17.586.757-0"; //SE va a recibir y se va a ir guardando como variable de sesion
    	$user= "18.292.316-8";
    	$this->load->model('Permits_model');
    	$permits = $this->Permits_model->getAllPermits($user);

        $this->load->model('Organization_model');
        $type = $this->input->get('sector');
		$department = $this->Organization_model->getDepartment();
		$areaunit = $this->showAreaUnit();
		if(is_null($type)){
			$type="Operación";
			$name=$type;
			$aus = $areaunit;
		    $areaunit = array();
    		foreach ($aus as $au){
    		    if ($au['area']->getType()==2)
    		        array_push($areaunit, $au);
    		}
		}
		else{
			$name = $type;
		    $type = $this->Organization_model->getTypeByName($type);
    		$aus = $areaunit;
		    $areaunit = array();
    		foreach ($aus as $au){
    		    if ($au['area']->getType()==$type['id'])
    		        array_push($areaunit, $au);
    		}
		}
		$types = $this->Organization_model->getTypes();

		//Colocar permisos de mayor a menor
		if($permits->getDirector()){
	    	$this->load->view('index', array('department'=> $department,
	        	                             'areaunit'=>$areaunit,
	            	                         'types'=>$types,
	                	                     'name' => $name,
	                	                     'user' => $user));
		}
		elseif($permits->getVisualizador()){
			$this->load->view('indexVisualizador', array('department'=> $department,
	        	                             			'areaunit'=>$areaunit,
	            	                         			'types'=>$types,
	                	                     			'name' => $name,
	                	                     			'user' => $user));
		}
	}

	

	private function getDepartment(){
			$this->load->model('Organization_model');
			$department = $this->Organization_model->getDepartment();
			return $department;

	}

	private function getType(){
			$this->load->model('Organization_model');
			$types = $this->Organization_model->getTypes();
			return $types;
	}


	private function showAreaUnit(){
		$this->load->model('Organization_model');
	    $department = $this->Organization_model->getDepartment();
	    $areaunit = array();
	    $areas = $this->Organization_model->getAllAreas();
	    foreach ($areas as $area){
	        array_push($areaunit, array('area' => $area,
	                                    'unidades' => $this->Organization_model->getAllUnidades($area->getId()))
	        );
	    }
		return $areaunit;	
	}

	public function dashboard()
	{	
		
		$id_unidad = $this->input->post("unidad");
	    $this->session->set_flashdata("unidad", $id_unidad);
	    //redirect('Dashboard/showDashboard');
	}

	public function validar()
	{
	    $this->load->view('validar');
	}
	public function menuConfigurar()
	{
	    $this->load->view('menu-configurar');
	}
	public function agregarDato()
	{
	    $this->load->view('add-data');
	}

	
	public function configurarDashboard()
	{
	    $this->load->view('configurar-dashboard');
	}
	public function configurarMetricas()
	{
		$department = $this->getDepartment();
		$areaunit = $this->showAreaUnit();
		$types = $this->getType();
		$this->load->model('Metrics_model');
		$metrics= $this->Metrics_model->getAllMetrics();
		//debug($metrics,true);
	    $this->load->view('configurar-metricas',array('department'=> $department,
	                                     				'areaunit'=>$areaunit,
	                                     				'types'=>$types,
														'metrics'=>$metrics));
	}
	
	public function agregarMetrica(){

		$this->load->model('Unit_model');
		$this->load->library('form_validation');
	    $this->form_validation->set_rules('unidad_medida', 'UnidadMedida', 'required');
	    $this->form_validation->set_rules('category', 'Category', 'required|numeric');
	    $this->form_validation->set_rules('name', 'Name', 'required');
	    $this->form_validation->set_rules('id_insert', 'Id', 'required|numeric');

	    if(!$this->form_validation->run()){
			redirect('inicio');
		}

	   	$Unit = array(		
				'name' => ucwords($this->input->post('unidad_medida')),
		);
    
		$Metricdata= array(
			'category' => $this->input->post('category'), //esto es 1 si es productividad y 2 si es finanzas. Tienes que agregar esos dos valores en la base de datos
														  // en la tabla catergory 
			'unit' =>  $this->Unit_model->checkName($Unit), //-> primero revisa si hay unidad de medida en la base de datos con ese nombre, si existe toma 
																	// el id correspondiente y le asocias a la metrica ese id ,si no agrega la unidad, obten
																	// el nuevo id y se lo asocias a la metrica
			'name' => ucwords($this->input->post('name')), //Nombre que tendrá la métrica//id de la unidad o area a la que se le quiere ingresar la metrica		
		);	
     	$this->load->model('Metrics_model');
   	 	$id_metric= $this->Metrics_model->addMetric($Metricdata);
		$this->load->model('Metorg_model');
		$metorg = array(
        	'org' => $this->input->post('id_insert'),
        	'metric' =>$id_metric
			);
		$this->Metorg_model->addMetOrg($metorg);
 	   	redirect('cmetrica');				
	}

	public function eliminarMetrica(){
		$this->load->model('Metrics_model');
		$this->load->library('form_validation');
	    $this->form_validation->set_rules('unidad', 'UnidadMedida', 'required');
	    $this->form_validation->set_rules('tipo', 'Type', 'required|numeric');
	    $this->form_validation->set_rules('metric', 'Metric', 'required');

	    if(!$this->form_validation->run()){
			redirect('inicio');
		}

		if($this->input->post('modificar')){
			$this->form_validation->set_rules('id', 'Id', 'required|numeric');

	    	if(!$this->form_validation->run()){
				redirect('inicio');
			}

			$data= array(
				'id_metorg' => $this->input->post('id'),
				'name_metrica' => ucwords($this->input->post('metrica')),
				'category' => $this->input->post('tipo'),
				'unidad_medida' => ucwords($this->input->post('unidad')) 		
			);
			$this->Metrics_model->updateMetric($data);
		}
		else{
			$this->form_validation->set_rules('id2', 'Id', 'required|numeric');

	    	if(!$this->form_validation->run()){
				redirect('inicio');
			}
			
			$data = array('id_metorg' => $this->input->post('id2'));
			$this->Metrics_model->deleteMetric($data);
		}
   	 	
    	redirect('cmetrica');
}
}
