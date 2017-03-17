<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class category extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->database();
        $this->load->model('fetch');
        $this->load->helper('url'); // Helps to get base url defined in config.php
        $this->load->library('session'); // starts session
        $this->session_check();
    }

    public function index($page) {
        $data['data_per_page'] = 5;
        $start_point = ($page - 1) * $data['data_per_page'];
        $data['total_record'] = count($this->fetch->getAllFromTable('category', '', ''));
        $end_limit = $data['data_per_page'];
        $records_from_db = $this->fetch->getAllFromTable('category', $end_limit, $start_point);
        $data['category_list'] = $records_from_db;
        $data['serial_num'] = $start_point;
        $this->load_view($data, 'index');
    }

    public function search() {
        $keyword = $this->input->post('keyword');
        $col = array('name');
        $tablename = 'category';
        $data['category_list'] = $this->fetch->search($keyword, $col, $tablename);
        $this->load_view($data, 'search');
    }

    public function create() {
        $this->load_view('', 'create');
    }

    public function add() {
        $category = $this->input->post('category');
        $cols_data = array('name' => $category);
        $table_name = 'category';
        $this->load->model('insert');
        if ($this->insert->insertIntoTable($cols_data, $table_name)) {
            redirect('category/1', 'refresh');
        } else {
            //show unable to insert error with flash data.
            $this->create();
        }
    }

    public function edit($record_id) {
        $query = $this->fetch->getSingleRecord('category', $record_id);
        foreach ($query as $record) {
            $data['category_name'] = $record->name;
        }
        $data['rec_id'] = $record_id;
        $this->load_view($data, 'edit');
    }

    public function update() {
        $id = $this->input->post('id');
        $category_name = $this->input->post('category');
        $this->load->model('update');
        $cols = array('name' => $category_name);
        if ($this->update->updateTableRow($cols, 'category', 'id', $id)) {
            redirect('category/1', 'refresh');
        } else {
            //show unable to insert error with flash data.
            $this->create();
        }
    }

    public function session_check() {
        if (!isset($this->session->id)) { // id after login
            redirect('login', 'refresh');
        }
    }

    public function load_view($data, $page_name) {
        $data['title'] = ucfirst('category');
        $this->load->view('template/header', $data);
        $this->load->view('category/' . $page_name, $data);
        $this->load->view('template/footer');
    }

}
