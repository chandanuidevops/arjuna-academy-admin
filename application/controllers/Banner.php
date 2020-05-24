<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('aa_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_banner');
    }

    //load manage gallery
    public function manage()
    {
        $data['title']  = 'Gallery - Arjuna Academy';
       $data['result'] = $this->m_banner->bannerGet(); 
        $this->load->view('banner/manage-banner', $data);  
    }


    // load add gallery
    public function add_banner()
    {
 
        $data['title']  = 'Add banner - Arjuna Academy';
        $this->load->view('banner/add-banner', $data);
    }

      //load edit gallery
      public function edit_banner($id ='')
      {
          $data['title']  = 'Edit banner - Arjuna Academy';
          $data['result'] = $this->m_banner->bannerIdGet($id); 
         

          $this->load->view('banner/edit-banner', $data);  
      }

    public function insert($var = null)
    {
        $image_id  = random_string('alnum',10);
        $video  = $this->input->post('video');
  
        $this->load->library('upload');
        $this->load->library('image_lib');
        $files = $_FILES;
        
        if (file_exists($_FILES['banner_img']['tmp_name'])) {
        
        $config['upload_path'] = '../banner-image/';
        $config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG|gif';
        $config['max_width'] = 0;
        $config['max_size'] = '512';
        $config['encrypt_name'] = true;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!is_dir($config['upload_path'])) {
        mkdir($config['upload_path'], 0777, true);
        }
       
        if (!$this->upload->do_upload('banner_img')) {
        $error = array('error' => $this->upload->display_errors());
       
        } else {
        $upload_data = $this->upload->data();
        $file_name  = $upload_data['file_name'];

        $config1['image_library'] = 'gd2';
        $config1['source_image'] = $upload_data['full_path'];
        $config1['create_thumb'] = true;
        $config1['maintain_ratio'] = false;
        $config1['height'] = 500;
        $config1['width'] = 1349;
        
        $this->load->library('image_lib');
        $this->image_lib->initialize($config1);
        $this->image_lib->resize();
        
        $file_name = $upload_data['file_name'];
        $file_tumb = $upload_data['raw_name'];
        $file_tumb_ex = $upload_data['file_ext'];
        $thum_file = $file_tumb . '_thumb' . $file_tumb_ex;
        $banrpath = $file_name;
        $thumbpath = 'banner-image/'.$thum_file;
        
        
        $banner_img    = 'banner-image/'.$file_name;

        $insert = array(
			'uniq' 		=>	random_string('alnum',10),           
			'video' 		=>	$video,           
            'status'    =>  '1',
            );


        if (file_exists($_FILES['banner_img']['tmp_name'])) {
            $insert['banner_img'] = $banner_img;
            $insert['banner_thumb'] = $thumbpath;
        }  

        }
        }

       
        if (!empty($error)) 
        {
            $output = $error;
         }else{
            $output = $this->m_banner->insert($insert);
         }
       
         echo json_encode($output);

       
       
    }


     

     //update gallery
     public function update_banner()
     {
        $video  = $this->input->post('video');
        $id  = $this->input->post('id');
       
        $this->load->library('upload');
        $this->load->library('image_lib');
        $files = $_FILES;
        
        if (file_exists($_FILES['banner_img']['tmp_name'])) {
        
        $config['upload_path'] = '../banner-image/';
        $config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG|gif';
        $config['max_width'] = 0;
        $config['max_size'] = '512';
        $config['encrypt_name'] = true;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!is_dir($config['upload_path'])) {
        mkdir($config['upload_path'], 0777, true);
        }
       
        if (!$this->upload->do_upload('banner_img')) {
        $error = array('error' => $this->upload->display_errors());
      
        } else {
        $upload_data = $this->upload->data();
        $file_name  = $upload_data['file_name'];
      
        $config1['image_library'] = 'gd2';
        $config1['source_image'] = $upload_data['full_path'];
        $config1['create_thumb'] = true;
        $config1['maintain_ratio'] = false;
        $config1['height'] = 500;
        $config1['width'] = 1349;
        
        $this->load->library('image_lib');
        $this->image_lib->initialize($config1);
        $this->image_lib->resize();
        
        $file_name = $upload_data['file_name'];
        $file_tumb = $upload_data['raw_name'];
        $file_tumb_ex = $upload_data['file_ext'];
        $thum_file = $file_tumb . '_thumb' . $file_tumb_ex;
        $banrpath = $file_name;
        $thumbpath = 'banner-image/'.$thum_file;
    
        $banner_img    = 'banner-image/'.$file_name;

        $insert = array(          
            'status'    =>  '1',
            );

           
        if (file_exists($_FILES['banner_img']['tmp_name'])) {
            $insert['banner_img'] = $banner_img;
            $insert['banner_thumb'] = $thumbpath;
          
        }
       
        }
        }
        if(!empty($video)){
            $insert['video'] = $video;
        }
        

        if (!empty($error)) 
        {
            $output = $error;
         }else{
            $output = $this->m_banner->update_banner($insert, $id);
         }
       
         echo json_encode($output);
     }
     

     public function deleteAll(Type $var = null)
     {
        $ids = $this->input->post('ids');
 
        $this->m_gallery->delete_gallery($ids);
        
        echo json_encode(['success'=>"Item Deleted successfully."]);
     }

     //delete event 
     public function delete($id)
     {
        $result = $this->m_banner->delete_banner($id);
        echo json_encode($result);
     }

  

}