<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    function __construct()
    {
        parent::__construct ();
        $this->load->model ( 'Login_model', 'loginmodel' );
        $this->load->model ( 'Mail_model', 'mailer' );
        $this->load->model('Data_model', 'database');
        $this->load->helper ( 'security' );
        $this->load->helper('captcha');
    }
    

    public function login_form()
    {
        $data ['msg'] = "";
        $this->load->view ( 'admin/login', $data );
    }
    
    public function index()
    {   
        $this->form_validation->set_rules ( "email", "Email", 'trim|required|xss_clean' );
        $this->form_validation->set_rules ( "password", "Password", 'required|xss_clean' ); 
        if ($this->form_validation->run () == FALSE)
        {   
            $this->login_form ();
        }
        else
        {  
            $email = $this->db->escape_str ( trim ( $_POST ['email'] ) );
            $password = $this->db->escape_str (  $_POST ['password'] ); 
            $authentication_data = $this->loginmodel->check_authentication ( $email, $password ); 
            if ($authentication_data != false && sizeof ( $authentication_data ) == 1) {   
                
                $get_user_id = $authentication_data [0]->ID; 
                $get_username = $authentication_data [0]->User_Name;
                $get_email = $authentication_data [0]->Email;
                $get_role = $authentication_data [0]->Role;
                $this->session->set_userdata ( 'loginStatus', TRUE );
                $this->session->set_userdata ( 'userId', $get_user_id );
                $this->session->set_userdata ( 'username', $get_username );
                $this->session->set_userdata ( 'email', $get_email );
                $this->session->set_userdata ( 'userrole', $get_role );

            // Remember username and Password check
            if(!empty($_POST["remember"])) { 

                $EncrPass = $this->encrypt->encode($_POST["password"]); 

                $this->input->set_cookie("member_login",$_POST["email"],time()+ (24 * 60 * 60));
                $this->input->set_cookie("member_pass",$EncrPass,time()+ (24 * 60 * 60));
            } else { 
                if(!is_null(get_cookie('member_login',true))) { 
                    delete_cookie("member_login");
                }
                if(!is_null(get_cookie('member_pass',true))) {  
                    delete_cookie("member_pass");
                }
            }
                //inserting User LOG
                $sessionId = session_id();
                $ipaddress = $_SERVER['REMOTE_ADDR'];
 
                // $this->loginmodel->insertUserLog($sessionId, $get_user_id,$ipaddress);
                redirect ( 'admin' );
            }
            else
            {   
                // clear cookies
                if(!is_null(get_cookie('member_login',true))) { 
                    delete_cookie("member_login");
                }
                if(!is_null(get_cookie('member_pass',true))) {  
                    delete_cookie("member_pass");
                }

                $data ['msg'] = "Incorrect Email or Password!";
                $this->load->view('admin/login',$data);
            }
        }
    }

    public function ClientLogin()
    {   
        $this->form_validation->set_rules ( "email", "Email", 'trim|required|xss_clean' );
        $this->form_validation->set_rules ( "password", "Password", 'required|xss_clean' ); 
        if ($this->form_validation->run () == FALSE)
        {   
            $this->login_form ();
        }
        else
        {  
            $email = $this->db->escape_str ( trim ( $_POST ['email'] ) );
            $password = $this->db->escape_str (  $_POST ['password'] );   
            $authentication_data = $this->loginmodel->check_authentication_client ( $email, $password ); 
            if ($authentication_data != false && sizeof ( $authentication_data ) == 1) {   

                $get_user_id = $authentication_data [0]->ID; 
                $get_username = $authentication_data [0]->User_Name;
                $get_email = $authentication_data [0]->Email;
                $get_role = $authentication_data [0]->Role;
                $this->session->set_userdata ( 'loginStatus', TRUE );
                $this->session->set_userdata ( 'userId', $get_user_id );
                $this->session->set_userdata ( 'username', $get_username );
                $this->session->set_userdata ( 'email', $get_email );
                $this->session->set_userdata ( 'userrole', $get_role );

                // Remember username and Password check
                if(!empty($_POST["remember"])) { 

                    $EncrPass = $this->encrypt->encode($_POST["password"]); 

                    $this->input->set_cookie("member_login",$_POST["email"],time()+ (24 * 60 * 60));
                    $this->input->set_cookie("member_pass",$EncrPass,time()+ (24 * 60 * 60));
                } else { 
                    if(!is_null(get_cookie('member_login',true))) { 
                        delete_cookie("member_login");
                    }
                    if(!is_null(get_cookie('member_pass',true))) {  
                        delete_cookie("member_pass");
                    }
                }
                    //inserting User LOG
                $sessionId = session_id();
                $ipaddress = $_SERVER['REMOTE_ADDR'];
 
                $this->loginmodel->insertUserLog($sessionId, $get_user_id,$ipaddress);
                $this->load->view('reperio/client_home');
            }
            else
            {   
                // clear cookies
                if(!is_null(get_cookie('member_login',true))) { 
                    delete_cookie("member_login");
                }
                if(!is_null(get_cookie('member_pass',true))) {  
                    delete_cookie("member_pass");
                }

                $data ['msg'] = "Incorrect Email or Password!";
                $this->load->view('reperio/client_login',$data);
            }
        }
    }

    public function logoutClient()
    {   
        $sessionId = session_id();
        $loginId = $this->session->userdata('userId');
        if(!empty($sessionId)){
            $this->loginmodel->updateUserLog($sessionId, $loginId);
        }
        $this->session->sess_destroy();
        $data['message'] = "Successfully Logged Out!";
        $this->load->view('reperio/client_login',$data);
    }

    public function EmployeeLogin()
    {   
        $this->form_validation->set_rules ( "email", "Email", 'trim|required|xss_clean' );
        $this->form_validation->set_rules ( "password", "Password", 'required|xss_clean' ); 
        if ($this->form_validation->run () == FALSE)
        {   
            $this->login_form ();
        }
        else
        {  
            $email = $this->db->escape_str ( trim ( $_POST ['email'] ) );
            $password = $this->db->escape_str (  $_POST ['password'] );  
            $authentication_data = $this->loginmodel->check_authentication_employee ( $email, $password );  
            if ($authentication_data != false && sizeof ( $authentication_data ) == 1) {   

                $get_user_id = $authentication_data [0]->ID; 
                $get_username = $authentication_data [0]->User_Name;
                $get_email = $authentication_data [0]->Email;
                $get_role = $authentication_data [0]->Role;
                $this->session->set_userdata ( 'loginStatus', TRUE );
                $this->session->set_userdata ( 'userId', $get_user_id );
                $this->session->set_userdata ( 'username', $get_username );
                $this->session->set_userdata ( 'email', $get_email );
                $this->session->set_userdata ( 'userrole', $get_role );

                // Remember username and Password check
                if(!empty($_POST["remember"])) { 

                    $EncrPass = $this->encrypt->encode($_POST["password"]); 

                    $this->input->set_cookie("member_login",$_POST["email"],time()+ (24 * 60 * 60));
                    $this->input->set_cookie("member_pass",$EncrPass,time()+ (24 * 60 * 60));
                } else { 
                    if(!is_null(get_cookie('member_login',true))) { 
                        delete_cookie("member_login");
                    }
                    if(!is_null(get_cookie('member_pass',true))) {  
                        delete_cookie("member_pass");
                    }
                }
                //inserting User LOG
                $sessionId = session_id();
                $ipaddress = $_SERVER['REMOTE_ADDR'];
 
                $this->loginmodel->insertUserLog($sessionId, $get_user_id,$ipaddress);
                $this->load->view('reperio/employee_home');
            }
            else
            {   
                // clear cookies
                if(!is_null(get_cookie('member_login',true))) { 
                    delete_cookie("member_login");
                }
                if(!is_null(get_cookie('member_pass',true))) {  
                    delete_cookie("member_pass");
                }

                $data ['msg'] = "Incorrect Email or Password!";
                $this->load->view('reperio/employee_login',$data);
            }
        }
    }

    public function logoutEmployee()
    {   
        $sessionId = session_id();
        $loginId = $this->session->userdata('userId');
        if(!empty($sessionId)){
            $this->loginmodel->updateUserLog($sessionId, $loginId);
        }
        $this->session->sess_destroy();
        $data['message'] = "Successfully Logged Out!";
        $this->load->view('reperio/employee_login',$data);
    }
    
    public function logout()
    {   
        $sessionId = session_id();
        $loginId = $this->session->userdata('userId');
        // if(!empty($sessionId)){
        //     $this->loginmodel->updateUserLog($sessionId, $loginId);
        // }
        $this->session->sess_destroy();
        $data['message'] = "Successfully Logged Out!";
        $this->load->view('admin/login',$data);
    }

    public function logoutReperio()
    {   
        $sessionId = session_id();
        $loginId = $this->session->userdata('userId');
        if(!empty($sessionId)){
            $this->loginmodel->updateUserLog($sessionId, $loginId);
        }
        $this->session->sess_destroy();
        $data['message'] = "Successfully Logged Out!";
        redirect(site_url());
    }

    public function forgetPwd_form()
    {
        // Captcha configuration
        // $config = array(
        //     'img_path'      => 'captcha_images/',
        //     'img_url'       => base_url().'captcha_images/',
        //     'font_path'     => 'system/fonts/texb.ttf',
        //     'img_width'     => '250',
        //     'img_height'    => 40,
        //     'word_length'   => 7,
        //     'font_size'     => 22
        // );
        // $captcha = create_captcha($config);
        
        // Unset previous captcha and set new captcha word
        // $this->session->unset_userdata('captchaCode');
        // $this->session->set_userdata('captchaCode', $captcha['word']);
        
        // Pass captcha image to view
        // $data['captchaImg'] = $captcha['image'];

        $data ['msg'] = "";
        $this->load->view('admin/forgetPassword', $data);
    }

    public function refresh(){
        // Captcha configuration
        $config = array(
            'img_path'      => 'captcha_images/',
            'img_url'       => base_url().'captcha_images/',
            'font_path'     => 'system/fonts/texb.ttf',
            'img_width'     => '250',
            'img_height'    => 40,
            'word_length'   => 7,
            'font_size'     => 22
        );
        $captcha = create_captcha($config);
        
        // Unset previous captcha and set new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode',$captcha['word']);
        
        // Display captcha image
        return $captcha['image'];
    }

    public function forgetPassword()
    { 
        $this->form_validation->set_rules ( "emailforget", "Email", 'trim|required|valid_email|xss_clean' );
        // $this->form_validation->set_rules ( "captcha", "Captcha", 'trim|required|xss_clean' );

        if ($this->form_validation->run () == FALSE)
        {
            $this->forgetPwd_form ();
        }
        else
        {
            $email = $this->db->escape_str ( trim ( $_POST ['emailforget'] ) );
            // $inputCaptcha = $this->input->post('captcha');
            // $sessCaptcha = $this->session->userdata('captchaCode'); 
            // if($inputCaptcha === $sessCaptcha){ 
                //    echo 'Captcha code matched.';
                    $authentication_data = $this->loginmodel->check_authentication_mail ($email);  
                if (sizeof ( $authentication_data ) == 1) {  
     
                $UserName =  $authentication_data [0]->User_Name; 
                $uid =  $authentication_data [0]->ID; 
                $result = $this->mailer->adminSendforgetPwd($email,$UserName);
                if($result['code'] == 1){ 
                    $dataResult = $this->database->ResetAdminUserPassword($uid,$result['pwd']);
                    if($dataResult['code'] == 1){ 
                            $data ['message'] = $result['message'];
                            $this->load->view('admin/login',$data);
                        }else{
                            // Pass captcha image to view
                            // $data['captchaImg'] =  $this->refresh();
                            $data ['msg'] = "Server error. Please try again later !!!";
                            $this->load->view('admin/forgetPassword',$data);
                        }
                    }else{
                        // Pass captcha image to view
                        // $data['captchaImg'] =  $this->refresh();
                        $data ['msg'] = "Error in sending Email. Please try again later !";
                        $this->load->view('admin/forgetPassword',$data);
                    }
                }
                else
                {   
                    // Pass captcha image to view
                    // $data['captchaImg'] =  $this->refresh();
                    $data ['msg'] = "Sorry, Email Does Not Exist !";
                    $this->load->view('admin/forgetPassword',$data);
                }
            // }else{               
            //     // Pass captcha image to view
            //     $data['captchaImg'] =  $this->refresh();

            //     $data ['msg'] = 'Captcha code does not match, please try again.';
            //     $this->load->view('admin/forgetPassword', $data);
            // }

        }
    }

    public function resetPasswordEmployee()
    {   
        $this->load->view('reperio/resetPassword.php');
    }

    public function forgetPasswordEmployee()
    {   
        $this->form_validation->set_rules ( "emailforget", "Email", 'trim|required|valid_email|xss_clean' );

        if ($this->form_validation->run () == FALSE)
        {
            $this->resetPasswordEmployee ();
        }
        else
        {
            $email = $this->db->escape_str ( trim ( $_POST ['emailforget'] ) );

                $authentication_data = $this->loginmodel->check_authentication_emp_mail ($email);
                if (sizeof ( $authentication_data ) == 1) {  
     
                $UserName =  $authentication_data [0]->User_Name; 
                $uid =  $authentication_data [0]->ID; 
                $result = $this->mailer->SendUserforgetPwd($email,$UserName);
                if($result['code']){ 
                    $dataResult = $this->database->ResetUserToken($uid,$result['Token']);
                    if($dataResult['code'] == 1){ 
                            $data ['message'] = $result['message'];
                            $this->load->view('reperio/resetPassword',$data);
                        }else{
                            $data ['msg'] = "Server error. Please try again later !!!";
                            $this->load->view('reperio/forgetPassword',$data);
                        }
                    }else{

                        $data ['msg'] = "Error in sending Email. Please try again later !";
                        $this->load->view('reperio/forgetPassword',$data);
                    }
                }
                else
                {   
                    $data ['msg'] = "Sorry, Email Does Not Exist !";
                    $this->load->view('reperio/resetPassword',$data);
                }

        }
    }

    public function user_verification_get()
    {
       $token_code = $this->input->get('token');
       $data1=$this->database->user_verification_token($token_code);
       if($data1)
        {   
            $data['token'] = TRUE;
            $data['token_code'] = $token_code;
        }
        else
        {   
            $data['token'] = FALSE;
            $data['link_error_msg'] = 'Invalid Reset Link.';
        }
        $this->load->view('reperio/passwordResetForm', $data);
    }

    public function ResetNewPassword()
    {   
        $this->form_validation->set_rules ( "token", "Token expired. Please reset password again !!!", 'xss_clean' ); 
        $this->form_validation->set_rules ( "password", "password", 'required|xss_clean' ); 
        $this->form_validation->set_rules ( "password_confirm", "password confirm", 'required|xss_clean' ); 
        if ($this->form_validation->run () == FALSE)
        {   
            $this->user_verification_get ();
        }
        else
        {   
            $token = $this->db->escape_str ( trim ( $_POST ['token'] ) );
            $password = $this->db->escape_str ( trim ( $_POST ['password'] ) );
            $password_confirm = $this->db->escape_str (  $_POST ['password_confirm'] ); 

            if(empty($_POST["token"])) {
                $data['token'] = TRUE;
                $data['token_code'] = '';
                $data ['msg'] = "Sorry, Token has expired. Please reset password again.";
                $this->load->view('reperio/passwordResetForm', $data);
            }elseif( $password != $password_confirm ) {
                $data['token'] = TRUE;
                $data['token_code'] = $token;
                $data ['msg'] = "Password doesn't match wtih confirm password.";
                $this->load->view('reperio/passwordResetForm', $data);
            }
            else{
                $authentication_data = $this->loginmodel->check_authentication_token ($token);  
                if ( sizeof ( $authentication_data ) == 1) {   

                    $user_id = $authentication_data [0]->ID; 
                    $username = $authentication_data [0]->User_Name;

                    $result = $this->loginmodel->resetNewUserPw ($user_id,$password); 
                    if($result['code'] == 1) { 

                        $data['token'] = TRUE;
                        $data['token_code'] = '';
                        $data ['message'] = "Successfully changed password.";
                        $this->load->view('reperio/passwordResetForm', $data);
                    } else { 
                        $data['token'] = TRUE;
                        $data['token_code'] = $token;
                        $data ['msg'] = "Fail to reset. Please try again later.";
                        $this->load->view('reperio/passwordResetForm', $data);
                    }
                }
                else
                {   
                    $data['token'] = TRUE;
                    $data['token_code'] = '';
                    $data ['msg'] = "Sorry, Token has expired. Please reset password again.";
                    $this->load->view('reperio/passwordResetForm', $data);
                }   

            }



            
        }
    }


	
}
