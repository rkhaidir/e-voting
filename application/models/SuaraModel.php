<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuaraModel extends CI_Model {

    public function getSuara($id) {
        $this->db->where('tema_id', $id);
        return $this->db->get('tb_calon_ketua');
    }

    public function getTemaActive() {
        return $this->db->get_where('tb_tema_pemilihan', ['tema_is_active' => "1"]);
    }

    public function getTema($id) {
        return $this->db->get_where('tb_tema_pemilihan', ['tema_id' => $id]);
    }

    public function countPemilih($id) {
        $this->db->where('tema_id', $id);
        return $this->db->count_all_results('tb_suara');
    }

    public function countPemilihAll() {
        return $this->db->count_all_results('tb_pemilih');
    }

    
}