<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suara extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('SuaraModel');
        $this->load->model('AdminModel');
        $this->load->model('TemaModel');
        $data = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
        if($data['role_id'] != 1 && $data['role_id'] != 3) {
            redirect('/Auth_Admin/Beranda');
        }
    }

    public function index() {
        date_default_timezone_set("Asia/Makassar");
        $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
        $suara['tema'] = $this->SuaraModel->getTemaActive()->result_array();
        $data['title'] = "Hasil Suara - E-voting";


        $this->load->view('layout/header_layout', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('content/suara', $suara);
		$this->load->view('layout/footer_layout', $suara);
    }

    public function detailSuara($id) {
        date_default_timezone_set("Asia/Makassar");
        $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
        $suara['suara'] = $this->SuaraModel->getSuara($id)->result_array();
        $suara['tema'] = $this->SuaraModel->getTema($id)->row_array();
        $suara['count'] = $this->SuaraModel->countPemilih($id);
        $data['title'] = "Hasil Suara - E-voting";

        if(time() <= $suara['tema']['tema_batas']) {
            echo "<meta http-equiv='refresh' content='1'>";
        } else {}

        $this->load->view('layout/header_layout', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('content/suara_detail', $suara);
		$this->load->view('layout/footer_layout', $suara);
    }
}