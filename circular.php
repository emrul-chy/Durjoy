<?php

include('server.php');

?>

<?php

include('get_announcement_info.php');

?>

<?php

$query  = "SELECT * FROM tbl_university WHERE name = '$name'";

$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {

        $uni_id    = $row['id'];

        $map_link  = $row['map_link'];

        $logo_link = $row['logo_link'];

        $web_link  = $row['web_link'];

        /**/

        //echo $row["visiblity"];

        if (!isset($_SESSION['admin'])) {

            if ($row["visiblity"] == 'false') {

                echo '<script type="text/javascript">';

                echo 'window.location.href="info.php";';

                echo '</script>';

            }

        }

    }

} else {

    header('location: info.php');

}

?>

<?php

include('adminserver.php');

?>



<style>

</style>



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

		* {

      		font-family: Ubuntu-R;

    	}

	</style>

	<title>

		<?php

echo $name;

?> | Unit

		<?php

echo $unit;

?> | Durjoy</title>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

	<link rel="stylesheet" href="assests/css/navbar.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

	<link rel="stylesheet" href="assests/css/navbar.css">

	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

</head>



<body>





	<nav class="navbar navbar-default navbar-static-top">

		<div class="container-fluid">

			<div class="navbar-header">

				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

				</button>

				<a style="font-size: 32px; color: #333366; font-family: Ubuntu-B" class="navbar-brand" href="../durjoyomt">Durjoy</a>

			</div>

			<div style="font-size: 17px" class="collapse navbar-collapse" id="myNavbar">

				<ul class="nav navbar-nav">



					<li><a href="../durjoyomt">Home</a></li>



					<?php

if (isset($_SESSION['admin'])):

?>

					<li><a href="admin">Admin Panel</a></li>

					<?php

endif;

?>

					<?php

if (!isset($_SESSION['admin']) && isset($_SESSION['username'])):

?>

					<li><a href="dashboard">Dashboard</a></li>

					<?php

endif;

?>

					<?php

if (isset($_SESSION['username'])):

?>



					<li><a href="profile">My Profile</a></li>

					<?php

endif;

?>



					<li><a href="announcement">Announcement</a></li>

					<li><a href="info">Universities of Bangladesh</a></li>

					<!--         <li class="dropdown">

          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>

          <ul class="dropdown-menu">

            <li><a href="#">Page 1-1</a></li>

            <li><a href="#">Page 1-2</a></li>

            <li><a href="#">Page 1-3</a></li>

          </ul>

        </li> -->

				</ul>

				<ul class="nav navbar-nav navbar-right">

					<?php

if (isset($_SESSION['username'])):

?>

					<li class="dropdown">

						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>

							<?php

    echo $_SESSION['name'];

?> <span class="caret"></span></a>

						<ul class="dropdown-menu">

							<li style="font-size: 18px"><a href="dashboard.php?logout='1'"><span class="glyphicon glyphicon-log-out"></span>

									Logout</a></li>

						</ul>

					</li>

				</ul>

				<?php

endif;

?>

				<?php

if (!isset($_SESSION['username'])):

?>

				<li><a href="register"><span class="glyphicon glyphicon-user"></span> Register</a>

				</li>

				<li><a href="login"><span class="glyphicon glyphicon-log-in"></span> Login</a>

				</li>

				</ul>

				<?php

endif;

?>

			</div>

		</div>

	</nav>





	<div class="container-fluid" style="margin-right: 10%; margin-left: 10%">

		<div class="row">

			<div class="col-lg-12">

				<div class="panel panel-default" style="margin-top: 25px;">

					<div class="panel-heading" style=" font-size: 18px; text-align: center;">

						<img style="max-height: 75px; max-width: 75px; float: left;" src="<?php

echo ($logo_link);

?>" style="float: left;" />Admission

						Circular of <form style="padding: 0; margin: 0; wgh" method="get" action="university"><input type="hidden" name="id"

							 value="<?php

echo ($uni_id);

?>"><button role="button" class="btn btn-default" style="transform: none; font-size: 18px; white-space: normal; padding: 0; margin: 0; border: none; text-decoration: none; background-color: transparent;"

							 type="submit">

								<?php

echo ($name);

?></button></form>

						Unit

						<?php

echo $unit;

?>

					</div>

					<div style="padding: 10px" class="panel-body">

						<div style="margin: 15px" class="panel panel-default">



							<div style="font-size: 16px" class="panel-heading">Application Schedule</div>

							<div style="font-size: 15px" class="panel-body">

								<b>Start: </b>

								<?php

echo (get_date($application_start));

?></br>

								<b>End: </b>

								<?php

echo (get_date($application_end));

?></br>

							</div>

						</div>



						<div style="margin: 15px" class="panel panel-default">



							<div style="font-size: 16px" class="panel-heading">Exam Schedule</div>

							<div style="font-size: 15px" class="panel-body">

								<b>Start: </b>

								<?php

echo (get_date($exam_start));

?></br>

								<b>End: </b>

								<?php

echo (get_date($exam_end));

?></br>

							</div>

						</div>



						<div style="margin: 15px" class="panel panel-default">



							<div style="font-size: 16px" class="panel-heading">Group(s) Allowed</div>

							<div style="font-size: 15px" class="panel-body">

								<ul>

									<?php

$inn_query  = "SELECT * FROM tbl_groups";

$inn_result = mysqli_query($db, $inn_query);

$inn_res    = mysqli_num_rows($inn_result);

if ($inn_res > 0) {

    while ($inn_row = mysqli_fetch_assoc($inn_result)) {

        if ($flag[$inn_row['id']] == 1) {

            echo "<li>" . $inn_row['name'] . "</li>";

        }

    }

}

?>

								<ul>

							</div>

						</div>







						<?php

if (!isset($_SESSION['admin'])):

?>

						<div style="margin: 15px" class="panel panel-default">



							<div style="font-size: 16px" class="panel-heading">Eligiblity</div>

							<div style="font-size: 15px" class="panel-body">

								<?php

    if (!isset($_SESSION['username'])) {

        echo 'Please <a href="login">Login</a> or <a href="register">Register</a> to check eligiblity!';

    } else if ($_SESSION['details'] != 'updated') {

?>

				<div style="margin-bottom: 10px">

		<div class="alert alert-warning" role="alert">

										<span class="fa fa-info"></span> Please update profile to check eligiblity'

</div>

</div>

<?php

    } else if (!isset($_SESSION['admin'])) {

        $reason = array();

        if ($_SESSION['ssc_py'] < $ssc_min_year) {

            array_push($reason, "SSC passing year must be equal or greater than to " . $ssc_min_year);

        }

        if ($_SESSION['hsc_py'] < $hsc_min_year) {

            array_push($reason, "HSC passing year must be equal or greater than to " . $hsc_min_year);

        }

        

        $ssc_group = $_SESSION['ssc_group'];

        $hsc_group = $_SESSION['hsc_group'];

        

        $inn_query  = "SELECT * FROM tbl_groups WHERE name='$hsc_group'";

        $inn_result = mysqli_query($db, $inn_query);

        $inn_res    = mysqli_num_rows($inn_result);

        if ($inn_res > 0) {

            while ($inn_row = mysqli_fetch_assoc($inn_result)) {

                if ($flag[$inn_row['id']] != 1) {

                    array_push($reason, "Candidates from " . $hsc_group . " group are not allowed for this unit.");

                }

                if ($hsc_gpa[$inn_row['id']] > $_SESSION['hsc_gpa']) {

                    array_push($reason, "Minimum GPA " . $hsc_gpa[$inn_row['id']] . " in HSC for " . $hsc_group . " group is required to apply!");

                }

            }

        }

        

        $inn_query  = "SELECT * FROM tbl_groups WHERE name='$ssc_group'";

        $inn_result = mysqli_query($db, $inn_query);

        $inn_res    = mysqli_num_rows($inn_result);

        if ($inn_res > 0) {

            while ($inn_row = mysqli_fetch_assoc($inn_result)) {

                if ($flag[$inn_row['id']] != 1) {

                    array_push($reason, "Candidates from " . $ssc_group . " group are not allowed for this unit.");

                }

                if ($ssc_gpa[$inn_row['id']] > $_SESSION['ssc_gpa']) {

                    array_push($reason, "Minimum GPA " . $ssc_gpa[$inn_row['id']] . " in HSC for " . $ssc_group . " group is required to apply!");

                }

            }

        }

        

        if (count($reason) == 0) {

            echo '<div class="alert alert-success">

						<strong>Congratulation!</strong> You may be eligible to apply!</div>';

        } else {

            echo '<div class="alert alert-warning">

						<strong>Warning!</strong> You may be not eligible to apply for following reason(s). If you think you are seeing this mistakenly, please update your <a href="profile">profile</a>. </div>';

            echo '<ul class="list-group">';

            foreach ($reason as $x) {

                echo '<li class="list-group-item">' . $x . "</li>";

            }

            echo "</ul>";

        }

    }

?>

							</div>

						</div>

						<?php

endif;

?>



						<div style="margin: 15px" class="panel panel-default">



							<div style="font-size: 16px" class="panel-heading">Source</div>

							<div style="font-size: 15px" class="panel-body">

								<span style="margin-right: 10px" class="glyphicon glyphicon-share-alt"></span><a target="_blank" style="font-size: 18px" href="<?php

echo ($circular);

?>">Click Here</a>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

	</div>



	<?php

if (!isset($_SESSION['admin']) && isset($_SESSION['username'])):

?>

	<div class="container-fluid" style="margin-right: 10%; margin-left: 10%">

		<div class="row">

			<div class="col-lg-4 col-sm-12 col-md-12" align="center">

				<form action="" method="post" style="margin: 0px">

					<input type="hidden" id="id" name="id" value="<?php

    echo $id;

?>">

					<?php

    $qr  = 'SELECT * FROM tbl_favourite WHERE username = ' . "'" . $_SESSION["username"] . "'" . " and announcement_id = " . $id;

    $res = mysqli_query($db, $qr);

    if (mysqli_num_rows($res) == 0) {

        echo '<button style="width: 100%; font-size: 16px;" type="submit" class="btn btn-primary btn-sm" name="add_to_favourite"><span class="glyphicon glyphicon-star" aria-hidden="true" title="Add to Favourite"></span> Add to Favourite';

    } else {

        echo '<button style="width: 100%; font-size: 16px;" type="submit" class="btn btn-warning btn-sm" name="remove_from_favourite"><span class="glyphicon glyphicon-star-empty" aria-hidden="true" title="Remove from Favourite"></span> Remove from Favourite';

    }

?>

					</button>

				</form>

			</div>

			<div class="col-lg-4 col-sm-12 col-md-12">

				<button style="width: 100%; font-size: 16px;" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-heart"></span>

					<?php

    $qr  = "SELECT * FROM tbl_favourite WHERE announcement_id = '$id'";

    $res = mysqli_query($db, $qr);

    echo mysqli_num_rows($res);

?></button>

			</div>

			<div class="col-lg-4 col-sm-12 col-md-12" align="center">

				<a target="_blank" style="width: 100%; font-size: 16px;" class="btn btn-info btn-sm" href="<?php

    echo $web_link;

?>" role="button"><span

					 class="glyphicon glyphicon-globe"></span> Visit University Website</a>

			</div>

		</div>

	</div>

	<?php

endif;

?>

	<hr>



	<div class="container-fluid" style="margin-bottom: 30px">

		<h4>Find on Map</h4>



		<div class="row">

			<div class="col-lg-12"><iframe src="

				<?php

echo ($map_link);

?>" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>

			</div>

		</div>

	</div>



</body>

<!-- Footer -->





<!-- Footer -->



</html>