<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_test_result extends CI_Model {

	    
    public function view($test_id='')
	{

		$this->db->where('test_id',$test_id );
        //   $this->db->where('qz.user_id', $uid);
            $this->db->select('qz.id,qz.test_id, qz.question,qz.status,qz.correct,qz.answer,qz.time,qz.sub_id,qz.subject, qr.percent,qr.sub_id,qr.duration');
            $this->db->from('quiz qz');
          
            $this->db->join('question_row qr', 'qr.id   = qz.q_row_id','left');
             $query= $this->db->order_by('qz.id', 'desc')->get()->result_array();
             return $query;
    }
    
    //get enquiries
	public function getTest($value='')
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
    public function total_question( $test_id)
    {
     
      $this->db->where('test_id',$test_id );
      $query = $this->db->get('quiz')->result();
      return count($query);
    }

    public function attempt($test_id)
    {
      $this->db->where('status',1);
     
      $this->db->where('test_id',$test_id );
      $query = $this->db->get('quiz')->result();
      return count($query);

    }

    public function subject_detail($uid,$test_id )
    {
      $this->db->where('test_id',$test_id );
      $this->db->where('user_id',$uid );
      $this->db->group_by('subject');
      $query = $this->db->get('quiz')->result();
      return $query;
    }
    public function get_test_detail($uid, $id)
    {
        $this->db->where('id',$id);
        $this->db->where('user_id',$uid);
        $query = $this->db->get('test_payment')->row();
        if(!empty($query)){
            return $query;
        }else{
            return false;
        }

    }
}

/* End of file M_authentication.php */
/* Location: ./application/models/M_authentication.php */