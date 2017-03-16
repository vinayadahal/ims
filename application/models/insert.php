<?php

Class insert extends CI_Model {

    function insertIntoTable($cols_data, $table_name) {
        if ($this->db->insert($table_name, $cols_data)) {
            return TRUE;
        } else {
            return false;
        }
    }

}
