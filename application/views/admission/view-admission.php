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
                               
                            </div>
                            <div class="col 12 m6 right-align">
                                <a href="<?php echo base_url('admission/manage')  ?>"
                                    class="waves-effect waves-light btn green darken-4 white-text hoverable "><i
                                        class="fas fa-backward left"></i> Back</a>
                            </div>
                        </div>

                        <div class="card scrollspy" id="personal-detail">

                            <div class="card-content">
                            <p class="bold mb10 h6">Admission Details</p>
                                <div class="divider"></div>
                                <table>
                                    <tbody>
                                        <tr>
                                            <th class="w205"><i class="far fa-user mr10"></i>Name</th>
                                            <td><?php echo (!empty($result->name))?$result->name:'---'  ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <th class="w205"><i class="fas fa-school mr10"></i>School</th>
                                            <td><?php echo (!empty($result->school))?$result->school:'NA'  ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="w205"><i class="fas fa-chalkboard mr10"></i>Class</th>
                                            <td><?php echo (!empty($result->class))?$result->class:'NA'  ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="w205"><i class="fas fa-poll-h mr10"></i>Previous year %age</th>
                                            <td><?php echo (!empty($result->prev_percent))?$result->prev_percent:'NA'  ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="w205"><i class="far fa-user mr10"></i>Father's Name</th>
                                            <td><?php echo (!empty($result->father))?$result->father:'---'  ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="w205"><i class="far fa-user mr10"></i>Father's Occupation</th>
                                            <td><?php echo (!empty($result->father_occupation))?$result->father_occupation:'---'  ?>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <th class="w205"><i class="fas fa-phone mr10"></i> Father's Mobile</th>
                                            <td><a
                                                    href="tel:<?php echo (!empty($result->father_mobile))?$result->father_mobile:'---'  ?>"><?php echo (!empty($result->father_mobile))?$result->father_mobile:'---'  ?></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="w205"><i class="far fa-user mr10"></i>Mother's Name</th>
                                            <td><?php echo (!empty($result->mother))?$result->mother:'---'  ?></td>
                                        </tr>
                                        <tr>
                                            <th class="w205"><i class="far fa-user mr10"></i>Mother's Occupation</th>
                                            <td><?php echo (!empty($result->mother_occupation))?$result->mother_occupation:'---'  ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="w205"><i class="fas fa-phone mr10"></i> Mother's Mobile</th>
                                            <td>
                                                <a
                                                    href="tel:<?php echo (!empty($result->mother_mobile))?$result->mother_mobile:'---'  ?>"><?php echo (!empty($result->mother_mobile))?$result->mother_mobile:'---'  ?></a>
                                        </tr>


                                        <tr>
                                            <th class="w205"><i class="fas fa-map-marker-alt mr10"></i>Center</th>
                                            <td><?php echo (!empty($result->center))?$result->center:'---'  ?></td>
                                        </tr>
                                        <tr>
                                            <th class="w205"><i class="fa fa-map-marker mr10"></i>Address</th>
                                            <td><?php echo (!empty($result->address))?$result->address:'---'  ?></td>
                                        </tr>

                                        <tr>
                                            <th class="w205"><i class="fa fa-id-badge mr10"></i>Aadhar</th>
                                            <td><?php echo (!empty($result->adhar))?$result->adhar:'---'  ?></td>
                                        </tr>

                                        <tr>
                                            <th class="w205"><i class="fa fa-chalkboard mr10"></i>Batch</th>
                                            <td><?php echo (!empty($result->batch))?$result->batch:'---'  ?></td>
                                        </tr>

                                        <tr>
                                            <th class="w205"><i class="fa fa-user-friends mr10"></i>Siblings</th>
                                            <td><?php echo (!empty($result->siblings))?$result->siblings:'NA'  ?></td>
                                        </tr>

                                        <tr>
                                            <th class="w205"><i class="fa fa-school mr10"></i>Sibling school</th>
                                            <td><?php echo (!empty($result->sibling_school))?$result->sibling_school:'NA'  ?></td>
                                        </tr>

                                        <tr>
                                            <th class="w205"><i class="fa fa-user-tie mr10"></i>Working status</th>
                                            <td><?php echo (!empty($result->working_status))?$result->working_status:'NA'  ?></td>
                                        </tr>

                                        <tr>
                                            <th class="w205"><i class="fa fa-user-graduate mr10"></i>Studdying grade</th>
                                            <td><?php echo (!empty($result->studdying_grade))?$result->studdying_grade:'NA'  ?></td>
                                        </tr>

                                       

                                        <tr>
                                            <th class="w205"><i class="fa fa-school mr10"></i>Admission type</th>
                                            <td><?php  if($result->admission_type =='ssc'){  echo 'Class 8, 9 & 10';    }else{   echo 'Class 11 or 1st PUC';   } ?></td>
                                        </tr>

                                        <tr>
                                            <th class="w205"><i class="fa fa-rupee-sign mr10"></i>Admission amount</th>
                                            <td><?php echo (!empty($result->amount))?$result->amount:'NA'  ?></td>
                                        </tr>

                                        <tr>
                                            <th class="w205"><i class="fa fa-map-marker mr10"></i>Payment Id</th>
                                            <td><?php echo (!empty($result->pay_id))?$result->pay_id:'NA'  ?></td>
                                        </tr>

                                        <tr>
                                            <th class="w205"><i class="fa fa-credit-card mr10"></i>Payment status</th>
                                            <td><?php if(!empty($result->pay_id) && !empty($result->amount) ){ ?>
                                             <span class='green-text darken-1'>Paid</span>
                                             
                                             <?php }else{ ?>
                                             <span class='red-text'>Pending</span>
                                             <?php }  ?></td>
                                        </tr>

                                        <tr>
                                            <th class="w205"><i class="fas fa-calendar-alt mr10"></i> Admission date</th>
                                            <td><?php echo (!empty($result->created_on))?date("M d, Y ", strtotime($result->created_on)):'---'; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="w205"><i class="fas fa-portrait mr10"></i>Marksheet</th>
                                            <td> <a href="<?php echo (!empty($result->prep_percent))?$this->config->item('web_url').$result->prep_percent:'---'  ?>"
                                                    target="_blank"><i class="fas fa-file-pdf "></i>
                                                    &nbsp;&nbsp;Download</a></td>
                                        </tr>

                                        

                                    </tbody>
                                </table>
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
    <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/dataTables.buttons.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/buttons.flash.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/buttons.html5.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/vfs_fonts.js"></script>
    <script>
    $(document).ready(function() {
       

    });
    </script>
    <script>
    <?php $this->load-> view('include/message.php'); ?>
    </script>

</body>

</html>