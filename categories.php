<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Categories | bJobs</title>
	<link rel="icon" href="img/icon.png" type="image/png" sizes="16x16">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">bJobs</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="jobs.php">JOBS</a></li>
					<li class="active"><a href="categories.php">CATEGORIES</a></li>
					<li><a href="about.php">ABOUT</a></li>
          <li><a href="contact.php">CONTACT</a></li>
				</ul>
        <ul class="nav navbar-nav navbar-right">
					<li><a href="login.php">LOGIN</a></li>
					<li><a href="signup.php">SIGNUP</a></li>
				</ul>
			</div>
		</div>
	</nav>



	<section>
		<div class="container">
			<br>
			<h1>All Categories</h1>
			<hr>
			<ul class="breadcrumb">
				<li><a href="index.php">HOME</a></li>
				<li class="active">CATEGORIES</li>
			</ul>
		</div>
	</section>




	<section class="categories">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="list-group">
					  <a href="jobs.php?category=It" class="list-group-item">IT <span class="badge">290</span></a>
					  <a href="jobs.php?category=Healthcare" class="list-group-item">Healthcare <span class="badge">120</span></a>
					  <a href="jobs.php?category=Finance" class="list-group-item">Finance <span class="badge">84</span></a>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="list-group">
					  <a href="jobs.php?category=Restaurant" class="list-group-item">Restaurant <span class="badge">290</span></a>
					  <a href="jobs.php?category=Education" class="list-group-item">Education <span class="badge">120</span></a>
					  <a href="jobs.php?category=Textile" class="list-group-item">Textile <span class="badge">84</span></a>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="list-group">
					  <a href="jobs.php?category=Construction" class="list-group-item">Construction <span class="badge">290</span></a>
					  <a href="jobs.php?category=Automotive" class="list-group-item">Automotive <span class="badge">120</span></a>
					  <a href="jobs.php?category=Transport" class="list-group-item">Transport <span class="badge">84</span></a>
					</div>
				</div>
			</div>
		</div>
	</section>






	<footer class="container-fluid text-center">
    <h4>Follow Us</h4>
    <a href="#" title="Follow in Linkedin"><i class="fa fa-linkedin social-box in-bg-shade"></i></a>
    <a href="#" title="Connect in Facebook"><i class="fa fa-facebook-f social-box fb-bg-shade"></i></a>
    <a href="#" title="Follow on Twitter"><i class="fa fa-twitter social-box tw-bg-shade"></i></a>
    <a href="#" title="Subscribe in Youtube"><i class="fa fa-youtube social-box yt-bg-shade"></i></a>
    <a href="#" title="See Us on Pinterest"><i class="fa fa-pinterest social-box pn-bg-shade"></i></a>
    <br>
    © Copyright 2020 by <a href="about.php" class="copy">Basar's Team.</a> All Rights Reserved.
	</footer>



  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jobColor.js"></script>

</body>
</html>
