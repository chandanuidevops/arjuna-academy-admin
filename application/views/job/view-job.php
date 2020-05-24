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
    <style>
    /* .job h6,.job p{
          display:inline-block;
      }
      .job h6{
          min-width:25%;
      } */
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
                                <p class="h5-para black-text  m0">Job Title-
                                    <?php echo (!empty($result['job_title']))?$result['job_title']:'---'  ?></p>
                            </div>
                            <div class="col 12 m6 right-align">
                                <a href="<?php echo base_url('job/manage')  ?>"
                                    class="waves-effect waves-light btn green darken-4 white-text hoverable "><i
                                        class="fas fa-backward left"></i> Back</a>
                            </div>
                        </div>
                        <!-- end row1 -->


                        <div class="card scrollspy" id="personal-detail">
                            <div class="card-content">
                                <p class="bold mb10 h6">Details</p>
                                <div class="row ">
                                    <div class="col m3">
                                        <h6><b>Job Type</b></h6>
                                    </div>
                                    <div class="col m9">
                                        <p><?php echo (!empty($result['job_type']))?$result['job_type']:'---'  ?></p>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col m3">
                                        <h6><b>Qualification</b></h6>
                                    </div>
                                    <div class="col m9">
                                        <p><?php echo (!empty($result['qualification']))?$result['qualification']:'---'  ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col m3">
                                        <h6><b>Description</b></h6>
                                    </div>
                                    <div class="col m9">
                                        <p><?php echo (!empty($result['job_description']))?$result['job_description']:'---'  ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row ">

                                    <div class="col m3">
                                        <h6><b>Skill</b></h6>
                                    </div>
                                    <div class="col m9">
                                        <p><?php echo (!empty($result['job_skill']))?$result['job_skill']:'---'  ?></p>
                                    </div>
                                </div>
                                <div class="row ">

                                    <div class="col m3">
                                        <h6><b>Responsibility</b></h6>

                                    </div>
                                    <div class="col m9">
                                        <p><?php echo (!empty($result['job_responsibility']))?$result['job_responsibility']:'---'  ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col m3">
                                        <h6><b>Requirement</b></h6>

                                    </div>
                                    <div class="col m9">
                                        <p><?php echo (!empty($result['job_requirement']))?$result['job_requirement']:'---'  ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col m3">
                                        <h6><b>Added On:</b></h6>

                                    </div>
                                    <div class="col m9">
                                        <p><?php echo (!empty($result['created_on']))?$result['created_on']:'---'  ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
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



    });
    </script>


</body>

</html>