<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_job extends CI_Model {

    //insert gallery featured
    public function insert($insert = null)
    {
        $this->db->get('job');
         $this->db->insert('job', $insert);

         if($this->db->affected_rows()>0){
           
            return true;
         }else{
             return false;
         }
    }

    //get course 
    public function jobGet($var = null)
    {
        return $this->db->order_by('id', 'desc')->get('job')->result();     
    }

     //course get
     public function jobIdGet($id = null)
     {
         $this->db->where('id', $id);
         return $this->db->get('job')->row_array();    
     }

     //update course
     public function update($insert , $id)
     {
         $this->db->where('id', $id);
         $query = $this->db->get('job')->row();
         if(!empty($query)){

             $this->db->where('id', $id);
            return $this->db->update('job',$insert);
            
 
         }else{
             return false;
         }
     }

      //update course
      public function delete_job($id)
      {
          $this->db->where('id', $id);
          $query = $this->db->get('job')->row();
          if(!empty($query)){
              $this->db->where('id', $id);
              $this->db->delete('job');
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
