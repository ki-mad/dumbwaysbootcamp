<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Controller {

    function __construct()
	{
		parent::__construct();
        $this->load->model('brand_m');
    }

	public function index()
	{
        $data['row'] = $this->brand_m->get();
		$this->template->load('template', 'brand/data_brand', $data);
    }
    
    public function delete($id) {
        $this->brand_m->delete($id);
        if($this->db->affected_rows() > 0 ) {
			echo "<script>alert('Data berhasil di hapus')</script>";
		}
		echo "<script>window.location='".site_url('brand')."'</script>";
    }

    public function tambah () {
        
        $brand = new stdClass();
        $brand->id = null;
        $brand->nama_brand = null;

        $data = array(
            'page' => 'tambah',
            'row' => $brand,
        );
        $this->template->load('template', 'brand/form_brand', $data);
    }

    public function ubah($id) {
        $query = $this->brand_m->get($id);
        if($query->num_rows() > 0) {
            $brand = $query->row();
            $data = array(
                'page' => 'ubah',
                'row' => $brand
            );
            $this->template->load('template', 'brand/form_brand', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan')";
            echo "window.location='".site_url('brand')."'</script>";
        }
    }

    public function proses() {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['tambah'])) {
            $this->brand_m->add($post);
        } else if(isset($_POST['ubah'])) {
            $this->brand_m->ubah($post);
        }
        if($this->db->affected_rows() > 0 ) {
          echo "<script>alert('Data berhasil di simpan')</script>";
        }
        echo "<script>window.location='".site_url('brand')."'</script>";
    }
}