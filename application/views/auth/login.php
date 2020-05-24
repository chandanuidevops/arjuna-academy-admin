<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link href="<?php echo base_url()?>assets/fonts/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
</head>
<body>
    <br><br>
    	<!-- login section -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col s12 l6 m10 push-m1 push-l3">
					
			      <div class="card z-depth-2">
			        <div class="card-content">
			          	<div class="center">
                          <img src="<?php echo base_url()?>assets/img/logo.png" alt="" class="responsive-img"  width="180px">
			          		<h4 class="">Admin Login</h4>
			          	</div>
			          	<div class="emil-contect row">  
			          		<form action="<?php echo base_url()?>can-login" method="post" id="login-form">
			          			<div class="input-field col s12">
						          	<input id="username" type="text" class="validate" name="username" required="">
						          	<label for="username">Username or Email</label>
						        </div>
						        <div class="input-field col s12">
						          	<input name="password" id="password" type="password" class="validate" required="">
						          	<label  for="password">Password</label>
								</div>
								<div class="col s12 center">
								<?php 
									 echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : '' 
									 ?>
								<?php ?>
								</div>
						        <div class="input-field col s12">
						        	<button class="waves-effect z-depth-2 waves-light btn white-text  green darken-4 login-btn block btn-md">Login</button>
                                </div>
                                <div class="col s12 center">
                                    <a href="#forgot-password"  class="modal-trigger blue-text " >Forgot Password</a>
                                </div>
			          		</form>
			          	</div>
			        </div>
			      </div>
			    </div>
		    </div>
		</div>
	</section>

	<div id="forgot-password" class="modal small-modal" style="">
    <div class="modal-content row">
      <h5 class="bold center">Forgot Password!</h5>
      	<form action="<?php echo base_url()?>forgot-password" method="post" id="forgot-form">
	      	<div class="input-field col l8 push-l2">
				<input id="email" type="email" class="validate borderd-0" placeholder="Enter your email address" style="border-radius: 0; height: 38px;" name="email" required="">
			</div>
			<div class="clearfix"></div>
			<div class="input-field col l6 push-l3 " style="margin-top: 0">
				<button type="submit" class="btn waves-effect brand hoverable white-text ">Send Password reset link</button>
			</div>
			<div class="clearfix"></div>
			<div class="center">
				
			<a href="#!" class="blue-text modal-close center">Back To Login</a>
			</div>
		</form>
    </div>
  
  </div>
    
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery.validate.min.js"></script>
	<script>
		$(document).ready(function(){
			$('.modal').modal();
		});
	</script>
        <script>
    $(document).ready(function() {
        $("#login-form").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 5
                },
                
                username: {
                    required: true,
                },

            },
            messages: {
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                username: "Please enter your Username or Email",
            }
        });
    });
    </script>
     <script>
    $(document).ready(function() {
        $("#forgot-form").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },

            },
            messages: {
                email: "Please enter a valid email address",
            }
        });
    });
    </script>
    <script>
	<?php $this->load->view('include/message.php'); ?>
		
	</script>

</body>
</html>