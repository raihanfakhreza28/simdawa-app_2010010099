<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Beasiswa extends CI_Controller
{
    //kon5truktor adalah method pertama yang otomatis jalan saat controller dipanggil
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('JenisModel', 'BeasiswaModel'));
        //Meload 2 buah model, jenisModel akan digunakan untuk mengambil data jenis beasisiwa
    }
    public function index()
    {
        $data['title'] = "Data Beasiswa | SIMDAWA-APP";
        $data['beasiswa'] = $this->BeasiswaModel->get_beasiswa(); //mengambil data beasiswa dari function get_beasiswa
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('beasiswa/beasiswa_read', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        if (isset($_POST['create'])) {
            $this->BeasiswaModel->insert_beasiswa();
            redirect('beasiswa');
        } else {
            $data['title'] = "Tambah Data Beasiswa | SIMDAWA-APP";
            $data['jenis'] = $this->JenisModel->get_jenis(); //mengembil data jenis beasiswa
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('beasiswa/beasiswa_create', $data);
            //baris 31 mengirimkan data jenis beasiswa agar bisa ditampilkan pada combobox
            $this->load->view('template/footer');
        }
    }

    public function ubah($id)
    {
        if (isset($_POST['update'])) {
            $this->BeasiswaModel->update_beasiswa();
            redirect('beasiswa');
        } else {
            $data['jenis'] = $this->JenisModel->get_jenis();
            $data['title'] = "Perbaharui Data Beasiswa | SIMDAWA-APP";
            $data['beasiswa'] = $this->BeasiswaModel->get_beasiswa_byid($id);
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('beasiswa/beasiswa_update', $data);
            $this->load->view('template/footer');
        }
    }

    public function hapus($id)
    {
        if (isset($id)) {
            $this->BeasiswaModel->delete_beasiswa($id);
            redirect('beasiswa');
        }
    }
}
