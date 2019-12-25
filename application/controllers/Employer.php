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

			$this->load->view('include/header');
			$this->load->view('employer/settings');
			$this->load->view('include/footer');
		}else{

			$data['company_name']=$this->input->post('company_name');
			$data['company_address']=$this->input->post('company_address');
			$data['company_description']=$this->input->post('company_description');
			$data['message']=$this->input->post('message');

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
			} else{
				$this->session->set_flashdata('success','<div style="text-align:center;" class="alert alert-danger">
					<strong>No image added</strong></div>');
				redirect($_SERVER['HTTP_REFERER']);
			}


			$this->db->insert('company',$data);

			$msg='<div class="alert alert-success text-center col-md-8 offset-2">Thanks. We will reply you back soon!</div>';
		
		$this->session->set_flashdata('message',$msg);
			redirect($_SERVER['HTTP_REFERER']);
		
	}

	} 
}
 