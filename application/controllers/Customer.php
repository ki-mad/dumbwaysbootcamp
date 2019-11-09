<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    function __construct()
	{
		parent::__construct();
        $this->load->model('customer_m');
    }

	public function index()
	{
        $data['row'] = $this->customer_m->get();
		$this->template->load('template', 'customer/data_customer', $data);
    }
    
    public function delete($id) {
        $this->customer_m->delete($id);
        if($this->db->affected_rows() > 0 ) {
			echo "<script>alert('Data berhasil di hapus')</script>";
		}
		echo "<script>window.location='".site_url('customer')."'</script>";
    }

    public function tambah () {
        
        $customer = new stdClass();
        $customer->id = null;
        $customer->nama = null;
        $customer->email = null;
        $customer->alamat = null;

        $data = array(
            'page' => 'tambah',
            'row' => $customer,
        );
        $this->template->load('template', 'customer/form_customer', $data);
    }

    public function ubah($id) {
        $query = $this->customer_m->get($id);
        if($query->num_rows() > 0) {
            $customer = $query->row();
            $data = array(
                'page' => 'ubah',
                'row' => $customer
            );
            $this->template->load('template', 'customer/form_customer', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan')";
            echo "window.location='".site_url('customer')."'</script>";
        }
    }

    public function proses() {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['tambah'])) {
            $this->customer_m->add($post);
        } else if(isset($_POST['ubah'])) {
            $this->customer_m->ubah($post);
        }
        if($this->db->affected_rows() > 0 ) {
          echo "<script>alert('Data berhasil di simpan')</script>";
        }
        echo "<script>window.location='".site_url('customer')."'</script>";
    }
}