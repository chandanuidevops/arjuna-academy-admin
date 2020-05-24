<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home_gallery extends CI_Model {

   
    //insert gallery featured
    public function insert($insert = null)
    {
        $this->db->get('home_gallery');
         $this->db->insert('home_gallery', $insert);
         if($this->db->affected_rows()>0){
            return true;
         }else{
             return false;
         }
    }

     
    //get featured 
    public function galleryGet($var = null)
    {
        return $this->db->order_by('id', 'desc')->get('home_gallery')->result();     
    }

     //category_id get
     public function galleryIdGet($id = null)
     {
         $this->db->where('id', $id);
         return $this->db->get('home_gallery')->row_array();    
     }

     //category_id get
    //  public function galleryImageGet($featured_id ='')
    //  {
    //      $this->db->where('featured_id', $featured_id);
    //      return $this->db->get('gallery')->result();    
    //  }

     //update gallery 
    public function update_gallery($insert , $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('home_gallery')->row();
        if(!empty($query)){
            if(!empty($insert['gallery_image'])){
                if(!empty($query->gallery_image)){
                    unlink('../'.$query->gallery_image);
                }
            }
            if(!empty($insert['thumb_image'])){
                if(!empty($query->thumb_image)){
                    unlink('../'.$query->thumb_image);
                }
            }
            $this->db->where('id', $id);
            $this->db->update('home_gallery',$insert);
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }

        }else{
            return false;
        }
    }

    // public function delete_gallery($ids)
    // {
    //     $this->db->where_in('id', explode(",", $ids));
    //     $query = $this->db->get('gallery')->result();
        
    //     foreach($query as $key=>$value){
    //         if(!empty($value->images)){
    //             unlink('../'.$value->images);
    //         }
    //         if(!empty($value->images_thumb)){
    //             unlink('../'.$value->images_thumb);
    //         }
    //     }
    //     $this->db->where_in('id', explode(",", $ids));
    //     $this->db->delete('gallery');
    //     return true;
    // }

    public function delete_gallery($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('home_gallery')->row();

        if (!empty($query)) {
            $this->db->where('id',$id);
            
            if(!empty($query->gallery_image)){
                unlink('../'.$query->gallery_image);
            }
            if(!empty($query->thumb_image)){
                unlink('../'.$query->thumb_image);
            }
            $this->db->delete('home_gallery');
                        
          
            return true;
        }else{
            return false;
        }
    }
    

    // //delete gallery
    // public function gallery_delete($id)
    // {
    //  $this->db->where('id',$id);
    //  $query = $this->db->get('gallery')->row();
        

        
    //  if (!empty($query)) {
    //      $this->db->where('id',$id);
    //      $this->db->delete('gallery');
    //      if(!empty($query->images)){
    //          unlink('../'.$query->images);
    //      }
    //      if(!empty($query->images_thumb)){
    //         unlink('../'.$query->images_thumb);
    //     }

    //      return true;
    //  }else{
    //      return false;
    //  }
    // }
}

/* End of file ModelName.php */
