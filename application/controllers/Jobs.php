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
		
		$data['jobs']=  $this->db->select('*, jobs.id as id')->from('jobs')->join('company', 'jobs.user_id = company.user_id')->where('jobs.id', $id)->order_by('jobs.id','desc')->get()->result_array();

		$this->load->view('include/header');
		$this->load->view('job_details', $data);
		$this->load->view('include/footer');
} 


	public function all_jobs()
	{
	
//	$data['jobs']=  $this->db->select('*,jobs.id as id')->from('jobs')->join('company', 'jobs.user_id = company.user_id')->order_by('jobs.id','desc')->get()->result_array();


$this->load->library('pagination');

		if (!empty($_GET['id'])) {

			$query = $this->db->where('id', $_GET['id']);
			$data['id'] = $_GET['id'];
		}

		if (!empty($_GET['name'])) {

			$query = $this->db->LIKE('name', $_GET['name'],'both');
			$data['name'] = $_GET['name'];
		}


		$query=$this->db->select('*,jobs.id as id')->from('jobs')->join('company', 'jobs.user_id = company.user_id')->order_by('jobs.id','desc')->get();

		//$data['jobs'] = $query->num_rows();

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

		if (!empty($_GET['id'])) {

			$query = $this->db->where('id', $_GET['id']);
			$data['id'] = $_GET['id'];
		}

		if (!empty($_GET['name'])) {

			$query = $this->db->LIKE('name', $_GET['name'],'both');
			$data['name'] = $_GET['name'];
		}


		$query = $this->db->limit($config['per_page'], $data['segment'])->select('*,jobs.id as id')->from('jobs')->join('company', 'jobs.user_id = company.user_id')->order_by('jobs.id','desc')->get();

		$data['jobs'] = $query->result_array();


		$this->load->view('include/header');
		$this->load->view('all_jobs',$data);
		$this->load->view('include/footer');
	}


}