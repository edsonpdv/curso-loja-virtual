<?php 

defined('BASEPATH') OR exit('Ação não permitida');

class Home extends CI_Controller {


	public function __contruct() {
		parent:: __construct();

		//existe uma sessão?
		
		 if (!$this->ion_auth->logged_in()) {
      		redirect('restrita/login');
    	}
	}

	public function index() {

		$this->load->view('restrita/layout/header');
		$this->load->view('restrita/home/index');
		$this->load->view('restrita/layout/footer');
	}



}


