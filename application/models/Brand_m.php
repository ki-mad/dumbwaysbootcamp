<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand_m extends CI_Model {

    public function get($id = null)
    {
        $this->db->from('brand');
        if($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post) {
    $params = [
        'nama_brand'=> $post['nama'],
    ];
    $this->db->insert('brand', $params);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('brand');
    }

    public function ubah($post) {
        $params = [
        'id' => $post['id'],
        'nama_brand'=> $post['nama'],
        ];
        $this->db->where('id', $post['id']);
        $this->db->update('brand', $params);
    }

}