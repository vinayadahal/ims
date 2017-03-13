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

    public function index() {
        $query = $this->fetch->getAllFromTable('category');
        $data['category_list'] = $query;
        $this->load_view($data);
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
