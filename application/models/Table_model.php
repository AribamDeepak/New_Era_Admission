<?php  
 class Table_model extends CI_Model  
 {  

    // Employee data model start here

      var  $order_column_EmpUser = array(null,"User_Name","Email","team", "wave",null);  
      function make_query_EmpUser()  
      {     
          $this->db->select('ID,User_Name,Email,Role,team,wave');
          $this->db->from('user_admin');
          $this->db->where_in('Role', array('admin','employee'));
          $this->db->where('isActive', 1);

           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->group_start();
                $this->db->like("User_Name", $_POST["search"]["value"]);  
                $this->db->or_like("Email", $_POST["search"]["value"]);   
                $this->db->or_like("team", $_POST["search"]["value"]);
                $this->db->or_like("wave", $_POST["search"]["value"]);
                $this->db->group_end();
           }  
           
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column_EmpUser[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('ID', 'ASC');  
           }  
            
      }  
      function make_datatables_EmpUser(){   
           $this->make_query_EmpUser();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data_EmpUser(){  
           $this->make_query_EmpUser();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }  


      // Client data model start here

      var  $order_column_ClientUser = array(null,"User_Name","Email","team", null);  
      function make_query_ClientUser()  
      {     
          $this->db->select('ID,User_Name,Email,Role,team');
          $this->db->from('user_admin');
          $this->db->where('Role', 'client');
          $this->db->where('isActive', 1);

           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->group_start();
                $this->db->like("User_Name", $_POST["search"]["value"]);  
                $this->db->or_like("Email", $_POST["search"]["value"]);   
                $this->db->or_like("team", $_POST["search"]["value"]);
                $this->db->group_end();
           }  
           
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column_Client[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('ID', 'ASC');  
           }  
            
      }  
      function make_datatables_ClientUser(){   
           $this->make_query_ClientUser();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data_ClientUser(){  
           $this->make_query_ClientUser();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }  


      // JOB data model start here

      var  $order_column_Job = array(null,"job_id","name","client", null);  
      function make_query_Job()  
      {     
          $this->db->select('ID,name,job_id,client');
          $this->db->from('job');
          $this->db->where('isActive', 1);

           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->group_start();
                $this->db->like("job_id", $_POST["search"]["value"]);  
                $this->db->or_like("name", $_POST["search"]["value"]);   
                $this->db->or_like("client", $_POST["search"]["value"]);
                $this->db->group_end();
           }  
           
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column_Job[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('ID', 'ASC');  
           }  
            
      }  
      function make_datatables_Job(){   
           $this->make_query_Job();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data_Job(){  
           $this->make_query_Job();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }  

    // Common function
      function get_all_data($tblName)  
      {  
           $this->db->select("*");  
           $this->db->from($tblName);  
           $this->db->where('isActive', 1); 
           return $this->db->count_all_results();  
      }  

      // JOB data model start here

      var  $order_column_Testimonial = array(null,"name","star",null,"comment", null);  
      function make_query_Testimonial()  
      {     
          $this->db->select('ID,name,star,testi_date,comment');
          $this->db->from('testimonial');
          $this->db->where('isActive', 1);

           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->group_start();
                $this->db->like("name", $_POST["search"]["value"]);  
                $this->db->or_like("star", $_POST["search"]["value"]);   
                // $this->db->or_like("comment", $_POST["search"]["value"]);
                $this->db->group_end();
           }  
           
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column_Testimonial[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('ID', 'DESC');  
           }  
            
      }  
      function make_datatables_Testimonial(){   
           $this->make_query_Testimonial();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data_Testimonial(){  
           $this->make_query_Testimonial();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }  

      // Gallery data model start here

      var  $order_column_Gallery = array(null,"img_title","img_url",null);  
      function make_query_Gallery()  
      {     
          $this->db->select('ID,img_title,img_url');
          $this->db->from('gallery');
          $this->db->where('isActive', 1);

           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->group_start();
                $this->db->like("img_title", $_POST["search"]["value"]);  
                // $this->db->or_like("star", $_POST["search"]["value"]);   
                // $this->db->or_like("comment", $_POST["search"]["value"]);
                $this->db->group_end();
           }  
           
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column_Gallery[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('ID', 'DESC');  
           }  
            
      }  
      function make_datatables_Gallery(){   
           $this->make_query_Gallery();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data_Gallery(){  
           $this->make_query_Gallery();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }  

      // Solution data model start here

      var  $order_column_Solution = array(null,"title","subTitle",null,null, null);  
      function make_query_Solution()  
      {     
          $this->db->select('ID,title,subTitle,description,img_url,isActive');
          $this->db->from('solution');
          // $this->db->where('isActive', 1);

           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->group_start();
                $this->db->like("title", $_POST["search"]["value"]);  
                $this->db->or_like("subTitle", $_POST["search"]["value"]);   
                // $this->db->or_like("comment", $_POST["search"]["value"]);
                $this->db->group_end();
           }  
           
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column_Solution[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('ID', 'DESC');  
           }  
            
      }  
      function make_datatables_Solution(){   
           $this->make_query_Solution();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data_Solution(){  
           $this->make_query_Solution();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }  

      // Home data model start here

      var  $order_column_Home = array(null,"heading1","heading2",null,null, null);  
      function make_query_Home()  
      {     
          $this->db->select('ID,heading1,heading2,description,img_url,isActive');
          $this->db->from('home');
          // $this->db->where('isActive', 1);

           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->group_start();
                $this->db->like("heading1", $_POST["search"]["value"]);  
                $this->db->or_like("heading2", $_POST["search"]["value"]);   
                // $this->db->or_like("comment", $_POST["search"]["value"]);
                $this->db->group_end();
           }  
           
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column_Home[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('ID', 'DESC');  
           }  
            
      }  
      function make_datatables_Home(){   
           $this->make_query_Home();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data_Home(){  
           $this->make_query_Home();  
           $query = $this->db->get();  
           return $query->num_rows();  
      } 

      // JOB List data model start here

      var  $order_column_Job_list = array(null,"title","location","keyset","experience", null);  
      function make_query_Job_list()  
      {     
          $this->db->select('ID,title,location,keyset,experience');
          $this->db->from('job_list');
          $this->db->where('isActive', 1);

           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->group_start();
                $this->db->like("title", $_POST["search"]["value"]);  
                $this->db->or_like("location", $_POST["search"]["value"]);   
                $this->db->or_like("keyset", $_POST["search"]["value"]);
                $this->db->or_like("experience", $_POST["search"]["value"]);
                $this->db->group_end();
           }  
           
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column_Job_list[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('ID', 'ASC');  
           }  
            
      }  
      function make_datatables_Job_list(){   
           $this->make_query_Job_list();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data_Job_list(){  
           $this->make_query_Job_list();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }  

      // RESUME List data model start here

      var  $order_column_Resume_list = array(null, null, null);  
      function make_query_Resume_list()  
      {     
          $this->db->select('ID,upload_date,file_path,fileName');
          $this->db->from('resume');
          $this->db->where('isActive', 1);

           // if(isset($_POST["search"]["value"]))  
           // {  
           //      $this->db->group_start();
           //      $this->db->like("title", $_POST["search"]["value"]);  
           //      $this->db->or_like("location", $_POST["search"]["value"]);   
           //      $this->db->or_like("keyset", $_POST["search"]["value"]);
           //      $this->db->or_like("experience", $_POST["search"]["value"]);
           //      $this->db->group_end();
           // }  
           
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column_Resume_list[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('ID', 'ASC');  
           }  
            
      }  
      function make_datatables_Resume_list(){   
           $this->make_query_Resume_list();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data_Resume_list(){  
           $this->make_query_Resume_list();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }             

      // RESUME List data model start here

      var  $order_column_ContactUs = array(null,'fname','lname','email', null, null);  
      function make_query_ContactUs()  
      {     
        $this->db->select('ID,fname,lname,email,added_on');
        $this->db->from('contact_us');
        $this->db->where('isActive', 1);

         if(isset($_POST["search"]["value"]))  
         {  
            $this->db->group_start();
            $this->db->like("fname", $_POST["search"]["value"]);  
            $this->db->or_like("lname", $_POST["search"]["value"]);   
            $this->db->or_like("email", $_POST["search"]["value"]);
            $this->db->group_end();
         }  
         
         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_column_ContactUs[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('ID', 'DESC');  
         }  
            
      }  
      function make_datatables_ContactUs(){   
           $this->make_query_ContactUs();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data_ContactUs(){  
           $this->make_query_ContactUs();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }  

      // RESUME List data model start here

      var  $order_column_Subscribe_list = array(null, 'email', null, null);  
      function make_query_Subscribe_list()  
      {     
          $this->db->select('ID,email,added_on');
          $this->db->from('subscribe');
          $this->db->where('isActive', 1);

           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->group_start();
                $this->db->like("email", $_POST["search"]["value"]);  
                $this->db->group_end();
           }  
           
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column_Subscribe_list[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('ID', 'DESC');  
           }  
            
      }  
      function make_datatables_Subscribe_list(){   
           $this->make_query_Subscribe_list();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data_Subscribe_list(){  
           $this->make_query_Subscribe_list();  
           $query = $this->db->get();  
           return $query->num_rows();  
      } 

      // RESUME List data model start here

      var  $order_column_Project_list = array(null, 'client', 'client_code', 'proj_receive_date', 'invoice_date', 'po', 'invoice_no', 'proj_id', 'proj_name', 'deliveries', 'cost', 'pm', 'dp_on_job', 'comment');  
      function make_query_Project_list()  
      {     
          $this->db->select('ID,client,client_code,proj_receive_date,invoice_date,po,invoice_no,proj_id,proj_name,deliveries,cost,pm,dp_on_job,comment');
          $this->db->from('project_excel');
          $this->db->where('ID !=', 1);

           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->group_start();
                $this->db->like("client", $_POST["search"]["value"]); 
                $this->db->or_like("client_code", $_POST["search"]["value"]); 
                $this->db->or_like("po", $_POST["search"]["value"]);  
                $this->db->or_like("invoice_no", $_POST["search"]["value"]); 
                $this->db->or_like("proj_id", $_POST["search"]["value"]); 
                $this->db->or_like("proj_name", $_POST["search"]["value"]); 
                $this->db->or_like("deliveries", $_POST["search"]["value"]); 
                $this->db->or_like("cost", $_POST["search"]["value"]); 
                $this->db->or_like("pm", $_POST["search"]["value"]); 
                $this->db->or_like("pm", $_POST["search"]["value"]); 
                $this->db->or_like("comment", $_POST["search"]["value"]); 
                $this->db->group_end();
           }  
           
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column_Project_list[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('ID', 'ASC');  
           }  
            
      }  
      function make_datatables_Project_list(){   
           $this->make_query_Project_list();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data_Project_list(){  
           $this->make_query_Project_list();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }

      // RESUME List data model start here

      var  $order_column_ProjectManagement_list = array(null, 'proj_detail', 'work_phase', 'client', 'pm', 'dp_contact', 'dp_cur_work', 'Last_date_rec', 'deliverable', 'setup_qa_effort', 'date_a', 'date_b', 'date_c', 'date_d', 'date_e', 'date_f', 'date_g', 'remark', 'qc_effort', 'qc_by', 'qa_priority', 'field_closure');  
      function make_query_ProjectManagement_list()  
      {     
          $this->db->select('ID,proj_detail,work_phase,client,pm,dp_contact,dp_cur_work,Last_date_rec,deliverable,setup_qa_effort,date_a,date_b,date_c,date_d,date_e,date_f,date_g,remark,qc_effort,qc_by,qa_priority,field_closure');
          $this->db->from('project_management');
          $this->db->where('ID !=', 1);

          if(isset($_POST["search"]["value"]))  
          {  
            $this->db->group_start();
            $this->db->like("proj_detail", $_POST["search"]["value"]); 
            $this->db->or_like("work_phase", $_POST["search"]["value"]); 
            $this->db->or_like("client", $_POST["search"]["value"]);  
            $this->db->or_like("pm", $_POST["search"]["value"]); 
            $this->db->or_like("dp_contact", $_POST["search"]["value"]); 
            $this->db->or_like("dp_cur_work", $_POST["search"]["value"]); 
            $this->db->or_like("Last_date_rec", $_POST["search"]["value"]); 
            $this->db->or_like("deliverable", $_POST["search"]["value"]); 
            $this->db->or_like("setup_qa_effort", $_POST["search"]["value"]); 
            $this->db->or_like("remark", $_POST["search"]["value"]); 
            $this->db->or_like("qc_effort", $_POST["search"]["value"]);
            $this->db->or_like("qc_by", $_POST["search"]["value"]); 
            $this->db->or_like("qa_priority", $_POST["search"]["value"]); 
            $this->db->or_like("field_closure", $_POST["search"]["value"]);  
            $this->db->group_end();
          }  
           
          if(isset($_POST["order"]))  
          {  
            $this->db->order_by($this->order_column_ProjectManagement_list[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
          }  
          else  
          {  
            $this->db->order_by('ID', 'ASC');  
          }  
            
      }  
      function make_datatables_ProjectManagement_list(){   
           $this->make_query_ProjectManagement_list();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data_ProjectManagement_list(){  
           $this->make_query_ProjectManagement_list();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }  
 } 