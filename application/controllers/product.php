<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class product extends CI_Controller {

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

    public function index($page = null) {
        if ($this->getFlashdata()) {
            $data['flashData'] = $this->getFlashdata();
        }
        $data['category_list'] = $this->fetch->getAllFromTable('category', '', '');
        $data['data_per_page'] = 5;
        $start_point = ($page - 1) * $data['data_per_page'];
        $data['total_record'] = count($this->fetch->getAllFromTable('product', '', ''));
        $end_limit = $data['data_per_page'];
        $records_from_db = $this->fetch->getAllFromTable('product', $end_limit, $start_point);
        $data['product_list'] = $records_from_db;
        $data['serial_num'] = $start_point;
        $this->load_view($data, 'index');
    }

    public function search() {
        $keyword = $this->input->get('keyword');
        if (empty($keyword)) {
            redirect('product/1', 'refresh');
        } else {
            $col = array('name', 'description');
            $tablename = 'product';
            $data['product_list'] = $this->fetch->search($keyword, $col, $tablename);
            $this->load_view($data, 'search');
        }
    }

    public function create() {
        $data['category_list'] = $this->fetch->getAllFromTable('category', '', '');
        $this->load_view($data, 'create');
    }

    public function add() {
        $category_id = $this->input->post('category_id');
        $product_name = $this->input->post('product_name');
        $description = $this->input->post('description');
        $purchase_price = $this->input->post('purchase_price');
        $selling_price = $this->input->post('selling_price');
        $cols_data = array('category_id' => $category_id, 'name' => $product_name, 'description' => $description, 'purchasePrice' => $purchase_price, 'sellingPrice' => $selling_price);
        $table_name = 'product';
        $this->load->model('insert');
        if ($this->insert->insertIntoTable($cols_data, $table_name)) {
            $this->session->set_flashdata('success', $product_name . ' was saved successfully!');
            $data_per_page = 5;
            $total_record = count($this->fetch->getAllFromTable('product', '', ''));
            $page_num = ceil($total_record / $data_per_page);
            redirect('product/' . $page_num, 'refresh');
        } else {
            //show unable to insert error with flash data.
            $this->session->set_flashdata('error', 'Unable to save ' . $product_name);
            redirect('product/1', 'refresh');
        }
    }

    public function edit($record_id, $page_num = null) {
        $query = $this->fetch->getSingleRecord('product', $record_id);
        $data['category_list'] = $this->fetch->getAllFromTable('category', '', '');
        foreach ($query as $record) {
            $data['product_name'] = $record->name;
            $data['description'] = $record->description;
            $data['category_id'] = $record->category_id;
            $data['sellingPrice'] = $record->sellingPrice;
            $data['purchasePrice'] = $record->purchasePrice;
        }
        $data['page_num'] = $page_num;
        $data['rec_id'] = $record_id;
        $this->load_view($data, 'edit');
    }

    public function update() {
        $id = $this->input->post('id');
        $product_name = $this->input->post('product_name');
        $description = $this->input->post('description');
        $category_id = $this->input->post('category_id');
        $purchase_price = $this->input->post('purchase_price');
        $selling_price = $this->input->post('selling_price');
        $page_num = $this->input->post('page_num');
        $this->load->model('update');
        $cols = array('category_id' => $category_id, 'name' => $product_name, 'description' => $description, 'purchasePrice' => $purchase_price, 'sellingPrice' => $selling_price);
        if ($this->update->updateTableRow($cols, 'product', 'id', $id)) {
            $this->session->set_flashdata('success', $product_name . ' was saved successfully!');
            redirect('product/' . $page_num, 'refresh');
        } else {
            //show unable to insert error with flash data.
            $this->session->set_flashdata('error', 'Unable to save ' . $product_name);
            $this->create();
        }
    }

    public function delete($id, $page_num = null) {
        $this->load->model('delete');
        $query = $this->fetch->getSingleRecord('product', $id); // just fetching single record for flash data purpose
        foreach ($query as $record) {
            $product_name = $record->name;
        } //end of fetch code
        if ($this->delete->deleteRecord($id, 'product')) {
            $this->session->set_flashdata('success', $product_name . ' was deleted successfully!');
            $data_per_page = 5;
            $total_record = $this->fetch->getTotalCount("product");
            $curr_page = ceil($total_record / $data_per_page);
            if ($curr_page < $page_num) {
                $page_num = $page_num - 1;
            }
            redirect('product/' . $page_num, 'refresh');
        } else {
            //show unable to insert error with flash data.
            $this->session->set_flashdata('error', 'Unable to delete ' . $product_name);
            redirect('product/1', 'refresh');
        }
    }

    public function session_check() {
        if (!isset($this->session->id)) { // id after login
            redirect('login', 'refresh');
        }
    }

    public function load_view($data, $page_name) {
        $data['title'] = ucfirst('product');
        $this->load->view('template/header', $data);
        $this->load->view('product/' . $page_name, $data);
        $this->load->view('template/footer');
    }

}
