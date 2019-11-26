<?php

include('server.php');



if (!isset($_SESSION['username'])) {

    header('location: login.php');

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

	<title>

		<?php

echo $_SESSION['name'];

?> | Durjoy</title>

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

<style>
* {
	font-size: 14px;
}
.nav-link {
	font-size: 16px;
}
</style>


<nav class="navbar navbar-expand-lg navbar-light bg-light" style="font-size: 18px; margin-bottom: 20px; padding-left: 6%; padding-right: 6%">

  <a class="navbar-brand" href="../public_html/" style=" font-size: 24px; font-family: 'Hind Siliguri', sans-serif;">দুর্জয়</a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">

    <span class="navbar-toggler-icon"></span>

  </button>

  <div class="collapse navbar-collapse" id="navbarNavDropdown">

    <ul style="font-size: 16px" class="navbar-nav">

      <li class="nav-item">

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

					<a href="login" class="nav-link"><span class="fa fa-sign-in"></span> Login</a>

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

          	<a class="dropdown-item" href="dashboard?logout=1">Logout</a>

          <?php

    endif;

?>

          <?php

    if (isset($_SESSION['admin'])):

?>

          	<a class="dropdown-item" href="admin?logout=1">Logout</a>

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


<body style="padding-bottom: 30px">

	<div class="container-fluid" style="padding-left: 6%; padding-right: 6%">

		<form method="post" action="profile">

			<div class="row">

				<?php

if (isset($_SESSION['admin'])):

?>

					<div class="col-lg-4">

				<?php

endif;

?>

				<?php

if (!isset($_SESSION['admin'])):

?>

					<div class="col-lg-12">

				<?php

endif;

?>

				

				</div>

			</div>



			<?php

include('errors.php');

?>

				<?php

include('success.php');

?>



<?php

if (!isset($_SESSION['admin']) && $_SESSION['details'] != 'updated'):

?>

				<div style="margin-bottom: 10px">

		<div class="alert alert-warning" role="alert">

										<span class="fa fa-info"></span><?php

    echo ' Profile incomplete!';

?>

</div>

<?php

endif;

?>

			

			<div class="row">

				<div style="margin-top: 10px" class="col-lg-4">

					<!-- Personal Information -->

					<div>

						<div class="card">

							<div class="card-header">Personal Information</div>

							<div class="card-body" style="font-size: 14px">

								<div class="form-group">

									<label for="name">Name</label> <input style="font-size: 14px" type="text" class="form-control" id="name" placeholder="Enter name"

									 name="name" value=<?php

echo '"' . $_SESSION['name'] . '"';

?>/>

								</div>



								<div class="form-group">

									<label for="email">Email</label> <input style="font-size: 14px" type="email" class="form-control" id="email" name="email" value=<?php

echo '"' . $_SESSION['email'] . '"';

?> readonly/>

								</div>



								<div class="form-group">

									<label for="username">Username</label> <input style="font-size: 14px" type="text" class="form-control" id="username" placeholder="Enter username"

									 name="username" value=<?php

echo '"' . $_SESSION['username'] . '"';

?>

									readonly/>

								</div>





								<div class="form-group">

									<label for="password1">Password</label> <input style="font-size: 14px" type="password" class="form-control" id="password1"

									 placeholder="Leave blank if you don't want to change it" value="" name="password1" />

								</div>





								<div class="form-group">

									<label for="password2">Repeat Password</label> <input style="font-size: 14px" type="password" class="form-control" id="password2"

									 placeholder="Leave blank if you don't want to change it" value="" name="password2" />

								</div>

							</div>

						</div>

					</div>

				</div>



				<div style="margin-top: 10px" class="col-lg-4">



					<!-- SSC Information -->

					<?php

if (!isset($_SESSION['admin'])):

?>



					<div>

						<div class="card">

							<div class="card-header">SSC Information</div>

							<div class="card-body" style="font-size: 14px">

								<div class="form-group">

									<label for="ssc_py">Passing Year</label>



									<select style="font-size: 14px" class="form-control" id="ssc_py" name="ssc_py">

										<option style="font-size: 14px" value="0" selected="">Select One</option>

										<?php

    for ($i = $ssc_max; $i >= $ssc_min; $i--) {

        echo '<option value="' . $i . '"';

        if ($i == $_SESSION['ssc_py'])

            echo 'selected=""';

        echo ">" . $i . "</option>\n";

    }

?>

									</select>

								</div>



								<div class="form-group">

									<label for="ssc_board">Board</label>

									<select style="font-size: 14px" class="form-control" id="ssc_board" name="ssc_board">



										<option style="font-size: 14px" value="" selected="">Select One</option>



										<?php

    for ($i = 0; $i < count($boards); $i++) {

        echo '<option value="' . $boards[$i] . '"';

        if ($boards[$i] == $_SESSION['ssc_board'])

            echo 'selected=""';

        echo ">" . $boards[$i] . "</option>\n";

    }

?>

									</select>

								</div>



								<div class="form-group">

									<label for="ssc_group">Group</label>

									<select class="form-control" id="ssc_group" name="ssc_group">



										<option value="" selected="">Select One</option>



										<?php

    for ($i = 0; $i < count($groups); $i++) {

        echo '<option value="' . $groups[$i] . '"';

        if ($groups[$i] == $_SESSION['ssc_group'])

            echo 'selected=""';

        echo ">" . $groups[$i] . "</option>\n";

    }

?>



									</select>

								</div>



								<div class="form-group">

									<label for="ssc_gpa">GPA</label> <input style="font-size: 14px" type="number" step="any" class="form-control" id="ssc_gpa"

									 placeholder="Enter GPA in SSC" name="ssc_gpa" <?php

    

    if ($_SESSION['ssc_gpa'] != 0)

        echo 'value="' . $_SESSION['ssc_gpa'] . '"';

  //  else

   //     echo 'value="0"';

    

?>/>

								</div>



								<div class="form-group">

									<label for="ssc_marks">Total Marks</label> <input style="font-size: 14px" type="number" class="form-control" placeholder="Enter Total marks in SSC" id="ssc_marks" name="ssc_marks"

									 <?php

    

    if ($_SESSION['ssc_marks'] != 0)

        echo 'value="' . $_SESSION['ssc_marks'] . '"';

   // else

  //      echo 'value="0"';

    

?>/>

								</div>











							</div>

						</div>

					</div>





					<?php

endif;

?>

				</div>





				<?php

if (!isset($_SESSION['admin'])):

?>

				<!-- HSC Information -->

				<div style="margin-top: 10px" class="col-lg-4">

					<div>

						<div class="card">

							<div class="card-header">HSC Information</div>

							<div class="card-body" style="font-size: 14px">

								<div class="form-group">

									<label for="hsc_py">Passing Year</label>

									<select class="form-control" id="hsc_py" name="hsc_py">



										<option value="0" selected="">Select One</option>



										<?php

    for ($i = $hsc_max; $i >= $hsc_min; $i--) {

        echo '<option value="' . $i . '"';

        if ($i == $_SESSION['hsc_py'])

            echo 'selected=""';

        echo ">" . $i . "</option>\n";

    }

?>

									</select>

								</div>



								<div class="form-group">

									<label for="hsc_board">Board</label>

									<select class="form-control" id="hsc_board" name="hsc_board">



										<option value="" selected="">Select One</option>



										<?php

    for ($i = 0; $i < count($boards); $i++) {

        echo '<option value="' . $boards[$i] . '"';

        if ($boards[$i] == $_SESSION['hsc_board'])

            echo 'selected=""';

        echo ">" . $boards[$i] . "</option>\n";

    }

?>





									</select>

								</div>



								<div class="form-group">

									<label for="hsc_group">Group</label>

									<select class="form-control" id="hsc_group" name="hsc_group">



										<option value="" selected="">Select One</option>



										<?php

    for ($i = 0; $i < count($groups); $i++) {

        echo '<option value="' . $groups[$i] . '"';

        if ($groups[$i] == $_SESSION['hsc_group'])

            echo 'selected=""';

        echo ">" . $groups[$i] . "</option>\n";

    }

?>



									</select>

								</div>



								<div class="form-group">

									<label for="hsc_gpa">GPA</label> <input style="font-size: 14px" type="number" step="any" class="form-control" id="hsc_gpa"

									 placeholder="Enter GPA in HSC" name="hsc_gpa" <?php

    

    if ($_SESSION['hsc_gpa'] != 0)

        echo 'value="' . $_SESSION['hsc_gpa'] . '"';

   // else

   //     echo 'value="0"';

    

?>/>

								</div>



								<div class="form-group">

									<label for="hsc_marks">Total Marks</label> <input style="font-size: 14px" type="number" class="form-control" placeholder="Enter Total marks in HSC" id="hsc_marks" name="hsc_marks"

									 <?php

    

    if ($_SESSION['hsc_marks'] != 0)

        echo 'value="' . $_SESSION['hsc_marks'] . '"';

  //  else

   //     echo 'value="0"';

    

?>/>

								</div>







							</div>

						</div>

					</div>

				</div>





				<?php

endif;

?>

			</div>

			<button style="margin-top: 10px; margin-bottom: 10px" type="submit" class="btn btn-primary btn-md" name="update_user">Update</button>

			<a style="margin-top: 10px; margin-left: 5px; margin-bottom: 10px" href="profile" class="btn btn-dark btn-md" role="button">Reset</a>

		</form>

	</div>
</div>
</form>
</div>
</body>


<hr><div class="container-fluid" style="font-size: 16px; font-family: UbuntuMono-R; padding-left: 6%; padding-right: 6%">

	<center style="font-family: UbuntuMono-R;">Durjoy Admission Aid<br>
	Developed by Emrul Chowdhury</center>
	</div>

</html>


<!-- </div>



  <div class="container" style="margin: 50px">

    <div class="row">



      <div class="col-lg-3">

      	

      </div>





      <div class="col-lg-6">

        <form action="/action_page" style="margin: 50px">



        	<div class="form-group">

            <label for="name">Name</label> <input style="font-size: 14px" type="text" class="form-control" id="name" placeholder="Enter name" name="name" />

          </div>



          <div class="form-group">

            <label for="email">Email</label> <input style="font-size: 14px" type="email" class="form-control" id="email" placeholder="Enter email" name="email" />

          </div>



          <div class="form-group">

            <label for="username">Username</label> <input style="font-size: 14px" type="text" class="form-control" id="username" placeholder="Enter username" name="username" />

          </div>





          <div class="form-group">

            <label for="pwd">Password</label> <input style="font-size: 14px" type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" />

          </div>





          <div class="form-group">

            <label for="pwd">Reapeat Password</label> <input style="font-size: 14px" type="password" class="form-control" id="pwd" placeholder="Enter password again" name="pwd" />

          </div>



          

          <button type="submit" class="btn btn-primary">Submit</button>

        </form>

      </div>





      <div class="col-lg-3">

      	

      </div>





    </div>

  </div>

</body>

</html> -->