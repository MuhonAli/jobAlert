<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {


	public function index()
	{
		$this->load->view('include/header');
		$this->load->view('single_job');
		$this->load->view('include/footer');
	}

	public function job_details($id)
	{
		
		$data['jobs']=  $this->db->select('*, jobs.id as id')->from('jobs')->join('company', 'jobs.user_id = company.user_id')->where('jobs.id', $id)->get()->result_array();

		$this->load->view('include/header');
		$this->load->view('job_details', $data);
		$this->load->view('include/footer');
	} 


	public function all_jobs()
	{


		$this->load->library('pagination');


		if (!empty($_GET['category_id'])) {

			$query = $this->db->where('jobs.category_id', $_GET['category_id']);
		}


		if (!empty($_GET['search'])) {

			$query = $this->db->LIKE('jobs.title', $_GET['search'],'both');
			$query = $this->db->OR_LIKE('jobs.description', $_GET['search'],'both');
			$query = $this->db->OR_LIKE('jobs.location', $_GET['search'],'both');
			$query = $this->db->OR_LIKE('company.company_name', $_GET['search'],'both');
		}


		$query=$this->db->select('*,jobs.id as id')->from('jobs')->join('company', 'jobs.user_id = company.user_id')->order_by('jobs.id','desc')->where('jobs.approved',1)->get();

		$data['jobs'] = $query->result_array();
		$config['suffix']          = "?" . http_build_query($_GET, '', "&");

		$config['base_url']        = site_url('Jobs/all_jobs/');
		$config['total_rows']      = $query->num_rows();
		$config['per_page']        = 12;
		$config['num_links']       = 4;
		$config['full_tag_open']   = '<ul class="pagination">';
		$config['full_tag_close']  = '</ul>';
		$config['cur_tag_open']    = '<li style="padding:5px 5px;" class="page-item active"><a class="page-link" href="">';
		$config['cur_tag_close']   = '</a></li>';
		$config['prev_tag_open']   = '<li  style="padding:5px 5px;" class="page-item">';
		$config['prev_tag_close']  = '</li>';
		$config['next_tag_open']   = '<li  style="padding:5px 5px;" class="page-item">';
		$config['next_tag_close']  = '</li>';
		$config['num_tag_open']    = '<li  style="padding:5px 5px;" class="page-item">';
		$config['num_tag_close']   = '</li>';
		$config['last_tag_open']   = '<li style="padding:5px 5px;" class="page-item">';
		$config['last_tag_close']  = '</li>';
		$config['first_tag_open']  = '<li style="padding:5px 5px;" class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['next_link']       = 'Next >';
		$config['prev_link']       = '< Prev';

		if ($this->uri->segment(3)) {
			$data['segment'] = $this->uri->segment(3);
		} else {
			$data['segment'] = 0;
		}



		$this->pagination->initialize($config);

		if (!empty($_GET['category_id'])) {

			$query = $this->db->where('jobs.category_id', $_GET['category_id']);
		}


		if (!empty($_GET['search'])) {

			$query = $this->db->LIKE('jobs.title', $_GET['search'],'both');
			$query = $this->db->OR_LIKE('jobs.description', $_GET['search'],'both');
			$query = $this->db->OR_LIKE('jobs.location', $_GET['search'],'both');
			$query = $this->db->OR_LIKE('company.company_name', $_GET['search'],'both');
		}


		$query = $this->db->limit($config['per_page'], $data['segment'])->select('*,jobs.id as id')->from('jobs')->join('company', 'jobs.user_id = company.user_id')->order_by('jobs.id','desc')->where('jobs.approved',1)->get();

		$data['jobs'] = $query->result_array();


		$this->load->view('include/header');
		$this->load->view('all_jobs',$data);
		$this->load->view('include/footer');
	}


	public function post_job()
	{

		$this->form_validation->set_rules('title', 'Title', 'required');

		$this->form_validation->set_rules('category_id', 'Category', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		
		$this->form_validation->set_rules('requirements', 'Description', 'required|min_length[10]');
		$this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('salary_range', 'Salary Range', 'required');
		$this->form_validation->set_rules('location', 'Job Location', 'required');


		if ($this->form_validation->run() == FALSE)
		{
			$data['company']=  $this->db->select('*')->from('company')->where('user_id',$this->session->userdata('userid'))->get()->result_array();
			$data['personal']=  $this->db->select('*')->from('users')->where('id',$this->session->userdata('userid'))->get()->result_array();
			$data['categories']=  $this->db->select('*')->from('job_categories')->get()->result_array();

			$this->load->view('include/header');
			$this->load->view('employer/post_job',$data);
			$this->load->view('include/footer');
		}else{

			$data['title']=$this->input->post('title');
			$data['category_id']=$this->input->post('category_id');
			$data['description']=$this->input->post('description');
			$data['requirements']=$this->input->post('requirements');
			$data['type']=$this->input->post('type');
			$data['salary_range']=$this->input->post('salary_range');
			$data['location']=$this->input->post('location');
			$data['user_id']=$this->session->userdata('userid');

			$this->db->insert('jobs',$data);

			$msg='<div class="alert alert-success text-center col-md-8 offset-2">Job Posted Successfully!</div>';

			$this->session->set_flashdata('message',$msg);
			redirect($_SERVER['HTTP_REFERER']);

		}
	}

	public function job_approve($id)
	{
		$this->db->set('approved', 1);
		$this->db->where('id', $id);
		$this->db->update('jobs');

		$msg='<div class="alert alert-success">Job approved successfully!</div>';
		
		$this->session->set_flashdata('message',$msg);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function job_reject($id)
	{
		$this->db->set('approved', 0);
		$this->db->where('id', $id);
		$this->db->update('jobs');

		$msg='<div class="alert alert-success">Job rejected successfully!</div>';
		
		$this->session->set_flashdata('message',$msg);
		redirect($_SERVER['HTTP_REFERER']);
	}

}