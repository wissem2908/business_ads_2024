<?php
session_start();
if(!isset($_SESSION['login']) && $_SESSION['login']!="yes" ){
	header('location:index.php');
}
$logo=$_SESSION['logo'];

$website=$_SERVER['SERVER_NAME'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Ads : Business Ads">
	<meta property="og:title" content="Ads : Business Ads">
	<meta property="og:description" content="Ads : Business Ads">
	<meta property="og:image" content="">
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Admin Panel | Business Ads </title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	 <!-- Datatable -->
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
       <!--<link href="vendor/phone-number-validation/build/css/demo.css" rel="stylesheet">-->
        <link href="vendor/phone-number-validation/build/css/intlTelInput.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendor/sweetalert2/sweetalert2.min.css">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/tags_input.css" rel="stylesheet">
	<link rel="stylesheet" href="./vendor/uppy core/dist/uppy.min.css">



	<style>

.uppy-StatusBar-actionBtn--upload {
    display: none;
}
	</style>
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
   <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
       <div class="nav-header">
            <a href="//<?php echo $website; ?>" class="brand-logo">
			
				<div class="brand-title">
					 <p  id="website"><?php echo $website?></p>
					<span class="brand-sub-title">Business Ads Dashboard</span>
				</div>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							<div class="dashboard_bar">
                                
                            </div>
							
                        </div>
                        <?php 
if($_SESSION['role']=='user'){
                        ?>
                        <a target="_blank" href='//<?php echo $_SERVER['SERVER_NAME']."/".$_SESSION['username']; ?>'><h4><?php echo $_SERVER['SERVER_NAME']."/".$_SESSION['username']; ?> <i class="fas fa-external-link-alt"></i></h4></a>

                        <?php } ?>
                        <ul class="navbar-nav header-right">
							
								<li class="nav-item dropdown notification_dropdown "  id="notification"  >
                              

							   <a  role="button"  class="nav-link "  href="#"  data-bs-toggle="dropdown" >
									<svg   width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M23.3333 19.8333H23.1187C23.2568 19.4597 23.3295 19.065 23.3333 18.6666V12.8333C23.3294 10.7663 22.6402 8.75902 21.3735 7.12565C20.1068 5.49228 18.3343 4.32508 16.3333 3.80679V3.49996C16.3333 2.88112 16.0875 2.28763 15.6499 1.85004C15.2123 1.41246 14.6188 1.16663 14 1.16663C13.3812 1.16663 12.7877 1.41246 12.3501 1.85004C11.9125 2.28763 11.6667 2.88112 11.6667 3.49996V3.80679C9.66574 4.32508 7.89317 5.49228 6.6265 7.12565C5.35983 8.75902 4.67058 10.7663 4.66667 12.8333V18.6666C4.67053 19.065 4.74316 19.4597 4.88133 19.8333H4.66667C4.35725 19.8333 4.0605 19.9562 3.84171 20.175C3.62292 20.3938 3.5 20.6905 3.5 21C3.5 21.3094 3.62292 21.6061 3.84171 21.8249C4.0605 22.0437 4.35725 22.1666 4.66667 22.1666H23.3333C23.6428 22.1666 23.9395 22.0437 24.1583 21.8249C24.3771 21.6061 24.5 21.3094 24.5 21C24.5 20.6905 24.3771 20.3938 24.1583 20.175C23.9395 19.9562 23.6428 19.8333 23.3333 19.8333Z" fill="#717579"></path>
										<path d="M9.9819 24.5C10.3863 25.2088 10.971 25.7981 11.6766 26.2079C12.3823 26.6178 13.1838 26.8337 13.9999 26.8337C14.816 26.8337 15.6175 26.6178 16.3232 26.2079C17.0288 25.7981 17.6135 25.2088 18.0179 24.5H9.9819Z" fill="#717579"></path>
									</svg>
                                    <span class="badge light text-white bg-warning rounded-circle" id="count_notification">12</span>
                                </a>
							  

                                <div class="dropdown-menu dropdown-menu-end">
                                    <div id="DZ_W_Notification1" class="widget-media dlab-scroll p-3 ps" style="height:380px;">
										<ul class="timeline" id="listNotif">
										
											
										</ul>
									<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                                    <a class="all-notification" href="notification.php" id="changeStaus">See all notifications <i class="ti-arrow-end"></i></a>
                                </div>
                            </li>
							
						
							
							<li class="nav-item dropdown  header-profile">
								<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									<?php
									if($logo!=''){
										echo '<img src="logo_images/'. $logo.'" width="56" alt="">';
									}else{
										echo '<img src="logo_images/user.png" width="56" alt="">';
									}
									?>
									
								</a>

                  
								<div class="dropdown-menu dropdown-menu-end">
									<a href="profile.php" class="dropdown-item ai-icon">
										<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
										<span class="ms-2">Profile </span>
									</a>
								
									<a href="assets/php/logout.php" class="dropdown-item ai-icon">
										<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
										<span class="ms-2">Logout </span>
									</a>
								</div>
							</li>

                        </ul>
                    </div>
				</nav>
			</div>
		</div>
                    
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">

            <div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
                    <!--<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
							<i class="fas fa-home"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="index.html">Dashboard Light</a></li>
							<li><a href="index-2.html">Dashboard Dark</a></li>
							<li><a href="project-page.html">Project</a></li>
							<li><a href="contacts.html">Contacts</a></li>
							<li><a href="kanban.html">Kanban</a></li>
							<li><a href="calendar-page.html">Calendar</a></li>
							<li><a href="message.html">Messages</a></li>	
						</ul>

                    </li>-->
					
              <li><a href="dashboard.php" class="" aria-expanded="false">
							<i class="fas fa-home"></i>
							<span class="nav-text">Dashboard</span>
						</a>
					</li>
					<?php if($_SESSION['role']=='admin'){ ?>
             <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
			 <i class="fas fa-users"></i>
							<span class="nav-text">Users</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="users_list.php">User List</a></li>
							<li><a href="add_user.php">Add User</a></li>
								
						</ul>

                    </li>

					<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
			 <i class="fas fa-users"></i>
							<span class="nav-text">Other Users</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="other_users_list.php">User List</a></li>
							<li><a href="add_other_user.php">Add User</a></li>
								
						</ul>

                    </li>
					<?php } ?>
					<?php if($_SESSION['role']=='admin'){ ?>
             <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
			 <i class="fas fa-users"></i>
							<span class="nav-text">Blog</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="Blogs_list.php">List Blogs</a></li>
							<li><a href="add_blog.php">Add Blog</a></li>
								
						</ul>

                    </li>
					<?php } ?>
					<?php if($_SESSION['role']=='user'){ ?>
               <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
							<i class="fas fa-home"></i>
							<span class="nav-text">Ads</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="ads_list.php">My Ads</a></li>
							<li><a href="add_ads.php">Add Ads</a></li>
								
						</ul>

                    </li>
					<?php } ?>
					<?php if($_SESSION['role']=='user'){ ?>
               <li><a href="categories.php" aria-expanded="false">
							<i class="fas fa-home"></i>
							<span class="nav-text">My Categories</span>
						</a>
                      

                    </li>
					<?php } ?>
							<!-- start new code -->
							<?php if($_SESSION['role']=='admin'){ ?>
               <li><a href="general_categories.php" aria-expanded="false">
							<i class="fas fa-home"></i>
							<span class="nav-text">General Categories</span>
						</a>
                      

                    </li>
					<?php } ?>
					<!-- end new code -->
						<?php if($_SESSION['role']=='user'){ ?>
               <li><a href="user_messages.php" aria-expanded="false">
							<i class="fas fa-home"></i>
							<span class="nav-text">Enquiries</span>
						</a>
                      

                    </li>
					<?php } ?>
					<?php if($_SESSION['role']=='admin'){ ?>
               <li><a href="contact_user.php" aria-expanded="false">
							<i class="fas fa-home"></i>
							<span class="nav-text">User Messages</span>
						</a>
                      

                    </li>
					<?php } ?>
					<?php if($_SESSION['role']=='admin'){ ?>
          <li><a href="contact.php" class="" aria-expanded="false">
		  <i class="fas fa-envelope"></i>
							<span class="nav-text">Enquiries</span>
						</a>
					</li>
					<?php } ?>
   <li><a href="profile.php" class="" aria-expanded="false">
   <i class="fas fa-id-card"></i>
							<span class="nav-text">Profile</span>
						</a>
					</li>
					<?php if($_SESSION['role']=='admin'){ ?>
             <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
			 <i class="fas fa-file"></i>
							<span class="nav-text">WebsiteContent</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="header_content.php">Header content</a></li>
							<li><a href="about_content.php">About Content</a></li>
								
						</ul>

                    </li>
					<?php } ?>
					<?php if($_SESSION['role']=='admin'){ ?>

						<li>
							<a href="terms.php" class="" aria-expanded="false">
   							<i class="fas fa-id-card"></i>
							<span class="nav-text">Terms & Conditions</span>
						</a>
					</li>
					<li>
							<a href="privacy_policy.php" class="" aria-expanded="false">
   							<i class="fas fa-id-card"></i>
							<span class="nav-text">Privacy Policy</span>
						</a>
					</li>
						<?php } ?>
                </ul>
			
			</div>
        </div>

		<script>
			$("#website").html($("#website").text().replaceAll(".", "<span style='color:#FFDF00;'>.</span>"))
		</script>