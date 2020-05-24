
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
                            <p class="h5-para black-text  m0">Admission enquiry by - <?php echo (!empty($result->name))?$result->name:'---'  ?></p>
                            </div>
                            <div class="col 12 m6 right-align">
                                <a href="<?php echo base_url('apply/manage')  ?>"
                                    class="waves-effect waves-light btn green darken-4 white-text hoverable "><i
                                        class="fas fa-backward left"></i> Back</a>
                            </div>
                        </div>
                           <!-- end row1 -->


                            <div class="card scrollspy" id="personal-detail">
                            <div class="card-content">
                                <p class="bold mb10 h6">Details</p>
                                <table>
                                    <tbody><tr>
                                        <th class="w205">Name</th>
                                        <td><?php echo (!empty($result->name))?$result->name:'---'  ?></td>
                                    </tr>
                                    <tr>
                                        <th class="w205">Email</th>
                                        <td ><a href="mailto:<?php echo (!empty($result->email))?$result->email:'---'  ?>" ><?php echo (!empty($result->email))?$result->email:'---'  ?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="w205">Phone</th>
                                        <td ><a href="tel:<?php echo (!empty($result->phone))?$result->phone:'---'  ?>" ><?php echo (!empty($result->phone))?$result->phone:'---'  ?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="w205">Course</th>
                                        <td><?php echo (!empty($result->course))?$result->course:'---'  ?></td>
                                    </tr>
                                    <tr>
                                        <th class="w205">Location</th>
                                        <td><?php echo (!empty($result->location))?$result->location:'---'  ?></td>
                                    </tr>
                                    <tr>
                                        <th class="w205">Request for</th>
                                        <td><?php echo (!empty($result->optionname))?$result->optionname:'---'  ?></td>
                                    </tr>
                                    <tr>
                                        <th class="w205"> Branch</th>
                                        <td><?php echo (!empty($result->branch))?$result->branch:'---'  ?></td>
                                    </tr>

                                    <tr>
                                        <th class="w205"> Date</th>
                                        <td><?php echo (!empty($result->date))?$result->date:'---'  ?></td>
                                    </tr>

                                    <tr>
                                        <th class="w205"> Time</th>
                                        <td><?php echo (!empty($result->time))?$result->time:'---'  ?></td>
                                    </tr>
                                   
                                    <tr>
                                        <th class="w205">Address Details</th>
                                        <td><?php echo (!empty($result->message))?$result->message:'---'  ?></td>
                                    </tr>
                                    <tr>
                                        <th class="w205"> Apply date</th>
                                        <td><?php echo (!empty($result->created_on))?date("M d, Y ", strtotime($result->created_on)):'---'; ?></td>
                                    </tr>
                                </tbody></table>
                            </div>
                        </div>

                            

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
        <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/buttons.flash.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/pdfmake.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/vfs_fonts.js"></script>
        <script>
            $(document).ready( function () {
                $('.modal').modal();
                $('#dynamic').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf'
                    ], 
                });
                $('select').formSelect();


                
            } );
        </script>


    </body>
</html>

