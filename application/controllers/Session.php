<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

    public function inicio()
	{
			$department = $this->getDepartment();
			$areaunit = $this->showAreaUnit();
			$types = $this->getType();
	    $this->load->view('index', array('department'=> $department,
	                                     'areaunit'=>$areaunit,
	                                     'types'=>$types));
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
	    $this->load->view('configurar-metricas',array('department'=> $department,
	                                     				'areaunit'=>$areaunit,
	                                     				'types'=>$types,
														'metrics'=>$metrics));
	}
	
	public function agregarMetrica(){
		 $this->load->model('Unit_model');
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
   	 $this->Metrics_model->addMetric($Metricdata);
		$this->load->model('Metorg_model');
		$metorg = array(
        'org' => ucwords($this->input->post('id_insert')),
			);
		 $this->Metorg_model->addMetOrg($metorg);
    $this->configurarMetricas();				
	}

	public function eliminarMetrica(){
		$this->load->model('Metrics_model');
		if($this->input->post('modificar')){
			$data= array(
				'id_metorg' => $this->input->post('id'),
				'name_metrica' => ucwords($this->input->post('metrica')),
				'category' => $this->input->post('tipo'),
				'unidad_medida' => ucwords($this->input->post('unidad')) 		
			);
			$this->Metrics_model->updateMetric($data);
		}
		else{
			debug($this->input->post('id2'),true);
			$data = array('id_metorg' => $this->input->post('id2'));
			$this->Metrics_model->deleteMetric($data);
		}
   	 	
    	$this->configurarMetricas();
}
}
