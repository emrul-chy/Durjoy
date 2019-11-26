<?php

include('server.php');

?>



<!DOCTYPE html>

<html lang="en">



<head>

	<link rel="shortcut icon" href="assests/favicon.ico" />

	<style>

		@font-face {

    		font-family: Ubuntu-R;

    		src: url(assests/font/Ubuntu-R.ttf);

		}

		@font-face {

    		font-family: Ubuntu-B;

    		src: url(assests/font/Ubuntu-B.ttf);

		}

		@font-face {

    		font-family: UbuntuMono-R;

    		src: url(assests/font/UbuntuMono-R.ttf);

		}

		@font-face {

    		font-family: UbuntuMono-B;

    		src: url(assests/font/UbuntuMono-B.ttf);

		}

		* {

      		font-family: Ubuntu-R;

		}

		h3 {

			font-family: Ubuntu-B;

		}

	</style>

	<title>Durjoy</title>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" rel="stylesheet">

<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">



<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>



<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">




<link href="https://fonts.googleapis.com/css?family=Hind+Siliguri" rel="stylesheet">

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.7/js/mdb.min.js"></script>

</head>



<style>

	.navbar {

		-webkit-box-shadow: -1px 0px 9px 0px rgba(0,0,0,0.38);

-moz-box-shadow: -1px 0px 9px 0px rgba(0,0,0,0.38);

box-shadow: -1px 0px 9px 0px rgba(0,0,0,0.38);

font-size: 16px;

}

.container-fluid {

	padding-left: 6%;

	padding-right: 6%;

}

</style>



<body style="padding-bottom: 30px; width: 100%">

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 20px; padding-left: 6%; padding-right: 6%">

  <a class="navbar-brand" href="../public_html/" style=" font-size: 24px; font-family: 'Hind Siliguri', sans-serif;">দুর্জয়</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">

    <span class="navbar-toggler-icon"></span>

  </button>

  <div class="collapse navbar-collapse" id="navbarNavDropdown">

    <ul class="navbar-nav">

      <li class="nav-item active">

        <a class="nav-link" href="../public_html/">Home <span class="sr-only">(current)</span></a>

      </li>



      <?php

if (isset($_SESSION['admin'])):

?>

      	<li class="nav-item">

        	<a class="nav-link" href="admin">Admin Panel</a>

      	</li>

      <?php

endif;

?>



      <?php

if (!isset($_SESSION['admin']) && isset($_SESSION['username'])):

?>

      	<li class="nav-item">

        	<a class="nav-link" href="dashboard">Dashboard</a>

      	</li>

      <?php

endif;

?>



      <li class="nav-item">

        <a class="nav-link" href="announcementList">Announcements</a>

      </li>

      <li class="nav-item dropdown">

        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

          University List

        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

          <a class="dropdown-item" href="universityList?type=Public">Public</a>

          <a class="dropdown-item" href="universityList?type=Private">Private</a>

          <a class="dropdown-item" href="universityList?type=International">International</a>

        </div>

      </li>

      <li class="nav-item">

        <a class="nav-link" href="omt">Online Mock Test</a>

      </li>

    </ul>



    <?php

if (!isset($_SESSION['username'])):

?>

    	<ul class="navbar-nav ml-md-auto">

				<li class="nav-item">

					<a href="register" class="nav-link"><span class="fa fa-user"></span> Register</a>

				</li>

			</ul>

			<ul class="navbar-nav">

				<li class="nav-item">

					<a href="login?back=../public_html" class="nav-link"><span class="fa fa-sign-in"></span> Login</a>

				</li>

			</ul>

		<?php

endif;

?>



		<?php

if (isset($_SESSION['username'])):

?>

		<ul class="navbar-nav ml-md-auto">

    	<li class="nav-item dropdown ">

        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

        	<span class="fa fa-user"></span>

          <?php

    echo (" " . $_SESSION['name']);

?>

        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

          <a class="dropdown-item" href="profile">Profile</a>

          <?php

    if (isset($_SESSION['username']) && !isset($_SESSION['admin'])):

?>

          	<a class="dropdown-item" href="dashboard?logout=1&back=../public_html">Logout</a>

          <?php

    endif;

?>

          <?php

    if (isset($_SESSION['admin'])):

?>

          	<a class="dropdown-item" href="admin?logout=1&back=../public_html">Logout</a>

          <?php

    endif;

?>

        </div>

      </li>

    </ul>

		<?php

endif;

?>

  </div>

</nav>



	<div class="container-fluid">

		<div class="row">

			<div class="col-lg-8 col-md-12 col-sm-12">



				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-bottom: 20px">

  <ol class="carousel-indicators">

    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>

    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>

  </ol>

  <div class="carousel-inner">

    <div class="carousel-item active">

      <img style="height: 400px; width:100%;" class="d-block w-100" src="assests/img/du.jpg" alt="First slide">

      <div class="carousel-caption">

								<h3>Dhaka University</h3>

								<p>Dhaka, Dhaka Division</p>

							</div>

    </div>

    <div class="carousel-item">

      <img style="height: 400px; width:100%;" class="d-block w-100" src="assests/img/buet.JPG" alt="Second slide">

      <div class="carousel-caption">

								<h3>Bangladesh University of Engineering & Technology</h3>

								<p>Dhaka, Dhaka Division</p>

							</div>

    </div>

    <div class="carousel-item">

      <img style="height: 400px; width:100%;" class="d-block w-100" src="assests/img/sust.jpg" alt="Third slide">

      <div class="carousel-caption">

								<h3>Shahjalal University of Science & Technology</h3>

								<p>Sylhet, Sylhet Division</p>

							</div>

    </div>

  </div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">

    <span class="carousel-control-prev-icon" aria-hidden="true"></span>

    <span class="sr-only">Previous</span>

  </a>

  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">

    <span class="carousel-control-next-icon" aria-hidden="true"></span>

    <span class="sr-only">Next</span>

  </a>

</div>

</div>



			<div class="col-lg-4 col-md-12 col-sm-12">

				<div class="card">

					<div style="font-size: 16px" class="card-header">Recent Annuoncements</div>

						<ul class="list-group list-group-flush">

  

						<?php

include('databaseconn.php');

$query  = "SELECT * FROM tbl_announcement WHERE visiblity = 'true' ORDER BY published_time DESC";

$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) > 0) {

    echo "<tbody>";

    $cnt = 0;

    while ($row = mysqli_fetch_assoc($result)) {

        $cnt++;

        if ($cnt > 3) {

            break;

        }

?>

						<form action="announcement" method="get">

							<input type="hidden" id="id" name="id" value="<?php

        echo $row['id'];

?>">

							<li class="list-group-item"><h5><?php

        echo $row['name'] . " (Unit " . $row['unit'] . ")";

?></h5>

							<button type="submit" class="btn btn-primary btn-sm"></span>

								<?php

        echo "Details";

?>

							</button>

							</li>

						</form>

						<?php

    }

}

?>



             </ul>



				<div class="card-footer text-muted">

					<a class="link" href="announcementList">See All</a>

				</div>

				</div>

			</div>

		</div>

	</div>



	<hr>

	<div class="container-fluid">

		<div class="row">

			<div class="card-body text-white bg-info">

				<h3 style="padding: 5%; text-align: center; font-size: 42px"><b style="font-family: Ubuntu-B;">Durjoy</b> is a platform where you will find all the

					admission information of universities all over Bangladesh.</h3>

			</div>

		</div>

	</div>

	<hr>

	<div class="container-fluid" style="margin-bottom: 30px;">

		<div class="row">

			<div class="col-lg-12" style="margin-top: 20px">

				<div style="margin-top: 50px; color: #333366; font-family: Ubuntu-B">

					<h3>What we do?</h3>

				</div>

				<div>

					<p style="font-size: 20px; font-family: Ubuntu-R">We provides information about almost every university. We

						also publish every admission circulare of differenr universities of Bangladesh.</p>

				</div>



				<hr>

				<div style="margin-top: 50px; color: #333366; font-family: Ubuntu-B">

					<h3>Why us?</h3>

				</div>

				<div>

					<p style="font-size: 20px; font-family: Ubuntu-R">If you are a member of our platform, you can mark an

						admission announcement as favourite. You will also know about your eligibility for certain announcement.</p>

				</div>

			</div>

		</div>

	</div>

	</div>



	<div style="margin-bottom: 30px;">



	</div>

	<hr>



	<div class="container-fluid">

		<h3>Type wise university statistics</h3>

		<canvas  style="padding-right: 10%; padding-left: 10%" id="type"></canvas>

	</div>

	<hr>



	<div class="container-fluid">

		<h3>Division wise university statistics</h3>

		<canvas  style="padding-right: 10%; padding-left: 10%" id="division"></canvas>

	</div>

	<hr>



	<div class="container-fluid">

		<h3>Specialization wise university statistics</h3>

		<canvas  style="padding-right: 10%; padding-left: 10%" id="specialization"></canvas>

	</div>

	<hr>


<div class="container-fluid" style="font-size: 16px; font-family: UbuntuMono-R; padding-left: 6%; padding-right: 6%">

	<center style="font-family: UbuntuMono-R;">Durjoy Admission Aid<br>
	Developed by Emrul Chowdhury</center>
	</div>



	<script>

		//line

		var ctxL = document.getElementById("type").getContext('2d');

		var myLineChart = new Chart(ctxL, {

			type: 'line',

			data: {

				labels: ["Public", "Private", "International"],

				datasets: [{

					label: "Type wise number of universities",

					data: [

						<?php

include('databaseconn.php');

$query  = "SELECT * FROM tbl_university WHERE type='public'";

$result = mysqli_query($db, $query);

$x      = mysqli_num_rows($result);

echo $x . ", ";

$query  = "SELECT * FROM tbl_university WHERE type='private'";

$result = mysqli_query($db, $query);

$x      = mysqli_num_rows($result);

echo $x . ", ";

$query  = "SELECT * FROM tbl_university WHERE type='international'";

$result = mysqli_query($db, $query);

$x      = mysqli_num_rows($result);

echo $x . "\n";

?>

					],

					backgroundColor: [

						'rgba(75, 192, 192, 0.2)',

					],

					borderColor: [

						'rgba(75, 192, 192, 0.7)',

					],

					borderWidth: 2

				}]

			},

			options: {

				responsive: true

			}

		});

	</script>



	<script>

		//line

		var ctxL = document.getElementById("division").getContext('2d');

		var myLineChart = new Chart(ctxL, {

			type: 'line',

			data: {

				labels: [

					<?php

include('databaseconn.php');

$query  = "SELECT * FROM tbl_divisions ORDER BY name ASC";

$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) > 0) {

    $cnt = 0;

    $x   = mysqli_num_rows($result);

    while ($row = mysqli_fetch_assoc($result)) {

        $x--;

        echo '"' . $row['name'] . '"';

        if ($x != 0)

            echo ", ";

    }

}

?>

				],

				datasets: [{

						label: "Division wise number of public universities",

						data: [

							<?php

include('databaseconn.php');

$query  = "SELECT * FROM tbl_divisions ORDER BY name ASC";

$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) > 0) {

    $cnt = 0;

    $x   = mysqli_num_rows($result);

    while ($row = mysqli_fetch_assoc($result)) {

        $x--;

        $q = "SELECT * FROM tbl_university WHERE type = 'public' and division = '" . $row['name'] . "'";

        $r = mysqli_query($db, $q);

        echo mysqli_num_rows($r);

        

        if ($x != 0)

            echo ", ";

    }

}

?>

						],

						backgroundColor: [

							'rgba(0, 137, 132, .2)',

						],

						borderColor: [

							'rgba(0, 10, 130, .7)',

						],

						borderWidth: 2

					},

					{

						label: "Division wise number of private universities",

						data: [

							<?php

include('databaseconn.php');

$query  = "SELECT * FROM tbl_divisions ORDER BY name ASC";

$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) > 0) {

    $cnt = 0;

    $x   = mysqli_num_rows($result);

    while ($row = mysqli_fetch_assoc($result)) {

        $x--;

        $q = "SELECT * FROM tbl_university WHERE type = 'private' and division = '" . $row['name'] . "'";

        $r = mysqli_query($db, $q);

        echo mysqli_num_rows($r);

        

        if ($x != 0)

            echo ", ";

    }

}

?>

						],

						backgroundColor: [

							'rgba(105, 0, 132, .2)',

						],

						borderColor: [

							'rgba(0, 10, 130, .7)',

						],

						borderWidth: 2

					},

					{

						label: "Division wise number of international universities",

						data: [

							<?php

include('databaseconn.php');

$query  = "SELECT * FROM tbl_divisions ORDER BY name ASC";

$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) > 0) {

    $cnt = 0;

    $x   = mysqli_num_rows($result);

    while ($row = mysqli_fetch_assoc($result)) {

        $x--;

        $q = "SELECT * FROM tbl_university WHERE type = 'international' and division = '" . $row['name'] . "'";

        $r = mysqli_query($db, $q);

        echo mysqli_num_rows($r);

        

        if ($x != 0)

            echo ", ";

    }

}

?>

						],

						backgroundColor: [

							'rgba(255, 159, 64, 0.2)',

						],

						borderColor: [

							'rgba(255, 159, 64, 0.7)',

						],

						borderWidth: 2

					}

				]

			},

			options: {

				responsive: true

			}

		});

	</script>





	<script>

		//line

		var ctxB = document.getElementById("specialization").getContext('2d');

		var myLineChart = new Chart(ctxB, {

			type: 'line',

			data: {

				labels: [

					<?php

include('databaseconn.php');

$query  = "SELECT * FROM tbl_specializations ORDER BY name ASC";

$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) > 0) {

    $cnt = 0;

    $x   = mysqli_num_rows($result);

    while ($row = mysqli_fetch_assoc($result)) {

        $x--;

        echo '"' . $row['name'] . '"';

        if ($x != 0)

            echo ", ";

    }

}

?>

				],

				datasets: [{

					label: "Specialization wise number of universities",

					data: [

						<?php

include('databaseconn.php');

$query  = "SELECT * FROM tbl_specializations ORDER BY name ASC";

$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) > 0) {

    $cnt = 0;

    $x   = mysqli_num_rows($result);

    while ($row = mysqli_fetch_assoc($result)) {

        $x--;

        $q = "SELECT * FROM tbl_university WHERE specialization = '" . $row['name'] . "'";

        $r = mysqli_query($db, $q);

        echo mysqli_num_rows($r);

        

        if ($x != 0)

            echo ", ";

    }

}

?>

					],

					backgroundColor: [

						'rgba(105, 0, 132, .2)',

					],

					borderColor: [

						'rgba(0, 10, 130, .7)',

					],

					borderWidth: 2

				}]

			},

			options: {

				responsive: true

			}

		});

	</script>



</body>

<!--  -->



</html>