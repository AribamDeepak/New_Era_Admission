<?php
class Mail_model extends CI_Model{

	protected $senderEmail = 'admin@reperio.in';
	protected $recieverEmail = 'admin@reperio.in';

	function __construct()
    {
    	$this->load->model('Data_model', 'database');
    	

    }

	//SMTP & mail configuration
	// public $config = array(
	//     'protocol'  => 'smtp',
	//     'smtp_host' => 'ssl://smtp.gmail.com',
	//     'smtp_port' => 465,
	//     'smtp_user' => 'dangeryoyo@gmail.com',
	//     'smtp_pass' => 'hawaijargmail  ',
	//     'mailtype'  => 'html',
	//     'charset'   => 'utf-8'
	// );

	

	public function adminSendPwdMail($name,$email,$password) {  
		
        $this->load->helper('string');
		$this->load->library('encrypt');
		$this->load->library('email');
		$this->email->set_mailtype("html");
		// $this->email->initialize($this->config);
		$this->email->set_newline("\r\n");

		//Email content
		$htmlContent = '<h1>Welcome to Reperio Partnership.</h1>';
		$htmlContent .= '<p>Your Username : '. $name .'</p>';
		$htmlContent .= '<p>Your Password : '. $password .'</p>';
		// $htmlContent .= '<p>Please change your password after successfully login.</p>';
		$From_email = $this->senderEmail;
		$this->email->to($email);
		$this->email->from($From_email,'Reperio Administrator');
		$this->email->subject('Reperio Activation Account Details');
		$this->email->message($htmlContent);

		if($this->email->send())
		{	
			$msg = 'Password had been sent to '.$email.' successfully!!!';
			return array('code' => 1, 'message' => $msg, 'pwd' => $password);
		}else
		{
			return array('code' => 0 );
			// echo $this->email->print_debugger();
		}
    }
    public function SendUserforgetPwd($email,$name) {  

    	
        $this->load->helper('string');
		$this->load->library('encrypt');
		$this->load->library('email');
		$this->email->set_mailtype("html");
		$Token = random_string('alnum',20); 

		// $this->email->initialize($this->config);
		$this->email->set_newline("\r\n");
		$url_link = site_url();              
        $msgbody = "
                <div class='card-header' style='padding: 90px;background-color: #f3f3f3;'>
                    <h2 align='center'>Reset new password for Reperio.</h2>
                    <p style='color: #62a2ff;background-color: #ffffff;padding: 40px;text-align: center;margin: 10px;'>
                        Hi ".$name.",
                        
                        
                        Please create a new password by click on the link below.
                        
                        <span style='display: block;text-align: center;margin-top: 50px;'>
                            <a href='".$url_link."index.php/reset_password?token=".$Token."' class='btn  waves-effect' style='background-color: #6295ff;text-decoration: none !important; color: #ffffff;border: 1px solid #6295ff;border-radius: 0px;padding: 5px 27px;'>Click here...</a>
                        </span>
                    </p>
                </div>";

        $htmlContent = '<p>'.$msgbody.'</p>';        
		$To_email = $this->recieverEmail; 
		$From_email = $this->senderEmail;
		$this->email->to($email);
		$this->email->from($From_email,'Reperio Administrator');
		$this->email->subject('Reperio Reset Password Details');
		$this->email->message($htmlContent);

		if($this->email->send())
		{	
			$msg = 'New Password had been sent to '.$email.' !';
			return array('code' => 1, 'message' => $msg, 'Token' => $Token);
		}else
		{
			return array('code' => 0 );
			// echo $this->email->print_debugger();
		}
    }

    public function adminSendforgetPwd($email,$name) {  

        $this->load->helper('string');
		$this->load->library('encrypt');
		$this->load->library('email');
		$this->email->set_mailtype("html");
		$Password = random_string('alnum',5); 

		// $this->email->initialize($this->config);
		$this->email->set_newline("\r\n");

		// $resetURL = '<a href="'.site_url().'index.php/reset_password?token='. $Password .'> Click here to reset your password. </a>';
		//Email content
		$htmlContent = '<h1>Reset Password Reperio .</h1>';
		$htmlContent .= '<p>Your Username : '. $name .'</p>';
		$htmlContent .= '<p>Your Temporary Password : '. $Password .'</p>';
		// $htmlContent .= '<p>'.$resetURL.'<p>';
		$htmlContent .= '<p>Please change your password after successfully login.</p>';

		$To_email = $this->recieverEmail; 
		$From_email = $this->senderEmail;
		$this->email->to($email);
		$this->email->from($From_email,'Reperio Administrator');
		$this->email->subject('Reperio Reset Password Details');
		$this->email->message($htmlContent);

		if($this->email->send())
		{	
			$msg = 'New Password had been sent to '.$email.' !';
			return array('code' => 1, 'message' => $msg, 'pwd' => $Password);
		}else
		{
			return array('code' => 0 );
			// echo $this->email->print_debugger();
		}
    }
    public function adminSendResetPwd($email,$TempPassword) { 
        $this->load->helper('string');
		$this->load->library('encrypt');
		$this->load->library('email');
		$this->email->set_mailtype("html");
		// $TempPassword = random_string('alnum',10); 

		// $this->email->initialize($this->config);
		$this->email->set_newline("\r\n");

		//Email content
		$htmlContent = '<h1>Reperio Password has been changed.</h1>';
		$htmlContent .= '<p>Your Temporary Password : '. $TempPassword .'</p>';
		$htmlContent .= '<p>Please change your password after successfully login.</p>';

		$From_email = $this->senderEmail;
		$this->email->to($email);
		$this->email->from($From_email,'Reperio Administrator');
		$this->email->subject('Reperio Reset Password Details');
		$this->email->message($htmlContent);
		$this->email->send();
    }


    public function sentContactUsMail($fname,$lname,$email,$message) { 

		$this->load->library('email');

		// $this->email->initialize($this->config);
		$this->email->set_newline("\r\n");
		$this->email->set_mailtype("html");
		//Email content
		$htmlContent = '<h1>Reperio Contuct Us.</h1>';
		$htmlContent .= '<p>First Name : '. $fname .'</p>';
		$htmlContent .= '<p>Last Name : '. $lname .'</p>';
		$htmlContent .= '<p>Email  : '. $email .'</p>';
		$htmlContent .= '<p>Message  : '. $message .'</p>';

		$To_email = $this->recieverEmail; 
		
		$this->email->to($To_email);
		$this->email->from($From_email,'Reperio Administrator');
		$this->email->subject('Reperio contact us');
		$this->email->message($htmlContent);
		$this->email->send();
    }

    public function sentSubscribeUsMail($email) { 

		$this->load->library('email');
		$this->email->set_mailtype("html");
		// $this->email->initialize($this->config);
		$this->email->set_newline("\r\n");

		//Email content
		$htmlContent = '<h1>Reperio Subscribe Us.</h1>';
		$htmlContent .= '<p>Subscribe Email  : '. $email .'</p>';

		$To_email = $this->recieverEmail; 
		$From_email = $this->senderEmail;
		$this->email->to($To_email);
		$this->email->from($From_email,'Reperio Administrator');
		$this->email->subject('Reperio Subscribe us');
		$this->email->message($htmlContent);
		$this->email->send();
    }

    public function sentResumeMail($uploadFiles) { 


		$this->load->library('email');
		$this->email->set_mailtype("html");
		// $this->email->initialize($this->config);
		$this->email->set_newline("\r\n");

		$filePath = base_url()."assets/upload/resume/".$uploadFiles;
		//Email content
		$htmlContent = '<h1>Reperio Resume.</h1>';

		$To_email = $this->recieverEmail; 
		$From_email = $this->senderEmail;
		$this->email->to($To_email);
		$this->email->from($From_email,'Reperio Administrator');
		$this->email->subject('Reperio resume');
		$this->email->message($htmlContent);
		$this->email->attach($filePath);
		$this->email->send();
    }

}

