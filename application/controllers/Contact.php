<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function index()
	{


		$this->form_validation->set_rules('name', 'Name', 'required|english_check');

		$this->form_validation->set_rules('email', 'Email', 'required');

		$this->form_validation->set_rules('number', 'Phone', 'required|numeric|min_length[11]');
		
		$this->form_validation->set_rules('message', 'Message', 'required|min_length[10]');



		$this->form_validation->set_message('english_check', 'Use only alphabet and space');

				function  english_check($str){

			if (!preg_match("/^[a-zA-Z ]*$/",$str)) {
				return FALSE;
			}else{
				return TRUE;
			}

		}

		if ($this->form_validation->run() == FALSE)
		{

			$this->load->view('include/header');
			$this->load->view('contact');
			$this->load->view('include/footer');
		}else{

			$data['name']=$this->input->post('name');
			$data['email']=$this->input->post('email');
			$data['number']=$this->input->post('number');
			$data['message']=$this->input->post('message');

			$this->db->insert('contact',$data);

			$msg='<div class="alert alert-success text-center col-md-8 offset-2">Thanks. We will reply you back soon!</div>';
		
		$this->session->set_flashdata('message',$msg);
			redirect($_SERVER['HTTP_REFERER']);
		
	}
	} 
}
 