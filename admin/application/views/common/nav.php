<body>
    <div class="page home-page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="<?php echo base_url(); ?>" class="navbar-brand">
                  <div class="brand-text brand-big hidden-lg-down"><span>NNBID </span><strong>Dashboard</strong></div>
                  <div class="brand-text brand-small"><strong>NNBID</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn select_nav_custom">Menu</button>
                  <div id="myDropdown" class="dropdown-content">
                    <a href="<?php echo base_url('index.php'); ?>">Home</a>
                    <a href="<?php echo base_url('index.php/Manage_images'); ?>">Manage Images</a>
                    <a href="<?php echo base_url('index.php/companies'); ?>">Manage Companies</a>
                    <a href="<?php echo base_url('index.php/buyers'); ?>">Manage Buyers</a>
                    <a href="<?php echo base_url('index.php/manage_auctions'); ?>">Manage Auction</a>
                    <a href="<?php echo base_url('index.php/approve_buyers'); ?>">Approve Buyers</a>
                    <a href="<?php echo base_url('index.php/complete_auction'); ?>">Generate Report</a>
                    <a href="<?php echo base_url('index.php/archived'); ?>">Archived Data</a>
                  </div>
                </div>
                
                <!-- Logout    -->
                <li class="nav-item"><a href="<?php echo base_url('index.php/auth/logout/'); ?>" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="<?php echo base_url('assets/'); ?>img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4">Mr. Ashok Bhatt</h1>
              <p>NNBID Administrator</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Management</span>
          <ul class="list-unstyled">
          <li class="active"> <a href="<?php echo base_url(); ?>"><span style="color:#0d018e; font-size:20px;">Home</span></a></li>
            <li> <a href="<?php echo base_url('index.php/contact_profile'); ?>"><span style="color:#0d018e; font-size:20px;">Manage Profile</span></a></li>

            <li class="active"> <a href="<?php echo base_url('index.php/Manage_images'); ?>"><span style="color:#0d018e; font-size:20px;">Manage Images</span></a></li>

            <li> <a href="<?php echo base_url('index.php/companies'); ?>"><span style="color:#0d018e; font-size:20px;">Manage Companies</span></b></a></li>

            <li class="active"> <a href="<?php echo base_url('index.php/buyers'); ?>"> <span style="color:#0d018e; font-size:20px;">Manage Buyers</span></a></li>

            <li> <a href="<?php echo base_url('index.php/manage_auctions'); ?>"><span style="color:#0d018e; font-size:20px;">Manage Auctions</span></a></li>

            <li class="active"> <a href="<?php echo base_url('index.php/approve_buyers'); ?>"><span style="color:#0d018e; font-size:20px;">Approve Buyers</span></a></li>

            <li class="active"> <a href="<?php echo base_url(); ?>"><span style="color:#0d018e; font-size:20px;">Online Auctions</span></a></li>
            
            
            
            
            
            <li> <a href="<?php echo base_url('index.php/complete_auction'); ?>"><span style="color:#0d018e; font-size:20px;">Generate Report</span></a>
              </li>

            <li> <a href="<?php echo base_url('index.php/archived'); ?>"><span style="color:#0d018e; font-size:20px;">Archieved Data</span></a>
              </li>

            <li><a href="#dashvariants"> <i class="icon-user"></i>Online Users</a>
              <ul id="dashvariants" class="list-unstyled onlineusers">
                
              </ul>
            </li>

        </nav>


<script type="text/javascript">
  window.onload = showOnline();

  function showOnline(){
      var timer;

      timer = setInterval(() => 
        $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>ViewAuction/getOnline/",
                //data: {id_lot:id},
                success: function(resultData) { 
                  
                 $('.onlineusers').html(resultData);
                  
              }
          })
        , 1000);
              
  }//function close


</script>