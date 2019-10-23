<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogin extends CI_Controller {

	public function index()
	{
		if($this->input->post('login')) {
			$this->form_validation->set_message('required', 'Tidak Boleh Kosong');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if($this->form_validation->run() == FALSE) {
				$this->load->view('login_layout/admin_login');
			} else {
				$this->_login();
			}
		} else {
			$this->load->view('login_layout/admin_login');
		}
	}

	private function _login() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('tb_admin', ['admin_username' => $username])->row_array();

		if($user) {
			if(password_verify($password, $user['admin_password'])) {
				$data = [
					'username' => $user['admin_username'],
					'role_id' => $user['role_id']
				];
				$this->session->set_userdata($data);
				
				redirect('/Auth_Admin/Beranda', 'refresh');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</a>');
				redirect('AdminLogin');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Tidak Terdaftar</a>');
			redirect('AdminLogin');
		}
	}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');
		redirect('AdminLogin');
	}
}
