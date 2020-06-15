<?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class Table_server extends CI_Controller {  
      
      function __construct()
      {
        parent::__construct();
        $this->load->model('Table_model');
      }

      function index(){  
           $this->load->view('admin/login'); 
      } 

      function fetch_EmpUser(){       
           $fetch_data = $this->Table_model->make_datatables_EmpUser();  
           $data = array();   
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '';
                
                if($row->Role == 'admin'){
                $sub_array[] = $row->User_Name.'<span style="color:red;">&nbsp (Administrator)</span>';
                }else{
                  $sub_array[] = $row->User_Name;
                }
                
                $sub_array[] = $row->Email; 
                $sub_array[] = $row->team;
                $sub_array[] = $row->wave;

              if($row->Role == 'admin'){
                $sub_array[] = '<div  class="animated-checkbox" style="display: inline-block;">
                <label><input class="x" type="checkbox" disabled><span class="label-text"></span></label>
                </div><button onclick="editEmpUser($(this))" value="'.$row->ID.'" class="btn btn-outline-info btn-sm" style="" type="button">View</button>';
              }else{
                $sub_array[] = '<div  class="animated-checkbox" style="display: inline-block;">
                <label><input onclick="shakeDeleteBtn()" class="checkbox" type="checkbox" value="'.$row->ID.'"><span class="label-text"></span></label>
                </div>
                <button onclick="editEmpUser($(this))" value="'.$row->ID.'" class="btn btn-outline-info btn-sm" style="" type="button"></i>View</button>';
              }  
                  
               $sub_array[] = '<button type="button" name="delete" id="'.$row->ID.'" class="btn btn-danger btn-xs">Delete</button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->Table_model->get_all_data('user_admin'),    
                "recordsFiltered"     =>     $this->Table_model->get_filtered_data_EmpUser(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      } 

      function fetch_ClientUser(){      
           $fetch_data = $this->Table_model->make_datatables_ClientUser();   
           $data = array();   
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '';
                
                $sub_array[] = $row->User_Name;
                
                $sub_array[] = $row->Email; 

                $sub_array[] = '<div  class="animated-checkbox" style="display: inline-block;">
                <label><input onclick="shakeDeleteBtn()" class="checkbox" type="checkbox" value="'.$row->ID.'"><span class="label-text"></span></label>
                </div>
                <button onclick="editClientUser($(this))" value="'.$row->ID.'" class="btn btn-outline-info btn-sm" style="" type="button">View</button>';
                  
               // $sub_array[] = '<button type="button" name="delete" id="'.$row->ID.'" class="btn btn-danger btn-xs">Delete</button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->Table_model->get_all_data('user_admin'),    
                "recordsFiltered"     =>     $this->Table_model->get_filtered_data_ClientUser(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      } 


      function fetch_Job(){      
           $fetch_data = $this->Table_model->make_datatables_Job();   
           $data = array();   
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '';
                
                $sub_array[] = $row->job_id;
                $sub_array[] = $row->name; 
                $sub_array[] = $row->client; 

                $sub_array[] = '<div  class="animated-checkbox" style="display: inline-block;">
                <label><input onclick="shakeDeleteBtn()" class="checkbox" type="checkbox" value="'.$row->ID.'"><span class="label-text"></span></label>
                </div>
                <button onclick="editJob($(this))" value="'.$row->ID.'" class="btn btn-outline-info btn-sm" style="" type="button"><i style ="font-size: 12px; margin-right: 0px;" class="fa fa-lg fa-fw fa-pencil"></i>EDIT</button>';
                  
               // $sub_array[] = '<button type="button" name="delete" id="'.$row->ID.'" class="btn btn-danger btn-xs">Delete</button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->Table_model->get_all_data('job'),    
                "recordsFiltered"     =>     $this->Table_model->get_filtered_data_Job(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      } 

      function fetch_Testimonial(){      
           $fetch_data = $this->Table_model->make_datatables_Testimonial(); 
           $data = array();   
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '';
                
                $sub_array[] = $row->name;
                $sub_array[] = $row->star;
                $newDate = date("d-m-Y", strtotime($row->testi_date)); 
                $sub_array[] = $newDate;
                $sub_array[] = substr($row->comment, 0, 90).(strlen(trim($row->comment)) > 90 ? '...' : '');

                $sub_array[] = '<div  class="animated-checkbox" style="display: inline-block;">
                <label><input onclick="shakeDeleteBtn()" class="checkbox" type="checkbox" value="'.$row->ID.'"><span class="label-text"></span></label>
                </div>
                <button onclick="editTestimonial($(this))" value="'.$row->ID.'" class="btn btn-outline-info btn-sm" style="" type="button"><i style ="font-size: 12px; margin-right: 0px;" class="fa fa-lg fa-fw fa-pencil"></i>EDIT</button>';
                  
               // $sub_array[] = '<button type="button" name="delete" id="'.$row->ID.'" class="btn btn-danger btn-xs">Delete</button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->Table_model->get_all_data('testimonial'),    
                "recordsFiltered"     =>     $this->Table_model->get_filtered_data_Testimonial(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      }

      function fetch_Gallery(){      
           $fetch_data = $this->Table_model->make_datatables_Gallery(); 
           $data = array();   
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '';
                
                $sub_array[] = $row->img_title;
                $sub_array[] = '<img src="'.$row->img_url.'" alt="IMG" height="50" width="50">';
                $sub_array[] = '<div  class="animated-checkbox" style="display: inline-block;">
                <label><input onclick="shakeDeleteBtn()" class="checkbox" type="checkbox" value="'.$row->ID.'"><span class="label-text"></span></label>
                </div>
                <button onclick="editGallery($(this))" value="'.$row->ID.'" class="btn btn-outline-info btn-sm" style="" type="button"><i style ="font-size: 12px; margin-right: 0px;" class="fa fa-lg fa-fw fa-pencil"></i>EDIT</button>';
                  
               // $sub_array[] = '<button type="button" name="delete" id="'.$row->ID.'" class="btn btn-danger btn-xs">Delete</button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->Table_model->get_all_data('gallery'),    
                "recordsFiltered"     =>     $this->Table_model->get_filtered_data_Gallery(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      }

      function fetch_Solution(){      
           $fetch_data = $this->Table_model->make_datatables_Solution(); 
           $data = array();   
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '';
                
                $sub_array[] = $row->title;
                $sub_array[] = $row->subTitle;
                $sub_array[] = substr($row->description, 0, 70).(strlen(trim($row->description)) > 70 ? '...' : '');
                $sub_array[] = '<img src="'.$row->img_url.'" alt="IMG" height="50" width="50">';
                if($row->isActive == 1){
                $sub_array[] = '<div  class="animated-checkbox" style="display: inline-block;">
                <label><input onclick="shakeDeleteBtn()" class="checkbox" type="checkbox" value="'.$row->ID.'"><span class="label-text"></span></label>
                </div>
                <button onclick="editSolution($(this))" value="'.$row->ID.'" class="btn btn-outline-info btn-sm" style="" type="button"><i style ="font-size: 12px; margin-right: 0px;" class="fa fa-lg fa-fw fa-pencil"></i>EDIT</button>';
                }elseif($row->isActive == 0){
                  $sub_array[] = '<div  class="animated-checkbox" style="display: inline-block;">
                <label><input onclick="shakeDeleteBtn()" class="checkbox" type="checkbox" value="'.$row->ID.'"><span class="label-text"></span></label>
                </div>
                <button onclick="editSolution($(this))" value="'.$row->ID.'" class="btn btn-outline-info btn-sm" style="" type="button"><i style ="font-size: 12px; margin-right: 0px;" class="fa fa-lg fa-fw fa-pencil"></i>EDIT</button>
                <button onclick="enableSolution($(this))" value="'.$row->ID.'" class="btn btn-info btn-sm" style="" type="button"></i>Enable</button>';
                }  
               // $sub_array[] = '<button type="button" name="delete" id="'.$row->ID.'" class="btn btn-danger btn-xs">Delete</button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->Table_model->get_all_data('solution'),    
                "recordsFiltered"     =>     $this->Table_model->get_filtered_data_Solution(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      }

      function fetch_Home(){      
           $fetch_data = $this->Table_model->make_datatables_Home(); 
           $data = array();   
           foreach((Array)$fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '';
                
                $sub_array[] = substr($row->heading1, 0, 30).(strlen(trim($row->heading1)) > 30 ? '...' : '');
                $sub_array[] = substr($row->heading2, 0, 30).(strlen(trim($row->heading2)) > 30 ? '...' : '');
                $sub_array[] = substr($row->description, 0, 60).(strlen(trim($row->description)) > 30 ? '...' : '');
                $sub_array[] = '<img src="'.$row->img_url.'" alt="No IMG" height="50" width="50">';
                if($row->isActive == 1){
                $sub_array[] = '<div  class="animated-checkbox" style="display: inline-block;">
                <label><input onclick="shakeDeleteBtn()" class="checkbox" type="checkbox" value="'.$row->ID.'"><span class="label-text"></span></label>
                </div>
                <button onclick="editHome($(this))" value="'.$row->ID.'" class="btn btn-outline-info btn-sm" style="" type="button"><i style ="font-size: 12px; margin-right: 0px;" class="fa fa-lg fa-fw fa-pencil"></i>EDIT</button>';
                }elseif($row->isActive == 0){
                  $sub_array[] = '<div  class="animated-checkbox" style="display: inline-block;">
                <label><input onclick="shakeDeleteBtn()" class="checkbox" type="checkbox" value="'.$row->ID.'"><span class="label-text"></span></label>
                </div>
                <button onclick="editHome($(this))" value="'.$row->ID.'" class="btn btn-outline-info btn-sm" style="" type="button"><i style ="font-size: 12px; margin-right: 0px;" class="fa fa-lg fa-fw fa-pencil"></i>EDIT</button>
                <button onclick="enableHome($(this))" value="'.$row->ID.'" class="btn btn-info btn-sm" style="" type="button"></i>Enable</button>';
                }  
               // $sub_array[] = '<button type="button" name="delete" id="'.$row->ID.'" class="btn btn-danger btn-xs">Delete</button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->Table_model->get_all_data('home'),    
                "recordsFiltered"     =>     $this->Table_model->get_filtered_data_Home(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      }

      function fetch_Job_list(){      
           $fetch_data = $this->Table_model->make_datatables_Job_list();   
           $data = array();   
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '';
                
                $sub_array[] = $row->title;
                $sub_array[] = $row->location; 
                $sub_array[] = $row->keyset;
                $sub_array[] = $row->experience;  

                $sub_array[] = '<div  class="animated-checkbox" style="display: inline-block;">
                <label><input onclick="shakeDeleteBtn()" class="checkbox" type="checkbox" value="'.$row->ID.'"><span class="label-text"></span></label>
                </div>
                <button onclick="editJobList($(this))" value="'.$row->ID.'" class="btn btn-outline-info btn-sm" style="" type="button"><i style ="font-size: 12px; margin-right: 0px;" class="fa fa-lg fa-fw fa-pencil"></i>EDIT</button>';
                  
               // $sub_array[] = '<button type="button" name="delete" id="'.$row->ID.'" class="btn btn-danger btn-xs">Delete</button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->Table_model->get_all_data('job_list'),    
                "recordsFiltered"     =>     $this->Table_model->get_filtered_data_Job_list(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      } 

      function fetch_Resume_list(){      
           $fetch_data = $this->Table_model->make_datatables_Resume_list();   
           $data = array();   
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '';
                $newDate = date("d-m-Y", strtotime($row->upload_date)); 
                $sub_array[] = $newDate;

                $sub_array[] = '<a href="'.$row->file_path.'" download="'.$row->fileName.'">
                                <i class="fa fa-download" aria-hidden="true" style="font-size:20px"></i>&nbsp;&nbsp;  <span>'.$row->fileName.'</span> 
                                </a>'; 
  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->Table_model->get_all_data('resume'),    
                "recordsFiltered"     =>     $this->Table_model->get_filtered_data_Resume_list(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      } 

      function fetch_ContactUs(){      
           $fetch_data = $this->Table_model->make_datatables_ContactUs();   
           $data = array();   
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '';

                $sub_array[] = $row->fname;
                $sub_array[] = $row->lname;
                $sub_array[] = $row->email;
                $newDate = date("d-m-Y", strtotime($row->added_on)); 
                $sub_array[] = $newDate;
                $sub_array[] = '<button onclick="viewContactUs($(this))" value="'.$row->ID.'" class="btn btn-outline-info btn-sm" style="" type="button">View</button>';
  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->Table_model->get_all_data('contact_us'),    
                "recordsFiltered"     =>     $this->Table_model->get_filtered_data_ContactUs(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      } 

      function fetch_Subscribe_list(){      
           $fetch_data = $this->Table_model->make_datatables_Subscribe_list();   
           $data = array();   
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '';
                

                $sub_array[] = $row->email; 
                $newDate = date("d-m-Y", strtotime($row->added_on)); 
                $sub_array[] = $newDate;                
  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->Table_model->get_all_data('subscribe'),    
                "recordsFiltered"     =>     $this->Table_model->get_filtered_data_Subscribe_list(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      } 

      function fetch_Project(){      
           $fetch_data = $this->Table_model->make_datatables_Project_list();   
           $data = array();   
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '';
                
                $sub_array[] = $row->client; 
                $sub_array[] = $row->client_code; 
                $sub_array[] = date("d-M-Y", strtotime($row->proj_receive_date)); 
                $sub_array[] = date("d-M-Y", strtotime($row->invoice_date)); 
                $sub_array[] = $row->po; 
                $sub_array[] = $row->invoice_no; 
                $sub_array[] = $row->proj_id; 
                $sub_array[] = $row->proj_name; 
                $sub_array[] = $row->deliveries; 
                $sub_array[] = $row->cost; 
                $sub_array[] = $row->pm; 
                $sub_array[] = $row->dp_on_job; 
                $sub_array[] = $row->comment; 
              
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->Table_model->get_all_data('project_excel'),    
                "recordsFiltered"     =>     $this->Table_model->get_filtered_data_Project_list(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      }

      function fetch_ProjectManagement(){      
           $fetch_data = $this->Table_model->make_datatables_ProjectManagement_list();   
           $data = array();   
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '';
                
                $sub_array[] = $row->proj_detail; 
                $sub_array[] = $row->work_phase; 
                $sub_array[] = $row->client; 
                $sub_array[] = $row->pm; 
                $sub_array[] = $row->dp_contact; 
                $sub_array[] = $row->dp_cur_work; 
                $sub_array[] = $row->Last_date_rec; 
                $sub_array[] = $row->deliverable; 
                $sub_array[] = $row->setup_qa_effort; 
                $sub_array[] = $row->date_a; 
                $sub_array[] = $row->date_b; 
                $sub_array[] = $row->date_c; 
                $sub_array[] = $row->date_d;
                $sub_array[] = $row->date_e;
                $sub_array[] = $row->date_f;
                $sub_array[] = $row->date_g;
                $sub_array[] = $row->remark;
                $sub_array[] = $row->qc_effort;
                $sub_array[] = $row->qc_by;
                $sub_array[] = $row->qa_priority;
                $sub_array[] = date("d-M-Y", strtotime($row->field_closure)); 
              
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->Table_model->get_all_data('project_management'),    
                "recordsFiltered"     =>     $this->Table_model->get_filtered_data_ProjectManagement_list(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      }

      
 }  