<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_result extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('aa_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
       
        $this->load->model('m_test_result');
    }

   
  //get enquiries
  public function index()
  {
    $data['title']  = 'Test result - Arjunaacademy';
    $data['result']  = $this->m_test_result->getTest();
    $this->load->view('test-result/test-result-list', $data, FALSE);
          
  }
 
    public function view($id='',$uid='')
    {
        $data['q_detail']  = $this->m_test_result->view($id);
        $data['total'] =$this->m_test_result->total_question( $id);
        $data['attempt'] =$this->m_test_result->attempt( $id);
        $data['uniq_subject']= $this->m_test_result->subject_detail($uid, $id);
        $data['test_detail'] = $this->m_test_result->get_test_detail($uid, $id);

        $data['title']   = 'User test result - Arjunaacademy';
        $this->load->view('test-result/view-test-result', $data, FALSE); 
    } 
    
    public function delete($id)
    {
       $result = $this->m_test_purchase->delete($id);
       if(!empty($result==true)){
        $this->session->set_flashdata('success', ' Puechase test deleted Successfully');
        redirect('test-purchase/manage','refresh');
        }else{
                $this->session->set_flashdata('error', 'Some error occured please try again');
                redirect('test-purchase/manage','refresh');
        }
    }

    public function downloads($id='',$uid='')
	{
    
    $data['q_detail']  = $this->m_test_result->view($id);
    $data['total'] =$this->m_test_result->total_question( $id);
    $data['attempt'] =$this->m_test_result->attempt( $id);
    $data['uniq_subject']= $this->m_test_result->subject_detail($uid, $id);
    $data['test_detail'] = $this->m_test_result->get_test_detail($uid, $id);

		$this->load->library('pdf');
    $html = $this->output->get_output($this->load->view('test-result/result',$data));
    $pdf = $this->pdf->loadHtml($html);
   
		$this->pdf->setPaper('A3', 'Potrait');
		$this->pdf->render();
		// Output the generated PDF (1 = download and 0 = preview)
        $this->pdf->stream("result.pdf", array("Attachment"=>1));
	}
    
   
}


