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
    <script src="<?php echo base_url()?>assets/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url()?>assets/ckeditor/samples/js/sample.js"></script>
    <!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/ckeditor/samples/css/samples.css" /> -->
    <link rel="stylesheet"
        href="<?php echo base_url()?>assets/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css" />
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
    select.error{
        position:unset;
        display:none;
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
                    <?php $this->load->view('include/pre-loader'); ?>
                        <div class="row m0">
                            <div class="col l6 m6">
                            <p class="h5-para black-text  m0">Add Course</p>
                            </div>
                            <div class="col 12 m6 right-align">
                                <a href="<?php echo base_url('course/manage')  ?>"
                                    class="waves-effect waves-light btn green darken-4 white-text hoverable "><i
                                        class="fas fa-backward left"></i> Back</a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-content">
                                <div class="form-container">
                                    <form action="<?php echo base_url() ?>course/insert" method="post"
                                        style="overflow-y: auto;overflow-x: hidden;" id="course-form"
                                        enctype="multipart/form-data">


                                        <div class="row m0">
                                          
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="course" name="course" class="validate" required>
                                                <label for="course">Course Name<span class="red-text">*</span></label>
                                            </div>

                                            <div class="input-field col s12 l6">
                                                <input type="url" id="video" name="video" class="validate" required>
                                                <label for="video">Video Link<span class="red-text">*</span></label>

                                            </div>
                                            <div class="input-field col s12 l6">
                                                <input type="number" id="amount" name="amount" class="validate"
                                                    required>
                                                <label for="amount">Amount<span class="red-text">*</span></label>

                                            </div>
                                            <div class="input-field col s12 l6">
                                                <input type="number" id="discount" name="discount" class="validate"
                                                    maxlength="2" required>
                                                <label for="discount">Discount in %<span
                                                        class="red-text">*</span></label>
                                            </div>
                                            <div class="file-field input-field col s12 l6 img" id="imgfile">
                                                <div class="btn btn-small black-text grey lighten-3">
                                                    <i class="far fa-image left  "></i>
                                                    <span class="">Video Background Image</span>
                                                    <input type="file" name="video_background" id="video_background"
                                                        accept=".png, .jpg, .jpeg" required>
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
                                            <div class="input-field col s12 l6">
                                                <select required name="level" id="level">
                                                    <option value="" disabled selected>Select Level</option>
                                                    <option value="School Level Programs">School Level Programs</option>
                                                    <option value="PUC/Class 11 batch">PUC/Class 11 batch</option>
                                                    <option value="Digital Live Classes">Digital Live Classes</option>
                                                    
                                                </select>
                                                    
                                            </div>
                                        </div>
                                        <div class="row m0">
                                       
                                        <div class="input-field col s12 l12">
                                       
                                            <div class="col s12 l12">
                                                <label for="description" class="black-text editor-label">Course Description</label>
                                                <textarea id="description" name="description" class="ckeditor" required></textarea>

                                            </div>
                                            <div class="col s12 l12">
                                                <label for="editor" class="black-text editor-label">Course Detail</label>
                                                <textarea name="detail" id="detail" class="ckeditor" required></textarea>

                                            </div>
                                            <div class="col s12 l12">
                                            <h6>For SEO purpose</h6>
                                            <div class="divider"></div>
                                            </div>
                                           
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="title" name="title" class="validate" required >
                                                <label for="title">Title<span class="red-text">*</span></label>
                                            </div>
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="slug" name="slug" class="validate" required readonly placeholder="Slug">
                                               
                                            </div>
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="metakey" name="metakey" class="validate" required>
                                                <label for="metakey">Meta Key<span class="red-text">*</span></label>
                                            </div>
                                            <div class="input-field col s12 l6">
                                                <textarea id="metadesc" name="metadesc" class="validate materialize-textarea" required></textarea>
                                                <label for="metadesc">Meta Description<span class="red-text">*</span></label>
                                            </div>

                                            <div class="input-field col s12 l6">
                                                <label>
                                                    <input type="checkbox" class="filled-in " name="top_course"
                                                        value="1" />
                                                    <span>Select For Top Courses</span>
                                                </label>
                                            </div>



                                        </div>

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
    $("#title").change(function(){
    var slug = $(this).val();
    str = slug.replace(/\s+/g, '-').toLowerCase();
    $('#slug').val(str);
    });
    $("#title").keyup(function(){
    var slug = $(this).val();
    str = slug.replace(/\s+/g, '-').toLowerCase();
    $('#slug').val(str);
    });

    $(document).ready(function(){
    $('select').formSelect();
  });

    </script>



    <script>
    <?php $this->load->view('include/message.php'); ?>
    </script>
    <script>
    $(document).ready(function() {

        $('select').formSelect();
        $("#course-form").validate();
    });
    </script>


 <script>
    function CKupdate(){
    for ( instance in CKEDITOR.instances ){
        CKEDITOR.instances[instance].updateElement();
        CKEDITOR.instances[instance].setData('');
    }
}
    $(document).ready(function() {

      
        $('#course-form').submit(function(e) {
         
            for ( instance in CKEDITOR.instances ) {
                CKEDITOR.instances[instance].updateElement();
            }
            e.preventDefault();
            var course = $('#course').val();
            var video = $('#video').val();
            var amount = $('#amount').val();
            var discount = $('#discount').val();
            var level = $('#level').val();
            var description = $('#description').val();

            var detail = $('#detail').val();
            var title = $('#title').val();
            var metakey = $('#metakey').val();
            var metadesc = $('#metadesc').val();
            var slug = $('#slug').val();

          
            var video_background =    $("#video_background")[0].files.length;
            var $el = $('#imgfile');
           

            if (course != '' && video != '' && amount != '' && discount != '' &&
            level != '' && description != '' && detail !='' && title !='' && metakey !='' && metadesc !='' && slug !='' && video_background>0) {
                loder(true)
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url().'course/insert';?>",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    dataType: "json",
                    success: function(response) {
                        loder(false)
                        if (response ==true) {
                            CKupdate();
                            $el.wrap('<form>').closest(
                                'form').get(0).reset();
                            $el.unwrap();
                            $('#course').val('');
                            $('#video').val('');
                            $('#amount').val('');
                            $('#discount').val('');
                            $('#level').val('');
                            $('#description').val('');
                            $('#detail').val('');
                            $('#title').val('');
                            $('#metakey').val('');
                            $('#metadesc').val('');
                            $('#slug').val('');
                           
                           
                            M.toast({
                                html: 'Course added succesfully',
                                classes: 'green',
                                displayLength: 5000
                            });
                      
                        }else if(response == false){
                            M.toast({
                                html: 'Allready exist with same title or course name',
                                classes: 'red',
                                displayLength: 5000
                            });
                        } else {
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