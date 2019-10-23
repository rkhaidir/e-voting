<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HasilModel extends CI_Model {

    public function getPemilihHasil($tema, $pemilih) {
        return $this->db->get_where('tb_suara', ['tema_id' => $tema ,'pemilih_id' => $pemilih]);
    }

    public function getCalon($id) {
        $this->db->where('tema_id', $id);
        return $this->db->get_where('tb_calon_ketua');
    }

    public function getTemaInCalon($id) {
        $this->db->where('calon_ketua_id', $id);
        return $this->db->get_where('tb_calon_ketua');
    }

    public function insertSuara($data) {
        return $this->db->insert('tb_suara', $data);
    }

    public function getPemilihInSuara($tema) {
        $this->db->select('*');
        $this->db->from('tb_suara');
        $this->db->join('tb_pemilih', 'tb_pemilih.pemilih_id = tb_suara.pemilih_id');
        $this->db->join('tb_calon_ketua', 'tb_calon_ketua.calon_ketua_id = tb_suara.calon_ketua_id');
        $this->db->join('tb_tema_pemilihan', 'tb_tema_pemilihan.tema_id = tb_suara.tema_id');
        $this->db->where('tb_suara.tema_id', $tema);
        return $this->db->get();
    }
}