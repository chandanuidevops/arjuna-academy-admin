<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_purchase extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('aa_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
       
        $this->load->model('m_test_purchase');
    }

   
  //get enquiries
  public function index()
  {
    $data['title']  = 'Test purchase - Arjunaacademy';
    $data['result']  = $this->m_test_purchase->getPurchaseTest();
    $this->load->view('test-purchase/test-purchase-list', $data, FALSE);
          
  }
 

    public function view($id='')
    {
        $data['result']  = $this->m_test_purchase->view($id);
        $data['title']   = 'User test purchase - Arjunaacademy';
        $this->load->view('test-purchase/view-test-purchase', $data, FALSE); 
    } 
    
    public function delete($id)
    {
       $result = $this->m_test_purchase->delete($id);
      // $result =true;
      echo json_encode($result);
    }
    
   
}