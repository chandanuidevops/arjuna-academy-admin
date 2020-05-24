<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('aa_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
       
        $this->load->model('m_test');
    }

  //get enquiries
  public function index()
  {
    $data['title']  = 'Manage Test - Arjunaacademy';
    $data['result'] = $this->m_test->get_subject();
    
    $data['ques_count'] = $this->m_test->get_ques_count();
    
   
    
    $this->load->view('test/manage-test', $data, FALSE);
  }
 
  public function add_test(Type $var = null)
  {
    $data['title']  = 'Add Test - Arjunaacademy';
    $this->load->view('test/add-test', $data);
  }
  public function add_question($q_row_id='',$id='')
  {
    $data['title']  = 'Add Question - Arjunaacademy';
    $data['result'] = $this->m_test->getSubjectId($id);
    $data['q_row_id'] = $q_row_id;
    $this->load->view('test/add-question', $data);
  }

  public function manage_schedule()
  {
    $data['title']  = 'Schedule interview - Arjunaacademy';
    $this->load->view('test/manage-schedule', $data);
  }

  public function add_subject(Type $var = null)
  {
      $subject=$this->input->post('subject');
      

      $insert = array(
          'subject'=>$subject,
          'uniq'=>random_string('alnum',10),
      );
      
      $result = $this->m_test->insert_subject($insert);
      echo json_encode($result);
  }
public function edit_question_row($uniq='',$id='')
{
    $data['sub_id'] = $id;
    $data['rows'] = $this->m_test->get_question_row_id($uniq);
    $data['question_row'] = $this->m_test->get_question_row($id);
    $data['total_rows'] = $this->m_test->get_total_rows();
    $data['title']  = 'Edit question row - Arjunaacademy';
    $this->load->view('test/edit-question-row', $data);
}

  public function display_subject(Type $var = null)
  {
    $output='';
    $subject = $this->m_test->get_subject();

    if (!empty($subject)) { $count = 0; foreach ($subject as $key => $value) { 
        $count = $count+1;
        $output .='<tr>
                        <td>'. $count.'</td>
                        <td>'. $value->subject .'</td>
                        <td class="action-btn  center-align">
                        <a href="'. base_url('test/generate-question/'.$value->id.'') .'"
                        class="blue hoverable delete-btn modal-trigger"><i class="fas fa-plus  "></i></a>
                     
                            <a href="'. base_url('test/edit-subject/'.$value->id.'') .'"
                                class="blue hoverable delete-btn modal-trigger"><i class="fas fa-edit  "></i></a>
                            <a    href="'.base_url('test/delete/'.$value->id.'') .' " class="red hoverable delete-btn delete" id="delete"   ><i class="fas fa-trash " ></i></a>
                        </td>
                    </tr>';
            }
        }
    echo json_encode($output);
  }

  public function edit_subject($id)
  {
      $data['result'] = $this->m_test->getSubjectId($id);
     
      $data['title']  = 'Edit Subject - Arjunaacademy';
      $this->load->view('test/edit-subject', $data);
  }
  public function edit_schedule($id)
  {
      $data['result'] = $this->m_test->getScheduleId($id);
     
      $data['title']  = 'Edit Schedule - Arjunaacademy';
      $this->load->view('test/edit-schedule', $data);
  }
  public function edit_question($id)
  {
      $data['result'] = $this->m_test->getQuestiontId($id);      
      $data['title']  = 'Edit Question - Arjunaacademy';
      $this->load->view('test/edit-question', $data);
  }
  public function view_schedule()
  {
      $data['result'] = $this->m_test->getStudentSchedule();            
      $data['title']  = 'View schedule - Arjunaacademy';
      $this->load->view('test/view-schedule', $data);
  }
  public function view_student($id)
  {
      $data['result'] = $this->m_test->view_student($id);            
      $data['title']  = 'View student - Arjunaacademy';
      $this->load->view('test/view-student', $data);
  }



 

  public function edit()
  {
      $id = $this->input->post('id');
      $insert = array(
        'subject'=>$this->input->post('subject'),
        'uniq'=>random_string('alnum',10),
    );
    $result = $this->m_test->edit_sub($insert,$id);
    echo json_encode($result);

  }
  public function update()
  {
      $id = $this->input->post('id');
      $insert = array(
        'date'=>$this->input->post('date'),
        'time'=>$this->input->post('time'),
       
    );
 
    
    $result = $this->m_test->edit_schedule($insert,$id);
    if($result == true)
     {
        $this->session->set_flashdata('success', 'Schedule Updated Successfully');
        redirect('test/edit-schedule/'.$id,'refresh');
     }else{
        $this->session->set_flashdata('error', 'This subject is allready exist');
        redirect('test/edit-schedule/'.$id,'refresh');
     }

  }


  public function delete($id)
  {
      $result = $this->m_test->delete_subject($id);
     echo json_encode($result);
  }
  public function delete_schedule($id)
  {
      $result = $this->m_test->delete_schedule($id);
       
        echo json_encode($result);
  }
   
    public function insert_question(Type $var = null)
    {
        $id = $this->input->post('id');
        $insert = array(
            'question'=>$this->input->post('question'),
            'sub_id'=>$this->input->post('sub_id'),
            'subject'=>$this->input->post('subject'),
            'correct'=>$this->input->post('correct'),
            'q_row_id'=>$this->input->post('q_row_id'),
            'uniq'=>random_string('alnum',10),
        );

        $this->load->library('upload');
        $files = $_FILES;
        
        if (file_exists($_FILES['question_img']['tmp_name'])) {
        
        $config['upload_path'] = '../question-img/';
        $config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG|gif';
        $config['max_width'] = 0;
        $config['max_size']     = '512';
        $config['encrypt_name'] = true;
        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!is_dir($config['upload_path'])) {
        mkdir($config['upload_path'], 0777, true);
        }
       
        if (!$this->upload->do_upload('question_img')) {
        $error = array('error' => $this->upload->display_errors());
        $this->session->set_flashdata('error', $this->upload->display_errors());
        redirect('test/add-question/'.$q_row_id.'/'.$sub_id,'refresh');
        } 
        else
        {
        $upload_data = $this->upload->data();
        $file_name  = $upload_data['file_name'];
        $question_img    = 'question-img/'.$file_name;
        }
        }

     
        if (file_exists($_FILES['question_img']['tmp_name'])) {
            $insert['question_img'] = $question_img;
        } 
 
        
        $result = $this->m_test->insert_question($insert);
     
        $choice1=$this->input->post('choice1');
        $choice2=$this->input->post('choice2');
        $choice3=$this->input->post('choice3');
        $choice4=$this->input->post('choice4');

        if(!empty($result)){
            $insertAns= array(
                'q_id'=>$result,
                'sub_id'=>$this->input->post('sub_id'),
                'uniq'=>random_string('alnum',10),
            );
            if(!empty($choice1) && !empty($choice1) && !empty($choice1) && !empty($choice1)){
                $insertAns['choice1'] = $choice1;
                $insertAns['choice2'] = $choice2;
                $insertAns['choice3'] = $choice3;
                $insertAns['choice4'] = $choice4;
                $insert_result = $this->m_test->insert_answer($insertAns);
            }else{
                $files = $_FILES;
                $filesCount = count($_FILES['choice_img']['name']);

                if(!empty($filesCount)){
                    for($i = 0; $i < $filesCount; $i++){
                        $_FILES['file']['name']     = $_FILES['choice_img']['name'][$i];
                        $_FILES['file']['type']     = $_FILES['choice_img']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['choice_img']['tmp_name'][$i];
                        $_FILES['file']['error']     = $_FILES['choice_img']['error'][$i];
                        $_FILES['file']['size']     = $_FILES['choice_img']['size'][$i];
                        
                        $uploadPath = '../question-img/';
                        $config['upload_path'] = $uploadPath;
                        $config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG|gif';
                        $config['max_width'] = 0;
                        $config['encrypt_name'] = true;
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config); 
                        if($this->upload->do_upload('file')){
                           $fileData = $this->upload->data();
                           $file_name  = $fileData['file_name'];
                        }
                        $images[] = 'question-img/'.$file_name;
                    }
                }
                $insertAns['choice_img1'] = $images['0'];
                $insertAns['choice_img2'] = $images['1'];
                $insertAns['choice_img3'] = $images['2'];
                $insertAns['choice_img4'] = $images['3'];
                $insert_result = $this->m_test->insert_answer($insertAns);
            }            
        }
            echo json_encode($insert_result);
    }


    public function display_question()
    {
        $sub_id = $this->input->post('sub_id');
        $q_row_id = $this->input->post('q_row_id');

        $result = $this->m_test->get_questions($sub_id,$q_row_id);
        echo json_encode($result);
    }

    public function delete_question($id='',$sub_id='', $q_row_id='')
    {
        $result = $this->m_test->delete_questionId($id);
     echo json_encode($result);

    }

    public function update_question(Type $var = null)
    {
        $id = $this->input->post('id');
        $insert = array(
            'question'=>$this->input->post('question'),
            
            'correct'=>$this->input->post('correct'),
        );

        
        $this->load->library('upload');
        $files = $_FILES;
        
        if (file_exists($_FILES['question_img']['tmp_name'])) {
        
        $config['upload_path'] = '../question-img/';
        $config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG|gif';
        $config['max_width'] = 0;
        $config['max_size']     = '512';
        $config['encrypt_name'] = true;
        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!is_dir($config['upload_path'])) {
        mkdir($config['upload_path'], 0777, true);
        }
       
        if (!$this->upload->do_upload('question_img')) {
        $error = array('error' => $this->upload->display_errors());
       
        } 
        else
        {
        $upload_data = $this->upload->data();
        $file_name  = $upload_data['file_name'];
        $question_img    = 'question-img/'.$file_name;
        if (file_exists($_FILES['question_img']['tmp_name'])) {
            $insert['question_img'] = $question_img;
        } 
        }
        }

     
        if (!empty($error)) 
        {
            $output = $error;
         }else{
            $result = $this->m_test->update_question($insert, $id);

            $choice1=$this->input->post('choice1');
            $choice2=$this->input->post('choice2');
            $choice3=$this->input->post('choice3');
            $choice4=$this->input->post('choice4');
            
            if(!empty($result)){
                if(!empty($choice1) || !empty($choice2) || !empty($choice3) || !empty($choice4)){
                    $insertAns['choice1'] = $choice1;
                    $insertAns['choice2'] = $choice2;
                    $insertAns['choice3'] = $choice3;
                    $insertAns['choice4'] = $choice4;
                    $output = $this->m_test->update_answer($insertAns,$id);
                }else{
                    $files = $_FILES;
                    $filesCount = count($_FILES['choice_img']['name']);
    
                    if(!empty($filesCount)){
                        for($i = 0; $i < $filesCount; $i++){
                            $_FILES['file']['name']     = $_FILES['choice_img']['name'][$i];
                            $_FILES['file']['type']     = $_FILES['choice_img']['type'][$i];
                            $_FILES['file']['tmp_name'] = $_FILES['choice_img']['tmp_name'][$i];
                            $_FILES['file']['error']     = $_FILES['choice_img']['error'][$i];
                            $_FILES['file']['size']     = $_FILES['choice_img']['size'][$i];
                            
                            $uploadPath = '../question-img/';
                            $config['upload_path'] = $uploadPath;
                            $config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG|gif';
                            $config['max_width'] = 0;
                            $config['encrypt_name'] = true;
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config); 
                            if($this->upload->do_upload('file')){
                               $fileData = $this->upload->data();
                               $file_name  = $fileData['file_name'];
                            }
                            $images[] = 'question-img/'.$file_name;
                        }
                    }
                    $insertAns['choice_img1'] = $images['0'];
                    $insertAns['choice_img2'] = $images['1'];
                    $insertAns['choice_img3'] = $images['2'];
                    $insertAns['choice_img4'] = $images['3'];
                
                    $output = $this->m_test->update_answer($insertAns,$id);

                }
            }
         }



            echo json_encode($output);
    }

    public function view($id)
    {
        $data['subject'] = $this->m_test->getSubjectId($id); 
        $data['questions'] = $this->m_test->get_questions($id); 
        $data['question_row'] = $this->m_test->get_question_row($id);

        $data['title']  = 'View questions - Arjunaacademy';
        $this->load->view('test/view', $data);
    }

    public function generate_question($id)
    {
        $data['title']  = 'Generate Question - Arjunaacademy';
        $data['sub_id'] = $id;
        $data['question_row'] = $this->m_test->get_question_row($id);
        $data['subject'] = $this->m_test->get_subject_name($id);
        $data['total_rows'] = $this->m_test->get_total_rows();
        
        $this->load->view('test/generate-question', $data);
    }

    public function display_question_row()
    {
        $sub_id = $this->input->post('sub_id');
        $result = $this->m_test->get_question_row($sub_id);
        echo json_encode($result);
    }



    public function add_question_row(Type $var = null)
    {
        $insert = array(
            'dificulty'=>$this->input->post('dificulty'),
            'percent'=>$this->input->post('percent'),
            'duration'=>$this->input->post('duration'),
            'sub_id'=>$this->input->post('sub_id'),
            'uniq'=>random_string('alnum',10),
        );
        
       $result = $this->m_test->insert_question_row($insert);
        echo json_encode($result);
    }

    public function update_question_row(Type $var = null)
    {
        $uniq = $this->input->post('uniq');
        $insert = array(
            'dificulty'=>$this->input->post('dificulty'),
            'percent'=>$this->input->post('percent'),
            'duration'=>$this->input->post('duration'),
        );
        
       $result = $this->m_test->update_question_row($insert,$uniq);
        echo json_encode($result);
    }

    public function delete_question_row($id='',$sub_id='')
    {
        $result = $this->m_test->delete_question_rowId($id);
        echo json_encode($result);
    }
    

    public function add_schedule(Type $var = null)
    {
        $date=$this->input->post('date');
        $time=$this->input->post('time');
        $insert = array(
            'date'=>$date,
            'time'=>$time,
        );

        $result = $this->m_test->insert_schedule($insert);
        echo json_encode($result);
    }

    
  public function display_schedule(Type $var = null)
  {
    $output='';
    $schedule = $this->m_test->get_schedule();

    if (!empty($schedule)) { $count = 0; foreach ($schedule as $key => $value) { 
        $count = $count+1;
        $output .='<tr>
                        <td>'. $count.'</td>
                        <td>'. $value->date .'</td>
                        <td>'. $value->time .'</td>
                        <td class="action-btn  center-align">
                  
                     
                            <a href="'. base_url('test/edit-schedule/'.$value->id.'') .'"
                                class="blue hoverable delete-btn modal-trigger"><i class="fas fa-edit  "></i></a>
                            <a   href="'.base_url('test/delete_schedule/'.$value->id.'') .' "
                                class="red hoverable delete-btn delete" id="delete"><i class="fas fa-trash " ></i></a>
                        </td>
                    </tr>';
            }
        }
    echo json_encode($output);
  }

  public function delete_student_schedule($id)
  {
    $result = $this->m_test->delete_student_schedule($id);
 
    echo json_encode( $result);
  }

  
}