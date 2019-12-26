<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employer extends CI_Controller {

	public function index()
	{

		$this->form_validation->set_rules('company_name', 'Company name', 'required');

		$this->form_validation->set_rules('company_address', 'Company address', 'required');
		
		$this->form_validation->set_rules('company_description', 'Company description', 'required|min_length[10]');


		if ($this->form_validation->run() == FALSE)
		{
		$data['company']=  $this->db->select('*')->from('company')->where('user_id',$this->session->userdata('userid'))->get()->result_array();
		$data['personal']=  $this->db->select('*')->from('users')->where('id',$this->session->userdata('userid'))->get()->result_array();

			$this->load->view('include/header');
			$this->load->view('employer/settings',$data);
			$this->load->view('include/footer');
		}else{

			$data['company_name']=$this->input->post('company_name');
			$data['company_address']=$this->input->post('company_address');
			$data['company_description']=$this->input->post('company_description');
			$data['user_id']=$this->session->userdata('userid');
		

			if($_FILES && $_FILES['company_logo']['name']){

				$config['upload_path'] = './images';
				$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('company_logo')) {
					$this->session->set_flashdata('message', $this->upload->display_errors());
					redirect($_SERVER['HTTP_REFERER']);
				} else {

					$avatar = $this->upload->data();
					$avatar_name = $avatar['file_name'];
					$data['company_logo']=$avatar_name;

					$config['image_library'] = 'gd2';
					$config['source_image'] = 'images/'.$data['company_logo'].'';
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

$get_data = $this->db->select('id')->from('company')->where('user_id', $this->session->userdata('userid'))->get()->num_rows();
if ($get_data==0) {
	$this->db->insert('company',$data);
} else{
	$this->db->where('user_id', $this->session->userdata('userid'));
	$this->db->update('company',$data);
}

		
			$msg='<div class="alert alert-success text-center col-md-8 offset-2">Company information updated!</div>';
		
		$this->session->set_flashdata('message',$msg);
			redirect($_SERVER['HTTP_REFERER']);
		
	}
}

	public function personal_info_update($id)
	{

		$this->form_validation->set_rules('name', 'Name', 'required');

		$this->form_validation->set_rules('email', 'Email', 'required');
		
		$this->form_validation->set_rules('number', 'Number', 'required|min_length[10]');


		if ($this->form_validation->run() == FALSE)
		{

			$this->load->view('include/header');
			$this->load->view('employer/settings');
			$this->load->view('include/footer');
		}else{

			$data['name']=$this->input->post('name');
			$data['email']=$this->input->post('email');
			$data['number']=$this->input->post('number');
			
			$this->db->where('id',$id);
			$this->db->update('users',$data);

			$msg='<div class="alert alert-success text-center col-md-8 offset-2">Personal information updated!</div>';
		
		$this->session->set_flashdata('message',$msg);
			redirect('Employer');
		
	}

	} 
}
 