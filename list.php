<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php
require("includes/db.php");

if(isset($_GET["msg"])) {
  $msg = $_GET["msg"];
}

$sql = "SELECT * FROM job WHERE uId = ".$_SESSION["id"];
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>List Jobs | bJob</title>
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
          <li class="active"><a href="jobs.php">JOBS</a></li>
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



  <section>
    <div class="container">
      <br>
      <h1>List</h1>
      <hr>
      <ul class="breadcrumb">
        <li><a href="index.php">HOME</a></li>
        <li><a href="dashboard.php">DASHBOARD</a></li>
        <li class="active">LIST</li>
      </ul>
    </div>
  </section>



	<section class="job">
		<div class="container">
      <div class="col-sm-8">
				<?php
				if(mysqli_num_rows($result) > 0 ) {
					while($row = mysqli_fetch_assoc($result)) {
				?>
				<a href="<?php echo 'updatejob.php?id='.$row['id'] ?>">
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
				mysqli_close($conn);
				?>
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
