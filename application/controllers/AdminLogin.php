<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogin extends CI_Controller {
	
	
	public function index()
	{
	
	
	
	
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/inc/header');
			$this->load->view('admin/login');
			
			 
		}else{
			
			
			$data['email']=$this->input->post('email');
			$data['password']=md5($this->input->post('password'));


			$result=$this->db->where('email',$data['email'])->where('password',$data['password'])->get('admin')->result_array();


			if($result){

				$this->session->set_userdata('admin_id', $result[0]['id']);
				$this->session->set_userdata('admin_email', $result[0]['email']);

				redirect('Admin/dashboard');
			}

			else{ 

				$msg='<div class="alert alert-danger">Invalid Email or Password </div>';
				
				$this->session->set_flashdata('message',$msg);
				
				redirect('AdminLogin');
				

			}
			
			
		}


	}
}
