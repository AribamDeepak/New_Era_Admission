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

    function addResgistrationFrom($student_name,$aadhaar_number,$dob,$gender,$blood_group,$religion,$caste,$identification_mark,$x_pass_board,$x_pass_school,$roll_no,$percentage,$permanent_address,$permanent_district,$permanent_pin,$present_address,$present_district,$present_pin,$father_name,$mother_name,$whatapps_no,$guardian_name,$transportation,$route,$subject_combination,$uploadFiles_photo,$uploadFiles_marksheet,$uploadFiles_admitcard)
    {       
    	$imageUrl_photo = base_url()."assets/ExtraEdge/Photo/".$uploadFiles_photo['file_name'];	
    	$imageUrl_marksheet = base_url()."assets/ExtraEdge/marksheet/".$uploadFiles_marksheet['file_name'];	
    	$imageUrl_admitcard = base_url()."assets/ExtraEdge/admitcard/".$uploadFiles_admitcard['file_name'];	
    	if($transportation != 'Bus'){
    		$route = NULL;
    	}

    	$DOBDateTime = new DateTime($dob);
      $DOBYear = $DOBDateTime->format('Y-m-d');
    	$uniqueId = $this->generateKey();
     	$data = array(
     	  'application_id'=>$uniqueId,
          'student_name'=>$student_name,
          'aadhaar_number'=>$aadhaar_number,
          'dob'=>$DOBYear,
          'gender'=>$gender,
          'blood_group'=>$blood_group,
          'religion'=>$religion,
          'caste'=>$caste,
          'identification_mark'=>$identification_mark,
          'passed_board'=>$x_pass_board,
          'school_name' =>$x_pass_school,
          'roll_no' =>$roll_no,
          'percentage' =>$percentage,
          'permanent_address' =>$permanent_address,
          'permanent_district' =>$permanent_district,
          'permanent_address_pin' =>$permanent_pin,
          'present_address' =>$present_address,
          'present_district' =>$present_district,
          'persent_address_pin' =>$present_pin,
          'father_name' =>$father_name,
          'mother_name' =>$mother_name,
          'watsapp_no' =>$whatapps_no,
          'guardian_name' =>$guardian_name,
          'transportation' =>$transportation,
          'transport_bus_route' =>$route,
          'subject_combination' =>$subject_combination,
          'photo_profile' =>$imageUrl_photo,
          'admitcard_photo' =>$imageUrl_marksheet,
          'marksheet_photo' =>$imageUrl_admitcard,
          'added_on' =>mdate('%Y-%m-%d %H:%i:%s', now()),
          'isActive'=>0
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
    