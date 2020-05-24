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
    <script src="<?php echo base_url()?>assets/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url()?>assets/ckeditor/samples/js/sample.js"></script>
    <!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/ckeditor/samples/css/samples.css" /> -->
    <link rel="stylesheet"
        href="<?php echo base_url()?>assets/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/croppie.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,700|Montserrat:300,400,500,600,700|Source+Code+Pro&display=swap"  rel="stylesheet">
        
    <!-- bar -->
    <style>
    
#tags_tagsinput{
    min-height:0px!important;
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
                                <p class="h5-para black-text  m0">Edit Job</p>
                            </div>
                            <div class="col 12 m6 right-align">
                                <a href="<?php echo base_url('job/manage')  ?>"
                                    class="waves-effect waves-light btn green darken-4 white-text hoverable "><i
                                        class="fas fa-backward left"></i> Back</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="form-container">
                                    <form action="<?php echo base_url() ?>job/update" method="post"
                                        style="overflow-y: auto;overflow-x: hidden;" id="job-form"
                                        enctype="multipart/form-data">

                                       
                                        <div class="row m0">
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="job_title" name="job_title" class="validate" required value="<?php echo $result['job_title'] ?>">
                                                <label for="job_title">Job Title<span class="red-text">*</span></label>
                                            </div>
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="job_type" name="job_type" class="validate" value="<?php echo $result['job_type'] ?>" required>
                                                <label for="job_type">Job Type<span class="red-text">*</span></label>
                                            </div>
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="qualification" name="qualification" class="validate" value="<?php echo $result['qualification'] ?>" required>
                                                <label for="qualification">Qualification<span class="red-text">*</span></label>
                                            </div>
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="experience" name="experience" class="validate" value="<?php echo $result['experience'] ?>" required>
                                                <label for="experience">Experience<span class="red-text">*</span></label>
                                            </div>
                                           
                                          
                                            <div class=" col s12 l12">
                                                    <p for="" class="mb10">Skills</p>
                                                    <input name="job_skill" id="tags" value="<?php echo $result['job_skill'] ?>" required/>
                                                </div>

                                            <div class=" col s12 l12">
                                            <label for="editor" class="black-text editor-label">Job Description</label>
                                                <textarea   id="job_description" name="job_description" class="validate ckeditor" value="<?php echo $result['job_description'] ?>" required><?php echo $result['job_description'] ?></textarea >
                                                
                                            </div>

                                            <div class="col s12 l12">
                                                <label for="editor" class="black-text editor-label">Job Responsibility</label>
                                                <textarea name="job_responsibility" id="editor"  class="ckeditor"> <?php echo $result['job_responsibility'] ?></textarea>
                                            </div>

                                            <div class="col s12 l12">
                                                <label for="editor" class="black-text editor-label">Job Requirements</label>
                                                <textarea name="job_requirement" class="ckeditor"><?php echo $result['job_requirement'] ?></textarea>

                                            </div>

                                        </div>

                                        

                                        <div class="col s12">
                                            <?php 
                                                   echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : '' 
                                                   ?>
                                            <?php ?>
                                        </div>

                                     
                                            <input type="hidden" name="id"
                                            value="<?php echo $result['id'] ?>">
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
    <script src="<?php echo base_url() ?>assets/js/tag.js"></script>

    <script>
    <?php $this->load->view('include/message.php'); ?>
    </script>
    <script>
    $(document).ready(function() {
        $('#tags').tagsInput({
                    'defaultText':'Add skills',
                });

       
        $("#job-form").validate();
    });
    </script>
   <script>
  
    </script>
<script>

$(document).ready(function() {
   $('#job-form').submit(function(e) {
            for ( instance in CKEDITOR.instances ) {
                CKEDITOR.instances[instance].updateElement();
            }
            e.preventDefault();
            var job_title = $('#job_title').val();
            var job_type = $('#job_type').val();
            var qualification = $('#qualification').val();
            var experience = $('#experience').val();
            var tags = $('#tags').val();
            var job_description = $('#job_description').val();
            var job_responsibility = $('#job_responsibility').val();
            var job_requirement = $('#job_requirement').val();
 
            if (job_title != '' && job_type != '' && qualification != '' && experience != '' &&
            job_description != '' && tags != '' && job_responsibility != '' && job_requirement != '') {
                loder(true)
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url().'job/update';?>",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    dataType: "json",
                    success: function(response) {
                      
                        if (response ==true) {

                            loder(false)
                            M.toast({
                                html: 'Job updated succesfully',
                                classes: 'green',
                                displayLength: 5000
                            });
                        } else {
                            loder(false)
                            M.toast({
                                html: 'Some error occured',
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