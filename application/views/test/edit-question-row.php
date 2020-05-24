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
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-clockpicker.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/croppie.css">
    
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,700|Montserrat:300,400,500,600,700|Source+Code+Pro&display=swap"
        rel="stylesheet">
       
    <!-- bar -->
    <style>

.clockpicker-popover .popover-content{
    position: absolute;
top: 261px;
right: 96px;
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
                                <p class="h5-para black-text m0">Edit  Question Group </p>
                            </div>
                            <div class="col 12 m6 right-align">
                                <a href="<?php echo base_url('test/generate-question/'.$rows->sub_id) ; ?>"
                                    class="waves-effect waves-light btn green darken-4 white-text hoverable "><i
                                        class="fas fa-backward left"></i> Back</a>
                            </div>
                        </div>




                        <div class="card">
                            <div class="card-content">
                                <div class="form-container">
                                    <form action="<?php echo base_url().'test/add_question_row';?>" method="post" style="overflow-y: auto;overflow-x: hidden;"
                                        id="question-form">


                                        <div class="row m0">
                                            <div class="input-field col s12 l6">

                                                <h6>Dificulty Level</h6>
                                                <p>
                                                    <label>
                                                        <input class="dificulty" name="dificulty" type="radio" <?php echo ($rows->dificulty =='easy')?'checked':''  ;?>
                                                            value="easy" />
                                                        <span>Easy</span>
                                                    </label>
                                                    <label>
                                                        <input class="dificulty" name="dificulty" type="radio"
                                                            value="moderate" <?php echo ($rows->dificulty ==='moderate')?'checked':'';?> />
                                                        <span>Moderate</span>
                                                    </label>
                                                    <label>
                                                        <input class="dificulty" name="dificulty" type="radio"
                                                            value="high" <?php echo ($rows->dificulty ==='high')?'checked':'';?> />
                                                        <span>High</span>
                                                    </label>
                                                </p>
                                            </div>
                                            <div class="input-field col s12 l3">
                                                <input type="number" id="percent" name="percent" class="validate"
                                                    required value="<?php echo $rows->percent;?>">
                                                <label for="percent">Percent<span class="red-text">*</span></label>


                                                <?php
                                                    
                                                    $str_time='00:00';
                                                    $time_seconds=0;
                                                    if(!empty($total_rows)){ foreach( $total_rows as $keys=>$values){

                                                        $str_time = $values->duration;
                                                        sscanf($str_time, "%d:%d",  $minutes, $seconds);
                                                        $time_seconds = (int)$time_seconds +  (int)($minutes * 60 + $seconds);
                                                       
                                                    }}
                                                   
                                                    
                                                    $this_time_seconds=0;
                                                    
                                                   
                                                    if(!empty($question_row)){$total=0; foreach( $question_row as $key=>$value){$total = $total+(int)$value->percent; 
                                                        $this_str_time = $value->duration;
                                                        sscanf($this_str_time, "%d:%d",  $minutes, $seconds);

                                                       $this_time_seconds = (int)$this_time_seconds +  (int)($minutes * 60 + $seconds);
                                                     }}
                                                  
                                                     ?>
                                                  <input type="hidden" value="<?php echo $time_seconds - $this_time_seconds;?>" id="totalSeconds">
                                                  
                                                <h6 class="m0"> <b><span id="percentCount"><span><?php echo (!empty($total))?100-$total:''?></span> </span>% Left </b></h6>
                                                <input type="hidden" id="per" value="<?php echo (!empty($total))?($total-$rows->percent):''?>">
                                            </div>
                                            <div class="input-field col s12 l3" style="position:relative">
                                                <input type="text" readonly id="duration" name="duration"
                                                    class=" validate " value="<?php echo $rows->duration;?>" required>
                                                  
                                                <label for="duration">Duration<span class="red-text">*</span></label>
                                                <h6 class="m0"> <b><span id="minCount"><?php echo (!empty($time_seconds))?gmdate("i:s", $time_seconds):'00' ; ?></span> Min Used </b></h6>
                                               
                                               <?php  $this_second = $rows->duration;
                                                        sscanf($this_second, "%d:%d",  $minutes, $seconds);
                                                        $this_second = (int)($minutes * 60 + $seconds);
                                                    // echo  $this_second; ?>
                                                <input type="hidden" id="old_sec" value="<?php echo (!empty($time_seconds))?($time_seconds-$this_second):'0'?>">
                                            </div>
                                        </div>
                                        <div class="col s12">
                                            <?php echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : '' ?>
                                        </div>

                                        <input type="hidden" name="uniq" id="uniq"
                                            value="<?php echo $rows->uniq ?>">
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

    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
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
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap-clockpicker.min.js"></script>
   

    <script>
    $(document).ready(function() {
       
        $('table').DataTable({

            dom: 'Bfrtip',
            buttons: [

            ],
        });
        $('select').formSelect();
        $("#subject-form").validate();
      
    });
    </script>

    
        <script type="text/javascript">
var input = $('#duration').clockpicker({
	placement: 'top',
	
	autoclose: true,
	'default': '00:00'
});

</script>

<script>
    $(document).ready(function() {

        loadData();
        $('#question-form').submit(function(e) {
            
            e.preventDefault();
            var percent = $('#percent').val();
            var uniq = $('#uniq').val();
            var duration = $('#duration').val();
            var dificulty = $(".dificulty:checked").val();
            
            var per = $('#per').val();
            var sec = $('#duration').val();
            var old_sec = $('#old_sec').val();

            function convert(input){
                var total='';
                var parts = input.split(':'),
                    minutes = +parts[0],
                    seconds = +parts[1];
                    newSec= (minutes * 60 + seconds).toFixed(3);
                return newSec;
            }
           
            convert(sec);
           


          if(parseInt(per)+parseInt(percent) <= 100  ){
             
              if(parseInt(old_sec)+parseInt(newSec) <= 3600){
                 
                if (percent != '' && duration != '' && dificulty != '' ) {
                    loder(true)
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url().'test/update_question_row';?>",
                    data: {
                        percent: percent,
                        duration: duration,
                        dificulty: dificulty,
                        uniq:uniq,
                    },
                    dataType: "json",
                    success: function(response) {
                        loder(false)
                        if (response != '') {
                           
                            
                           loadData();
                            M.toast({
                                html: 'Question group updated succesfully',
                                classes: 'green',
                                displayLength: 5000
                            });
                        } else {
                            M.toast({
                                html: 'error occured',
                                classes: 'red',
                                displayLength: 5000
                            });
                        }
                    }
                });
            }
               
            
              }else{
                alert('Total time  could not exceed to 60 minutes')
              }
           
          }else{
            alert('Percentage alloted to this subject could not exceed to 100')
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

    function loadData() {
            var sub_id = '<?php echo $sub_id; ?>';
            var total = $('#totalSeconds').val();
            $.ajax({
                url: "<?php echo base_url().'test/display_question_row';?>",
                type: "POST",
                data: {
                    sub_id: sub_id
                },
                dataType: 'json',
                success: function(data) {
                  
                    var percentCount = 0;
                    var count =0;
                    var displayData = $();
                    for (var i = 0; i < data.length; i++) {
                        count++;
                        percentCount = percentCount+parseInt(data[i].percent);
                        sec = data[i].duration;
                       
                    function convert(input) {
                       
                        var parts = input.split(':'),
                            minutes = +parts[0],
                            seconds = +parts[1];
                            newSec= (minutes * 60 + seconds).toFixed(3);
                        return newSec;
                    }
                convert(sec);
                total =  parseInt(total)+parseInt(newSec);
                var totalmin='';

                function secondsToMinutes(time){
                    if(Math.floor(time % 60) !=0){
                        return totalmin =  Math.floor(time / 60)+':'+Math.floor(time % 60);
                    }else{
                        return totalmin =  Math.floor(time / 60)+':00';
                    }
                }
                

               secondsToMinutes(total)
               
                       
                    }
                   

                
                    $('#percentCount').html('<span>'+(100- percentCount) +'</span>');
                   
                    if(totalmin != undefined){
                        $('#minCount').html('<span>'+ totalmin +'</span>');
                    }
                   // $('#per').val(percentCount);
                   
                }
            });
        }



        
    });
    </script>

   

    <script>
    <?php $this->load->view('include/message.php'); ?>
    </script>

</body>

</html>