<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Navigation extends CI_Controller {

	public function index()
	{  
		$this->load->view('admin/admin/login');
	}
	public function dashboard()
	{  
			$this->load->view('admin/admin/dashboard');
	}

	public function dashboardNavigation()
	{  			

		try {
			$output = array(
	        'html'=>$this->load->view('admin/admin/dashboard','', true),
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

	public function userEmployees()
	{  
		try { 
			$output = array(
	        'html'=>$this->load->view('admin/admin/employees_user','', true),
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

	public function userClients()
	{  
		try { 
			$output = array(
	        'html'=>$this->load->view('admin/admin/client_user','', true),
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

	public function navJob()
	{  
		try { 
			$output = array(
	        'html'=>$this->load->view('admin/admin/job','', true),
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
	public function userResetPasswordform()
	{  
		try {
			$output = array(
	        'html'=>$this->load->view('admin/admin/password_reset','', true),
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

	public function testimonial()
	{  
		try { 
			$output = array(
	        'html'=>$this->load->view('admin/admin/testimonial','', true),
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

	public function aboutUs()
	{  
		try { 
			$output = array(
	        'html'=>$this->load->view('admin/admin/aboutUs','', true),
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
	public function gallery()
	{  
		try {
			$output = array(
	        'html'=>$this->load->view('admin/admin/gallery','', true),
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

	public function solution()
	{  
		try { 
			$output = array(
	        'html'=>$this->load->view('admin/admin/solution','', true),
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

	public function home()
	{  
		try { 
			$output = array(
	        'html'=>$this->load->view('admin/admin/home','', true),
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

	public function career()
	{  
		try { 
			$output = array(
	        'html'=>$this->load->view('admin/admin/career','', true),
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

	public function resume()
	{  
		try { 
			$output = array(
	        'html'=>$this->load->view('admin/admin/resume','', true),
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

	public function subscribe()
	{  
		try { 
			$output = array(
	        'html'=>$this->load->view('admin/admin/subscribe','', true),
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

	public function contactUs()
	{  
		try { 
			$output = array(
	        'html'=>$this->load->view('admin/admin/contactUs','', true),
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

	public function fileUpload()
	{  
		try { 
			$output = array(
	        'html'=>$this->load->view('admin/admin/fileUpload','', true),
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

}
