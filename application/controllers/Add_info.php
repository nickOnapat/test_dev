<?php 
    class Add_info extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('add_model');
        }
        public function index(){
            $this->load->view('style');
            $this->load->view('Add_info');
            $this->load->view('js');
        }
        public function add_info(){
            $this->add_model->add();
            redirect('show_info', 'refresh');
        }
    }
?>