<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_m extends CI_Model {

    public function get($id = null)
    {
        $this->db->from('supplier');
        if($id != null) {
            $this->db->where('id_supplier', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post) // add data supplier
    {
        $params = [
            'nama_supplier' => $post['namasupplier'],
            'alamat' => $post['alamat'],
            'telp' => $post['telpon'],
            'email' => $post['email'],
            'keterangan' => $post['ket'],
        ];
        $this->db->insert('supplier', $params);
    }

    public function edit($post) // edit data supplier
    {
        $params = [
            'nama_supplier' => $post['namasupplier'],
            'alamat' => $post['alamat'],
            'telp' => $post['telpon'],
            'email' => $post['email'],
            'keterangan' => $post['ket'],
            'updated' => date('Y-m-d H:i:s'),
        ];

        $this->db->where('id_supplier', $post['id']);
        $this->db->update('supplier', $params);
    }

    public function delete($id) // delete data supplier
	{
		$this->db->where('id_supplier', $id);
		$this->db->delete('supplier');
    }

}