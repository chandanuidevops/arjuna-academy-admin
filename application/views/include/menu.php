<?php   $this->ci =& get_instance(); ?>
 <div class="col l3 m12 s12">

   <div class="side-bar white z-depth-1">
      <ul class="li-list ">
        <li class="<?php echo $this->uri->segment(1) == 'dashboard'?'active':''?>"> <a href="<?php echo base_url('dashboard') ?>"><i class="fab fa-delicious li-icon"></i>Dashboard</a></li>
        
        <li class="<?php echo $this->uri->segment(1) == 'banner'?'active':'' ?>"><a href="<?php echo base_url('banner/manage') ?>"><i class="far fa-image li-icon"></i>Home Banner</a></li>


        <!-- <li class="<?php echo $this->uri->segment(1) == 'home-gallery'?'active':'' ?>"><a href="<?php echo base_url('home-gallery/manage') ?>"><i class="far fa-image li-icon"></i>Home Gallery</a></li> -->
        <li class="<?php echo $this->uri->segment(1) == 'gallery'?'active':'' ?>"><a href="<?php echo base_url('gallery/manage') ?>"><i class="fab fa-envira li-icon"></i>Gallery</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'event'?'active':'' ?>"><a href="<?php echo base_url('event/manage') ?>"><i class="far fa-calendar-alt li-icon"></i>Notifications</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'course'?'active':'' ?>"><a href="<?php echo base_url('course/manage') ?>"><i class="fas fa-book-open li-icon"></i>Courses</a></li>
        <!-- <li class="<?php echo $this->uri->segment(1) == 'enquiry'?'active':'' ?>"><a href="<?php echo base_url('enquiry/manage') ?>"><i class="far fa-envelope li-icon"></i>Enquiries</a></li> -->
        <li class="<?php echo $this->uri->segment(1) == 'apply'?'active':'' ?>"><a href="<?php echo base_url('apply/manage') ?>"><i class="far fa-image li-icon"></i>Admission Enquiry Form</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'admission'?'active':'' ?>"><a href="<?php echo base_url('admission/manage') ?>"><i class="far fa-image li-icon"></i>Admission</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'users'?'active':'' ?>"><a href="<?php echo base_url('users/manage') ?>"><i class="fas fa-user-tie  li-icon"></i>User Registered</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'job-application'?'active':'' ?>"><a href="<?php echo base_url('job-application/manage') ?>"><i class="fas fa-user-tie  li-icon"></i>Job Applications</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'job'?'active':'' ?>"><a href="<?php echo base_url('job/manage') ?>"><i class="fas fa-user-tie  li-icon"></i>Job Vacancy</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'enrolled'?'active':'' ?>"><a href="<?php echo base_url('enrolled/manage') ?>"><i class="far fa-image li-icon"></i>Enrolled(Payment)</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'test'?'active':'' ?>"><a href="<?php echo base_url('test/manage') ?>"><i class="far fa-image li-icon"></i>Online Test</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'test-purchase'?'active':'' ?>"><a href="<?php echo base_url('test-purchase/manage') ?>"><i class="far fa-image li-icon"></i>Online Test Purchase</a></li>
        <li class="<?php echo $this->uri->segment(1) == 'test-result'?'active':'' ?>"><a href="<?php echo base_url('test-result/manage') ?>"><i class="far fa-image li-icon"></i>Test Result</a></li>

        <!-- <?php if ($this->session->userdata('ra_type') == '1' || $this->session->userdata('ra_type') == '3') {  ?>
            <li class="<?php echo $this->uri->segment(1) == 'adminuser'?'active':'' ?>"><a href="<?php echo base_url('adminuser/manage') ?>"><i class="fas fa-user-plus li-icon"></i>Admin User</a></li>
        <?php } ?> -->
     
      </ul>
   </div>
</div>