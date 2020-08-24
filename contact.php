<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contact | bJob</title>
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
					<li><a href="categories.php">CATEGORIES</a></li>
					<li><a href="about.php">ABOUT</a></li>
          <li class="active"><a href="contact.php">CONTACT</a></li>
				</ul>
        <ul class="nav navbar-nav navbar-right">
					<li><a href="login.php">LOGIN</a></li>
					<li><a href="signup.php">SIGNUP</a></li>
				</ul>
			</div>
		</div>
	</nav>


	<section class="contact">
		<div class="container-fluid bg-dark">
			<br><br>
			<div class="col-sm-5 col-sm-offset-1">
				<br><br>
				<iframe class="map" width="600" height="400" src="https://maps.google.com/maps?q=cse%20building%20daffodil%20international%20university&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"></iframe>
			</div>
			<div class="col-sm-4 col-sm-offset-1">
				<h1>Contact Us</h1>
				<hr>
				<form action="#">
					<div class="form-group">
				    <label for="name">Full Name:</label>
				    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
				  </div>
					<div class="form-group">
				    <label for="email">Email address:</label>
				    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
				  </div>
					<div class="form-group">
					  <label for="msg">Message:</label>
					  <textarea name="msg" class="form-control" rows="5" id="msg" placeholder="Type Your Message"></textarea>
					</div>
				  <button type="submit" class="btn btn-lg btn-block">Send Us</button>
				</form>
				<br><br>
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
