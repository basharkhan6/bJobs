<?php
require("includes/db.php");

if(isset($_GET["id"])) {
	if(!empty($_GET["id"])) {
		$id = $_GET["id"];
		$sql = "SELECT * FROM job WHERE id = ".$id;
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0 ) {
			$row = mysqli_fetch_assoc($result);
			?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $row['title']; ?> | bJob</title>
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
					<li class="active"><a href="about.php">ABOUT</a></li>
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
			<h1><?php echo $row['title']; ?></h1>
			<hr>
			<ul class="breadcrumb">
				<li><a href="index.php">HOME</a></li>
				<li><a href="jobs.php">JOBS</a></li>
				<li><a href="jobs.php?category=<?php echo $row['category']; ?>"><?php echo $row['category']; ?></a></li>
				<li class="active"><?php echo $row['title']; ?></li>
			</ul>
		</div>
	</section>




	<section class="detail">
		<div class="container">
			<div class="col-sm-8 detail-desc">
				<h2><?php echo $row['company']; ?></h2>
				<a href="<?php echo $row['companyUrl']; ?>"><?php echo $row['companyUrl']; ?></a>
				<hr>
				<p><?php echo htmlspecialchars_decode($row['des']); ?></p>
				<h4><b>Job Requirement:</b></h4>
				<p><?php echo htmlspecialchars_decode($row['req']); ?></p>
				<br>
			</div>
			<div class="col-sm-4">
				<h2>Overview</h2>
				<hr>
				<div class="overview-box">
					<p>
						<i class="fa fa-map-marker"></i> <b>Location:</b> <?php echo $row['location']; ?>
						<br><br>
						<i class="fa fa-user"></i> <b>Job Title:</b> <?php echo $row['title']; ?>
						<br><br>
						<i class="fa fa-money"></i> <b>Salary:</b> <?php echo $row['salary']; ?>
						<br><br>
						<i class="fa fa-calendar"></i> <b>Last Date:</b> <?php echo $row['ldate']; ?>
						<br><br>
					</p>
					<a href="<?php echo $row['applyUrl']; ?>" class="btn btn-block">Apply Job</a>
				</div>
			</div>
			<br>
		</div>
	</section>

	<?php
} else {
	echo "<h3>Job not found</h3>";
}
mysqli_close($conn);
}
}
?>



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
