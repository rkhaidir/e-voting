<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet;

class Cetak extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('SuaraModel');
        $this->load->model('AdminModel');
        $this->load->model('TemaModel');
        $this->load->model('HasilModel');
        $this->load->model('KetuaModel');
        $data = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
        if($data['role_id'] != 1 && $data['role_id'] != 3) {
            redirect('/Auth_Admin/Beranda');
        }
    }

    public function cetakSuara($id) {
        $suara = $this->SuaraModel->getSuara($id)->result_array();
        $tema = $this->SuaraModel->getTema($id)->row_array();
        $filename = "hasil_pemilihan_".$tema['tema_nama']."xlsx";

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('B1', $tema['tema_nama']);
        
        $sheet->setCellValue('A3', 'No.');
        $sheet->setCellValue('B3', 'Nama Calon');
        $sheet->setCellValue('C3', 'Hasil Suara Pemilihan');
        $row = 5;
        foreach($suara as $s) {
            $sheet->setCellValue('A'. $row, $s['calon_ketua_nourut']);
            $sheet->setCellValue('B'. $row, $s['calon_ketua_nama']);
            $sheet->setCellValue('C'. $row, $s['calon_ketua_suara']);
            $row++;
        }

        $newRow = $row+3;

        $sheet->setCellValue('A'.$newRow, "Tanda Tangan Saksi");

        $write = new Xlsx($spreadsheet);
        $write->save("assets/".$filename);
        header("Content-Type: application/vnd.ms-excel");
        redirect(base_url()."/assets/".$filename);

    }

    public function cetakPemilih($id) {
        $data = $this->HasilModel->getPemilihInSuara($id)->result_array();
        $tema = $this->SuaraModel->getTema($id)->row_array();
        $filename = "daftar_pemilih_".$tema['tema_nama'].".xlsx";
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('B1', $tema['tema_nama']);

        $sheet->setCellValue('A3', 'No.');
        $sheet->setCellValue('B3', 'Nama Pemilih');
        $sheet->setCellValue('C3', 'Nama Calon');
        $row = 4;
        $no = 1;
        foreach($data as $d) {
            $sheet->setCellValue('A'.$row, $no);
            $sheet->setCellValue('B'.$row, $d['pemilih_nama']);
            $sheet->setCellValue('C'.$row, $d['calon_ketua_nama']);
            $no++;
            $row++;
        }
        $write = new Xlsx($spreadsheet);
        $write->save("assets/".$filename);
        header("Content-Type: application/vnd-ms-excel");
        redirect(base_url()."/assets/".$filename);
    }

}