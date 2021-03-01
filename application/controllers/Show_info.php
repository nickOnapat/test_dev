<?php 
    class Show_info extends CI_Controller{
        public function index(){
            $this->load->view('style');
            $this->load->view('show_info');
            $this->load->view('js');
        }
    }
?>