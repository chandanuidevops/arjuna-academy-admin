<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_job_application extends CI_Model {

	    
    public function view($id='')
	{
		return $this->db->where('id', $id)->get('job_apply')->row();
    }
    
    //get enquiries
	public function getEnquiry($value='')
	{
		return $this->db->order_by('id', 'desc')->get('job_apply')->result();
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('job_apply')->row();
        if(!empty($query)){
            
                if(!empty($query->resume)){
                    unlink('../'.$query->resume);
                }
         
            $this->db->where('id', $id);
            $this->db->delete('job_apply');
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