<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_gallery extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('aa_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_home_gallery');
    }

    //load manage gallery
    public function manage()
    {
        $data['title']  = 'Gallery - Arjuna Academy';
        $data['result'] = $this->m_home_gallery->galleryGet(); 
        $this->load->view('home-gallery/manage-home-gallery', $data);  
    }


    // load add gallery
    public function add_gallery()
    {
        $data['title']  = 'Add Gallery - Arjuna Academy';
        $this->load->view('home-gallery/add-home-gallery', $data);
    }

      //load edit gallery
      public function edit_gallery($id ='')
      {
          $data['title']  = 'Edit gallery - Arjuna Academy';
          $data['result'] = $this->m_home_gallery->galleryIdGet($id); 
          //$data['gallery'] = $this->m_home_gallery->galleryImageGet();  

          $this->load->view('home-gallery/edit-home-gallery', $data);  
      }

    public function insert($var = null)
    {
        
      
        $this->load->library('upload');
        $this->load->library('image_lib');
        $files = $_FILES;
        
        if (file_exists($_FILES['gallery_image']['tmp_name'])) {
        
        $config['upload_path'] = '../home-gallery/';
        $config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG|gif';
        $config['max_width'] = 0;
        $config['max_size'] = '512';
        $config['encrypt_name'] = true;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!is_dir($config['upload_path'])) {
        mkdir($config['upload_path'], 0777, true);
        }
       
        if (!$this->upload->do_upload('gallery_image')) {
        $error = array('error' => $this->upload->display_errors());
       
        } else {
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
        $thumbpath = 'home-gallery/'.$thum_file;
        
        
        $gallery_image    = 'home-gallery/'.$file_name;

        $insert = array(
			'uniq' 		=>	random_string('alnum',10),
            'thumb_image'=>$thumbpath,
            'status'    =>  '1',
            );


        if (file_exists($_FILES['gallery_image']['tmp_name'])) {
            $insert['gallery_image'] = $gallery_image;
        }
        }
        }

         
     
        
        
        if (!empty($error)) 
        {
            $output = $error;
         }else{
            $output = $this->m_home_gallery->insert($insert);
         }
       
         echo json_encode($output);
    }


     

     //update gallery
     public function update_gallery()
     {
        $id  = $this->input->post('id');
      
       
        $this->load->library('upload');
        $this->load->library('image_lib');
        $files = $_FILES;
        
        if (file_exists($_FILES['gallery_image']['tmp_name'])) {
        
        $config['upload_path'] = '../home-gallery/';
        $config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG|gif';
        $config['max_width'] = 0;
        $config['max_size'] = '512';
        $config['encrypt_name'] = true;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!is_dir($config['upload_path'])) {
        mkdir($config['upload_path'], 0777, true);
        }
       
        if (!$this->upload->do_upload('gallery_image')) {
        $error = array('error' => $this->upload->display_errors());
       
        } else {
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
        $thumbpath = 'home-gallery/'.$thum_file;
        
        
        $gallery_image    = 'home-gallery/'.$file_name;
        $insert = array(
            'status'    =>  '1',
            );

        if (file_exists($_FILES['gallery_image']['tmp_name'])) {
            $insert['gallery_image'] = $gallery_image;
            $insert['thumb_image'] = $thumbpath;
        }
        }
        }

        if (!empty($error)) 
        {
            $output = $error;
         }else{
            $output = $this->m_home_gallery->update_gallery($insert, $id);
         }
       
         echo json_encode($output);
          
       
     
     }
     

     

     //delete event 
     public function delete($id)
     {
        $result = $this->m_home_gallery->delete_gallery($id);
       echo json_encode($result);
     }

  

}