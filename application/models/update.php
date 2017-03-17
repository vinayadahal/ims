<?php

Class update extends CI_Model {

    function updateTableRow($cols, $table, $id, $val) {
        $this->db->where($id, $val);
        if ($this->db->update($table, $cols)) {
            return TRUE;
        } else {
            return false;
        }
    }

}
