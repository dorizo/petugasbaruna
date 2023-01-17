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
		$mitra = $this->session->userdata("mitraCode");
		$data["complaint"] = $this->db->query("select * from complaint")->result_array();
		$data["pembelian"] = $this->db->query("select  a.createAt,a.bsCode,dbsCode , berat from detail_beli_sampah a JOIN jenis_sampah b ON b.jsCode=a.jsCode JOIN beli_sampah c ON c.bsCode=a.bsCode WHERE c.mitraCode=$mitra AND b.jsCode=3  order by dbsCode desc limit 100")->result_array();
		$data["anggota"] = $this->db->query("select * from anggota limit 3")->result_array();
		$data["activefooter"] = "home";
		// print_r($user);
		$this->load->view('template/header' , $data);
		$this->load->view('home' , $data);
		$this->load->view('template/footer' , $data);
	}
	
	public function residu()
	{
		$mitra = $this->session->userdata("mitraCode");
		$data["complaint"] = $this->db->query("select * from complaint")->result_array();
		$data["pembelian"] = $this->db->query("select a.createAt, a.bsCode,dbsCode , berat from detail_beli_sampah a JOIN jenis_sampah b ON b.jsCode=a.jsCode JOIN beli_sampah c ON c.bsCode=a.bsCode WHERE c.mitraCode=$mitra AND  b.jsCode=2  order by dbsCode desc limit 100")->result_array();
		$data["anggota"] = $this->db->query("select * from anggota limit 3")->result_array();
		$data["activefooter"] = "home";
		// print_r($user);
		$this->load->view('template/header' , $data);
		$this->load->view('home' , $data);
		$this->load->view('template/footer' , $data);
	}
	
	public function Recyclables()
	{
		$mitra = $this->session->userdata("mitraCode");
		$data["complaint"] = $this->db->query("select * from complaint")->result_array();
		$data["pembelian"] = $this->db->query("select a.createAt, a.bsCode,dbsCode , berat from detail_beli_sampah a JOIN jenis_sampah b ON b.jsCode=a.jsCode JOIN beli_sampah c ON c.bsCode=a.bsCode WHERE c.mitraCode=$mitra AND b.jsCode=1  order by dbsCode desc limit 100")->result_array();
		$data["anggota"] = $this->db->query("select * from anggota limit 3")->result_array();
		$data["activefooter"] = "home";
		// print_r($user);
		$this->load->view('template/header' , $data);
		$this->load->view('home' , $data);
		$this->load->view('template/footer' , $data);
	}
}
