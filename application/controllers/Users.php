<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('aa_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
       
        $this->load->model('m_users');
    }

   
  //get enquiries
  public function index()
  {
    $data['title']  = 'Users - Arjunaacademy';
    $data['result']  = $this->m_users->getUsers();
    $this->load->view('users/users-list', $data, FALSE);
          
  }
 

    public function view($id='')
    {
        $data['result']  = $this->m_users->view($id);
        $data['title']   = 'User - Arjunaacademy';
        $this->load->view('users/view-users', $data, FALSE); 
    } 
    
    public function delete($id)
    {
       $result = $this->m_users->delete($id);
       
       echo json_encode($result) ;     
    }
    

    public function block()
    {
      
      $id = $this->input->post('id');
      $status = $this->input->post('status');
      $result = $this->m_users->block_user($status,$id);

     echo json_encode($result);
   
    }

   
   
}