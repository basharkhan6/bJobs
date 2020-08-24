<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
    exit;
}
?>

<?php
	require("includes/db.php");

	$msg = $fname = $lname = $company = $email = $pwd = $pwd2 = "";

	if(isset($_POST["email"])	&& isset($_POST["pwd"])) {
		$email = test_input($_POST["email"]);
		$pwd = test_input($_POST["pwd"]);

		$sql = "SELECT * FROM user WHERE email = '$email'";

		$result = mysqli_query($conn, $sql);
		if($result) {
			if(mysqli_num_rows($result) == 1) {
				$row = mysqli_fetch_assoc($result);
				if(password_verify($pwd, $row["pwd"])) {
					$_SESSION["loggedin"] = true;
					$_SESSION["id"] = $row["id"];
					$_SESSION["company"] = $row["company"];
					$_SESSION["companyUrl"] = $row["companyUrl"];
          $_SESSION["name"] = $row["fname"]. " " . $row["lname"];
					header("location: dashboard.php");
				}	else {
					$msg = "Password Deoes not Match.";
				}
			} else {
				$msg = "User not Registered";
			}
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login | bJob</title>
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
					<li class="active"><a href="login.php">LOGIN</a></li>
					<li><a href="signup.php">SIGNUP</a></li>
				</ul>
			</div>
		</div>
	</nav>



	<?php if($msg != "") { ?>
		<div class="container">
			<br><br>
			<div class="alert alert-warning alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<p><?php echo $msg; ?></p>
			</div>
		</div>
	<?php } ?>



  <section class="login">
    <div class="login-form">
      <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
        <h2 class="text-center">Log in</h2>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="pwd" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block">Login</button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline">
							<input type="checkbox">
							Remember me
						</label>
            <a href="#" class="pull-right">Forgot Password?</a>
        </div>
      </form>
      <p class="text-center"><a href="signup.php">Create an Account?</a></p>
      <p class="text-center"><a href="index.php">Back to Home</a></p>
    <div>
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
