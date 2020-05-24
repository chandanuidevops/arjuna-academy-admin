<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_application extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('aa_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
       
        $this->load->model('M_job_application');
    }

   
  //get enquiries
  public function index()
  {
    $data['title']  = 'Enquiry - Arjunaacademy';
    $data['result']  = $this->M_job_application->getEnquiry();
    $this->load->view('job-application/application-list', $data, FALSE);
          
  }
 

    public function view($id='')
    {
        $data['result']  = $this->M_job_application->view($id);
        $data['title']   = 'Job Application - Arjunaacademy';
        $this->load->view('job-application/view-application', $data, FALSE); 
    } 
    
    public function delete($id)
    {
       $result = $this->M_job_application->delete($id);
       $result= true;
       echo json_encode($result) ;  
    }
    
   
}