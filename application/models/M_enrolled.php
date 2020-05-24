<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_enrolled extends CI_Model {

	    
    public function view($id='')
	{
		return $this->db->where('id', $id)->get('enroll')->row();
    }
    
    //get enquiries
	public function getEnrolled($value='')
	{
		return $this->db->order_by('id', 'desc')->get('enroll')->result();
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('enroll')->row();
        if(!empty($query)){
            $this->db->where('id', $id);
            $this->db->delete('enroll');
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }

        }else{
            return false;
        }
    }
}

/* End of file M_authentication.php */
/* Location: ./application/models/M_authentication.php */