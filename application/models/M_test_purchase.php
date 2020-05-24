<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_test_purchase extends CI_Model {

	    
    public function view($id='')
	{
		return $this->db->where('id', $id)->get('test_payment')->row();
    }
    
    //get enquiries
	public function getPurchaseTest($value='')
	{
		return $this->db->order_by('id', 'desc')->get('test_payment')->result();
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('test_payment')->row();
        if(!empty($query)){
            $this->db->where('id', $id);
            $this->db->delete('test_payment');
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