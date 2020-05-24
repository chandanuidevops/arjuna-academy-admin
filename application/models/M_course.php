<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_course extends CI_Model {

    //insert course 
    public function insert($insert = null)
    {
        $this->db->where('slug',$insert['slug']);
        $this->db->where('title',$insert['title']);
        $this->db->or_where('course',$insert['course']);
        $query = $this->db->get('course');

        if($query->num_rows()>0)
        {
            return false;
        }else{
            return $this->db->insert('course', $insert);

        }
    }

    public function insert_test($insert = null)
    {
            $this->db->insert('course_testimonial', $insert);
            if($this->db->affected_rows()>0){
             return true;
                }else{
                    return false;
                }
    }

    public function get_testimonial_id($course_id, $id)
    {
        $this->db->where('id',$id);
        $this->db->where('course_id',$course_id);
        $query= $this->db->get('course_testimonial')->row();
        return $query;
    }
    public function update_testimonial($insert,$id,$course_id)
    {
        $this->db->where('id', $id);
        $this->db->where('course_id', $course_id);
        $query = $this->db->get('course_testimonial')->row();
       
        if(!empty($query)){
           if(!empty($insert['testimonial_img'])){
               if(!empty($query->testimonial_img)){
                   unlink('../'.$query->testimonial_img);
               }
           }
           if(!empty($insert['testimonial_thumb'])){
               if(!empty($query->testimonial_thumb)){
                   unlink('../'.$query->testimonial_thumb);
               }
           }
          
            $this->db->where('id', $id);
            $this->db->where('course_id', $course_id);
           return $this->db->update('course_testimonial',$insert);
         
           
        }else{
            return false;
        }
    }

    //get course 
    public function courseGet($var = null)
    {
        return $this->db->order_by('id', 'desc')->get('course')->result();     
    }

     //course get
     public function courseIdGet($id = null)
     {
         $this->db->where('id', $id);
         return $this->db->get('course')->row_array();    
     }

     //update course
     public function update($insert , $id)
     {
         $this->db->where('id', $id);
         $query = $this->db->get('course')->row();
        
         if(!empty($query)){
            if(!empty($insert['video_background'])){
                if(!empty($query->video_background)){
                    unlink('../'.$query->video_background);
                }
            }
            if(!empty($insert['image_thumb'])){
                if(!empty($query->image_thumb)){
                    unlink('../'.$query->image_thumb);
                }
            }
           
             $this->db->where('id', $id);
            return $this->db->update('course',$insert);
          
            
         }else{
             return false;
         }
     }

      //update course
      public function delete_course($id)
      {
          $this->db->where('id', $id);
          $query = $this->db->get('course')->row();
          if(!empty($query)){

            
                // if(!empty($query->video_background)){
                //     unlink('../'.$query->video_background);
                // }
                // if(!empty($query->image_thumb)){
                //     unlink('../'.$query->image_thumb);
                // }
            
              
              $this->db->where('id', $id);
              $this->db->delete('course');
              
              if($this->db->affected_rows() > 0){
                $this->delete_testimonial_with_course($id);
                  return true;
              }else{
                  return false;
              }
  
          }else{
              return false;
          }
      }

      public function get_testimonial($id)
      {
        $this->db->where('course_id', $id);        
       
        return $this->db->order_by('id', 'desc')->get('course_testimonial')->result();
      }

      public function delete_testimonial($ids)
      {
          $this->db->where_in('id', explode(",", $ids));
          $query = $this->db->get('course_testimonial')->result();
          
          foreach($query as $key=>$value){
              if(!empty($value->testimonial_thumb)){
                  unlink('../'.$value->testimonial_thumb);
              }
              if(!empty($value->testimonial_img)){
                  unlink('../'.$value->testimonial_img);
              }
          }
          $this->db->where_in('id', explode(",", $ids));
          $this->db->delete('course_testimonial');
          return true;
      }

      public function delete_testimonial_with_course($course_id)
      {
           $this->db->where('course_id',$course_id );
        $query = $this->db->get('course_testimonial')->result();
          
         
          
          foreach($query as $key=>$value){
              if(!empty($value->testimonial_thumb)){
                  unlink('../'.$value->testimonial_thumb);
              }
              if(!empty($value->testimonial_img)){
                  unlink('../'.$value->testimonial_img);
              }
              $this->db->where('course_id',$course_id );
              return $this->db->delete('course_testimonial');
          }
         
         
         
      }
    
}

/* End of file ModelName.php */
