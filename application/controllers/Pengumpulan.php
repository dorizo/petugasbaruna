<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumpulan extends CI_Controller {
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
	public function tambah()
	{
		$this->form_validation->set_rules('berat', 'berat', 'required');
		if ($this->form_validation->run() === FALSE)
		{
			$data["activefooter"] = "Laporan";
			$data["datapengumpulan"] = $this->db->query("select * from detail_beli_sampah a JOIN jenis_sampah b ON b.jsCode=a.jsCode  where a.bsCode=".$this->session->userdata("bsCode"))->result_array();
			$data["kategori"] = $this->db->query("select * from jenis_sampah order by jsCode asc limit 3 ")->result_array();
			$this->load->view('template/header' , $data);
			$this->load->view('pengumpulan/add' , $data);
			$this->load->view('template/footer' , $data);;
	
		}
		else
		{
		$p =$this->input->post();
		$p["sumber"] = "Fasilitas Umum";
		$p["berat"] = str_replace(",", "", $this->input->post("berat"));
		$p["harga"] = 0;
		$p["total"] = 0;
		$p["bsCode"] = $this->session->userdata("bsCode");
		$this->db->insert("detail_beli_sampah" , $p);
		redirect('/pengumpulan/tambah', 'refresh');
		// $data["activefooter"] = "Laporan";
		// $data["datapengumpulan"] = $this->db->query("select * from detail_beli_sampah a JOIN jenis_sampah b ON b.jsCode=a.jsCode where a.bsCode=".$this->session->userdata("bsCode"))->result_array();
		// $data["kategori"] = $this->db->query("select * from jenis_sampah order by jsCode asc limit 3 ")->result_array();
		// $this->load->view('template/header' , $data);
		// $this->load->view('pengumpulan/add' , $data);
		// $this->load->view('template/footer' , $data);
		}
	}

	public function done($p){
		$result = $this->db->query("select sum(berat) as totalBerat , sum(harga) as totalHarga , bsCode from detail_beli_sampah a JOIN jenis_sampah b ON b.jsCode=a.jsCode  where a.bsCode=".$p)->row();
		print_r($result);
		$this->db->where("bsCode" , $p);
		$this->db->update("beli_sampah" , $result);
		$this->session->unset_userdata("bsCode");
		redirect('/home', 'refresh');
	}
	public function input(){
		$p["anggotaCode"] = $this->input->post("anggotaCode");
		$p["mitraCode"] = $this->session->userdata("mitraCode");
		$p["totalBerat"] = 0;
		$p["totalHarga"] = 0;
		$p = $this->db->insert("beli_sampah",$p);
		$insert_id = $this->db->insert_id();
		$this->session->set_userdata('bsCode' , $insert_id); 
		redirect('/pengumpulan/tambah', 'refresh');
	}
	public function hapus($kode){
		$this->db->where("dbsCode" , $kode);
		$this->db->delete("detail_beli_sampah");
		redirect('/pengumpulan/tambah', 'refresh');
	}
}
