<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_controller extends CI_Controller {

	function __construct()
    {
    	parent::__construct();
    	$this->load->model('Data_model', 'database');
    	$this->load->model('Mail_model', 'mailer');
    	$this->load->library ( 'form_validation' );
    	$this->load->helper ( 'security' );
    }
	
	public function index()
	{  	
		$this->load->view('admin/login');
	}

	public function LoadDashboardData()
	{ 	
		try {
			$Countdata=$this->database->LoadDashboardData();  
			$GraphData=''; 
			$output = array(
	        'countData'=>$Countdata,
	        'GraphData'=>$GraphData,
	        'success' =>true
	    	);
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function userAdminReset() 
		{    
		  $_POST = json_decode(trim(file_get_contents('php://input')), true);	
		  $errorMSG ='';
		try {
			$userMail = $this->session->userdata('email');
			if (empty($_POST["OldPassword"])) {
			    $errorMSG = "Old Password is required";
			}
			elseif (empty($_POST["NewPassword"])) {
			    $errorMSG = "New Password is required";
			}
			elseif (empty($_POST["NewConfirmPassword"])) {
			    $errorMSG = "Confirm Password is required";
			}
			elseif ($_POST["NewPassword"] != $_POST["NewConfirmPassword"] ) {
			    $errorMSG = "Confirm Password does not match with New Password!";
			} 
			$OldPassword =  $this->security->xss_clean($_POST['OldPassword']);
			$NewPassword =  $this->security->xss_clean($_POST['NewPassword']);

			$status = array("success"=>false,"msg"=>$errorMSG);
			if(empty($errorMSG)){	
				$result_check = $this->database->checkAdminUserMatch($OldPassword,$userMail);	
				if($result_check['code'] == 1){
				  	$result = $this->database->resetAdminUserPw($userMail,$NewPassword); 
						if($result['code'] == 1){
							// $result_mail = $this->mailer->adminSendResetPwd($userMail,$_POST['NewPassword']);
						  	$status = array("success" => true,"msg" => "Password changed sucessfull!"); 
						}else{
						  $status = array("success" => false,"msg" => "Fail to change Password !!!"); 
						} 
				}else{
				  $status = array("success" => false,"msg" => "Incorrect Password entered !!!"); 
				}
		  		
			}
	        } catch (Exception $ex) {
	            $status = array("success" => false,"msg" => $ex->getMessage());
	        }
	
		  echo json_encode($status) ; 
	}

	public function loadEmployeeUser()
	{ 	
		try {
			$data['result']=$this->database->GetAllActiveEmpUserRecord();  
			$output = array(
	        'html'=>$this->load->view('admin/fragment/frag_employee',$data, true),
	        'success' =>true
	    	);
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function loadEmpUserNewForm()
	{ 	
		try {
			$output = array('html'=>$this->load->view('admin/fragment/emp_user_newForm','', true),'success' =>true);
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function addEmpUser() 
	{    
	  $_POST = json_decode(trim(file_get_contents('php://input')), true);	
	  $errorMSG ='';
	try {  
		
		if (empty($_POST["AdminUserName"])) {
			    $errorMSG = "User Name is required";
		}
		elseif (empty($_POST["AdminUserEmail"])) {
		    $errorMSG = "Email is required";
		}
		elseif (empty($_POST["password"])) {
		    $errorMSG = "Password is required";
		}
 
		$AdminUserEmail = $this->security->xss_clean($_POST['AdminUserEmail']);
		$AdminUserName = $this->security->xss_clean($_POST['AdminUserName']);
		$password = $this->security->xss_clean($_POST['password']);
		$team = $this->security->xss_clean($_POST['team']);
		$wave = $this->security->xss_clean($_POST['wave']);

		$status = array("success"=>false,"msg"=>$errorMSG);
		if(empty($errorMSG)){
			$MailResult = $this->database->checkMailExist($AdminUserEmail);
			if($MailResult['code'] == 0){
				$status = array("success" => false,"msg" => "Sorry, Email ID already Exist !!!");
			}else{
				// $result = $this->mailer->adminSendPwdMail($AdminUserName,$AdminUserEmail,$password);
				// if($result['code'] == 1){
				if(1){
					$dataResult = $this->database->addAdminUser($AdminUserName,$AdminUserEmail,$team,$password,$wave);
					if($dataResult['code'] == 1){
						$status = array("success" => true,"msg" => "Added successfully"); 
					}else{
			  			$status = array("success" => false,"msg" => "Server error. Please try again later !!!"); 
					}
				}else{
				  $status = array("success" => false,"msg" => "Error in sending Email. Please try again later !!!"); 
				}

			}	
		}
        } catch (Exception $ex) {
            $status = array("success" => false,"msg" => $ex->getMessage());
        }

	  echo json_encode($status) ; 
	 }

	public function editEmpUser()
	{ 	
		try {
			$Id = $this->security->xss_clean($_POST['reqId']);
			if($Id == ''){
				$output = array(
			        'msg'=> 'Resquest Error !!!',
			        'success' =>false
	    		);
			}else{
				$arrToView['result'] = $this->database->GetRecordById($Id,'user_admin'); 
				$output = array(
		        'html'=>$this->load->view('admin/fragment/emp_user_updateForm',$arrToView, true),
		        'success' =>true
		    	);
			}
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function updateEmpUser() 
		{    
		  $_POST = json_decode(trim(file_get_contents('php://input')), true);	
		  $errorMSG ='';
		try {
			if (empty($_POST["AdminUser_id"])) {
			    $errorMSG = "Error on Request data!!!";
			}
			elseif (empty($_POST["AdminUserName"])) {
			    $errorMSG = "User Name is required";
			}
			elseif (empty($_POST["AdminUserEmail"])) {
			    $errorMSG = "Email is required";
			}

			$AdminUser_id = $this->security->xss_clean($_POST['AdminUser_id']);
			$AdminUserEmail = $this->security->xss_clean($_POST['AdminUserEmail']);
			$AdminUserName = $this->security->xss_clean($_POST['AdminUserName']);
			$password = $this->security->xss_clean($_POST['password']);
			$team = $this->security->xss_clean($_POST['team']);
			$status = array("success"=>false,"msg"=>$errorMSG);
			if(empty($errorMSG)){	
		  		$result = $this->database->updateEmpUser($AdminUser_id,$AdminUserEmail,$AdminUserName,$password,$team);
				if($result['code'] == 1){
				  $status = array("success" => true,"msg" => "Update sucessfull!"); 
				}else{
				  $status = array("success" => false,"msg" => "Fail to Update !!!"); 
				}
			}
	        } catch (Exception $ex) {
	            $status = array("success" => false,"msg" => $ex->getMessage());
	        }
	
		  echo json_encode($status) ; 
	}

	public function RemoveAdminUser()
	{ 		
		try {
			$IdsArray = json_decode($_POST['dataArr'], TRUE);

				$this->database->RemoveRecordById($IdsArray,'user_admin'); 
				$output = array('success' =>true, 'msg'=> "Deleted sucessfully !!");

		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function loadClientUser()
	{ 	
		try {
			$data['result']=$this->database->GetAllActiveRecordByfieldValue('user_admin','Role','client');  
			$output = array(
	        'html'=>$this->load->view('admin/fragment/frag_client',$data, true),
	        'success' =>true
	    	);
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function loadClientUserNewForm()
	{ 	
		try {
			$data['result'] = '';
			$output = array('html'=>$this->load->view('admin/fragment/client_user_newForm',$data, true),'success' =>true);
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function addClientUser() 
	{    
	  $_POST = json_decode(trim(file_get_contents('php://input')), true);	
	  $errorMSG ='';
	try {  
		
		if (empty($_POST["ClientUserName"])) {
			    $errorMSG = "User Name is required";
		}
		elseif (empty($_POST["ClientUserEmail"])) {
		    $errorMSG = "Email is required";
		}
		elseif (empty($_POST["clientPassword"])) {
		    $errorMSG = "Password is required";
		}
 
		$AdminUserEmail = $this->security->xss_clean($_POST['ClientUserEmail']);
		$AdminUserName = $this->security->xss_clean($_POST['ClientUserName']);
		$password = $this->security->xss_clean($_POST['clientPassword']);

		$status = array("success"=>false,"msg"=>$errorMSG);
		if(empty($errorMSG)){
			$MailResult = $this->database->checkMailExist($AdminUserEmail);
			if($MailResult['code'] == 0){
				$status = array("success" => false,"msg" => "Sorry, Email ID already Exist !!!");
			}else{
				$result = $this->mailer->adminSendPwdMail($AdminUserName,$AdminUserEmail,$password);
				if($result['code'] == 1){
				// if(1){
					$dataResult = $this->database->addClientUser($AdminUserName,$AdminUserEmail,$password);
					if($dataResult['code'] == 1){
						$status = array("success" => true,"msg" => "Added successfully"); 
					}else{
			  			$status = array("success" => false,"msg" => "Server error. Please try again later !!!"); 
					}
				}else{
				  $status = array("success" => false,"msg" => "Error in sending Email. Please try again later !!!"); 
				}

			}	
		}
        } catch (Exception $ex) {
            $status = array("success" => false,"msg" => $ex->getMessage());
        }

	  echo json_encode($status) ; 
	 }

	public function editClientUser()
	{ 	
		try {
			$Id = $this->security->xss_clean($_POST['reqId']);
			if($Id == ''){
				$output = array(
			        'msg'=> 'Resquest Error !!!',
			        'success' =>false
	    		);
			}else{
				$arrToView['result'] = $this->database->GetRecordById($Id,'user_admin'); 
				$output = array(
		        'html'=>$this->load->view('admin/fragment/client_user_updateForm',$arrToView, true),
		        'success' =>true
		    	);
			}
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function updateClientUser() 
		{    
		  $_POST = json_decode(trim(file_get_contents('php://input')), true);	
		  $errorMSG ='';
		try {
			if (empty($_POST["ClientUser_id"])) {
			    $errorMSG = "Error on Request data!!!";
			}
			elseif (empty($_POST["clientName"])) {
			    $errorMSG = "User Name is required";
			}
			elseif (empty($_POST["clientEmail"])) {
			    $errorMSG = "Email is required";
			}

			$ClientUser_id = $this->security->xss_clean($_POST['ClientUser_id']);
			$clientEmail = $this->security->xss_clean($_POST['clientEmail']);
			$clientName = $this->security->xss_clean($_POST['clientName']);
			$clientPassword = $this->security->xss_clean($_POST['clientPassword']);
			$status = array("success"=>false,"msg"=>$errorMSG);
			if(empty($errorMSG)){	
		  		$result = $this->database->updateClientUser($ClientUser_id,$clientEmail,$clientName,$clientPassword);
				if($result['code'] == 1){
				  $status = array("success" => true,"msg" => "Update sucessfull!"); 
				}else{
				  $status = array("success" => false,"msg" => "Fail to Update !!!"); 
				}
			}
	        } catch (Exception $ex) {
	            $status = array("success" => false,"msg" => $ex->getMessage());
	        }
	
		  echo json_encode($status) ; 
	}

	public function loadJob()
	{ 	
		try {
			$data['result']=$this->database->GetAllActiveRecord('job'); 
			$output = array(
	        'html'=>$this->load->view('admin/fragment/job_fragment',$data, true),
	        'success' =>true
	    	);
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function loadJobNewForm()
	{ 	
		try {
			$data['result'] = $this->database->GetAllActiveEmpUser(); 
			$output = array('html'=>$this->load->view('admin/fragment/job_newForm',$data, true),'success' =>true);
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function addJob() 
	{    
	  $_POST = json_decode(trim(file_get_contents('php://input')), true);	
	  $errorMSG ='';
	try {  
		
		if (empty($_POST["job_id"])) {
			    $errorMSG = "Job ID is required";
		}
		elseif (empty($_POST["job_name"])) {
		    $errorMSG = "Job Name is required";
		}
		elseif (empty($_POST["client_name"])) {
		    $errorMSG = "Client Name is required";
		}
		elseif (empty($_POST["startDate"])) {
		    $errorMSG = "Start Date is required";
		}
		elseif (empty($_POST["dp_contact1"])) {
		    $errorMSG = "DP contact 1 is required";
		}
 
		$job_id = $this->security->xss_clean($_POST['job_id']);
		$job_name = $this->security->xss_clean($_POST['job_name']);
		$client_name = $this->security->xss_clean($_POST['client_name']);
		$wave = $this->security->xss_clean($_POST['wave']);
		$startDate = $this->security->xss_clean($_POST['startDate']);
		$pm = $this->security->xss_clean($_POST['pm']);
		$deliverable = $this->security->xss_clean($_POST['deliverable']);
		$dp_contact1 = $this->security->xss_clean($_POST['dp_contact1']);
		$dp_contact2 = $this->security->xss_clean($_POST['dp_contact2']);
		$dp_contact3 = $this->security->xss_clean($_POST['dp_contact3']);
		$dp_contact4 = $this->security->xss_clean($_POST['dp_contact4']);
		$comment = $this->security->xss_clean($_POST['comment']);

		$status = array("success"=>false,"msg"=>$errorMSG);
			if(empty($errorMSG)){
					if(1){
						$dataResult = $this->database->addJob($job_id,$job_name,$client_name,$wave,$startDate,$pm,$deliverable,$dp_contact1,$dp_contact2,$dp_contact3,$dp_contact4,$comment);
						if($dataResult['code'] == 1){
							$status = array("success" => true,"msg" => "Added successfully"); 
						}else{
				  			$status = array("success" => false,"msg" => "Server error. Please try again later !!!"); 
						}
					}else{
					  $status = array("success" => false,"msg" => "Error in sending Email. Please try again later !!!"); 
					}
			}
        } catch (Exception $ex) {
            $status = array("success" => false,"msg" => $ex->getMessage());
        }

	  echo json_encode($status) ; 
	 }


	public function RemoveJob()
	{ 		
		try {
			$IdsArray = json_decode($_POST['dataArr'], TRUE);

				$this->database->RemoveRecordById($IdsArray,'job'); 
				$output = array('success' =>true, 'msg'=> "Deleted sucessfully !!");

		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function editJob()
	{ 	
		try {
			$Id = $this->security->xss_clean($_POST['reqId']);
			if($Id == ''){
				$output = array(
			        'msg'=> 'Resquest Error !!!',
			        'success' =>false
	    		);
			}else{
				$data['result'] = $this->database->GetRecordById($Id,'job'); 
				$data['result_emp'] = $this->database->GetAllActiveEmpUser(); 	
				$output = array(
		        'html'=>$this->load->view('admin/fragment/job_updateForm',$data, true),
		        'success' =>true
		    	);
			}
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function updateJob() 
		{    
		  $_POST = json_decode(trim(file_get_contents('php://input')), true);	
		  $errorMSG ='';
		try {		
		if (empty($_POST["job_id_prim"])) {
		    $errorMSG = "Error on Request data!!!";
		}
		elseif (empty($_POST["job_id"])) {
		    $errorMSG = "Job ID is required";
		}
		elseif (empty($_POST["job_name"])) {
		    $errorMSG = "Job Name is required";
		}
		elseif (empty($_POST["client_name"])) {
		    $errorMSG = "Client Name is required";
		}
		elseif (empty($_POST["startDate"])) {
		    $errorMSG = "Start Date is required";
		}
		elseif (empty($_POST["dp_contact1"])) {
		    $errorMSG = "DP contact 1 is required";
		}
 		
 		$job_id_prim = $this->security->xss_clean($_POST['job_id_prim']);
		$job_id = $this->security->xss_clean($_POST['job_id']);
		$job_name = $this->security->xss_clean($_POST['job_name']);
		$client_name = $this->security->xss_clean($_POST['client_name']);
		$wave = $this->security->xss_clean($_POST['wave']);
		$startDate = $this->security->xss_clean($_POST['startDate']);
		$pm = $this->security->xss_clean($_POST['pm']);
		$deliverable = $this->security->xss_clean($_POST['deliverable']);
		$dp_contact1 = $this->security->xss_clean($_POST['dp_contact1']);
		$dp_contact2 = $this->security->xss_clean($_POST['dp_contact2']);
		$dp_contact3 = $this->security->xss_clean($_POST['dp_contact3']);
		$dp_contact4 = $this->security->xss_clean($_POST['dp_contact4']);
		$comment = $this->security->xss_clean($_POST['comment']);	

			
			$status = array("success"=>false,"msg"=>$errorMSG);
			if(empty($errorMSG)){	
		  		$result = $this->database->updateJob($job_id_prim,$job_id,$job_name,$client_name,$wave,$startDate,$pm,$deliverable,$dp_contact1,$dp_contact2,$dp_contact3,$dp_contact4,$comment);
				if($result['code'] == 1){
				  $status = array("success" => true,"msg" => "Update sucessfull!"); 
				}else{
				  $status = array("success" => false,"msg" => "Fail to Update !!!"); 
				}
			}
	        } catch (Exception $ex) {
	            $status = array("success" => false,"msg" => $ex->getMessage());
	        }
	
		  echo json_encode($status) ; 
	}

	public function loadEmployeeJob()
	{ 	
		try {
			$EId = $this->security->xss_clean($_POST['reqId']);
			if($EId == ''){
				$output = array(
			        'msg'=> 'Resquest Error !!!',
			        'success' =>false
	    		);
			}else{	
				$data['result'] = $this->database->loadEmployeeJob($EId); 
				$output = array(
		        'html'=>$this->load->view('reperio/emp_job_tbl',$data, true),
		        'success' =>true
		    	);
			}
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function loadTestNewForm()
	{ 	
		try {
			// $data['result'] = $this->database->GetAllActiveEmpUser(); 
			$output = array('html'=>$this->load->view('admin/fragment/testimonial_newForm','', true),'success' =>true);
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function addTestimonial() 
	{    
	  $_POST = json_decode(trim(file_get_contents('php://input')), true);	
	  $errorMSG ='';
	try {  
			
		if (empty($_POST["name"])) {
			    $errorMSG = "Name is required";
		}
		elseif (empty($_POST["star"])) {
		    $errorMSG = "Star is required";
		}
		/*
		elseif (empty($_POST["tesDate"])) {
		    $errorMSG = "Date is required";
		}
		*/
		elseif (empty($_POST["comment"])) {
		    $errorMSG = "Comment is required";
		}
		// elseif (empty($_POST["fileUpload"])) {
		//     $errorMSG = "Image Link is required";
		// }
		// photo file upload to folder start here
		if($_POST['fileUpload']!="")
            {
                $fileName = $this->security->sanitize_filename ( $_POST ['fileUploadName'] );
				$file = $this->db->escape_str ( trim ( $_POST ['fileUpload'] ) );
				$file = urldecode ( $file );
                $file=str_replace('data:image/jpeg;base64,', '', $file);
                $file=str_replace('data:image/jpg;base64,', '', $file);
                $file=str_replace('data:image/png;base64,', '', $file);
                $file=str_replace(' ', '+', $file);
                $file=base64_decode($file);
                $fileName=time().'_'.$fileName;
                
                $ouputDir="assets/upload/testimonailPicture/";
                if (!is_dir($ouputDir)) {
                        mkdir($ouputDir, 0777, TRUE);
                    }
                file_put_contents($ouputDir.$fileName, $file);
            }
            else
            {
                $fileName="";
            }
        // End of photo file upload to folder start here  
			$name = $this->security->xss_clean($_POST['name']);
			$star = $this->security->xss_clean($_POST['star']);
			$Date = $this->security->xss_clean($_POST['tesDate']);
			$comment = $this->security->xss_clean($_POST['comment']);

		$status = array("success"=>false,"msg"=>$errorMSG);
		if(empty($errorMSG)){	
	  		$result = $this->database->addTestimonial($name,$star,$Date,$comment,$fileName);
			if($result['code'] == 1){
			  $status = array("success" => true,"msg" => "Save sucessfull!"); 
			}else{
			  $status = array("success" => false,"msg" => "Fail to save !!!"); 
			}
		}
        } catch (Exception $ex) {
            $status = array("success" => false,"msg" => $ex->getMessage());
        }

	  echo json_encode($status) ; 
	 }

	public function loadTestimonial()
	{ 	
		try {
			$data['result']=$this->database->GetAllActiveRecord('testimonial');  
			$output = array(
	        'html'=>$this->load->view('admin/fragment/testimonial_fragment',$data, true),
	        'success' =>true
	    	);
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function deleteTestimonial()
	{ 		
		try {
			$IdsArray = json_decode($_POST['dataArr'], TRUE);

				$this->database->RemoveRecordById($IdsArray,'testimonial'); 
				$output = array('success' =>true, 'msg'=> "Deleted sucessfully !!");

		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function RemoveTestimonialImage()
	{ 		
		try {
				$Id = json_decode($_POST['dataId'], TRUE);	
				$this->database->RemoveTestimonialImage($Id,'testimonial'); 
				$output = array('success' =>true, 'msg'=> "Removed sucessfully !!");

		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function editTestimonial()
	{ 	
		try {
			$Id = $this->security->xss_clean($_POST['reqId']);
			if($Id == ''){
				$output = array(
			        'msg'=> 'Resquest Error !!!',
			        'success' =>false
	    		);
			}else{
				$data['result'] = $this->database->GetRecordById($Id,'testimonial'); 	
				$output = array(
		        'html'=>$this->load->view('admin/fragment/testimonial_updateForm',$data, true),
		        'success' =>true
		    	);
			}
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function updateTestimonial() 
	{    
		$_POST = json_decode(trim(file_get_contents('php://input')), true);	
	    $errorMSG ='';
	try {  

		if (empty($_POST["testi_id"])) {
			    $errorMSG = "Please try again later !!!";
		}	
		elseif (empty($_POST["name"])) {
			    $errorMSG = "Name is required";
		}
		elseif (empty($_POST["star"])) {
		    $errorMSG = "Star is required";
		}/*
		elseif (empty($_POST["tesDate"])) {
		    $errorMSG = "Date is required";
		} */ 
		elseif (empty($_POST["comment"])) {
		    $errorMSG = "Comment is required";
		}
		// elseif (empty($_POST["fileUpload"])) {
		//     $errorMSG = "Image Link is required";
		// }
		// photo file upload to folder start here
		if($_POST['fileUpload']!="")
            {
                $fileName = $this->security->sanitize_filename ( $_POST ['fileUploadName'] );
				$file = $this->db->escape_str ( trim ( $_POST ['fileUpload'] ) );
				$file = urldecode ( $file );
                $file=str_replace('data:image/jpeg;base64,', '', $file);
                $file=str_replace('data:image/jpg;base64,', '', $file);
                $file=str_replace('data:image/png;base64,', '', $file);
                $file=str_replace(' ', '+', $file);
                $file=base64_decode($file);
                $fileName=time().'_'.$fileName;
                
                $ouputDir="assets/upload/testimonailPicture/";
                if (!is_dir($ouputDir)) {
                        mkdir($ouputDir, 0777, TRUE);
                    }
                file_put_contents($ouputDir.$fileName, $file);
            }
            else
            {
                $fileName="";
            }
        // End of photo file upload to folder start here  
            $testi_id = $this->security->xss_clean($_POST['testi_id']);
			$name = $this->security->xss_clean($_POST['name']);
			$star = $this->security->xss_clean($_POST['star']);
			$Date = $this->security->xss_clean($_POST['tesDate']);
			$comment = $this->security->xss_clean($_POST['comment']);

		$status = array("success"=>false,"msg"=>$errorMSG);
		if(empty($errorMSG)){	
	  		$result = $this->database->updateTestimonial($testi_id,$name,$star,$Date,$comment,$fileName);
			if($result['code'] == 1){
			  $status = array("success" => true,"msg" => "Save sucessfull!"); 
			}else{
			  $status = array("success" => false,"msg" => "Fail to save !!!"); 
			}
		}
        } catch (Exception $ex) {
            $status = array("success" => false,"msg" => $ex->getMessage());
        }

	  echo json_encode($status) ; 
	}

	public function loadAboutUsNewForm()
	{ 	
		try {
			// $data['result'] = $this->database->GetAllActiveEmpUser(); 
			$output = array('html'=>$this->load->view('admin/fragment/testimonial_newForm','', true),'success' =>true);
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function editAboutUs()
	{ 		
		try {
			$data['result'] = $this->database->GetRecordById('1','about_us'); 	
			$output = array(
	        'html'=>$this->load->view('admin/fragment/aboutUs_updateForm',$data, true),
	        'success' =>true
	    	);

		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function updateAboutUs() 
	{    
		$_POST = json_decode(trim(file_get_contents('php://input')), true);	
	    $errorMSG ='';
	try {  

		if (empty($_POST["about"])) {
			    $errorMSG = "About Us Description is required";
		}
		elseif (empty($_POST["mission"])) {
		    $errorMSG = "Our Mission Description is required";
		}
		// photo file upload to folder start here
		if($_POST['fileUpload']!="")
            {
                $fileName = $this->security->sanitize_filename ( $_POST ['fileUploadName'] );
				$file = $this->db->escape_str ( trim ( $_POST ['fileUpload'] ) );
				$file = urldecode ( $file );
                $file=str_replace('data:image/jpeg;base64,', '', $file);
                $file=str_replace('data:image/jpg;base64,', '', $file);
                $file=str_replace('data:image/png;base64,', '', $file);
                $file=str_replace(' ', '+', $file);
                $file=base64_decode($file);
                $fileName=time().'_'.$fileName;
                
                $ouputDir="assets/upload/aboutUs/";
                if (!is_dir($ouputDir)) {
                        mkdir($ouputDir, 0777, TRUE);
                    }
                file_put_contents($ouputDir.$fileName, $file);
            }
            else
            {
                $fileName="";
            }
        // End of photo file upload to folder start here  
			$about = $this->security->xss_clean($_POST['about']);
			$about2 = $this->security->xss_clean($_POST['about2']);
			$mission = $this->security->xss_clean($_POST['mission']);

		$status = array("success"=>false,"msg"=>$errorMSG);
		if(empty($errorMSG)){	
	  		$result = $this->database->updateAboutUs($about,$about2,$mission,$fileName);
			if($result['code'] == 1){
			  $status = array("success" => true,"msg" => "Save sucessfull!"); 
			}else{
			  $status = array("success" => false,"msg" => "Fail to save !!!"); 
			}
		}
        } catch (Exception $ex) {
            $status = array("success" => false,"msg" => $ex->getMessage());
        }

	  echo json_encode($status) ; 
	}

	public function loadGallery()
	{ 	
		try {
			$data['result']=$this->database->GetAllActiveRecord('gallery');  
			$output = array(
	        'html'=>$this->load->view('admin/fragment/gallery_fragment',$data, true),
	        'success' =>true
	    	);
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function deleteGallery()
	{ 		
		try {
			$IdsArray = json_decode($_POST['dataArr'], TRUE);
				$this->database->RemoveRecordById($IdsArray,'gallery'); 
				$output = array('success' =>true, 'msg'=> "Deleted sucessfully !!");
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function loadGalleryNewForm()
	{ 	
		try {
			// $data['result'] = $this->database->GetAllActiveEmpUser(); 
			$output = array('html'=>$this->load->view('admin/fragment/gallery_newForm','', true),'success' =>true);
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function addGallery() 
	{    
	  $_POST = json_decode(trim(file_get_contents('php://input')), true);	
	  $errorMSG ='';
	try {  
			
		if (empty($_POST["title"])) {
			    $errorMSG = "Name is required";
		}
		elseif (empty($_POST["fileUpload"])) {
		    $errorMSG = "Image Link is required";
		}
		// photo file upload to folder start here
		if($_POST['fileUpload']!="")
            {
                $fileName = $this->security->sanitize_filename ( $_POST ['fileUploadName'] );
				$file = $this->db->escape_str ( trim ( $_POST ['fileUpload'] ) );
				$file = urldecode ( $file );
                $file=str_replace('data:image/jpeg;base64,', '', $file);
                $file=str_replace('data:image/jpg;base64,', '', $file);
                $file=str_replace('data:image/png;base64,', '', $file);
                $file=str_replace(' ', '+', $file);
                $file=base64_decode($file);
                $fileName=time().'_'.$fileName;
                
                $ouputDir="assets/upload/gallery/";
                if (!is_dir($ouputDir)) {
                        mkdir($ouputDir, 0777, TRUE);
                    }
                file_put_contents($ouputDir.$fileName, $file);
            }
            else
            {
                $fileName="";
            }
        // End of photo file upload to folder start here  
			$title = $this->security->xss_clean($_POST['title']);

		$status = array("success"=>false,"msg"=>$errorMSG);
		if(empty($errorMSG)){	
	  		$result = $this->database->addGallery($title,$fileName);
			if($result['code'] == 1){
			  $status = array("success" => true,"msg" => "Save sucessfull!"); 
			}else{
			  $status = array("success" => false,"msg" => "Fail to save !!!"); 
			}
		}
        } catch (Exception $ex) {
            $status = array("success" => false,"msg" => $ex->getMessage());
        }

	  echo json_encode($status) ; 
	 }

	public function editGallery()
	{ 	
		try {
			$Id = $this->security->xss_clean($_POST['reqId']);
			if($Id == ''){
				$output = array(
			        'msg'=> 'Resquest Error !!!',
			        'success' =>false
	    		);
			}else{
				$data['result'] = $this->database->GetRecordById($Id,'gallery'); 	
				$output = array(
		        'html'=>$this->load->view('admin/fragment/gallery_updateForm',$data, true),
		        'success' =>true
		    	);
			}
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function updateGallery() 
	{    
		$_POST = json_decode(trim(file_get_contents('php://input')), true);	
	    $errorMSG ='';
	try {  

		if (empty($_POST["gallery_id"])) {
			    $errorMSG = "Please try again later !!!";
		}	
		elseif (empty($_POST["title"])) {
			    $errorMSG = "Image title is required";
		}

		// var_dump($_POST); die();
		// photo file upload to folder start here
		if($_POST['fileUpload']!="")
            {
                $fileName = $this->security->sanitize_filename ( $_POST ['fileUploadName'] );
				$file = $this->db->escape_str ( trim ( $_POST ['fileUpload'] ) );
				$file = urldecode ( $file );
                $file=str_replace('data:image/jpeg;base64,', '', $file);
                $file=str_replace('data:image/jpg;base64,', '', $file);
                $file=str_replace('data:image/png;base64,', '', $file);
                $file=str_replace(' ', '+', $file);
                $file=base64_decode($file);
                $fileName=time().'_'.$fileName;
                
                $ouputDir="assets/upload/gallery/";
                if (!is_dir($ouputDir)) {
                        mkdir($ouputDir, 0777, TRUE);
                    }
                file_put_contents($ouputDir.$fileName, $file);
            }
            else
            {
                $fileName="";
            }
        // End of photo file upload to folder start here  
            $gallery_id = $this->security->xss_clean($_POST['gallery_id']);
			$title = $this->security->xss_clean($_POST['title']);

		$status = array("success"=>false,"msg"=>$errorMSG);
		if(empty($errorMSG)){	
	  		$result = $this->database->updateGallery($gallery_id,$title,$fileName);
			if($result['code'] == 1){
			  $status = array("success" => true,"msg" => "Save sucessfull!"); 
			}else{
			  $status = array("success" => false,"msg" => "Fail to save !!!"); 
			}
		}
        } catch (Exception $ex) {
            $status = array("success" => false,"msg" => $ex->getMessage());
        }

	  echo json_encode($status) ; 
	}

	public function loadSolution()
	{ 	
		try {
			$data['result']=$this->database->GetAllActiveRecord('solution');  
			$output = array(
	        'html'=>$this->load->view('admin/fragment/solution_fragment',$data, true),
	        'success' =>true
	    	);
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function loadSolutionNewForm()
	{ 	
		try {
			// $data['result'] = $this->database->GetAllActiveEmpUser(); 
			$output = array('html'=>$this->load->view('admin/fragment/solution_newForm','', true),'success' =>true);
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function addSolution() 
	{    
	  // $_POST = json_decode(trim(file_get_contents('php://input')), true);
	  	// var_dump($_FILES); die();
	  $errorMSG ='';
	try {  
			
		if (empty($_POST["name"])) {
			    $errorMSG = "Heading is required";
		}
		elseif (empty($_POST["sub_name"])) {
		    $errorMSG = "Sub Heading is required";
		}
		elseif (empty($_POST["desc"])) {
		    $errorMSG = "Description is required";
		} 
		elseif (empty($_FILES["files"])) {
		    $errorMSG = "Image is required";
		}
		// **********************MULTIPLE FILE UPLOAD START *****************************************
                
                $file_path = "./assets/upload/solution";
                $uploadFiles = '';
                $is_file_error = FALSE; 
                
                if (isset($_FILES['files'])) {  
                    if (!is_dir('assets/upload/solution')) {
                        mkdir('./assets/upload/solution', 0777, TRUE);
                    }  
                        if(!empty($_FILES['files']['name'])){
                            
                            // Define new $_FILES array - $_FILES['file']
                            $new_name = time().$_FILES['files']['name'];
                            
                            $_FILES['file']['name'] = $new_name;
                            $_FILES['file']['type'] = $_FILES['files']['type'];
                            $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'];
                            $_FILES['file']['error'] = $_FILES['files']['error'];
                            $_FILES['file']['size'] = $_FILES['files']['size'];
                            
                            // Set preference
                            $config['upload_path'] = $file_path;
                            // $config['allowed_types'] = 'jpg|jpeg|png|gif|zip|rar|avi|flv|wmv|mp3|wav|mp4|pdf|doc|docx|txt|xlsx|';
                            $config['allowed_types'] = '*';
                            $config['max_size'] = '10000'; // max_size in kb
                            $config['file_name'] = $new_name;
                            
                            // Load upload library
                            $this->load->library('upload',$config);
                            $this->upload->initialize($config);
                            // File upload
                            if($this->upload->do_upload('file')){
                            // Get data about the file
                                $uploadFiles = $this->upload->data();
                            }
                            else {
                                $is_file_error = TRUE;
                            }
                        }
                    }
                
                // There were errors, we have to delete the uploaded files
                if ($is_file_error) {
                        $file = $file_path . $uploadFiles['file_name'];
                        if (file_exists($file)) {
                            unlink($file);
                        }
                    $errorMSG = "File upload Error !!! Please try again later ...";
                }
                
                //***********END OF MULTIPLE FILE UPLOAD***************************************** 
		
		$status = array("success"=>false,"msg"=>$errorMSG);
		if(empty($errorMSG)){	

			$heading = $this->security->xss_clean($_POST['name']);
			$subheading = $this->security->xss_clean($_POST['sub_name']);
			$desc = $this->security->xss_clean($_POST['desc']);
	  		$result = $this->database->addSolution($heading,$subheading,$desc,$uploadFiles);
			if($result['code'] == 1){
			  $status = array("success" => true,"msg" => "Save sucessfull!"); 
			}else{

				if (isset($_FILES['files'])) {  
					$file = $file_path . $uploadFiles['file_name'];
                    if (file_exists($file)) {
                        unlink($file);
                    }
                } 
			  $status = array("success" => false,"msg" => "Fail to save !!!"); 
			}
		}
        } catch (Exception $ex) {
            $status = array("success" => false,"msg" => $ex->getMessage());
        }

	  echo json_encode($status) ; 
	 }

	public function deleteSolution()
	{ 		
		try {
			$IdsArray = json_decode($_POST['dataArr'], TRUE);

				$this->database->RemoveRecordById($IdsArray,'solution'); 
				$output = array('success' =>true, 'msg'=> "Deleted sucessfully !!");

		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function enableSolution()
	{ 		
		try {
			$dataId = json_decode($_POST['dataId'], TRUE);

				$this->database->enableSolution($dataId,'solution'); 
				$output = array('success' =>true, 'msg'=> "Enabled sucessfully !!");

		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function editSolution()
	{ 	
		try {
			$Id = $this->security->xss_clean($_POST['reqId']);
			if($Id == ''){
				$output = array(
			        'msg'=> 'Resquest Error !!!',
			        'success' =>false
	    		);
			}else{
				$data['result'] = $this->database->GetAllRecordById($Id,'solution'); 	
				$output = array(
		        'html'=>$this->load->view('admin/fragment/solution_updateForm',$data, true),
		        'success' =>true
		    	);
			}
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function updateSolution() 
	{    
		// $_POST = json_decode(trim(file_get_contents('php://input')), true);	
	    $errorMSG ='';
	try {  

		if (empty($_POST["solution_id"])) {
			    $errorMSG = "Please try again later !!!";
		}	
		elseif (empty($_POST["name"])) {
			    $errorMSG = "Heading is required";
		}
		elseif (empty($_POST["sub_name"])) {
		    $errorMSG = "Sub Heading is required";
		}
		elseif (empty($_POST["desc"])) {
		    $errorMSG = "Description is required";
		} 

		// **********************MULTIPLE FILE UPLOAD START *****************************************
                
            $file_path = "./assets/upload/solution";
            $uploadFiles = '';
            $is_file_error = FALSE; 
            $fileName="";
            if (isset($_FILES['files'])) {  
                if (!is_dir('assets/upload/solution')) {
                    mkdir('./assets/upload/solution', 0777, TRUE);
                }  
                    if(!empty($_FILES['files']['name'])){
                        
                        // Define new $_FILES array - $_FILES['file']
                        $new_name = time().$_FILES['files']['name'];
                        
                        $_FILES['file']['name'] = $new_name;
                        $_FILES['file']['type'] = $_FILES['files']['type'];
                        $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'];
                        $_FILES['file']['error'] = $_FILES['files']['error'];
                        $_FILES['file']['size'] = $_FILES['files']['size'];
                        
                        // Set preference
                        $config['upload_path'] = $file_path;
                        // $config['allowed_types'] = 'jpg|jpeg|png|gif|zip|rar|avi|flv|wmv|mp3|wav|mp4|pdf|doc|docx|txt|xlsx|';
                        $config['allowed_types'] = '*';
                        $config['max_size'] = '10000'; // max_size in kb
                        $config['file_name'] = $new_name;
                        
                        // Load upload library
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        // File upload
                        if($this->upload->do_upload('file')){
                        // Get data about the file
                            $uploadFiles = $this->upload->data();
                            $fileName = $uploadFiles['file_name'];
                        }
                        else {
                            $is_file_error = TRUE;
                        }
                    }
                }
            
            // There were errors, we have to delete the uploaded files
            if ($is_file_error) {
                    $file = $file_path . $uploadFiles['file_name'];
                    if (file_exists($file)) {
                        unlink($file);
                    }
                $errorMSG = "File upload Error !!! Please try again later ...";
            }
            
            //***********END OF MULTIPLE FILE UPLOAD***************************************** 

            $solution_id = $this->security->xss_clean($_POST['solution_id']);
			$heading = $this->security->xss_clean($_POST['name']);
			$subheading = $this->security->xss_clean($_POST['sub_name']);
			$desc = $this->security->xss_clean($_POST['desc']);

		$status = array("success"=>false,"msg"=>$errorMSG);
		if(empty($errorMSG)){	
	  		$result = $this->database->updateSolution($solution_id,$heading,$subheading,$desc,$fileName);
			if($result['code'] == 1){
			  $status = array("success" => true,"msg" => "Save sucessfull!"); 
			}else{
				if (isset($_FILES['files'])) {  
					$file = $file_path . $uploadFiles['file_name'];
                    if (file_exists($file)) {
                        unlink($file);
                    }
                } 
			  $status = array("success" => false,"msg" => "Fail to save !!!"); 
			}
		}
        } catch (Exception $ex) {
            $status = array("success" => false,"msg" => $ex->getMessage());
        }

	  echo json_encode($status) ; 
	}

	public function loadHome()
	{ 	
		try {
			$data['result']=$this->database->GetAllActiveRecord('home');  
			$output = array(
	        'html'=>$this->load->view('admin/fragment/home_fragment',$data, true),
	        'success' =>true
	    	);
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function loadHomeNewForm()
	{ 	
		try {
			// $data['result'] = $this->database->GetAllActiveEmpUser(); 
			$output = array('html'=>$this->load->view('admin/fragment/home_newForm','', true),'success' =>true);
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function addHome() 
	{    
	  // $_POST = json_decode(trim(file_get_contents('php://input')), true);
	  	// var_dump($_FILES); die();
	  $errorMSG ='';
	try {  
			
		if (empty($_POST["name"])) {
			    $errorMSG = "Heading is required";
		}
		elseif (empty($_POST["sub_name"])) {
		    $errorMSG = "Sub Heading is required";
		}
		elseif (empty($_POST["desc"])) {
		    $errorMSG = "Description is required";
		} 
		elseif (empty($_FILES["files"])) {
		    $errorMSG = "Image is required";
		}
		// **********************MULTIPLE FILE UPLOAD START *****************************************
                
                $file_path = "./assets/upload/home";
                $uploadFiles = '';
                $is_file_error = FALSE; 
                
                if (isset($_FILES['files'])) {  
                    if (!is_dir('assets/upload/home')) {
                        mkdir('./assets/upload/home', 0777, TRUE);
                    }  
                        if(!empty($_FILES['files']['name'])){
                            
                            // Define new $_FILES array - $_FILES['file']
                            $new_name = time().$_FILES['files']['name'];
                            
                            $_FILES['file']['name'] = $new_name;
                            $_FILES['file']['type'] = $_FILES['files']['type'];
                            $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'];
                            $_FILES['file']['error'] = $_FILES['files']['error'];
                            $_FILES['file']['size'] = $_FILES['files']['size'];
                            
                            // Set preference
                            $config['upload_path'] = $file_path;
                            // $config['allowed_types'] = 'jpg|jpeg|png|gif|zip|rar|avi|flv|wmv|mp3|wav|mp4|pdf|doc|docx|txt|xlsx|';
                            $config['allowed_types'] = '*';
                            $config['max_size'] = '10000'; // max_size in kb
                            $config['file_name'] = $new_name;
                            
                            // Load upload library
                            $this->load->library('upload',$config);
                            $this->upload->initialize($config);
                            // File upload
                            if($this->upload->do_upload('file')){
                            // Get data about the file
                                $uploadFiles = $this->upload->data();
                            }
                            else {
                                $is_file_error = TRUE;
                            }
                        }
                    }
                
                // There were errors, we have to delete the uploaded files
                if ($is_file_error) {
                        $file = $file_path . $uploadFiles['file_name'];
                        if (file_exists($file)) {
                            unlink($file);
                        }
                    $errorMSG = "File upload Error !!! Please try again later ...";
                }
                
                //***********END OF MULTIPLE FILE UPLOAD***************************************** 
		
		$status = array("success"=>false,"msg"=>$errorMSG);
		if(empty($errorMSG)){	

			$heading = $this->security->xss_clean($_POST['name']);
			$subheading = $this->security->xss_clean($_POST['sub_name']);
			$desc = $this->security->xss_clean($_POST['desc']);
	  		$result = $this->database->addHome($heading,$subheading,$desc,$uploadFiles);
			if($result['code'] == 1){
			  $status = array("success" => true,"msg" => "Save sucessfull!"); 
			}else{
				if (isset($_FILES['files'])) {  
					$file = $file_path . $uploadFiles['file_name'];
                    if (file_exists($file)) {
                        unlink($file);
                    }
                } 
			  $status = array("success" => false,"msg" => "Fail to save !!!"); 
			}
		}
        } catch (Exception $ex) {
            $status = array("success" => false,"msg" => $ex->getMessage());
        }

	  echo json_encode($status) ; 
	 }

	public function deleteHome()
	{ 		
		try {
			$IdsArray = json_decode($_POST['dataArr'], TRUE);

				$this->database->RemoveRecordById($IdsArray,'home'); 
				$output = array('success' =>true, 'msg'=> "Deleted sucessfully !!");

		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function enableHome()
	{ 		
		try {
			$dataId = json_decode($_POST['dataId'], TRUE);

				$this->database->enableSolution($dataId,'home'); 
				$output = array('success' =>true, 'msg'=> "Enabled sucessfully !!");

		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function editHome()
	{ 	
		try {
			$Id = $this->security->xss_clean($_POST['reqId']);
			if($Id == ''){
				$output = array(
			        'msg'=> 'Resquest Error !!!',
			        'success' =>false
	    		);
			}else{
				$data['result'] = $this->database->GetAllRecordById($Id,'home'); 	
				$output = array(
		        'html'=>$this->load->view('admin/fragment/home_updateForm',$data, true),
		        'success' =>true
		    	);
			}
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function updateHome() 
	{    
		// $_POST = json_decode(trim(file_get_contents('php://input')), true);	
	    $errorMSG ='';
	try {  

		if (empty($_POST["home_id"])) {
			    $errorMSG = "Please try again later !!!";
		}	
		elseif (empty($_POST["name"])) {
			    $errorMSG = "Heading is required";
		}
		elseif (empty($_POST["sub_name"])) {
		    $errorMSG = "Sub Heading is required";
		}
		elseif (empty($_POST["desc"])) {
		    $errorMSG = "Description is required";
		} 

		// **********************MULTIPLE FILE UPLOAD START *****************************************
                
            $file_path = "./assets/upload/home";
            $uploadFiles = '';
            $is_file_error = FALSE; 
            $fileName="";
            if (isset($_FILES['files'])) {  
                if (!is_dir('assets/upload/home')) {
                    mkdir('./assets/upload/home', 0777, TRUE);
                }  
                    if(!empty($_FILES['files']['name'])){
                        
                        // Define new $_FILES array - $_FILES['file']
                        $new_name = time().$_FILES['files']['name'];
                        
                        $_FILES['file']['name'] = $new_name;
                        $_FILES['file']['type'] = $_FILES['files']['type'];
                        $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'];
                        $_FILES['file']['error'] = $_FILES['files']['error'];
                        $_FILES['file']['size'] = $_FILES['files']['size'];
                        
                        // Set preference
                        $config['upload_path'] = $file_path;
                        // $config['allowed_types'] = 'jpg|jpeg|png|gif|zip|rar|avi|flv|wmv|mp3|wav|mp4|pdf|doc|docx|txt|xlsx|';
                        $config['allowed_types'] = '*';
                        $config['max_size'] = '10000'; // max_size in kb
                        $config['file_name'] = $new_name;
                        
                        // Load upload library
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        // File upload
                        if($this->upload->do_upload('file')){
                        // Get data about the file
                            $uploadFiles = $this->upload->data();
                            $fileName = $uploadFiles['file_name'];
                        }
                        else {
                            $is_file_error = TRUE;
                        }
                    }
                }
            
            // There were errors, we have to delete the uploaded files
            if ($is_file_error) {
                    $file = $file_path . $uploadFiles['file_name'];
                    if (file_exists($file)) {
                        unlink($file);
                    }
                $errorMSG = "File upload Error !!! Please try again later ...";
            }
            
            //***********END OF MULTIPLE FILE UPLOAD***************************************** 

            $home_id = $this->security->xss_clean($_POST['home_id']);
			$heading = $this->security->xss_clean($_POST['name']);
			$subheading = $this->security->xss_clean($_POST['sub_name']);
			$desc = $this->security->xss_clean($_POST['desc']);

		$status = array("success"=>false,"msg"=>$errorMSG);
		if(empty($errorMSG)){	
	  		$result = $this->database->updateHome($home_id,$heading,$subheading,$desc,$fileName);
			if($result['code'] == 1){
			  $status = array("success" => true,"msg" => "Save sucessfull!"); 
			}else{
				if (isset($_FILES['files'])) {  
					$file = $file_path . $uploadFiles['file_name'];
                    if (file_exists($file)) {
                        unlink($file);
                    }
                }    
			  $status = array("success" => false,"msg" => "Fail to save !!!"); 
			}
		}
        } catch (Exception $ex) {
            $status = array("success" => false,"msg" => $ex->getMessage());
        }

	  echo json_encode($status) ; 
	}


	public function loadjobList()
	{ 	
		try {
			$data['result']=$this->database->GetAllActiveRecord('job_list');  
			$output = array(
	        'html'=>$this->load->view('admin/fragment/job_list_fragment',$data, true),
	        'success' =>true
	    	);
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function deleteJobList()
	{ 		
		try {
			$IdsArray = json_decode($_POST['dataArr'], TRUE);

				$this->database->RemoveRecordById($IdsArray,'job_list'); 
				$output = array('success' =>true, 'msg'=> "Deleted sucessfully !!");

		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function loadjobListNewForm()
	{ 	
		try {
			$output = array('html'=>$this->load->view('admin/fragment/job_list_newForm','', true),'success' =>true);
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function addJobList() 
	{    
	  $_POST = json_decode(trim(file_get_contents('php://input')), true);	
	  $errorMSG ='';
	try {  
		
		if (empty($_POST["job_title"])) {
			    $errorMSG = "Job title is required";
		}
		elseif (empty($_POST["job_loc"])) {
		    $errorMSG = "Job Location is required";
		}
		elseif (empty($_POST["keySkill"])) {
		    $errorMSG = "Key Skill Set is required";
		}
		elseif (empty($_POST["exp"])) {
		    $errorMSG = "Work Experience is required";
		}
 
		$job_title = $this->security->xss_clean($_POST['job_title']);
		$job_loc = $this->security->xss_clean($_POST['job_loc']);
		$keySkill = $this->security->xss_clean($_POST['keySkill']);
		$exp = $this->security->xss_clean($_POST['exp']);

		$status = array("success"=>false,"msg"=>$errorMSG);
			if(empty($errorMSG)){
				$dataResult = $this->database->addJobList($job_title,$job_loc,$keySkill,$exp);
				if($dataResult['code'] == 1){
					$status = array("success" => true,"msg" => "Added successfully"); 
				}else{
		  			$status = array("success" => false,"msg" => "Server error. Please try again later !!!"); 
				}
			}
        } catch (Exception $ex) {
            $status = array("success" => false,"msg" => $ex->getMessage());
        }

	  echo json_encode($status) ; 
	 }

	 public function editJobList()
	{ 	
		try {
			$Id = $this->security->xss_clean($_POST['reqId']);
			if($Id == ''){
				$output = array(
			        'msg'=> 'Resquest Error !!!',
			        'success' =>false
	    		);
			}else{
				$data['result'] = $this->database->GetRecordById($Id,'job_list'); 	
				$output = array(
		        'html'=>$this->load->view('admin/fragment/job_list_updateForm',$data, true),
		        'success' =>true
		    	);
			}
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function updateJobList() 
		{    
		  $_POST = json_decode(trim(file_get_contents('php://input')), true);	
		  $errorMSG ='';
		try {		
		if (empty($_POST["job_list_id"])) {
		    $errorMSG = "Error on Request data!!!";
		}
		elseif (empty($_POST["job_title"])) {
			    $errorMSG = "Job title is required";
		}
		elseif (empty($_POST["job_loc"])) {
		    $errorMSG = "Job Location is required";
		}
		elseif (empty($_POST["keySkill"])) {
		    $errorMSG = "Key Skill Set is required";
		}
		elseif (empty($_POST["exp"])) {
		    $errorMSG = "Work Experience is required";
		}
 		
 		$job_list_id = $this->security->xss_clean($_POST['job_list_id']);
		$job_title = $this->security->xss_clean($_POST['job_title']);
		$job_loc = $this->security->xss_clean($_POST['job_loc']);
		$keySkill = $this->security->xss_clean($_POST['keySkill']);
		$exp = $this->security->xss_clean($_POST['exp']);	

			
			$status = array("success"=>false,"msg"=>$errorMSG);
			if(empty($errorMSG)){	
		  		$result = $this->database->updateJobList($job_list_id,$job_title,$job_loc,$keySkill,$exp);
				if($result['code'] == 1){
				  $status = array("success" => true,"msg" => "Update sucessfull!"); 
				}else{
				  $status = array("success" => false,"msg" => "Fail to Update !!!"); 
				}
			}
	        } catch (Exception $ex) {
	            $status = array("success" => false,"msg" => $ex->getMessage());
	        }
	
		  echo json_encode($status) ; 
	}

	public function loadCareerForm()
	{ 		
		try {
			$data['result'] = $this->database->GetSingleRecordById('1','career'); 	
			$output = array(
	        'html'=>$this->load->view('admin/fragment/career_updateForm',$data, true),
	        'success' =>true
	    	);

		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function updateCareer() 
	{    
		$_POST = json_decode(trim(file_get_contents('php://input')), true);	
	    $errorMSG ='';
	try {  

		if (empty($_POST["career_title"])) {
			    $errorMSG = "Career Title is required";
		}
		elseif (empty($_POST["career_desc"])) {
		    $errorMSG = "Description is required";
		}
		
		$career_title = $this->security->xss_clean($_POST['career_title']);
		$career_desc = $this->security->xss_clean($_POST['career_desc']);

		$status = array("success"=>false,"msg"=>$errorMSG);
		if(empty($errorMSG)){	
	  		$result = $this->database->updateCareer($career_title,$career_desc);
			if($result['code'] == 1){
			  $status = array("success" => true,"msg" => "Save sucessfull!"); 
			}else{
			  $status = array("success" => false,"msg" => "Fail to save !!!"); 
			}
		}
        } catch (Exception $ex) {
            $status = array("success" => false,"msg" => $ex->getMessage());
        }

	  echo json_encode($status) ; 
	}


	public function sentContactUs() 
		{    
		  $errorMSG ='';
		try {

			if (empty($_POST["fname"])) {
			    $errorMSG = "First Name is required";
			}
			elseif (empty($_POST["lname"])) {
			    $errorMSG = "Last Name is required";
			}
			elseif (empty($_POST["email"])) {
			    $errorMSG = "Email Address is required";
			}
			elseif (empty($_POST["message"])) {
			    $errorMSG = "Message is required";
			}

			$fname =  $this->security->xss_clean($_POST['fname']);
			$lname =  $this->security->xss_clean($_POST['lname']);
			$email =  $this->security->xss_clean($_POST['email']);
			$message =  $this->security->xss_clean($_POST['message']);

			$status = array("success"=>false,"msg"=>$errorMSG);
			if(empty($errorMSG)){	
			  	$result = $this->database->sentContactUs($fname,$lname,$email,$message); 
				if($result['code'] == 1){
					// $result_mail = $this->mailer->sentContactUsMail($fname,$lname,$email,$message);
				  	$status = array("success" => true,"msg" => "sent sucessfull!"); 
				}else{
				  $status = array("success" => false,"msg" => "Fail to sent !!!"); 
				} 
			}
	        } catch (Exception $ex) {
	            $status = array("success" => false,"msg" => $ex->getMessage());
	        }
	
		  echo json_encode($status) ; 
	}

	public function sentSubscribeUs() 
		{    
		  $errorMSG ='';
		try {
			
			if (empty($_POST["subscribe_email"])) {
			    $errorMSG = "Email Address is required";
			}

			$email =  $this->security->xss_clean($_POST['subscribe_email']);


			$status = array("success"=>false,"msg"=>$errorMSG);
			if(empty($errorMSG)){	
				$result1 = $this->database->SearchDataExist('email',$email,'subscribe'); 
				if($result1 == FALSE){	
					$result = $this->database->sentSubscribeUs($email); 
					if($result['code'] == 1){
						// $result_mail = $this->mailer->sentSubscribeUsMail($email);
					  	$status = array("success" => true,"msg" => "sent successfully."); 
					}else{
					    $status = array("success" => false,"msg" => "Fail to sent... Please try again later !!!"); 
					}
				}else{
				  $status = array("success" => false,"msg" => "Email already subscibed."); 
				} 
			}
	        } catch (Exception $ex) {
	            $status = array("success" => false,"msg" => $ex->getMessage());
	        }
	
		  echo json_encode($status) ; 
	}

	public function uploadResume() 
	{    
	    $errorMSG ='';
	try {  

		// **********************MULTIPLE FILE UPLOAD START *****************************************
                
            $file_path = "./assets/upload/resume";
            $uploadFiles = '';
            $is_file_error = FALSE; 
            $fileName="";
            if (isset($_FILES['files'])) {  
                if (!is_dir('assets/upload/resume')) {
                    mkdir('./assets/upload/resume', 0777, TRUE);
                }  
                    if(!empty($_FILES['files']['name'])){
                        
                        // Define new $_FILES array - $_FILES['file']
                        $new_name = $_FILES['files']['name'];
                        
                        $_FILES['file']['name'] = $new_name;
                        $_FILES['file']['type'] = $_FILES['files']['type'];
                        $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'];
                        $_FILES['file']['error'] = $_FILES['files']['error'];
                        $_FILES['file']['size'] = $_FILES['files']['size'];
                        
                        // Set preference
                        $config['upload_path'] = $file_path;
                        // $config['allowed_types'] = 'jpg|jpeg|png|gif|zip|rar|avi|flv|wmv|mp3|wav|mp4|pdf|doc|docx|txt|xlsx|';
                        $config['allowed_types'] = '*';
                        $config['max_size'] = '100000'; // max_size in kb = 10 mb
                        $config['file_name'] = $new_name;
                        
                        // Load upload library
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        // File upload
                        if($this->upload->do_upload('file')){
                        // Get data about the file
                            $uploadFiles = $this->upload->data(); 
                            $fileName = $uploadFiles['file_name'];
                        }
                        else { 
                            $is_file_error = TRUE;
                            $fileUploadErrorMsg = $this->upload->display_errors();
                        }
                    }
                }
            // var_dump($fileName); die();
            // There were errors, we have to delete the uploaded files
            if ($is_file_error) {
                    $file = $file_path . $uploadFiles['file_name'];
                    if (file_exists($file)) {
                        unlink($file);
                    }
                $errorMSG = "File upload Error !!! Please try again later ..."." <br>".$fileUploadErrorMsg;
            }
            
            //***********END OF MULTIPLE FILE UPLOAD***************************************** 

		$status = array("success"=>false,"msg"=>$errorMSG);
		if(empty($errorMSG)){	
	  		$result = $this->database->addResume($fileName);
			if($result['code'] == 1){
				// $result_mail = $this->mailer->sentResumeMail($fileName); // sending Email to admin
			    $status = array("success" => true,"msg" => "Save sucessfull!"); 
			}else{
				if (isset($_FILES['files'])) {  
					$file = $file_path . $uploadFiles['file_name'];
                    if (file_exists($file)) {
                        unlink($file);
                    }
                }    
			  $status = array("success" => false,"msg" => "Fail to save !!!"); 
			}
		}
        } catch (Exception $ex) {
            $status = array("success" => false,"msg" => $ex->getMessage());
        }

	  echo json_encode($status) ; 
	}

	public function loadResumeList()
	{ 	
		try {
			$data['result']=$this->database->GetAllActiveRecord('resume');  
			$output = array(
	        'html'=>$this->load->view('admin/fragment/resume_fragment',$data, true),
	        'success' =>true
	    	);
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function deleteResumeList()
	{ 		
		try {
			$IdsArray = json_decode($_POST['dataArr'], TRUE); 
				$this->database->RemoveRecordById($IdsArray,'resume'); 
				$output = array('success' =>true, 'msg'=> "Deleted sucessfully !!");
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}
	public function loadContactUs()
	{ 	
		try {
			$data['result']=$this->database->GetAllActiveRecord('contact_us');  
			$output = array(
	        'html'=>$this->load->view('admin/fragment/contactUs_fragment',$data, true),
	        'success' =>true
	    	);
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function viewContactUs()
	{ 	
		try {
			$Id = $this->security->xss_clean($_POST['reqId']);
			if($Id == ''){
				$output = array(
			        'msg'=> 'Resquest Error !!!',
			        'success' =>false
	    		);
			}else{
				$data['result'] = $this->database->GetRecordById($Id,'contact_us'); 
				$output = array(
		        'html'=>$this->load->view('admin/fragment/contactUs_view',$data, true),
		        'success' =>true
		    	);
			}
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function loadSubscribeList()
	{ 	
		try {
			$data['result']=$this->database->GetAllActiveRecord('subscribe');  
			$output = array(
	        'html'=>$this->load->view('admin/fragment/subscribe_fragment',$data, true),
	        'success' =>true
	    	);
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	private	function alphabet_to_number($string) {
	    $string = strtoupper($string);
	    $length = strlen($string);
	    $number = 0;
	    $level = 1;
	    while ($length >= $level ) {
	        $char = $string[$length - $level];
	        $c = ord($char) - 64;        
	        $number += $c * (26 * ($level-1));
	        $level++;
	    }
	    return $number;
	}
	public function uploadProjectData(){	
		$this->load->library('excel');
		// $this->load->helper('date');
		// var_dump($_FILES["file"]["name"]); die();
		try {
			if(isset($_FILES["proj_file"]["name"]))
			{	
				$fileName = $_FILES["proj_file"]["name"];
				$path = $_FILES["proj_file"]["tmp_name"];
				$object = PHPExcel_IOFactory::load($path);	
				foreach($object->getWorksheetIterator() as $worksheet)
				{	
					$highestRow = $worksheet->getHighestRow(); 
					$highestColumn = $worksheet->getHighestColumn(); 
					//var_dump($this->alphabet_to_number($highestColumn)); die;
					for($row=1; $row<=$highestRow; $row++)
					{
						$client = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
						$client_code = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
						$proj_receive_date = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
						$invoice_date = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
						$po = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
						$invoice_no = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
						$proj_id = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
						$proj_name = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
						$deliveries = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
						$cost = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
						$pm = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
						$dp_on_job = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
						$comment = $worksheet->getCellByColumnAndRow(12, $row)->getValue();

						 if($row != 1){
						 	$proj_receive_date = date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($proj_receive_date));
						 	$invoice_date = date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($invoice_date));
						 }

						$data[] = array(
							'client'		=>	$client,
							'client_code'	=>	$client_code,
							'proj_receive_date'	=>	$proj_receive_date,
							'invoice_date'	=>	$invoice_date,
							'po'			=>	$po,
							'invoice_no'	=>	$invoice_no,
							'proj_id'		=>	$proj_id,
							'proj_name'		=>	$proj_name,
							'deliveries'	=>	$deliveries,
							'cost'			=>	$cost,
							'pm'			=>	$pm,
							'dp_on_job'		=>	$dp_on_job,
							'comment'		=>	$comment,
							'isActive'		=>	1
						);
					}
					break;
				}
				$result = $this->database->TruncateData('project_excel');
				if($result == TRUE){
					$result = $this->database->insertData($data,'project_excel');
					if($result == TRUE){
						$output = array('msg'=> 'Data Imported successfully !!!','success' =>true);
					}else{
						$output = array('msg'=> 'Fail to Imported !!!','success' =>false);
					}
				}else{
						$output = array('msg'=> 'Fail to Imported !!!','success' =>false);
				}
				
			}
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);         
	}

	public function uploadProjectManageData(){	
		$this->load->library('excel');
		try {
			if(isset($_FILES["proj_mng_file"]["name"]))
			{	
				$fileName = $_FILES["proj_mng_file"]["name"];
				$path = $_FILES["proj_mng_file"]["tmp_name"];
				$object = PHPExcel_IOFactory::load($path);
				foreach($object->getWorksheetIterator() as $worksheet)
				{
					$highestRow = $worksheet->getHighestRow();
					$highestColumn = $worksheet->getHighestColumn();
					for($row=1; $row<=$highestRow; $row++)
					{
						$proj_detail = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
						$work_phase = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
						$client = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
						$pm = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
						$dp_contact = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
						$dp_cur_work = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
						$Last_date_rec = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
						$deliverable = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
						$setup_qa_effort = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
						$date_a = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
						$date_b = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
						$date_c = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
						$date_d = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
						$date_e = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
						$date_f = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
						$date_g = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
						$remark = $worksheet->getCellByColumnAndRow(16, $row)->getValue();	
						$qc_effort = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
						$qc_by = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
						$qa_priority = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
						$field_closure = $worksheet->getCellByColumnAndRow(20, $row)->getValue(); 

						if($row == 1){
						 	$date_a = date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($date_a));
						 	$date_b = date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($date_b));
						 	$date_c = date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($date_c));
						 	$date_d = date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($date_d));
						 	$date_e = date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($date_e));
						 	$date_f = date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($date_f));
						 	$date_g = date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($date_g));
						}

						if($row != 1){
						 	$field_closure = date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($field_closure));
						}

						$data[] = array(
							'proj_detail'	=>	$proj_detail,
							'work_phase'	=>	$work_phase,
							'client'		=>	$client,
							'pm'			=>	$pm,
							'dp_contact'	=>	$dp_contact,
							'dp_cur_work'	=>	$dp_cur_work,
							'Last_date_rec'	=>	$Last_date_rec,
							'deliverable'	=>	$deliverable,
							'setup_qa_effort'	=>	$setup_qa_effort,
							'date_a'		=>	$date_a,
							'date_b'		=>	$date_b,
							'date_c'		=>	$date_c,
							'date_d'		=>	$date_d,
							'date_e'		=>	$date_e,
							'date_f'		=>	$date_f,
							'date_g'		=>	$date_g,
							'remark'		=>	$remark,
							'qc_effort'		=>	$qc_effort,
							'qc_by'			=>	$qc_by,
							'qa_priority'	=>	$qa_priority,
							'field_closure'	=>	$field_closure,
							'isActive'		=>	1
						);
					}
				}
				$result = $this->database->TruncateData('project_management');
				if($result == TRUE){
					$result = $this->database->insertData($data,'project_management');
					if($result == TRUE){
						$output = array('msg'=> 'Data Imported successfully !!!','success' =>true);
					}else{
						$output = array('msg'=> 'Fail to Imported !!!','success' =>false);
					}
				}else{
						$output = array('msg'=> 'Fail to Imported !!!','success' =>false);
				}
				
			}
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);         
	}  

	public function loadProject()
	{ 	
		try {
			$data['result']=$this->database->GetSingleRecordById('1','project_excel'); 
			$data['result_body']=$this->database->GetAllProjectExcelExceptFirst(); 
			$output = array(
	        'html'=>$this->load->view('admin/fragment/project_fragment',$data, true),
	        'success' =>true,
	        'countData' => count($data['result'])
	    	);
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}

	public function loadProjectManagement()
	{ 	
		try {
			$data['result']=$this->database->GetSingleRecordById('1','project_management');  
			$data['result_body']=$this->database->GetAllProjectMngExcelExceptFirst();
			$output = array(
	        'html'=>$this->load->view('admin/fragment/projectManage_fragment',$data, true),
	        'success' =>true,
	        'countData' => count($data['result'])
	    	);
		} catch (Exception $ex) {
            $output = array(
	        'msg'=> $ex->getMessage(),
	        'success' => false
	    	);
        }
    	 echo json_encode($output);
	}
	
	//WRITTEN BY RIYAJ
	public function get_student_list()
	{	
		try {
				$app_id =  $this->security->xss_clean($_POST['app_id']);
				$name =  $this->security->xss_clean($_POST['name']);
				$aadhaar_no =  $this->security->xss_clean($_POST['aadhaar_no']);
				$percentage_from =  $this->security->xss_clean($_POST['percentage_from']);
				$percentage_to =  $this->security->xss_clean($_POST['percentage_to']);
				$applyDate =  $this->security->xss_clean($_POST['applyDate']);
				$subject_comb =  $this->security->xss_clean($_POST['subject_comb']);
				$data['result']=$this->database->get_candidate_list($app_id,$name,$aadhaar_no,$percentage_from,$percentage_to,$applyDate,$subject_comb);

				$total_application=$this->database->get_all_application();
				$total_admited=$this->database->get_admited_student();
		
				
				$output = array(
                'html'=>$this->load->view('admin/fragment/student_list_table',$data, true),
                'success' =>true,
				'total_application'=>$total_application[0]['total_application'],
				'total_admited'=>$total_admited[0]['total_admited'],				
				
				);
				} catch (Exception $ex) {
				$output = array(
                'msg'=> $ex->getMessage(),
                'success' => false
				);
			}
			echo json_encode($output);
	}					
	public function get_fee_list()
	{
		try {
				$data['student_name'] = $_POST["student_name"];
				$data['application_id'] = $_POST["application_id"];
				$data['watsapp_no'] = $_POST["watsapp_no"];
				$data['id'] = $_POST["id"];
				$data['aadhaar_number'] = $_POST["aadhaar_number"];
				$data['transportation'] = $_POST["transportation"];	
				$data['percentage'] = $_POST["percentage"];					
				$data['passed_board'] = $_POST["passed_board"];	
				$data['gender'] = $_POST["gender"];					
				
				
				$data['result']=$this->database->get_fee_list($data['id']);
				
				
				$output = array(
                'html'=>$this->load->view('admin/fragment/fee_list',$data, true),
                'success' =>true
				);
			} catch (Exception $ex) 
			{
				$output = array(
                'msg'=> $ex->getMessage(),
                'success' => false
				);
			}
			echo json_encode($output);
	}
	
	public function admission_form()
		{
			$_POST = json_decode(trim(file_get_contents('php://input')), true);
			$errorMSG ='';
		
			try {
				/* name title validation */
				if (($this->input->post('st_id',true)) == null) {
					$errorMSG = "  Student selection is required";
				}
				if( $this->input->post('fee_id[]',true) == "")
				{
					$errorMSG = "  No item selected for payment.";
				}
				
				$status = array("success"=>false,"msg"=>$errorMSG);
				if(empty($errorMSG)){
					
					$student_id = $this->db->escape_str ( trim ( $this->input->post('st_id',true) ) );
					$fee_id = $this->db->escape_str ( $this->input->post('fee_id[]',true) );
										
					$result = $this->database->add_admission_model($student_id,$fee_id);
						
						if($result['code'] == 1){
							$status = array(
							"success" => true,
							"html"=>$this->load->view('admin/fragment/receipt',$result, true),
							);
							}else{
							$status = array("success" => false,"msg" => $result['msg'] );
						}
				}
				} catch (Exception $ex) {
				$status = array("success" => false,"msg" => $ex->getMessage());
			}
			
			echo json_encode($status) ;
		}
public function get_payment_history_list()
	{
		try {
				$student_id = $_POST["student_id"];			
				
				
				$data['result']=$this->database->get_payment_history_list($student_id);
				
				
				$output = array(
                'html'=>$this->load->view('admin/fragment/payment_history_list',$data, true),
                'success' =>true
				);
			} catch (Exception $ex) 
			{
				$output = array(
                'msg'=> $ex->getMessage(),
                'success' => false
				);
			}
			echo json_encode($output);
	}
	
	public function get_ind_fee_payment_details()
	{
		try {
				$payment_id = $_POST["payment_id"];			
				
				
				$data['result']=$this->database->get_ind_payment_history($payment_id);
			
				
				$output = array(
                'html'=>$this->load->view('admin/fragment/ind_payment_history_invoice',$data, true),
                'success' =>true
				);
			} catch (Exception $ex) 
			{
				$output = array(
                'msg'=> $ex->getMessage(),
                'success' => false
				);
			}
			echo json_encode($output);
	}
	
	public function get_profile_details()
	{
		try {
				$student_id = $_POST["student_id"];			
				
				
				$data['result']=$this->database->get_student_profile($student_id);
				
				
				$output = array(
                'html'=>$this->load->view('admin/fragment/profile_info.php',$data, true),
                'success' =>true
				);
			} catch (Exception $ex) 
			{
				$output = array(
                'msg'=> $ex->getMessage(),
                'success' => false
				);
			}
			echo json_encode($output);
	}

		
}