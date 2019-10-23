<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function getRole() {
        return $this->db->get('tb_user_role');
    }

    public function showUser() {
        $this->db->select('*');
        $this->db->from('tb_admin');
        $this->db->join('tb_user_role', 'tb_user_role.role_id = tb_admin.role_id');
        return $this->db->get();
    }

    public function insertUser($data) {
        return $this->db->insert('tb_admin', $data);
    }
}