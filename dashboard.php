<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php
  $msg = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome | bJob</title>
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
          <li><a href="contact.php">CONTACT</a></li>
				</ul>
        <ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="dashboard.php">DASHBOARD</a></li>
					<li><a href="logout.php">LOGOUT</a></li>
				</ul>
			</div>
		</div>
	</nav>



  <section>
    <div class="container">
      <br>
      <h1>Dashboard</h1>
      <hr>
      <ul class="breadcrumb">
        <li><a href="index.php">HOME</a></li>
        <li class="active">DASHBOARD</li>
      </ul>
    </div>
  </section>




	<?php if($msg != "") { ?>
		<div class="container">
			<br><br>
			<div class="alert alert-warning alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<p><?php echo $msg; ?></p>
			</div>
		</div>
	<?php } ?>

  <section>
    <div class="container">
      <div class="col-sm-8 col-sm-offset-2">
        <div class="jumbotron">
          <h2>Welcome, <?php echo $_SESSION['name']; ?></h2>
          <br>
          <a href="newjob.php" class="btn btn-lg">Post A New Job</a>
          <br><br>
          <a href="list.php" class="btn btn-lg">List Your Job</a>
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
