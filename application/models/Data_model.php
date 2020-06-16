<?php
class Data_model extends CI_Model{
	function __construct()
    {
        parent::__construct();
        $this->load->helper('date');
    }
// COMMON CODE Start HERE

	function GetAllActiveRecord($tabName)  
	{   
	    $query = $this->db->order_by('ID', 'DESC')->get_where($tabName, array('isActive' => 1)); 
	    return $query->result_array();  
	} 
	function GetAllRecord($tabName)  
	{   
	    $query = $this->db->order_by('ID', 'DESC')->get($tabName); 
	    return $query->result_array();  
	} 

	function GetAllActiveRecordLimit($limit, $tabName)  
	{   
	    $query = $this->db->limit($limit)->get_where($tabName, array('isActive' => 1)); 
	    return $query->result_array();  
	} 
	function GetRecordById($id,$tabName)  
      {  
         $query = $this->db->get_where($tabName, array('ID' => $id,'isActive' => 1)); 
         return $query->result_array();  
      }
    function GetAllRecordById($id,$tabName)  
      {  
         $query = $this->db->get_where($tabName, array('ID' => $id)); 
         return $query->result_array();  
      }  

    function GetSingleRecordById($id,$tabName)  
      {  
         $query = $this->db->get_where($tabName, array('ID' => $id,'isActive' => 1)); 
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

    function user_verification_token($token)  
    {  
        $query = $this->db->get_where('user_admin', array('token' => $token, 'isActive' => 1)); 
        $result = $query->row_array();         
         
        if (!empty($result)) {
		    $result = TRUE;
		} else {
		    $result = FALSE;
		}
		return $result;	
    }  

	function enableSolution($dataId,$tblName)
	{ 
			$this->db->set('isActive', '1');  //Set the column name and which value to set..
			$this->db->where('ID', $dataId); //set column_name and value in which row need to update
			$this->db->update($tblName); //Set your table name
	}

	function RemoveRecordById($ArrIds,$tblName)
	{ 
		foreach ($ArrIds as $id){ 
			$this->db->set('isActive', '0');  //Set the column name and which value to set..
			$this->db->where('ID', $id); //set column_name and value in which row need to update
			$this->db->update($tblName); //Set your table name
		}
	}

	function RemoveTestimonialImage($Id,$tblName)
	{ 
		$this->db->set('img_url', NULL);  
		$this->db->where('ID', $Id); 
		$this->db->update($tblName);
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
	function updateActiveTableData($id,$text,$colName,$tblName)
	{ 
		$id = $this->db->escape_str($id);
		$text = $this->db->escape_str($text);
		$colName = $this->db->escape_str($colName);
		$sql = "UPDATE `$tblName` SET `$colName`='$text',`Modified_on`=now() where `ID`='$id'";
		$query = $this->db->query($sql);
		
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}
	function checkMailExist($email)
	{ 		
		$email = $this->db->escape_str($email);
		$check_email_exist = "SELECT `Email` FROM `user_admin` WHERE `Email`='$email' AND `isActive`='1';";
		$query = $this->db->query ( $check_email_exist );
		$mail_result = $query->result ();
		if (sizeof ( $mail_result ) == 1) {  
             return array('code' => 0);
		}else
		{
			return array('code' => 1);
		}
	}

	// COMMON CODE END HERE

	function addAdminUser($name,$email,$team,$passwd,$wave)
	{ 		
		$name = $this->db->escape_str($name);
		$email = $this->db->escape_str($email);
		$team = $this->db->escape_str($team);
		$password = $this->db->escape_str($passwd);
		$wave = $this->db->escape_str($wave);

		$options = [
		    'salt' => $this->getSalt(), //write your own code to generate a suitable salt
		    'cost' => 12 // the default cost is 10
		];
		$hash_password = password_hash($password, PASSWORD_DEFAULT, $options);

		$sql = "INSERT INTO user_admin (User_Name,Email,Password,Role,wave,team,Added_on,isActive) 
		VALUES ('$name','$email','$hash_password','employee','$wave','$team',now(),'1')";
		$query = $this->db->query($sql);

		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function updateEmpUser($id,$email,$uname,$password,$team)
	{ 
		if($password == ""){
			$id = $this->db->escape_str($id);
			$email = $this->db->escape_str($email);
			$uname = $this->db->escape_str($uname);
			$team = $this->db->escape_str($team);

			$sql = "UPDATE `user_admin` SET `User_Name`='$uname',`Email`='$email',`team`='$team',`Modified_on`=now() where `ID`='$id'";
		}elseif($password != ""){
			$id = $this->db->escape_str($id);
			$email = $this->db->escape_str($email);
			$uname = $this->db->escape_str($uname);
			$team = $this->db->escape_str($team);
			$password = $this->db->escape_str($password);

			$options = [
		    'salt' => $this->getSalt(), //write your own code to generate a suitable salt
		    'cost' => 12 // the default cost is 10
			];
			$hash_password = password_hash($password, PASSWORD_DEFAULT, $options);

			$sql = "UPDATE `user_admin` SET `User_Name`='$uname',`Email`='$email',`Password`='$hash_password',`team`='$team',`Modified_on`=now() where `ID`='$id'";
		}	

		$query = $this->db->query($sql);			
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}	

	function addClientUser($name,$email,$passwd)
	{ 		
		$name = $this->db->escape_str($name);
		$email = $this->db->escape_str($email);
		$password = $this->db->escape_str($passwd);

		$options = [
		    'salt' => $this->getSalt(), //write your own code to generate a suitable salt
		    'cost' => 12 // the default cost is 10
		];
		$hash_password = password_hash($password, PASSWORD_DEFAULT, $options);

		// $pwd = md5($passwd.'w2w@w2w#w2w'); 
		$sql = "INSERT INTO user_admin (User_Name,Email,Password,Role,Added_on,isActive) 
		VALUES ('$name','$email','$hash_password','client',now(),'1')";
		$query = $this->db->query($sql);

		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function updateClientUser($id,$email,$uname,$password)
	{ 
		if($password == ""){
			$id = $this->db->escape_str($id);
			$email = $this->db->escape_str($email);
			$uname = $this->db->escape_str($uname);

			$sql = "UPDATE `user_admin` SET `User_Name`='$uname',`Email`='$email',`Modified_on`=now() where `ID`='$id'";
		}elseif($password != ""){
			$id = $this->db->escape_str($id);
			$email = $this->db->escape_str($email);
			$uname = $this->db->escape_str($uname);
			$password = $this->db->escape_str($password);

			$options = [
		    'salt' => $this->getSalt(), //write your own code to generate a suitable salt
		    'cost' => 12 // the default cost is 10
			];
			$hash_password = password_hash($password, PASSWORD_DEFAULT, $options);

			$sql = "UPDATE `user_admin` SET `User_Name`='$uname',`Email`='$email',`Password`='$hash_password',`Modified_on`=now() where `ID`='$id'";
		}	

		$query = $this->db->query($sql);			
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function GetAllActiveEmpUser()  
	{  
	    $this->db->select('ID,User_Name')
         ->from('user_admin')
         ->where('isActive', 1)
         ->where('Role', 'employee');
		$query = $this->db->get();
		return $query->result_array();  
	} 

	function addJob($job_id,$job_name,$client_name,$wave,$startDate,$pm,$deliverable,$dp_contact1,$dp_contact2,$dp_contact3,$dp_contact4,$comment)
	{ 		
		$job_id = $this->db->escape_str($job_id);
		$job_name = $this->db->escape_str($job_name);
		$client_name = $this->db->escape_str($client_name);
		$wave = $this->db->escape_str($wave);
		$startDate = $this->db->escape_str($startDate);
		$pm = $this->db->escape_str($pm);
		$deliverable = $this->db->escape_str($deliverable);
		$dp_contact1 = $this->db->escape_str($dp_contact1);
		$dp_contact2 = $this->db->escape_str($dp_contact2);
		$dp_contact3 = $this->db->escape_str($dp_contact3);
		$dp_contact4 = $this->db->escape_str($dp_contact4);
		$comment = $this->db->escape_str($comment);

		$sql = "INSERT INTO job (job_id,name,client,wave,date_started,pm,deliverable,dp_contact1,dp_contact2,dp_contact3,dp_contact4,comment,Added_on,isActive) 
		VALUES ('$job_id','$job_name','$client_name','$wave','$startDate','$pm','$deliverable','$dp_contact1','$dp_contact2','$dp_contact3','$dp_contact4','$comment',now(),'1')";
		$query = $this->db->query($sql);

		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function updateJob($job_id_prim,$job_id,$job_name,$client_name,$wave,$startDate,$pm,$deliverable,$dp_contact1,$dp_contact2,$dp_contact3,$dp_contact4,$comment)
	{ 
		$job_id = $this->db->escape_str($job_id);
		$job_name = $this->db->escape_str($job_name);
		$client_name = $this->db->escape_str($client_name);
		$wave = $this->db->escape_str($wave);
		$startDate = $this->db->escape_str($startDate);
		$pm = $this->db->escape_str($pm);
		$deliverable = $this->db->escape_str($deliverable);
		$dp_contact1 = $this->db->escape_str($dp_contact1);
		$dp_contact2 = $this->db->escape_str($dp_contact2);
		$dp_contact3 = $this->db->escape_str($dp_contact3);
		$dp_contact4 = $this->db->escape_str($dp_contact4);
		$comment = $this->db->escape_str($comment);

		$sql = "UPDATE `job` SET 
								`job_id`='$job_id',
								`name`='$job_name',
								`client`='$client_name',
								`wave`='$wave',
								`date_started`='$startDate',
								`pm`='$pm',
								`deliverable`='$deliverable',
								`dp_contact1`='$dp_contact1',
								`dp_contact2`='$dp_contact2',
								`dp_contact3`='$dp_contact3',
								`dp_contact4`='$dp_contact4',
								`comment`='$comment',
								`Modified_on`=now() 
								where `ID`='$job_id_prim'";

		$query = $this->db->query($sql);			
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function resetAdminUserPw($email,$newPw)
	{ 	
		$email = $this->db->escape_str($email);
		// $password = $this->db->escape_str($newPw);

		// $options = [
		//     'salt' => $this->getSalt(), //write your own code to generate a suitable salt
		//     'cost' => 12 // the default cost is 10
		// ];
		// $hash_password = password_hash($password, PASSWORD_DEFAULT, $options);
		$hash_password = $newPw;	
		$sql = "UPDATE `user_admin` SET `Password`='$hash_password',`Modified_on`=now() where `Email`='$email' AND `isActive`='1'";

		$query = $this->db->query($sql);			
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function sentContactUs($fname,$lname,$email,$message)
	{ 	
		$fname = $this->db->escape_str($fname);
		$lname = $this->db->escape_str($lname);
		$email = $this->db->escape_str($email);
		$message = $this->db->escape_str($message);
			
		$sql = "INSERT INTO contact_us (fname,lname,email,message,added_on,isActive) 
		VALUES ('$fname','$lname','$email','$message',now(),'1')";

		$query = $this->db->query($sql);			
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function sentSubscribeUs($email)
	{ 	
		$email = $this->db->escape_str($email);
			
		$sql = "INSERT INTO subscribe (email,added_on,isActive) 
		VALUES ('$email',now(),'1')";

		$query = $this->db->query($sql);			
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function GetCountRecord($tabName)  
	{   
	    $query = $this->db->get_where($tabName, array('isActive' => TRUE)); 
	    return $query->num_rows();
	} 
	function GetCountActiveUsers($tabName,$roleType)  
	{   
	    $query = $this->db->get_where($tabName, array('isActive' => TRUE, 'Role' => $roleType)); 
	    return $query->num_rows();
	} 

	function LoadDashboardData()  
    {   
    	$empCount = $this->GetCountActiveUsers('user_admin','employee');
    	$jobCount = $this->GetCountRecord('job');
    	$clientCount = $this->GetCountActiveUsers('user_admin','client');

    	$resultArr = array('empCount' => $empCount, 'clientCount' => $clientCount, 'jobCount' => $jobCount);
        return $resultArr; 
    } 

    function loadEmployeeJob($EId)  
    {  
        $this->db->select('*');
        $this->db->from('job');
        $this->db->where('isActive', 1);

        $this->db->group_start();
        $this->db->where('dp_contact1', $EId);
        $this->db->or_where('dp_contact2', $EId);
        $this->db->or_where('dp_contact3', $EId);
        $this->db->or_where('dp_contact4', $EId);
        $this->db->group_end();

        $this->db->group_by('ID');
        $this->db->order_by('ID', 'DESC');
        $query1 = $this->db->get();
        return $query1->result_array(); 
    }

    function addTestimonial($name,$star,$Date,$comment,$fileName)
	{ 		
		$name = $this->db->escape_str($name);
		$star = $this->db->escape_str($star);
		$Date = $this->db->escape_str($Date);
		$comment = $this->db->escape_str($comment);
		$fileName = $this->db->escape_str($fileName);

		if($fileName != ''){
			$imageUrl = base_url()."assets/upload/testimonailPicture/".$fileName;
		}else{
			$imageUrl = '';
		}
			
		$sql = "INSERT INTO testimonial (name,star,comment,img_url,testi_date,isActive) 
		VALUES ('$name','$star','$comment','$imageUrl','$Date','1')";
		$query = $this->db->query($sql);		
		if($query)
		{
			return array('code' => 1);
			
		}else
		{
			return array('code' => 0);
		}
	}

	function updateTestimonial($testi_id,$name,$star,$Date,$comment,$fileName)
	{ 
		$testi_id = $this->db->escape_str($testi_id);
		$name = $this->db->escape_str($name);
		$star = $this->db->escape_str($star);
		$Date = $this->db->escape_str($Date);
		$comment = $this->db->escape_str($comment);
		$fileName = $this->db->escape_str($fileName);

		if($fileName == ''){
			$sql = "UPDATE `testimonial` SET `name`='$name',`star`='$star',`testi_date`='$Date',`comment`='$comment',`img_url`='' where `ID`='$testi_id'";
		}else{
			$imageUrl = base_url()."assets/upload/testimonailPicture/".$fileName;
			$sql = "UPDATE `testimonial` SET `name`='$name',`star`='$star',`testi_date`='$Date',`comment`='$comment',`img_url`='$imageUrl' where `ID`='$testi_id'";
		}
		

		$query = $this->db->query($sql);			
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function updateAboutUs($about,$about2,$mission,$fileName)
	{ 
		// $about = $this->db->escape_str($about);
		// $mission = $this->db->escape_str($mission);
		$fileName = $this->db->escape_str($fileName);

		if($fileName == ''){
			$sql = "UPDATE `about_us` SET `about_message`='$about',`about_message2`='$about2',`mission_message`='$mission' where `ID`='1' ";
		}else{
			$imageUrl = base_url()."assets/upload/aboutUs/".$fileName;
			$sql = "UPDATE `about_us` SET `about_message`='$about',`about_message2`='$about2',`mission_message`='$mission',`about_image`='$imageUrl' where `ID`='1' ";
		}
		
		$query = $this->db->query($sql);			
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function addGallery($title,$fileName)
	{ 		
		$title = $this->db->escape_str($title);
		$fileName = $this->db->escape_str($fileName);
		$imageUrl = base_url()."assets/upload/gallery/".$fileName;	
		$sql = "INSERT INTO gallery (img_title,img_url,isActive) 
		VALUES ('$title','$imageUrl','1')";
		$query = $this->db->query($sql);		
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function updateGallery($gallery_id,$title,$fileName)
	{ 
		$gallery_id = $this->db->escape_str($gallery_id);
		$title = $this->db->escape_str($title);
		$fileName = $this->db->escape_str($fileName);

		if($fileName == ''){
			$sql = "UPDATE `gallery` SET `img_title`='$title' where `ID`='$gallery_id'";
		}else{
			$imageUrl = base_url()."assets/upload/gallery/".$fileName;
			$sql = "UPDATE `gallery` SET `img_title`='$title',`img_url`='$imageUrl' where `ID`='$gallery_id'";
		}
		

		$query = $this->db->query($sql);			
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function addSolution($heading,$subheading,$desc,$uploadFiles)
	{ 		
		$heading = $this->db->escape_str($heading);
		$subheading = $this->db->escape_str($subheading);
		$desc = $this->db->escape_str($desc);
		// $fileName = $this->db->escape_str($fileName);
		$imageUrl = base_url()."assets/upload/solution/".$uploadFiles['file_name'];	
		$sql = "INSERT INTO solution (title,subTitle,description,img_url,isActive) 
		VALUES ('$heading','$subheading','$desc','$imageUrl','1')";
		$query = $this->db->query($sql);		
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function updateSolution($solution_id,$heading,$subheading,$desc,$fileName)
	{ 
		$testi_id = $this->db->escape_str($solution_id);
		$heading = $this->db->escape_str($heading);
		$subheading = $this->db->escape_str($subheading);
		$desc = $this->db->escape_str($desc);
		$fileName = $this->db->escape_str($fileName);

		if($fileName == ''){
			$sql = "UPDATE `solution` SET `title`='$heading',`subTitle`='$subheading',`description`='$desc' where `ID`='$solution_id'";
		}else{
			$imageUrl = base_url()."assets/upload/solution/".$fileName;
			$sql = "UPDATE `solution` SET `title`='$heading',`subTitle`='$subheading',`description`='$desc',`img_url`='$imageUrl' where `ID`='$solution_id'";
		}
		

		$query = $this->db->query($sql);			
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function addHome($heading,$subheading,$desc,$uploadFiles)
	{ 		
		$heading = $this->db->escape_str($heading);
		$subheading = $this->db->escape_str($subheading);
		$desc = $this->db->escape_str($desc);
		// $fileName = $this->db->escape_str($fileName);
		$imageUrl = base_url()."assets/upload/home/".$uploadFiles['file_name'];	
		$sql = "INSERT INTO home (heading1, heading2, description, img_url, isActive) 
		VALUES ('$heading','$subheading','$desc','$imageUrl','1')";
		$query = $this->db->query($sql);		
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function updateHome($home_id,$heading,$subheading,$desc,$fileName)
	{ 
		$home_id = $this->db->escape_str($home_id);
		$heading = $this->db->escape_str($heading);
		$subheading = $this->db->escape_str($subheading);
		$desc = $this->db->escape_str($desc);
		$fileName = $this->db->escape_str($fileName);

		if($fileName == ''){
			$sql = "UPDATE `home` SET `heading1`='$heading',`heading2`='$subheading',`description`='$desc' where `ID`='$home_id'";
		}else{
			$imageUrl = base_url()."assets/upload/home/".$fileName;
			$sql = "UPDATE `home` SET `heading1`='$heading',`heading2`='$subheading',`description`='$desc',`img_url`='$imageUrl' where `ID`='$home_id'";
		}
		

		$query = $this->db->query($sql);			
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function addJobList($job_title,$job_loc,$keySkill,$exp)
	{ 		
		$job_title = $this->db->escape_str($job_title);
		$job_loc = $this->db->escape_str($job_loc);
		$keySkill = $this->db->escape_str($keySkill);
		$exp = $this->db->escape_str($exp);

		$sql = "INSERT INTO job_list (title,location,keyset,experience,isActive) 
		VALUES ('$job_title','$job_loc','$keySkill','$exp','1')";
		$query = $this->db->query($sql);

		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function updateJobList($job_list_id,$job_title,$job_loc,$keySkill,$exp)
	{ 
		$job_list_id = $this->db->escape_str($job_list_id);
		$job_title = $this->db->escape_str($job_title);
		$job_loc = $this->db->escape_str($job_loc);
		$keySkill = $this->db->escape_str($keySkill);
		$exp = $this->db->escape_str($exp);

		$sql = "UPDATE `job_list` SET 
								`title`='$job_title',
								`location`='$job_loc',
								`keyset`='$keySkill',
								`experience`='$exp'
								where `ID`='$job_list_id' ";

		$query = $this->db->query($sql);			
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function updateCareer($career_title,$career_desc)
	{ 
		$career_title = $this->db->escape_str($career_title);
		$career_desc = $this->db->escape_str($career_desc);

		$sql = "UPDATE `career` SET `title`='$career_title',`desc`='$career_desc' where `ID`='1' ";
		
		$query = $this->db->query($sql);			
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function addResume($uploadFiles)
	{ 		
		$imageUrl = base_url()."assets/upload/resume/".$uploadFiles;	
		$sql = "INSERT INTO resume (file_path, upload_date, fileName, isActive) 
		VALUES ('$imageUrl',now(),'$uploadFiles','1')";
		$query = $this->db->query($sql);		
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function TruncateData($tableName)
	{
		$result = $this->db->truncate($tableName); 
		if($result){
		       $test = TRUE;
		    }else{
		        $test = FALSE;
		    }
		return $test;
		
	}

	function insertData($data,$tableName)
	{
		$insert = $this->db->insert_batch($tableName, $data);
		if($insert > 0){
		       $test = TRUE;
		    }else{
		        $test = FALSE;
		    }
		return $test;
	}





































////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	function addMasterCat($name,$desc)
	{ 	
		$name = $this->db->escape_str($name);
		$desc = $this->db->escape_str($desc);

			$sql = "INSERT INTO category_master (Name,Description,Added_on,isActive) 
			VALUES ($name,$desc,now(),'1')";
			$query = $this->db->query($sql);		
		if($query)
		{
			return array('code' => 1);
			
		}else
		{
			return array('code' => 0);
		}
	}
	function updateMasterCat($id,$name,$desc)
	{ 	
		$id = $this->db->escape_str($id);
		$name = $this->db->escape_str($name);
		$desc = $this->db->escape_str($desc);

		$sql = "UPDATE `category_master` SET `Name`='$name',`Description`='$desc',`Modified_on`=now() where `ID`='$id'";
		$query = $this->db->query($sql);
		
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}
	
	function SearchMasterCatChildByIds($ArrIds,$tblName)
	{   $counter = 0;
		foreach ($ArrIds as $id){ 
			$query = $this->db->get_where($tblName, array('Category_master_Id' => $id,'isActive' => 1));
			If($query->row_array()){
				$counter++;
			}	 
		}
		foreach ($ArrIds as $id){ 
			$query = $this->db->get_where('item', array('Category_master_Id' => $id,'isActive' => 1));
			If($query->row_array()){
				$counter++;
			}	 
		}
		return $counter;
	}

	function GetAllActiveCategoryRecord()  
	{  
	    $this->db->select('category.ID as ID,category.Code as Code,category.Description as Description,category.Status as Status,category.Photo as Photo,category_master.Name as Name')
         ->from('category')
         ->join('category_master', 'category.Category_master_Id = category_master.ID')
         ->where('category.isActive', 1);
		$query = $this->db->get();
		return $query->result_array();  
	} 


	function addCat($masterCat,$catId,$desc,$status,$pic)
	{ 	
		$masterCat = $this->db->escape_str($masterCat);
		$catId = $this->db->escape_str($catId);
		$desc = $this->db->escape_str($desc);
		$status = $this->db->escape_str($status);

			$sql = "INSERT INTO category (Category_master_Id,Code,Description,Status,Photo,Added_on,isActive) 
			VALUES ('$masterCat','$catId','$desc','$status','$pic',now(),'1')";
			$query = $this->db->query($sql);		
		if($query)
		{
			return array('code' => 1);
			
		}else
		{
			return array('code' => 0);
			//$this->session->set_userdata('sqlstatus', 'fail');
		}
	}
	function updateCat($id,$Mcat,$catId,$desc,$status,$pic)
	{ 
		$id = $this->db->escape_str($id);
		$Mcat = $this->db->escape_str($Mcat);
		$catId = $this->db->escape_str($catId);
		$desc = $this->db->escape_str($desc);
		$status = $this->db->escape_str($status);

		if($pic == ''){
			$sql = "UPDATE `category` SET `Category_master_Id`='$Mcat',`Code`='$catId',`Description`='$desc',`Status`='$status',`Modified_on`=now() where `ID`='$id'";
		}else{
			$sql = "UPDATE `category` SET `Category_master_Id`='$Mcat',`Code`='$catId',`Description`='$desc',`Status`='$status',`Photo`='$pic',`Modified_on`=now() where `ID`='$id'";	
		}
		$query = $this->db->query($sql);			
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function SearchCatChildByIds($ArrIds,$tblName)
	{   $counter = 0;
		foreach ($ArrIds as $id){ 
			$query = $this->db->get_where($tblName, array('Category_id' => $id,'isActive' => 1));
			If($query->row_array()){
				$counter++;
			}	 
		}
		return $counter;
	}

	function DeleteImageFileCat($id,$tblName,$fieldName)
        { 
            $id = $this->db->escape_str($id);
        	$this->db->select($fieldName)
			         ->from($tblName)
			         ->where('ID', $id);
			$query = $this->db->get();
			$ResultRow =  $query->row_array();  
			$ImageName = $ResultRow[$fieldName]; //echo $ImageName; die();

			if(file_exists("assets/upload/categoryPicture/".$ImageName))
            unlink("assets/upload/categoryPicture/".$ImageName);
            
        }
	
	function addVen($name,$add,$pin,$mob)
	{ 		
		$name = $this->db->escape_str($name);
		$add = $this->db->escape_str($add);
		$pin = $this->db->escape_str($pin);
		$mob = $this->db->escape_str($mob);

			$sql = "INSERT INTO vendor (Name,About,Pincode,Mobile,Added_on,isActive) 
			VALUES ('$name','$add','$pin','$mob',now(),'1')";
			$query = $this->db->query($sql);		
		if($query)
		{
			return array('code' => 1);
			
		}else
		{
			return array('code' => 0);
			//$this->session->set_userdata('sqlstatus', 'fail');
		}
	}
	function updateVen($id,$name,$add,$pin,$mob)
	{ 	
		$id = $this->db->escape_str($id);
		$name = $this->db->escape_str($name);
		$add = $this->db->escape_str($add);
		$pin = $this->db->escape_str($pin);
		$mob = $this->db->escape_str($mob);

			$sql = "UPDATE `vendor` SET `Name`='$name',`About`='$add',`Pincode`='$pin',`Mobile`='$mob',`Modified_on`=now() where `ID`='$id'";
			$query = $this->db->query($sql);		
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}


	function addShip($pin,$time,$rate)
	{ 
		$pin = $this->db->escape_str($pin);
		$time = $this->db->escape_str($time);
		$rate = $this->db->escape_str($rate);

			$sql = "INSERT INTO shipping (Pincode,Time,Rate,Added_on,isActive) 
			VALUES ($pin,$time,$rate,now(),'1')";
			$query = $this->db->query($sql);		
		if($query)
		{
			return array('code' => 1);
			
		}else
		{
			return array('code' => 0);
		}
	}
	function updateShip($id,$pin,$time,$rate)
	{ 
		$id = $this->db->escape_str($id);
		$pin = $this->db->escape_str($pin);
		$time = $this->db->escape_str($time);
		$rate = $this->db->escape_str($rate);

			$sql = "UPDATE `shipping` SET `Pincode`='$pin',`Time`='$time',`Rate`='$rate',`Modified_on`=now() where `ID`='$id'";
			$query = $this->db->query($sql);		
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}
	function SearchVendorChildByIds($ArrIds,$tblName)
	{   $counter = 0;
		foreach ($ArrIds as $id){ 
			$query = $this->db->get_where($tblName, array('Vendor_id' => $id,'isActive' => 1));
			If($query->row_array()){
				$counter++;
			}	 
		}
		return $counter;
	}

	function GetCategoryRecordByMasCadId($id,$tabName)  
      {  
      	$id = $this->db->escape_str($id);
         $query = $this->db->get_where($tabName, array('Category_master_Id' => $id,'isActive' => 1)); 
         return $query->result_array();  
      }

    function addItem($cat,$vend,$code,$title,$desc,$stock,$deliv,$handle,$type,$duration,$minOrder,$ship)
	{ 	
		$cat = $this->db->escape_str($cat);
		$vend = $this->db->escape_str($vend);
		$code = $this->db->escape_str($code);
		$title = $this->db->escape_str($title);
		$desc = $this->db->escape_str($desc);
		$stock = $this->db->escape_str($stock);
		$deliv = $this->db->escape_str($deliv);
		$handle = $this->db->escape_str($handle);
		$type = $this->db->escape_str($type);
		$duration = $this->db->escape_str($duration);
		$minOrder = $this->db->escape_str($minOrder);
		$ship = $this->db->escape_str($ship);

		$this->load->helper('date');
		$this->db->trans_begin();
			$this->db->select('Category_master_Id')
			         ->from('category')
			         ->where('ID', $cat);
			$query1 = $this->db->get();
			$MasterCat =  $query1->row_array();  
			$CatMaster = $MasterCat['Category_master_Id']; 

			$date = new \Datetime('now');
			$data = array( 
				        'Code'	=>  $code , 
				        'Title'=>  $title, 
				        'Category_master_id'=>  $CatMaster,
				        'Category_id'=>  $cat,
				        'Vendor_id'=>  $vend,
				        'Description'=>  $desc,
				        'Item_stock'=>  $stock,
				        'Delivery_Time'=>  $deliv,
				        'Handling_Charge'=>  $handle,
				        'Item_type'=>  $type,
				        'Duration'=>  $duration,
				        'Min_Order'=>  $minOrder,
				        'Shipping'=>  $ship,
				        'isPublish'=>  '0',
				        'Added_on'=>  date('Y-m-d H:i:s',now()),
				        'isActive'=>  '1'
			    	);
			$this->db->insert('item', $data);


			$last_id = $this->db->insert_id();  
    				
		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    return array('code' => 0);
		}
		else
		{	
	        $this->db->trans_commit();
	        return array('code' => 1, 'id' => $last_id);
		}
	}  

	function updateItem($id,$cat,$vend,$code,$title,$desc,$stock,$deliv,$handl,$type,$duration,$minOrder,$ship)
	{ 		
		$id = $this->db->escape_str($id);
		$cat = $this->db->escape_str($cat);
		$vend = $this->db->escape_str($vend);
		$code = $this->db->escape_str($code);
		$title = $this->db->escape_str($title);
		$desc = $this->db->escape_str($desc);
		$stock = $this->db->escape_str($stock);
		$deliv = $this->db->escape_str($deliv);
		$handle = $this->db->escape_str($handle);
		$type = $this->db->escape_str($type);
		$duration = $this->db->escape_str($duration);
		$minOrder = $this->db->escape_str($minOrder);
		$ship = $this->db->escape_str($ship);

		$this->db->trans_begin();
			$this->db->select('Category_master_Id')
			         ->from('category')
			         ->where('ID', $cat);
			$query1 = $this->db->get();
			$MasterCat =  $query1->row_array();  
			$CatMaster = $MasterCat['Category_master_Id'];

			$sql = "UPDATE `item` SET `Code`='$code',`Title`='$title',`Category_master_id`='$CatMaster',`Category_id`='$cat',`Vendor_id`='$vend',`Description`='$desc',`Item_stock`='$stock',`Delivery_Time`='$deliv',`Handling_Charge`='$handl',`Item_type`='$type',`Duration`='$duration',`Min_Order`='$minOrder',`Shipping`='$ship',`Modified_on`=now() where `ID`='$id'";
			$query = $this->db->query($sql);
		
		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    return array('code' => 0);
		}
		else
		{	
	        $this->db->trans_commit();
	        return array('code' => 1);
		}
	}

	function SetPublishItem($id,$val)
	{ 		
		$id = $this->db->escape_str($id);
		$val = $this->db->escape_str($val);

			$sql = "UPDATE `item` SET `isPublish`='$val' where `ID`='$id'";
			$query = $this->db->query($sql);
		
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function SearItemIsPublishByIds($ArrIds,$tblName)
	{   
		$counter = 0;
		foreach ($ArrIds as $id){ 
			$query = $this->db->get_where($tblName, array('ID' => $id,'isPublish' => 1,'isActive' => 1));
			If($query->row_array()){
				$counter++;
			}	 
		}	
		return $counter;
	}

	function GetAllActiveItemDetailRecord($itemId)  
	{  
		$itemId = $this->db->escape_str($itemId);
	    $this->db->select('item.Title as itemTitle,item_details.ID as ID,item_details.Title as ItemDetaTitle,item_details.Description as ItemDetaDesc')
         ->from('item_details')
         ->join('item', 'item_details.Item_id = item.ID')
         ->where(array('item_details.isActive' => 1, 'item_details.Item_id' => $itemId ));
		$query = $this->db->get();
		return $query->result_array();  
	} 
	function GetdetailRecordByItemId($itemId)  
	{  
		$itemId = $this->db->escape_str($itemId);
	    $this->db->select('*')
         ->from('item_details')
         ->where(array('item_details.isActive' => 1, 'item_details.Item_id' => $itemId ));
		$query = $this->db->get();
		return $query->result_array();  
	} 
	function addItemDetail($itemId,$title,$desc)
	{ 	
		$itemId = $this->db->escape_str($itemId);
		$title = $this->db->escape_str($title);
		$desc = $this->db->escape_str($desc);
		$sql = "INSERT INTO item_details (Item_id,Title,Description,Added_on,isActive) 
		VALUES ('$itemId','$title','$desc',now(),'1')";
		$query = $this->db->query($sql);	
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}  

	function updateItemDetail($id,$title,$desc)
	{ 		
		$id = $this->db->escape_str($id);
		$title = $this->db->escape_str($title);
		$desc = $this->db->escape_str($desc);

		$sql = "UPDATE `item_details` SET `Title`='$title',`Description`='$desc',`Modified_on`=now() where `ID`='$id'";
		$query = $this->db->query($sql);
		
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}
	function SearchItemChildByIds($id,$tblName1,$tblName2,$tblName3)
	{   
		$id = $this->db->escape_str($id);

		$msgError ='';
		$counter = 0;
		$counter1 = 0;
		$counter2 = 0;
		$counter3 = 0;

			$query1 = $this->db->get_where($tblName1, array('Item_id' => $id,'isActive' => 1));
			If($query1->result_array()){
				$counter1 = count($query1->result_array());
			}	
			$query2 = $this->db->get_where($tblName2, array('Item_id' => $id,'isActive' => 1));
			If($query2->result_array()){
				$counter2 = count($query2->result_array());
			}
			$query3 = $this->db->get_where($tblName3, array('Item_id' => $id,'isActive' => 1));
			If($query3->result_array()){
				$counter3 = count($query3->result_array());
			}

			if($counter1 == 0){
				$msgError = 'Please Add Item Details to publish';
			}	
			elseif($counter2 == 0){
				$msgError .= ' Please Add Item Price to publish';
			}
			elseif($counter3 == 0){
				$msgError .= ' Please Add Item Image to publish';
			}	
 
			
		if(empty($msgError)){
			$counter = $counter1 + $counter2 + $counter3;
		}

		return array('num' =>$counter, 'message'=> $msgError);
	}

	function GetAllActiveItemPriceRecord($itemId)  
	{  
		$itemId = $this->db->escape_str($itemId);
	    $this->db->select('item.Title as itemTitle,item_price.ID as ID,item_price.Price as Price,item_price.isCurrent as isCurrent')
         ->from('item_price')
         ->join('item', 'item_price.Item_id = item.ID')
         ->where(array('item_price.isActive' => 1, 'item_price.Item_id' => $itemId ));
		$query = $this->db->get();
		return $query->result_array();  
	} 
	function GetPriceRecordByItemId($itemId)  
	{  
		$itemId = $this->db->escape_str($itemId);
	    $this->db->select('*')
         ->from('item_price')
         ->where(array('item_price.isActive' => 1, 'item_price.Item_id' => $itemId ));
		$query = $this->db->get();
		return $query->result_array();  
	}
	function addItemPrice($itemId,$price)
	{ 	
		$itemId = $this->db->escape_str($itemId);
		$price = $this->db->escape_str($price);
		$sql = "INSERT INTO item_price (Item_id,Price,isCurrent,Added_on,isActive) 
		VALUES ('$itemId','$price','0',now(),'1')";
		$query = $this->db->query($sql);	
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}  

	function updateItemPrice($id,$price)
	{ 		
		$id = $this->db->escape_str($id);
		$price = $this->db->escape_str($price);

		$sql = "UPDATE `item_price` SET `Price`='$price',`Modified_on`=now() where `ID`='$id'";
		$query = $this->db->query($sql);
		
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function SetItemPriceEnable($itemId,$priceID)
	{ 		
		$itemId = $this->db->escape_str($itemId);
		$priceID = $this->db->escape_str($priceID);
		$sql = "UPDATE `item_price` SET `isCurrent`='0' where `Item_id`='$itemId' and `ID`!= '$priceID'";
		$query = $this->db->query($sql);

		$sql2 = "UPDATE `item_price` SET `isCurrent`='1' where `ID`='$priceID'";
		$query2 = $this->db->query($sql2);
		
		if($query2)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function RemovePriceRecordById($ArrIds,$tblName)
	{ 	$countPrice = 0;
		foreach ($ArrIds as $id){ 
			$query1 = $this->db->get_where($tblName, array('ID' => $id,'isCurrent' => 1,'isActive' => 1));
			If($query1->result_array()){
				$countPrice = 1 ;
			}
		}
		if($countPrice > 0){
			return array('code' => 0);	
		}else{
			foreach ($ArrIds as $id){ 
				$this->db->set('isActive', '0');  
				$this->db->where('ID', $id); 
				$this->db->update($tblName); 
			}
			return array('code' => 1);
		}
		
	}

	function GetAllActiveItemImageRecord($itemId)  
	{  
		$itemId = $this->db->escape_str($itemId);
	    $this->db->select('item.Title as itemTitle,item_image.ID as ID,item_image.Image_Url as Image_Url,item_image.Title as Title,item_image.Description as Description')
         ->from('item_image')
         ->join('item', 'item_image.Item_id = item.ID')
         ->where(array('item_image.isActive' => 1, 'item_image.Item_id' => $itemId));
		$query = $this->db->get();
		return $query->result_array();  
	} 
	function GetImageRecordByItemId($itemId)  
	{  
		$itemId = $this->db->escape_str($itemId);
	    $this->db->select('*')
         ->from('item_image')
         ->where(array('item_image.isActive' => 1, 'item_image.Item_id' => $itemId ));
		$query = $this->db->get();
		return $query->result_array();  
	}
	function addItemImage($itemId,$title,$desc,$image)
	{ 	
		$itemId = $this->db->escape_str($itemId);
		$title = $this->db->escape_str($title);
		$desc = $this->db->escape_str($desc);
		$sql = "INSERT INTO item_image (Item_id,Image_Url,Title,Description,Added_on,isActive) 
		VALUES ('$itemId','$image','$title','$desc',now(),'1')";
		$query = $this->db->query($sql);	
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}  

	function DeleteImageFileItem($id,$tblName,$fieldName)
        { 
            $id = $this->db->escape_str($id);

        	$this->db->select($fieldName)
			         ->from($tblName)
			         ->where('ID', $id);
			$query = $this->db->get();
			$ResultRow =  $query->row_array();  
			$ImageName = $ResultRow[$fieldName]; //echo $ImageName; die();

			if(file_exists("assets/upload/itemPicture/".$ImageName))
            unlink("assets/upload/itemPicture/".$ImageName);
            
        }

	function updateItemImage($id,$title,$desc,$image)
	{ 		
		$id = $this->db->escape_str($id);
		$title = $this->db->escape_str($title);
		$desc = $this->db->escape_str($desc);

		if($image == ''){
			$sql = "UPDATE `item_image` SET `Title`='$title',`Description`='$desc',`Modified_on`=now() where `ID`='$id'";
		}else{
			$sql = "UPDATE `item_image` SET `Image_Url`='$image',`Title`='$title',`Description`='$desc',`Modified_on`=now() where `ID`='$id'";
		}

		$query = $this->db->query($sql);
		
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}
	
	//Nengkhoiba
	function getAllActiveCategoryForAPI(){
		$this->db->select('category.ID,category_master.Description AS MasterCat,category.Code,category.Description,CONCAT("'.base_url().'assets/upload/categoryPicture/",category.Photo) AS Image')
		->from('category')
		->join('category_master', 'category_master.ID = category.Category_master_Id')
		->where(array('category.isActive'=>1,'category.Status'=>1));
		$query=$this->db->get();
		return $query->result_array();
	}
	
	function getItem($masterCat,$category,$name,$limit,$offset){
		
		$masterCat = $this->db->escape_str($masterCat);
		$category = $this->db->escape_str($category);
		$name = $this->db->escape_str($name);
		$limit = $this->db->escape_str($limit);
		$offset = $this->db->escape_str($offset);
		//http://localhost/solidwaste/api_controller/get_item?mc=5&c=3&n=dal&p=1
		$sql="SELECT item.ID, item.Title AS ItemName, item.Description AS ItemDesc,vendor.name AS VendorName, 
		(SELECT Price FROM item_price WHERE Item_id=item.ID AND isCurrent=1 AND isActive=1 LIMIT 1) AS ItemPrice,
		(SELECT CONCAT(\"".base_url()."assets/upload/itemPicture/\",Image_Url)  FROM item_image WHERE Item_id=item.ID AND isActive=1 LIMIT 1) AS ItemImage,
		item.Item_type AS ItemType
				FROM item 
				LEFT JOIN vendor ON item.Vendor_id=vendor.ID 
				LEFT JOIN category_master ON category_master.ID=item.Category_master_id
				WHERE item.isActive = 1 
				AND item.isPublish = 1 
				AND item.Category_master_id = CASE WHEN $masterCat != 0 THEN $masterCat ELSE item.Category_master_id END
				AND item.Category_id = CASE WHEN $category != 0 THEN $category ELSE item.Category_id END
				AND item.Title like CASE WHEN '$name' = '' THEN item.Title ELSE '%$name%' END 
				LIMIT $limit,$offset";
		$query=$this->db->query($sql);
		return $query->result_array();
		
	}
	
	function getItemByID($itemId){
		$itemId = $this->db->escape_str($itemId);

		$sql="SELECT item.ID AS ID,
				item.Code AS itemCode,
				item.Title AS ItemName,
				(SELECT Price FROM item_price WHERE Item_id=item.ID AND isCurrent=1 AND isActive=1 LIMIT 1) AS ItemPrice,
				item.Description AS ItemDesc,
				vendor.Name AS vendorName,
				vendor.About AS vendorAbout,
				item.Delivery_Time AS Delivery_Time,
				item.Handling_Charge AS Handling_Charge
				FROM item
				LEFT JOIN vendor on vendor.ID=item.Vendor_id
				WHERE item.isPublish=1
				AND item.isActive=1
				AND item.ID=$itemId";
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	function getItemImagesByID($itemId){
		$itemId = $this->db->escape_str($itemId);
		$sql="SELECT CONCAT(\"".base_url()."assets/upload/itemPicture/\",Image_Url) AS URL FROM item_image WHERE Item_id=$itemId AND isActive=1";
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	function getItemDetailsByID($itemId){
		$itemId = $this->db->escape_str($itemId);
		$sql="SELECT Title,Description FROM item_details WHERE Item_id=$itemId AND isActive=1";
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	function getArticle($limit,$offset){

		$limit = $this->db->escape_str($limit);
		$offset = $this->db->escape_str($offset);
		$sql="SELECT `ID`, 
				`Title`, 
				`Details`, 
				CONCAT(\"".base_url()."assets/upload/articlesPicture/\",Image) AS Image , 
				`link` 
				FROM `articles` 
				WHERE isActive=1
				LIMIT $limit,$offset";
		
		$query=$this->db->query($sql);
		return $query->result_array();
	
	}
	function getItembyName($name){
	$name = $this->db->escape_str($name);
		$sql="SELECT Title FROM item WHERE isPublish=1 AND isActive=1 AND Title like '%$name%' LIMIT 20";
	$sql="SELECT ID,Title,(SELECT CONCAT(\"".base_url()."assets/upload/itemPicture/\",Image_Url)  FROM item_image WHERE Item_id=item.ID AND isActive=1 LIMIT 1) AS ItemImage,item.Item_type AS ItemType FROM item WHERE isPublish=1 AND isActive=1 AND Title like '%$name%' LIMIT 20";
	$query=$this->db->query($sql);
		return $query->result_array();
	}
	function getAdvertisement(){
		$sql="SELECT Title,Description,CONCAT(\"".base_url()."assets/upload/advertisePicture/\",Image) AS Image FROM advertise WHERE isActive=1";
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	function setSignInWith($name,$profile,$email,$id){
		$return=array();$mode=0;
		$sql="SELECT ID,`Mode` FROM `user` WHERE appId='$id' AND isActive=1";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
			$token=$this->generateRandomString(30);
			$result=$query->result_array();
			$mode=$result[0]['Mode'];
			$sql1="UPDATE user SET profile_url='$profile',Name='$name',Email='$email',token='$token' WHERE appId='$id'";
			$query1=$this->db->query($sql1);
			
		}else{
			$token=$this->generateRandomString(30);
			$mode=1;
			$sql1="INSERT INTO `user`(`appId`,`profile_url`, `Name`, `Email`,`Mode`,`token`,`Added_on`,`isActive`) 
					VALUES ('$id','$profile','$name','$email',1,'$token',NOW(),1)";
			$query1=$this->db->query($sql1);
		}
		$return=array("mode"=>$mode,"token"=>$token);
		return $return;
	}
	function addtocart($uid,$pid,$itemType,$price,$qty,$token){
		$return=0;
		$resultArray=$this->getToken($uid);
		if($token==$resultArray["token"]){
			$userId=$resultArray["userId"];
			$sql="SELECT ID FROM `cart` 
					WHERE Item_id='$pid' 
					AND Added_by='$userId'
					AND isActive=1";
			$query=$this->db->query($sql);
			if($query->num_rows()>0){
				$result=$query->result_array();
				$cart_id=$result[0]['ID'];
				$update="UPDATE cart SET Qty='$qty',Charge='$price',Net_Charge='$price*$qty',Added_on=NOW(),itemType='$itemType' WHERE ID=$cart_id";
				$update_query=$this->db->query($update);
				if($update_query){
					$return=2;
				}
			}else{
				$insert="INSERT INTO cart (Item_id,Qty,Charge,Net_Charge,itemType,Added_by,Added_on,isActive)
						VALUES($pid,$qty,$price,$qty*$price,$itemType,'$userId',NOW(),1)";
				$insert_query=$this->db->query($insert);
				if($insert_query){
					$return=1;
				}
			}
		}else{
			$return=3;
		}
		return $return;
	}
	function addtoWishlist($uid,$pid,$token){
		$return=0;
		$resultArray=$this->getToken($uid);
		if($token==$resultArray["token"]){
			$userId=$resultArray["userId"];
			$sql="SELECT ID FROM `wishlist`
			WHERE Item_id='$pid'
			AND Added_by='$userId'
			AND isActive=1";
			$query=$this->db->query($sql);
			if($query->num_rows()>0){
				$result=$query->result_array();
				$list_id=$result[0]['ID'];
				$delete="DELETE FROM wishlist WHERE ID='$list_id'";
				$delete_query=$this->db->query($delete);
				if($delete_query){
					$return=2;
				}
			}else{
				$insert="INSERT INTO wishlist (Item_id,Added_by,Added_on,isActive)
				VALUES($pid,'$userId',NOW(),1)";
				$insert_query=$this->db->query($insert);
				if($insert_query){
					$return=1;
				}
			}
		}else{
			$return=3;
		}
		return $return;
	}
	function removeItemFromCart($uid,$pid,$token){
		$return=0;
		$resultArray=$this->getToken($uid);
		if($token==$resultArray["token"]){
			$userId=$resultArray["userId"];
			$sql="SELECT ID FROM `cart`
			WHERE Item_id='$pid'
			AND Added_by='$userId'
			AND isActive=1";
			$query=$this->db->query($sql);
			if($query->num_rows()>0){
				$result=$query->result_array();
				$list_id=$result[0]['ID'];
				$delete="DELETE FROM cart WHERE ID='$list_id'";
				$delete_query=$this->db->query($delete);
				if($delete_query){
					$return=1;
				}
			}
		}else{
			$return=2;
		}
		return $return;
	}
	function getToken($id){
		$sql="SELECT token,ID FROM user WHERE appId='$id' AND isActive=1 LIMIT 1";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		$token=$result[0]['token'];
		$userID=$result[0]['ID'];
		return array("token"=>$token,"userId"=>$userID);
	}
	function generateRandomString($length = 20) {
		$characters = '01234567892462314151klwndlknlwnkn21k1nknk212lrlkmksmmaknajn';
		$randomString = '';
		for($i = 0; $i < $length; $i ++) {
			$randomString .= $characters [rand ( 0, strlen ( $characters ) - 1 )];
		}
		return $randomString;
	}
	function updateShipping($ID,$name,$address,$state,$city,$pincode,$mobile,$uid,$token){
		$return=0;
		$resultArray=$this->getToken($uid);
		if($token==$resultArray["token"]){
			$userId=$resultArray["userId"];
			if($ID==0){
				$insert="INSERT INTO `shipping_details`(`Name`, `Address`, `State`, `City`, `Pincode`, `Mobile`, `Added_by`, `Added_on`, `isActive`) 
						VALUES ('$name','$address','$state','$city','$pincode','$mobile','$userId',NOW(),1)";
				$insert_query=$this->db->query($insert);
				if($insert_query){
					$return=1;
				}
			}else{
				$update="UPDATE shipping_details SET Name='$name',Address='$address',State='$state',City='$city',Pincode='$pincode',Mobile='$mobile',Modified_by='$userId',Modified_on=NOW() WHERE ID='$ID'";
				$update_query=$this->db->query($update);
				if($update_query){
					$return=2;
				}
			}
			
		}else{
			$return=3;
		}
		return $return;
	}
	function deleteShipping($uid,$sid,$token){
		$return=0;
		$resultArray=$this->getToken($uid);
		if($token==$resultArray["token"]){
			$userId=$resultArray["userId"];
				$delete="UPDATE shipping_details SET isActive=0,Modified_by='$userId',Modified_on=NOW() WHERE ID='$sid' ";
				$delete_query=$this->db->query($delete);
				if($delete_query){
					$return=1;
				}
			
		}else{
			$return=2;
		}
		return $return;
	}
	function getCartItem($uid,$token){
		$resultArray=$this->getToken($uid);
		if($token==$resultArray["token"]){
			$userId=$resultArray["userId"];
		$sql="SELECT item.ID, item.Title AS ItemName, item.Description AS ItemDesc,vendor.name AS VendorName,
		cart.Charge AS cartPrice,
		cart.Qty AS qty,
		cart.Net_Charge AS CartNetCharge,
		item.isActive,
	    item.isPublish,
		(SELECT CONCAT(\"".base_url()."assets/upload/itemPicture/\",Image_Url)  FROM item_image WHERE Item_id=item.ID AND isActive=1 LIMIT 1) AS ItemImage,
			item.Item_type AS ItemType,
			item.Min_Order AS minOrder,
			item.Handling_Charge AS handling,
			item.Delivery_Time AS delivery,
			item.Shipping AS Shipping
			
			FROM item
			LEFT JOIN vendor ON item.Vendor_id=vendor.ID
			LEFT JOIN category_master ON category_master.ID=item.Category_master_id
			LEFT JOIN cart ON cart.Item_id=item.ID
			WHERE cart.Added_by='$userId'	
				";
		$query=$this->db->query($sql);
		return $query->result_array();
		}else{
			return "";
		}
	
	}
function getWishlistItem($uid,$token){
		$resultArray=$this->getToken($uid);
		if($token==$resultArray["token"]){
			$userId=$resultArray["userId"];
		$sql="SELECT item.ID, item.Title AS ItemName, item.Description AS ItemDesc,vendor.name AS VendorName,
		(SELECT Price FROM item_price WHERE Item_id=item.ID AND isCurrent=1 AND isActive=1 LIMIT 1) AS ItemPrice,
		item.isActive,
	    item.isPublish,
		(SELECT CONCAT(\"".base_url()."assets/upload/itemPicture/\",Image_Url)  FROM item_image WHERE Item_id=item.ID AND isActive=1 LIMIT 1) AS ItemImage,
			item.Item_type AS ItemType
			FROM item
			LEFT JOIN vendor ON item.Vendor_id=vendor.ID
			LEFT JOIN category_master ON category_master.ID=item.Category_master_id
			LEFT JOIN wishlist ON wishlist.Item_id=item.ID
			WHERE wishlist.Added_by='$userId'
			AND wishlist.isActive=1
				";
		$query=$this->db->query($sql);
		return $query->result_array();
		}else{
			return "";
		}
	
	}
	function getShippingAddress($uid,$token){
		$resultArray=$this->getToken($uid);
		if($token==$resultArray["token"]){
			$userId=$resultArray["userId"];
			$sql="SELECT `ID`, `Name`, `Address`, `State`, `City`, `Pincode`, `Mobile` FROM `shipping_details` WHERE Added_by='$userId' AND isActive=1
			";
			$query=$this->db->query($sql);
			return $query->result_array();
		}else{
			return "";
		}
	
	}
//nengkhoiba
	function GetAllActiveUserRecord()  
	{  
	    $this->db->select('ID,Name,Email,Gender,DOB,Mode')
         ->from('user')
         ->where('user.isActive', 1);
		$query = $this->db->get();
		return $query->result_array();  
	} 

	function addUser($name,$email,$gender,$dob)
	{ 		
		$name = $this->db->escape_str($name);
		$email = $this->db->escape_str($email);
		$gender = $this->db->escape_str($gender);
		$dob = $this->db->escape_str($dob);

			$DOBDate = date('Y-m-d', strtotime($dob));
			$sql = "INSERT INTO user (Name,Email,Gender,DOB,Mode,Added_on,isActive) 
			VALUES ('$name','$email','$gender','$DOBDate',0,now(),'1')";
			$query = $this->db->query($sql);		
		if($query)
		{
			return array('code' => 1);
			
		}else
		{
			return array('code' => 0);
		}
	}

	function updateUser($id,$name,$email,$gender,$dob)
	{ 
		$id = $this->db->escape_str($id);
		$name = $this->db->escape_str($name);
		$email = $this->db->escape_str($email);
		$gender = $this->db->escape_str($gender);
		$dob = $this->db->escape_str($dob);

		$DOBDate = date('Y-m-d', strtotime($dob));
		$sql = "UPDATE `user` SET `Name`='$name',`Email`='$email',`Gender`='$gender',`DOB`='$DOBDate',`Modified_on`=now() where `ID`='$id'";

		$query = $this->db->query($sql);			
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function ChangeUserMode($UserId,$Mode)
	{ 		
		$UserId = $this->db->escape_str($UserId);
		$Mode = $this->db->escape_str($Mode);

		if($Mode == 0){
			$sql = "UPDATE `user` SET `Mode`='1' where `ID`='$UserId'";
			$msg = 'Activated Successfully !!!';
		}elseif ($Mode == 1) {
			$sql = "UPDATE `user` SET `Mode`='0' where `ID`='$UserId'";
			$msg = 'Inactivated Successfully !!!';
		}
		$query = $this->db->query($sql);
		
		if($query)
		{
			return array('code' => 1, 'message' => $msg);
		}else
		{
			return array('code' => 0, 'message' => $msg);
		}
	}

	function GetAllActiveArticlesRecord()  
	{  
	    $this->db->select('ID,Title,Details,Image')
         ->from('articles')
         ->where('articles.isActive', 1);
		$query = $this->db->get();
		return $query->result_array();  
	} 

	function addArticles($title,$detail,$link,$imgLink,$img)
	{ 		
		$title = $this->db->escape_str($title);
		$detail = $this->db->escape_str($detail);
		$link = $this->db->escape_str($link);
		$imgLink = $this->db->escape_str($imgLink);
		$sql = "INSERT INTO articles (Title,Details,Image,link,Image_link,Added_on,isActive) 
		VALUES ('$title','$detail','$img','$link','$imgLink',now(),'1')";
		$query = $this->db->query($sql);		
		if($query)
		{
			return array('code' => 1);
			
		}else
		{
			return array('code' => 0);
		}
	}

	function updateArticles($id,$title,$detail,$link,$imgLink,$img)
	{ 
		$id = $this->db->escape_str($id);
		$title = $this->db->escape_str($title);
		$detail = $this->db->escape_str($detail);
		$link = $this->db->escape_str($link);
		$imgLink = $this->db->escape_str($imgLink);
		if($img == ''){
			$sql = "UPDATE `articles` SET `Title`='$title',`Details`='$detail',`link`='$link',`Image_link`='$imgLink',`Modified_on`=now() where `ID`='$id'";
		}else{
			$sql = "UPDATE `articles` SET `Title`='$title',`Details`='$detail',`Image`='$img',`link`='$link',`Image_link`='$imgLink',`Modified_on`=now() where `ID`='$id'";
		}
		

		$query = $this->db->query($sql);			
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function DeleteImageFileArticles($id,$tblName,$fieldName)
        { 
        	$id = $this->db->escape_str($id);

        	$this->db->select($fieldName)
			         ->from($tblName)
			         ->where('ID', $id);
			$query = $this->db->get();
			$ResultRow =  $query->row_array();  
			$ImageName = $ResultRow[$fieldName]; 

			if(file_exists("assets/upload/articlesPicture/".$ImageName))
            unlink("assets/upload/articlesPicture/".$ImageName);
        }

    function GetAllActiveAdvertiseRecord()  
	{  
	    $this->db->select('ID,Title,Description,Image')
         ->from('advertise')
         ->where('advertise.isActive', 1);
		$query = $this->db->get();
		return $query->result_array();  
	} 

	function addAdvertise($title,$desc,$img)
	{ 		
		$title = $this->db->escape_str($title);
		$desc = $this->db->escape_str($desc);

		$sql = "INSERT INTO advertise (Title,Description,Image,Added_on,isActive) 
		VALUES ('$title','$desc','$img',now(),'1')";
		$query = $this->db->query($sql);		
		if($query)
		{
			return array('code' => 1);
			
		}else
		{
			return array('code' => 0);
		}
	}

	function updateAdvertise($id,$title,$desc,$img)
	{ 	
		$id = $this->db->escape_str($id);
		$title = $this->db->escape_str($title);
		$desc = $this->db->escape_str($desc);
		if($img == ''){
			$sql = "UPDATE `advertise` SET `Title`='$title',`Description`='$desc',`Modified_on`=now() where `ID`='$id'";
		}else{
			$sql = "UPDATE `advertise` SET `Title`='$title',`Description`='$desc',`Image`='$img',`Modified_on`=now() where `ID`='$id'";
		}
		

		$query = $this->db->query($sql);			
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function DeleteImageFileAdvertise($id,$tblName,$fieldName)
        { 
        	$id = $this->db->escape_str($id);
        	
        	$this->db->select($fieldName)
			         ->from($tblName)
			         ->where('ID', $id);
			$query = $this->db->get();
			$ResultRow =  $query->row_array();  
			$ImageName = $ResultRow[$fieldName]; //echo $ImageName; die();

			if(file_exists("assets/upload/advertisePicture/".$ImageName))
            unlink("assets/upload/advertisePicture/".$ImageName);
        }  

    function GetAllActiveAdminUserRecord()  
	{  
	    $this->db->select('ID,User_Name,Email,Role,Mode')
         ->from('user_admin')
         ->where('isActive', 1);
		$query = $this->db->get();
		return $query->result_array();  
	} 

	

	function ResetUserToken($id,$token)
	{ 		
		$id = $this->db->escape_str($id);
		$sql = "UPDATE `user_admin` SET `token`='$token',`Modified_on`=now() where `ID`='$id'";
		$query = $this->db->query($sql);
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}
	

	function ResetAdminUserPassword($id,$passwd)
	{ 		
		$id = $this->db->escape_str($id);
		$password = $this->db->escape_str($passwd);

		$options = [
		    'salt' => $this->getSalt(), //write your own code to generate a suitable salt
		    'cost' => 12 // the default cost is 10
		];
		$hash_password = password_hash($password, PASSWORD_DEFAULT, $options);

		// $pwd = md5($passwd.'w2w@w2w#w2w'); 
		$sql = "UPDATE `user_admin` SET `Password`='$hash_password',`Modified_on`=now() where `ID`='$id'";
		$query = $this->db->query($sql);
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function updateAdminUser($id,$role)
	{ 
		$id = $this->db->escape_str($id);
		$role = $this->db->escape_str($role);
		$sql = "UPDATE `user_admin` SET `Role`='$role',`Modified_on`=now() where `ID`='$id'";

		$query = $this->db->query($sql);			
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function checkAdminUserMatch($passwd,$email)
	{ 	
		$passwd = $this->db->escape_str($passwd);
		$email = $this->db->escape_str($email);
		// $pwd = md5($passwd.'w2w@w2w#w2w'); 
		$query1 = $this->db->get_where('user_admin', array('Email' => $email,'isActive' => 1)); 
        $querypass = $query1->row_array();  

		if (sizeof ( $querypass ) > 0) {  
			$hash = $querypass['Password'];	
			// if(password_verify($passwd, $hash)){
			if($passwd == $hash){
             return array('code' => 1);
            }else
				{
					return array('code' => 0);
				} 
		}else
		{
			return array('code' => 0);
		}
	}

	

	function ChangeAdminUserMode($AdminUserId,$Mode)
	{ 		
		$AdminUserId = $this->db->escape_str($AdminUserId);
		$Mode = $this->db->escape_str($Mode);
		if($Mode == 0){
			$sql = "UPDATE `user_admin` SET `Mode`='1' where `ID`='$AdminUserId'";
			$msg = 'Activated Successfully !!!';
		}elseif ($Mode == 1) {
			$sql = "UPDATE `user_admin` SET `Mode`='0' where `ID`='$AdminUserId'";
			$msg = 'Inactivated Successfully !!!';
		}
		$query = $this->db->query($sql);
		
		if($query)
		{
			return array('code' => 1, 'message' => $msg);
		}else
		{
			return array('code' => 0, 'message' => $msg);
		}
	}  
	function GetAllActiveOrderRecord()  
	{  
	    $this->db->select('order_header.ID as ID,
	    				order_header.Order_No as Order_No,
	    				item.Title as Title,
	    				order_header.Name as Name,
	    				order_status.Description as Description,
	    				order_header.Total_amount as Total_amount,
	    				order_header.Added_on as Added_on')
         ->from('order_header')
         ->join('order_status', 'order_header.order_status = order_status.ID')
         ->join('item', 'order_header.Item_id = item.ID')
         ->where('order_header.isActive', 1)
         ->order_by("order_header.ID", "DESC");
		$query = $this->db->get();
		return $query->result_array();  
	} 
	function GetOrdersRecordById($OrderId)  
	{  
	    $this->db->select('order_header.ID as ID,
	    				order_header.Order_No as Order_No,
	    				order_header.Qty as Qty,
	    				item.Title as Title,
	    				order_header.Item_price as Item_price,
	    				order_header.Name as Name,
	    				order_header.Address as Address,
	    				order_header.State as State,
	    				order_header.City as City,
	    				order_header.Pincode as Pincode,
	    				order_header.Mobile as Mobile,
	    				order_header.Order_status as Order_status,
	    				order_header.Order_status_msg as Order_status_msg,
	    				order_status.Description as Description,
	    				order_header.Shipping_charge as Shipping_charge,
	    				order_header.Total_amount as Total_amount,
	    				order_header.Added_on as Added_on')
         ->from('order_header')
         ->join('order_status', 'order_header.order_status = order_status.ID')
         ->join('item', 'order_header.Item_id = item.ID')
         ->where(array('order_header.isActive' => 1, 'order_header.ID' => $OrderId ));
		$query = $this->db->get();
		return $query->result_array();  
	} 

	function updateOrderStatus($id,$status,$orderMsg)
	{ 		
		$id = $this->db->escape_str($id);
		$price = $this->db->escape_str($status);
		if($orderMsg != ''){
			$orderMsg = $this->db->escape_str($orderMsg);
		}else{
			$orderMsg = '';
		}
		

		$sql = "UPDATE `order_header` SET `Order_status`='$status',`Order_status_msg`='$orderMsg',`Modified_on`=now() where `ID`='$id'";
		$query = $this->db->query($sql);
		
		if($query)
		{
			return array('code' => 1);
		}else
		{
			return array('code' => 0);
		}
	}

	function getUserEmailByOrderId($Orderid)
        { 
            $Orderid = $this->db->escape_str($Orderid);

        	$this->db->select('Added_by')
			         ->from('order_header')
			         ->where('ID', $Orderid);
			$query = $this->db->get();
			$ResultRow =  $query->row_array();  
			$userId = $ResultRow['Added_by'];

			$this->db->select('Email')
			         ->from('user')
			         ->where('ID', $userId);
			$query = $this->db->get();
			$ResultRow =  $query->row_array();  
			$UserEmailId = $ResultRow['Email']; // echo $UserEmailId; die();
            
            return $UserEmailId;
        }

    function GetAllActiveEmpUserRecord()  
	{  
	    $this->db->select('*')
         ->from('user_admin')
         ->where('isActive', 1)
         ->where_in('Role', array('admin','employee'))
         ->order_by('ID', 'DESC');
		$query = $this->db->get();
		return $query->result_array();  
	} 

	function GetAllActiveRecordByfieldValue($table,$field,$value)  
	{  
	    $this->db->select('*')
         ->from($table)
         ->where($field, $value)
         ->where('isActive', 1)
         ->order_by('ID', 'DESC');
		$query = $this->db->get();
		return $query->result_array();  
	} 

	function GetAllProjectExcelExceptFirst()  
	{  
	    $this->db->select('*')
         ->from('project_excel')
         ->where('ID !=', 1);
		$query = $this->db->get();
		return $query->result_array();  
	}  
	function GetAllProjectMngExcelExceptFirst()  
	{  
	    $this->db->select('*')
         ->from('project_management')
         ->where('ID !=', 1);
		$query = $this->db->get();
		return $query->result_array();  
	}       
     
    function GetGalleryLimitsOffset($limit,$offset, $tabName)  
	{   
	    $query = $this->db->limit($limit, $offset)->get_where($tabName, array('isActive' => 1)); 
	    return $query->result_array();  
	} 
	
	
	  function get_candidate_list($app_id,$name,$aadhaar_no,$percentage_from,$percentage_to,$applyDate,$subject_comb)  
	{   
	    $this->db->select('*');
        $this->db->from('registration');
        $this->db->where('isActive', 1);
        if($app_id != ''){
        	$this->db->where('application_id', $app_id);
        }
        if($name != ''){
        	$this->db->where('student_name', $name);
        }
        if($aadhaar_no != ''){
        	$this->db->where('aadhaar_number', $aadhaar_no);
        }
        if($subject_comb != ''){
        	$this->db->where('subject_combination', $subject_comb);
        }
        if($percentage_from != ''){
        	$this->db->where('percentage >= ', $percentage_from);
        }
        if($percentage_to != ''){
        	$this->db->where('percentage <= ', $percentage_to);
        }
        
        if($applyDate != ''){
			$dates = explode("-", $applyDate);
		 	$date1 = date('Y-m-d', strtotime($dates[0]));
		 	$date2 = date('Y-m-d', strtotime($dates[1]));
		 	$this->db->where('added_on >=', $date1.' 00:00:00');
			$this->db->where('added_on <=', $date2.' 23:59:59');
		}
        
		$query = $this->db->get();
		return $query->result_array();    
	} 
	
		  function get_all_application()  
	{   
	     $this->db->select('count(*) as total_application')
         ->from('registration')
         ->where('isActive', 1);
		$query = $this->db->get();
		return $query->result_array();    
	} 
	
		  function get_admited_student()  
	{   
	     $this->db->select('count(*) as total_admited')
         ->from('registration')
         ->where('isActive', 1)
         ->where('isAdmission', 1);		 
		$query = $this->db->get();
		return $query->result_array();    
	} 
	
	function get_fee_list($student_id)
	{

	  $this->db->select('*')
         ->from('fee_payment_details')
         ->where('isActive', 1)
         ->where('student_id', $student_id);
		$query = $this->db->get();
		$s_data['previous_payment_details']= $query->result_array();
	
	
	  $this->db->select('*')
         ->from('fees')
         ->where('isActive', 1);
		$query = $this->db->get();
		$s_data['fee_details'] = $query->result_array();
		return  $s_data;
	}
	
	//CORPORATE USER DATA
		function add_admission_model($student_id,$fee_id)
		{

			$this->db->select('invoice_no')
			->from('fee_payment_details')
			->order_by('id','DESC')
			->limit(1)
			->where(array('isActive' => 1));
			$query = $this->db->get();
			
			$last_invoice_serial_no = intval(substr($query->row_array()['invoice_no'],4));
			if($last_invoice_serial_no)
			{
			    $next_invoice_serial_no = $last_invoice_serial_no + 1;
			    $invoice_no = 'EXTS'.str_pad($next_invoice_serial_no, 5, '0', STR_PAD_LEFT);
			}
			else
			{
			    $invoice_no = 'EXTS00001';
			}
			// registration addmission id

			$this->db->select('admission_id')
			->from('registration')
			->where(array('id' => $student_id, 'isActive' => 1));
			$query = $this->db->get();

			if(is_null($query->row_array()['admission_id'])){
				$this->db->select('admission_id')
				->from('registration')
				->order_by('admission_id','DESC')
				->limit(1)
				->where(array('isActive' => 1));
				$query1 = $this->db->get();
				
				$last_admission_no = $query1->row_array()['admission_id']; 
				if($last_admission_no)
				{
				    $admission_no = $last_admission_no + 1;
				}
				else
				{
				    $admission_no = '20001';
				}
			}else{
				$admission_no = $query->row_array()['admission_id'];
			}

				
			
			
			$added_on_time = mdate('%Y-%m-%d %H:%i:%s', now());
			
			$data = array(
			'student_id'	=>  $student_id,
			'invoice_no' =>$invoice_no,
			'fee_id'=>  serialize($fee_id), 
			'added_on'=>$added_on_time,
			'isActive'=>  1,
			);
			
			
			$this->db->insert('fee_payment_details', $data);
			$lastID=$this->db->insert_id();	    
			
			
			if(sizeof($fee_id) > 1)
			{			
				foreach($fee_id as $fee_ids){
						if($fee_ids==1 || $fee_ids==2 || $fee_ids==3){
					$this->db->set('admission_id', $admission_no);		
					$this->db->set('isAdmission', 1);  //Set the column name and which value to set..
					$this->db->where('id', $student_id); //set column_name and value in which row need to update
					$this->db->update('registration'); //Set your table name
					}	
				}
			}else
			{
			if($fee_id==1 || $fee_id==2 || $fee_id==3){
				$this->db->set('admission_id', $admission_no);	
				$this->db->set('isAdmission', 1);  //Set the column name and which value to set..
				$this->db->where('id', $student_id); //set column_name and value in which row need to update
				$this->db->update('registration'); //Set your table name
				}
			}	
		
			  $this->db->select('*')
				 ->from('fees')
				 ->where_in('fees.id', $fee_id)
				 ->where('isActive', 1);
				$query = $this->db->get();
				$result['fees_payment_details'] = $query->result_array(); 
			
			  $this->db->select('*')
				 ->from('registration')
				 ->where('isActive', 1)
				 ->where('id', $student_id);
				$query = $this->db->get();
				$result['student_details'] = $query->result_array(); 
			
			if($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				return array('code' => 0);			
			}
			else
			{
				$this->db->trans_commit();
				return array('code' => 1,'msg'=>"", 'invoice_details'=>$result, 'added_on_time'=>$added_on_time, 'invoice_no'=>$invoice_no );
			}
		}
		
		function get_payment_history_list($student_id)
	{

	  $this->db->select('*')
         ->from('fee_payment_details')
         ->where('isActive', 1)
         ->where('student_id', $student_id);
		$query = $this->db->get();
		return $query->result_array();
	
	}
	
	function get_ind_payment_history($payment_id)
	{

	 
			
			  $this->db->select('fee_id,student_id,invoice_no,added_on')
			->from('fee_payment_details')
			->limit(1)
			->where(array('isActive' => 1, 'id'=>$payment_id));
			$query = $this->db->get();
			
			$fee_id = unserialize($query->row_array()['fee_id']);
			$student_id = $query->row_array()['student_id'];
			$result['invoice_no'] = $query->row_array()['invoice_no']; 
			$result['added_on'] = $query->row_array()['added_on']; 			
			
			
			$this->db->select('*')
				 ->from('fees')
				 ->where_in('fees.id', $fee_id)
				 ->where('isActive', 1);
				$query = $this->db->get();
				$result['fees_payment_details'] = $query->result_array(); 			
				
	
	  $this->db->select('*')
         ->from('registration')
         ->where('isActive', 1)
         ->where('id', $student_id);
		$query = $this->db->get();
		$result['student_details'] = $query->result_array(); 
		
		return $result;
	
	}
	
	function get_student_profile($student_id)
	{

	  $this->db->select('*')
         ->from('registration')
         ->where('isActive', 1)
         ->where('id', $student_id);
		$query = $this->db->get();
		return $query->result_array();
	
	}
	
	

}