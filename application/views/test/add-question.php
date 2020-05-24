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
    <script src="<?php echo base_url()?>assets/ckeditor/plugins/ckeditor_wiris/integration/WIRISplugins.js?viewer=image"></script>
   
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet"
        href="<?php echo base_url()?>assets/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/croppie.css">
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,700|Montserrat:300,400,500,600,700|Source+Code+Pro&display=swap"
        rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3.0.1/es5/tex-mml-chtml.js">
    </script>
    <!-- bar -->
    <style>
 #blk-2 img{
        height:100px;
    }
.dnone{
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
                                <p class="h5-para black-text m0">Subject : <?php echo $result->subject;?></p>
                            </div>
                            <div class="col 12 m6 right-align">
                                <a href="<?php echo base_url('test/generate-question/'.$result->id)  ?>"
                                    class="waves-effect waves-light btn green darken-4 white-text hoverable "><i
                                        class="fas fa-backward left"></i> Back</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="form-container">

                                    <form action="<?php echo base_url('test/insert_question');?>" method="post"
                                        style="overflow-y: auto;overflow-x: hidden;" id="question-form">


                                        <div class="row ">

                                            <div class="input-field col s12">
                                                

                                                <p for="" class="mb10">Question</p>
                                                <textarea id="question"  name="question" class="ckeditor"  required></textarea>
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
                                            <div class=" col s12 l6 " id="imgbutton">
                                                <button type="button"
                                                    class="waves-effect waves-light btn green darken-4 white-text hoverable "
                                                    id="imgbutton"> Add Image</button>
                                            </div>
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
                                            <div class="col  file-field input-field  col s12 l6 img">
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
                                                        <input class="correct" name="correct" type="radio" checked
                                                            value="1" />
                                                        <span>Correct</span>
                                                    </label>
                                                </p>
                                            </div>
                                            <div class="col m6 input-field file-field">
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
                                                            value="2" />
                                                        <span>Correct</span>
                                                    </label>
                                                </p>
                                            </div>
                                            <div class="col m6 input-field file-field">
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
                                                            value="3" />
                                                        <span>Correct</span>
                                                    </label>
                                                </p>
                                            </div>
                                            <div class="col m6 input-field file-field">
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
                                                            value="4" />
                                                        <span>Correct</span>
                                                    </label>
                                                </p>
                                            </div> 
                                        </div>
                                        <div class="row m0 toHide" id="blk-1" >
                                            <div class="col m6 input-field">
                                                <input type="text" id="choice1" name="choice1" class="validate" >
                                                <label for="choice1">Choice 1<span class="red-text">*</span></label>
                                                <p>
                                                    <label>
                                                        <input class="correct" name="correct" type="radio" checked
                                                            value="1" />
                                                        <span>Correct</span>
                                                    </label>
                                                </p>

                                            </div>
                                            <div class="col m6 input-field">
                                                <input type="text" id="choice2" name="choice2" class="validate"
                                                    >
                                                <label for="choice2">Choice 2<span class="red-text">*</span></label>
                                                <p>
                                                    <label>
                                                        <input class="correct" name="correct" type="radio" value="2" />
                                                        <span>Correct</span>
                                                    </label>
                                                </p>
                                            </div>
                                            <div class="col m6 input-field">
                                                <input type="text" id="choice3" name="choice3" class="validate"
                                                    >
                                                <label for="choice3">Choice 3<span class="red-text">*</span></label>
                                                <p>
                                                    <label>
                                                        <input class="correct" name="correct" type="radio" value="3" />
                                                        <span>Correct</span>
                                                    </label>
                                                </p>
                                            </div>
                                            <div class="col m6 input-field">
                                                <input type="text" id="choice4" name="choice4" class="validate"
                                                    >
                                                <label for="choice4">Choice 4<span class="red-text">*</span></label>
                                                <p>
                                                    <label>
                                                        <input class="correct" name="correct" type="radio" value="4" />
                                                        <span>Correct</span>
                                                    </label>
                                                </p>
                                            </div> 
                                        </div>
                                       


                                            <input type="hidden" id="subject" name="subject"    value="<?php echo $result->subject;?>">
                                            <input type="hidden" id="sub_id" name="sub_id"    value="<?php echo $result->id;?>">
                                            <input type="hidden" id="q_row_id" name="q_row_id"    value="<?php echo $q_row_id;?>">

                                        <div class="col s12">
                                            <?php echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : ''    ?>
                                        </div>

                                        <input type="hidden" name="uniq" id="uniq"
                                            value="<?php echo random_string('alnum',10) ?>">
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

                        <div class="shorting-table">

                            <div class="col l12 m12 s12">

                                <p class="h5-para-p2">Manage Course </p>
                                <table id="dynamic" class="striped">
                                    <thead>
                                        <tr class="tt">
                                            <th id="a" class="h5-para-p2" width="130px">Sl No.</th>
                                            <th id="a" class="h5-para-p2" width="130px">Question</th>

                                            <th id="g" class="h5-para-p2" width="62px">Answer</th>

                                            <th id="g" class="h5-para-p2" width="62px">Choice1</th>
                                            <th id="g" class="h5-para-p2" width="62px">Choice2</th>
                                            <th id="g" class="h5-para-p2" width="62px">Choice3</th>
                                            <th id="g" class="h5-para-p2" width="62px">Choice4</th>



                                            <th id="g" class="h5-para-p2" width="62px">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody id="displayData">


                                    </tbody>
                                </table>

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
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/dataTables.buttons.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/buttons.flash.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/buttons.html5.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/vfs_fonts.js"></script>


    <script>
    $(document).ready(function() {
        $("#imgfile").hide();
        $("#imgbutton").click(function() {
            $("#imgfile").toggle(1000);
        });
        $('.modal').modal();
        $('table').DataTable({

            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf'
            ],
        });
        $('select').formSelect();
        //$("#question-form").validate();

        $("[name=toggler]").click(function(){
            $('.toHide').hide();
            $("#blk-"+$(this).val()).show('slow');
    });

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

        loadData();
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

            var sub_id = $('#sub_id').val();
            var subject = $('#subject').val();
            var q_row_id = $('#q_row_id').val();

            var correct = $(".correct:checked").val();
            var $el = $('#imgfile');
            var choice_img1= $("#choice_img1")[0].files.length;
            var choice_img2 = $("#choice_img2")[0].files.length;
            var choice_img3 = $("#choice_img3")[0].files.length;
            var choice_img4 = $("#choice_img4")[0].files.length;
           
            
            if (question != '' && sub_id != '' && ( (choice1 != '' && choice2 != '' &&
                choice3 != '' && choice4 != '') || (choice_img1>0 && choice_img2>0 && choice_img3>0 && choice_img4>0 ) ) ) {
                    // alert('ok')
                loder(true)
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url().'test/insert_question';?>",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    dataType: "json",
                    success: function(response) {
                        CKupdate();
                        if (response != '' && response != 3) {
                           // $('#question').val('');
                            $('#choice1').val('');
                            $('#choice2').val('');
                            $('#choice3').val('');
                            $('#choice4').val('');
                            $('#imgfile').val('');
                            $el.wrap('<form>').closest(
                                'form').get(0).reset();
                            $el.unwrap();
                            loder(false)
                            loadData();
                            M.toast({
                                html: 'Question added succesfully',
                                classes: 'green',
                                displayLength: 5000
                            });
                        } else if (response = 3) {
                            M.toast({
                                html: 'Maximum 3 questions allowed',
                                classes: 'red',
                                displayLength: 5000
                            });
                        } else {
                            M.toast({
                                html: 'This question is allready exist',
                                classes: 'red',
                                displayLength: 5000
                            });
                        }
                    }
                });
            }

        });

        // function clearFileInput(ctrl) {
        //     try {
        //         ctrl.value = null;
        //     } catch (ex) {}
        //     if (ctrl.value) {
        //         ctrl.parentNode.replaceChild(ctrl.cloneNode(true), ctrl);
        //     }
        // }
        //page loader
        function loder(status) {
            if (status == true) {
                $('.preloader-verfy').css('display', 'block');
            } else {
                $('.preloader-verfy').css('display', 'none');
            }
        }

        function loadData() {
            var sub_id = '<?php echo $result->id; ?>';
            var q_row_id = '<?php echo $q_row_id; ?>';
            var url = '<?php echo $this->config->item('web_url');?>'
            $.ajax({
                url: "<?php echo base_url().'test/display_question';?>",
                type: "POST",
                data: {
                    sub_id: sub_id,
                    q_row_id: q_row_id
                },
                dataType: 'json',
                success: function(data) {

                    var percentCount = 0;
                    var count = 0;
                    var displayData = $();
                    for (var i = 0; i < data.length; i++) {
                        count++;
                        percentCount = percentCount + parseInt(data[i].percent);
                        
                        displayData = displayData.add('<tr> <td>' + count + '</td> <td><p>' + data[i].question + ' </p></td> <td> ' + data[i].correct +'</td>  <td><img src="'+url+data[i].choice_img1+'" class="responsive-img"  alt=" "/><span class=" ">' + data[i].choice1 + '</span></td><td><img src="'+url+data[i].choice_img2+'" class="responsive-img" alt=" " /><span class="">' + data[i].choice2 + '</span></td><td><img src="'+url+data[i].choice_img3+'"class="responsive-img" alt=" " /><span class=" ">' + data[i].choice3 + '</span></td><td><img src="'+url+data[i].choice_img4+'" class="responsive-img"  alt=" "/><span class="">' + data[i].choice4 + '</span></td> <td class="action-btn center-align"> <a href="<?php echo base_url()?>test/edit-question/' +
                            data[i].id +'" class="blue hoverable delete-btn "><i class="fas fa-edit "></i></a> <a  href="<?php echo base_url()?>test/delete_question/' +
                            data[i].id + '/' + data[i].sub_id + '/' + data[i].q_row_id +
                            ' " class="red hoverable delete-btn delete" id="delete"><i class="fas fa-trash "></i></a> </td> </tr>'
                        )
                    }
                    $('#displayData').html(displayData);
                    $('#percentCount').html('<span>' + percentCount + '</span>');
                    $('#per').val(percentCount);
                }
            });
        }


$("#displayData").on('click', '.delete', function(event) {

    if (confirm("Are you sure you want to delete this item?") == true) {
    event.preventDefault();
     loder(true)
        var tr = $(this).closest("tr")
        var url = $(this).attr('href');
        $.ajax({
        url: url,
        type: "POST",
        dataType: "json",
      
        success: function(data) {
             loder(false)
             if(data==true){
              tr.remove();
              M.toast({
                html: 'Question  deleted succesfully',
                classes: 'green',
                displayLength: 5000
            });
           
             }else{
              M.toast({
                html: 'Some error occured',
                classes: 'red',
                displayLength: 5000
            });
             }
            
        }
    });

  } else{
     return false;
  }
  
});


    });
    </script>

    <script>
    <?php $this->load->view('include/message.php'); ?>
    </script>

</body>

</html>