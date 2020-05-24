<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admission extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('aa_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
       
        $this->load->model('m_admission');
    }

  //get enquiries
  public function index()
  {
    $data['title']  = 'Manage admission - Arjunaacademy';
    $data['result'] = $this->m_admission->get_admission();
    $this->load->view('admission/manage-admission', $data, FALSE);
  }

  public function add_admission_amount(Type $var = null)
  {
    $data['title']  = 'Add amount - Arjunaacademy';
    $this->load->view('admission/add-admission-amount', $data);
  }
 

 

  public function add_amount(Type $var = null)
  {
      $ssc_amount=$this->input->post('ssc_amount');
      $puc_amount=$this->input->post('puc_amount');
      $insert = array(
          'ssc_amount'=>$ssc_amount,
          'puc_amount'=>$puc_amount,
          'uniq'=>random_string('alnum',10),
      );
      $result = $this->m_admission->insert_amount($insert);
      echo json_encode($result);
  }
  public function update_amount(Type $var = null)
  {
        $id=$this->input->post('id');
      $ssc_amount=$this->input->post('ssc_amount');
      $puc_amount=$this->input->post('puc_amount');
      $insert = array(
          'ssc_amount'=>$ssc_amount,
          'puc_amount'=>$puc_amount,
      );
      $result = $this->m_admission->update_amount($insert,$id);
      echo json_encode($result);
  }

  public function display_amount(Type $var = null)
  {
    $output='';
    $amount = $this->m_admission->get_amount();

    if (!empty($amount)) { $count = 0; foreach ($amount as $key => $value) { 
        $count = $count+1;
        $output .='<tr>
                        <td>'. $count.'</td>
                        <td>'. $value->ssc_amount .'</td>
                        <td>'. $value->puc_amount .'</td>
                        <td class="action-btn  center-align">
                        
                     
                            <a href="'. base_url('admission/edit-amount/'.$value->id.'') .'"
                                class="blue hoverable delete-btn modal-trigger"><i class="fas fa-edit  "></i></a>
                            <a    href="'.base_url('admission/delete/'.$value->id.'') .' " class="red hoverable delete-btn delete" id="delete"   ><i class="fas fa-trash " ></i></a>
                        </td>
                    </tr>';
            }
        }
   
   
        echo json_encode($output);
  }

  public function edit_amount($id)
  {
      $data['result'] = $this->m_admission->getAmountId($id);
      $data['title']  = 'Edit Amount - Arjunaacademy';
      $this->load->view('admission/edit-admission-amount', $data);
  }
  public function view($id)
  {
      $data['result'] = $this->m_admission->getAdmissionId($id);

      $data['title']  = 'View Admission - Arjunaacademy';
      $this->load->view('admission/view-admission', $data);
  }
  public function delete($id)
  {
      $result = $this->m_admission->delete_amount($id);
     echo json_encode($result);
  }
  public function delete_admission($id)
  {
      $result = $this->m_admission->delete_admission($id);
     echo json_encode($result);
  }
}