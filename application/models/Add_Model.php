<?php 
    class Add_Model extends CI_Model{
        public function add(){
            print_r($this->input->post());
            $datesave = date("Y/m/d");
                    // กำหนด path folder ที่จะเก็บรูป
        $config['upload_path'] = './img/';
        // กำหนดว่าให้อัพโหลดไฟล์อะไรได้บ้าง
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        // กำหนดไฟล์ภาพว่าขนาดห้ามเกินเท่าไหร่
        $config['max_size'] = '10000';
        // กำหนดความยาวของภาพสูงสุด
        $config['max_width'] = '3000';
        // กำหนดความสูงของภาพสูงสุด
        $config['max_height'] = '3000'; 
        // เข้ารหัสชื่อไฟล์รูปภาพ
        $config['encrypt_name'] = TRUE;

        // เช็ค config ข้างบนว่ามี error ไหม
        $this->load->library('upload', $config);
        if( ! $this->upload->do_upload('img'))
        {
            // ถ้ามี error ให้แสดงออกมา
            echo $this->upload->display_errors();
        }
        // ถ้า config ไม่มี error
        else{
            // อัพโหลดไฟล์เข้าตัวแปร data
            $data = $this->upload->data();
            // รับค่าชื่อไฟล์
            $filename = $data['file_name'];
            // เก็บคข้อมูลที่จะอัพขึ้น server
            $data = array(
                // รับค่า name จาก form
                'provinceID' => $this->input->post('province'),
                'AttractionTypeID' => $this->input->post('type'),
                'ImageURL' => $filename,
                'Name' => $this->input->post('name'),
                'Description' => $this->input->post('name'),
                'Created' => $datesave,
                'Modified' => $this->input->post('name')
            );
            print_r($data);

            // อัพโหลดข้อมูลขึ้น database
            $query = $this->db->insert('attraction', $data);
        }
        }
    }
?>