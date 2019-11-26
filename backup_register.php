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
  <a style="font-size: 24px; font-family: Ubuntu-B" class="navbar-brand" href="index">Durjoy</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index">Home <span class="sr-only">(current)</span></a>
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
		<div class=" row">
			<div style="margin-top:10px" class="col-lg-4">
				<!-- Personal Information -->
				<div>
					<div class="card">
						<div style="font-size: 16px" class="card-header">Personal Information:</div>
						<div style="font-size: 14px" class="card-body">
							<div class="form-group">
								<label for="name">Name:</label> <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"
								 required />
							</div>

							<div class="form-group">
								<label for="email">Email:</label> <input type="email" class="form-control" id="email" placeholder="Enter email"
								 name="email" required />
							</div>

							<div class="form-group">
								<label for="username">Username:</label> <input type="text" class="form-control" id="username" placeholder="Enter username (at least 5 characters)"
								 name="username" required />
							</div>


							<div class="form-group">
								<label for="password1">Password:</label> <input type="password" class="form-control" value="" id="password1"
								 placeholder="Enter password (at least 5 characters)" name="password1" required />
							</div>


							<div class="form-group">
								<label for="password2">Repeat Password:</label> <input type="password" class="form-control" value="" id="password2"
								 placeholder="Enter password again" name="password2" required />
							</div>
						</div>
					</div>
				</div>
			</div>

			<div style="margin-top:10px" class="col-lg-4">

				<!-- SSC Information -->

				<div>
					<div class="card">
						<div style="font-size: 16px" class="card-header">SSC Information:</div>
						<div style="font-size: 14px" class="card-body">
							<div class="form-group">
								<label for="ssc_py">Passing Year:</label>
								<select class="form-control" id="ssc_py" name="ssc_py" required="">
									<option value="" selected="">Select One</option>
									<?php
for ($i = $ssc_max; $i >= $ssc_min; $i--) {
    echo "<option value=" . $i . ">" . $i . "</option>";
}
?>
								</select>
							</div>

							<div class="form-group">
								<label for="ssc_board">Board:</label>
								<select class="form-control" id="ssc_board" name="ssc_board" required="">
									<option value="" selected="">Select One</option>
									<?php
for ($i = 0; $i < count($boards); $i++) {
    echo '<option value="' . $boards[$i] . '"';
    echo ">" . $boards[$i] . "</option>\n";
}
?>
								</select>
							</div>

							<div class="form-group">
								<label for="ssc_group">Group:</label>
								<select class="form-control" id="ssc_group" name="ssc_group" required="">
									<option value="" selected="">Select One</option>
									<?php
for ($i = 0; $i < count($groups); $i++) {
    echo '<option value="' . $groups[$i] . '"';
    echo ">" . $groups[$i] . "</option>\n";
}
?>
								</select>
							</div>

							<div class="form-group">
								<label for="ssc_gpa">GPA:</label> <input type="number" step="any" class="form-control" id="ssc_gpa" placeholder="Enter GPA"
								 name="ssc_gpa" min="0" max="5" required />
							</div>

							<div class="form-group">
								<label for="ssc_marks">Total Marks</label> <input type="number" class="form-control" id="ssc_marks" placeholder="Enter total marks"
								 name="ssc_marks" min="0" max="1100" required />
							</div>




						</div>
					</div>
				</div>


			</div>
			<div style="margin-top:10px" class="col-lg-4">
				<div>
					<div class="card">
						<div style="font-size: 16px" class="card-header">HSC Information:</div>
						<div style="font-size: 14px" class="card-body">
							<div class="form-group">
								<label for="hsc_py">Passing Year:</label>
								<select class="form-control" id="hsc_py" name="hsc_py" required="">
									<option value="" selected="">Select One</option>
									<?php
for ($i = $hsc_max; $i >= $hsc_min; $i--) {
    echo "<option value=" . $i . ">" . $i . "</option>";
}
?>
								</select>
							</div>

							<div class="form-group">
								<label for="hsc_board">Board:</label>
								<select class="form-control" id="hsc_board" name="hsc_board" required="">
									<option value="" selected="">Select One</option>
									<?php
for ($i = 0; $i < count($boards); $i++) {
    echo '<option value="' . $boards[$i] . '"';
    echo ">" . $boards[$i] . "</option>\n";
}
?>
								</select>
							</div>

							<div class="form-group">
								<label for="hsc_group">Group:</label>
								<select class="form-control" id="hsc_group" name="hsc_group" required="">
									<option value="" selected="">Select One</option>
									<?php
for ($i = 0; $i < count($groups); $i++) {
    echo '<option value="' . $groups[$i] . '"';
    echo ">" . $groups[$i] . "</option>\n";
}
?>
								</select>
							</div>

							<div class="form-group">
								<label for="hsc_gpa">GPA:</label> <input type="number" step="any" class="form-control" id="hsc_gpa" placeholder="Enter GPA"
								 name="hsc_gpa" min="0" max="5" required />
							</div>

							<div class="form-group">
								<label for="hsc_marks">Total Marks:</label> <input type="number" class="form-control" id="hsc_marks"
								 placeholder="Enter total marks" name="hsc_marks" min="0" max="1100" required />
							</div>


						</div>
					</div>
				</div>
				<button style="margin-top: 20px; " type="submit" class="btn btn-primary btn-md" name="reg_user">Register</button>
	<a style="margin-top: 20px; margin-left: 5px;" href="register" class="btn btn-dark btn-md" role="button">Reset</a>
			</div>


	</div>
	</form>
	</div>
</body>

</html>