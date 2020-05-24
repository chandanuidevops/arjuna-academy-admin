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
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/croppie.css">
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,700|Montserrat:300,400,500,600,700|Source+Code+Pro&display=swap"
        rel="stylesheet">

    <!-- bar -->
    <style>



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
                                <p class="h5-para black-text m0">Add Amount</p>
                            </div>
                            <div class="col 12 m6 right-align">
                                <a href="<?php echo base_url('admission/manage')  ?>"
                                    class="waves-effect waves-light btn green darken-4 white-text hoverable "><i
                                        class="fas fa-backward left"></i> Back</a>
                            </div>
                        </div>




                        <div class="card">
                            <div class="card-content">
                                <div class="form-container">
                                    <form action="" method="post" style="overflow-y: auto;overflow-x: hidden;"
                                        id="amount-form">


                                        <div class="row m0">
                                            <div class="input-field col s12 l6">
                                                <input type="number" id="ssc_amount" name="ssc_amount" class="validate"
                                                    required>
                                                <label for="ssc_amount">Class 8,9 & 10 Amount<span class="red-text">*</span></label>
                                            </div>
                                            <div class="input-field col s12 l6">
                                                <input type="number" id="puc_amount" name="puc_amount" class="validate"
                                                    required>
                                                <label for="puc_amount">Class 11 or 1st PUC Amount<span class="red-text">*</span></label>
                                            </div>
                                        </div>
                                        <div class="col s12">
                                            <?php echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : ''    ?>
                                        </div>

                                       
                                        <div class="col s12 mtb20">
                                            <button
                                                class="btn waves-effect waves-light green darken-4 hoverable btn-large upload-result"
                                                type="submit" >Submit
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

                                <p class="h5-para-p2">Manage Amount </p>
                                <table id="dynamic" class="striped">
                                    <thead>
                                        <tr class="tt">
                                            <th id="a" class="h5-para-p2" width="130px">Sl No.</th>
                                            <th id="a" class="h5-para-p2" width="130px">Class 8,9 & 10 Amount</th>
                                            <th id="a" class="h5-para-p2" width="130px">Class 11 or 1st PUC Amount</th>

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

    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
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
       
        $('table').DataTable({

            dom: 'Bfrtip',
            buttons: [

            ],
        });
        $('select').formSelect();
        $("#amount-form").validate();

    });
    </script>
    <script>
    $(document).ready(function() {
        $('#delete').click(function() {
            
        });
        loadData();
        $('#amount-form').submit(function(e) {
            

            e.preventDefault();
            var ssc_amount = $('#ssc_amount').val();
            var puc_amount = $('#puc_amount').val();
           
            if (ssc_amount != '' && puc_amount != '') {
                loder(true);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url().'admission/add_amount';?>",
                    data: {
                        ssc_amount: ssc_amount,
                        puc_amount: puc_amount
                    },
                    dataType: "json",
                    success: function(response) {
                        loder(false);
                        if (response == true) {
                            $('#ssc_amount').val('');
                            $('#puc_amount').val('');
                            loder(false);
                            loadData();
                            M.toast({
                                html: 'Amount added succesfully',
                                classes: 'green',
                                displayLength: 5000
                            });
                        } else {
                            M.toast({
                                html: 'Allredy exist amount',
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

        function loadData() {
            $.ajax({
                url: "<?php echo base_url().'admission/display_amount';?>",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    $('#displayData').html(data);
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
            html: 'Amount  deleted succesfully',
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