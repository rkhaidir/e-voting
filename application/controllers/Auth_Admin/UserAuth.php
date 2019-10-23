<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserAuth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('AdminModel');
        $data = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
        if($data['role_id'] != 1) {
            redirect('/Auth_Admin/Beranda');
        }
    }

	public function index()
	{
        $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
        $data['userdata'] = $this->UserModel->showUser()->result_array();
        $data['title'] = "User Management - E-voting";
        $this->load->view('layout/header_layout', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('content/user', $data);
		$this->load->view('layout/footer_layout');
    }
    
    public function tambahUser() {
        if($this->input->post('simpan-user')) {
            $this->form_validation->set_message('required', 'Tidak Boleh Kosong');
            $this->form_validation->set_message('is_unique', 'Username Sudah Digunakan');
            $this->form_validation->set_message('min_length', 'Username Minimal 6 Karakter');
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tb_admin.admin_username]|min_length[6]');
            $this->form_validation->set_rules('role', 'Role', 'trim|required');
            if($this->form_validation->run() == FALSE) {
                $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
                $data['title'] = "User Management - E-voting";
                $data['role'] = $this->UserModel->getRole()->result_array();
                $this->load->view('layout/header_layout', $data);
                $this->load->view('layout/sidebar', $data);
                $this->load->view('layout/topbar', $data);
                $this->load->view('content/user_tambah', $data);
                $this->load->view('layout/footer_layout');
            } else {
                $nama = $this->input->post('nama');
                $username = $this->input->post('username');
                $password = password_hash($this->input->post('username'), PASSWORD_DEFAULT);
                $role = $this->input->post('role');

                $obj = [
                    'admin_nama' => $nama,
                    'admin_username' => $username,
                    'admin_password' => $password,
                    'role_id' => $role
                ];

                $this->UserModel->insertUser($obj);
                redirect('Auth_Admin/UserAuth', 'refresh');

            }
        } else {
            $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
            $data['title'] = "User Management - E-voting";
            $data['role'] = $this->UserModel->getRole()->result_array();
            $this->load->view('layout/header_layout', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('layout/topbar', $data);
            $this->load->view('content/user_tambah', $data);
            $this->load->view('layout/footer_layout'); 
        }
    }
}
