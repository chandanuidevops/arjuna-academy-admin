<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('aa_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_account');
    }

    /**
     * Admin login-> load view page
     * url : login
    **/
	public function index()
	{
		if ($this->session->userdata('aa_id') != '') {
            $data['title'] = 'admin-profile - Arjun Academy';
            $this->load->view('account/change-password.php', $data);
        } else {
            $this->session->set_flashdata('error', 'Please login');
            redirect('admin');
        }
		
	}


    /**
     *Change pasword -> Update New password
     * @url : update/change-password
     * @param : new password,confirm password,userid
     */
    public function password_validation()
    {
        $this->form_validation->set_rules('crpassword', 'Current Password', 'callback_passwordcheck');
        $this->form_validation->set_rules('password', 'New Password', 'required');
        $this->form_validation->set_rules('cnpassword', 'Confirm Password', 'required|matches[password]');
        if ($this->form_validation->run() == false) {
            $error = validation_errors();
            $this->session->set_flashdata('formerror', $error);
            redirect('change-password');
        } else {
            $crpassword = $this->input->post('crpassword');
            $password = $this->input->post('password');
            $admin = $this->session->userdata('aa_id');
            if ($this->m_account->changepass($admin, $password, $crpassword)) {
                $this->session->set_flashdata('success', 'Password updated Successfully');
                redirect('change-password', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'unable to update your password, New password is matching with the current password!');
                redirect('change-password', 'refresh');
            }
        }
    }

    public function passwordcheck($password)
    {
        $this->db->where('id', $this->session->userdata('aa_id'));
        $this->db->where('password', $password);
        $result = $this->db->get('admin');
        if ($result->num_rows() > 0) {
            return true;
        } else {
            $this->form_validation->set_message('passwordcheck', 'The {field} is not Valid');
            return false;
        }
    }

    /**
     *account settings -> load view page
     * @url : profile
     */
    public function accntsttngs()
    {
            $data['title'] = 'Account settings - Arjun Academy';
            $admin = $this->session->userdata('aa_id');
            $data['setting'] = $this->m_account->account($admin);
            $this->load->view('account/profile.php', $data, false);
        
    }

    /**
     *account settings -> Update account
     * @url : update-profile
     *@param : admin uniq id, name phone, date
     */
    public function updateacnt()
    {
        $data['title'] = 'Account settings - Arjun Academy';
        $admin = $this->session->userdata('aa_id');
        
        $acuname = $this->input->post('username');
        $acphone = $this->input->post('phone');
        $date = date('Y-m-d H:i:s');
        if ($this->m_account->acupdte($admin, $acuname, $acphone, $date)) {
            $this->session->set_flashdata('success', 'Account updated Successfully');
            redirect('profile', 'refresh');
        } else {
            $this->session->set_flashdata('error', 'Something went wrong please try again!');
            redirect('profile', 'refresh');
        }
    }
}