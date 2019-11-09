<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_m extends CI_Model {

    public function get($id = null)
    {
        $this->db->from('customer');
        if($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post) {
    $params = [
        'nama'=> $post['nama'],
        'email'=> $post['email'],
        'alamat' => $post['alamat'],
    ];
    $this->db->insert('customer', $params);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('customer');
    }

    public function ubah($post) {
        $params = [
        'id' => $post['id'],
        'nama'=> $post['nama'],
        'email'=> $post['email'],
        'alamat' => $post['alamat'],
        ];
        $this->db->where('id', $post['id']);
        $this->db->update('customer', $params);
    }

}