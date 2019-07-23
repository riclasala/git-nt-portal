<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Shop Online Page and Portal Page for Nutritech Alliance Corporation.">
		<meta name="author" content="Jomar Gregorio, Ricardo Lasala, Joseph Magat">
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
			#portalModal{
				display: none;
			}
			#loader{
				display:none;
				font-size: 2rem;
			}
			
			.icon-container {
			  position: absolute;
			  right: 10px;
			  top: 10px;
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
		<?php echo form_open('', 'class="form-signin"'); ?>
			<div class="text-center mb-4">
				<img class="mb-4" src="<?php echo base_url(); ?>assets/images/big-logo.png" width="360" alt="NutriTECH">
				<h1 class="h3 mb-3 font-weight-normal">Member's Portal</h1>
				<p class="mt-5 mb-3 text-muted text-center">Please Sign In</p>
			</div>
			<div class="form-label-group">
				<input type="username" id="inputuser" name="username" class="form-control" placeholder="NTACH Code" required autofocus>
				<label for="inputuser" id="labeluser">NTACH Code / User Name</label>
				<div class="icon-container">
					<i class="fa fa-spinner fa-spin" id='loader'>
					</i>
				</div>
				<span id="user_details"></span>
				<!--<?= $error ?>-->
			</div>

			<div class="form-label-group">
				<input type="password" id="inputpassword" name="password" class="form-control" placeholder="Password" required>
				<label for="inputpassword">Password</label>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="signin" id='signin'>Sign in</button><br />
			<p>Happy Day! All the data are <code>Subject for Audit</code>. Please contact us for questions and suggestions. Thank you.
			</p>
			<p class="mt-5 mb-3 text-muted text-center">Copyright &copy; NutriTECH Alliance Corporation 2019</p>
		</form>
		
	</body>

		<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap 3.3.7 -->
		<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- FastClick -->
		<script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
		<!-- AdminLTE App -->
		<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
		<!-- Sparkline -->
		<script src="<?php echo base_url(); ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
		<!-- SlimScroll -->
		<script src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<!-- ChartJS -->
		<script src="<?php echo base_url(); ?>assets/bower_components/chart.js/Chart.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){

				$('#inputuser').keyup(function(e){
					$('#inputuser').val($('#inputuser').val().replace(/ /g, ''));
					var username = $('#inputuser').val();
					$.trim(username);
					if(username.length>0){
						checkUser(username);
					}else{
						$('#labeluser').html('NTACH Code / User Name'); 
						$('#loader').hide();
					}
				});
				$('#inputuser,#inputpassword').keydown(function(e){
					//to block space - 32
					if(e.which == 32){
						return false;
					}
				})
				
				$('.form-signin').submit(function(e){
					e.preventDefault();
					$.ajax({
						url: "<?php echo base_url(); ?>login/signin",
						type: 'POST',
						data: {
							username: $('#inputuser').val(),
							password: $('#inputpassword').val()
						},
						success: function(data, status){
							if(data==''){
								location.reload();
							}else{
								openModal(data);
							}
						}
					});
				});
				function openModal(data){
					$('.modal-body').html(data);
					$('#portalModal').modal();
				}
				function checkUser(username){
					$.ajax({
						url: "<?php echo base_url(); ?>login/check_user",
						type: 'POST',
						data: {
							username: username
						},
						success: function(data, status){
							if(status){
								if(data!=''){
									$('#loader').attr('class','fa fa-check');
									$('#loader').css('color','green');
									$('#labeluser').html(data);
								}else{
									$('#loader').attr('class','fa fa-times');
									$('#loader').css('color','red');
									$('#labeluser').html('Enter your valid ntach code or username.'); 
								}
							}
							
						},
						beforeSend: function(){
							$('#loader').show();
							$('#loader').attr('class','fa fa-spinner fa-spin');
							$('#loader').css('color',''); 
						}	
					});
				}

			});
			
		</script>
</html>