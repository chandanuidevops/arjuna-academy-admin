<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_account extends CI_Model {

	/**
	*Change pasword -> Update New password
	* @url : change-password
	*/
	public function changepass($admin,$npass,$cpass)
	{

		$this->db->where('id', $admin);
		$this->db->where('password', $cpass);
		$query = $this->db->get('admin');
		if($query->num_rows() > 0)
		{
			$this->db->where('id', $admin);
			$this->db->update('admin',  array('password' =>$npass));
			if ($this->db->affected_rows() > 0)
			{
				return true;
			}else{

				return false;
			}
		} else {
			return false;
		}
	}

	/**
	*Change pasword -> Update New password
	* @url : change-password
	*/
    public function account($value='')
    {
      $this->db->where('id', $value);
      $query =  $this->db->get('admin');
  
      if ($query->num_rows()>0) 
      {
        return $query->row_array();
      }else{
        return false;
      }
    }

             /**
		*account settings -> Update account
        * @url : update-profile
        *@param : admin uniq id, name phone, date
		*/
        public function acupdte($ac_uniq,$acuname,$acphone,$date)
        {
          $this->db->where('id', $ac_uniq);
          $this->db->update('admin',  array('name' =>$acuname ,'phone'=>$acphone,'updated_date'=>$date ));
          if ($this->db->affected_rows() > 0) 
          {
           return true;
          }else{
            return false;
          }
        }

	

}

/* End of file M_account.php */
/* Location: ./application/models/M_account.php */