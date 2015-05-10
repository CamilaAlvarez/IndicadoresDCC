<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

	public function inicio()
	{
	    $this->load->view('index');
	}

	public function dashboard()
	{
	    $this->load->view('dashboard');
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

	public function configurarAreasUnidades(){
	    $this->load->model('Organization_model');
	    $areaunit = array();
	    $areas = $this->Organization_model->getAllAreas();
	    foreach ($areas as $area){
	        array_push($areaunit, array('area' => $area, 
	                                    'unidades' => $this->Organization_model->getAllUnidades($area->getId()))
	                   );
	    }
	    $this->load->view('configurar-areas-unidades', array('areaunit'=>$areaunit));
	}
	public function configurarDashboard()
	{
	    $this->load->view('configurar-dashboard');
	}
	public function configurarMetricas()
	{
		$this->load->model('Metrics_model');
		$data['metrics'] = $this->Metrics_model->getAllMetrics();
	    $this->load->view('configurar-metricas',$data);
	}
	
	public function agregarMetrica(){
		$data= array(
			'category' => $this->input->post('type'), 
			'unit' => '1',
			'name' => $this->input->post('name'), 		
		);
     $this->load->model('Metrics_model');
   	 $this->Metrics_model->addMetric($data);
   	 $this->index();
		
		
		
	}

}