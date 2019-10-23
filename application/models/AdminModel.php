<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {

    public function getAdmin($data) {
        $this->db->select('*');
        $this->db->from('tb_admin');
        $this->db->join('tb_user_role', 'tb_user_role.role_id = tb_admin.role_id');
        $this->db->where('admin_username', $data);
        return $this->db->get();
    }
}