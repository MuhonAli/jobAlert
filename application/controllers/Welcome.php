<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$data['categories']=  $this->db->select('*')->from('job_categories')->get()->result_array();
		$data['jobs']=  $this->db->select('*,jobs.id as id')->from('jobs')->join('company', 'jobs.user_id = company.user_id')->order_by('jobs.id','desc')->where('jobs.approved',1)->get()->result_array();

		$this->load->view('include/header');
		$this->load->view('home', $data);
		$this->load->view('include/footer');
	} 
}
 