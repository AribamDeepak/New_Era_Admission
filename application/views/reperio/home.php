<?php $this->load->view('reperio/global/header');?>
<body>
    <!-- Preloader Part Start -->
    <div class="preload-main">
        <div class='preloader'>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- Preloader Part End -->
    <!-- HEADER AREA START -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo site_url();?>"><img src="<?php echo base_url();?>assets/reperio/image/rep_white.svg" width="100%"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>

            <div class="collapse navbar-collapse menu-main" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto menu-item">
                    <li class="nav-item">
                        <a class="nav-link" href="#banner">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#service">Solutions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio">Gallery</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#team">Careers</a>
                    </li>
                   <!--   <li class="nav-item">
                        <a class="nav-link" href="#" >Reports</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact Us</a>
                    </li>
 
                    <?php if($this->session->userdata('loginStatus') == true && $this->session->userdata('userrole') == 'client'){ ?>
                    <li class="nav-item baner-text">
                        <a class="nav-link ban-btn1" href="<?=site_url('Home/ClientHome')?>">ClIENT PAGE</a>
                    </li>
                    <?php }else{ ?>
                    <li class="nav-item baner-text">
                        <a class="nav-link ban-btn1" href="<?=site_url('Home/ClientLogin')?>">CLIENT LOGIN</a>
                    </li>
                    <?php } ?>

                    <?php if($this->session->userdata('loginStatus') == true && $this->session->userdata('userrole') == 'employee'){ ?>
                    <li class="nav-item baner-text">
                        <a class="nav-link ban-btn1" href="<?=site_url('Home/EmplpyeeHome')?>">EMPLOYEE PAGE</a>
                    </li>
                    <?php }else{ ?>
                    <li class="nav-item baner-text">
                        <a class="nav-link ban-btn1" href="<?=site_url('Home/EmployeeLogin')?>">EMPLOYEE LOGIN</a>
                    </li>
                    <?php } ?>

                    <?php if($this->session->userdata('loginStatus') == true && ($this->session->userdata('userrole') == 'client' || $this->session->userdata('userrole') == 'employee')){ ?>
                    <li class="nav-item baner-text">
                        <a class="nav-link ban-btn1" href="<?=site_url('login/logoutReperio')?>"><i class="fa fa-power-off" aria-hidden="true" style="font-size: 1em;" ></i>&nbsp;&nbsp;LOGOUT</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- HEADER AREA END -->

    <!-- BANNER AREA START -->
    <section id="banner">
        <i class="fa fa-angle-left slidPrv" aria-hidden="true"></i>
        <i class="fa fa-angle-right slidNext" aria-hidden="true"></i>
        <div class="slider-img">
            <?php  foreach ((Array)$result_home as $row)   { ?>
            <div class="slide-banner" style="background: url(<?php echo $row['img_url']; ?>)">
                <div class="overly">
                    <div class="banner-content">
                        <div class="container text-center">
                            <div class="banner-text">
                                <h2><?php echo $row['heading1']; ?></h2>
                                <h3><?php echo $row['heading2']; ?></h3>
                                <p><?php echo $row['description']; ?></p>
                                <a class="ban-btn" id="" href="#about_sec">Let's Get Started</a>
                                <div class="social-icon text-center">
                                    <a href="https://www.facebook.com/reperioinformatics"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="https://twitter.com/reperio_info"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="https://www.linkedin.com/company/9281576"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
		
    </section>
    <!-- BANNER AREA END -->

    <!-- MARKET AREA START -->
    <div id="market">
        <div class="container-fluid" style="padding-right: 100px;padding-left: 100px;">
            <div class="row">
			
                <div class="col-lg-12">
                    <div class="market-main">
					<?php  foreach ((Array)$result_solution as $key=>$row1)   { ?>
					   <div class="col-lg-3">
                            <div class="market-item">
                                <img src="<?php echo $row1['img_url']; ?>" alt="company-img" class="img-fluid" style="width:50px;display:inline-block;">
									<p style="display:inline-block"><b style="font-size: 0.9em;"><?php  echo $row1['title']; ?></b></p>
                            </div>
                        </div>
                        <?php } ?>
				    </div>
                </div>
            </div>
        </div>
	<span id="about_sec"></span>	
    </div>
    <!-- MARKET AREA START -->

    <!-- ABOUT AREA START -->
    <section id="about">
        <div class="backtotop">
            <a href="#banner"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 about-head">
                    <h2>ABOUT US</h2>
                    <h3>COMPANY OVERVIEW</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-8 apt">
                    <div class="about-img">
                        <img src="<?php echo $result_aboutUs['about_image']; ?>" alt="about-img" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-7 about-text">
                    
                    <div class="about-p" style="text-align: justify;">
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size: 1.5em;"><?php $firstString = strtok($result_aboutUs['about_message'], " "); echo $firstString; ?></b> <?php echo preg_replace('/'.$firstString.'/', '', $result_aboutUs['about_message'], 1); ?></p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $result_aboutUs['about_message2']; ?></p>
                    </div>
                    <div class="row counter-main">
                        <div class="counter-1 col-lg-12">
                            <div style="text-align: center; padding-bottom: 15px;"><img src="<?php echo base_url();?>assets/reperio/image/vision.svg" width="150"></div>
                            <h4>Our Mission</h4>
                            <p><?php echo $result_aboutUs['mission_message']; ?></p>
                        </div>
                     
                    </div>
                </div>
				
            </div>
        </div>
    </section>
    <!-- ABOUT AREA END -->

    <!-- SOLUTION AREA START -->
    <section id="service">
	
        <div class="container">
            <div class="row">
                <div class="col-lg-4 service-p">
                    <div class="about-head" style="padding-bottom: 30px;">
                        <h2>SOLUTIONS</h2>
                        <h3>WE PROVIDE</h3>
                    </div>
                </div>
            </div>
			
			
            <div class="row mt-30">
                <div class="col-md-12">
                    <div id="solution-content">
                        <?php  foreach ((Array)$result_solution as $key=>$row)   { ?>
                        <div class="solution-tab " style="box-shadow: none !important;">
                            <input id="item-<?php echo $key; ?>" type="checkbox" class="solution-input" name="solution">
                            <label for="item-<?php echo $key; ?>" class="solution-label"></label>
                            <div class="" style="height: 80px;
    padding: 15px;">
                                <div class="solution-info">
                                    <div class="rep positive">
                                        <span class=""><img src="<?php echo $row['img_url']; ?>" width="50"></span>
                                        <div>

                                        </div>
                                    </div>
                                    <span class="solution-name" style="font-size: 19px;color:#555555;"><?php echo $row['title']; ?></span>
                                </div>
                            </div>
                            <div class="solution-tab-content" style="background: white;border-bottom: 1px solid #f8f2f2;">
                                <div class="rep-wrapper">
                                    <div>
                                        <div>
                                           
                                            <div>
                                                <span style="font-size: 15px; line-height:24px;color:#555555;"><?php echo $row['description']; ?></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- SERVICE AREA END -->

    <!-- Gallery AREA START -->
    <section id="portfolio" class="portfolio-bg gallery-block cards-gallery">
        <div class="port-overly"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 about-head heading-bg">
                    <h2>GALLERY</h2>
                    <h3>SOME OF OUR DESKTOP AND WEB APPLICATIONS</h3>
                </div>
            </div>
            <div class="row apt2">
                <?php  foreach ((Array)$result_gallery as $row)   { ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 ">
                        <a class="lightbox" href="<?php echo $row['img_url']; ?>">
                            <img src="<?php echo $row['img_url']; ?>" alt="Card Image" class="card-img-top">
                        </a>
                        <div class="card-body">
                            <h6><a href="<?php echo $row['img_url']; ?>"><?php echo $row['img_title']; ?></a></h6>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php if($result_gallery_count > 9){ ?>
                <div class="col-md-12 col-lg-12 user-form text-center">
                    <button type="button" class="btn btn-primary" onclick="LoadMorePicture('1',this)"> View More...</button>
                </div>    
                <?php } ?>
			
            </div>
        </div>
    </section>
    <!-- Gallery AREA END -->

    

    <!-- TEAM AREA START -->
    <section id="team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 about-head" style="margin-bottom: 30px;">
                    <h2>CAREERS</h2>
                    <h3>JOIN THE BEST TEAM</h3>
                </div>
        
                <div class="col-md-8">
                   <h3 style=" font-size: 20px;padding-bottom: 10px;"><?php echo $result_career['title']; ?></h3>
                    <p style="margin-bottom: 20px;"><?php echo $result_career['desc']; ?></p>

                    <table id="customers">
                      <tr>

                        <th>Job Title</th>
                        <th>Location</th>
                        <th>Key Skill Set</th>
                        <th>Work Experience</th>
                    </tr>
                    <?php  foreach ((Array)$result_job_list as $row)   { ?>
                    <tr>

                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                        <td><?php echo $row['keyset']; ?></td>
                        <td><?php echo $row['experience']; ?></td>
                    </tr>
                    <?php  } ?>

                </table>
                    
                   
                </div>

                <div class="col-md-4">
                    <div class="file-upload">
                        <form id="resumeUploadForm">
                            <div class="image-upload-wrap">
                                <input class="file-upload-input" type='file' id="resumeFile" name="files" onchange="readURL(this);" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf" />
                                 <div class="drag-text">
                                    <div class="apt2"><img src="<?php echo base_url();?>assets/reperio/image/testimonial2.png"></div>
                                        <h3>Drag and drop your<br>resume here</h3>
                                </div>
                            </div>
                            <div class="file-upload-content">
                                <img class="file-upload-image" src="#" alt="" />
                                <div class="image-title-wrap">
                                  <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                              </div>
                              <button type="button" id="resumeBtn" onclick="uploadResume(this)" class="btn1"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Submit</button>
                              <span id="uploadResumeMessage" class="form-text" style="color: #f1871a;padding-left: 16px; display: none;">Uploading ...</span>
                              <span id="successResumeMessage" class="form-text" style="color: #938c8c;padding-left: 16px; display: none;"> Uploaded Successfully !!!</span>
                              <span id="failResumeMessage" class="form-text" style="color: #938c8c;padding-left: 16px; display: none;">Fail to upload... Please try again later !!!</span>
                              <span id="emptyResumeMessage" class="form-text" style="color: #938c8c;padding-left: 16px; display: none;">Select resume file please !!!</span>
                            </div>
                        </form>
                    </div>
              </div>
        </div>
  
</section>
    <!-- TEAM AREA END -->

    <!-- COUNT AREA START 
    <section id="count">
        <div class="container zindex">
            <div class="row">
                <div class="col-lg-3 col-sm-6 text-center">
                    <div class="count-item">
                        <div class="count-icon">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                        </div>
                        <div class="count-text">
                            <h3>Work <span>Done</span></h3>
                            <p class="counter" data-counterup-time="1500" data-counterup-delay="30" data-counterup-beginat="100">23,502,73</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 text-center">
                    <div class="count-item">
                        <div class="count-icon">
                            <i class="fa fa-users" aria-hidden="true"></i>
                        </div>
                        <div class="count-text">
                            <h3>Happy <span>Client</span></h3>
                            <p class="counter" data-counterup-time="1500" data-counterup-delay="30" data-counterup-beginat="100">35,420,83</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 text-center">
                    <div class="count-item">
                        <div class="count-icon">
                            <i class="fa fa-coffee" aria-hidden="true"></i>
                        </div>
                        <div class="count-text">
                            <h3>Coffee <span>Taken</span></h3>
                            <p class="counter" data-counterup-time="1500" data-counterup-delay="30" data-counterup-beginat="100">85,733,99</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 text-center">
                    <div class="count-item">
                        <div class="count-icon">
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                        <div class="count-text">
                            <h3>Got <span>Award</span></h3>
                            <p class="counter" data-counterup-time="1500" data-counterup-delay="30" data-counterup-beginat="100">13,020</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    COUNT AREA END -->

    

    <!-- CONTACT AREA START -->
    <section id="contact" >
        <div class="" style="padding: 80px 0;
    background-color: rgba(50, 91, 93, 0.86);">
        <div class="container zindex">
            <div class="row">
                <div class="col-lg-12 about-head heading-bg form-head">
                    <h2>CONTACT US</h2>
                    <h3>STAY CONNECTED EVERYTIME</h3>
                </div>
            </div>
        </div>
        <div class="container zindex">
            <div class="row">
                <div class="col-lg-6 form-p">
                    <div class="user-form">
                        <form id="contactUsForm">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> <i class="fa fa-user-o" aria-hidden="true"></i> Your first name</label>
                                        <input type="text" class="form-control" id="fname_txt" name="fname" placeholder="First Name" required >
                                        <small id="firstName_validate" class="form-text" style="color: #d74545; display: none;">Please fill  First Name.</small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> <i class="fa fa-user-o" aria-hidden="true"></i> Your last name</label>
                                        <input type="text" class="form-control" id="lname_txt" name="lname" placeholder="Last Name" required >
                                        <small id="LastName_validate" class="form-text" style="color: #d74545; display: none;">Please fill Last Name.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><i class="fa fa-envelope-o" aria-hidden="true"></i> Your email address</label>
                                        <input type="email" class="form-control" id="email_txt" name="email" placeholder="name@example.com" required >
                                        <small id="emailEmpty_validate" class="form-text" style="color: #d74545; display: none;">Please fill Email Address.</small>
                                        <small id="emailCorrect_validate" class="form-text" style="color: #d74545; display: none;">Please fill Valid Email Address.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"><i class="fa fa-comments-o" aria-hidden="true"></i> Message</label>
                                        <textarea class="form-control" id="message_txt" name="message" rows="3" placeholder="Type here...." required ></textarea>
                                        <small id="Message_validate" class="form-text" style="color: #d74545; display: none;">Please fill Message.</small>
                                    </div>
                                </div>
                            </div>
                            <button type="button" onclick="sentContactUs(this)" class="btn btn-primary">
                                <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                                 Send It</button>
                                 <span id="sentMessage" class="form-text" style="color: #f1871a;padding-left: 16px; display: none;">Sending ...</span>
                                 <span id="successMessage" class="form-text" style="color: white;padding-left: 16px; display: none;">Sent Successfully !!!</span>
                                 <span id="failMessage" class="form-text" style="color: white;padding-left: 16px; display: none;">Fail to sent... Please try again later !!!</span>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 apt">
                <div class="row" style="color:#ccc;padding-left: 90px;">
                    <div class="col-md-6" style=" font-size: 15px;">
                       <b style="font-size: 18px;">INDIA</b>
                       <hr class="line-blue-left"/>

                  
                      EF-824 (Eighth Floor) <br>
                      JMD Megapolis IT Park<br>
                      Sohna Road, Sector 48 <br>
                      Gurugram, Haryana - 122018 <br><br>
                       <b>Phone:</b><br>
                       +91 9873 582 528<br>
                       +91 8586 925 466<br>
                      
                   </div>
                   <div class="col-md-6" style=" font-size: 15px;">
                       <b style="font-size: 18px;">UNITED STATES</b>
                       <hr class="line-blue-left"/>

                       760, Century Farm Lane,<br />
                       Naperville, <br />
                       IL 60563, <br />
                       USA <br /><br>
                       <b>Phone:</b><br>
                       +1 630 728 3216<br>
                       
                   </div>
                 
               
               </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- CONTACT AREA END -->

   

    <!-- TESTIMONIAL AREA START -->
    <section id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 about-head">
                    <h2>OUR TESTIMONIAL</h2>
                    <h3>LOOK WHAT PEOPLE SAY</h3>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-lg-12">
                    <div class="news-main">
                        <?php  foreach ((Array)$result_testimonial as $row)   { ?>
                        <div class="col-lg-6 col-md-6">
                            <div class="news-item-main">
                                <div class="news-items">
                                    <div class="testimonial-text">
                                        <p><i class="fa fa-quote-left" aria-hidden="true"></i> <?php echo $row['comment'];?><i class="fa fa-quote-right" aria-hidden="true"></i></p>
                                    </div>
                                    <div class="testimonial-img">
                                        <?php if($row['img_url'] != NULL){ ?>
                                        <div class="user-img">
                                            <img src="<?php echo $row['img_url']; ?>" height="90" width="90" alt="user-img">
                                        </div>
                                        <?php } ?>
                                        <div class="testimonial-img-text">
                                            <?php for($i=1;$i<=5;$i++) {
                                                if($i <= $row['star']){
                                                    echo '<i class="fa fa-star" aria-hidden="true"></i>';
                                                }else{
                                                   echo '<i class="fa fa-star-o" aria-hidden="true"></i>'; 
                                                }    
                                             } ?>
                                            <!-- <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star-half-o" aria-hidden="true"></i> -->
                                            <h4><?php echo $row['name'];?></h4>
                                            <span><?php if($row['testi_date']!='0000-00-00'){ echo date("d M, Y", strtotime($row['testi_date']));} ?></span>
                                        </div>
                                    </div>
                                    <div class="clr"></div>
                                </div>
                            </div>
                        </div>
                        <?php  } ?>   
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- TESTIMONIAL AREA END -->

	
	
    <?php $this->load->view('reperio/global/footer');?>

    <script type="text/javascript">
	
	$("a#about_btn").click(function() {
    $('html,body').animate({
        scrollTop: $("#about").offset().top},
        'slow');
});
	
	
	
    function uploadResume(btn){  
        v
        $('.form-text').hide();

        if ($('#resumeFile').val() == '') { 
            $('#emptyResumeMessage').css('display','block');
            return;
        }
        $('#uploadResumeMessage').css('display','block'); 
        var dataString = new FormData($('#resumeUploadForm')[0]);
        $(btn).attr("disabled", true);
         $.ajax({
          type: "post",
          url: "<?php echo site_url() . 'index.php/Data_controller/uploadResume'; ?>",
          cache: false,  
          crossDomain: true,
          xhrFields: { withCredentials: true },  
          data: dataString,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response){   
          try{     
             if (response.success)
                 { 
                    // alert(response.msg);
                   $('.form-text').hide();
                   $(btn).hide();
                   // $(btn).removeAttr("disabled");
                   $('#successResumeMessage').css('display','block');
                 } else
                 { 
                    // alert(response.msg);
                     $('.form-text').hide();
                     $(btn).removeAttr("disabled");
                     $('#failResumeMessage').html(response.msg);
                     $('#failResumeMessage').css('display','block');
                 }

          }catch(e) {  
            // alert( e);
            $('.form-text').hide();
             $(btn).removeAttr("disabled");
             $('#failResumeMessage').html(response.msg);
             $('#failResumeMessage').css('display','block');
          }  
          },
          error: function(){      
            // alert('Error while request..');
            $('.form-text').hide();
             $(btn).removeAttr("disabled");
             $('#failResumeMessage').html(response.msg);
             $('#failResumeMessage').css('display','block');
          }
         });
    } 
    function sentContactUs(btn){  

        $('.form-text').hide();

        if ($('#fname_txt').val() == '') { 
            $('#firstName_validate').css('display','block');
            $('#fname_txt').focus();
            return;
        }
        if ($('#lname_txt').val() == '') {
            $('#LastName_validate').css('display','block');
            $('#lname_txt').focus();
            return;
        }
        if ($('#email_txt').val() == '' ) {
            $('#emailEmpty_validate').css('display','block');
            $('#email_txt').focus();
            return;
        }
        if ( IsEmail($('#email_txt').val()) == false) {
            $('#emailCorrect_validate').css('display','block');
            $('#email_txt').focus();
            return;
        }
        if ($('#message_txt').val() == '') {
            $('#Message_validate').css('display','block');
            $('#message_txt').focus();
            return;
        }
        
        $('#sentMessage').css('display','block');
        var dataString = new FormData($('#contactUsForm')[0]);
        $(btn).attr("disabled", true);
         $.ajax({
          type: "post",
          url: "<?php echo site_url() . 'index.php/Data_controller/sentContactUs'; ?>",
          cache: false,  
          crossDomain: true,
          xhrFields: { withCredentials: true },  
          data: dataString,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response){   
          try{     
             if (response.success)
                 { 
                   $('.form-text').hide();
                   $(btn).hide();
                   // $(btn).removeAttr("disabled");
                   $('#successMessage').css('display','block');
                   $('#contactUsForm')[0].reset();
                 } else
                 { 
                     $('.form-text').hide();
                     $(btn).removeAttr("disabled");
                     $('#failMessage').css('display','block');
                 }

          }catch(e) {  
            // alert( e);
            $('.form-text').hide();
             $(btn).removeAttr("disabled");
             $('#failMessage').css('display','block');
          }  
          },
          error: function(){      
            // alert('Error while request..');
            $('.form-text').hide();
             $(btn).removeAttr("disabled");
             $('#failMessage').css('display','block');
          }
         });
    }     

    function sentSubscribeUs(btn){  

        $('.form-text').hide();

        if ($('#subscribe_email_txt').val() == '' ) {
            $('#subscribe_emailEmpty_validate').css('display','block');
            $('#subscribe_email_txt').focus();
            return;
        }
        if ( IsEmail($('#subscribe_email_txt').val()) == false) {
            $('#subscribe_emailCorrect_validate').css('display','block');
            $('#subscribe_email_txt').focus();
            return;
        }


        var dataString = new FormData($('#subscribeForm')[0]);
        $(btn).attr("disabled", true);
        $(btn).html("Sending...");
         $.ajax({
          type: "post",
          url: "<?php echo site_url() . 'index.php/Data_controller/sentSubscribeUs'; ?>",
          cache: false,  
          crossDomain: true,
          xhrFields: { withCredentials: true },  
          data: dataString,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response){   
          try{     
             if (response.success)
                 { 
                   $('.form-text').hide();
                   // $(btn).hide();
                   $(btn).html("<i class='fa fa-paper-plane-o' aria-hidden='true'></i> Send ");
                   $(btn).removeAttr("disabled");
                   $('#subscribe_successMessage').css('display','block');
                   $('#subscribe_successMessage').html(response.msg);
                   $('#subscribeForm')[0].reset();
                 } else
                 { 
                     $('.form-text').hide();
                     $(btn).removeAttr("disabled");
                     $(btn).html("<i class='fa fa-paper-plane-o' aria-hidden='true'></i> Send ");
                     $('#subscribe_failMessage').css('display','block');
                     $('#subscribe_failMessage').html(response.msg);
                 }

          }catch(e) {  
            // alert( e);
            $('.form-text').hide();
             $(btn).removeAttr("disabled");
             $(btn).html("<i class='fa fa-paper-plane-o' aria-hidden='true'></i> Send ");
             $('#subscribe_failMessage').css('display','block');
          }  
          },
          error: function(){      
            // alert('Error while request..');
            $('.form-text').hide();
             $(btn).removeAttr("disabled");
             $(btn).html("<i class='fa fa-paper-plane-o' aria-hidden='true'></i> Send ");
             $('#subscribe_failMessage').css('display','block');
          }
         });
    }     

    function LoadMorePicture(nos,btn){  
          $.ajax({
          type: "post",
          url: "<?php echo site_url() . 'index.php/Home/gallery'; ?>",
          cache: false,  
          crossDomain: true,
          xhrFields: { withCredentials: true },  
          data: {counter:nos},
          // contentType: false,
          // processData: false,
          dataType: 'json',
          success: function(response){   
          try{     
             if (response.success)
                 { 
                   $(btn).parent().parent().append(response.html);
                   $(btn).parent().remove(); 
                 } else
                 { 
                    alert('Sorry. Fail to load more picture...!!!');
                 }
          }catch(e) {  
             alert( e);
          }  
          },
          error: function(){      
             alert('Error while request..');

          }
         });
    }  
    </script>
    </body>

</html>
