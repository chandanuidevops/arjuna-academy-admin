<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('aa_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_gallery');
    }

    //load manage gallery
    public function manage()
    {
        $data['title']  = 'Gallery - Arjuna Academy';
        $data['result'] = $this->m_gallery->featuredGet(); 
        $this->load->view('gallery/manage-gallery', $data);  
    }


    // load add gallery
    public function add_gallery()
    {
        $data['title']  = 'Add Gallery - Arjuna Academy';
        $this->load->view('gallery/add-gallery', $data);
    }

      //load edit gallery
      public function edit_gallery($id ='')
      {
          $data['title']  = 'Edit gallery - Arjuna Academy';
          $data['result'] = $this->m_gallery->featuredIdGet($id); 
          $data['gallery'] = $this->m_gallery->galleryImageGet($id);  

          $this->load->view('gallery/edit-gallery', $data);  
      }

    public function insert($var = null)
    {
        $image_id  = random_string('alnum',10);
        $title      = $this->input->post('title');
        $date      = $this->input->post('date');
        $description      = $this->input->post('description');
        $home_gallery      = $this->input->post('home_gallery');
       
        $this->load->library('upload');
        $this->load->library('image_lib');
        $files = $_FILES;
        
        if (file_exists($_FILES['feat_image']['tmp_name'])) {
        
        $config['upload_path'] = '../featured/';
        $config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG|gif';
        $config['max_width'] = 0;
        $config['max_size'] = '512';
        $config['encrypt_name'] = true;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!is_dir($config['upload_path'])) {
        mkdir($config['upload_path'], 0777, true);
        }
       
        if (!$this->upload->do_upload('feat_image')) {
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
        $thumbpath = 'featured/'.$thum_file;
        
        
        $featured    = 'featured/'.$file_name;
        $insert = array(
			'uniq' 		=>	$image_id,
            'title'		=>  $title, 
            'feat_thumb'=>$thumbpath,
            'date'		=>  $date, 
            'description'		=>  $description, 
            'status'    =>  '1',
            'home_gallery'=>$home_gallery,
            );


        if (file_exists($_FILES['feat_image']['tmp_name'])) {
            $insert['feat_image'] = $featured;
        } 
         $featured_id = $this->m_gallery->insert($insert);
        
         if(!empty($featured_id)){
            $result =  $this->insert_gallery($featured_id);	
            }
        }
        }

        if (!empty($error)) 
        {
            $output = $error;
         }elseif(!empty($featured_id)){
            $output = true;
         }else{
             $error= array('error'=>'Failed to upload');
         }
       
         echo json_encode($output);
       
      


    }


      //insert gallery
      public function insert_gallery($featured_id)
      {
        
         $image_id  = random_string('alnum',10);
         $filesCount = count($_FILES['images']['name']);

         if(!empty($filesCount)){
                

             for($i = 0; $i < $filesCount; $i++){
                 $_FILES['file']['name']     = $_FILES['images']['name'][$i];
                 $_FILES['file']['type']     = $_FILES['images']['type'][$i];
                 $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                 $_FILES['file']['error']     = $_FILES['images']['error'][$i];
                 $_FILES['file']['size']     = $_FILES['images']['size'][$i];
                 
                 $uploadPath = '../gallery';
                 $config['upload_path'] = $uploadPath;
                 $config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG|gif';
                 $config['max_width'] = 0;
                
                 $config['encrypt_name'] = true;
                 
                 $this->load->library('upload', $config);
                 $this->upload->initialize($config);
                
                 if($this->upload->do_upload('file')){
                  
                    $fileData = $this->upload->data();
                    $file_name  = $fileData['file_name'];
                   
                    $config1['image_library'] = 'gd2';
                    $config1['source_image'] = $fileData['full_path'];
                    $config1['create_thumb'] = true;
                    $config1['maintain_ratio'] = false;
                    $config1['height'] = 260;
                    $config1['width'] = 400;
                    
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config1);
                    $this->image_lib->resize();
                    
                    $file_name = $fileData['file_name'];
                    $file_tumb = $fileData['raw_name'];
                    $file_tumb_ex = $fileData['file_ext'];
                    $thum_file = $file_tumb . '_thumb' . $file_tumb_ex;
                    $banrpath = $file_name;
                    $thumbpath = 'gallery/'.$thum_file;

                     $images    = 'gallery/'.$file_name;
                     
                     if(!empty($fileData)){
                         // Insert files data into the database
                         $insert = array(
                             'uniq' 		=>	$image_id,
                             'featured_id'=>$featured_id,
                             'images_thumb'=>$thumbpath,
                             'status'    =>  '1',
                             'images'=> $images ,
                             );
                            
                         $result = $this->m_gallery->insert_image($insert);
                     }
                 }
             }
           
            
         }
     }

     //update gallery
     public function update_featured()
     {
        $id = $this->input->post('id');
        $image_id  = $this->input->post('image_id');
        $title      = $this->input->post('title');
        $date      = $this->input->post('date');
        $description      = $this->input->post('description');
        $home_gallery      = $this->input->post('home_gallery');
        $insert = array(
            'title'		=>  $title, 
            'date'		=>  $date, 
            'description'=>  $description, 
            'home_gallery'=>$home_gallery,
            'status'    =>  '1',
            );
        $this->load->library('upload');
        $this->load->library('image_lib');
        $files = $_FILES;
        
        if (file_exists($_FILES['feat_image']['tmp_name'])) {
        
        $config['upload_path'] = '../featured/';
        $config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG|gif';
        $config['max_width'] = 0;
        $config['max_size'] = '512';
        $config['encrypt_name'] = true;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!is_dir($config['upload_path'])) {
        mkdir($config['upload_path'], 0777, true);
        }
       
        if (!$this->upload->do_upload('feat_image')) {
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
        $thumbpath = 'featured/'.$thum_file;


        $featured    = 'featured/'.$file_name;
        if (file_exists($_FILES['feat_image']['tmp_name'])) {
            $insert['feat_image'] = $featured;
            $insert['feat_thumb'] = $thumbpath;
        } 
       
        }
        }
     
        $result = $this->m_gallery->update_featured($insert, $id);
        $this->insert_gallery($id);

        if (!empty($error)) 
        {
            $output = $error;
         }else{
            $output = $result;
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
        $result = $this->m_gallery->delete_featured($id);
      echo json_encode($result);
     }

  

}