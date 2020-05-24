<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_adminuser extends CI_Model {


	    //admin user get
    public function subuserGet($var = null)
    {
        return $this->db->order_by('id', 'desc')->where('admin_type != 3')->get('admin')->result();    
    }



	//insert admin user
	public function insert($insert='')
	{
		$this->db->where('reference_d', $insert['reference_d']);
        $query = $this->db->get('admin');
        if($query->num_rows() > 0){
            $this->db->where('reference_d', $insert['reference_d']);
            return $this->db->update('admin', $insert);
        }else{
            return $this->db->insert('admin', $insert);
        } 
	}

	public function delete($id = null)
    {
        $this->db->where('id', $id);
        $this->db->delete('admin');
        if ($this->db->affected_rows() > 0) {
            return true;
        }else{
            return false;
        }

    }

    public function edit($id = null)
    {
        return $this->db->where('id', $id)->get('admin')->row();
    }

    	//update admin user
	public function update($update='',$id='')
	{
		$this->db->where('id', $id);
        $this->db->update('admin', $update);
        if ($this->db->affected_rows() > 0) {
            return true;
        }else{
            return false;
        }
	}

    //  account activation
    public function activateAccount($regid='', $newRegid='',$regmail='')
    {
        $this->db->where('reference_d', $regid);
        $this->db->where('email', $regmail);
        $result = $this->db->get('admin');
        if($result->num_rows() > 0){
            $this->db->where('reference_d', $regid);
            $this->db->where('email', $regmail);
            $this->db->update('admin', array('reference_d' => $newRegid, 'is_active' => '1', 'updated_date' => date('Y-m-d H:i:s')));
            if($this->db->affected_rows() > 0){
            return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }


    public function setPassword($datas, $remail,$id)
    {
        $this->db->where('reference_d', $id);
        $this->db->where('email', $remail);
        $this->db->update('admin', $datas);
        if ($this->db->affected_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }


	

}

/* End of file M_adminuser.php */
/* Location: ./application/models/M_adminuser.php */