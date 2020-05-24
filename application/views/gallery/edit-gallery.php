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
    .galimg {
        max-height: 175px;
        overflow: hidden;
        width: 100%;
        margin-bottom: 10px;
    }
    .image-div{
        position:relative;
    }
    .check {
	position: absolute;
	left: 0;
	top: 0;
}
[type="checkbox"] + span:not(.lever)::before, [type="checkbox"]:not(.filled-in) + span:not(.lever)::after {
	border: 2px solid #f41b1b;
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
                            <p class="h5-para black-text  m0">Edit Gallery</p>
                            </div>
                            <div class="col 12 m6 right-align">
                                <a href="<?php echo base_url('gallery/manage')  ?>"
                                    class="waves-effect waves-light btn green darken-4 white-text hoverable "><i
                                        class="fas fa-backward left"></i> Back</a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-content">
                                <div class="form-container">
                                    <form action="<?php echo base_url('gallery/update_featured/'.$result['id']) ?>"
                                        method="post" style="overflow-y: auto;overflow-x: hidden;" id="city-form"
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


                                            <div class="file-field input-field col s12 l6 img" id="imgfile">
                                                <div class="btn btn-small black-text grey lighten-3">
                                                    <i class="far fa-image left  "></i>
                                                    <span class="">Featured Image</span>
                                                    <input type="file" name="feat_image" id="feat_image"
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

                                            <?php if(!empty($result['feat_image'])) {
                                                    ?>
                                            <div class="form-group col s12 m2 l2">
                                                <input type="hidden" name="edit" value="edit">
                                                <div class="" id="edt-image">
                                                    <div class="image view view-first">
                                                        <img class="city-edit-image responsive-img"
                                                            src="<?php echo $this->config->item('web_url').$result['feat_image']?>"
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
                                        </div>
                                        <div class="row ">
                                            <div class="col s12 l12">
                                                <div class="input-field" id="image-upload">
                                                    <div class="input-images-1" style="padding-top: .5rem;"></div>
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
                                                <label>
                                                    <input type="checkbox" class="filled-in " <?php if($result['home_gallery']==1){echo 'checked';}?>  name="home_gallery" value="1" />
                                                    <span>Select For Home Gallery</span>
                                                </label>

                                            </div>
                                        </div>
                                        <input type="hidden" name="id"
                                            value="<?php echo $result['id'] ?>">
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

                        <div class="card">
                            <div class="card-content">
                                <div class="form-container">
                                    <div class="row">
                                        <div class="col 12 m6">
                                            <p class="h5-para black-text m0">Gallery List</p>
                                          <label >
                                          <input type="checkbox" id="master" />
                                                <span>Select All</span>
                                          </label>
                                            
                                        </div>
                                        <div class="col 12 m6 right-align">
                                            <a 
                                                class="waves-effect waves-light btn red darken-4 white-text hoverable delete_all" data-url="/itemDelete"><i
                                                    class="fas fa-trash left " ></i> Delete </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php if(!empty($gallery)){ foreach($gallery as $key=>$value){ ?>
                                        <div class="col l4 m4 s6 imgbox ">
                                        <div class="image-div">
                                        <img src="<?php echo $this->config->item('web_url').$value->images?>" alt=""
                                                class="galimg responsive-img">
                                            <label class="check">
                                                <input type="checkbox" type="checkbox" class="sub_chk"
                                                    data-id="<?php echo $value->id; ?>" />
                                                <span></span>
                                            </label>
                                        </div>
                                            

                                        </div>
                                        <?php }} ?>
                                    </div>
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
        $("#city-form").validate({
            rules: {
                city: {
                    required: true,
                },
            },
            messages: {

                city: "Please enter a city",
            }
        });
    });
    </script>
    <script>
    $(function() {

        $('.input-images-1').imageUploader();

    });
    $(document).ready(function() {
        $('.datepicker').datepicker();
    });
    </script>


    <script type="text/javascript">
    $(document).ready(function() {

        $('#master').on('click', function(e) {
            if ($(this).is(':checked', true)) {
                $(".sub_chk").prop('checked', true);
            } else {
                $(".sub_chk").prop('checked', false);
            }
        });

        $('.delete_all').on('click', function(e) {
            loder(true)
            var allVals = [];
            $(".sub_chk:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });

            if (allVals.length <= 0) {
                alert("Please select row.");
            } else {

                var check = confirm("Are you sure you want to delete this row?");
                if (check == true) {

                    var join_selected_values = allVals.join(",");
                   

                    $.ajax({
                        url: '<?php echo base_url('gallery/deleteAll') ?>',
                        type: 'POST',
                        data: 'ids=' + join_selected_values,
                        success: function(data) {
                            loder(false)
                            $(".sub_chk:checked").each(function() {
                                $(this).parents(".imgbox").remove();
                            });
                            M.toast({
                            html: 'Image deleted succesfully',
                            classes: 'green',
                            displayLength: 5000
                        });
                        },
                        error: function(data) {
                            M.toast({
                            html: 'Some error occured please try again',
                            classes: 'red',
                            displayLength: 5000
                        });
                        }
                    });

                    $.each(allVals, function(index, value) {
                        $('.imgbox').filter("[data-row-id='" + value + "']").remove();
                    });
                }
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
    $(document).ready(function() {
          
        $('#city-form').submit(function(e) {
          
            e.preventDefault();

           
            var feat_image =    $("#feat_image")[0].files.length;

           
            var $el = $('#imgfile');

                loder(true)
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url().'gallery/update_featured';?>",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    dataType: "json",
                    success: function(response) {
                        loder(false)
                        if (response==true) {
                           
                            $el.wrap('<form>').closest(
                                'form').get(0).reset();
                            $el.unwrap();
                            
                           $('#image-upload').html('<div class="input-images-1" style="padding-top: .5rem;"></div>');
                           $('.input-images-1').imageUploader();
                            loder(false)
                           
                            M.toast({
                                html: 'Gallery updated succesfully',
                                classes: 'green',
                                displayLength: 5000
                            });
                        }
                        else{
                            
                            M.toast({
                                html: response.error,
                                classes: 'red',
                                displayLength: 5000
                            });
                        }
                    }
                });
            

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