<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('aa_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_event');
    }

    //load manage event
    public function manage()
    {
        $data['title']  = 'event - Arjuna Academy';
        $data['result'] = $this->m_event->eventGet();     
        $this->load->view('event/manage-event', $data);  
    }


    // load add event
    public function add_event()
    {
        $data['title']  = 'Add event - Arjuna Academy';
        $this->load->view('event/add-event', $data);
    }

      //load edit event
      public function edit_event($id ='')
      {
          $data['title']  = 'Edit event - Arjuna Academy';
          $data['result'] = $this->m_event->eventIdGet($id); 
          $this->load->view('event/edit-event', $data);  
      }

    public function insert($var = null)
    {
        $image_id  = $this->input->post('image_id');
        $title      = $this->input->post('title');
        $location      = $this->input->post('location');
        $notification      = $this->input->post('notification');
        $date      = $this->input->post('date');
        $description      = $this->input->post('description');
       
        $this->load->library('upload');
        $this->load->library('image_lib');
        $files = $_FILES;
        
        if (file_exists($_FILES['ev_image']['tmp_name'])) {
        
        $config['upload_path'] = '../event/';
        $config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG|gif';
        $config['max_width'] = 0;
        $config['max_size'] = '512';
        $config['encrypt_name'] = true;
        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!is_dir($config['upload_path'])) {
        mkdir($config['upload_path'], 0777, true);
        }
       
        if (!$this->upload->do_upload('ev_image')) {
        $error = array('error' => $this->upload->display_errors());
       
        } 
        else
        {
        $upload_data = $this->upload->data();
        $file_name  = $upload_data['file_name'];

        $config1['image_library'] = 'gd2';
        $config1['source_image'] = $upload_data['full_path'];
        $config1['create_thumb'] = true;
        $config1['maintain_ratio'] = false;
        $config1['height'] = 260;
        $config1['width'] = 400;
        
        $this->load->library('image_lib');
        $this->image_lib->initialize($config1);
        $this->image_lib->resize();
        
        $file_name = $upload_data['file_name'];
        $file_tumb = $upload_data['raw_name'];
        $file_tumb_ex = $upload_data['file_ext'];
        $thum_file = $file_tumb . '_thumb' . $file_tumb_ex;
        $banrpath = $file_name;
        $thumbpath = 'event/'.$thum_file;

        $event    = 'event/'.$file_name;

        $insert = array(
			'uniq' 		=>	random_string('alnum',10),
            'title'		=>  $title, 
            'location'	=>  $location, 
            'notification'	=>  $notification, 
            'event_thumb'=>$thumbpath,
            'date'		=>  $date, 
            'description'		=>  $description, 
            'status'    =>  '1',
            );
            
           
        if (file_exists($_FILES['ev_image']['tmp_name'])) {
            $insert['event_image'] = $event;
        } 
        }
        }

       
        if (!empty($error)) 
        {
            $output = $error;
         }else{
            $output = $this->m_event->insert($insert);
         }
       
         echo json_encode($output);
    }


      

     //update event
     public function update_event()
     {
         $id  = $this->input->post('id');
         $title      = $this->input->post('title');
         $location      = $this->input->post('location');
         $notification      = $this->input->post('notification');
         $date      = $this->input->post('date');
         $description      = $this->input->post('description');
        
         $insert = array(
            
            'title'		=>  $title, 
            'location'	=>  $location, 
            'notification'	=>  $notification, 
            'date'		=>  $date, 
            'description'		=>  $description, 
            'status'    =>  '1',
            );
         $this->load->library('upload');
         $this->load->library('image_lib');
         $files = $_FILES;
         
         if (file_exists($_FILES['ev_image']['tmp_name'])) {
         
         $config['upload_path'] = '../event/';
         $config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG|gif';
         $config['max_width'] = 0;
         $config['max_size'] = '512';
         $config['encrypt_name'] = true;
         $this->load->library('upload');
         $this->upload->initialize($config);
 
         if (!is_dir($config['upload_path'])) {
         mkdir($config['upload_path'], 0777, true);
         }
        
         if (!$this->upload->do_upload('ev_image')) {
         $error = array('error' => $this->upload->display_errors());
        
         } 
         else
         {
         $upload_data = $this->upload->data();
         $file_name  = $upload_data['file_name'];
 
         $config1['image_library'] = 'gd2';
         $config1['source_image'] = $upload_data['full_path'];
         $config1['create_thumb'] = true;
         $config1['maintain_ratio'] = false;
         $config1['height'] = 260;
         $config1['width'] = 400;
         
         $this->load->library('image_lib');
         $this->image_lib->initialize($config1);
         $this->image_lib->resize();
         
         $file_name = $upload_data['file_name'];
         $file_tumb = $upload_data['raw_name'];
         $file_tumb_ex = $upload_data['file_ext'];
         $thum_file = $file_tumb . '_thumb' . $file_tumb_ex;
         $banrpath = $file_name;
         $thumbpath = 'event/'.$thum_file;
 
         $event    = 'event/'.$file_name;
            if (file_exists($_FILES['ev_image']['tmp_name'])) {
                $insert['event_image'] = $event;
                $insert['event_thumb'] = $thumbpath;
            } 
         }
         }

      
        
        if (!empty($error)) 
        {
            $output = $error;
         }else{
            $output = $this->m_event->update($insert, $id);
         }
       
         echo json_encode($output);

     }
     

    

     //delete event 
     public function delete($id)
     {
        $result = $this->m_event->event_delete($id);
       echo json_encode($result);
     }

  

}