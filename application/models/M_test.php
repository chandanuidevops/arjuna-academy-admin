<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_test extends CI_Model {

    public function insert_subject($insert)
    {
        $this->db->where('subject',$insert['subject']);
        $query = $this->db->get('tbl_subject');
        if($query->num_rows()>0){
            $this->db->where('subject',$insert['subject']);
          return  $this->db->update('tbl_subject',$insert);
        }else{
            return $this->db->insert('tbl_subject',$insert);
        }
       
    }



    public function get_subject(Type $var = null)
    {
        return    $this->db->order_by('id', 'desc')->get('tbl_subject')->result();
    }



    public function getSubjectId($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('tbl_subject');
        if($query->num_rows()>0)
        {
           
            return $query->row();
        }else{
            return false;
        }
    }

    public function get_question_row_id($uniq)
    {
        $this->db->where('uniq',$uniq);
        $query = $this->db->get('question_row');
        if($query->num_rows()>0)
        {
            return $query->row();
        }else{
            return false;
        }
    }

    public function edit_sub($insert,$id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('tbl_subject');

        if($query->num_rows()>0){
           
            $this->db->where('subject',$insert['subject']);
            $q = $this->db->get('tbl_subject');
            
            if($q->num_rows()>0){
                return false;
            }else{
                $this->db->where('id',$id);
                return  $this->db->update('tbl_subject',$insert);
            }
           
        }else{
            return false;
        }
    }

 public function get_total_rows()
 {
     $query =  $this->db->get('question_row')->result();
     if(!empty($query)){
         return $query;
     }
 }  

    public function insert_question($insert)
    {

        $this->db->where('question',$insert['question']);
        $query = $this->db->get('tbl_question');
       
        if($query->num_rows()>0){

          return  false;
        }else{
            $row = $this->db->where('q_row_id',$insert['q_row_id'])->get('tbl_question')->num_rows();
    
           if($row >=3){

               return 3;
           }
             $this->db->insert('tbl_question',$insert);
             return  $this->db->insert_id();
        }
    }

    public function insert_answer($insert)
    {     
        return   $this->db->insert('answer',$insert);
    }

    public function get_questions($sub_id,$q_row_id='')
    {

        $this->db->where('q.sub_id', $sub_id);
        if(!empty($q_row_id)){
            $this->db->where('q.q_row_id', $q_row_id); 
        }       
              
        $this->db->select('q.id, q.question, q.sub_id, q.subject,q.question_img, q.q_row_id, q.correct, a.choice1,a.choice2,a.choice3,a.choice4, a.choice_img1, a.choice_img2, a.choice_img3, a.choice_img4');
        $this->db->from('tbl_question q');
        $this->db->join('answer a', 'a.q_id   = q.id','left');
        return $this->db->order_by('q.id', 'desc')->get()->result();
    }
    public function getQuestiontId($id)
    {
        $this->db->where('q.id', $id);        
        $this->db->select('q.id, q.question, q.sub_id,q.question_img, q.subject, q.q_row_id, q.correct, a.choice1,a.choice2,a.choice3,a.choice4, a.choice_img1, a.choice_img2, a.choice_img3, a.choice_img4');
        $this->db->from('tbl_question q');
        $this->db->join('answer a', 'a.q_id   = q.id','left');
        return $this->db->order_by('q.id', 'desc')->get()->row();
    }

    public function delete_subject($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('tbl_subject');
        if($query->num_rows()>0)
        {
            $this->db->where('id',$id);
             $this->db->delete('tbl_subject');
            $ques = $this->db->select('id')->where('sub_id', $id)->get('question_row')->result();
            
            if(!empty($ques)){ 
                foreach($ques as $key => $val){
                    $this->delete_question_rowId($val->id);
                }
            }
            return true;
        }else{
            return false;
        }
    }
    public function delete_schedule($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('tbl_schedule');
        if($query->num_rows()>0)
        {
            $this->db->where('id',$id);
            return $this->db->delete('tbl_schedule');
             
        }else{
            return false;
        }
    }

    public function delete_question_rowId($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('question_row')->row();
        if(!empty($query)){
            $this->db->where('id', $id);
            $this->db->delete('question_row');
            
            if($this->db->affected_rows() > 0){
              $ques = $this->db->select('id')->where('q_row_id', $id)->get('tbl_question')->result();
              foreach($ques as $key=>$value){
                $this->delete_questionId($value->id);
              }
              
                return true;
            }else{
                return false;
            }

        }else{
            return false;
        }
    }


    public function delete_questionId($id)
      {
          $this->db->where('id', $id);
          $query = $this->db->get('tbl_question')->row();
          if(!empty($query)){
            if(!empty($query->question_img)){
                unlink('../'.$query->question_img);
            }
              $this->db->where('id', $id);
              $this->db->delete('tbl_question');
              if($this->db->affected_rows() > 0){
                $ans = $this->db->select('q_id')->where('q_id', $id)->get('answer')->row();
                $this->delete_answer($ans->q_id);
                  return true;
              }else{
                  return false;
              }
  
          }else{
              return false;
          }
      }
      public function delete_answer($q_id)
      {
        $this->db->where('q_id', $q_id);
        $query = $this->db->get('answer')->row();
        if(!empty($query)){
            $this->db->where('q_id', $q_id);
           
          
                if(!empty($query->choice_img1)){
                    unlink('../'.$query->choice_img1);
                }
         
           
                if(!empty($query->choice_img2)){
                    unlink('../'.$query->choice_img2);
                }
          
         
                if(!empty($query->choice_img3)){
                    unlink('../'.$query->choice_img3);
                }
         
           
                if(!empty($query->choice_img4)){
                    unlink('../'.$query->choice_img4);
                }
                $this->db->delete('answer');
            if($this->db->affected_rows() > 0){
               
                return true;
            }else{
                return false;
            }

        }else{
            return false;
        }
      }

      public function update_question($insert, $id)
      {
      
          $this->db->where('id',$id);
          $query = $this->db->get('tbl_question')->row();
          if(!empty($query)){
            if(!empty($insert['question_img'])){
                if(!empty($query->question_img)){
                    unlink('../'.$query->question_img);
                }
            }
                $this->db->where('id',$id);
                return $this->db->update('tbl_question',$insert);
          }else{
              return false;
          }
      }

      public function update_answer($insertAns, $id)
      {
          $this->db->where('q_id',$id);
          $query = $this->db->get('answer')->row();
          if(!empty($query)){
                $this->db->where('q_id',$id);
                
               
              

                if(!empty($insertAns['choice_img1'])){
                    if(!empty($query->choice_img1)){
                        unlink('../'.$query->choice_img1);
                    }
                }
                if(!empty($insertAns['choice_img2'])){
                    if(!empty($query->choice_img2)){
                        unlink('../'.$query->choice_img2);
                    }
                }
                if(!empty($insertAns['choice_img3'])){
                    if(!empty($query->choice_img3)){
                        unlink('../'.$query->choice_img3);
                    }
                }
                if(!empty($insertAns['choice_img4'])){
                    if(!empty($query->choice_img4)){
                        unlink('../'.$query->choice_img4);
                    }
                }
              
               
                
                
                
                return $this->db->update('answer',$insertAns);
          }else{
              return false;
          }
      }

      public function getSubjePercent($id)
      {
          $this->db->where('id',$id);
          $sub_id = $this->db->get('tbl_question')->row()->sub_id;
          $query=$this->tota_percent($sub_id);
          return $query;
          
      }
      public function tota_percent($sub_id)
      {
          $this->db->select('percent');
        $this->db->where('sub_id',$sub_id);
        $query = $this->db->get('tbl_question')->result();
        return $query ;
      }

      public function get_ques_count()
      {
          
          $this->db->get('tbl_question');
          return $this->db->count_all_results();
      }
      

      public function insert_question_row($insert)
      {
        return   $this->db->insert('question_row',$insert);
      }
      public function update_question_row($insert,$uniq)
      {
          $this->db->where('uniq',$uniq);
          $query= $this->db->get('question_row');
          if($query->num_rows()>0){
                $this->db->where('uniq',$uniq);
              return $this->db->update('question_row',$insert);
          }else{
              return false;
          }
       
      }

      public function get_question_row($sub_id)
      {
          $this->db->where('sub_id',$sub_id);
          $query = $this->db->get('question_row')->result();
          if(!empty($query))
          {
              return $query;
          }else{
              return false;
          }
      }

      public function get_subject_name($id)
      {
        $this->db->where('id',$id);
        $query = $this->db->get('tbl_subject')->row();
        if(!empty($query))
        {
            return $query;
        }else{
            return false;
        }
      }

      public function insert_schedule($insert)
      {
          $this->db->where('date',$insert['date']);
          $this->db->where('time',$insert['time']);

          $query = $this->db->get('tbl_schedule');
          if($query->num_rows()>0){
            $this->db->where('date',$insert['date']);
            $this->db->where('time',$insert['time']);
            return  $this->db->update('tbl_schedule',$insert);
          }else{
              return $this->db->insert('tbl_schedule',$insert);
          }
         
      }
      public function get_schedule(Type $var = null)
      {
          return    $this->db->order_by('id', 'desc')->get('tbl_schedule')->result();
      }

      public function getScheduleId($id)
      {
          $this->db->where('id',$id);
          $query = $this->db->get('tbl_schedule');
          if($query->num_rows()>0)
          {
             
              return $query->row();
          }else{
              return false;
          }
      }

      public function edit_schedule($insert,$id)
      {
          $this->db->where('id',$id);

          $query = $this->db->get('tbl_schedule');
  
          if($query->num_rows()>0){
             
            return  $this->db->update('tbl_schedule',$insert);
             
          }else{
              return false;
          }
      }

        public function getStudentSchedule()
        {
         
            $this->db->select('sch.id,sch.user_id, sch.schedule_id,sch.test_id,sch.created_on,sch.status,tch.date,tch.time,u.email,u.name, u.school,u.father,u.mother,u.father_mobile,u.mother_mobile');
            $this->db->from('student_schedule sch');
            
            $this->db->join('tbl_schedule tch', 'tch.id   = sch.schedule_id','left');
            $this->db->join('user u', 'u.id   = sch.user_id','left');
            $query= $this->db->order_by('sch.id', 'desc')->get()->result();
            return $query;
        }

        public function view_student($id)
        {
            
            $this->db->where('sch.id',$id);
            $this->db->select('sch.id,sch.user_id, sch.schedule_id,sch.test_id,sch.created_on,sch.status,tch.date,tch.time,u.email,u.name, u.school,u.father,u.mother,u.father_mobile,u.mother_mobile');
            $this->db->from('student_schedule sch');
            
            $this->db->join('tbl_schedule tch', 'tch.id   = sch.schedule_id','left');
            $this->db->join('user u', 'u.id   = sch.user_id','left');
            $query= $this->db->order_by('sch.id', 'desc')->get()->row();
            return $query;
        }

        public function delete_student_schedule($id)
        {
            $this->db->where('id', $id);
            $query = $this->db->get('student_schedule')->row();
            if(!empty($query)){
                $this->db->where('id', $id);
                $this->db->delete('student_schedule');
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










