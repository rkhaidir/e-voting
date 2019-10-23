<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemilihModel extends CI_Model {

    public function showPemilih() {
        return $this->db->get('tb_pemilih');
    }

    public function insertPemilih($data) {
        return $this->db->insert('tb_pemilih', $data);
    }

    public function getPemilih($id) {
        return $this->db->get_where('tb_pemilih', array('pemilih_id' => $id));
    }

    public function updatePemilih($id, $data) {
        $this->db->where("pemilih_id", $id);
        return $this->db->update('tb_pemilih', $data);
    }

    public function deletePemilih($id) {
        return $this->db->delete("tb_pemilih", array("pemilih_id" => $id));
    }

    public function resetPemilih($data) {
        return $this->db->update('tb_pemilih', $data);
    }

    public function countPemilih() {
        return $this->db->get('tb_pemilih')->num_rows();
    }
}