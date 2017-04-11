<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class usermanagement extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->database();
        $this->load->model('fetch');
        $this->load->helper('url'); // Helps to get base url defined in config.php
        $this->load->library('session'); // starts session
        $this->session_check();
    }

    public function getFlashdata() {
        $error = $this->session->flashdata('error');
        $success = $this->session->flashdata('success');
        if (!empty($error)) { // pulls data before redirect and checks for login error
            $status = array('error', $error);
            return $status;
        }
        if (!empty($success)) {
            $status = array('ok', $success);
            return $status;
        }
    }

    public function index($page) {
        if ($this->getFlashdata()) {
            $data['flashData'] = $this->getFlashdata();
        }
        $data['role_list'] = $this->fetch->getAllFromTable('role', '', '');
        $data['data_per_page'] = 5;
        $start_point = ($page - 1) * $data['data_per_page'];
        $data['total_record'] = count($this->fetch->getAllFromTable('user', '', ''));
        $end_limit = $data['data_per_page'];
        $records_from_db = $this->fetch->getAllFromTable('user', $end_limit, $start_point);
        $data['user_list'] = $records_from_db;
        $data['serial_num'] = $start_point;
        $this->load_view($data, 'index');
    }

    public function search() {
        $keyword = $this->input->get('keyword');
        if (empty($keyword)) {
            redirect('usermanagement/1', 'refresh');
        } else {
            $col = array('first_name');
            $tablename = 'user';
            $data['role_list'] = $this->fetch->getAllFromTable('role', '', '');
            $data['user_list'] = $this->fetch->search($keyword, $col, $tablename);
            $this->load_view($data, 'search');
        }
    }

    public function create() {
        $data['role_list'] = $this->fetch->getAllFromTable('role', '', '');
        $this->load_view($data, 'create');
    }

    public function add() {
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $email = $this->input->post('email');
        $gender = $this->input->post('gender');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $role = $this->input->post('role_id');
        $cols_data = array('first_name' => $first_name, 'last_name' => $last_name, 'email' => $email, 'gender' => $gender, 'username' => $username, 'password' => md5($password), 'role_id' => $role);
        $table_name = 'user';
        $this->load->model('insert');
        if ($this->insert->insertIntoTable($cols_data, $table_name)) {
            $this->session->set_flashdata('success', $first_name . ' was saved successfully!');
            $data_per_page = 5;
            $total_record = count($this->fetch->getAllFromTable('user', '', ''));
            $page_num = ceil($total_record / $data_per_page);
            redirect('usermanagement/' . $page_num, 'refresh');
        } else {
            //show unable to insert error with flash data.
            $this->session->set_flashdata('error', 'Unable to save ' . $first_name);
            redirect('usermanagement/1', 'refresh');
        }
    }

    public function edit($record_id, $page_num = null) {
        if ($this->getFlashdata()) {
            $data['flashData'] = $this->getFlashdata();
        }
        $query = $this->fetch->getSingleRecord('user', $record_id);
        foreach ($query as $record) {
            $data['first_name'] = $record->first_name;
            $data['last_name'] = $record->last_name;
            $data['email'] = $record->email;
            $data['username'] = $record->username;
            $data['gender'] = $record->gender;
            $data['role_id'] = $record->role_id;
        }
        $data['role_list'] = $this->fetch->getAllFromTable('role', '', '');
        $data['page_num'] = $page_num;
        $data['rec_id'] = $record_id;
        $this->load_view($data, 'edit');
    }

    public function update() {
        $id = $this->input->post('id');
        $page_num = $this->input->post('page_num');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $email = $this->input->post('email');
        $gender = $this->input->post('gender');
        $username = $this->input->post('username');
        $role = $this->input->post('role_id');
        $this->load->model('update');
        $cols = array('first_name' => $first_name, 'last_name' => $last_name, 'email' => $email, 'gender' => $gender, 'username' => $username, 'role_id' => $role);
        if ($this->update->updateTableRow($cols, 'user', 'id', $id)) {
            $this->session->set_flashdata('success', $first_name . ' was saved successfully!');
            redirect('usermanagement/' . $page_num, 'refresh');
        } else {
            //show unable to insert error with flash data.
            $this->session->set_flashdata('error', 'Unable to save ' . $first_name);
            redirect('usermanagement/1', 'refresh');
        }
    }

    public function delete($id, $page_num = null) {
        $this->load->model('delete');
        $query = $this->fetch->getSingleRecord('user', $id); // just fetching single record for flash data purpose
        foreach ($query as $record) {
            $first_name = $record->first_name;
        } //end of fetch code
        if ($this->delete->deleteRecord($id, 'user')) {
            $this->session->set_flashdata('success', $first_name . ' was deleted successfully!');
            $data_per_page = 5;
            $total_record = $this->fetch->getTotalCount("user");
            $curr_page = ceil($total_record / $data_per_page);
            if ($curr_page < $page_num) {
                $page_num = $page_num - 1;
            }
            redirect('usermanagement/' . $page_num, 'refresh');
        } else {
            //show unable to insert error with flash data.
            $this->session->set_flashdata('error', 'Unable to delete ' . $first_name);
            redirect('usermanagement/1', 'refresh');
        }
    }

    public function changePassword($rec_id, $page_num) {
        $data['rec_id'] = $rec_id;
        $data['page_num'] = $page_num;
        $this->load_view($data, 'password');
    }

    public function update_password() {
        $user_id = $this->input->post('id');
        $page_num = $this->input->post('page_num');
        $pass = $this->input->post('password');
        $this->load->model('update');
        $cols = array('password' => md5($pass));
        if ($this->update->updateTableRow($cols, 'user', 'id', $user_id)) {
            $this->session->set_flashdata('success', 'Password was saved successfully!');
            redirect('usermanagement/edit/' . $user_id . '/' . $page_num, 'refresh');
        } else {
            //show unable to insert error with flash data.
            $this->session->set_flashdata('error', 'Unable to save password');
            redirect('usermanagement/edit/' . $user_id . '/' . $page_num, 'refresh');
        }
    }

    public function session_check() {
        if (!isset($this->session->id)) { // id after login
            redirect('login', 'refresh');
        }
    }

    public function load_view($data, $page_name) {
        $data['title'] = ucfirst('usermanagement');
        $this->load->view('template/header', $data);
        $this->load->view('usermanagement/' . $page_name, $data);
        $this->load->view('template/footer');
    }

}
