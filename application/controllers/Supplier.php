<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	// me-load semua di awal
	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('supplier_m');
	}

	public function index()
	{
		$data = array(
			'tittle' => 'Supplier'
		);
		$data['row'] = $this->supplier_m->get();
		$this->template->load('template','supplier/supplier_data', $data);
	}

	public function add()
	{
		$supplier = new stdClass();
		$supplier->id_supplier = 0;
		$supplier->nama_supplier = null;
		$supplier->alamat = null;
		$supplier->telp = null;
		$supplier->email = null;
		$supplier->keterangan = null;
		$data = array(
			'tittle' => 'Supplier Add',
			'page' => 'Add',
			'row' => $supplier
		);
		
		$this->template->load('template','supplier/supplier_form', $data);
	}

	public function edit($id)
	{
		$query = $this->supplier_m->get($id);
			if($query->num_rows() > 0) {
				$supplier = $query->row();
				$data = array(
					'tittle' => 'Supplier Edit',
					'page' => 'Edit',
					'row' => $supplier
				);
		
				$this->template->load('template', 'supplier/supplier_form', $data);
			} else {
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".base_url('supplier')."';</script>";
			}	
	}

	public function proses()
	{
		$post = $this->input->post(null, TRUE);
		// if(isset($_POST['add'])) {
		// 	$this->supplier_m->add($post);				
		// } else if(isset($_POST['edit'])) {
		// 	$this->supplier_m->edit($post);
		// }
		
		if($post['id'] == 0) {
			$this->supplier_m->add($post);
		} else  {
			$this->supplier_m->edit($post);
		}

		// print_r($post);die;
		
		if($this->db->affected_rows() > 0) {
			 $this->session->set_flashdata('flash', 'success');
			redirect('supplier');
		}

	}

	public function delete($id)
	{
		$this->supplier_m->delete($id);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('flash', 'Data berhasil dihapus');
			// echo "<script>alert('Data berhasil dihapus');</script>";
		}
			redirect('supplier');
			// echo "<script>window.location='".site_url('supplier')."';</script>";
	}
}