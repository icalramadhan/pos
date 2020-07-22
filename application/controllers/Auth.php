<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	public function login()
	{
		$data = array(
			'tittle' => 'Login'
		);

		check_already_login();
		$this->load->view('login', $data);
	}

	public function process() //proses login
	{
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])) {
			$this->load->model('user_m');
			$query = $this->user_m->login($post);
			if($query->num_rows() > 0) {
				$row = $query->row();
				$params = array(
					'iduser' => $row->id_user,
					'level' => $row->level
				);
				$this->session->set_userdata($params);
				$this->session->set_flashdata('flash', 'successlogin');
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('flash', 'error');
				redirect('auth/login');
			}
		}
	}

	public function logout()
	{
		$params = array('iduser', 'level');
		$this->session->unset_userdata($params);
		redirect('auth/login');
	}
}
