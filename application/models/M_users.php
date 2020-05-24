<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model {

	    
    public function view($id='')
	{
		return $this->db->where('id', $id)->get('user')->row();
    }
    
    //get enquiries
	public function getUsers($value='')
	{
		return $this->db->order_by('id', 'desc')->get('user')->result();
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('user')->row();
        if(!empty($query)){
            $this->db->where('id', $id);
            $this->db->delete('user');
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }

        }else{
            return false;
        }
    }

    public function block_user($status,$id)
    {
      $this->db->where('id', $id);
      $this->db->update('user',  array('status' =>$status  ));
      if ($this->db->affected_rows() > 0) 
      {
       return true;
      }else{
        return false;
      }
    }


}

/* End of file M_authentication.php */
/* Location: ./application/models/M_authentication.php */