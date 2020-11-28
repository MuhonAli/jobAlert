<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {


	function __construct() {
		parent::__construct();
		
		if($this->session->userdata('user_type')=='employee'){    
			
		}else{
			redirect('Login');
		} 

	}


	public function profile_setting()
	{

		$this->form_validation->set_rules('name', ' Name', 'required');

		$this->form_validation->set_rules('address', 'Address', 'required');
		
		$this->form_validation->set_rules('number', 'Number', 'required|min_length[10]');


		if ($this->form_validation->run() == FALSE)
		{
			$data['employee']=  $this->db->select('*')->from('employee')->join('users','users.id=employee.user_id')->where('users.id',$this->session->userdata('userid'))->get()->result_array();


			$this->load->view('include/header');
			$this->load->view('employee/settings',$data);
			$this->load->view('include/footer');
		}else{

			$data['name']=$this->input->post('name');
			$data['address']=$this->input->post('address');
			$data['number']=$this->input->post('number');
			$data['user_id']=$this->session->userdata('userid');


			if($_FILES && $_FILES['cv']['name']){

				$config['upload_path'] = './images';
				$config['allowed_types'] = 'jpg|png|jpeg|pdf|JPG|PNG|JPEG|PDF';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('cv')) {
					$this->session->set_flashdata('message', $this->upload->display_errors());
					redirect($_SERVER['HTTP_REFERER']);
				} else {

					$avatar = $this->upload->data();
					$avatar_name = $avatar['file_name'];
					$data['cv']=$avatar_name;

					$config['image_library'] = 'gd2';
					$config['source_image'] = 'images/'.$data['cv'].'';
					$config['create_thumb'] = FALSE;
					$config['maintain_ratio'] = FALSE;
					$config['quality'] = '100%';

				}

				$this->load->library('image_lib',$config);


				if ( ! $this->image_lib->resize())
				{
					echo $this->image_lib->display_errors();
				}

			//user select file
			} 

			$get_data = $this->db->select('id')->from('employee')->where('user_id', $this->session->userdata('userid'))->get()->num_rows();
			if ($get_data==0) {
				$this->db->insert('employee',$data);
			} else{
				$this->db->where('user_id', $this->session->userdata('userid'));
				$this->db->update('employee',$data);
			}


			$msg='<div class="alert alert-success text-center col-md-8 offset-2">Profile information updated!</div>';

			$this->session->set_flashdata('message',$msg);
			redirect($_SERVER['HTTP_REFERER']);

		}
	}



	public function personal_info_update($id)
	{


		$this->form_validation->set_rules('email', 'Email', 'required');
		
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');


		if ($this->form_validation->run() == FALSE)
		{

			$data['employee']=  $this->db->select('*')->from('employee')->join('users','users.id=employee.user_id')->where('users.id',$this->session->userdata('userid'))->get()->result_array();

			$this->load->view('include/header');
			$this->load->view('employee/settings');
			$this->load->view('include/footer');
		}else{

			$data['email']=$this->input->post('email');
			$data['password']=md5($this->input->post('password'));
			
			$this->db->where('id',$id);
			$this->db->update('users',$data);

			$msg='<div class="alert alert-success text-center col-md-8 offset-2">Personal information updated!</div>';

			$this->session->set_flashdata('message',$msg);
			redirect($_SERVER['HTTP_REFERER']);

		}

	} 



	public function apply_job($id)
	{

		if(($this->session->userdata('userid'))){
		}else{ redirect('Login'); }


		$query = $this->db->select('id')->from('applications')->where('job_id',$id)->where('user_id',$this->session->userdata('userid'))->get();
		$check_application = $query->num_rows();
		$user_type = $query->result_array();
		$user_type =$user_type[0]['type'];

		if ($user_type=='employer') {
			$msg='<div class="alert alert-danger text-center col-md-8 offset-2">Sorry! Employer cannot apply on job!</div>';
			$this->session->set_flashdata('message',$msg);
			redirect($_SERVER['HTTP_REFERER']);
		}

		$getEmployee = $this->db->select('id')->from('employee')->where('user_id',$this->session->userdata('userid'))->get()->num_rows();

		if ($getEmployee==0) {

			$msg='<div class="alert alert-danger text-center col-md-8 offset-2">Please update your profile before apply on this job!</div>';
			$this->session->set_flashdata('message',$msg);
			redirect($_SERVER['HTTP_REFERER']);

		}


		if ($check_application==1) {
			$msg='<div class="alert alert-danger text-center col-md-8 offset-2">You already applied on this!</div>';
			$this->session->set_flashdata('message',$msg);
			redirect($_SERVER['HTTP_REFERER']);
		}
		$data['job_id']=$id;
		$data['user_id']=$this->session->userdata('userid');

		$this->db->where('id',$id);
		$this->db->insert('applications', $data);
		$msg='<div class="alert alert-success text-center col-md-8 offset-2">Congratulations! you have applied successfully.</div>';
		$this->session->set_flashdata('message',$msg);
		redirect($_SERVER['HTTP_REFERER']);
	}



	public function applied_jobs()
	{


		$this->load->library('pagination');

		if (!empty($_GET['id'])) {

			$query = $this->db->where('id', $_GET['id']);
			$data['id'] = $_GET['id'];
		}

		if (!empty($_GET['name'])) {

			$query = $this->db->LIKE('name', $_GET['name'],'both');
			$data['name'] = $_GET['name'];
		}


		$query=$this->db->select('*,jobs.id as id')->from('jobs')->join('company', 'jobs.user_id = company.user_id')->join('applications', 'jobs.id = applications.job_id')->where('applications.user_id', $this->session->userdata('userid'))->order_by('jobs.id','desc')->get();

		//$data['jobs'] = $query->num_rows();

		$data['jobs'] = $query->result_array();

		$config['suffix']          = "?" . http_build_query($_GET, '', "&");
		$config['base_url']        = site_url('Employee/applied_jobs/');
		$config['total_rows']      = $query->num_rows();
		$config['per_page']        = 10;
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


		$query = $this->db->limit($config['per_page'], $data['segment'])->select('*,jobs.id as id')->from('jobs')->join('company', 'jobs.user_id = company.user_id')->join('applications', 'jobs.id = applications.job_id')->where('applications.user_id', $this->session->userdata('userid'))->order_by('jobs.id','desc')->get();

		$data['jobs'] = $query->result_array();


		$this->load->view('include/header');
		$this->load->view('all_jobs',$data);
		$this->load->view('include/footer');
	}

	public function view_profile()
	{
		
		$data['employee']=  $this->db->select('*')->from('employee')->join('users','users.id=employee.user_id')->where('users.id',$this->session->userdata('userid'))->get()->result_array();
		

		$this->load->view('include/header');
		$this->load->view('employee/view_profile', $data);
		$this->load->view('include/footer');
	} 


}
