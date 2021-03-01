<?php 
    class Update_info extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('update_model');
        }

        public function update($a_id){
            $data['edit']=$this->update_model->read($a_id);
            
            $this->load->view('style');
            $this->load->view('update_info', $data);
            $this->load->view('js');
        }

        public function update_info(){
            $this->update_model->update_info();

            redirect('show_info', 'refresh');
        }
    }
?>