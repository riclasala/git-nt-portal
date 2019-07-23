
<style>
#photo_thumbnail {
    background-image: url('<?php echo base_url("assets/images/no_image.jpg");?>');
    background-size: cover;
    background-position: center;
    height: 200px;
    border-radius: 50%;
    width: 200px;
    cursor: pointer;
    margin-top: 30px;
}
#photo_thumbnail:hover{
    cursor: pointer;
    transition: .3s;
    -webkit-box-shadow: 0px 0px 10px 0px rgba(51,51,102,0.9);
    -moz-box-shadow: 0px 0px 10px 0px rgba(51,51,102,0.9);
    box-shadow: 0px 0px 10px 0px rgba(51,51,102,0.9);
}
#profile-info-div{
       display: block;
       margin-top: 50px;
   }
#spouse-div{
   	display: none;
}
.submit-btn{
	width: 100%;
	margin-bottom: 50px;
	background: rgba(79,79,79,0.5);
	padding: 10px;
	border-radius: 5px;
	border: none;
	font-size: 15px;
	transition: 0.2s linear;
	font-weight: bold;
	text-align: center;
}
.submit-btn:hover{
	background: rgba(0,0,255,0.5);
	color: white;
}
.edit-button{
	margin-left: 20px;
	border-radius: 5px;
	float: left;
	border: none;
	color: #333366;
	transition: 0.3s;
	cursor: pointer;
	font-size: 20px;
}
.edit-button:hover{
	color: #ff9933;
}
#upload_button{
	display: none;
}
.error{
	opacity: 0;
	color: red;
	font-size: 12px;
	height: 30px;
	padding: 5px;
	font-weight: bold;
}
#account-info{
	float: right;
	cursor: pointer;
}
#password-panel{
	display: none;
	float: right;
}
.left{
	float: left;
}
.right{
	float: right;
}
.modal-check{
	width: 230px;
}
#cancel-profile-btn{
	display: none;
	font-size: 30px;
	color: gray; 
	cursor: pointer;
	transition: 0.3s;
}
#cancel-profile-btn:hover{
	color: red;	
}
#profile-btn{
	display: none;
	transition: 0.3s;
	margin-left: 30px; 
	font-size: 30px;
	cursor: pointer; 
	color: gray;
}
#profile-btn:hover{
	color: green;	
}
div.horizontal{	
	height: 5px;
	background: rgba(51,51,102,0.9);	
}

input{
	-webkit-transition: border .3s ease-in-out;
  	-moz-transition: border .3s ease-in-out;
  	-ms-transition: border .3s ease-in-out;
  	-o-transition: border .3s ease-in-out;
  	transition: border .3s ease-in-out;
}

/* On screens that are 992px or less */
@media screen and (max-width: 992px) {
  	
}
/* On screens that are 600px or less */
@media screen and (max-width: 600px) {
	#photo_thumbnail{
    	width: 140px;
    	height: 140px;
  	}
  	h3{
  		font-size: 18px;
  	}
  	label, input, div{
  		transition: 0.3s;
  		font-size: 13px;
  		padding: 5px;
  	}
  	.edit-button{
  		font-size: 18px;
  		width: 1%;
  		float: right;
  		margin-right: 18px;
  	}  	  	
}
  </style>
<!--<input id="usn" value ="<?php echo $this->session->userdata('username'); ?>" style="display: none;">-->
<section class = "container">	
	<div class = "row">
		<div class="col-sm-12">
			<br>
			<h3><center>ACCOUNT INFORMATION</center></h3>
			<br>
			<div class="horizontal col-sm-12"></div>
		</div>
	</div>
	<!-- edit profile button (disabled by default) -->
	<div class="row">
		<div class="col-sm-4">
			<form id="profile-image" enctype="multipart/form-data">
				<center>
					<img id="photo_thumbnail"><br><br>
					<span id="cancel-profile-btn">&#10006</span>
			        <span id="profile-btn">&#10004</span>
			    </center>
			    <input type='file'accept="image/*" id='upload_button' /><br><br>
			</form>			       
		</div>
		<div class="col-sm-8"><br><br><br></div>
			<div class="col-sm-2">
				<label class="div-profile-label">NTACH Code</label>
			</div>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="distributor_code" value="<?php echo $distributor->distributor_code; ?>">
			</div>
		    <div class="col-sm-8">
		    	<span id="edit-username" class="edit-button right" value="edit"><i class="fa fa-pencil-square-o"></i></span>	
		    </div>
		    <div class="col-sm-2">
				<label class="div-profile-label" for="div-username">Username</label>
			</div>
			<div class="col-sm-6">
				<input type="text" class="form-control account-info" id="username" value="<?php echo $distributor->username; ?>" placeholder="Lastname">
				<div class="error">Username is required</div>
			</div>
			<div class="col-sm-8">
				<span id="change-password" class="edit-button right"><i class="fa fa-pencil-square-o"></i></span>		            	
			</div>
			   <!-- <div class="col-sm-2">
			        <label class="div-profile-label" for="div-username">Password</label>
			    </div>
			    <div class="col-sm-6">
			        <input type="password" class="form-control" id="username" value="<?php echo $userData->password; ?>" placeholder="Enter your password here">
			    </div>-->
		</div>
			<div class="row">		            	
			    <div id="password-panel">
			        <div class="col-sm-9">
			        	<h4>CHANGE PASSWORD</h4>
			        </div>
			        <div class="col-sm-12">
					    <label class="div-profile-label" for="div-profile-name">New Password *</label>
					    <input type="password" class="form-control password-panel" name="new-password" id="new-password" value="<?php echo set_value('new-password') ?>" placeholder="Lastname">
					     <label class="div-profile-label" for="div-profile-name">Confirm Password *</label>
				        <input type="password" class="form-control password-panel" name="confirm-new-password" id="confirm-new-password" value="<?php echo set_value('confirm-new-password'); ?>" placeholder="Lastname">
				    	<div class="error">Passwords do not match</div>
				    	<span id="password-change-btn" class="submit-btn right">SUBMIT</span>
			        </div>
			    </div>	       
		    </div>
	        <div class="row">
		        <div class="col-sm-12" id="personal-info-div">	  			
			  		<h3><center>PERSONAL INFORMATION</center>
			  			<span id="edit-personal-info" class="edit-button right" value="edit">
			  			<i class="fa fa-pencil-square-o"></i></span>
			  		</h3><br>
			  		<div class="horizontal col-sm-12"></div>
			  		<br><br>
		  		</div>
			  	<div class="col-sm-4 was">
					<label class="div-profile-label" for="div-profile-name">Last Name *</label>
					<input type="text" class="form-control profile-info" id="last_name" value="<?php echo $distributor->last_name; ?>" placeholder="Lastname"><div class="error">Last name is required</div>
				</div>
			    <div class="col-sm-4">
			        <label class="div-profile-label" for="div-profile-name">First Name *</label>
			        <input type="text" class="form-control profile-info" id="first_name" name="first_name" value="<?php echo $distributor->first_name; ?>"  placeholder="Firstname">
			        <div class="error">First name is required</div> 
			    </div>	           		
			    <div class="col-sm-4">
			        <label class="div-profile-label " for="div-profile-name">Middle Name *</label>
			        <input type="text" class="form-control profile-info" id="middle_name" value="<?php echo $distributor->middle_name; ?>"  placeholder="Middle Name">
			        <div class="error">Middle name is required</div>          
			    </div>
			    <div class="col-sm-4">
					<label for="div-profile-nick">Nick Name</label>
			        <input type="text" class="form-control profile-info" id="nickname" name="nickname" value="<?php echo $distributor->nickname; ?>" placeholder="Enter your nick name"><div class="error">Nick name is required</div> 
			    </div>
			    <div class="col-sm-4">
			        <label for="div-profile-bdate">Birthdate *</label>
			        <input type="date" class="form-control profile-info" id="birthdate" name="birthdate" value="<?php echo $distributor->birthdate;?>" placeholder="mm/dd/yyyy"><div class="error">Nick name is required</div>
			    </div>
			    <div class="col-sm-4">
			        <label for="div-profile-name">Gender *</label>
			        <select class="form-control profile-info"  id="gender" >
						<option value="Male" <?php if($distributor->gender == "Male"){?> selected="selected" <?php }?>>Male</option>
						<option value="Female" <?php if($distributor->gender == "Female"){?> selected="selected" <?php }?>>Female</option>
			        </select><div class="error">Please select your Gender</div>
			    </div>
			    <div class="col-sm-4"><div></div>
			        <label for="div-profile-status">Status *</label>
			        <select class="form-control profile-info"  id="marital_status" name="m-status">
						<option value="Single" <?php if($distributor->marital_status == "Single"){?> selected="selected" <?php }?>>Single</option>
						<option value="Married" <?php if($distributor->marital_status == "Married"){?> selected="selected" <?php }?>>Married</option>
						<option value="Separated" <?php if($distributor->marital_status == "Separated"){?> selected="selected" <?php }?>>Separated</option>
						<option value="Windowed" <?php if($distributor->marital_status == "Windowed"){?> selected="selected" <?php }?>>Windowed</option>
			        </select><div class="error">Please select Civil Status</div>
			    </div>
			    <div class="col-sm-4">
			        <label for="mobile1">Mobile No. *</label>
			        <input type="number" class="form-control profile-info" id="mobile_number" value="<?php echo $distributor->mobile_number; ?>"placeholder="09XXXXXXXXXX"><div class="error">Please enter your Mobile Number</div>
			    </div>
			    <div class="col-sm-4">
			        <label for="mobile2">Mobile No.2</label>
			        <input type="number" class="form-control profile-info" id="mobile_number2" value="<?php echo $distributor->mobile_number2; ?>"placeholder="09XXXXXXXXXX"><div class="error">Please select Mobile Number</div>
			    </div>	                
			    <div class="col-sm-12">
			        <label for="div-profile-address">Home Address *</label>
			        <input type="text" class="form-control profile-info" id="distributor_address" name="homeaddress" onchange="validation(this)" value="<?php echo $distributor->distributor_address; ?>" placeholder="Home Address"><div class="error">Please select Civil Status</div>
			    </div>
			    <!--<div class="col-sm-12">
			        <label for="div-profile-d-address">Delivery Address *</label>
			        <input type="text" class="form-control profile-info" id="delivery_address" name="deliveryaddress" value="<?php echo $userData->delivery_address; ?>" placeholder="Home Address"><div class="error">Please select Civil Status</div><br>
			    </div>	-->		        
	        </div><!-- end of row div -->
	        <!--
	        <div class="row">
	            <div id="spouse-div">
	            	<div class="col-sm-12">
	                	<h3><center>SPOUSE INFORMATION</center>
	                		<span class="edit-button right" id="edit-spouse-info" value="edit">
	                		<i class="fa fa-pencil-square-o"></i></span></h3><br><div class="horizontal col-sm-12"></div><br>
	                </div>
	                	<div class="col-sm-4">
	                    	<label class="div-profile-label" for="div-profile-name">Last Name *</label>
	                    	<input type="text" class="form-control spouse-info" id="spouse_last_name" value="<?php echo $userData->spouse_last_name; ?>" placeholder="Lastname">
	                	</div>
	                	<div class="col-sm-4">
							<label class="div-profile-label" for="div-profile-name">First Name *</label>
	                    	<input type="text" class="form-control spouse-info" id="spouse_first_name" value="<?php echo $userData->spouse_first_name; ?>" placeholder="Firstname"><div class="error">Nick name is required</div>
	                	</div>
	                	<div class="col-sm-4">
	                		<label class="div-profile-label" for="div-profile-name">Middle Name *</label>
	                    	<input type="text" class="form-control spouse-info" id="spouse_middle_name" value="<?php echo $userData->spouse_middle_name; ?>" placeholder="Middle Name"><div class="error">Middle name is required</div>
	                	</div>
	                	<div class="col-sm-4">
	                		<label for="div-profile-nick">Nick Name</label>
	                    	<input type="text" class="form-control spouse-info" id="spouse_nick_name" value="<?php echo $userData->spouse_nick_name; ?>" placeholder="Enter your nick name"><div class="error">Nick name is required</div>
	                	</div>
	                	<div class="col-sm-4">
	                		<label for="div-profile-bdate">Birthdate *</label>
	                    	<input type="date" class="form-control spouse-info" id="spouse_birthdate" value="<?php echo $userData->spouse_birthdate; ?>" placeholder="mm/dd/yyyy"><div class="error">Birthdate is required</div> 
	                	</div>
	                </div>                
	            </div>--><!-- end of group div --> 
	<!-- Modal Pop up Success -->
	<div class="modal fade bd-example-modal-sm" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModal" 	aria-hidden="true">
	    <div class="modal-dialog modal-sm">
	        <div class="modal-content text-center">
	        	<h3>Success</h3><br>
	            <img class="modal-check" src="<?php echo base_url(); ?>assets/images/check.gif" alt="CHECK" />
	            <h4 id="modalMessage"></h4><br>
	        </div>
	    </div>
	</div>
	<!-- Modal Pop Security Password -->
	<div class="modal fade " id="password-check-modal" tabindex="-1" role="dialog" aria-labelledby="Security Check" aria-hidden="true">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">      
	      <div class="modal-body">
	      	<h4>Security Check</h4><br>
	      	<b>Please Type in your password</b>
		    <input type="password" class="form-control" id="modal-password" placeholder="Enter your password">
		    <span class="error">Invalid Password</span>
	      </div>
	      <div class="modal-footer">
	      	<button type="button" class="btn btn-primary right" id="security-password-btn" onclick="security_password();">Proceed</	button>
	      	<button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel-btn">Cancel</button>
	      </div>
	    </div>
	  </div>
	</div>
</section><!-- end of div container -->

<script type="text/javascript">
//diable text-boxes no border and place holder for blanks
function resetInputFields(){
	$('input').attr('readonly',true);
	//$('input').css('border','1.3px solid rgba(36,36,36,0.2)');
	$('input').css('border','none');
	$('input').css('background','none');
	$('input').attr('placeholder','');
	$('select').attr('disabled',true);
	$('select').css('border','none');
	$('select').css('background','none');
	$('#modal-password').attr('readonly',false);
	$('#modal-password').css('border','1.5px solid rgba(36,36,36,0.7)');
	$('#username').next().css('opacity','0');
	$('#username').next().text('Username is required');
	$('#password-panel').slideUp(300);
	$('#cancel-profile-btn').css('display','none');
	$('#profile-btn').css('border','none');
}

//show change password panel
function togglePasswordPanel(){
	$('#new-password').val('');
	$('#confirm-new-password').val('');
	$('#password-panel').slideToggle(300);
	$('.password-panel').attr('readonly',false);
	$('#password-panel input').css('border','1.3px solid rgba(36,36,36,0.7)');
}

//function shows modal password for security
function showPasswordModal(){
	$('#modal-password').val('');	
	$('#modal-password').next().css('opacity','0');
	$('#password-check-modal').modal('show');
	$('#password-check-modal').on('shown.bs.modal', function () {
    $('#modal-password').focus();
	})  
}	

//pop up modal for success update
function successModal(message){
	$('#modalMessage').text(message);
	$('#successModal').modal('show');
	setTimeout(function(){
		$('#successModal').modal('hide');
		resetInputFields();
	}, 1900);
}

//variable to return
var is_valid = 0;

//variable for unavailable usn
var usn_unavailable;

// variable for function pending 
var functionToProceed = '';

//validate function which choose inputs by class sets unvalidated to red
function validate(form_group){
var form = $(form_group);
is_valid = 0;
	for(i=0; i<form.length; i++){
		var id = form[i].id;
		if($(form[i]).val != ""){
			$(form[i]).next().css('opacity','0');
			$(form[i]).css('border','1.5px solid green');
			}
		if(($(form[i]).val() == "" && id =="nick_name") || ($(form[i]).val() == "" && id == "mobile_number_2") || ($(form[i]).val() == "" && id == "spouse_nick_name")){
			$(form[i]).next().css('opacity','0');
			$(form[i]).css('border','1.5px solid green');	
			}		
		if($(form[i]).val() == "" && form[i].id != "nick_name" && form[i].id != "mobile_number_2" && form[i].id != "spouse_nick_name"){
			$(form[i]).next().css('opacity','1');
			$(form[i]).css('border','1.5px solid red');
			is_valid = is_valid + 1;
			}
	}
}

//security check - password pop up
function security_password(){
	$.ajax({
		type: "POST",
  		url: "<?php echo base_url('profile/check_password'); ?>",

  		data: {
  			distributor_id: <?php echo $distributor->distributor_id; ?>,
  			username: "$('#username').val()",
  			password: $('#modal-password').val()  					
  		},  			
  		success: function(data, status){
  			alert(data);
  			if(data.response == 'success'){
  				$('#modal-password').next().css('opacity','0');  					
  				$('#password-check-modal').modal('hide');
  				proceed(functionToProceed);				
  			}
  			else if(data.response == 'fail'){
  				$('#modal-password').next().css('opacity','1');
  			}				
  		}
  	});
}

//check username availability before update of username
function check_username_availability(){
	$.ajax({
		url: "<?php echo base_url(); ?>profile/check_existing",
		type: "POST",
	   
	    data:{
	    	distributor_id: <?php echo $distributor->distributor_id; ?>,
	    	username: $('#username').val()
	    },
	    success: function(data, status){

	    	if(status){	
	    		if(data==''){
	    			functionToProceed = 'username';
	    			resetInputFields();
					showPasswordModal();
				}
				else{
					$('#username').next().text('Username already in use'); 
	    			$('#username').next().css('opacity','1'); 
				}
	    	}
	    }
	});
	
}

//set textbox to editable [edit button]
function enable_edit(input_attribute, edit_button_id){
	$(input_attribute).attr('readonly',false);
	$(input_attribute).attr('disabled',false);
	$(input_attribute).css('border','1.5px solid rgba(51,51,102,0.7)');
}

//function for sending requests
function send_request(url, type, data, success_message){
	$.ajax({        
	    url: url,
	    type: type,
	    dataType: "json",
	    data,        
	    success: function(data,status){	    	
	        if(status){	
		        successModal(success_message);
		    }
		    else
		    {
		        alert('update unsuccessful');
		    }
		}
	});	
}

function change_value_and_icon(element_id,type){
	if(type == "edit"){
		$('#'+element_id).attr('value','save');
		$('#'+element_id).children().removeClass('fa fa-pencil-square-o');
		$('#'+element_id).children().toggleClass('fa fa-save');
	}
	else if(type == "save"){
		$('#'+element_id).attr('value','edit');
		$('#'+element_id).children().removeClass('fa fa-save');
		$('#'+element_id).children().toggleClass('fa fa-pencil-square-o');
	}
		
}

//proceed to function when password is autheticated
function proceed(pending,type){
	//alert(pending);
	if(pending == 'username'){
		//set variables for parameters
		var url = "<?php echo base_url('profile/update_username'); ?>";
		var type = 'POST';	    
	    var data = {

	    	username: $('#username').val()
	    }
	    var success_message = 'Username has been updated';
	}
	else if(pending == 'changepassword'){
		var url = "<?php echo base_url() ?>/Test/update_password";
		var type = 'POST';	    
	    var data = {		
	    	username: $('#username').val(),
	    	new_password: $('#new-password').val()
	    };
	    success_message = 'Password has been updated';
			
	}
	else if(pending == 'update_profile'){
		var url = "<?php echo base_url() ?>/Test/update_profile";
		var type = 'POST';	    
	    var data = {		
	    	ntach_code: $('#ntach_code').val(),
	       	first_name: $('#first_name').val(),
	       	middle_name: $('#middle_name').val(),
	       	last_name: $('#last_name').val(),
	       	nick_name: $('#nick_name').val(),
	       	birthdate: $('#birthdate').val(),
	       	gender: $('#gender').val(),
	       	status: $('#marital_status').val(),
	       	mobile_number_1: $('#mobile_number_1').val(),
	       	mobile_number_2: $('#mobile_number_2').val(),
	       	home_address: $('#home_address').val(),
	       	delivery_address: $('#delivery_address').val()
	    };
	    success_message = 'Profile has been updated';			
	}
	else if(pending == 'update_spouse'){
		var url = "<?php echo base_url() ?>/Test/update_spouse_info";
		var type = 'POST';	    
	    var data = {		
	    	ntach_code: $('#ntach_code').val(),
	       	spouse_first_name: $('#spouse_first_name').val(),
	       	spouse_middle_name: $('#spouse_middle_name').val(),
	       	spouse_last_name: $('#spouse_last_name').val(),
	       	spouse_nick_name: $('#spouse_nick_name').val(),
	       	spouse_birthdate: $('#spouse_birthdate').val()
	    };
	    success_message = 'Profile has been updated';		
	}
	send_request(url,type,data,success_message);	
	resetInputFields();
}

$(document).ready(function(){
resetInputFields();

//function for change password
$('#password-change-btn').click(function(){
	var password = $('#new-password').val();
	var confirmPassword = $('#confirm-new-password').val();
	if(password != confirmPassword)
	{
		$('#confirm-new-password').next().css('opacity','1');
	}
	else
	{
		$('#confirm-new-password').next().css('opacity','0');
		functionToProceed = 'changepassword';
		showPasswordModal();
	}

});

//marital status change if Married - spouse form appears
if($('#marital_status').children("option:selected").val() == 'Married'){
	$('#spouse-div').slideDown(500);
}
//slide down spouse
$('#marital_status').change(function(){
	if(this.value == "Married"){
		$('#spouse-div').slideDown(500);
	}	
	else{		
		$('#spouse-div').slideUp(500);	
		$('#spouse-div .form-control').css('border','1.3px solid rgba(36,36,36,0.7)');
	}
});

//edit buttons onclick if conditions
$('.edit-button').on('click', function () {
	if(this.id == 'edit-username'){
		if($(this).attr('value') == "edit"){

			enable_edit('.account-info','#edit-username');
			change_value_and_icon(this.id,'edit');
		}
		else if($(this).attr('value') == "save"){
			change_value_and_icon(this.id,'save');
			if($('#username').val() != "" && $('#usn').val() != $('#username').val()){				
				check_username_availability();
			}
			else if($('#username').val() == ""){
				$('#username').css('border','1px solid red');
				$('#username').next().css('opacity','1');
			}
			else{
				resetInputFields();
			}			
		}
	}
	else if(this.id == 'change-password'){
		togglePasswordPanel();
	}	
	else if(this.id == 'edit-personal-info'){
		if($(this).attr('value') == "edit"){
			enable_edit('.profile-info','#edit-personal-info')
			change_value_and_icon(this.id,'edit');
		}
		else if($(this).attr('value') == "save"){			
			validate('.profile-info');
			if(is_valid == 0){
				change_value_and_icon(this.id,'save');
				functionToProceed = 'update_profile';
				showPasswordModal();
			}
		}
	}
	else if(this.id == 'edit-spouse-info'){
		if($(this).attr('value') == "edit"){
			enable_edit('.spouse-info','#edit-spouse-info');
			change_value_and_icon(this.id,'edit');
		}
		else if($(this).attr('value') == "save"){			
			validate('.spouse-info');
			if(is_valid == 0){
				change_value_and_icon(this.id,'save');
				showPasswordModal();
			}
		}
	}
  	
});

//photo thumbnail click
$('#photo_thumbnail').click(function(){
	$('#upload_button').click();
});

//photo_thumbnail change
$('#upload_button').change(function () {	
      var file = this.files[0];
      var reader = new FileReader();
      reader.onloadend = function () {
      $('#photo_thumbnail').attr('src', reader.result);
      }
      if (file) {
          reader.readAsDataURL(file);
          $('#profile-btn').show();
          $('#cancel-profile-btn').show();
      } 
      else {
      }
});

//cancel change profile picture
$('#cancel-profile-btn').on('click',function(){
	$('#profile-btn').hide();
    $('#cancel-profile-btn').hide();
});

//upload profile-image
$('#profile-btn').click(function(e){
	e.preventDefault(); 
	    $.ajax({
	        url:'<?php echo base_url();?>/Test/update_profile_image',
	        type:"post",
	        data:new FormData(this),
	        processData:false,
	        contentType:false,
	        cache:false,
	        async:false,
	        success: function(data){
	            alert("Upload Image Successful.");
	       	}
	    });
	});

//cancel button listener
$('#cancel-profile-btn').on('click',function(){
	location.reload();
});


});//end of document-ready function


</script>



























<!--
hello profile <br/>
<?php echo $distributor->distributor_id; ?>

<input type = 'text' value='<?= $distributor->first_name ?>' id ='first_name'>
<input type = 'text' value='<?= $distributor->last_name ?>' id ='last_name'>
<button id ='submit'>Submit</button>
<div id='hello'></div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#submit').click(function(){
			$.ajax({
				url: "<?php echo base_url(); ?>profile/test",
				type: 'POST',
				data: {
					distributor_id : <?= $distributor->distributor_id ?>,
					first_name: $('#first_name').val(),
					last_name: $('#last_name').val()
				},
				success: function(data, status){
					//location.reload();
					$('#hello').html(data);
				}
			});
		});
	});
</script>
-->