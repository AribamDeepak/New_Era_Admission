<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admission_model extends CI_Model{
	function __construct()
    {
        parent::__construct();
        $this->load->helper('date');
    } 
// COMMON CODE Start HERE

	function GetAllActiveRecord($tabName)  
	{   
	    $query = $this->db->order_by('id', 'DESC')->get_where($tabName, array('isActive' => 1)); 
	    return $query->result_array();  
	} 
	function GetAllRecord($tabName)  
	{   
	    $query = $this->db->order_by('id', 'DESC')->get($tabName); 
	    return $query->result_array();  
	} 

	function GetAllActiveRecordLimit($limit, $tabName)  
	{   
	    $query = $this->db->limit($limit)->get_where($tabName, array('isActive' => 1)); 
	    return $query->result_array();  
	} 
	function GetRecordById($id,$tabName)  
      {  
         $query = $this->db->get_where($tabName, array('id' => $id,'isActive' => 1)); 
         return $query->result_array();  
      }
    function GetAllRecordById($id,$tabName)  
      {  
         $query = $this->db->get_where($tabName, array('id' => $id)); 
         return $query->result_array();  
      }  

    function GetSingleRecordById($id,$tabName)  
      {  
         $query = $this->db->get_where($tabName, array('id' => $id,'isActive' => 1)); 
         return $query->row_array();  
      }   
    function SearchDataExist($fieldname,$value,$tabName)  
    {  
        $query = $this->db->get_where($tabName, array($fieldname => $value, 'isActive' => 1)); 
        $result = $query->row_array();         
         
        if (!empty($result)) {
		    $result = TRUE;
		} else {
		    $result = FALSE;
		}
		return $result;	
    }  

    function generateKey() 
    {
        for($i = 1; $i < 10; $i++)
        {
            $key = strtoupper(substr(sha1(microtime() . $i), rand(0, 5), 5));
            
        }
        return $key;
    } 

    function addResgistrationFrom($student_name,$dob,$gender,$religion,$caste,$father_name,$father_occuption,$mother_name,$mother_occuption,$permanent_address,$permanent_address_po,$permanent_address_ps,$permanent_pin,$whatapps_no,$aadhaar_number,$identification_mark,$pwd,$blood_group,$x_pass_board,$x_pass_school,$roll_no,$x_passed_year,$x_division,$percentage,$x_subject_offer,$x_eligible_cert_no,$subject_combination,$uploadFiles_photo,$uploadFiles_marksheet,$uploadFiles_admitcard,$ambition,$career_option)
    {       
    	$imageUrl_photo = base_url()."assets/NewEraSchool/Photo/".$uploadFiles_photo['file_name'];	
    	$imageUrl_marksheet = base_url()."assets/NewEraSchool/marksheet/".$uploadFiles_marksheet['file_name'];	
    	$imageUrl_admitcard = base_url()."assets/NewEraSchool/admitcard/".$uploadFiles_admitcard['file_name'];	

    	$DOBDateTime = new DateTime($dob);
      $DOBYear = $DOBDateTime->format('Y-m-d');
    	$uniqueId = $this->generateKey();
     	$data = array(
     	  'application_id'=>$uniqueId,
          'student_name'=>$student_name,
          'dob'=>$DOBYear,
          'gender'=>$gender,
          
          'religion'=>$religion,
          'caste'=>$caste,
          'father_name' =>$father_name,
          'father_occupation' =>$father_occuption,
          'mother_name' =>$mother_name,
          'mother_occupation' =>$mother_occuption,
          'permanent_address' =>$permanent_address,
          'permanent_address_po' =>$permanent_address_po,
          'permanent_address_ps' =>$permanent_address_ps,
          'permanent_address_pin' =>$permanent_pin,
          'watsapp_no' =>$whatapps_no,
          'aadhaar_number'=>$aadhaar_number,
          'identification_mark'=>$identification_mark,
          'pwd'=>$pwd,
          'blood_group'=>$blood_group,
          'passed_board'=>$x_pass_board,
          'school_name' =>$x_pass_school,
          'roll_no' =>$roll_no,
          'x_passed_year' =>$x_passed_year,
          'x_division' =>$x_division,
          'percentage' =>$percentage,
          'x_subject_offer' =>$x_subject_offer,
          'x_eligible_cert_no' =>$x_eligible_cert_no,
          'subject_combination' =>$subject_combination,
          'photo_profile' =>$imageUrl_photo,
          'admitcard_photo' =>$imageUrl_marksheet,
          'marksheet_photo' =>$imageUrl_admitcard,
          'ambition' =>$ambition,
          'career_option' =>$career_option,
          'added_on' =>mdate('%Y-%m-%d %H:%i:%s', now()),
          'payment_status_id' => 1,
          'isActive'=>1
      );
      $fileNameArray = array();

            $this->db->trans_begin();

                $this->db->insert('registration',$data);
                $lastInsertID = $this->db->insert_id();
                  // var_dump($lastInsertID); die;
                if($this->db->trans_status() === FALSE)
                {
                    $this->db->trans_rollback();
                    $msg = "Fail to save !";
                    $code = false;
                }
                else
                {
                    $this->db->trans_commit();
                    $msg = "Save sucessfull!";
                    $code = true;
                    $this->session->set_userdata ( 'registration_id', $lastInsertID );
                    $this->session->set_userdata ( 'application_id', $uniqueId );
                    $this->session->set_userdata ( 'student_name', $student_name );
                    $this->session->set_userdata ( 'dob', $dob );
                    $this->session->set_userdata ( 'permanent_address', $permanent_address );
                }

        return array('code' => $code, 'message' =>  $msg, 'lastInsertID' =>  $lastInsertID);
    }

    function checkIdExist($id,$tabName)  
      {  
         $query = $this->db->get_where($tabName, array('registration_id' => $id)); 
         return $query->num_rows();  
      } 
    function addBillDetails($link_id,$payment_id,$status,$currency,$amount,$mac)
    {      

        $data = array(
        'link_id' => $link_id,
        'payment_id' => $payment_id,
        'status' => $status,
        'currency' => $currency,
        'amount' => $amount,
        'mac' => $mac,
        'datetime' => mdate('%Y-%m-%d %H:%i:%s', now()),
      );

      $this->db->trans_begin();
      $this->db->insert('payment_details',$data);
      // $PayDetailsID = $this->db->insert_id();
      
      if($this->db->trans_status() === FALSE)
      {
          $this->db->trans_rollback();
          $msg = "Fail to save !";
          $code = false;
          // $this->session->set_userdata('PayDetailsID', $PayDetailsID );
      }
      else
      {
          $this->db->trans_commit();
          $msg = "Save sucessfull!";
          $code = true;
      }
        return array('code' => $code, 'message' =>  $msg);
      // }
    }

    function SuccessPaymentRegistration($applicationId)
    {      
      $data = array(
        'payment_status_id' => 1,
        'isActive' => 1
      );

      $this->db->trans_begin();
      $this->db->where('application_id', $applicationId);
      $this->db->update('registration',$data);
      
      if($this->db->trans_status() === FALSE)
      {
          $this->db->trans_rollback();
          $msg = "Fail to save !";
          $code = false;
      }
      else
      {
          $this->db->trans_commit();
          $msg = "Save sucessfull!";
          $code = true;
      }
        return array('code' => $code, 'message' =>  $msg);
    }

    
	
}
    