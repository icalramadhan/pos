<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	// me-load semua di awal
	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('user_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data = array(
			'tittle' => 'User'
		);
		
		$data['row'] = $this->user_m->get();
		$this->template->load('template', 'user/user_data', $data);
	}

	public function add()
	{
		$data = array(
			'tittle' => 'Add User'
		);

		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('confirmpass','Konfirmasi Password', 'required|matches[password]',
			array('matches' => '%s tidak sesuai'));
		$this->form_validation->set_rules('fullname','Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat','required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('level', 'Level', 'required');

		// alert message
		$this->form_validation->set_message('required', '%s masih kosong, silakan isi dahulu');
		$this->form_validation->set_message('min_length', '%s minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '%s ini sudah ada, silakan ganti yang lain!');

		// $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
		
		// proses
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'user/user_form_add', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->user_m->add($post);
			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil tersimpan');</script>";
			}
				echo "<script>window.location='".site_url('user')."';</script>";
		}
		
	}

	public function edit($id) 
	{
		$data = array(
			'tittle' => 'Edit User'
		);

		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
		if($this->input->post('password'))
		{
			$this->form_validation->set_rules('password', 'Password', 'min_length[5]');
			$this->form_validation->set_rules('confirmpass','Konfirmasi Password', 'matches[password]',
				array('matches' => '%s tidak sesuai'));
		}
		if($this->input->post('confirmpass'))
		{
			$this->form_validation->set_rules('confirmpass','Konfirmasi Password', 'matches[password]',
				array('matches' => '%s tidak sesuai'));
		}
		$this->form_validation->set_rules('fullname','Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat','required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('level', 'Level', 'required');

		// alert message
		$this->form_validation->set_message('required', '%s masih kosong, silakan isi dahulu');
		$this->form_validation->set_message('min_length', '%s minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '%s ini sudah ada, silakan ganti yang lain!');

		// $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
		
		// proses
		if ($this->form_validation->run() == FALSE) {
			$query = $this->user_m->get($id);
			if($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template', 'user/user_form_edit', $data);
			} else {
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".base_url('user')."';</script>";
			}	
		} else {
			$post = $this->input->post(null, TRUE);
			$this->user_m->edit($post);
			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil tersimpan');";
			}
				echo "<script>window.location='".base_url('user')."';</script>";
		}	
	}

	public function username_check() // form validation callback 'username'
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND id_user != '$post[id_user]'");
		if($query->num_rows() > 0) {
			$this->form_validation->set_message('username_check', '%s ini sudah dipakai!');
			return FALSE;
		} else {
			return TRUE;
		}
		
	}

	public function delete()
	{
		$id = $this->input->post('id_user');
		$this->user_m->delete($id);

		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus');</script>";
		}
			echo "<script>window.location='".site_url('user')."';</script>";
	}

	public function update_status() // is_active user
	{
		$post = $this->input->post(null, true);
		$status = $post['status'] == 0 ? 1 : 0;
		$update['is_active'] = $status;

		$this->user_m->update_data($post['id'], $update);

		echo json_encode(array('success'=>true, 'data'=>$post));
	}
}
