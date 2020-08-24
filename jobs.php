<?php
require("includes/db.php");

$param = 0;
$sql = "SELECT * FROM job";

if(!empty($_GET['category'])) {
  if($param != 0) {
    $sql .= " AND ";
  }
  $category = $_GET['category'];
  $sql .= " category = '$category'";
  $param ++;
}
if(!empty($_GET['location'])) {
  if($param != 0) {
    $sql .= " AND ";
  }
  $location = $_GET['location'];
  $sql .= " location = '$location'";
  $param ++;
}
if(!empty($_GET['type'])) {
  if($param != 0) {
    $sql .= " AND ";
  }
  $type = $_GET['type'];
  $sql .= " type = '$type'";
  $param ++;
}
if(!empty($_GET['salary'])) {
  if($param != 0) {
    $sql .= " AND ";
  }
  $salary = $_GET['salary'];
  $sql .= " salary = '$salary'";
  $param ++;
}
if(!empty($_GET['s'])) {
  if($param != 0) {
    $sql .= " AND ";
  }
  $s = $_GET['s'];
  $sql .= " id IN (SELECT id FROM job WHERE title LIKE '%$s%' or company LIKE '%$s%')";
  $param ++;
}

if(empty($_GET['sort'])) {
  $sql .= " ORDER BY id DESC";
}
if(!empty($_GET['sort'])) {
  if($_GET['sort'] == "new") {
    $sql .= " ORDER BY id DESC";
  }
  if($_GET['sort'] == "old") {
    $sql .= " ORDER BY id ASC";
  }
  if($_GET['sort'] == "expiring") {
    $sql .= " ORDER BY ldate DESC";
  }
  if($_GET['sort'] == "high") {
    $sql .= " ORDER BY slary DESC";
  }
  if($_GET['sort'] == "low") {
    $sql .= " ORDER BY slary ASC";
  }
}

if($param != 0 ) {  //if there is some parameter
  $pos = strpos($sql, "* FROM job") + strlen("* FROM job");  //find position where to add extra str //add strlen cz pos start after "FROM job"
  $sql = substr($sql, 0, $pos) . " WHERE " . substr($sql, $pos);  //add " WHERE " after pos
}


if(isset($_GET['p'])) {
  $p = $_GET['p'];
} else {
  $p = 1;
}
$recPerPage = 10;
$offset = ($p-1) * $recPerPage;
if($result = mysqli_query($conn, $sql)) {
  $rows = mysqli_num_rows($result);
}
$totPage = ceil($rows / $recPerPage);

$sql .= " LIMIT $offset, $recPerPage";

// echo $sql;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Jobs | bJob</title>
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
			<h1>All Jobs</h1>
			<hr>
			<ul class="breadcrumb">
				<li><a href="index.php">HOME</a></li>
				<li class="active">JOBS</li>
			</ul>
		</div>
	</section>



	<section class="job">
		<div class="container">
      <div class="col-sm-8">
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
        } else {
            echo "Error: ". $sql . "<br>" . mysqli_error($conn);
        }
  			mysqli_close($conn);
  			?>
        <div class="col-xs-12 text-center">
					<ul class="pagination">
            <li <?php if(($p-3) < 1) echo "class='disabled'";?>>
              <a href="?p=1"><<</a>
            </li>
            <li <?php if(($p-2) < 1) echo "class='disabled'";?>>
              <a href="?p=<?php echo ($p-2); ?>"><?php echo ($p-2); ?></a>
            </li>
            <li <?php if(($p-1) < 1) echo "class='disabled'";?>>
              <a href="?p=<?php echo ($p-1); ?>"><?php echo ($p-1); ?></a>
            </li>

						<li class="active"><a href="#"><?php echo $p; ?></a></li>

            <li <?php if(($p+1) > $totPage) echo "class='disabled'";?>>
              <a href="?p=<?php echo ($p+1); ?>"><?php echo ($p+1); ?></a>
            </li>
            <li <?php if(($p+2) > $totPage) echo "class='disabled'";?>>
              <a href="?p=<?php echo ($p+2); ?>"><?php echo ($p+2); ?></a>
            </li>
            <li <?php if(($p+3) > $totPage) echo "class='disabled'";?>>
              <a href="?p=<?php echo ($p+3); ?>"><?php echo ($p+3); ?></a>
            </li>
            <li <?php if(($p+4) > $totPage) echo "class='disabled'";?>>
              <a href="?p=<?php echo $totPage; ?>">>></a>
            </li>
					</ul>
        </div>
      </div>
      <div class="col-sm-4">
				<form action="jobs.php" method="GET" class="form-group" name="form1">
          <h3>Search:</h3>
          <input type="text" name="s" value="<?php if(!empty($_GET['s'])) echo $_GET['s'];?>" class="form-control">
					<h3>Sort By:</h3>
					<select class="form-control" name="sort" id="sort">
						<option value="new">Newest</option>
						<option value="old">Oldest</option>
						<option value="expiring">Expiring Soon</option>
						<option value="high">High Salary</option>
						<option value="low">Low Salary</option>
					</select>
					<h3>Category:</h3>
					<select name="category" class="form-control" id="category">
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
					<h3>Location:</h3>
					<select name="location" class="form-control" id="location">
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
					<h3>Type:</h3>
					<select name="type" class="form-control" id="type">
						<option></option>
						<option value="">--Type--</option>
						<option value="Full Time">Full Time</option>
						<option value="Part Time">Part Time</option>
						<option value="Contractual">Contractual</option>
						<option value="Frelance">Frelance</option>
					</select>
					<br>
					<input type="submit" value="Filter Result" class="btn btn-lg btn-block">
				</form>
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
  <script>
  function setOptionData(elName, data) {
    $("#" + elName).val(data)
    .find("option[value=" + data +"]").attr('selected', true);
  }
  <?php
  if(!empty($_GET['sort'])) {
    echo "setOptionData('sort', '".$_GET['sort']."');";
  }
  if(!empty($_GET['category'])) {
    echo "setOptionData('category', '".$_GET['category']."');";
  }
  if(!empty($_GET['location'])) {
    echo "setOptionData('location', '".$_GET['location']."');";
  }
  if(!empty($_GET['type'])) {
    echo "setOptionData('type', '".$_GET['type']."');";
  }
  ?>
  </script>

</body>
</html>
