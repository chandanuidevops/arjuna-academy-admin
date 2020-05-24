<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gallery extends CI_Model {

   
    //insert gallery featured
    public function insert($insert = null)
    {
        $this->db->get('featured');
         $this->db->insert('featured', $insert);

         if($this->db->affected_rows()>0){
           $id=  $this->db->insert_id();;
            return $id;
         }
    }

     //insert gallery image
     public function insert_image($data = array()){
        $insert = $this->db->insert('gallery',$data);
        return $insert?true:false;
    }
    //get featured 
    public function featuredGet($var = null)
    {
        return $this->db->order_by('id', 'desc')->get('featured')->result();     
    }

     //category_id get
     public function featuredIdGet($id = null)
     {
         $this->db->where('id', $id);
         return $this->db->get('featured')->row_array();    
     }

     //category_id get
     public function galleryImageGet($featured_id ='')
     {
         $this->db->where('featured_id', $featured_id);
         return $this->db->get('gallery')->result();    
     }

     //update gallery featured
    public function update_featured($insert , $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('featured')->row();
        if(!empty($query)){
            if(!empty($insert['feat_image'])){
                if(!empty($query->feat_image)){
                    unlink('../'.$query->feat_image);
                }
            }
            if(!empty($insert['feat_thumb'])){
                if(!empty($query->feat_thumb)){
                    unlink('../'.$query->feat_thumb);
                }
            }
            $this->db->where('id', $id);
            return $this->db->update('featured',$insert);
           

        }else{
            return false;
        }
    }

    public function delete_gallery($ids)
    {
        $this->db->where_in('id', explode(",", $ids));
        $query = $this->db->get('gallery')->result();
        
        foreach($query as $key=>$value){
            if(!empty($value->images)){
                unlink('../'.$value->images);
            }
            if(!empty($value->images_thumb)){
                unlink('../'.$value->images_thumb);
            }
        }
        $this->db->where_in('id', explode(",", $ids));
        $this->db->delete('gallery');
        return true;
    }

    public function delete_featured($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('featured')->row();

        if (!empty($query)) {
            $this->db->where('id',$id);
            $this->db->delete('featured');
            if(!empty($query->feat_image)){
                unlink('../'.$query->feat_image);
            }
            if(!empty($query->feat_thumb)){
                unlink('../'.$query->feat_thumb);
            }
            $gallery =  $this->db->select('id')->where('featured_id', $id)->get('gallery')->result();  
                        
            if(!empty($gallery)){ 
                foreach($gallery as $key => $val){
                    $this->gallery_delete($val->id);
                }
            }
            return true;
        }else{
            return false;
        }
    }
    

    //delete gallery
    public function gallery_delete($id)
    {
     $this->db->where('id',$id);
     $query = $this->db->get('gallery')->row();
        

        
     if (!empty($query)) {
         $this->db->where('id',$id);
         $this->db->delete('gallery');
         if(!empty($query->images)){
             unlink('../'.$query->images);
         }
         if(!empty($query->images_thumb)){
            unlink('../'.$query->images_thumb);
        }

         return true;
     }else{
         return false;
     }
    }
}

/* End of file ModelName.php */
