<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$data["activefooter"] = "home";
		// print_r($user);
		$this->form_validation->set_rules('username', 'username', 'required');
    $this->form_validation->set_rules('password', 'password', 'required');

    if ($this->form_validation->run() === FALSE)
    {
		
		$this->load->view('login' , $data);

    }
    else
    {
		$user = $this->input->post("username");
		$password = $this->input->post("password");
		// echo $p;
		$q = "select * from user a JOIN mitra b ON a.userCode=b.userCode where email='$user'";
		$data = $this->db->query($q)->row();
		if($data){
			$p = password_verify($password ,$data->password);
			if($p==1){
				$data = $this->db->query($q)->result_array();
				$this->session->set_userdata($data[0]);
				redirect('/home', 'refresh');
			}else{
				
			echo "<script>alert('login gagal PASSWORD SALAH')</script>";
			redirect('/home', 'refresh');
			}
	
		}else{
			echo "<script>alert('login gagal email salah')</script>";
			redirect('/home', 'refresh');
		}
	

    }
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('/home', 'refresh');
	}
}
