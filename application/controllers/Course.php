<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('aa_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_course');
    }

    //load manage course
    public function manage()
    {
        $data['title']  = 'Course - Arjuna Academy';
        $data['result'] = $this->m_course->courseGet(); 
        $this->load->view('course/manage-course', $data);  
    }


    // load add gallery
    public function add_course()
    {
        $data['title']  = 'Add course - Arjuna Academy';
        $this->load->view('course/add-course', $data);
    }

      //load edit gallery
      public function edit_course($id ='')
      {
          $data['title']  = 'Edit course - Arjuna Academy';
          $data['result'] = $this->m_course->courseIdGet($id); 
          $data['testimonial'] = $this->m_course->get_testimonial($id);

          $this->load->view('course/edit-course', $data);  
      }
      //add-testimonial
      public function add_testimonial($id ='')
      {
          $data['title']  = 'Add Testimonial - Arjuna Academy';
          $data['result'] = $this->m_course->courseIdGet($id); 
          
          $this->load->view('course/add-testimonial', $data);  
      }
      public function edit_testimonial($course_id ='',$id='')
      {
        $data['title']  = 'Edit Testimonial - Arjuna Academy';
        $data['testimonial'] = $this->m_course->get_testimonial_id($course_id,$id); 

        $this->load->view('course/edit-testimonial', $data);  
      }

    public function insert($var = null)
    {
        $slug      = $this->input->post('slug');
        $course  = $this->input->post('course');
        $video      = $this->input->post('video');
        $amount      = $this->input->post('amount');
        $discount      = $this->input->post('discount');
        $detail      = $this->input->post('detail');
        $top_course      = $this->input->post('top_course');
        $title      = $this->input->post('title');
        $description      = $this->input->post('description');
        $level      = $this->input->post('level');
   
        $metakey      = $this->input->post('metakey');
        $metadesc      = $this->input->post('metadesc');
        $uniq      = $this->input->post('uniq');
        $status      = 1;
        $insert = array(
			'uniq' 		=>	 random_string('alnum',10),
            'course'		=>  $course,  
            'video'		=>  $video, 
            'amount'		=>  $amount, 
            'top_course'=>$top_course,
            'discount'		=>  $discount, 
            'detail'		=>  $detail, 
            'title'		=>  $title, 
            'slug'		=>  $slug, 
            'description'		=>  $description, 
            'level'		=>  $level, 
            'metakey'		=>  $metakey, 
            'metadesc'		=>  $metadesc, 
            'status'    =>  '1',
            );


        
        $this->load->library('upload');
        $files = $_FILES;
        
        if (file_exists($_FILES['video_background']['tmp_name'])) {
        
        $config['upload_path'] = '../course/';
        $config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG|gif';
        $config['max_width'] = 0;
        $config['max_size']     = '512';
        $config['encrypt_name'] = true;
        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!is_dir($config['upload_path'])) {
        mkdir($config['upload_path'], 0777, true);
        }
       
        if (!$this->upload->do_upload('video_background')) {
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
        $thumbpath = 'course/'.$thum_file;

        $video_background    = 'course/'.$file_name;
          
        if (file_exists($_FILES['video_background']['tmp_name'])) {
            $insert['video_background'] = $video_background;
            $insert['image_thumb'] = $thumbpath;
        } 
        }
        }
      

        if (!empty($error)) 
        {
            $output = $error;
         }else{
            $output = $this->m_course->insert($insert);
         }
         echo json_encode($output);
    }

    public function update()
    {
        $slug      = $this->input->post('slug');
       
        $course  = $this->input->post('course');
        $id  = $this->input->post('id');
        $video      = $this->input->post('video');
        $amount      = $this->input->post('amount');
        $discount      = $this->input->post('discount');
        $detail      = $this->input->post('detail');
        $level      = $this->input->post('level');
        $title      = $this->input->post('title');
        $description      = $this->input->post('description');

        $metakey      = $this->input->post('metakey');
        $metadesc      = $this->input->post('metadesc');
        $top_course      = $this->input->post('top_course');
        $status      = 1;
        
        $insert = array(
			
            'course'		=>  $course,  
            'video'		=>  $video, 
            'amount'		=>  $amount, 
            'discount'		=>  $discount,
            'detail'		=>  $detail, 
            'status'    =>  '1',
            'title'		=>  $title, 
            'level'		=>  $level, 
            'slug'		=>  $slug, 
            'description'		=>  $description,
            'metakey'		=>  $metakey, 
            'metadesc'		=>  $metadesc, 
            'top_course'=>$top_course
            );
       
        
        $this->load->library('upload');
        $files = $_FILES;
            
        if (file_exists($_FILES['video_background']['tmp_name'])) {
            
        $config['upload_path'] = '../course/';
        $config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG|gif';
        $config['max_size']     = '512';
        $config['max_width'] = 0;
       
        $config['encrypt_name'] = true;
         $this->load->library('upload');
        $this->upload->initialize($config);
    
        if (!is_dir($config['upload_path'])) {
        mkdir($config['upload_path'], 0777, true);
        }
           
        if (!$this->upload->do_upload('video_background')) {
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
        $thumbpath = 'course/'.$thum_file;
    
        $video_background    = 'course/'.$file_name;

        if (file_exists($_FILES['video_background']['tmp_name'])) {
            $insert['video_background'] = $video_background;
            $insert['image_thumb'] = $thumbpath;
        } 
        }
        }

        if (!empty($error)) 
        {
            $output = $error;
         }else{
            $output = $this->m_course->update($insert, $id);
         }
         echo json_encode($output);
    }


    //add testimonial

    public function insert_testimonial($var = null)
    {
        
        $name      = $this->input->post('name');
        $course      = $this->input->post('course');
        $rank      = $this->input->post('rank');
        $college      = $this->input->post('college');
        $description      = $this->input->post('description');
        $uniq      = random_string('alnum',10);
        $course_id      = $this->input->post('id');
        $status      = 1;
        $insert = array(
			'name'=>$name,
			'course'=>$course,
			'rank'=>$rank,
			'description'=>$description,
			'college'=>$college,
			'course_id'=>$course_id,
			'uniq'=>$uniq,
            'status'    =>  '1',
            );
        $this->load->library('upload');
        // $this->load->library('image_lib');
        $files = $_FILES;
        
        if (file_exists($_FILES['testimonial_img']['tmp_name'])) {
        
        $config['upload_path'] = '../testimonial-img/';
        $config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG|gif';
        $config['max_width'] = 0;
        $config['max_size']     = '512';
        $config['encrypt_name'] = true;
        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!is_dir($config['upload_path'])) {
        mkdir($config['upload_path'], 0777, true);
        }
       
        if (!$this->upload->do_upload('testimonial_img')) {
        $error = array('error' => $this->upload->display_errors());
      
        } 
        else
        {
        $upload_data = $this->upload->data();
        $file_name  = $upload_data['file_name'];

        $config1['image_library'] = 'gd2';
        $config1['source_image'] = $upload_data['full_path'];
        $config1['create_thumb'] = true;
     
        $config['max_size'] = '512';
        $config1['height'] = 200;
        $config1['width'] = 200;
        
        $this->load->library('image_lib');
        $this->image_lib->initialize($config1);
        $this->image_lib->resize();
        
        $file_name = $upload_data['file_name'];
        $file_tumb = $upload_data['raw_name'];
        $file_tumb_ex = $upload_data['file_ext'];
        $thum_file = $file_tumb . '_thumb' . $file_tumb_ex;
        $banrpath = $file_name;
        $thumbpath = 'testimonial-img/'.$thum_file;

        $testimonial_img    = 'testimonial-img/'.$file_name;
        if (file_exists($_FILES['testimonial_img']['tmp_name'])) {
            $insert['testimonial_img'] = $testimonial_img;
            $insert['testimonial_thumb'] = $thumbpath;
        } 
        }
        }

       
        if (!empty($error)) 
        {
            $output = $error;
         }else{
            $output = $this->m_course->insert_test($insert);
         }
         echo json_encode($output);
      
    }

    public function update_testimonial($var = null)
    {
        
        $name      = $this->input->post('name');
        $course      = $this->input->post('course');
        $rank      = $this->input->post('rank');
        $college      = $this->input->post('college');
        $description      = $this->input->post('description');
        $course_id      = $this->input->post('course_id');
        $id      = $this->input->post('id');
        $status      = 1;
        $insert = array(
			'name'=>$name,
			'course'=>$course,
			'rank'=>$rank,
			'description'=>$description,
			'college'=>$college,
            );
        $this->load->library('upload');
        // $this->load->library('image_lib');
        $files = $_FILES;
        
        if (file_exists($_FILES['testimonial_img']['tmp_name'])) {
        
        $config['upload_path'] = '../testimonial-img/';
        $config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG|gif';
        $config['max_width'] = 0;
        $config['max_size']     = '512';
        $config['encrypt_name'] = true;
        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!is_dir($config['upload_path'])) {
        mkdir($config['upload_path'], 0777, true);
        }
       
        if (!$this->upload->do_upload('testimonial_img')) {
        $error = array('error' => $this->upload->display_errors());
      
        } 
        else
        {
        $upload_data = $this->upload->data();
        $file_name  = $upload_data['file_name'];

        $config1['image_library'] = 'gd2';
        $config1['source_image'] = $upload_data['full_path'];
        $config1['create_thumb'] = true;
     
        $config['max_size'] = '512';
        $config1['height'] = 200;
        $config1['width'] = 200;
        
        $this->load->library('image_lib');
        $this->image_lib->initialize($config1);
        $this->image_lib->resize();
        
        $file_name = $upload_data['file_name'];
        $file_tumb = $upload_data['raw_name'];
        $file_tumb_ex = $upload_data['file_ext'];
        $thum_file = $file_tumb . '_thumb' . $file_tumb_ex;
        $banrpath = $file_name;
        $thumbpath = 'testimonial-img/'.$thum_file;

        $testimonial_img    = 'testimonial-img/'.$file_name;
        if (file_exists($_FILES['testimonial_img']['tmp_name'])) {
            $insert['testimonial_img'] = $testimonial_img;
            $insert['testimonial_thumb'] = $thumbpath;
        } 
        }
        }

       
        if (!empty($error)) 
        {
            $output = $error;
         }else{
            $output = $this->m_course->update_testimonial($insert,$id,$course_id);
         }
         echo json_encode($output);
      
    }
    
       
  //delete event 
  public function delete($id)
  {
     $result = $this->m_course->delete_course($id);
    echo json_encode($result);
  }
  
  public function deleteAll(Type $var = null)
  {
     $ids = $this->input->post('ids');

     $this->m_course->delete_testimonial($ids);
     
     echo json_encode(['success'=>"Item Deleted successfully."]);
  }
  

}