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
    .ck-editor__editable {
        min-height: 300px;
    }

    select {
        visibility: hidden;
        display: block;
        position: absolute;
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
                    <?php $this->load->view('include/pre-loader.php'); ?>

                        <div class="row m0">
                            <div class="col l6 m6">
                            <p class="h5-para black-text  m0">Add banner</p>
                            </div>
                            <div class="col 12 m6 right-align">
                                <a href="<?php echo base_url('banner/manage')  ?>"
                                    class="waves-effect waves-light btn green darken-4 white-text hoverable "><i
                                        class="fas fa-backward left"></i> Back</a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-content">
                                <div class="form-container">
                                    <form action="<?php echo base_url() ?>banner/insert" method="post"
                                        style="overflow-y: auto;overflow-x: hidden;" id="banner-form"
                                        enctype="multipart/form-data">

                                        <div class="row m0 img">
                                            <div class="file-field input-field col s12 l6 img" id="imgfile">
                                                <div class="btn btn-small black-text grey lighten-3">
                                                    <i class="far fa-image left  "></i>
                                                    <span class="">Banner Image</span>
                                                    <input type="file" name="banner_img" id="banner_img"
                                                        accept=".png, .jpg, .jpeg" required>
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                </div>
                                                <h6 class=" m0">
                                                    <small> <i><b>Note</b>: Please select only image file (eg: .jpg,
                                                            .png, .jpeg etc.) <br>
                                                            <span class="bold">Max file size:</span> 512kb <span
                                                                class="red-text">*</span>
                                                            <span class="bold">Image ratio:</span> 1349*500 <span
                                                                class="red-text">*</span>
                                                        </i>
                                                    </small>
                                                </h6>
                                            </div>
                                        </div>

                                        <div class="divider"></div>
                                            <p class="red-text"><i>Optional : Banner with video  </i></p>
                                        <div class="row m0 img">
                                            
                                            <div class="input-field col s12 l6">
                                                <input type="url" id="video" name="video" class="validate" >
                                                <label for="video">Video Link<span class="red-text">*</span></label>
                                            </div>
                                        </div>

                                        <input type="hidden" name="image_id"
                                            value="<?php echo random_string('alnum',10) ?>">
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
    <?php $this->load->view('include/message.php'); ?>
    </script>
    <script>
    $(document).ready(function() {

        $("#banner-form").validate();
       
    });
    </script>
<script>
    $(document).ready(function() {
          
        $('#banner-form').submit(function(e) {
          
            e.preventDefault();
            var video =    $('#video').val();
            var banner_img = $("#banner_img")[0].files.length;

           
            var $el = $('#imgfile');
            if (  banner_img>0 ) {
                loder(true)
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url().'banner/insert';?>",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    dataType: "json",
                    success: function(response) {
                        if (response==true) {
                            $('#video').val('');
                            
                            $el.wrap('<form>').closest(
                                'form').get(0).reset();
                            $el.unwrap();
                           
                            loder(false)
                           
                            M.toast({
                                html: 'Banner added succesfully',
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

</body>

</html>