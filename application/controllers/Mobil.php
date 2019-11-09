<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil extends CI_Controller {

    function __construct()
	{
		parent::__construct();
        $this->load->model(['mobil_m', 'brand_m']);
    }

	public function index()
	{
        $data['row'] = $this->mobil_m->get();
		$this->template->load('template', 'mobil/data_mobil', $data);
    }
    
    public function delete($id) {
        $this->mobil_m->delete($id);
        if($this->db->affected_rows() > 0 ) {
			echo "<script>alert('Data berhasil di hapus')</script>";
		}
		echo "<script>window.location='".site_url('mobil')."'</script>";
    }

    public function tambah () {
        
        $mobil = new stdClass();
        $mobil->id = null;
        $mobil->nama = null;
        $mobil->nama_brand = null;
        $mobil->gambar = null;
        $mobil->warna = null;
        $mobil->deskripsi = null;
        $mobil->create_time = null;
        $mobil->update_time = null;
        $mobil->stock = null;

        $query_brand = $this->brand_m->get();
        $nama_brand[null] = '- Pilih -';
        foreach($query_brand->result() as $b) {
            $nama_brand[$b->id] = $b->nama_brand;
        }
        $data = array(
            'page' => 'tambah',
            'row' => $mobil,
            'nama_brand' => $nama_brand, 'selectedbrand' => null,
        );
        $this->template->load('template', 'mobil/form_mobil', $data);
    }

    public function ubah($id) {
        $query = $this->mobil_m->get($id);
        if($query->num_rows() > 0) {
            $mobil = $query->row();
            $query_brand = $this->brand_m->get();
            $nama_brand[null] = '- Pilih -';
            foreach($query_brand->result() as $b) {
            $nama_brand[$b->id] = $b->nama_brand;
            }

            $data = array(
                'page' => 'ubah',
                'row' => $mobil,
                'nama_brand' => $nama_brand, 'selectedbrand' => $mobil->brand_id,
            );
            $this->template->load('template', 'mobil/form_mobil', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan')";
            echo "window.location='".site_url('mobil')."'</script>";
        }
    }

    public function proses() {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['tambah'])) {
            $this->mobil_m->add($post);
        } else if(isset($_POST['ubah'])) {
            $this->mobil_m->ubah($post);
        }
        if($this->db->affected_rows() > 0 ) {
          echo "<script>alert('Data berhasil di simpan')</script>";
        }
        echo "<script>window.location='".site_url('mobil')."'</script>";
    }
}