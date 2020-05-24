<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_authentication extends CI_Model {

	    /***admin login
	    * @param : email/username , password
	    *
	    **/ 
		function can_login($email, $password)  
	      {  
        
           $this->db->where('password', $password); 
           $this->db->group_start(); 
            $this->db->where('name', $email);  
            $this->db->or_where('email', $email); 
           $this->db->group_end();
           $query = $this->db->get('admin');
           //SELECT * FROM users WHERE username = '$username' AND password = '$password'  
           if($query->num_rows() > 0)  
           {  
                return $query->row_array();  
           } else{
            return false;
           }
          
      } 



        /**
		* forget pasword mail check exist or not
		* @url : forgot/email-check
		* @param : email and forgot-id
		*/ 
		public function check_mail($email,$forgotid)
		{
        $this->db->where('email', $email);
        $query = $this->db->get('admin');

        if($query->num_rows() > 0)  
           {
            $this->db->where('email', $email);
            $this->db->update('admin',array('forgot_link' =>$forgotid));
            return true;
           }  
           else  
           {
              return false;
           }
        }

        /**
		* forget pasword -> update new password
		* @url : update-password
		* @param : email and forgot-id , new password
		*/ 
        public function addforgtpass($email,$newpass,$forgotid)
		{
            $this->db->where('email', $email);
			$this->db->where('forgot_link', $forgotid);
			$query = $this->db->get('admin');
			if($query->num_rows() > 0)
			{
			    $this->db->where('email', $email);
                $this->db->where('forgot_link', $forgotid);
                $this->db->update('admin',  array(' password ' =>$newpass,'forgot_link'=>random_string('alnum',16)));
                if ($this->db->affected_rows() > 0) 
                {
                	return true;
                }else{
                	return false;
                }
			}else
			{
             return false;  
			}
			
        }


  public function adminUser($value='')
  {
    $result =  $this->db->where('is_active','1')->get('admin')->result();
    return count($result);
  }

  public function jobCount($value='')
  {
    $result =  $this->db->get('job')->result();
    return count($result);
  }
  public function enquiryCount($value='')
  {
    $result =  $this->db->get('contact')->result();
    return count($result);
  }
  public function job_appl_Count($value='')
  {
    $result =  $this->db->get('job_apply')->result();
    return count($result);
  }
  public function course_appl_Count($value='')
  {
    $result =  $this->db->get('course_apply')->result();
    return count($result);
  }

  public function course_Count($value='')
  {
    $result =  $this->db->get('course')->result();
    return count($result);
  }
  
  public function registerCount($value='')
  {
    $result =  $this->db->get('user')->result();
    return count($result);
  }
  
  public function interviewSchedule($value='')
  {
    $result =  $this->db->get('student_schedule')->result();
    return count($result);
  }
  public function testCount($value='')
  {
    $this->db->where('status',2);
    $result =  $this->db->get('test_payment')->result();
    return count($result);
  }


  public function coursePayment($value='')
  {
    $total=0;
    $result =  $this->db->get('enroll')->result();
    foreach($result as $key=>$val){
     $total= $total+ (int)($val->amount);

    }
    return $total;
  }
  public function testPayment($value='')
  {
    $total=0;
    $result =  $this->db->get('test_payment')->result();
    foreach($result as $key=>$val){
     $total= $total+ (int)($val->amount);

    }
    return $total;
  }

  
	
  
}

/* End of file M_authentication.php */
/* Location: ./application/models/M_authentication.php */