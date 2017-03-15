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
        $this->load_view($data);
    }

    public function search() {
        $keyword = $this->input->post('keyword');
        $col = array('name');
        $tablename = 'category';
        $search_result = $this->fetch->search($keyword, $col, $tablename);
        print_r($search_result);
    }

    public function session_check() {
        if (!isset($this->session->id)) { // id after login
            redirect('login', 'refresh');
        }
    }

    public function load_view($data) {
        $data['title'] = ucfirst('category');
        $this->load->view('template/header', $data);
        $this->load->view('category/index', $data);
        $this->load->view('template/footer');
    }

}
