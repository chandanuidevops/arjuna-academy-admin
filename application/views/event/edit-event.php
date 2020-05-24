<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title ?></title>
    <meta charset="UTF-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url()?>assets/fonts/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/image-uploader.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/croppie.css">
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,700|Montserrat:300,400,500,600,700|Source+Code+Pro&display=swap"
        rel="stylesheet">

    <!-- bar -->
    <style>

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
                    <?php $this->load->view('include/pre-loader.php'); ?>

                        <div class="row m0">
                            <div class="col l6 m6">
                            <p class="h5-para black-text  m0">Edit Event</p>
                            </div>
                            <div class="col 12 m6 right-align">
                                <a href="<?php echo base_url('event/manage')  ?>"
                                    class="waves-effect waves-light btn green darken-4 white-text hoverable "><i
                                        class="fas fa-backward left"></i> Back</a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-content">
                                <div class="form-container">
                                    <form action="<?php echo base_url('event/update_event/'.$result['id']) ?>"
                                        method="post" style="overflow-y: auto;overflow-x: hidden;" id="event-form"
                                        enctype="multipart/form-data">


                                        <div class="row m0">
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="title" name="title" class="validate"
                                                    value="<?php echo $result['title'] ?>" required>
                                                <label for="title">Title<span class="red-text">*</span></label>
                                            </div>

                                            <div class="input-field col s12 l6">
                                                <input type="text" id="date" name="date" class="validate datepicker"
                                                    value="<?php echo $result['date'] ?>" required>
                                                <label for="date">Date<span class="red-text">*</span></label>
                                            </div>

                                        </div>

                                        <div class="row m0">
                                            <div class="file-field input-field col s12 l6 img">
                                                <div class="btn btn-small black-text grey lighten-3">
                                                    <i class="far fa-image left  "></i>
                                                    <span class="">Event Image</span>
                                                    <input type="file" name="ev_image" id="ev_image"
                                                        accept=".png, .jpg, .jpeg">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                </div>
                                                <h6 class=" m0">
                                                <small> <i><b>Note</b>: Please select only image file    (eg: .jpg, .png, .jpeg etc.) <br> 
                                                    <span class="bold">Max    file size:</span> 512kb  <span class="red-text">*</span> 
                                                    <span class="bold">Image ratio:</span> 500*320 <span class="red-text">*</span>
                                                    </i> 
                                                </small>
                                                </h6>
                                            </div>

                                            <?php if(!empty($result['event_thumb'])) {
                                                    ?>
                                            <div class="form-group col s12 m2 l2">
                                                
                                                <div class="" id="edt-image">
                                                    <div class="image view view-first">
                                                        <img class="city-edit-image responsive-img"
                                                            src="<?php echo $this->config->item('web_url').$result['event_thumb']?>"
                                                            alt="image" id="targetimg">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }?>


                                        </div>
                                        <div class="row m0">
                                            <div class="input-field col s12 l12">
                                                <textarea id="description" name="description"
                                                    class="materialize-textarea" required
                                                    value="<?php echo $result['description'] ?>"><?php echo $result['description'] ?></textarea>
                                                <label for="description">Description<span
                                                        class="red-text">*</span></label>
                                            </div>

                                            <div class="input-field col s12 l6">
                                                <input type="text" id="location" name="location" class="validate "
                                                    value="<?php echo $result['location'] ?>" required>
                                                <label for="date">Location<span class="red-text">*</span></label>
                                            </div>
                                            <div class="input-field col s12 l6">
                                                <div class="switch">
                                                    <p>Notification</p>
                                                    <label>
                                                   Disable
                                                    <input type="checkbox" value="1" name="notification"  <?php if($result['notification']==1){echo 'checked';}?>  id="notification">
                                                    <span class="lever"></span>
                                                   Enable
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                       



                                        <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
                                        
                                        <div class="col s12">
                                            <?php 
                                                   echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : '' 
                                                   ?>
                                            <?php ?>
                                        </div>

                                       
                                    
                                        <div class="col s12 mtb20">
                                            <button
                                                class="btn waves-effect waves-light green darken-4 hoverable btn-large upload-result"
                                                type="submit" name="fileSubmit">Submit
                                                <i class="fas fa-paper-plane right"></i>
                                            </button>
                                            <br>
                                        </div>
                                    </form>
                                </div>
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
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/image-uploader.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/croppie.js"></script>

   
    <script>
    $(document).ready(function() {

        $('select').formSelect();
        $("#event-form").validate();
    });
    </script>
    <script>
  
    $(document).ready(function() {
        $('.datepicker').datepicker();
    });
    </script>

<script>
    $(document).ready(function() {
          
        $('#event-form').submit(function(e) {
          
            e.preventDefault();
            var title =         $('#title').val();
            var date =          $('#date').val();
            var description =   $('#description').val();
            var location =      $('#location').val();
            var notification =      $('#notification').val();
            var ev_image =    $("#ev_image")[0].files.length;

            
            var $el = $('#imgfile');
           
            
            if (  ev_image>0  || title !='' || date !='' || description !='' || location !='') {
                loder(true)
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url().'event/update_event';?>",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    dataType: "json",
                    success: function(response) {
                        if (response==true) {
                          
                            loder(false)
                           
                            M.toast({
                                html: 'Event updated succesfully',
                                classes: 'green',
                                displayLength: 5000
                            });
                        }else{
                             loder(false)
                            M.toast({
                                html: response.error,
                                classes: 'red',
                                displayLength: 5000
                            });
                        }
                    }
                });
            }

        });

      
        //page loader
        function loder(status) {
            if (status == true) {
                $('.preloader-verfy').css('display', 'block');
            } else {
                $('.preloader-verfy').css('display', 'none');
            }
        }
    });
    
</script>
    
 <script>
    <?php $this->load->view('include/message.php'); ?>
    </script>
</body>

</html>