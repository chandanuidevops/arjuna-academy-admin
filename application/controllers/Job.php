<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('aa_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_job');
        $this->load->helper('ckeditor_helper');
        $this->load->library('CKEditor');
    }

    //load manage course
    public function manage()
    {
        $data['title']  = 'Job - Arjuna Academy';
        $data['result'] = $this->m_job->jobGet(); 
       
        $this->load->view('job/manage-job', $data);  
    }


    // load add gallery
    public function add_job()
    {
        $data['title']  = 'Add Job - Arjuna Academy';
        $this->load->view('job/add-job', $data);
    }

      //load edit gallery
      public function edit_job($id ='')
      {
          $data['title']  = 'Edit Job - Arjuna Academy';
          $data['result'] = $this->m_job->jobIdGet($id); 
          $this->load->view('job/edit-job', $data);  
      }
      public function view($id ='')
      {
          $data['title']  = 'View Job - Arjuna Academy';
          $data['result'] = $this->m_job->jobIdGet($id); 
          $this->load->view('job/view-job', $data);  
      }

    public function insert($var = null)
    {
       
        $insert = array(
			'job_title' 		=>	$this->input->post('job_title'),
			'job_type' 		=>	$this->input->post('job_type'),
			'qualification' 		=>	$this->input->post('qualification'),
			'experience' 		=>	$this->input->post('experience'),
			'job_description' 		=>	$this->input->post('job_description'),
			'job_skill' 		=>	$this->input->post('job_skill'),
			'job_responsibility' 		=>	$this->input->post('job_responsibility'),
			'job_requirement' 		=>	$this->input->post('job_requirement'),
			'uniq' 		=>	 random_string('alnum',10),
            'status'    =>  '1',
            );

        $result = $this->m_job->insert($insert);
        echo json_encode($result);
    }

    public function update()
    {
        $id=$this->input->post('id');
        $insert = array(
			'job_title' 		=>	$this->input->post('job_title'),
			'job_type' 		=>	$this->input->post('job_type'),
			'qualification' 		=>	$this->input->post('qualification'),
			'experience' 		=>	$this->input->post('experience'),
			'job_description' 		=>	$this->input->post('job_description'),
			'job_skill' 		=>	$this->input->post('job_skill'),
			'job_responsibility' 		=>	$this->input->post('job_responsibility'),
			'job_requirement' 		=>	$this->input->post('job_requirement'),
            'status'    =>  '1',
            );
            

        $result = $this->m_job->update($insert, $id);
       
        echo json_encode($result);
    }
    
       
  //delete event 
  public function delete($id)
  {
     $result = $this->m_job->delete_job($id);
   
     echo json_encode($result) ;
  }
  

  

}