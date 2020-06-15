<?php
class Login_model extends CI_Model
{	
	
	// ================== CHECK USER EXIST OR NOT =========================
	public function check_authentication($email, $passwd)
	{	
		
		$query1 = $this->db->get_where('user_admin', array('Email' => $email,'isActive' => 1)); 
        $querypass = $query1->row_array();  

        if($query1->num_rows() > 0){
        	$hash = $querypass['Password'];
        	// var_dump($hash); var_dump($passwd); 
			if($passwd == $hash){
				$check_user_exist = "SELECT `ID`, `Email`, `User_Name`, `Role` 
								FROM `user_admin` 
								WHERE (`Email`='$email'   AND `Role`='admin' AND `isActive`='1') 
								OR (`User_Name`='$email'   AND `Role`='admin' AND `isActive`='1') ";
				$query = $this->db->query ( $check_user_exist );
				return $query->result ();
			}else{
				return false;
			}
        }else{
				return false;
		}
	}
	// ================== END OF CHECK USER EXIST OR NOT ==================

	// ================== CHECK USER EXIST OR NOT =========================
	public function check_authentication_client($email, $passwd)
	{	
		
		// $query1 = $this->db->get_where('user_admin', array('Email' => $email,'isActive' => 1)); 
		$this->db->select('*')
					        ->from('user_admin')
					        ->where('isActive', 1)
					        ->where('Role', 'client')
					        ->where('Email', $email)
					        ->or_where('User_Name', $email);
        $query1 = $this->db->get();
        $querypass = $query1->row_array();  
        // $password = $passwd;
        if(count($querypass) > 0){
        	$hash = $querypass['Password'];
        	// var_dump($hash); var_dump($passwd); 
			if(password_verify($passwd, $hash)){
				$check_user_exist = "SELECT `ID`, `Email`, `User_Name`, `Role` 
								FROM `user_admin` 
								WHERE (`Email`='$email' AND `Role`='client' AND `isActive`='1') 
								OR (`User_Name`='$email' AND `Role`='client' AND `isActive`='1') ";
				$query = $this->db->query ( $check_user_exist );
				return $query->result ();
			}else{
				return false;
			}
        }else{
				return false;
		}
	}
	// ================== END OF CHECK USER EXIST OR NOT ==================
	
	// ================== CHECK USER EXIST OR NOT =========================
	public function check_authentication_employee($email, $passwd)
	{	
		
		// $query1 = $this->db->get_where('user_admin', array('Email' => $email,'isActive' => 1)); 
		$this->db->select('*')
					        ->from('user_admin')
					        ->where('isActive', 1)
					        ->where('Role', 'employee')
					        ->where('Email', $email)
					        ->or_where('User_Name', $email);
        $query1 = $this->db->get();
        $querypass = $query1->row_array();  
        // $password = $passwd;
        if(count($querypass) > 0){
        	$hash = $querypass['Password'];
        	// var_dump($hash); var_dump($passwd); 
			if(password_verify($passwd, $hash)){
				$check_user_exist = "SELECT `ID`, `Email`, `User_Name`, `Role` 
								FROM `user_admin` 
								WHERE (`Email`='$email' AND `Role`='employee' AND `isActive`='1') 
								OR (`User_Name`='$email' AND `Role`='employee' AND `isActive`='1') ";
				$query = $this->db->query ( $check_user_exist );
				return $query->result ();
			}else{
				return false;
			}
        }else{
				return false;
		}
	}
	// ================== END OF CHECK USER EXIST OR NOT ==================
	// ================== CHECK EMAIL EXIST OR NOT =========================
	public function check_authentication_mail($email)
	{
		$check_email_exist = "SELECT `ID`, `User_Name` FROM `user_admin` WHERE `Email`='$email' AND `Role`='admin' AND `isActive`='1'";
		$query = $this->db->query ( $check_email_exist );	
		return $query->result ();
	}
	// ================== CHECK EMAIL EXIST OR NOT =========================
	public function check_authentication_emp_mail($email)
	{
		$check_email_exist = "SELECT `ID`, `User_Name` FROM `user_admin` WHERE `Email`='$email' AND `isActive`='1'";
		$query = $this->db->query ( $check_email_exist );
		return $query->result ();
	}
	// ================== CHECK EMAIL EXIST OR NOT =========================
	public function check_authentication_token($token)
	{
		$check_email_exist = "SELECT `ID`, `User_Name` FROM `user_admin` WHERE `token`='$token' AND `isActive`='1'";
		$query = $this->db->query ( $check_email_exist );
		return $query->result ();
	}
	// ================== END OF CHECK EMAIL EXIST OR NOT ==================
	function insertUserLog($sessionId, $loginId,$ipadd)
	{
		//check if the session already exists and then insert a record if one doesnt exist
		
		$sql = "SELECT 
					session_id  
				FROM 
					user_log
				WHERE 
					session_id = '$sessionId'";
		
		$query = $this->db->query($sql);
		
		if(sizeof($query->result()) == 1){
			//session already exists
			return;
		}else{
			$sql = "INSERT INTO 
					user_log(session_id,user_admin_id,ip_address,login_time) 
				VALUES 
					('$sessionId','$loginId','$ipadd',now())";
			$query = $this->db->query($sql);
		}
	}
	
	function updateUserLog($sessionId, $loginId)
	{
		$sql = "UPDATE
					user_log
				SET
					logout_time=now()
					
				WHERE
					session_id = '$sessionId'";
		
		$query = $this->db->query($sql);
	}
	private function getSalt() {
	     $charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789/\\][{}\'";:?.>,<!@#$%^&*()-_=+|';
	     $randStringLen = 64;

	     $randString = "";
	     for ($i = 0; $i < $randStringLen; $i++) {
	         $randString .= $charset[mt_rand(0, strlen($charset) - 1)];
	     }

	     return $randString;
	}

	function resetNewUserPw($user_id,$password)
	{ 	

		$options = [
		    'salt' => $this->getSalt(), //write your own code to generate a suitable salt
		    'cost' => 12 // the default cost is 10
		];
		$hash_password = password_hash($password, PASSWORD_DEFAULT, $options);
			
		$sql = "UPDATE `user_admin` SET `Password`='$hash_password',`token`= NULL,`Modified_on`=now() where `ID`='$user_id' AND `isActive`='1'";

		$query = $this->db->query($sql);			
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

}