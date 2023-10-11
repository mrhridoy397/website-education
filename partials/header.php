<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!-- Page Responsive -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- SEO Meta -->
		<meta name="keyword" content="lms,education management system,online education system" />
		<!-- Page Description -->
		<meta name="description" content="Online Education Management Syatem" />
		<!-- Author -->
		<meta name="author" content="Innova Computers BD" />
		<title>Home || <?php echo $settings[0]['description']; ?></title>
		<!-- Favicon ico -->
		<link rel="icon" href="<?php echo $settings[2]['description']; ?>" type="image/png" sizes="16x16" />
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<!-- <link rel="stylesheet" href="assets/css/educafe.css" /> -->
		<!-- Fontawesome -->
		<link rel="stylesheet" href="assets/fonts/css/font-awesome.min.css" />
		<!-- animate css -->
		<link rel="stylesheet" href="assets/fonts/css/cdnjs.cloudflare.com_ajax_libs_animate.css_4.1.1_animate.min.css" />
		<!-- Owl carousel CSS -->
		<link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
		<link rel="stylesheet" href="assets/css/owl.theme.default.min.css" />
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
		<!-- Magic Popup CSS -->
		<link rel="stylesheet" href="assets/css/magnific-popup.css">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="assets/css/style2.css" />
		<link rel="stylesheet" href="assets/css/style.css" />
		<!-- Responsive CSS -->
		<link rel="stylesheet" href="assets/css/responsive.css" />
		<!-- jQuery v3.5.1 -->
		<script src="assets/js/jquery.min.js"></script>
		<!-- Main Js -->
		<script src="assets/js/sweetalert2.js"></script>
	</head>
	<body>
		<!-- Topbar Start -->
		<div class="topbar f-bg">
			<div class="container">
				<div class="d-flex justify-content-between">
					<ul class="d-flex left-top">
						<li><a href="tel:<?php echo $settings[3]['description']; ?>" class="s-color number-family"><i class="fa fa-phone" aria-hidden="true"> </i> <span><?php echo $settings[3]['description']; ?></span></a></li>
						<li><a href="mailto:<?php echo $settings[4]['description']; ?>" class="s-color"><i class="fa fa-envelope" aria-hidden="true"></i> <span><?php echo $settings[4]['description']; ?></span></a></li>
						<li> <a href="#" class="s-color"><i class="fa fa-calendar" aria-hidden="true"></i> <span><?php echo $settings[5]['description']; ?></span></a></li>
					</ul>
					<ul class="right-top d-flex">
						<li><a href="login.php" class="s-color line-after">Login</a></li>
						<li><a href="register.php" class="s-color">Register</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- Topbar End -->
		<!-- Header Start -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.php"><img src="<?php echo $settings[1]['description']; ?>" alt="!"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link active" href="index.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="about.php">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="course.php">Courses</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="events.php">Events</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="teacher.php">Teacher</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="blog.php">Blog</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="contact.php">Contact</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <sup> <span class="badge badge-primary brd">1</span></sup></a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- Header End -->