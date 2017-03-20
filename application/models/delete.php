<?php

Class delete extends CI_Model {

    public function deleteRecord($id, $table) {
        $this->db->where('id', $id);
        if ($this->db->delete($table)) {
            return TRUE;
        } else {
            return false;
        }
    }

}
