<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminuser extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('aa_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }

       // if ($this->session->userdata('ra_type') != '1') {
       //     redirect('dashboard','refresh');
       //  }
        $this->load->model('m_adminuser');
        $this->load->library('bcrypt');
    }

    //manage sub admin
    public function index($id = null)
    {
        $data['title']  = 'Admin User - Raja housing';
        $data['result'] = $this->m_adminuser->subuserGet();
        $this->load->view('adminuser/manage-admin', $data);  
    }

        //manage sub admin
    public function add($var = null)
    {
        $data['title']  = 'Admin User - Arjun Academy';
        $this->load->view('adminuser/add-admin.php', $data, FALSE);
        
    }

    public function insert($value='')
    {
        $this->form_validation->set_rules('name', 'Username', 'required|is_unique[admin.name]', array('required'      => 'You have not provided the %s.', 'is_unique'     => 'This %s already exists.') );
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[admin.email]', array('required'      => 'You have not provided the %s.', 'is_unique'     => 'This %s already exists.')); 
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('formerror', $error);
            redirect('adminuser/add');
        }else{

            $name   =   $this->input->post('name');
            $email  =   $this->input->post('email');
            $phone  =   $this->input->post('phone');
            $type   =   $this->input->post('type');
            $ref_id =   $this->input->post('ref_id');

            $insert = array(
                'name'      =>  $name,
                'email'     =>  $email,
                'is_active' =>  '0',
                'phone'     =>  $phone,
                'reference_d' =>  $ref_id,
                'admin_type' =>  $type,
                'added_by' =>  $this->session->userdata('aa_id'),
            );
            $result = $this->m_adminuser->insert($insert);
            if($result){
                $this->userEmail($insert);
                $this->session->set_flashdata('success', 'Admin user added Successfully');
               redirect('adminuser/manage');
            }else{
                $this->session->set_flashdata('error', 'Some error occured please try again');
                redirect('adminuser/add');
            }

        }


    }

    function userEmail($insert='')
    {
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');
        $data['result'] = $insert;
        $msg = $this->load->view('email/adminuser', $data, true);
        $this->email->set_newline("\r\n");
        $this->email->from($from , 'Rajahousing');
        $this->email->to($data['result']['email']);
        $this->email->subject('Registration verification'); 
        $this->email->message($msg);
        if($this->email->send())  
        {  
            return true;
        } 
        else
        {
            return false;
        }
        
    }




    public function delete($id='')
    {
        if($this->m_adminuser->delete($id)){
            $this->session->set_flashdata('success', 'Admin deleted Successfully');
            redirect('adminuser/manage','refresh');
       }else{
            $this->session->set_flashdata('error', 'Some error occured please try again');
            redirect('adminuser/manage','refresh');
       }
    }

    public function edit($id = '')
    {
        $data['result'] = $this->m_adminuser->edit($id);
        $data['title']  = 'Admin User - Raja housing';
        $this->load->view('adminuser/edit-admin', $data);         
    }

    public function update($value='')
    {

            $name   =   $this->input->post('name');
            $email  =   $this->input->post('email');
            $phone  =   $this->input->post('phone');
            $type   =   $this->input->post('admintype');
            $id     =   $this->input->post('id');
            $active =   $this->input->post('active');
            
            $update = array(
                'name'      =>  $name,
                'email'     =>  $email,
                'is_active' =>  $active,
                'phone'     =>  $phone,
                'admin_type' =>  $type,
            );

            $result = $this->m_adminuser->update($update,$id);
            if($result){
                $this->session->set_flashdata('success', 'Admin user updated Successfully');
                redirect('adminuser/edit/'.$id);
            }else{
                $this->session->set_flashdata('error', 'Some error occured please try again');
                redirect('adminuser/edit/'.$id);
            }
    }


    // account activation
    public function verify($var = null)
    {
       $regid = $this->input->get('regid');
       $regmail = $this->input->get('regmail');
       $newRegid = random_string('alnum', 50);
       if($this->m_adminuser->activateAccount($regid, $newRegid,$regmail)){
        $this->session->set_flashdata('success', 'Your account has been activated successfully. You can  login now. ');
        redirect('adminuser/add-pass/'.$newRegid.'/'.$regmail,'refresh');
       }else{
        $this->session->set_flashdata('error', 'Activation link expired! <br> please request admin for activation link');
        // redirect('login','refresh');
        redirect('adminuser/add-pass/'.$newRegid.'/'.urlencode($regmail),'refresh');
       }
    }


    public function add_pass($id='')
    {
        $data['id'] = $id;
       $this->load->view('adminuser/add-pass', $data, FALSE);
    }


    public function update_pass()
    {
        $id     = $this->input->post('id');
        $remail = $this->input->post('remail');
        $this->form_validation->set_rules('remail', 'Email', 'required');
        $this->form_validation->set_rules('password', 'New Password', 'required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
        if ($this->form_validation->run() == false) {
            $error = validation_errors();
            $this->session->set_flashdata('error', $error);
             redirect('adminuser/add-pass/'.$id.'/'.urlencode($remail),'refresh');
        } else {
            $newpass = $this->input->post('password');
            $hash       = $this->bcrypt->hash_password($newpass);
            $newid  =   random_string('alnum',20);
            $datas = array(
                    'reference_d' => $newid,
                    'password' => $hash,
                );

            if ($this->m_adminuser->setPassword($datas, $remail,$id)) {
                $this->session->set_flashdata('success', 'Password updated Successfully');
                redirect('login', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, please try again later!.'); 
                redirect('adminuser/add-pass/'.$id.'/'.urlencode($remail),'refresh');
            }
        }
    }

}