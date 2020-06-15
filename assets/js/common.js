// baseURL for all javascript 
var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';
//   serializeObject
(function($){
  $.fn.serializeObject = function () {
    "use strict";

    var result = {};
    var extend = function (i, element) {
      var node = result[element.name];

  // If node with same name exists already, need to convert it to an array as it
  // is a multi-value field (i.e., checkboxes)

      if ('undefined' !== typeof node && node !== null) {
        if ($.isArray(node)) {
          node.push(element.value);
        } else {
          result[element.name] = [node, element.value];
        }
      } else {
        result[element.name] = element.value;
      }
    };

    $.each(this.serializeArray(), extend);
    return result;
  };
})(jQuery);

function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
       return false;
    }else{
       return true;
    }
  }

function checkAllCheckboxItem(t,name){  
    	if (t.is(':checked')) {
    			$(".checkbox-"+name).prop("checked", true);
    	    } else {
    	    	$(".checkbox-"+name).prop("checked", false);
    	    }		
}
function checkAllCheckbox(t){  
      if (t.is(':checked')) {
          $(".checkbox").prop("checked", true);
          } else {
            $(".checkbox").prop("checked", false);
          }   
}
function clearAllFormValue(id)
{ 
    $(''+id+'').find('input[type = file],input[type = text],input[type = number],input[type = password],textarea, input[type = date], input[type = radio],input[type = checkbox], select').each(function () {
        $(this).val('');
        $(this).prop( "checked", false );
    });
    
}

function resetAllFormValue(id)
{	
  
	swal({
  		title: "Are you sure?",
  		//text: "You will not be able to recover this imaginary file!",
  		//type: "warning",
  		showCancelButton: true,
  		confirmButtonText: "Yes, clear it!",
  		cancelButtonText: "No, cancel plx!",
  		closeOnConfirm: true,
  		closeOnCancel: true
  	}, function(isConfirm) {
  		if (isConfirm) {
  			$('' + id + '').find('input[type = file],input[type = hidden],input[type = text],input[type = number],input[type = password],textarea, input[type = date], input[type = radio],input[type = checkbox], select').each(function () {
                $(this).val('');
                $(this).prop( "checked", false );
                $("#imgThumb").attr("src",base_url+"assets/img/NoImage.png");
            });
  		} else {
  			
  		}
  	});   
}
function SetWarningMessageBox(type,msg){
      	$.notify({
      		title: "<strong>"+type+"</strong> : ",
      		message: msg,
      		icon: 'fa fa-warning' 
      	},{
      		type: "danger"
      	});
}

function SetSucessMessageBox(type,msg){
  	$.notify({
  		title: "<strong>"+type+"</strong> : ",
  		message: msg,
  		icon: 'fa fa-check' 
  	},{
  		type: "success"
  	});
}

 
function CloseformBox(t){ 

    $('#'+t+'').empty(); 
}

// **************** File Upload for Image **************** //
function imagetoBase64AboutUs(element)
{
var file=element.files[0];
var size=element.files[0].size;

//File type & size check start
var fileName = document.getElementById("file").value;
var idxDot = fileName.lastIndexOf(".") + 1;
var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
if (extFile=="png" || extFile=="jpg" || extFile=="jpeg")
{
  if(size > 10000000)
  {
  document.getElementById('file').value=null;
  document.getElementById('imgThumb').src=null;
  var msg='Please select another one. (Maximum file size is 10 MB)'
  SetWarningMessageBox('warning', msg);
  throw new Error();
  }
}
else
{
  document.getElementById('file').value=null;
    SetWarningMessageBox('warning', 'Only png/jpg/jpeg files are allowed!');
    throw new Error();
}
//File type & size check end

var reader=new FileReader();
reader.onloadend=function()
  {
  $('#fileUploadAboutUs').val(reader.result);
  $('#imgThumb').attr("src",reader.result);
  $('#fileUploadName').val(element.files[0].name); 
  }
  reader.readAsDataURL(file);
} 
// **************** File Upload for Image **************** //
function imagetoBase64Testimonial(element)
{
var file=element.files[0];
var size=element.files[0].size;

//File type & size check start
var fileName = document.getElementById("file").value;
var idxDot = fileName.lastIndexOf(".") + 1;
var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
if (extFile=="png" || extFile=="jpg" || extFile=="jpeg")
{
  if(size > 4000000)
  {
  document.getElementById('file').value=null;
  document.getElementById('imgThumb').src=null;
  var msg='Please select another one. (Maximum file size is 4 MB)'
  SetWarningMessageBox('warning', msg);
  throw new Error();
  }
}
else
{
  document.getElementById('file').value=null;
    SetWarningMessageBox('warning', 'Only png/jpg/jpeg files are allowed!');
    throw new Error();
}
//File type & size check end

var reader=new FileReader();
reader.onloadend=function()
  {
  $('#fileUploadTestimonial').val(reader.result);
  $('#imgThumb').attr("src",reader.result);
  $('#fileUploadName').val(element.files[0].name); 

  $('#testi_img_remove_btn').css('visibility', 'visible');
  }
  reader.readAsDataURL(file);
} 
// **************** File Upload for Image **************** //
function imagetoBase64Gallery(element)
{
var file=element.files[0];
var size=element.files[0].size;

//File type & size check start
var fileName = document.getElementById("file").value;
var idxDot = fileName.lastIndexOf(".") + 1;
var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
if (extFile=="png" || extFile=="jpg" || extFile=="jpeg")
{
  if(size > 4000000)
  {
  document.getElementById('file').value=null;
  document.getElementById('imgThumb').src=null;
  var msg='Please select another one. (Maximum file size is 4 MB)'
  SetWarningMessageBox('warning', msg);
  throw new Error();
  }
}
else
{
  document.getElementById('file').value=null;
    SetWarningMessageBox('warning', 'Only png/jpg/jpeg files are allowed!');
    throw new Error();
}
//File type & size check end

var reader=new FileReader();
reader.onloadend=function()
  {
  $('#fileUploadGallery').val(reader.result);
  $('#imgThumb').attr("src",reader.result);
  $('#fileUploadName').val(element.files[0].name); 
  }
  reader.readAsDataURL(file);
} 
// **************** File Upload for Image **************** //
function imagetoBase64(element)
{
var file=element.files[0];
var size=element.files[0].size;

//File type & size check start
var fileName = document.getElementById("file").value;
var idxDot = fileName.lastIndexOf(".") + 1;
var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
if (extFile=="png" || extFile=="jpg" || extFile=="jpeg")
{
  if(size > 4000000)
  {
  document.getElementById('file').value=null;
  document.getElementById('imgThumb').src=null;
  var msg='Please select another one. (Maximum file size is 4 MB)'
  SetWarningMessageBox('warning', msg);
  throw new Error();
  }
}
else
{
  document.getElementById('file').value=null;
    SetWarningMessageBox('warning', 'Only png/jpg/jpeg files are allowed!');
    throw new Error();
}
//File type & size check end

var reader=new FileReader();
reader.onloadend=function()
  {
  $('#fileUpload').val(reader.result);
  $('#imgThumb').attr("src",reader.result);
  $('#fileUploadName').val(element.files[0].name); 
  }
  reader.readAsDataURL(file);
} 

// **************** File Upload for Image **************** //
function imagetoBase64ICON(element)
{
var file=element.files[0];
var size=element.files[0].size;

//File type & size check start
var fileName = document.getElementById("file").value;
var idxDot = fileName.lastIndexOf(".") + 1;
var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
if (extFile=="png" || extFile=="jpg" || extFile=="jpeg" || extFile=="ico")
{
  if(size > 4000000)
  {
  document.getElementById('file').value=null;
  document.getElementById('imgThumb').src=null;
  var msg='Please select another one. (Maximum file size is 4 MB)'
  SetWarningMessageBox('warning', msg);
  throw new Error();
  }
}
else
{
  document.getElementById('file').value=null;
    SetWarningMessageBox('warning', 'Only png/jpg/jpeg files are allowed!');
    throw new Error();
}
//File type & size check end

var reader=new FileReader();
reader.onloadend=function()
  {
  $('#fileUpload').val(reader.result);
  $('#imgThumb').attr("src",reader.result);
  $('#fileUploadName').val(element.files[0].name); 
  }
  reader.readAsDataURL(file);
} 

function imagetoBase64_upt(element)
{
var file=element.files[0];
var size=element.files[0].size;

//File type & size check start
var fileName = document.getElementById("file_upt").value;
var idxDot = fileName.lastIndexOf(".") + 1;
var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
if (extFile=="png" || extFile=="jpg" || extFile=="jpeg")
{
  if(size > 500000)
  {
  document.getElementById('file_upt').value=null;
  document.getElementById('imgThumb_upt').src=null;
  var msg=' Please select another one. (Maximum file size is 500 KB)'
   SetWarningMessageBox('warning', msg);
  throw new Error();
  }
}
else
{
  document.getElementById('file_upt').value=null;
  SetWarningMessageBox('warning', 'Only png/jpg/jpeg files are allowed!');
    throw new Error();
}
//File type & size check end

var reader=new FileReader();
reader.onloadend=function()
  {
  $('#fileUpload_upt').val(reader.result);
  $('#imgThumb_upt').attr("src",reader.result);
  $('#fileUploadName_upt').val(element.files[0].name); 
  }
  reader.readAsDataURL(file);
} 

// Shaking Delete Button on click to checkbox

jQuery.fn.shake = function(intShakes, intDistance, intDuration) {
      this.each(function() {
          $(this).css("position","relative"); 
          for (var x=1; x<=intShakes; x++) {
          $(this).animate({left:(intDistance*-1)}, (((intDuration/intShakes)/4)))
      .animate({left:intDistance}, ((intDuration/intShakes)/2))
      .animate({left:0}, (((intDuration/intShakes)/4)));
      }
    });
    return this;
    };

    function shakeDeleteBtn(){ 
      $("#shaker").shake(3,2,800);
    }

// **************** File Upload for Image **************** //
function imageShow(element)
{
var file=element.files[0];
var size=element.files[0].size;

//File type & size check start
var fileName = document.getElementById("file").value;
var idxDot = fileName.lastIndexOf(".") + 1;
var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
if (extFile=="png" || extFile=="jpg" || extFile=="jpeg" || extFile=="ico" || extFile=="svg")
{
  if(size > 5000000)
  {
  document.getElementById('file').value=null;
  document.getElementById('imgThumb').src=null;
  var msg='Please select another one. (Maximum file size is 5 MB)'
  SetWarningMessageBox('warning', msg);
  throw new Error();
  }
}
else
{
  document.getElementById('file').value=null;
    SetWarningMessageBox('warning', 'Only png/jpg/jpeg files are allowed!');
    throw new Error();
}
//File type & size check end

var reader=new FileReader();
reader.onloadend=function()
  {
  // $('#fileUpload').val(reader.result);
  $('#imgThumb').attr("src",reader.result);
  // $('#fileUploadName').val(element.files[0].name); 
  }
  reader.readAsDataURL(file);
}     