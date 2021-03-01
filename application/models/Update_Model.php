<?php 
    class Update_Model extends CI_Model{
        public function read($a_id){
            $this->db->select('*, r.Name as rname,p.Name as pname,a.Name as aname,a.ID as aid');
            $this->db->from('attraction as a');
            $this->db->where('a.ID', $a_id);
            $this->db->join('province as p', 'a.provinceID=p.ID');
            $this->db->join('region as r', 'p.RegionID=r.ID');
            $query = $this->db->get();
            if($query->num_rows() > 0){
                $data = $query->row();
                return $data;
            }
            return FALSE;
        }

        public function update_info(){
            print_r($this->input->post());

            $dateupdate = date("Y/m/d");
            $config['upload_path'] = './img/';
        // กำหนดว่าให้อัพโหลดไฟล์อะไรได้บ้าง
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        // กำหนดไฟล์ภาพว่าขนาดห้ามเกินเท่าไหร่
        $config['max_size'] = '2000';
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
            $data = array(
                'provinceID' => $this->input->post('province'),
                'AttractionTypeID' => $this->input->post('type'),
                'Name' => $this->input->post('name'),
                'Description' => $this->input->post('description'),
                'Modified' => $dateupdate
            );
    
            $this->db->where('ID', $this->input->post('aid'));
    
            $query = $this->db->update('attraction',$data);

            echo $query;
    
            if($query){
                echo 'update ok';
            }else{
                echo 'falst';
            }
        }
        // ถ้า config ไม่มี error
        else{
            $data = $this->upload->data();
            $filename = $data['file_name'];
            $data = array(
                'provinceID' => $this->input->post('province'),
                'AttractionTypeID' => $this->input->post('type'),
                'ImageURL' => $filename,
                'Name' => $this->input->post('name'),
                'Description' => $this->input->post('description'),
                'Modified' => $dateupdate
            );
    
            $this->db->where('ID', $this->input->post('aid'));
    
            $query = $this->db->update('attraction',$data);

            echo $query;
    
            if($query){
                echo 'update ok';
            }else{
                echo 'falst';
            }
        }
        }
    }
?>