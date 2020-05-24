<div class="navbar-fixed">
      <nav class="white">
         <div class="nav-wrapper container-wrap">
            <a href="<?php echo base_url() ?>" class="brand-logo">
            <img src="<?php echo base_url()?>assets/img/logo.png" class="responsive-img" alt="logo">
            </a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger">
            <i class="fas fa-bars black-text"></i>
            </a>
            <ul class="right hide-on-med-and-down">
              
               <ul id='dropdown3' class='dropdown-content'>
                  <li><a href="#!" class="black-text">test</a></li>
               </ul>
               <li class="dropdown-trigger hide-ref1" data-target='dropdown2'>
                  <img src="<?php echo base_url()?>assets/img/user.png" class="responsive-img droup-img "  alt="">
                  <i class="fas fa-caret-down font-col1" ></i>
               </li>
               <!-- Dropdown Structure -->
               <ul id='dropdown2' class='dropdown-content'>
                  <li ><a href="<?php echo  base_url() ?>profile">Profile </a></li>
                  <li ><a href="<?php echo  base_url() ?>change-password">Settings</a></li>
                  <li><a href="<?php echo base_url() ?>logout">Logout</a></li>
               </ul>
            </ul>
         </div>
      </nav>
   </div>
      <ul class="sidenav" id="mobile-demo">
         <li><a href="sass.html">Sass</a></li>
         <li><a href="badges.html">Components</a></li>
         <li><a href="collapsible.html">Javascript</a></li>
         <li><a href="mobile.html">Mobile</a></li>
      </ul>