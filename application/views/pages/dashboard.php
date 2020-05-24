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
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
      
      <style type="text/css">
         .dash-list a .list-dashboard{transition: 0.5s}
         .dash-list a:hover .list-dashboard{transform: scale(1.1);background: #f3f3f3 !important}
         .col-mb-h{
            min-height: 106px;
margin-bottom: 10px;
         }
      
      </style>
   </head>
   <body>
      <!-- headder -->
         <div id="header-include">
           <?php $this->load->view('include/header.php'); ?>
         </div>
      <!-- end headder -->
      <!-- main layout -->
      <section class="sec-top">
         <div class="container-wrap">
            <div class="row">
              <!-- menu  -->

              <div id="sidemenu-include">
                <?php $this->load->view('include/menu.php'); ?>
              </div>


               <div class="col m12 s12 l9">
                  <div class="main-bar">
                     <p class="h5-para black-text  mtb-20">Dashboard</p>
                     <div class="dash-list">

                        <div class="row ">
                            <div class="col l3 m6 s12">
                              <a href="<?php echo base_url('job/manage') ?>" class="">
                                 <div class="list-dashboard white z-depth-0 col-mb-h">
                                    <div class="row m0">
                                       <div class="col l3 m3 s3">
                                          <div class="round light-green accent-4"><i class="fas fa-th-list   white-text"></i></div>
                                       </div>
                                       <div class="col l9 m9 s9">
                                          <p class="h5-para1 black-text m0"><?php echo (!empty($jcount))?$jcount:'0'; ?> <i class="fas fa-chevron-circle-up green-text down-aro"></i></p>
                                          <p class="para-p1 grey-text m0">Total Job</p>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <div class="col l3 m6 s12">
                              <a href="<?php echo base_url('job-application/manage') ?>" >
                                 <div class="list-dashboard white z-depth-0 col-mb-h">
                                    <div class="row m0">
                                       <div class="col l3 m3 s3">
                                          <div class="round amber accent-4"><i class="fas fa-handshake  white-text"></i></div>
                                       </div>
                                       <div class="col l9 m9 s9">
                                          <p class="h5-para1 black-text m0"><?php echo (!empty($jobappl_count))?$jobappl_count:'0'; ?>  <i class="fas fa-chevron-circle-up green-text down-aro"></i></p>
                                          <p class="para-p1 grey-text m0">Job Application</p>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <div class="col l3 m6 s12">
                              <a href="<?php echo base_url('apply/manage') ?>">
                                 <div class="list-dashboard white z-depth-0 col-mb-h">
                                    <div class="row m0">
                                       <div class="col l3 m3 s3">
                                          <div class="round deep-purple lighten-1"><i class="fas fa-users  white-text"></i></div>
                                       </div>
                                       <div class="col l9 m9 s9">
                                          <p class="h5-para1 black-text m0"><?php echo (!empty($courseappl_count))?$courseappl_count:'0'; ?>  <i class="fas fa-chevron-circle-up green-text down-aro"></i></p>
                                          <p class="para-p1 grey-text m0">Course Application</p>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </div>
                          
                           <div class="col l3 m6 s12">
                              <a href="<?php echo base_url('enquiry/manage') ?>">
                                 <div class="list-dashboard white z-depth-0 col-mb-h">
                                    <div class="row m0">
                                       <div class="col l3 m3 s3">
                                          <div class="round blue"><i class="far white-text fa-envelope"></i></div>
                                       </div>
                                       <div class="col l9 m9 s9">
                                          <p class="h5-para1 black-text m0"><?php echo (!empty($ecount))?$ecount:'0'; ?> <i class="fas fa-chevron-circle-up green-text down-aro"></i></p>
                                          <p class="para-p1 grey-text m0">Enquiries</p>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </div>

                           <div class="col l3 m6 s12">
                              <a href="<?php echo base_url('users/manage') ?>">
                                 <div class="list-dashboard white z-depth-0 col-mb-h">
                                    <div class="row m0">
                                       <div class="col l3 m3 s3">
                                          <div class="round pink"><i class="fas white-text fa-user-friends"></i></div>
                                       </div>
                                       <div class="col l9 m9 s9">
                                          <p class="h5-para1 black-text m0"><?php echo (!empty($register_count))?$register_count:'0'; ?> <i class="fas fa-chevron-circle-up green-text down-aro"></i></p>
                                          <p class="para-p1 grey-text m0">Registered Student</p>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </div>

                           <div class="col l3 m6 s12">
                              <a href="<?php echo base_url('test-result/manage') ?>">
                                 <div class="list-dashboard white z-depth-0 col-mb-h">
                                    <div class="row m0">
                                       <div class="col l3 m3 s3">
                                          <div class="round black"><i class="fas white-text fa-chart-line"></i></div>
                                       </div>
                                       <div class="col l9 m9 s9">
                                          <p class="h5-para1 black-text m0"><?php echo (!empty($test_count))?$test_count:'0'; ?> <i class="fas fa-chevron-circle-up green-text down-aro"></i></p>
                                          <p class="para-p1 grey-text m0">Total test taken</p>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </div>

                           <div class="col l3 m6 s12">
                              <a href="<?php echo base_url('test-purchase/manage') ?>">
                                 <div class="list-dashboard white z-depth-0 col-mb-h">
                                    <div class="row m0">
                                       <div class="col l3 m3 s3">
                                          <div class="round brown"><i class="fas white-text fa-rupee-sign"></i></div>
                                       </div>
                                       <div class="col l9 m9 s9">
                                          <p class="h5-para1 black-text m0"><?php echo (!empty($testPayment))?$testPayment:'0'; ?> <i class="fas fa-chevron-circle-up green-text down-aro"></i></p>
                                          <p class="para-p1 grey-text m0">Total Test Amount Received</p>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </div>

                         

                           <div class="col l3 m6 s12">
                              <a href="<?php echo base_url('course/manage') ?>">
                                 <div class="list-dashboard white z-depth-0 col-mb-h">
                                    <div class="row m0">
                                       <div class="col l3 m3 s3">
                                          <div class="round red"><i class="fas white-text fa-book-open"></i></div>
                                       </div>
                                       <div class="col l9 m9 s9">
                                          <p class="h5-para1 black-text m0"><?php echo (!empty($course_count))?$course_count:'0'; ?> <i class="fas fa-chevron-circle-up green-text down-aro"></i></p>
                                          <p class="para-p1 grey-text m0">Total Courses</p>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </div>

                           <div class="col l3 m6 s12">
                              <a href="<?php echo base_url('enquiry/manage') ?>">
                                 <div class="list-dashboard white z-depth-0 col-mb-h">
                                    <div class="row m0">
                                       <div class="col l3 m3 s3">
                                          <div class="round red darken-3"><i class="fas white-text fa-users"></i></div>
                                       </div>
                                       <div class="col l9 m9 s9">
                                          <p class="h5-para1 black-text m0"><?php echo (!empty($ecount))?$ecount:'0'; ?> <i class="fas fa-chevron-circle-up green-text down-aro"></i></p>
                                          <p class="para-p1 grey-text m0">Enrolled Students</p>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </div>

                           <div class="col l3 m6 s12">
                              <a href="<?php echo base_url('enrolled/manage') ?>">
                                 <div class="list-dashboard white z-depth-0 col-mb-h">
                                    <div class="row m0">
                                       <div class="col l3 m3 s3">
                                          <div class="round brown"><i class="fas white-text fa-rupee-sign"></i></div>
                                       </div>
                                       <div class="col l9 m9 s9">
                                          <p class="h5-para1 black-text m0"><?php echo (!empty($coursePayment))?$coursePayment:'0'; ?> <i class="fas fa-chevron-circle-up green-text down-aro"></i></p>
                                          <p class="para-p1 grey-text m0">Total Course Payment</p>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </div>

                           <div class="col l3 m6 s12">
                              <a href="<?php echo base_url('test/view-schedule') ?>">
                                 <div class="list-dashboard white z-depth-0 col-mb-h">
                                    <div class="row m0">
                                       <div class="col l3 m3 s3">
                                          <div class="round yellow"><i class="fas white-text fa-handshake"></i></div>
                                       </div>
                                       <div class="col l9 m9 s9">
                                          <p class="h5-para1 black-text m0"><?php echo (!empty($interview_schedule))?$interview_schedule:'0'; ?> <i class="fas fa-chevron-circle-up green-text down-aro"></i></p>
                                          <p class="para-p1 grey-text m0">Total Interview Scheduled</p>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </div>



                        </div>


                     </div>
                     <!-- end dash -->
                     <!-- <div class="char-dashboard">
                        <div class="row">
                           <div class="col l8 m12 s12">
                              <div class="chart-border"> -->
                                 <!-- <div class="row">
                                    <div class="col l12 m12 s12">
                                       <div class="m0 border-button">
                                            <a class="btn-flat waves-effect waves-light  btn-small">Day</a>
                                            <a class="btn-flat waves-effect waves-light btn-small">Month</a>
                                            <a class="btn-flat waves-effect waves-light active btn-small">Year</a>
                                       </div>
                                    </div>
                                 </div> -->
                                 <!-- <canvas id="myChart" width="100%" height="60"></canvas> -->
                              </div>
                           </div>
                           
                              

                     <!-- shorting -->
                     <!-- <div class="shorting-table">
                        <div class="row">
                           <div class="col l12 m12 s12">
                              <div class="">
                                 <p class="h5-para-p2">User Enquiries</p>
                                <table id="dynamic" class="striped">
                                    <thead>
                                       <tr class="tt">
                                          <th id="a" class="h5-para-p2" width="130px">Sl No.</th>
                                          <th id="a" class="h5-para-p2" width="130px">Job Title</th>
                                          <th id="b" class="h5-para-p2" width="100px">Job Type</th>
                                          <th id="c" class="h5-para-p2" width="120px">Qualification</th>
                                          <th id="c" class="h5-para-p2" width="120px">Experience</th>
                                          <th id="c" class="h5-para-p2" width="120px">Date</th>
                                          <th id="g" class="h5-para-p2" width="62px">Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>

                                    <?php

                                    if (!empty($result)) {
                                      $count= 0;
                                      foreach ($result as $key => $value) { $count += 1;
                                      ?>
                                       <tr>
                                            <td ><a href="<?php echo base_url('job/view/'.$value->id.'') ?>"><?php echo (!empty($result))?$count:'---'  ?></a></td>
                                            <td ><a href="<?php echo base_url('job/view/'.$value->id.'') ?>"><?php echo (!empty($value->job_title))?$value->job_title:'---'  ?></a></td>
                                            <td ><a href="<?php echo base_url('job/view/'.$value->id.'') ?>"><?php echo (!empty($value->job_type))?$value->job_type:'---'  ?></a></td>
                                            <td ><a href="<?php echo base_url('job/view/'.$value->id.'') ?>"><?php echo (!empty($value->qualification))?$value->qualification:'---'  ?></a></td>
                                            <td ><a href="<?php echo base_url('job/view/'.$value->id.'') ?>"><?php echo (!empty($value->experience))?$value->experience:'---'  ?></a></td>
                                            <td><a href="<?php echo base_url('job/view/'.$value->id.'') ?>"><?php echo (!empty($value->created_on))?date("M d, Y ", strtotime($value->created_on)):'---'; ?></a></td>
                                            <td class="action-btn  center-align">
                                              
                                                <a href="<?php echo base_url('job/view/'.$value->id.'') ?>"  class="blue hoverable"><i class="fas fa-eye "></i></i></a>
                                             
                                            </td>
                                          
                                        </tr>
                                      
                                    <?php } } ?>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div> -->
                  </div>
               </div>
            </div>
         </div>
      </section>

      <!-- end footer -->
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/chart.min.js"></script>
      <!-- data table -->
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/datatables.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/dataTables.buttons.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/buttons.flash.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/buttons.html5.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/pdfmake.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/vfs_fonts.js"></script>

      <script>
          $(document).ready( function () {
              $('table').DataTable({
                  dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf'
                  ], 
              });
              $('select').formSelect();
              
            $('#header-include').load('include/header.html');
            $('#sidemenu-include').load('include/menu.html');

          } );
      </script>
      <!-- <script>
         var ctx = document.getElementById("myChart").getContext('2d');
            $(document).ready(function(){
                var lab = [];
                var con = [];
                var canCon = [];
                $.ajax({
                    url: '<?php echo base_url("Dashboard/newemployeeYear") ?>',
                    method: 'GET',
                    async: true,
                    dataType: 'json',
                    success: function (d) {
                        for (let i = 0; i < d.length; i++) {
                            lab.push(d[i].month);
                            con.push(d[i].valeus);
                            canCon.push(d[i].canval);
                        }
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: lab,
                                datasets: [{
                                    label: 'New  Employer',
                                    data: con,
                                    backgroundColor: "rgba(0,128,0,0.1)",
                                    borderColor: "rgba(0, 128, 0, 1)",
                                    lineTension: 0.3,
                                    borderWidth: 2,
                                }, {
                                    label: 'New  Candidate',
                                    data: canCon,
                                    backgroundColor: "rgba(126,87,194,0.1)",
                                    borderColor: "rgba(126,87,194,1)",
                                    lineTension: 0.3,
                                    borderWidth: 2,
                                }]
                            },
                            options: {
                                legend: {
                                    display: true,
                                    labels: {
                                        fontColor: 'rgb(158,158,158)',
                                        fontSize: 12,
                                        usePointStyle: true
                                    }
                                },
                                title: {
                                    display: true,
                                    text: 'New Registration',
                                    position: 'top'
                                }
                            }
                        });
                    }
                });
            });
    </script> -->
</body>
</html>
