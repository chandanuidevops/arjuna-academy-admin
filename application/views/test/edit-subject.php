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
                                <p class="h5-para black-text m0">Edit Subject</p>
                            </div>
                            <div class="col 12 m6 right-align">
                                <a href="<?php echo base_url('test/add-test')  ?>"
                                    class="waves-effect waves-light btn green darken-4 white-text hoverable "><i
                                        class="fas fa-backward left"></i> Back</a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-content">
                                <div class="form-container">
                                    <form action="<?php echo base_url('test/edit')?>" method="post" style="overflow-y: auto;overflow-x: hidden;"
                                        id="subject-form">


                                        <div class="row m0">
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="subject" name="subject" class="validate"
                                                value="<?php echo $result->subject;?>"    required>
                                                <label for="subject">Subject<span class="red-text">*</span></label>
                                            </div>
                                        </div>
                                        <div class="col s12">
                                            <?php echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : ''    ?>

                                        </div>

                                        <input type="hidden" name="id"  
                                            value="<?php echo $result->id;?>">
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
        $("#subject-form").validate();
        
    });
    </script>
   <script>
    $(document).ready(function() {
          
        $('#subject-form').submit(function(e) {
          
            e.preventDefault();
            var subject =    $('#subject').val();
           

           
           
            if (  subject !='' ) {
                loder(true)
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url().'test/edit';?>",
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
                                html: 'Subject Updated Successfully',
                                classes: 'green',
                                displayLength: 5000
                            });
                        }else{
                             loder(false)
                            M.toast({
                                html: 'This subject is allready exist',
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