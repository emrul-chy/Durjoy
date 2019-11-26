<?php 
include('databaseconn.php');
if (!isset($_GET['id'])) {
        echo '<script type="text/javascript">';
        echo 'window.location.href="403";';
        echo '</script>';
        die();
}
$id     = $_GET['id'];
$query  = "SELECT * FROM tbl_university WHERE id = '$id'";
$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) == 0) {
        echo '<script type="text/javascript">';
        echo 'window.location.href="404";';
        echo '</script>';
        die();
}
if (!isset($_SESSION['admin'])) {
        $query  = "SELECT * FROM tbl_university WHERE id = '$id' and visiblity = 'true'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) == 0) {
                echo '<script type="text/javascript">';
                echo 'window.location.href="403";';
                echo '</script>';
                die();
        }
}


include('server.php');?>

<?php include('adminserver.php');

?>





<?php include('get_info.php');?>
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

    		th {
      			font-family: Ubuntu-B;
      		}

	</style>

	<title><?php echo $name; ?> | Durjoy</title>

	<meta charset="utf-8" />

	

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



<body style="padding-bottom: 30px;">

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 20px; padding-left: 6%; padding-right: 6%">

  <a class="navbar-brand" href="index" style=" font-size: 24px; font-family: 'Hind Siliguri', sans-serif;">দুর্জয়</a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">

    <span class="navbar-toggler-icon"></span>

  </button>

  <div class="collapse navbar-collapse" id="navbarNavDropdown">

    <ul class="navbar-nav">

      <li class="nav-item">

        <a class="nav-link" href="index">Home <span class="sr-only">(current)</span></a>

      </li>



      <?php if(isset($_SESSION['admin'])):?>

      	<li class="nav-item">

        	<a class="nav-link" href="admin">Admin Panel</a>

      	</li>

      <?php endif ?>



      <?php if(!isset($_SESSION['admin']) && isset($_SESSION['username'])):?>

      	<li class="nav-item">

        	<a class="nav-link" href="dashboard">Dashboard</a>

      	</li>

      <?php endif ?>



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



    <?php if(!isset($_SESSION['username'])): ?>

    	<ul class="navbar-nav ml-md-auto">

				<li class="nav-item">

					<a href="register" class="nav-link"><span class="fa fa-user"></span> Register</a>

				</li>

			</ul>

			<ul class="navbar-nav">

				<li class="nav-item">

					<a href="login?back=university?id=<?php echo($_GET['id']);?>" class="nav-link"><span class="fa fa-sign-in"></span> Login</a>

				</li>

			</ul>

		<?php endif?>



		<?php if(isset($_SESSION['username'])): ?>

		<ul class="navbar-nav ml-md-auto">

    	<li class="nav-item dropdown ">

        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

        	<span class="fa fa-user"></span>

          <?php echo(" " . $_SESSION['name']); ?>

        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

          <a class="dropdown-item" href="profile">Profile</a>

          <?php if(isset($_SESSION['username'])&& !isset($_SESSION['admin'])): ?>

          	<a class="dropdown-item" href="dashboard?logout=1&back=university?id=<?php echo($_GET['id']);?>">Logout</a>

          <?php endif?>

          <?php if(isset($_SESSION['admin'])): ?>

          	<a class="dropdown-item" href="admin?logout=&back=university?id=<?php echo($_GET['id']);?>">Logout</a>

          <?php endif?>

        </div>

      </li>

    </ul>

		<?php endif?>

  </div>

</nav>



	<div class="container-fluid">

		<?php

if (isset($_SESSION['admin'])){

    include('success.php');

    include('errors.php');

 }

?>

		<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12">

			<div style="margin-right: 110px; width: initial; float: left;">

				<h2 style="color: #333366;">

					<?php

echo $name;

?>

				</h2>

				<h5> <span class="fa fa-map-marker"></span>

					<?php

echo ($location);

?>,

					<?php

echo ($division);

?>

<div style="height: 5px"></div>

<a target="_blank" style="color: #333333; text-decoration: none;" href="<?php

echo $web_link;

?>"><span class="fa fa-globe"></span> Website</a></h5>

			</div>



			<div style="right: 2%;position: absolute;">

				<img style="max-width: 100px; max-height: 100px; width: 100%; float: right;"  src="<?php

echo ($logo_link);

?>" class="img-thumbnail"

				 alt="<?php

echo $name;

?>"/>

			</div>

		</div>

	</div>

</div>

	<hr>

	<div class="container-fluid">

		<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12">



			<h3>Information</h3>

				<table class="table table-bordered table-hover table-responsive" style="margin-top: 20px; font-size: 14px">

					<thead>

						<tr style="color: #333366">

							<th>Acronym</th>

							<th>Type</th>

							<th>Established</th>

							<th>Specialization</th>

							<th>PhD Granting</th>

						</tr>

					</thead>

					<tbody>

						<tr>

							<td>

								<?php

echo ($acronym);

?>

							</td>

							<td>

								<?php

echo ($type);

?>

							</td>

							<td>

								<?php

echo ($established);

?>

							</td>

							<td>

								<?php

echo ($specialization);

?>

							</td>

							<td>

								<?php

echo ($phd_granting);

?>

							</td>

						</tr>

					</tbody>

				</table>

			</div>

			

		</div></div>

<hr>



	<div class="container-fluid">

		<h3>Announcements</h3>

				<table style="font-size: 14px" id="announcement" class="table table-bordered table-striped table-hover table-responsive">

					<thead>

						<tr>

							<th style="font-family: Ubuntu-B;width: 100%">Unit</th>

					<th style="font-family: Ubuntu-B;min-width: 150px">Application Phase</th>

					<th style="font-family: Ubuntu-B;min-width: 150px">Admission Test</th>

							

					<?php if(isset($_SESSION['admin'])):?>

					<th style="font-family: Ubuntu-B;width: 165px; min-width: 165px">Action</th>

				<?php endif;?>



						</tr>

					</thead>

					<?php

include('view_announcement_by_uni.php');

?>

				</table>

	</div>



	<hr>



	<div class="container-fluid">

		<h3>Faculties</h3>



		<?php $id = $_GET['id']; if (isset($_SESSION['admin'])):?>

		

		<form method="post" action="">

								<div class="form-group">

									 <input type="hidden" name="university_id" value="<?php

    echo ($id);

?>">

									<div class="row">

										<div style="margin-top: 10px;" class="col-lg-9 col-md-8 col-sm-12">

									 <input type="text" class="form-control" id="name" placeholder="Enter name"

									 name="name" required />

									 </div>

									 <div style="margin-top: 10px;" class="col-lg-3 col-md-4 col-sm-12">

									 <button type="submit" style="width: 100%" name="add_faculty" class="btn btn-primary btn-md">Add Faculty</button>

									 </div>

									</div>

								</div>

		</form>



	<?php endif?>



		

		<?php

$query  = "SELECT * FROM tbl_faculty WHERE university_id = '$id'";

$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {

        echo '<div class="card" style="padding:0;margin:0; margin-bottom: 10px">';

        echo '<div data-toggle="collapse" data-target="#' . $row['id'] . '" role="button" style="font-size: 16px;" class="card-header">';

        echo '<div class="container-fluid" style="padding:0; margin:0;"><div class="row"><div class="col-lg-8 col-sm-6 col-md-6"></span>' . $row['name'] . '<span style="margin-left: 5px" class="dropdown-toggle"></div>';

        echo '<div class="col-lg-4 col-sm-6 col-md-6">';

        

        

        if (isset($_SESSION['admin'])):

?>

					<form action="" method="post" style="float: right;">

						<input type="hidden" name="faculty_id" value="<?php

            echo ($row['id']);

?>">

						<button type="submit" name="delete_faculty" style=" " class="btn btn-danger btn-sm">Delete Faculty</button>

 </form>

					<form action="" method="post" style="float: right;"> 

						<input type="hidden" name="faculty_id" value="<?php

            echo ($row['id']);

?>">

					<button data-toggle="modal" data-target="#upd<?php

            echo ($row['id']);

?>" style=" margin-right: 5px" class="btn btn-info btn-sm" type="button">Update Faculty</button>

				



					<div class="modal fade" id="upd<?php

            echo ($row['id']);

?>" role="dialog">

														<div class="modal-dialog">



															<!-- Modal content-->

															<div class="modal-content">

																<div class="modal-header">

																	<h6 class="modal-title">Update Faculty</h6>



            <button style="font-size: 14px" type="button" class="close" data-dismiss="modal" aria-label="Close">

																</div>

																<div class="modal-body">

																	<div class="form-group">

																		<input type="text" name="name" class="form-control" value="<?php

            echo ($row['name']);

?>">

																	</div>

																</div>

																<div class="modal-footer">

																	<button type="submit" class="btn btn-primary btn-md" name="update_faculty">Update</button>

																	<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>

																</div>

															</div>



														</div>

													</div>

</form>

					<?php

        endif;

        echo "</div></div></div></div>";



        echo '<div class="collapse" id="' . $row['id'] .'"><div class="card-body" >';

?>

        <div class="container-fluid" style="margin: 0; padding: 0">

        <table class="table table-bordered table-hover table-striped table-responsive" style="font-size: 14px">

        	<tbody>

        		<?php

        $faculty_id = $row['id'];

        $in_query   = "SELECT * FROM tbl_department WHERE faculty_id = '$faculty_id'";

        //echo $in_query;

        $in_result  = mysqli_query($db, $in_query);

        if (mysqli_num_rows($in_result) > 0) {

            while ($in_row = mysqli_fetch_assoc($in_result)) {

            	echo("<tr>");

                if (isset($_SESSION['admin'])) {

                    echo '<td>' . $in_row['name'] . "</td>";

                } else {

                    echo '<td>' . $in_row['name'] . "</td>";

                }

                

                if (isset($_SESSION['admin'])) {

?>

<td style="width: 165px">

            		<form action="" method="post" style="float: right;">

												<input type="hidden" name="department_id" value="<?php

						                    echo ($in_row['id']);

						?>">

												<button type="submit" name="delete_department" style=" " class="btn btn-danger btn-sm">Delete</button>

						 </form>

											<form action="" method="post" style="float: right;"> 

												<input type="hidden" name="department_id" value="<?php

						                    echo ($in_row['id']);

						?>">

											<button data-toggle="modal" data-target="#dep_upd<?php

						                    echo ($in_row['id']);

						?>" style=" margin-right: 5px" class="btn btn-info btn-sm" type="button">Update</button>

										



											<div class="modal fade" id="dep_upd<?php

						                    echo ($in_row['id']);

						?>" role="dialog">

																				<div class="modal-dialog">



																					<!-- Modal content-->

																					<div class="modal-content">

																						<div class="modal-header">

																							<h6 class="modal-title">Update Department</h6>



            <button style="font-size: 14px" type="button" class="close" data-dismiss="modal" aria-label="Close">

																						</div>

																						<div class="modal-body">

																							<div class="form-group">

																								<input type="text" name="name" class="form-control" value="<?php

						                    echo ($in_row['name']);

						?>">

																							</div>

																						</div>

																						<div class="modal-footer">

																							<button type="submit" class="btn btn-primary btn-md" name="update_department">Update</button>

																							<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>

																						</div>

																					</div>



																				</div>

																			</div>

																		</form>

																	</td>

																</tr>

            		<?php

                }

                

            }

        }

?>



        			<?php

        if (isset($_SESSION['admin'])):

?> 

        	<tr>

        		<form action="" method="post">

        			<td>

        				<div class="form-group">

        							<input type="hidden" name="faculty_id" value="<?php echo($row['id']) ?>">

        						<input class="form-control" type="text" name="name">

        				</div>

        			</td>

        			<td style="width: 165px"> 

        				<button style="width: 100%" type="submit" name="add_department" class="btn btn-primary btn-md">

        					Add Department

        				</button>

        			</td>

        		</form>

        		</tr>





        		<?php

        endif;

?>

</tbody>

        </table>

      </div>

        <?php

        echo "</div></div></div>";

        

    }

}

?>

	</div>



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


<hr><div class="container-fluid" style="font-size: 16px; font-family: UbuntuMono-R; padding-left: 6%; padding-right: 6%">

	<center style="font-family: UbuntuMono-R;">Durjoy Admission Aid<br>
	Developed by Emrul Chowdhury</center>
	</div>


<!-- Footer -->



</html>



<script>

	$(document).ready(function () {

		$('#announcement').DataTable({

			responsive: true

		});

	});

</script>