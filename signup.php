<?php
require("includes/db.php");

$msg = $fname = $lname = $phone = $company = $companyUrl = $email = $pwd = $pwd2 = "";
if(isset($_POST["fname"])
		&& isset($_POST["lname"])
		&& isset($_POST["phone"])
		&& isset($_POST["company"])
		&& isset($_POST["companyUrl"])
		&& isset($_POST["email"])
		&& isset($_POST["pwd"])
		&& isset($_POST["pwd2"])) {

  $fname = test_input($_POST["fname"]);
	$lname = test_input($_POST["lname"]);
	$phone = test_input($_POST["phone"]);
	$company = test_input($_POST["company"]);
  $companyUrl = test_input($_POST["companyUrl"]);
	$email = test_input($_POST["email"]);
	$pwd = test_input($_POST["pwd"]);
  $pwd2 = test_input($_POST["pwd2"]);

	$result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");
	if($pwd == $pwd2 || strlen($pwd) < 6 || strlen($pwd) > 20) {
		if(mysqli_num_rows($result) == 0) {  //check duplicate
			$pwd = password_hash($pwd, PASSWORD_DEFAULT);
			$sql = "INSERT INTO user (fname, lname, phone, company, companyUrl, email, pwd)
									VALUES ('$fname', '$lname', '$phone', '$company', '$companyUrl', '$email', '$pwd')";
			if(mysqli_query($conn, $sql)) {
				header("location: login.php");  //if success
				exit;
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
		} else {
			$msg = "Email Already Exist!";
		}
	}
	else {
		$msg = "Password does not match! or Not in length(6-20)";
	}
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
	<title>Signup | bJob</title>
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
					<li class="active"><a href="signup.php">SIGNUP</a></li>
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



  <section class="signup">
    <div class="signup-form">
      <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" name="form1" onsubmit="return validateform()">
        <h2 class="text-center">Signup</h2>
        <div class="form-group">
            <input type="text" name="fname" class="form-control" placeholder="First Name" required="required">
        </div>
				<div class="form-group">
            <input type="text" name="lname" class="form-control" placeholder="Last Name" required="required">
        </div>
				<div class="form-group">
            <input type="text" name="phone" class="form-control" placeholder="Mobile No" required="required">
        </div>
				<div class="form-group">
            <input type="text" name="company" class="form-control" placeholder="Comany Name" required="required">
        </div>
				<div class="form-group">
            <input type="text" name="companyUrl" class="form-control" placeholder="Comany Website" required="required">
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="pwd" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="pwd2" class="form-control" placeholder="Repeat Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block">SignUp</button>
        </div>
      </form>
      <p class="text-center"><a href="login.php">Already Signup?</a></p>
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
	<script src="js/validation.js"></script>

</body>
</html>
