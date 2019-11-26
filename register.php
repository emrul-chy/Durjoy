<?php

include('server.php');

?>



<?php

if (isset($_SESSION['admin'])) {

    echo '<script type="text/javascript">';

    echo 'window.location.href="admin";';

    echo '</script>';

}



if (isset($_SESSION['username'])) {

    echo '<script type="text/javascript">';

    echo 'window.location.href="dashboard";';

    echo '</script>';

}

?>



<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">



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

	</style>

	<title>Register | Durjoy</title>

	<meta charset="utf-8" />

	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	

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



</style>



<body style="margin-bottom: 30px">



<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 10px; padding-left: 6%; padding-right: 6%">

  <a class="navbar-brand" href="../public_html/" style=" font-size: 24px; font-family: 'Hind Siliguri', sans-serif;">দুর্জয়</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">

    <span class="navbar-toggler-icon"></span>

  </button>

  <div class="collapse navbar-collapse" id="navbarNavDropdown">

    <ul class="navbar-nav">

      <li class="nav-item">

        <a class="nav-link" href="../public_html/">Home <span class="sr-only">(current)</span></a>

      </li>

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



    <ul class="navbar-nav ml-md-auto">

				<li class="nav-item">

					<a href="login" class="nav-link"><span class="fa fa-sign-in"></span> Login</a>

				</li>

			</ul>

  </div>

</nav>

	<div class="container-fluid" style="margin-bottom: 20px; padding-right: 6%; padding-left: 6%">

		<form method="post" action="register"">

		<?php

include('errors.php');

?>

		<div class="row">

			<div style="margin-top:10px" class="col-lg-3"></div>

			<div style="margin-top:10px" class="col-lg-6">

				<!-- Personal Information -->

				<div>

					<div class="card">

						<div style="font-size: 16px" class="card-header">Register to Durjoy</div>

						<div style="font-size: 14px" class="card-body">

							<div class="form-group">

								<label for="name">Name:</label> <input style="font-size: 14px" type="text" class="form-control" id="name" placeholder="Enter name" name="name"

								 required />

							</div>



							<div class="form-group">

								<label for="email">Email:</label> <input style="font-size: 14px" type="email" class="form-control" id="email" placeholder="Enter email"

								 name="email" required />

							</div>



							<div class="form-group">

								<label for="username">Username:</label> <input style="font-size: 14px" type="text" minlength="5" maxlength="20" class="form-control" id="username" placeholder="Enter username (at least 5 characters)"

								 name="username" required />

							</div>





							<div class="form-group">

								<label for="password1">Password:</label> <input style="font-size: 14px" type="password" class="form-control" maxlength="32" minlength="5" value="" id="password1"

								 placeholder="Enter password (at least 5 characters)" name="password1" required />

							</div>





							<div class="form-group">

								<label for="password2">Repeat Password:</label> <input style="font-size: 14px" type="password" minlength="5" maxlength="32" class="form-control" value="" id="password2"

								 placeholder="Enter password again" name="password2" required />

							</div>



				<button type="submit" class="btn btn-primary btn-md" name="reg_user">Register</button>

				<a style="margin-left: 5px;" href="register" class="btn btn-dark btn-md" role="button">Reset</a>

						</div>



					</div>



				</div>

			</div>

			<div style="margin-top:10px" class="col-lg-3"></div>

			



	</div>

	

	</form>

	</div>

</body>

<hr><div class="container-fluid" style="font-size: 16px; font-family: UbuntuMono-R; padding-left: 6%; padding-right: 6%">

	<center style="font-family: UbuntuMono-R;">Durjoy Admission Aid<br>
	Developed by Emrul Chowdhury</center>
	</div>

</html>