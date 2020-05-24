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
                                    <p class="h5-para black-text m0">Banner  List</p>
                                </div>
                                <div class="col 12 m6 right-align">
                                    <a href="<?php echo base_url('banner/add-banner')  ?>" class="waves-effect waves-light btn green darken-4 white-text hoverable "><i class="fas fa-plus left"></i> ADD Banner </a>
                                </div>
                            </div>

                     
                     <!-- end dash -->
                     

                     <!-- chart-table -->
                     <!-- shorting -->
                     <div class="shorting-table">
                        <div>
                           <div class="col l12 m12 s12">
                              <div class="">
                                 <p class="h5-para-p2">Manage banner </p>
                                <table id="dynamic" class="striped">
                                    <thead>
                                       <tr class="tt">
                                          <th id="a" class="h5-para-p2" width="130px">Sl No.</th>
                                         
                                          <th id="c" class="h5-para-p2" width="120px">Image</th>
                                          <th id="g" class="h5-para-p2" width="62px">Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>

                                    <?php if (!empty($result)) { $count = 0; foreach ($result as $key => $value) { $count = $count+1; ?>
                                      <tr>
                                      <td ><?php echo (!empty($result))?$count:'---'  ?></td>
                                          
                                            <td ><img class="table-image" src="<?php echo $this->config->item('web_url').$value->banner_img; ?>" alt="image"></td>                                    
                                            <td class="action-btn  center-align">
                                              
                                              <!-- delete user -->
                                              <?php if(!empty($value->video)) {?>
                                              <a  href="#modal<?php echo $value->id ?>" class="blue hoverable delete-btn modal-trigger" ><i class="fas fa-video"></i></a>
                                              <?php }?>
                                                <a  href="<?php echo base_url('banner/edit-banner/'.$value->id.'') ?> " class="blue hoverable delete-btn"><i class="fas fa-edit  "></i></a>
                                               
                                                <a  href="<?php echo base_url('banner/delete/'.$value->id.'') ?> " class="red hoverable delete-btn delete"><i class="fas fa-trash  "></i></a>
                                                <!-- delete user -->
                                            </td>
                                          
                                        </tr>
                                         <!-- Modal Structure -->
                                         <div id="modal<?php echo $value->id ?>" class="modal">
                                             <div class="modal-content">
                                             <div class="embed-responsive embed-responsive-16by9">
                                             <iframe src="<?php echo (!empty($value->video))?$value->video:'---'  ?>" width="100%" height="350px"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen allow="autoplay"></iframe>
                                             </div>
                                             </div>
                                             <div class="modal-footer">
                                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                                             </div>
                                          </div>
                                      
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
            $('.modal').modal();
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
                               html: 'Banner deleted succesfully',
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
