<!DOCTYPE html>
<html>
   <head>
      <title></title>
      <meta charset="UTF-8">
      <meta name="description" content="Free Web tutorials">
      <meta name="keywords" content="HTML,CSS,XML,JavaScript">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="<?php echo base_url()?>assets/fonts/css/all.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/materialize.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
      <!-- bar -->
      <style>
        .ck-editor__editable {
            min-height: 300px;
        }
     </style>
   </head>
   <body>
      <!-- headder -->
      <div id="header-include">
           <?php $this->load->view('include/header.php'); ?>
         </div>
      <!-- end headder -->
      <!-- first layout -->
        <section class="sec-top">
            <div class="container-wrap">
                <div class="col l12 m12 s12">
                    <div class="row">
      <div id="sidemenu-include">
                <?php $this->load->view('include/menu.php'); ?>
              </div>

                        <div class="col m12 s12 l9">
                            <p class="h5-para black-text ">Profile</p>

                            <div class="card">
                                <div class="card-content">
                                    <div class="form-container">
                                        <form action="<?php echo base_url() ?>profile/update" method="post" style="overflow-y: auto;overflow-x: hidden;" id="profile-form">
                                        
                                          <div class="row m0">
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="username" name="username" class="validate" required value="<?php echo (!empty($setting)?$setting['name']:'') ?>">
                                                  <label for="username">Name <span class="red-text">*</span></label>
                                                  <p><span class="error"><?php echo form_error('username'); ?></span></p>
                                                </div>
                                            </div>
                                          
                                          
                                            <div class="row m0">
                                              <div class="input-field col s12 l6">
                                                <input type="email" id="email" name="email" class="validate" disabled=""  value="<?php echo (!empty($setting)?$setting['email']:'') ?>">
                                                <label for="email">Email </label>
                                                <p><span class="error"><?php echo form_error('email'); ?></span></p>
                                              </div>
                                            </div> 

                                            <div class="row m0">
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="phone" name="phone" class="validate" required value="<?php echo (!empty($setting)?$setting['phone']:'') ?>">
                                                  <label for="phone">Phone No. <span class="red-text">*</span></label>
                                                  <p><span class="error"><?php echo form_error('phone'); ?></span></p>
                                                </div>
                                            </div>

                                              <div class="col s12">
                                <?php 
                                     echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : '' 
                                     ?>
                                <?php ?>
                                </div>

                                            
                                            <div class="col s12 mtb20">
                                                <button class="btn waves-effect waves-light green darken-4 hoverable btn-large" type="submit">Submit
                                                    <i class="fas fa-paper-plane right"></i>
                                                </button>
                                                <br>
                                            </div>                                              
                                          </div>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- cad end -->
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
        $("#profile-form").validate({
            rules: {
                phone: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10,
                },
                
                username: {
                    required: true,
                },

            },
            messages: {
                phone: {
                    required: "Please enter your Mobile number",
                    number: "Please enter a valid Mobile number",
                    minlength: "Your Mobile number at least 10 digits",
                    maxlength: "Your Mobile number must be 10 digits",
                },
                username: "Please enter a name",
            }
        });
    });
    </script>
        <script>
          
        <?php $this->load->view('include/message.php'); ?>
        </script>
    </body>
</html>