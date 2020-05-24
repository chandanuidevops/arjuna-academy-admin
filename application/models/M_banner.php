<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_banner extends CI_Model {

    //banner get
    public function bannerGet($var = null)
    {
       
        return $this->db->order_by('id', 'desc')->get('banner')->result();    
    }


    //insert banner
    public function insert($insert = null)
    {
        
       
        $this->db->where('uniq', $insert['uniq']);
        $query = $this->db->get('banner');
        if($query->num_rows() > 0){
            $this->db->where('uniq', $insert['uniq']);
            return $this->db->update('banner', $insert);
        }else{
            return $this->db->insert('banner', $insert);
        } 
    }
    public function bannerIdGet($id = null)
    {
        $this->db->where('id', $id);
        return $this->db->get('banner')->row_array();    
    }

   



    public function update_banner($insert , $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('banner')->row();
        if(!empty($query)){
            if(!empty($insert['banner_img'])){
                if(!empty($query->banner_img)){
                    unlink('../'.$query->banner_img);
                }
            }
            if(!empty($insert['banner_thumb'])){
                if(!empty($query->banner_thumb)){
                    unlink('../'.$query->banner_thumb);
                }
            }
            $this->db->where('id', $id);
            $this->db->update('banner',$insert);
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }

        }else{
            return false;
        }
    }
    
    public function delete_banner($id = null)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('banner')->row();
           
   
           
        if (!empty($query)) {
            $this->db->where('id',$id);
            $this->db->delete('banner');
            if(!empty($query->banner_thumb)){
                unlink('../'.$query->banner_thumb);
            }
            if(!empty($query->banner_img)){
                unlink('../'.$query->banner_img);
            }
           
   
            return true;
        }else{
            return false;
        }
    }

    

   

  

}

/* End of file ModelName.php */
