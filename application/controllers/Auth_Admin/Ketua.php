<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ketua extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('KetuaModel');
        $this->load->model('AdminModel');
        $this->load->model('TemaModel');
    }

	public function index()
	{
        $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
        $ketua['ketua'] = $this->KetuaModel->showKetua()->result_array();
        $data['title'] = "Calon Ketua - E-voting";
        $this->load->view('layout/header_layout', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('content/ketua', $ketua, $data);
		$this->load->view('layout/footer_layout');
    }
    
    public function tambahKetua()
	{
        if($this->input->post('simpan_ketua')) {
            $this->form_validation->set_message('required', 'Tidak Boleh Kosong');
            $this->form_validation->set_message('numeric', 'Hanya Boleh Diisi Angka');
            $this->form_validation->set_rules('nama', 'Nama Calon Ketua', 'trim|required');
            $this->form_validation->set_rules('nourut', 'Nomor Urut', 'trim|required|numeric');
            $this->form_validation->set_rules('jenis', 'Jenis', 'required');
            if($this->form_validation->run() == FALSE) {
                $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
                $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
                if($data['user']['role_id'] != 1) {
                    redirect('Auth_Admin/Beranda');
                }
                $data['tema'] = $this->TemaModel->getTemaActive()->result_array();
                $data['title'] = "Calon Ketua - E-voting";
                $this->load->view('layout/header_layout', $data);
                $this->load->view('layout/sidebar', $data);
                $this->load->view('layout/topbar', $data);
                $this->load->view('content/ketua_tambah', $data);
                $this->load->view('layout/footer_layout');
            } else {
                $config['upload_path'] = './assets/img';
                $config['allowed_types'] = 'jpg|png|JPG|PNG';
                $config['max_size'] = '4096';

                $this->load->library('upload', $config);
                if($this->upload->do_upload('foto')) {
                    $file = array('upload_data' => $this->upload->data());

                    $nama = $this->input->post('nama');
                    $nourut = $this->input->post('nourut');
                    $image = $file['upload_data']['file_name'];
                    $visimisi = $this->input->post('visimisi');
                    $jenis = $this->input->post('jenis');
                    
                    $object = array(
                        'calon_ketua_nama' => $nama,
                        'calon_ketua_nourut' => $nourut,
                        'calon_ketua_foto' => $image,
                        'calon_ketua_visimisi' => $visimisi,
                        'calon_ketua_suara' => 0,
                        'tema_id' => $jenis
                    );

                    $this->KetuaModel->insertKetua($object);
                    redirect('/Auth_Admin/Ketua','refresh');
                }
            }
        } else {
            $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
            $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
            if($data['user']['role_id'] != 1) {
                redirect('Auth_Admin/Beranda');
            }
            $data['tema'] = $this->TemaModel->getTemaActive()->result_array();
            $data['title'] = "Calon Ketua - E-voting";
            $this->load->view('layout/header_layout', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('layout/topbar', $data);
            $this->load->view('content/ketua_tambah', $data);
            $this->load->view('layout/footer_layout');
        }
    }
    
    public function ubahKetua($id) {
        if($this->input->post('ubah_ketua')) {
            if(empty($_FILES['foto']['name'])) {
                $this->form_validation->set_message('required', 'Tidak Boleh Kosong');
                $this->form_validation->set_message('numeric', 'Hanya Boleh Diisi Angka');
                $this->form_validation->set_rules('nama', 'Nama Calon Ketua', 'trim|required');
                $this->form_validation->set_rules('nourut', 'Nomor Urut', 'trim|required|numeric');
                if($this->form_validation->run() == FALSE) {
                    $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
                    $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
                    if($data['user']['role_id'] != 1) {
                        redirect('Auth_Admin/Beranda');
                    }
                    $data['tema'] = $this->TemaModel->getTemaActive()->result_array();
                    $ketua['ketua'] = $this->KetuaModel->getKetua($id)->row();
                    $data['title'] = "Calon Ketua - E-voting";
                    $this->load->view('layout/header_layout', $data);
                    $this->load->view('layout/sidebar', $data);
                    $this->load->view('layout/topbar', $data);
                    $this->load->view('content/ketua_edit', $ketua);
                    $this->load->view('layout/footer_layout');
                } else {
                    $nama = $this->input->post('nama');
                    $nourut = $this->input->post('nourut');
                    $visimisi = $this->input->post('visimisi');
                    $jenis = $this->input->post('jenis');

                    $object = array(
                        "calon_ketua_nama" => $nama,
                        "calon_ketua_nourut" => $nourut,
                        "calon_ketua_visimisi" => $visimisi,
                        'tema_id' => $jenis
                    );
                    $this->KetuaModel->updateKetua($id, $object);
                    redirect('/Auth_Admin/Ketua','refresh');
                }
            } else {
                $this->form_validation->set_message('required', 'Tidak Boleh Kosong');
                $this->form_validation->set_message('numeric', 'Hanya Boleh Diisi Angka');
                $this->form_validation->set_rules('nama', 'Nama Calon Ketua', 'trim|required');
                $this->form_validation->set_rules('nourut', 'Nomor Urut', 'trim|required|numeric');
                if($this->form_validation->run() == FALSE) {
                    $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
                    $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
                    if($data['user']['role_id'] != 1) {
                        redirect('Auth_Admin/Beranda');
                    }
                    $data['tema'] = $this->TemaModel->getTemaActive()->result_array();
                    $ketua['ketua'] = $this->KetuaModel->getKetua($id)->row();
                    $data['title'] = "Calon Ketua - E-voting";
                    $this->load->view('layout/header_layout', $data);
                    $this->load->view('layout/sidebar', $data);
                    $this->load->view('layout/topbar', $data);
                    $this->load->view('content/ketua_edit', $ketua);
                    $this->load->view('layout/footer_layout');
                } else {
                    $getKetua = $this->KetuaModel->getKetua($id)->row();
                    unlink('./assets/img/'.$getKetua->calon_ketua_foto);

                    $config['upload_path'] = './assets/img';
                    $config['allowed_types'] = 'jpg|png|JPG|PNG';
                    $config['max_size'] = '4096';

                    $this->load->library('upload', $config);
                    if($this->upload->do_upload('foto')) {
                        $file = array('upload_data' => $this->upload->data());

                        $nama = $this->input->post('nama');
                        $nourut = $this->input->post('nourut');
                        $image = $file['upload_data']['file_name'];
                        $visimisi = $this->input->post('visimisi');
                        $jenis = $this->input->post('jenis');
                        $object2 = array(
                            'calon_ketua_nama' => $nama,
                            'calon_ketua_nourut' => $nourut,
                            'calon_ketua_foto' => $image,
                            "calon_ketua_visimisi" => $visimisi,
                            'tema_id' => $jenis
                        );
                        $this->KetuaModel->updateKetua($id, $object2);
                        redirect('/Auth_Admin/Ketua','refresh');
                    }
                }
            }
        } else {
            $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
            if($data['user']['role_id'] != 1) {
                redirect('Auth_Admin/Beranda');
            }
            $data['tema'] = $this->TemaModel->getTemaActive()->result_array();
            $ketua['ketua'] = $this->KetuaModel->getKetua($id)->row();
            $data['title'] = "Calon Ketua - E-voting";
            $this->load->view('layout/header_layout', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('layout/topbar', $data);
            $this->load->view('content/ketua_edit', $ketua);
            $this->load->view('layout/footer_layout');
        }
    }

    public function detailKetua($id) {
        $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
        $ketua['ketua'] = $this->KetuaModel->getKetua($id)->row_array();
        $data['title'] = "Calon Ketua - E-voting";
        $this->load->view('layout/header_layout', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('content/ketua_detail', $ketua);
        $this->load->view('layout/footer_layout');
    }

    public function hapusKetua($id) {
        $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
        if($data['user']['role_id'] != 1) {
            redirect('Auth_Admin/Beranda');
        }
        $getKetua = $this->KetuaModel->getKetua($id)->row();
        unlink('./assets/img/'.$getKetua->calon_ketua_foto);
        $this->KetuaModel->deleteKetua($id);
        redirect('/Auth_Admin/Ketua','refresh');
    }
}
