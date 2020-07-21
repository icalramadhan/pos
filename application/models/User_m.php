<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {
    
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $this->db->where('is_active', 1);
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('user');
        if($id != null) {
            $this->db->where('id_user', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post) // create data user
    {
        $params['username'] = $post['username'];
        $params['password'] = sha1($post['password']);
        $params['nama_lengkap'] = $post['fullname'];
        $params['alamat'] = $post['alamat'];
        $params['email'] = $post['email'];
        $params['level'] = $post['level'];
        $this->db->insert('user', $params);
    }

    public function edit($post) // edit data user
    {
        $params['username'] = $post['username'];
        if(!empty($post['password'])){
            $params['password'] = sha1($post['password']);
        }
        $params['nama_lengkap'] = $post['fullname'];
        $params['alamat'] = $post['alamat'] != "" ? $post['alamat'] : null;
        $params['email'] = $post['email'];
        $params['level'] = $post['level'];
        $this->db->where('id_user', $post['id_user']);
        $this->db->update('user', $params);
    }


    public function delete($id) // delete data user
	{
		$this->db->where('id_user', $id);
		$this->db->delete('user');
    }

    public function update_data($id, $data)
	{
         // update is_active user
        $this->db->where('id_user', $id);
		$this->db->update('user', $data);
		return;
    }
    
}