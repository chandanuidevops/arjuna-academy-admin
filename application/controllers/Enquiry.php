<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiry extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('aa_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
       
        $this->load->model('m_enquiry');
    }

   
  //get enquiries
  public function index()
  {
    $data['title']  = 'Enquiry - Arjunaacademy';
    $data['result']  = $this->m_enquiry->getEnquiry();
    $this->load->view('enquiry/enquiry-list', $data, FALSE);
          
  }
 

    public function view($id='')
    {
        $data['result']  = $this->m_enquiry->view($id);
        $data['title']   = 'Enquiry - Arjunaacademy';
        $this->load->view('enquiry/view-enquiry', $data, FALSE);
        
    } 
    
    public function delete($id)
    {
        $result = $this->m_enquiry->delete($id);
      echo json_encode($result);
    }
    
   
}