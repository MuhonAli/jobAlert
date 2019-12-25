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

}