<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url() ?>assets/fonts/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dataTable/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dataTable/button/css/buttons.dataTables.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/online.css">
    <style>
       
        table tr td {font-size: 13px; font-weight: 600;}
        td, th {

    padding: 8px 5px; }


     </style>
</head>

<body>
    <!-- headder -->
    <div id="header-include">
        <?php $this->load->view('include/header.php'); ?>
    </div>
    <!-- end headder -->

    <section class="sec-top">
        <div class="container-wrap">
            <div class="col l12 m12 s12">
                <div class="row">
                    <div id="sidemenu-include">
                        <?php $this->load->view('include/menu.php'); ?>
                    </div>

                    <div class="col m12 s12 l9">
                        <div class="row m0">
                            <div class="col l6 m6">
                            <a onclick="return confirm('Are you sure you want to Download the file?');" href="<?php echo base_url('test-result/download/'.$test_detail->id.'/'.$test_detail->user_id) ?>"  class="waves-effect waves-light btn white-text  green hoverable">Download</a>
                            </div>
                            <div class="col 12 m6 right-align">
                                <a href="<?php echo base_url('test-result/manage')  ?>"
                                    class="waves-effect waves-light btn green darken-4 white-text hoverable "><i
                                        class="fas fa-backward left"></i> Back</a>
                            </div>
                        </div>
                        <!-- end row1 -->

                        <!-- table start -->
                        <div class="card">
                            <div class="card-content">
                                <div class="form-container">


                                    <table class="bordered">
                                        <tbody>
                                            <tr>
                                                <th style="border-top: 1px solid gray;border-bottom: 1px solid gray;border-left: 1px solid gray;border-right:none;"
                                                    colspan="2" class="right-align">web:   www.aaaedu.in
                                                </th>
                                                <th style="border-top: 1px solid gray;border-bottom: 1px solid gray;border-right:1px solid gray;border-left: none;"
                                                    class="right-align">Mob: 90193 33101</th>
                                            </tr>
                                            <tr style="border: 1px solid gray;">
                                               
                                                <td style="border-top: 1px solid gray;border-bottom: 1px solid gray;border-left: 1px solid gray;border-right: none;"
                                                    colspan="2"><img class="p-image" style="height:65px"
                                                        src="<?php echo $this->config->item('web_url').'assets/img/logo.png';?>" alt="">
                                                </td>
                                                <td style="border-top: 1px solid gray;border-bottom: 1px solid gray;border-left: none;border-right:1px solid gray;"
                                                    class="right-align">
                                                   
                                                   
                                                 
                                                </td>
                                            </tr>

                                            <?php   $totalPercent=0;
                                                    $totalSecond=0;
                                                    $attemptPercent =0;
                                                    $correct = 0;
                                                    foreach($q_detail as $key=>$value){
                                                    $totalPercent =  (int)$totalPercent +   (int)$value['percent'];
                                                    $totalSecond =  (int)$totalSecond +   (int)$value['time'];
                                                    if($value['correct'] == $value['answer']){
                                                        $correct++;
                                                        $attemptPercent = (int)$attemptPercent+   (int)$value['percent'];
                                                    }
                                            }?>
                                            <tr>
                                                <td style="border-top: 1px solid gray;border-bottom: 1px solid gray;border-left: 1px solid gray;border-right: none;"
                                                    colspan="2">Candidate Name : <?php echo (!empty($test_detail->name))?$test_detail->name:'...';?> </td>
                                                <td style="border-top: 1px solid gray;border-bottom: 1px solid gray;border-left: none;border-right: 1px solid gray;"
                                                    class="right-align">Test Date : <?php echo (!empty($test_detail->test_date))?date("M d, Y ", strtotime($test_detail->test_date)):'...';?></td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid gray;" colspan="3"> Course Name:
                                                    <?php echo (!empty($test_detail->course))?$test_detail->course:'...';?></td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid gray;" colspan="3"> <b> Overall Percentage : <?php echo (!empty($attemptPercent))?round(($attemptPercent/$totalPercent)*100,2):'0';?>%</b></td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid gray; "  colspan="3"  >Total Questions : <?php echo $total;?></td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid gray;" colspan="3">Attempt Questions : <?php echo $attempt;?></td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid gray;color:green" colspan="3">Correct Answers :
                                                <?php echo (!empty($correct))?$correct:'0';?></td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid gray;color:red" colspan="3">Wrong Answers :
                                                <?php if(!empty($attempt) || !empty($correct)){echo  $attempt -$correct; };?></td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid gray;" colspan="3">Total Time :
                                                    1:00:00 Hr</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid gray;" colspan="3">Spent Time: <?php echo  gmdate("H:i:s", $totalSecond); ?> Hr
                                                </td>
                                            </tr>
                                            <tr>
                                            <td style="border: 1px solid gray;height:53px;font-size: 17px;" colspan="3"><center><b style="height: 52px;">Subject wise strength in percentage</b></center>
                                                </td>
                                            </tr>
                                           
                                            <tr>
                                                <th style="border: 1px solid gray;">Sr No</th>
                                                <th style="border: 1px solid gray;" >Subject</th>
                                                <th style="border: 1px solid gray;">Strength</th>
                                            </tr>
                                            <?php  if(!empty($uniq_subject)){$count=0;
                                                    foreach($uniq_subject as $subkey=>$subval){ $count++;
                                                        $totalPercents=0;
                                                        $attemptPercents =0;
                                                        foreach($q_detail as $key=>$value){
                                                        $totalPercents =  (int)$totalPercents  +   (int)$value['percent'];
                                                        if($subval->subject === $value['subject']){
                                                            if($value['correct'] == $value['answer'] ){
                                                                $attemptPercents = (int)$attemptPercents+   (int)$value['percent'];
                                                                }
                                                            }    
                                                        }
                                                        
                                                ?>
                                            <tr style="border-bottom:none;">
                                                <td
                                                    style="border-top:none;border-bottom:none;border-right: 1px solid gray;border-left: 1px solid gray;">
                                                    <?php echo $count;?></td>
                                                <td 
                                                    style="border-top:none;border-bottom:none;border-right: 1px solid gray;border-left: 1px solid gray;">
                                                    <?php echo $subval->subject;?> </td>
                                                <td
                                                    style="border-top:none;border-bottom:none;border-right: 1px solid gray;border-left: 1px solid gray;"><?php echo round(($attemptPercents/$totalPercents)*100,2) ?>%
                                                </td>
                                            </tr>
                                                    <?php }}?>
                                          
                                            <tr>
                                                <td style="border: 1px solid gray;"></td>
                                                <td colspan="1" style="border: 1px solid gray;" class="right-align">
                                                    Total  </td>
                                                <td style="border: 1px solid gray;"> <?php echo (!empty($attemptPercent))?round(($attemptPercent/$totalPercent)*100,2):'0';?>%</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid gray;" colspan="3"> <b>ARJUNAA ACADEMY FOR ACHIEVERS </b> <small> - where personel attention is culture...</small></td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid gray;" colspan="3">
                                                <b>Address : </b> <span> 1230/50, 4TH Floor, <br> A H Arcade 9th Main Road,<br>

                                                    Vijayanagar, Bengaluru,Karnataka 560040 </span><br><br>
                                                    <b>Mob : </b> <span> 90193 33101, 91132 29088 </span>
                                                    <b>Email : </b> <span> support@aaa.com  </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid gray;" colspan="3"><small>Congratulations on your great achievement. Never run after success; gain worthiness, and success will run after you.</small></td>
                                            </tr>
                                            
                                            
                                           

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- table end -->




                    </div><!-- end right side content -->
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Trigger -->

    <!-- Modal Structure -->







    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/script.js"></script>
    <!-- data table -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/datatables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/dataTables.buttons.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/buttons.flash.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/buttons.html5.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/vfs_fonts.js"></script>
    <script src="<?php echo base_url();?>assets/js/online-result.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/easy-pie-chart/2.1.6/jquery.easypiechart.min.js'></script>
    <script>
    $(document).ready(function() {
        $('.modal').modal();
        $('#dynamic').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf'
            ],
        });
        $('select').formSelect();



    });
    </script>


</body>

</html>