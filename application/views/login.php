<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Shop Online Page and Portal Page for Nutritech Alliance Corporation.">
		<meta name="author" content="Jomar Gregorio, Ricardo Lasala, Jhon Morales, Joseph Magat">
		<meta name="generator" content="Shop Online 2.0.0">
		<title>Nutritech - Portal</title>
		<!-- Website Icon -->
		<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/favicon.ico" />
		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" />
		<!-- Custom styles for this template -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/floating-labels.css" />
		<!-- Icons -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" />
		<style>
			.bd-placeholder-img {
				font-size: 1.125rem;
				text-anchor: middle;
			}

			@media (min-width: 768px) {
				.bd-placeholder-img-lg {
					font-size: 3.5rem;
				}
			}
			.loader{
				display:none;
			}
			
			.icon-container {
			  position: absolute;
			  right: 10px;
			  top:10px;
			}
			.loading-image{
				height: 20px;
				width: 20px;
			}
			.form-label-group > input, .form-label-group > label{
				height: 40px;
			}
		</style>
		<!-- Load first jquery to do custom js-->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
	</head>
	<body>
		<?php echo form_open('login/signin', 'class="form-signin"'); ?>
			<div class="text-center mb-4">
				<img class="mb-4" src="<?php echo base_url(); ?>assets/images/big-logo.png" width="360" alt="NutriTECH">
				<h1 class="h3 mb-3 font-weight-normal">Member's Portal</h1>
				<p class="mt-5 mb-3 text-muted text-center">Please Sign In</p>
			</div>
			<div class="form-label-group">
				<input type="username" id="inputuser" name="username" class="form-control" placeholder="NTACH Code" required autofocus>
				<label for="inputuser">NTACH Code</label>
				<div class="icon-container">
					<i class="loader">
						<img class="loading-image" src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" alt="loading..">
					</i>
				</div>
				<span id="user_details"></span>
				<!--<?= $error ?>-->
			</div>

			<div class="form-label-group">
				<input type="password" id="inputpassword" name="password" class="form-control" placeholder="Password" required>
				<label for="inputpassword">Password</label>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="signin">Sign in</button><br />
			<p>Happy Day! All the data are <code>Subject for Audit</code>. Please contact us for questions and suggestions. Thank you.
			</p>
			<p class="mt-5 mb-3 text-muted text-center">Copyright &copy; NutriTECH Alliance Corporation 2019</p>
		</form>
	</body>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#inputuser').keyup(function(){
				var username = $('#inputuser').val();
				checkUser(username);
			});
			
			function checkUser(username){
				$.ajax({
					url: "<?php echo base_url(); ?>login/check_user",
					type: 'POST',
					data: {
						username: username
					},
					success: function(data, status){
						if(data!=''){
							$('#user_details').html(data);
						}else{
							$('#user_details').html('invalid data file');
						}
						
					},
					beforeSend: function(){
						$('.loader').show();
					},
					complete: function(){
						$('.loader').hide();
					}	
				});
			}

		});
		
	</script>
</html>