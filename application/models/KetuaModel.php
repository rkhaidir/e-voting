<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KetuaModel extends CI_Model {

    public function showKetua(){
        $this->db->select('*');
        $this->db->from('tb_calon_ketua');
        $this->db->join('tb_tema_pemilihan', 'tb_tema_pemilihan.tema_id = tb_calon_ketua.tema_id');
        return $this->db->get();
    }

    public function insertKetua($data) {
        return $this->db->insert('tb_calon_ketua', $data);
    }

    public function getKetua($id) {
        $this->db->select('*');
        $this->db->from('tb_calon_ketua');
        $this->db->join('tb_tema_pemilihan', 'tb_tema_pemilihan.tema_id = tb_calon_ketua.tema_id');
        $this->db->where('calon_ketua_id', $id);
        return $this->db->get();
    }

    public function getCalon($id) {
        return $this->db->get_where('tb_calon_ketua', ['calon_ketua_id', $id]);
    }

    public function updateKetua($id, $data) {
        $this->db->where('calon_ketua_id', $id);
        return $this->db->update('tb_calon_ketua', $data);
    }

    public function deleteKetua($id) {
        return $this->db->delete('tb_calon_ketua', array('calon_ketua_id' => $id));
    }
}