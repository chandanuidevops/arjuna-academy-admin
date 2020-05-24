<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enrolled extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('aa_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
       
        $this->load->model('m_enrolled');
    }

   
  //get enquiries
  public function index()
  {
    $data['title']  = 'Enrolled - Arjunaacademy';
    $data['result']  = $this->m_enrolled->getEnrolled();
    $this->load->view('enrolled/enrolled-list', $data, FALSE);
          
  }
 

    public function view($id='')
    {
        $data['result']  = $this->m_enrolled->view($id);
        $data['title']   = 'Enrolled - Arjunaacademy';
        $this->load->view('enrolled/view-enrolled', $data, FALSE); 
    } 
    
    public function delete($id)
    {
       $result = $this->m_enrolled->delete($id);
     
       echo json_encode($result) ;
    }
    
   
}