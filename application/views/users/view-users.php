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
                        <?php $this->load->view('include/pre-loader'); ?>

                        <div class="row">
                            <div class="col 12 m6">
                                <p class="h5-para black-text  m0">User Details -
                                    <?php echo (!empty($result->name))?$result->name:'---'  ?></p>
                            </div>
                            <div class="col 12 m6 right-align">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">

                                <div class="card">
                                    <div class="card-content">
                                        <div class="row m0">
                                            <div class="col s12 m5 border-right">

                                                <img src="<?php echo !empty($result->school_id)?$this->config->item('web_url').$result->school_id :'https://via.placeholder.com/150'  ?>"
                                                    alt="" class="circle responsive-img left mr10" width="120px" />

                                                <div class="ptb10">
                                                    <h6 class="bold">
                                                        <?php echo (!empty($result->name))?$result->name:'---'  ?></h6>
                                                    <h6><small><a
                                                                href="mailto:<?php echo (!empty($result->email))?$result->email:'---'  ?>"><?php echo (!empty($result->email))?$result->email:'---'  ?></a></small>
                                                    </h6>
                                                    <h6><small><a
                                                                href="tel:<?php echo (!empty($result->father_mobile))?$result->father_mobile:'---'  ?>"><?php echo (!empty($result->father_mobile))?$result->father_mobile:'---'  ?></a></small>
                                                    </h6>
                                                </div>
                                            </div>

                                            <div class="col s12 m7">
                                                <div class="row m0">
                                                    <div class="col s12 center m3">

                                                    </div>


                                                    <div class="col s12  m9 mt40">
                                                        <a href="<?php echo base_url('users/manage')  ?>"
                                                            class="waves-effect waves-light btn green darken-4 white-text hoverable "><i
                                                                class="fas fa-backward left"></i> Back</a>
                                                        <?php if($result->status!='2'){ ?>

                                                        <a id="unblock" href="<?php echo base_url('users/block/'.$result->id.'') ?>"
                                                            class="waves-effect waves-light btn red darken-2 white-text hoverable "><i
                                                                class="fas fa-lock left"></i> Block</a>
                                                        <?php }else{ ?>
                                                        <a id="block" href="<?php echo base_url('users/unblock/'.$result->id.'') ?>"
                                                            class="waves-effect waves-light btn green darken-4 white-text hoverable "><i
                                                                class="fas fa-lock-open left"></i> Unblock</a>
                                                        <?php } ?>
                                                        <a style="display: none" id="unblock" href="<?php echo base_url('users/block/'.$result->id.'') ?>"
                                                            class="waves-effect waves-light btn red darken-2 white-text hoverable "><i
                                                                class="fas fa-lock left"></i> Block</a>
                                                                <a style="display: none" id="block" href="<?php echo base_url('users/unblock/'.$result->id.'') ?>"
                                                            class="waves-effect waves-light btn green darken-4 white-text hoverable "><i
                                                                class="fas fa-lock-open left"></i> Unblock</a>
                                                        <input type="hidden" name="userid" id="userid" value="<?php echo $result->id ?>"> 

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row m0 boder-bottom">

                        </div>


                        <div class="card scrollspy" id="personal-detail">




                            <div class="card-content">
                            <p class="bold mb10 h6">Personal Details</p>
                                <div class="divider"></div>
                                <table>
                                    <tbody>
                                        <tr>
                                            <th class="w205"><i class="far fa-user mr10"></i>Name</th>
                                            <td><?php echo (!empty($result->name))?$result->name:'---'  ?></td>
                                        </tr>
                                        <tr>
                                            <th class="w205"><i class="fas fa-envelope mr10"></i>Email</th>
                                            <td><a
                                                    href="mailto:<?php echo (!empty($result->email))?$result->email:'---'  ?>"><?php echo (!empty($result->email))?$result->email:'---'  ?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="w205"><i class="fas fa-school mr10"></i>School</th>
                                            <td><?php echo (!empty($result->school))?$result->school:'---'  ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="w205"><i class="far fa-user mr10"></i>Father's Name</th>
                                            <td><?php echo (!empty($result->father))?$result->father:'---'  ?>
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
                                            <th class="w205"><i class="fas fa-phone mr10"></i> Mother's Mobile</th>
                                            <td>
                                                <a
                                                    href="tel:<?php echo (!empty($result->mother_mobile))?$result->mother_mobile:'---'  ?>"><?php echo (!empty($result->mother_mobile))?$result->mother_mobile:'---'  ?></a>


                                        </tr>


                                        <tr>
                                            <th class="w205"><i class="fas fa-book-reader mr10"></i>Course</th>
                                            <td><?php echo (!empty($result->course))?$result->course:'---'  ?></td>
                                        </tr>
                                        <tr>
                                            <th class="w205"><i class="fa fa-map-marker mr10"></i>Address</th>
                                            <td><?php echo (!empty($result->address))?$result->address:'---'  ?></td>
                                        </tr>


                                        <tr>
                                            <th class="w205"><i class="fas fa-calendar-alt mr10"></i> Registered date</th>
                                            <td><?php echo (!empty($result->created_on))?date("M d, Y ", strtotime($result->created_on)):'---'; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="w205"><i class="fas fa-portrait mr10"></i>School id</th>
                                            <td> <a href="<?php echo (!empty($result->school_id))?$this->config->item('web_url').$result->school_id:'---'  ?>"
                                                    target="_blank"><i class="fas fa-file-pdf "></i>
                                                    &nbsp;&nbsp;Download</a></td>
                                        </tr>

                                        <tr>
                                            <th class="w205"><i class="fas fa-unlock mr10"></i>Status:</th>
                                            <td> <?php if($result->status !='2'){ ?>
                                                Active

                                                <?php }else{ ?>
                                                Blocked
                                                <?php } ?></td>
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
        $('.modal').modal();
        $('#dynamic').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf'
            ],
        });
        $('select').formSelect();

            //block user
            $("#block").on('click', function(event) {
                    event.preventDefault();
                    var id = $( "input[name='userid']" ).val();
                    loder(true);
                    $.ajax({
                        url: "<?php echo base_url();?>users/block",
                        type: "POST",
                        dataType: "json",
                        data: {'id' : id,'status' : '1'},
                        success: function(data) {
                            console.log(data);
                            $('#unblock').css('display', 'inline-block');
                            $('#block').css('display', 'none');
                           loder(false);
                        }
                    });
                });

                $("#unblock").on('click', function(event) {
                    event.preventDefault();
                    var id = $( "input[name='userid']" ).val();
                    loder(true);
                    $.ajax({
                        url: "<?php echo base_url();?>users/block",
                        type: "POST",
                        dataType: "json",
                        data: {'id' : id,'status' : '2'},
                        success: function(data) {
                            console.log(data);
                            $('#unblock').css('display', 'none');
                            $('#block').css('display', 'inline-block');
                           loder(false);
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
    <?php $this->load-> view('include/message.php'); ?>
    </script>

</body>

</html>