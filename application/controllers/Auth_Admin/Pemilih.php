<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilih extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("PemilihModel");
        $this->load->model('AdminModel');
    }

    public function index() {
        $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
        $pemilih['pemilih'] = $this->PemilihModel->showPemilih()->result_array();
        $data['title'] = "Data Pemilih - E-voting";
        $this->load->view('layout/header_layout', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('content/pemilih', $pemilih, $data);
		$this->load->view('layout/footer_layout');
    }

    public function tambahPemilih() {
        if($this->input->post('simpan-pemilih')) {
            $this->form_validation->set_message('required', 'Tidak Boleh Kosong');
            $this->form_validation->set_rules('nopemilih', 'Nomor Pemilih', 'trim|required');
            $this->form_validation->set_rules('namapemilih', 'Nama Pemilih', 'trim|required');
            if($this->form_validation->run() == FALSE) {
                $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
                if($data['user']['role_id'] != 1) {
                    redirect('Auth_Admin/Beranda');
                }
                $data['title'] = "Data Pemilih - E-voting";
                $this->load->view('layout/header_layout', $data);
                $this->load->view('layout/sidebar', $data);
                $this->load->view('layout/topbar', $data);
                $this->load->view('content/pemilih_tambah');
                $this->load->view('layout/footer_layout'); 
            } else {
                $nopemilih = $this->input->post('nopemilih');
                $namapemilih = $this->input->post('namapemilih');
                $verifikasi = "0";
                $memilih = "0";
                $data = array(
                    "pemilih_nomor" => $nopemilih,
                    "pemilih_nama" => $namapemilih,
                    "pemilih_verifikasi" => $verifikasi,
                    "pemilih_status" => $memilih
                );
                $this->PemilihModel->insertPemilih($data);
                redirect('/Auth_Admin/Pemilih','refresh');
            }
        } else {
            $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
            if($data['user']['role_id'] != 1) {
                redirect('Auth_Admin/Beranda');
            }
            $data['title'] = "Data Pemilih - E-voting";
            $this->load->view('layout/header_layout', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('layout/topbar', $data);
            $this->load->view('content/pemilih_tambah');
            $this->load->view('layout/footer_layout'); 
        }
    }

    public function ubahPemilih($id) {
        if($this->input->post('ubah-pemilih')) {
            $this->form_validation->set_message('required', 'Tidak Boleh Kosong');
            $this->form_validation->set_rules('nopemilih', 'Nomor Pemilih', 'trim|required');
            $this->form_validation->set_rules('namapemilih', 'Nama Pemilih', 'trim|required');
            if($this->form_validation->run() == FALSE) {
                $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
                if($data['user']['role_id'] != 1) {
                    redirect('Auth_Admin/Beranda');
                }
                $pemilih['pemilih'] = $this->PemilihModel->getPemilih($id)->row_array();
                $data['title'] = "Data Pemilih - Administrator";
                $this->load->view('layout/header_layout', $data);
                $this->load->view('layout/sidebar', $data);
                $this->load->view('layout/topbar', $data);
                $this->load->view('content/pemilih_ubah', $pemilih);
                $this->load->view('layout/footer_layout'); 
            } else {
                $noPemilih = $this->input->post('nopemilih');
                $namaPemilih = $this->input->post('namapemilih');
                $verifikasi = $this->input->post('verifikasi');
                $memilih = $this->input->post('memilih');
                $object = array(
                    "pemilih_nomor" => $noPemilih,
                    "pemilih_nama" => $namaPemilih,
                    "pemilih_verifikasi" => $verifikasi,
                    "pemilih_status" => $memilih
                );
                $this->PemilihModel->updatePemilih($id, $object);
                redirect('/Auth_Admin/Pemilih','refresh');
            }
        } else {
            $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
            if($data['user']['role_id'] != 1) {
                redirect('Auth_Admin/Beranda');
            }
            $pemilih['pemilih'] = $this->PemilihModel->getPemilih($id)->row_array();
            $data['title'] = "Data Pemilih - E-voting";
            $this->load->view('layout/header_layout', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('layout/topbar', $data);
            $this->load->view('content/pemilih_ubah', $pemilih);
            $this->load->view('layout/footer_layout'); 
        }
    }

    public function hapusPemilih($id) {
        $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
        if($data['user']['role_id'] != 1) {
            redirect('Auth_Admin/Beranda');
        }
        $this->PemilihModel->deletePemilih($id);
        redirect('/Auth_Admin/Pemilih','refresh');
    }

    public function importExcel() {
        $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
            if($data['user']['role_id'] != 1) {
                redirect('Auth_Admin/Beranda');
            }
        if($this->input->post('import-excel')) {
            
            $this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));
            $fileName = $_FILES['fileexcel']['name'];

            $config['upload_path'] = './assets/';
            $config['file_name'] = $fileName;
            $config['allowed_types'] = 'xlsx';
            $config['max_size'] = 102400;

            $this->load->library('upload');
            $this->upload->initialize($config);
            
            if($this->upload->do_upload('fileexcel')) {
                $media = $this->upload->data('fileexcel');
                $inputFileName = './assets/'.$this->upload->file_name;
                
                try {
                    $inputFileType = IOFactory::identify($inputFileName);
                    $objReader = IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($inputFileName);
                } catch(Exception $e) {
                    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
                }

                if($this->input->post('hapus') == 1)
                {
                    $this->db->truncate('tb_pemilih');
                }

                $sheet = $objPHPExcel->getSheet(0);
                $highestRow = $sheet->getHighestRow();
                $highestColumn = $sheet->getHighestColumn();
                
                for ($row = 2; $row <= $highestRow; $row++) 
                {                  //  Read a row of data into an array                 
                    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

                    //Sesuaikan sama nama kolom tabel di database                                
                    $data = array(
                        "pemilih_nomor"=> $rowData[0][0],
                        "pemilih_nama"=> $rowData[0][1],
                        "pemilih_verifikasi"=> "0",
                        "pemilih_status"=> "0"
                    );

                    $this->PemilihModel->insertPemilih($data);
                }
                unlink('./assets/'.$this->upload->file_name);
                redirect('/Auth_Admin/Pemilih','refresh');
            }
        }
    }

    public function pemilihVerifikasi($id) {
        $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
        $pemilih['pemilih'] = $this->PemilihModel->getPemilih($id)->row_array();
        $data['title'] = "Data Pemilih - E-voting";
        $this->load->view('layout/header_layout', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('content/pemilih_verifikasi', $pemilih);
        $this->load->view('layout/footer_layout'); 
    }

    public function verifikasi($id) {
        $verifikasi = "1";
        $object = array("pemilih_verifikasi" => $verifikasi);
        $this->PemilihModel->updatePemilih($id, $object);
        redirect('/Auth_Admin/Pemilih/pemilihVerifikasi/'.$id, 'refresh');
    }

    public function resetPemilih() {
        $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
        if($data['user']['role_id'] != 1) {
            redirect('Auth_Admin/Beranda');
        }
        $verifikasi = "0";
        $memilih = "0";
        $data = array("pemilih_verifikasi" => $verifikasi, "pemilih_status" => $memilih);
        $this->PemilihModel->resetPemilih($data);
        redirect('/Auth_Admin/Pemilih','refresh');
    }
}