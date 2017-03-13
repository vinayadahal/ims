<?php

class fetch extends CI_Model {

    function getAllFromTable($table) {
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result();
    }

    function getUserLogin($username, $password) {
        $this->db->select('id, first_name, gender, username, password, role');
        $this->db->from('user');
        $this->db->where('username', $username);
//        $this->db->where('password', sha1($password));
        $this->db->where('password', $password);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function getUserDetails($id) {
        $this->db->select('first_name, gender');
        $this->db->from('user');
        $this->db->where('id', $id);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

}
