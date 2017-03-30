<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->database();
        $this->load->model('fetch');
        $this->load->helper('url'); // Helps to get base url defined in config.php
        $this->load->library('session'); // starts session
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
        return false;
    }

    public function index() {
        if ($this->getFlashdata()) {
            $data['flashData'] = $this->getFlashdata();
        }
        if (isset($data)) {
            $this->load_view($data);
        } else {
            $this->load_view();
        }
    }

    public function checkLogin() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $login_data = $this->fetch->getUserLogin($username, $password);
        if (!empty($login_data)) {
            foreach ($login_data as $user_details) {
                $user_data = array('id' => $user_details->id, 'username' => $user_details->first_name, 'gender' => $user_details->gender); // creating array before storing inside session
                $this->session->set_userdata($user_data); //sets seesion data 
                redirect('dashboard/index', 'refresh'); // redirects to another page (remo)   
            }
        } else {
            $this->session->set_flashdata('error', 'Incorrect Username or Password'); // sets data before redirect
            redirect('login', 'refresh');
        }
    }

    public function logout() {
        $this->session->unset_userdata(array('id', 'username', 'gender')); //unsetting session data
        if (!isset($this->session->id)) { // checking session after unsetting
            redirect('login', 'refresh');
        }
    }

    public function load_view($data = null) {
        $data['title'] = ucfirst('login');
        $this->load->view('template/header', $data);
        $this->load->view('login/index', $data);
        $this->load->view('template/footer');
    }

}
