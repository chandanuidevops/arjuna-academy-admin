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
    <style>
    section{ display: flex; vertical-align: middle; height: 100vh; align-items: center; }
    </style>
</head>
<body>
   
    	<!-- login section -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col s12 l6 m10 push-m1 push-l3">
					
                    <div class="card z-depth-2">
                        <div class="card-content">
                            <div >

                                <h4 class="center">Add password</h4>
                                <form method="post"  action="<?php echo base_url()?>adminuser/update_pass" style="overflow: hidden;" id="reset-form">
                                <div class="input-field col s12">
                                    <input type="email" id="remail" readonly="" class="validate"  required name="remail" value="<?php echo urldecode($this->uri->segment(4)) ?>">
                                    <input type="hidden" value="<?php echo $this->uri->segment(3) ?>" name="id">
                                    <label for="remail" data-error="wrong" data-success="right">Email</label>
                                    <p><span class="error"><?php echo form_error('remail'); ?></span></p>
                                </div>
                                <div class="input-field col s12 l6">
                                    <input type="password" id="password" name="password" class="validate" required>
                                    <label for="password">Password</label>
                                    <p><span class="error"><?php echo form_error('password'); ?></span></p>

                                </div>
                                <div class="input-field col s12 l6">
                                    <input type="password" id="cpassword" name="cpassword" class="validate" required>
                                    <input type="hidden" name="id" value="<?php echo $id ?>">
                                    <label for="cpassword">Confirm password</label>
                                    <p><span class="error"><?php echo form_error('cpassword'); ?></span></p>
                                </div>
                                <div class="col s12 center">
                                <?php 
                                     echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : '' 
                                     ?>
                                <?php ?>
                                </div>
                                <div class="input-field col s12 l12">
                                    <button type="submit" class="waves-effect white-text waves-light btn green hoverable darken-4" style="width:100%">Button</button>
                                </div>
                                  
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.validate.min.js"></script>

    <script>
    $(document).ready(function() {
        $("#reset-form").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 5
                },

                cpassword: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                
                remail: {
                    required: true,
                    email: true
                },

            },
            messages: {
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                cpassword: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password"
                },
                remail: "Please enter a valid email address",
            }
        });
    });
    </script>

    <script>
        <?php $this->load->view('include/message'); ?>
    </script>
    
</body>
</html>