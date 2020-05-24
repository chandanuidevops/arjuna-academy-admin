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
    <link rel="stylesheet" href="<?php echo base_url()?>assets/dataTable/datatables.min.css">
      <link rel="stylesheet" href="<?php echo base_url()?>assets/dataTable/button/css/buttons.dataTables.css">
      <script src="<?php echo base_url()?>assets/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url()?>assets/ckeditor/samples/js/sample.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet"
        href="<?php echo base_url()?>assets/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/croppie.css">
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,700|Montserrat:300,400,500,600,700|Source+Code+Pro&display=swap"
        rel="stylesheet">
        <script src="<?php echo base_url()?>assets/ckeditor/plugins/ckeditor_wiris/integration/WIRISplugins.js?viewer=image"></script>
 <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
  <script id="MathJax-script" async
          src="https://cdn.jsdelivr.net/npm/mathjax@3.0.1/es5/tex-mml-chtml.js">
  </script>

    <!-- bar -->
    <style>

    #blk-2 img{
        height:100px;
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
                            <p class="h5-para black-text m0">Edit </p>
                          
                            </div>
                            <div class="col 12 m6 right-align">
                                <button onclick="history.back()" href="<?php //echo base_url('test/add-question/'.$result->q_row_id.'/'.$result->sub_id)  ?>"
                                class="waves-effect waves-light btn green darken-4 white-text hoverable "><i class="fas fa-backward left"></i>Back</button>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="form-container">

                                    <form action="<?php echo base_url('test/update_question');?>" method="post"
                                        style="overflow-y: auto;overflow-x: hidden;" id="question-form" enctype= multipart/form-data>


                                        <div class="row m0">
                                            <div class="input-field col s12 l12">
                                            <p for="" class="mb10">Question</p>
                                                <textarea name="question" class="ckeditor"  required><?php echo $result->question;?></textarea>

                                               
                                            </div>
                                            <div class="file-field input-field col s12 l6 img" id="imgfile">
                                                <div class="btn btn-small black-text grey lighten-3">
                                                    <i class="far fa-image left  "></i>
                                                    <span class="">Question Image</span>
                                                    <input type="file" name="question_img" id="upload"
                                                        accept=".png, .jpg, .jpeg">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                </div>
                                                <h6 class=" m0">
                                                    <small> <i><b>Note</b>: Please select only image file (eg: .jpg,
                                                            .png, .jpeg etc.) <br>
                                                            <span class="bold">Max file size:</span> 512kb <span
                                                                class="red-text">*</span>
                                                            <span class="bold">Image ratio:</span> 500*320 <span
                                                                class="red-text">*</span>
                                                        </i>
                                                    </small>
                                                </h6>
                                            </div>
                                            <div class=" col s12 l6 img" id="imgbutton">
                                                <button type="button"
                                                    class="waves-effect waves-light btn green darken-4 white-text hoverable "
                                                    id="imgbutton"> Add Image</button>
                                            </div>
                                            <?php if(!empty($result->question_img)) {
                                                    ?>
                                            <div class="form-group col s12 m2 l2">
                                               
                                                <div class="" id="edt-image">
                                                    <div class="image view view-first">
                                                        <img class=" responsive-img"
                                                            src="<?php echo $this->config->item('web_url').$result->question_img;?>"
                                                            alt=" " id="targetimg">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }?>
                                        </div>

                                        <div class="row m0">
                                            <div class="col m12 s12 l12">
                                                <label>
                                                    <input id="rdb1" type="radio" name="toggler" value="1" checked />
                                                    <span>Text Options</span>
                                                </label>
                                                <label>
                                                    <input id="rdb2" type="radio" name="toggler" value="2"  />
                                                    <span>Image Options</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="row m0 toHide" id="blk-2" style="display:none">
                                            <div class="col  file-field input-field  col s6  m4 l4 img">
                                                <div class="btn btn-small black-text grey lighten-3">
                                                    <i class="far fa-image left  "></i>
                                                    <span class="">Choice 1</span>
                                                    <input type="file" name="choice_img[]" id="choice_img1"
                                                        accept=".png, .jpg, .jpeg">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                </div>
                                                <p>
                                                    <label>
                                                        <input class="correct" name="correct" type="radio" <?php if(!empty($result->correct =='1' )){echo 'checked';} ?>
                                                            value="1" />
                                                        <span>Correct</span>
                                                    </label>
                                                </p>
                                            </div>
                                            <?php if(!empty($result->choice_img1)) {
                                                    ?>
                                            <div class="form-group col s6  m2 l2">
                                               
                                                <div class="" id="edt-image">
                                                    <div class="image view view-first">
                                                        <img class=" responsive-img"
                                                            src="<?php echo $this->config->item('web_url').$result->choice_img1;?>"
                                                            alt=" " id="targetimg">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }?>
                                            <div class="col m6 m4 l4 input-field file-field">
                                                <div class="btn btn-small black-text grey lighten-3">
                                                    <i class="far fa-image left  "></i>
                                                    <span class="">Choice 2</span>
                                                    <input type="file" name="choice_img[]" id="choice_img2"
                                                        accept=".png, .jpg, .jpeg">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                </div>
                                                <p>
                                                    <label>
                                                        <input class="correct" name="correct" type="radio" 
                                                            value="2" <?php if(!empty($result->correct =='2' )){echo 'checked';} ?> />
                                                        <span>Correct</span>
                                                    </label>
                                                </p>
                                            </div>
                                            <?php if(!empty($result->choice_img2)) {
                                                    ?>
                                            <div class="form-group col s6  m2 l2">
                                               
                                                <div class="" id="edt-image">
                                                    <div class="image view view-first">
                                                        <img class=" responsive-img"
                                                            src="<?php echo $this->config->item('web_url').$result->choice_img2;?>"
                                                            alt=" " id="targetimg">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }?>
                                            <div class="col m4 l4 s6 input-field file-field">
                                                <div class="btn btn-small black-text grey lighten-3">
                                                    <i class="far fa-image left  "></i>
                                                    <span class="">Choice 3</span>
                                                    <input type="file" name="choice_img[]" id="choice_img3"
                                                        accept=".png, .jpg, .jpeg">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                </div>
                                                <p>
                                                    <label>
                                                        <input class="correct" name="correct" type="radio" 
                                                            value="3" <?php if(!empty($result->correct =='3' )){echo 'checked';} ?> />
                                                        <span>Correct</span>
                                                    </label>
                                                </p>
                                            </div>
                                            <?php if(!empty($result->choice_img3)) {    ?>
                                            <div class="form-group col s6  m2 l2">
                                               
                                                <div class="" id="edt-image">
                                                    <div class="image view view-first">
                                                        <img class=" responsive-img"
                                                            src="<?php echo $this->config->item('web_url').$result->choice_img3;?>"
                                                            alt=" " id="targetimg">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }?>
                                            <div class="col m4 l4 s6 input-field file-field">
                                                <div class="btn btn-small black-text grey lighten-3">
                                                    <i class="far fa-image left  "></i>
                                                    <span class="">Choice 4</span>
                                                    <input type="file" name="choice_img[]" id="choice_img4"
                                                        accept=".png, .jpg, .jpeg">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                </div>
                                                <p>
                                                    <label>
                                                        <input class="correct" name="correct" type="radio" 
                                                            value="4" <?php if(!empty($result->correct =='4' )){echo 'checked';} ?>/>
                                                        <span>Correct</span>
                                                    </label>
                                                </p>
                                            </div> 
                                            <?php if(!empty($result->choice_img4)) {    ?>
                                            <div class="form-group col s6  m2 l2">
                                               
                                                <div class="" id="edt-image">
                                                    <div class="image view view-first">
                                                        <img class=" responsive-img"
                                                            src="<?php echo $this->config->item('web_url').$result->choice_img4;?>"
                                                            alt=" " id="targetimg">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }?>
                                        </div>

                                        <div class="row m0 toHide" id="blk-1">
                                            <div class="col m6 input-field">
                                                <input type="text" id="choice1" name="choice1" class="validate"
                                                    required value="<?php echo $result->choice1;?>">
                                                <label for="choice1">Choice 1<span class="red-text">*</span></label>
                                                <p>
                                                    <label>
                                                        <input class="correct" name="correct" type="radio" 
                                                            value="1" <?php if(!empty($result->correct =='1' )){echo 'checked';} ?>/>
                                                        <span>Correct</span>
                                                    </label>
                                                </p>


                                            </div>
                                            <div class="col m6 input-field">
                                                <input type="text" id="choice2" name="choice2" class="validate"
                                                    required value="<?php echo $result->choice2;?>">
                                                <label for="choice2">Choice 2<span class="red-text">*</span></label>
                                                <p>
                                                    <label>
                                                        <input class="correct" name="correct" type="radio"
                                                            value="2" <?php if(!empty($result->correct =='2' )){echo 'checked';} ?> />
                                                        <span>Correct</span>
                                                    </label>
                                                </p>
                                            </div>
                                            <div class="col m6 input-field">
                                                <input type="text" id="choice3" name="choice3" class="validate"
                                                    required value="<?php echo $result->choice3;?>">
                                                <label for="choice3">Choice 3<span class="red-text">*</span></label>
                                                <p>
                                                    <label>
                                                        <input class="correct" name="correct" type="radio"
                                                            value="3" <?php if(!empty($result->correct =='3' )){echo 'checked';} ?>/>
                                                        <span>Correct</span>
                                                    </label>
                                                </p>
                                            </div>
                                            <div class="col m6 input-field">
                                                <input type="text" id="choice4" name="choice4" class="validate"
                                                    required value="<?php echo $result->choice4;?>">
                                                <label for="choice4">Choice 4<span class="red-text">*</span></label>
                                                <p>
                                                    <label>
                                                        <input class="correct" name="correct" type="radio"
                                                            value="4"  <?php if(!empty($result->correct =='4' )){echo 'checked';} ?>/>
                                                        <span>Correct</span>
                                                    </label>
                                                </p>
                                            </div>
                                          
                                           
                                        </div>


                                       
                                        <input type="hidden" id="subject" name="subject"
                                                value="<?php echo $result->subject;?>">
                                            <input type="hidden" id="sub_id" name="sub_id"
                                                value="<?php echo $result->sub_id;?>">
                                                <input type="hidden" id="id" name="id"
                                                value="<?php echo $result->id;?>">

                                        <div class="col s12">
                                            <?php echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : ''    ?>
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

   
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/image-uploader.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/croppie.js"></script>

    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/datatables.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/dataTables.buttons.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/buttons.flash.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/buttons.html5.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/pdfmake.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/vfs_fonts.js"></script>


    <script>
    $(document).ready(function() {
        $("#imgfile").hide();
        $("#imgbutton").click(function() {
            $("#imgfile").toggle(1000);
        });

       $("#question-form").validate();

       $("[name=toggler]").click(function(){
            $('.toHide').hide();
            $("#blk-"+$(this).val()).fadeIn(500);
    });
    });
    </script>
 
 <script>
 $(document).ready(function() {


$('#question-form').submit(function(e) {
    for ( instance in CKEDITOR.instances ) {
        CKEDITOR.instances[instance].updateElement();
    }
    e.preventDefault();
    var percentCount = $('#per').val();

    var question = $('#question').val();
    var choice1 = $('#choice1').val();
    var choice2 = $('#choice2').val();
    var choice3 = $('#choice3').val();
    var choice4 = $('#choice4').val();

    var $el = $('#imgfile');
    var choice_img1= $("#choice_img1")[0].files.length;
    var choice_img2 = $("#choice_img2")[0].files.length;
    var choice_img3 = $("#choice_img3")[0].files.length;
    var choice_img4 = $("#choice_img4")[0].files.length;

    if (question != ''  && ( (choice1 != '' && choice2 != '' &&
        choice3 != '' && choice4 != '') || (choice_img1>0 && choice_img2>0 && choice_img3>0 && choice_img4>0 )  )) {
        loder(true)
        $.ajax({
            type: "POST",
            url: "<?php echo base_url().'test/update_question';?>",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            dataType: "json",
            success: function(response) {
                if (response == true) {
                    loder(false)
                    $el.wrap('<form>').closest(
                    'form').get(0).reset();
                    $el.unwrap();
                    M.toast({
                        html: 'Question updated succesfully',
                        classes: 'green',
                        displayLength: 5000
                    });
                
                } else {
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