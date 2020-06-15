<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admission_controller extends CI_Controller {

	function __construct()
    {
    	parent::__construct();
    	$this->load->model('Admission_model');
    	$this->load->library ( 'form_validation' );
    }
	
	public function index()
	{  	
		$this->load->view('extraedge/instruction');
	}

	public function LoadAdmissionFrom()
	{ 	
		try {
			$output = array(
		        'html'=>$this->load->view('extraedge/admissionform','', true),
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

	public function addResgistrationFrom()
	{ 		
		$errorMSG ='';
		try {
			if (empty($_POST["student_name"])) {
			    $errorMSG = "Student Name is required";
			}
            elseif (empty($_POST["dob"])) {
                $errorMSG = "Date of birth is required";
            }
            elseif (empty($_POST["gender"])) {
                $errorMSG = "Gender is required";
            }
            elseif (empty($_POST["religion"])) {
                $errorMSG = "Religion is required";
            }
            elseif (empty($_POST["caste"])) {
                $errorMSG = "Caste Category is required";
            }
            elseif (empty($_POST["father_name"])) {
                $errorMSG = "Father's Name is required";
            }
            elseif (empty($_POST["mother_name"])) {
                $errorMSG = "Mother's Name is required";
            }
            elseif (empty($_POST["permanent_address"])) {
                $errorMSG = "Permanent Address In Full is required";
            }
            elseif (empty($_POST["permanent_address_po"])) {
                $errorMSG = "Permanent Address Post Office is required";
            }
            elseif (empty($_POST["permanent_address_ps"])) {
                $errorMSG = "Permanent Address Police Station is required";
            }
            elseif (empty($_POST["permanent_pin"])) {
                $errorMSG = "Permanent Address Pin is required";
            }
            elseif (empty($_POST["whatapps_no"])) {
                $errorMSG = "Contact Number is required";
            }
            elseif (empty($_POST["aadhaar_number"])) {
                $errorMSG = "Aadhaar Number is required";
            }
            elseif (empty($_POST["blood_group"])) {
                $errorMSG = "Blood Group is required";
            }
			elseif (empty($_POST["x_pass_board"])) {
			    $errorMSG = "Class X Passed Board is required";
			}
			elseif (empty($_POST["x_pass_school"])) {
			    $errorMSG = "Passed out School Name is required";
			}
            elseif (empty($_POST["roll_no"])) {
                $errorMSG = "Roll No is required";
            }
            elseif (empty($_POST["x_passed_year"])) {
                $errorMSG = "Year of Passed class X is required";
            }
			elseif (empty($_POST["x_division"])) {
			    $errorMSG = "Class X Division is required";
			}
			elseif (empty($_POST["percentage"])) {
			    $errorMSG = "Percentage is required";
			}
            elseif (empty($_POST["x_subject_offer"])) {
                $errorMSG = "Class X Subject offers is required";
            }
            elseif (empty($_POST["subject_combination"])) {
                $errorMSG = "Subject combination is required";
            }
			elseif ($_FILES["files_photo"]["name"] == '') { 
			    $errorMSG = "Student Passport Photo is required";
			}
            elseif ($_FILES["files_marksheet"]["name"] == '') {
                $errorMSG = "One self-attested copy of Marksheet of HSLCE Photo is required";
            }
            elseif ($_FILES["files_admitcard"]["name"] == '') {
                $errorMSG = "One self-attested copy of Admit Card of HSLCE Photo is required";
            }

            // **********************Student Photo upload start here *****************************************
                    
            $file_path_photo = "./assets/ExtraEdge/Photo";
            $uploadFiles_photo = '';
            $is_file_error = FALSE; 
            
            if (isset($_FILES['files_photo'])) {  
                if (!is_dir('assets/ExtraEdge/Photo')) {
                    mkdir('./assets/ExtraEdge/Photo', 0777, TRUE);
                }  
                    if(!empty($_FILES['files_photo']['name'])){
                        
                        // Define new $_FILES array - $_FILES['file']
                        $new_name = time().$_FILES['files_photo']['name'];
                        
                        $_FILES['file']['name'] = $new_name;
                        $_FILES['file']['type'] = $_FILES['files_photo']['type'];
                        $_FILES['file']['tmp_name'] = $_FILES['files_photo']['tmp_name'];
                        $_FILES['file']['error'] = $_FILES['files_photo']['error'];
                        $_FILES['file']['size'] = $_FILES['files_photo']['size'];
                        
                        // Set preference
                        $config['upload_path'] = $file_path_photo;
                        $config['allowed_types'] = 'jpg|jpeg|png|pdf|';
                        $config['allowed_types'] = '*';
                        $config['max_size'] = '50000'; // max_size in kb
                        $config['file_name'] = $new_name;
                        
                        // Load upload library
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        // File upload
                        if($this->upload->do_upload('file')){
                        // Get data about the file
                            $uploadFiles_photo = $this->upload->data();
                        }
                        else {
                            $is_file_error = TRUE;
                        }
                    }
                }
            
            // There were errors, we have to delete the uploaded files
            if ($is_file_error) {
                    $file = $file_path_photo . $uploadFiles_photo['file_name'];
                    if (file_exists($file)) {
                        unlink($file);
                    }
                $errorMSG = "File upload Error !!! Please try again later ...";
            }
            
            //***********END OF STUDENT PHOTO UPLOAD***************************************** 

            // ********************** STUDENT MARKSHEET UPLOAD start here *****************************************
                
            $file_path_marksheet = "./assets/ExtraEdge/marksheet";
            $uploadFiles_marksheet = '';
            $is_file_error = FALSE; 
            
            if (isset($_FILES['files_marksheet'])) {  
                if (!is_dir('assets/ExtraEdge/marksheet')) {
                    mkdir('./assets/ExtraEdge/marksheet', 0777, TRUE);
                }  
                    if(!empty($_FILES['files_marksheet']['name'])){
                        
                        // Define new $_FILES array - $_FILES['file']
                        $new_name = time().$_FILES['files_marksheet']['name'];
                        
                        $_FILES['file']['name'] = $new_name;
                        $_FILES['file']['type'] = $_FILES['files_marksheet']['type'];
                        $_FILES['file']['tmp_name'] = $_FILES['files_marksheet']['tmp_name'];
                        $_FILES['file']['error'] = $_FILES['files_marksheet']['error'];
                        $_FILES['file']['size'] = $_FILES['files_marksheet']['size'];
                        
                        // Set preference
                        $config['upload_path'] = $file_path_marksheet;
                        $config['allowed_types'] = 'jpg|jpeg|png|pdf|';
                        $config['allowed_types'] = '*';
                        $config['max_size'] = '50000'; // max_size in kb
                        $config['file_name'] = $new_name;
                        
                        // Load upload library
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        // File upload
                        if($this->upload->do_upload('file')){
                        // Get data about the file
                            $uploadFiles_marksheet = $this->upload->data();
                        }
                        else {
                            $is_file_error = TRUE;
                        }
                    }
                }
            
            // There were errors, we have to delete the uploaded files
            if ($is_file_error) {
                    $file = $file_path_marksheet . $uploadFiles_marksheet['file_name'];
                    if (file_exists($file)) {
                        unlink($file);
                    }
                $errorMSG = "File upload Error !!! Please try again later ...";
            }
            
            //***********END OF STUDENT MARKSHEET UPLOAD ***************************************** 

            // **********************Student STUDENT ADMITCARD upload start here *****************************************
                
            $file_path_admitcard = "./assets/ExtraEdge/admitcard";
            $uploadFiles_admitcard = '';
            $is_file_error = FALSE; 
            
            if (isset($_FILES['files_admitcard'])) {  
                if (!is_dir('assets/ExtraEdge/admitcard')) {
                    mkdir('./assets/ExtraEdge/admitcard', 0777, TRUE);
                }  
                    if(!empty($_FILES['files_admitcard']['name'])){
                        
                        // Define new $_FILES array - $_FILES['file']
                        $new_name = time().$_FILES['files_admitcard']['name'];
                        
                        $_FILES['file']['name'] = $new_name;
                        $_FILES['file']['type'] = $_FILES['files_admitcard']['type'];
                        $_FILES['file']['tmp_name'] = $_FILES['files_admitcard']['tmp_name'];
                        $_FILES['file']['error'] = $_FILES['files_admitcard']['error'];
                        $_FILES['file']['size'] = $_FILES['files_admitcard']['size'];
                        
                        // Set preference
                        $config['upload_path'] = $file_path_admitcard;
                        $config['allowed_types'] = 'jpg|jpeg|png|pdf|';
                        $config['allowed_types'] = '*';
                        $config['max_size'] = '50000'; // max_size in kb
                        $config['file_name'] = $new_name;
                        
                        // Load upload library
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        // File upload
                        if($this->upload->do_upload('file')){
                        // Get data about the file
                            $uploadFiles_admitcard = $this->upload->data();
                        }
                        else {
                            $is_file_error = TRUE;
                        }
                    }
                }
            
            // There were errors, we have to delete the uploaded files
            if ($is_file_error) {
                    $file = $file_path_admitcard . $uploadFiles_admitcard['file_name'];
                    if (file_exists($file)) {
                        unlink($file);
                    }
                $errorMSG = "File upload Error !!! Please try again later ...";
            }
            
            //***********END OF STUDENT ADMITCARD***************************************** 
			

			$output = array("success"=>false,"msg"=>$errorMSG);
			if(empty($errorMSG)){	

                

				$student_name = $this->security->xss_clean($_POST['student_name']);
                $dob = $this->security->xss_clean($_POST['dob']);
                $gender = $this->security->xss_clean($_POST['gender']);
                $religion = $this->security->xss_clean($_POST['religion']);
                $caste = $this->security->xss_clean($_POST['caste']);
                $father_name = $this->security->xss_clean($_POST['father_name']);
                $father_occuption = $this->security->xss_clean($_POST['father_occuption']);
                $mother_name = $this->security->xss_clean($_POST['mother_name']);
                $mother_occuption = $this->security->xss_clean($_POST['mother_occuption']);
                $permanent_address = $this->security->xss_clean($_POST['permanent_address']);
                $permanent_address_po = $this->security->xss_clean($_POST['permanent_address_po']);
                $permanent_address_ps = $this->security->xss_clean($_POST['permanent_address_ps']);
                $permanent_pin = $this->security->xss_clean($_POST['permanent_pin']);
                $whatapps_no = $this->security->xss_clean($_POST['whatapps_no']);
                $aadhaar_number = $this->security->xss_clean($_POST['aadhaar_number']);
				$identification_mark = $this->security->xss_clean($_POST['identification_mark']);
                $pwd = $this->security->xss_clean($_POST['pwd']);
                $blood_group = $this->security->xss_clean($_POST['blood_group']);
                $x_pass_board = $this->security->xss_clean($_POST['x_pass_board']);
                $x_pass_school = $this->security->xss_clean($_POST['x_pass_school']);
                $roll_no = $this->security->xss_clean($_POST['roll_no']);
                $x_passed_year = $this->security->xss_clean($_POST['x_passed_year']);
                $x_division = $this->security->xss_clean($_POST['x_division']);
                $percentage = $this->security->xss_clean($_POST['percentage']);
                $x_subject_offer = $this->security->xss_clean($_POST['x_subject_offer']);    
                $x_eligible_cert_no = $this->security->xss_clean($_POST['x_eligible_cert_no']);
                $subject_combination = $this->security->xss_clean($_POST['subject_combination']);

		  		$result = $this->Admission_model->addResgistrationFrom($student_name,$dob,$gender,$religion,$caste,$father_name,$father_occuption,$mother_name,$mother_occuption,$permanent_address,$permanent_address_po,$permanent_address_ps,$permanent_pin,$aadhaar_number,$blood_group,$caste,$identification_mark,$x_pass_board,$x_pass_school,$roll_no,$percentage,$permanent_district,$present_address,$present_district,$present_pin,$whatapps_no,$guardian_name,$transportation,$route,$subject_combination,$uploadFiles_photo,$uploadFiles_marksheet,$uploadFiles_admitcard);
				if($result['code'] == 1){
				  $output = array("html"=>$this->load->view('extraedge/payment','', true),
                                    "success" => true,
                                    "msg" => "Save sucessfull!"); 
				}else{

                    //Removing Image 
					if (isset($_FILES['files_photo'])) {  
						$file = $file_path_photo . $uploadFiles_photo['file_name'];
	                    if (file_exists($file)) {
	                        unlink($file);
	                    }
	                } 
                    if (isset($_FILES['files_marksheet'])) {  
                        $file = $file_path_marksheet . $uploadFiles_marksheet['file_name'];
                        if (file_exists($file)) {
                            unlink($file);
                        }
                    } 
                    if (isset($_FILES['files_admitcard'])) {  
                        $file = $file_path_admitcard . $uploadFiles_admitcard['file_name'];
                        if (file_exists($file)) {
                            unlink($file);
                        }
                    } 
				  $output = array("success" => false,"msg" => "Fail to save !!!"); 
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

    public function SuccessPaymentRegistration_hook()
    {   
        // var_dump($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $link_id = $this->security->xss_clean($_POST['link_id']);
                $payment_id = $this->security->xss_clean($_POST['payment_id']);
                $status = $this->security->xss_clean($_POST['status']);
                $currency = $this->security->xss_clean($_POST['currency']);
                $amount = $this->security->xss_clean($_POST['amount']);
                $mac = $this->security->xss_clean($_POST['mac']);
                $this->Admission_model->addBillDetails($link_id,$payment_id,$status,$currency,$amount,$mac); 
        }    
    }

    public function SuccessPaymentRegistration()
    {   
        $appId = $this->session->userdata( 'application_id' );
        if($appId != ''){
            $data['result_applicationId'] = $this->session->userdata( 'application_id' );
            $data['result_studentName'] = $this->session->userdata( 'student_name' );
            $data['result_dob'] = $this->session->userdata( 'dob' );
            $data['result_payment_status'] = 'Success';
            $this->Admission_model->SuccessPaymentRegistration($data['result_applicationId']);
            $this->session->sess_destroy();
            $this->load->view('extraedge/successPayment',$data); 
        }else{
            $this->load->view('extraedge/error_page'); 
        }
    }

}
