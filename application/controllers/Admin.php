<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		if($this->session->userdata('admin_id')){   
			
		}else{
			redirect('AdminLogin');
		} 
		 
	}

	
	public function index()
	{
		

		$data['users'] = $this->db->select('*')->from('users')->where('type', 'sugnup')->get()->result_array();
		
		$this->load->view('admin/inc/header');
		$this->load->view('admin/inc/navbar');
		$this->load->view('admin/home', $data);
		$this->load->view('admin/inc/footer');

	}
	

	public function dashboard()
	{
		$data['admin'] = $this->db->select('*')->from('admin')->get()->result_array();
		
		$this->load->view('admin/inc/header');
		$this->load->view('admin/inc/navbar');
		$this->load->view('admin/admin_dashboard', $data);
		$this->load->view('admin/inc/footer');
	}



	public function change_email($id)
	{
		$email = $this->input->post('email');
		$this->db->set('email', $email);
		$this->db->where('id',$id);
		$this->db->update('admin');
		$msg='<div class="alert alert-success">Email Updated successfully!</div>';
		$this->session->set_flashdata('message',$msg);
		redirect($_SERVER['HTTP_REFERER']);
	}


	public function change_phone_number($id)
	{
		$phone = $this->input->post('phone');
		$this->db->set('phone', $phone);
		$this->db->where('id',$id);
		$this->db->update('admin');
		$msg='<div class="alert alert-success">Number Updated successfully!</div>';
		$this->session->set_flashdata('message',$msg);
		redirect($_SERVER['HTTP_REFERER']);
	}



	public function change_password($id)
	{

		$password = md5($this->input->post('password'));
		$this->db->set('password', $password);
		$this->db->where('id',$id);
		$this->db->update('admin');

		$msg='<div class="alert alert-success">Password Updated successfully!</div>';
		
		$this->session->set_flashdata('message',$msg);
		redirect($_SERVER['HTTP_REFERER']);
	}


	public function user()
	{
		$this->load->view('admin/inc/header');
		$this->load->view('admin/inc/navbar');
		$this->load->view('admin/user_page');
		$this->load->view('admin/inc/footer');
	}




	public function user_list()
	{

		$data['users'] = $this->db->select('*')->from('users')->get()->result_array();
		$this->load->view('admin/inc/header');
		$this->load->view('admin/inc/navbar');
		$this->load->view('admin/user_list', $data);
		$this->load->view('admin/inc/footer');
	}



	public function job_list()
	{

		
		$data['jobs']=  $this->db->select('*, jobs.id as id')->from('jobs')->join('company', 'jobs.user_id = company.user_id')->join('job_categories', 'job_categories.id = jobs.category_id')->order_by('jobs.id','desc')->get()->result_array();

		$this->load->view('admin/inc/header');
		$this->load->view('admin/inc/navbar');
		$this->load->view('admin/job_list', $data);
		$this->load->view('admin/inc/footer');
	}

	public function employer()
	{

		
		$data['users']=  $this->db->select('*')->from('company')->join('users','users.id=company.user_id')->get()->result_array();

		$this->load->view('admin/inc/header');
		$this->load->view('admin/inc/navbar');
		$this->load->view('admin/employer_list', $data);
		$this->load->view('admin/inc/footer');
	}


	public function question_details($id)
	{

		$query=  $this->db->select('*, questions.id as id')->from('questions')->order_by('users.id','desc')->join('users', 'questions.user_id =users.id')->where('questions.id',$id)->get();

		$data['question'] = $query->result_array();

		$query=  $this->db->select('*')->from('answer')->order_by('answer.id','desc')->join('users', 'answer.user_id =users.id')->where('answer.question_id',$id)->get();
		$data['answers'] = $query->result_array();
		
		$this->load->view('admin/inc/header');
		$this->load->view('admin/inc/navbar');
		$this->load->view('admin/question_details', $data);
		$this->load->view('admin/inc/footer');
	}


	public function user_message()
	{
		$data['messages'] = $this->db->select('*')->from('contact')->order_by('id','desc')->get()->result_array();
		$this->load->view('admin/inc/header');
		$this->load->view('admin/inc/navbar');
		$this->load->view('admin/user_message', $data);
		$this->load->view('admin/inc/footer');
	}

	public function delete_message($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('contact');
		$msg='<div class="alert alert-success">Message deleted successfully!</div>';
		$this->session->set_flashdata('message',$msg);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function unblock_user($id)
	{
		$this->db->set('block',0);
		$this->db->where('id',$id);
		$this->db->update('users');
		$msg='<div class="alert alert-success">user Removed From block List!</div>';
		$this->session->set_flashdata('message',$msg);
		redirect($_SERVER['HTTP_REFERER']);
	}




}