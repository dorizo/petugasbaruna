<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			// $this->load->model('project_model');
			if(!$this->session->userdata("userCode")){
				redirect('/login', 'refresh');
			}
			// print_r($user_logged_in);
			
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$user = $this->db->query("select * from user")->result_array();
		$data["complaint"] = $this->db->query("select * from complaint")->result_array();
		$data["beli"] = $this->db->query("select * from beli_sampah")->result_array();
		$data["activefooter"] = "home";
		// print_r($user);
		$this->load->view('template/header' , $data);
		$this->load->view('home' , $data);
		$this->load->view('template/footer' , $data);
	}
}
