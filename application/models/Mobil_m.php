<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil_m extends CI_Model {

    public function get($id = null)
    {
        $query = $this->db->query("SELECT cars.id, nama,brand_id, nama_brand, gambar, warna, deskripsi, stock, create_time, update_time FROM cars, brand WHERE cars.brand_id = brand.id");
        return $query;
    }

    public function add($post) {

    $date = Date("Y-m-d H:i:s");

    $params = [
        'nama'=> $post['nama'],
        'brand_id'=> $post['nama_brand'],
        'gambar' => $post['gambar'],
        'warna'=> $post['warna'],
        'deskripsi'=> $post['deskripsi'],
        'stock' => $post['stock'],
        'create_time' => $date,
        'update_time' => $date,
    ];
    $this->db->insert('cars', $params);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('cars');
    }

    public function ubah($post) {

    	$date = Date("Y-m-d H:i:s");

        $params = [
        'id' => $post['id'],
        'nama'=> $post['nama'],
        'brand_id'=> $post['nama_brand'],
        'gambar' => $post['gambar'],
        'warna'=> $post['warna'],
        'deskripsi'=> $post['deskripsi'],
        'stock' => $post['stock'],
        'update_time' => $date,
        ];
        $this->db->where('id', $post['id']);
        $this->db->update('cars', $params);
    }

}