<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apply extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('aa_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
       
        $this->load->model('m_apply');
    }

   
  //get enquiries
  public function index()
  {
    $data['title']  = 'Enquiry - Arjunaacademy';
    $data['result']  = $this->m_apply->getEnquiry();
    $this->load->view('application/application-list', $data, FALSE);
          
  }
 

    public function view($id='')
    {
        $data['result']  = $this->m_apply->view($id);
        $data['title']   = 'Enquiry - Arjunaacademy';
        $this->load->view('application/view-application', $data, FALSE);  
    } 
    
    public function delete_application($id='')
    {
       $result = $this->m_apply->delete($id);
       $result = true;
       echo json_encode($result); 
    }
   
}