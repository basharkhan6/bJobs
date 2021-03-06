<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php
require("includes/db.php");

$msg = $title = $des = $req = $type = $category = $location = $salary = $ldate = $company = $companyUrl = $applyUrl = "";
if(isset($_POST["id"])) {

  $title = mysqli_real_escape_string($conn, test_input($_POST["title"]));
  $des = mysqli_real_escape_string($conn, test_input($_POST["des"]));
  $req = mysqli_real_escape_string($conn, test_input($_POST["req"]));
  $type = test_input($_POST["type"]);
  $category = test_input($_POST["category"]);
  $location = test_input($_POST["location"]);
  $salary = test_input($_POST["salary"]);
  $ldate = test_input($_POST["ldate"]);
  $company = $_SESSION["company"];
  $companyUrl = $_SESSION["companyUrl"];
  $applyUrl = mysqli_real_escape_string($conn, test_input($_POST["applyUrl"]));

  $sql = "UPDATE job SET "
            ."title = '$title',"
            ."des = '$des',"
            ."req = '$req',"
            ."type = '$type',"
            ."category = '$category',"
            ."location = '$location',"
            ."salary = '$salary',"
            ."ldate = '$ldate',"
            ."company = '$company',"
            ."companyUrl = '$companyUrl',"
            ."applyUrl = '$applyUrl',"
            ."company = '$company'"
            ."WHERE id = ".$_POST["id"];

  if(mysqli_query($conn, $sql)) {
    header("location: updatejob.php?id=".$_POST["id"]."&msg=Update Success");
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
<?php
  if(isset($_GET["delete"])) {
    $sql = "DELETE FROM job WHERE id = ".$_GET["delete"];
    if(mysqli_query($conn, $sql)) {
      header("location: list.php?msg=Delete Success");
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
?>
<?php
if(isset($_GET["id"])) {
	if(!empty($_GET["id"])) {
    if(isset($_GET["msg"])) {
      $msg = $_GET["msg"];
    }
		$id = $_GET["id"];
		$sql = "SELECT * FROM job WHERE id = ".$id;
		$result = mysqli_query($conn, $sql);

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update | bJob </title>
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
      <h1>Update a Job</h1>
      <hr>
      <ul class="breadcrumb">
        <li><a href="index.php">HOME</a></li>
        <li><a href="dashboard.php">DASHBOARD</a></li>
        <li class="active">UPDATE JOB</li>
      </ul>
    </div>
  </section>




	<?php if($msg != "") { ?>
		<div class="container">
			<br><br>
			<div class="alert alert-info alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<p><?php echo $msg; ?></p>
			</div>
		</div>
	<?php } ?>


  <?php
  if(mysqli_num_rows($result) > 0 ) {
    $row = mysqli_fetch_assoc($result);
  ?>
  <section>
    <div class="container">
      <br><br>
      <div class="col-sm-6 col-sm-offset-3">
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
          <input type="hidden" name="id" value="<?php echo $id; ?>">

          <div class="form-group">
            <label for="company">Company Name:</label>
            <input type="text" name="company" value="<?php echo $_SESSION['company']; ?>" class="form-control" placeholder="Company Name" required="required" disabled>
          </div>
          <div class="form-group">
            <label for="title">Job Title:</label>
            <input type="text" name="title" value="<?php echo $row['title']; ?>" class="form-control" placeholder="Job Title" required="required">
          </div>
          <div class="form-group">
					  <label for="des">Job Description:</label>
					  <textarea name="des" class="form-control" rows="5" id="msg" placeholder="Type Job Description"><?php echo $row['des']; ?></textarea>
					</div>
          <div class="form-group">
					  <label for="req">Job Requirement:</label>
					  <textarea name="req" class="form-control" rows="5" id="msg" placeholder="Type Job Requirement"><?php echo $row['req']; ?></textarea>
					</div>
          <div class="form-group">
					  <label for="type">Job Type:</label>
            <select name="type" class="form-control">
              <option value="<?php echo $row['type']; ?>"><?php echo $row['type']; ?></option>
              <option value="Full Time">Full Time</option>
              <option value="Part Time">Part Time</option>
              <option value="Contractual ">Contractual</option>
              <option value="Frelance ">Frelance</option>
            </select>
					</div>
          <div class="form-group">
					  <label for="category">Job Category:</label>
            <select name="category" class="form-control">
              <option  value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
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
          <div class="form-group">
					  <label for="location">Job Location:</label>
            <select name="location" class="form-control">
              <option value="<?php echo $row['location']; ?>"><?php echo $row['location']; ?></option>
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
          <div class="form-group">
					  <label for="salary">Salary Range:</label>
            <select name="salary" class="form-control">
              <option value="<?php echo $row['salary']; ?>"><?php echo $row['salary']; ?></option>
              <option value="$300-$499">$300-$499</option>
              <option value="$500-$799">$500-$799</option>
              <option value="$800-$999">$800-$999</option>
              <option value="$1000-$1199">$1000-$1199</option>
            </select>
					</div>
          <div class="from-group">
            <label for="ldate">Last Date of Apply:</label>
            <input type="date" value="<?php echo $row['ldate']; ?>" name="ldate" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="applyUrl">Apply Link:</label>
            <input type="text" value="<?php echo $row['applyUrl']; ?>" name="applyUrl" class="form-control" placeholder="Apply Link">
          </div>
          <br>
          <div class="form-group">
            <button type="submit" class="btn btn-block btn-lg">Update</button>
          </div>
          <a href="<?php echo $_SERVER["PHP_SELF"]."?delete=".$id;?>" class="btn btn-block btn-lg btn-danger">Delete</a>
        </form><br><br>
      </div>
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
