<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class client extends CI_Controller {

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
        $data['data_per_page'] = 5;
        $start_point = ($page - 1) * $data['data_per_page'];
        $data['total_record'] = count($this->fetch->getAllFromTable('client', '', ''));
        $end_limit = $data['data_per_page'];
        $records_from_db = $this->fetch->getAllFromTable('client', $end_limit, $start_point);
        $data['client_list'] = $records_from_db;
        $data['serial_num'] = $start_point;
        $this->load_view($data, 'index');
    }

    public function search() {
        $keyword = $this->input->get('keyword');
        if (empty($keyword)) {
            redirect('client/1', 'refresh');
        } else {
            $col = array('name', 'email', 'phone', 'mobile', 'address');
            $tablename = 'client';
            $data['client_list'] = $this->fetch->search($keyword, $col, $tablename);
            $this->load_view($data, 'search');
        }
    }

    public function create() {
        $this->load_view('', 'create');
    }

    public function add() {
        $client_name = $this->input->post('client_name');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');
        $mobile = $this->input->post('mobile');
        $cols_data = array('name' => $client_name, 'email' => $email, 'address' => $address, 'phone' => $phone, 'mobile' => $mobile);
        $table_name = 'client';
        $this->load->model('insert');
        if ($this->insert->insertIntoTable($cols_data, $table_name)) {
            $this->session->set_flashdata('success', $client_name . ' was saved successfully!');
            $data_per_page = 5;
            $total_record = count($this->fetch->getAllFromTable('client', '', ''));
            $page_num = ceil($total_record / $data_per_page);
            redirect('client/' . $page_num, 'refresh');
        } else {
            //show unable to insert error with flash data.
            $this->session->set_flashdata('error', 'Unable to save ' . $client_name);
            redirect('client/1', 'refresh');
        }
    }

    public function edit($record_id, $page_num = null) {
        $query = $this->fetch->getSingleRecord('client', $record_id);
        foreach ($query as $record) {
            $data['client_name'] = $record->name;
            $data['email'] = $record->email;
            $data['address'] = $record->address;
            $data['phone'] = $record->phone;
            $data['mobile'] = $record->mobile;
        }
        $data['page_num'] = $page_num;
        $data['rec_id'] = $record_id;
        $this->load_view($data, 'edit');
    }

    public function update() {
        $id = $this->input->post('id');
        $client_name = $this->input->post('client_name');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');
        $mobile = $this->input->post('mobile');
        $page_num = $this->input->post('page_num');
        $this->load->model('update');
        $cols = array('name' => $client_name, 'email' => $email, 'address' => $address, 'phone' => $phone, 'mobile' => $mobile);
        if ($this->update->updateTableRow($cols, 'client', 'id', $id)) {
            $this->session->set_flashdata('success', $client_name . ' was saved successfully!');
            redirect('client/' . $page_num, 'refresh');
        } else {
            //show unable to insert error with flash data.
            $this->session->set_flashdata('error', 'Unable to save ' . $client_name);
            redirect('client/1', 'refresh');
        }
    }

    public function delete($id, $page_num = null) {
        $this->load->model('delete');
        $query = $this->fetch->getSingleRecord('client', $id); // just fetching single record for flash data purpose
        foreach ($query as $record) {
            $client_name = $record->name;
        } //end of fetch code
        if ($this->delete->deleteRecord($id, 'client')) {
            $this->session->set_flashdata('success', $client_name . ' was deleted successfully!');
            $data_per_page = 5;
            $total_record = $this->fetch->getTotalCount("client");
            $curr_page = ceil($total_record / $data_per_page);
            if ($curr_page < $page_num) {
                $page_num = $page_num - 1;
            }
            redirect('client/' . $page_num, 'refresh');
        } else {
            //show unable to insert error with flash data.
            $this->session->set_flashdata('error', 'Unable to delete ' . $client_name);
            redirect('client/1', 'refresh');
        }
    }

    public function session_check() {
        if (!isset($this->session->id)) { // id after login
            redirect('login', 'refresh');
        }
    }

    public function load_view($data, $page_name) {
        $data['title'] = ucfirst('client');
        $this->load->view('template/header', $data);
        $this->load->view('client/' . $page_name, $data);
        $this->load->view('template/footer');
    }

}
