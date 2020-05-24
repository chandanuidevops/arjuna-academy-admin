<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_event extends CI_Model {

   
    //insert event event
    public function insert($insert = null)
    {
        $this->db->get('event');
        $this->db->insert('event', $insert);
         if($this->db->affected_rows()>0){
            return true;
         }else{
             return false;
         }
    }

  
    //get featured 
    public function eventGet($var = null)
    {
        return $this->db->order_by('date', 'desc')->get('event')->result();     
    }

     //event_id get
     public function eventIdGet($id = null)
     {
         $this->db->where('id', $id);
         return $this->db->get('event')->row_array();    
     }

   

     //update event 
    public function update($insert , $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('event')->row();
        if(!empty($query)){
            if(!empty($insert['event_image'])){
                if(!empty($query->event_image)){
                    unlink('../'.$query->event_image);
                }
            }
            if(!empty($insert['event_thumb'])){
                if(!empty($query->event_thumb)){
                    unlink('../'.$query->event_thumb);
                }
            }
            $this->db->where('id', $id);
            return $this->db->update('event',$insert);
           

        }else{
            return false;
        }
    }

 

    

    //delete event
    public function event_delete($id)
    {
     $this->db->where('id',$id);
     $query = $this->db->get('event')->row();

     if (!empty($query)) {
         $this->db->where('id',$id);
         $this->db->delete('event');
         if(!empty($query->event_image)){
             unlink('../'.$query->event_image);
         }
         if(!empty($query->event_thumb)){
            unlink('../'.$query->event_thumb);
        }

         return true;
     }else{
         return false;
     }
    }
}

/* End of file ModelName.php */
