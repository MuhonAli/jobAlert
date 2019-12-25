<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

public function index(){
			$this->load->view('include/header');
			$this->load->view('register');
			$this->load->view('include/footer');
}
	public function employee()
	{
				$unique_email = $this->db->select('*')->from('users')->where('email',$this->input->post('email'))->get()->num_rows();
			if ($unique_email>0) {
			$msg='<div class="alert alert-danger">Account exist with this email</div>';
			$this->session->set_flashdata('message',$msg);
			redirect('Register');
			}

			$data['email']=$this->input->post('email');
			$data['type']='employee';
			$data['password']=md5($this->input->post('password'));
			$this->db->insert('users',$data);
			$msg='<div class="alert alert-success">Congratulations! Your Account Created successfully</div>';
			$this->session->set_flashdata('message',$msg);
			redirect('Register');
	}

	public function employer()
	{
			$unique_email = $this->db->select('*')->from('users')->where('email',$this->input->post('email'))->get()->num_rows();
			if ($unique_email>0) {
			$msg='<div class="alert alert-danger">Account exist with this email</div>';
			$this->session->set_flashdata('message',$msg);
			redirect('Register');
			}

			$data['email']=$this->input->post('email');
			$data['type']='employer';
			$data['password']=md5($this->input->post('password'));
			$this->db->insert('users',$data);
			$msg='<div class="alert alert-success">Congratulations! Your Account Created successfully</div>';
			$this->session->set_flashdata('message',$msg);
			redirect('Register');
	}

}
