<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admission extends CI_Model {

    public function insert_amount($insert)
    {
        $query = $this->db->get('admission_amount');
        if($query->num_rows()>0){
           
          return  false;
        }else{
            return $this->db->insert('admission_amount',$insert);
        }
    }



    public function get_amount(Type $var = null)
    {
        return    $this->db->order_by('id', 'desc')->get('admission_amount')->result();
    }

    public function get_admission(Type $var = null)
    {
        return    $this->db->order_by('id', 'desc')->get('admission')->result();
    }
public function getAdmissionId($id)
{
    $this->db->where('id',$id);
    $query = $this->db->get('admission')->row();
    if(!empty($query)){
        return $query;
    }else{
        return false;
    }
}

    public function getAmountId($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('admission_amount');
        if($query->num_rows()>0)
        {
           
            return $query->row();
        }else{
            return false;
        }
    }


    public function update_amount($insert,$id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('admission_amount');

        if($query->num_rows()>0){
            $this->db->where('id',$id);
            return  $this->db->update('admission_amount',$insert);
        }else{
            return false;
        }
    }




   

    public function delete_amount($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('admission_amount');
        if($query->num_rows()>0)
        {
            $this->db->where('id',$id);
            return   $this->db->delete('admission_amount');
 
        }else{
            return false;
        }
    }
    
    //delete admission details
    public function delete_admission($id)
    {
      $this->db->where('id', $id);
      $query = $this->db->get('admission')->row();
      if(!empty($query)){
          $this->db->where('id', $id);
              if(!empty($query->prep_percent)){
                  unlink('../'.$query->prep_percent);
              }
              $this->db->delete('admission');
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

/* End of file ModelName.php */










