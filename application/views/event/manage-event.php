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
                  <?php $this->load->view('include/pre-loader.php'); ?>
                    <div class="row">
                                <div class="col 12 m6">
                                    <p class="h5-para black-text m0">Event  List</p>
                                </div>
                                <div class="col 12 m6 right-align">
                                    <a href="<?php echo base_url('event/add-event')  ?>" class="waves-effect waves-light btn green darken-4 white-text hoverable "><i class="fas fa-plus left"></i> ADD Event </a>
                                </div>
                            </div>

                     
                     <!-- end dash -->
                     

                     <!-- chart-table -->
                     <!-- shorting -->
                     <div class="shorting-table">
                        <div>
                           <div class="col l12 m12 s12">
                              <div class="">
                                 <p class="h5-para-p2">Manage Event </p>
                                <table id="dynamic" class="striped">
                                    <thead>
                                       <tr class="tt">
                                          <th id="a" class="h5-para-p2" width="130px">Sl No.</th>
                                          <th id="c" class="h5-para-p2" width="120px">Title</th>
                                          <th id="c" class="h5-para-p2" width="120px">Description</th>
                                          <th id="c" class="h5-para-p2" width="120px">Date</th>
                                          <th id="c" class="h5-para-p2" width="120px">Image</th>
                                          <th id="g" class="h5-para-p2" width="62px">Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>

                                    <?php if (!empty($result)) { $count = 0; foreach ($result as $key => $value) { $count = $count+1; ?>
                                      <tr>
                                      <td ><?php echo (!empty($result))?$count:'---'  ?></td>
                                            <td ><?php echo (!empty($value->title))?$value->title:'---'  ?></td>
                                            <td class="eclipse" ><?php echo (!empty($value->description))?$value->description:'---'  ?></td>
                                            <td ><?php echo (!empty($value->date))?$value->date:'---'  ?></td>
                                            <td ><img class="table-image" src="<?php echo $this->config->item('web_url').$value->event_thumb; ?>" alt="image"></td>                                    
                                            <td class="action-btn  center-align">
                                              
                                              <!-- delete user -->
                                                <a  href="<?php echo base_url('event/edit-event/'.$value->id.'') ?> " class="blue hoverable delete-btn"><i class="fas fa-edit  "></i></a>
                                               
                                                <a  href="<?php echo base_url('event/delete/'.$value->id.'') ?> " class="red hoverable delete-btn delete"><i class="fas fa-trash  "></i></a>
                                                <!-- delete user -->
                                            </td>
                                          
                                        </tr>
                                      
                                    <?php } } ?>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
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
  <?php $this->load->view('include/message.php'); ?>
    
  </script>

      <script>
          $(document).ready( function () {
              $('table').DataTable({
                 
                  dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf'
                  ], 
              });
              $('select').formSelect();
          } );
      </script>
            <script>
        
        $(".delete").on('click', function(event) {

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
                               html: 'Event deleted successfully',
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


                  //page loader
                    function loder(status) {
                          if (status == true) {
                             $('.preloader-verfy').css('display', 'block');
                          } else {
                             $('.preloader-verfy').css('display', 'none');
                          }
                    }
     </script>
</body>
</html>
