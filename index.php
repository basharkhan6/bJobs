<?php
require("includes/db.php");

$sql = "SELECT * FROM job ORDER BY id DESC LIMIT 5";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>bJob | Find jobs easily</title>
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
					<li><a href="login.php">LOGIN</a></li>
					<li><a href="signup.php">SIGNUP</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<section class="front">
		<div class="container-fluid bg-dark bg-front">
			<h1>Find Jobs</h1> <br>
			<form action="jobs.php" class="form-group row" method="GET">
				<div class="col-sm-12">
					<input name="s" class="form-control col-sm-6 input-lg" type="text" placeholder="ex: Basundhara Group, Web Developer... ">
				</div>
				<div class="col-sm-4">
					<select name="category" class="form-control">
						<option value="">--Category--</option>
						<option value="It">IT</option>
						<option value="Finance">Finance</option>
						<option value="Healthcare">Healthcare</option>
						<option value="Education">Education</option>
						<option value="Textile">Textile</option>
						<option value="Construction">Contruction</option>
						<option value="Restaurant">Restaurant</option>
						<option value="Automotive">Automotive</option>
						<option value="Transport">Transport</option>
					</select>
				</div>
				<div class="col-sm-4">
					<select name="location" class="form-control">
            <option value="">--Location--</option>
						<option value="Dhaka">Dhaka</option>
						<option value="Chittagong">Chittagong</option>
						<option value="Rajshahi">Rajshahi</option>
						<option value="Khulna">Khulna</option>
						<option value="Barishal">Barishal</option>
						<option value="Rangpur">Rangpur</option>
						<option value="Sylhet">Sylhet</option>
						<option value="Mymensingh">Mymensingh</option>
					</select>
				</div>
				<div class="col-sm-4">
					<select name="type" class="form-control">
						<option value="">--Type--</option>
						<option value="Full Time">Full Time</option>
						<option value="Part Time">Part Time</option>
						<option value="Contractual">Contractual</option>
						<option value="Frelance">Frelance</option>
					</select>
				</div>
				<input type="submit" value="Search" class="btn btn-lg">
			</form>
		</div>
	</section>



	<section class="feature">
		<div class="container">
			<h2>Popular Categories</h2>
			<hr>
			<div class="row">
				<a href="jobs.php?category=Finance">
					<div class="col-sm-6 col-md-3">
						<div class="feature-box text-center">
							<i class="fa fa-line-chart"></i>
							<h2>Finance</h2> 48
						</div>
					</div>
				</a>
				<a href="jobs.php?category=Education">
					<div class="col-sm-6 col-md-3">
						<div class="feature-box text-center">
							<i class="fa fa-graduation-cap"></i>
							<h2>Education</h2> 77
						</div>
					</div>
				</a>
				<a href="jobs.php?category=Healthcare">
					<div class="col-sm-6 col-md-3">
						<div class="feature-box text-center">
							<i class="fa fa-medkit"></i>
							<h2>Healthcare</h2> 56
						</div>
					</div>
				</a>
				<a href="jobs.php?category=It">
					<div class="col-sm-6 col-md-3">
						<div class="feature-box text-center">
							<i class="fa fa-laptop"></i>
							<h2>IT</h2> 329
						</div>
					</div>
				</a>
			</div>
      <br>
			<div class="col-xs-12 text-center">
				<a href="categories.php" class="btn btn-lg">See All Categories</a>
			</div>
		</div>
	</section>


	<section class="job">
		<div class="container">
      <div class="col-sm-8">
        <h2>Recent Jobs</h2>
				<hr>
				<?php
				$result = mysqli_query($conn, $sql);
				if($result) {
					if(mysqli_num_rows($result) > 0 ) {
						while($row = mysqli_fetch_assoc($result)) {
							?>
							<a href="<?php echo 'detail.php?id='.$row['id'] ?>">
								<div class="job-box">
									<div class="title"><span class="label pull-right"><?php echo $row['type']; ?></span> <?php echo $row['title']; ?></div>
									<p>
										<i class="fa fa-briefcase"></i> <?php echo $row['company']; ?>
										<i class="fa fa-map-marker"></i> <?php echo $row['location']; ?>
										<i class="fa fa-money"></i> <?php echo $row['salary']; ?>
									</p>
								</div>
							</a>

						<?php }
					} else {
						echo "<h3>No Job Found!</h3>";
					}
				}
				mysqli_close($conn);
				?>
				<br>
        <div class="col-xs-12 text-center">
          <a href="jobs.php" class="btn btn-lg">Browse More</a>
        </div>
        <br><br>
      </div>
      <div class="col-sm-4">
        <h2>Job Spotlight</h2>
				<hr>
        <div class="spot-box">
          <div class="title"><span class="label pull-right">Frelance</span> Web Developer</div>
          <p>
            <i class="fa fa-briefcase"></i> SmartEdgeBd <i class="fa fa-map-marker"></i> Dhaka, BD <i class="fa fa-money"></i> $900-$1200
          </p>
					<p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled
          </p>
          <br>
          <a href="#" class="btn btn-block">Apply Job</a>
        </div>
        <div class="spot-box">
          <div class="title"><span class="label pull-right">Part Time</span> Web Developer</div>
          <p>
            <i class="fa fa-briefcase"></i> SmartEdgeBd <i class="fa fa-map-marker"></i> Dhaka, BD <i class="fa fa-money"></i> $900-$1200
					</p>
					<p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled
          </p>
          <br>
          <a href="#" class="btn btn-block">Apply Job</a>
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
