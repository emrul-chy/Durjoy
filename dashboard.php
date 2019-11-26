<?php

ob_start();

include('server.php');

include('databaseconn.php');

?>



<?php

if (isset($_GET['logout'])) {

    session_destroy();

    $msg   = $_SESSION['username'] . " logged out";

    $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

    mysqli_query($db, $query);

    

    unset($_SESSION['name']);

    unset($_SESSION['msg']);

    unset($_SESSION['email']);

    unset($_SESSION['username']);

    unset($_SESSION['password']);

    unset($_SESSION['ssc_py']);

    unset($_SESSION['ssc_board']);

    unset($_SESSION['ssc_group']);

    unset($_SESSION['ssc_roll']);

    unset($_SESSION['ssc_reg']);

    unset($_SESSION['hsc_py']);

    unset($_SESSION['hsc_board']);

    unset($_SESSION['hsc_group']);

    unset($_SESSION['hsc_roll']);

    unset($_SESSION['hsc_reg']);

    if (isset($_GET['back'])) {

        echo '<script type="text/javascript">';

        echo 'window.location.href="' . $_GET['back'] . '";';

        echo '</script>';

    } else {

        echo '<script type="text/javascript">';

        echo 'window.location.href="login";';

        echo '</script>';

    }

    /*$past = time() - 3600;

    foreach ( $_COOKIE as $key => $value )

    {

    setcookie( $key, $value, $past, '/' );

    }*/

}

if (isset($_SESSION['admin'])) {

    echo '<script type="text/javascript">';

    echo 'window.location.href="admin";';

    echo '</script>';

}



if (!isset($_SESSION['username'])) {

    $_SESSION['msg'] = "You must log in first";

    echo '<script type="text/javascript">';

    echo 'window.location.href="login";';

    echo '</script>';

}





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

  </style>

  <title>Dashboard | Durjoy</title>

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



<body style="padding-bottom: 30px">

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 20px; padding-left: 6%; padding-right: 6%">

  <a class="navbar-brand" href="../public_html/" style=" font-size: 24px; font-family: 'Hind Siliguri', sans-serif;">দুর্জয়</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">

    <span class="navbar-toggler-icon"></span>

  </button>

  <div class="collapse navbar-collapse" id="navbarNavDropdown">

    <ul class="navbar-nav">

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

        <li class="nav-item active">

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





  <?php

include('adminserver.php');

?>



  <div class="container-fluid">



    <?php

if (isset($_SESSION['msg'])) {

    array_push($success, "Added to favourite!");

}

include('success.php');

?>

    <?php

include('errors.php');

?>

    <h4>Favourite Announcements <span style="font-size: 20px" class="badge badge-secondary">

        <?php

include('count_favourite.php');

?></span></h4>



    <table style="font-size: 14px" id="announcement" class="table table-bordered  table-hover table-striped table-responsive">

      <thead>

        <tr>

          <th style="font-family: Ubuntu-B;width: 100%">University Name</th>

          <th>Unit</th>

          <th style="font-family: Ubuntu-B;width: 240px; max-width: 240px; min-width: 240px">Application Pharse Schedule</th>

          <th style="font-family: Ubuntu-B;width: 240px; max-width: 240px; min-width: 240px">Admission Test Schedule</th>

          <?php

if (!isset($_SESSION['admin']) && isset($_SESSION['username'])):

?>

          <th style="font-family: Ubuntu-B;max-width: 210px; width: 210px; min-width: 210px">Action</th>

        <?php

endif;

?>

          <?php

if (isset($_SESSION['admin'])):

?>

          <th style="font-family: Ubuntu-B;width: 165px; min-width: 165px">Action</th>

        <?php

endif;

?>

        <?php

if (!isset($_SESSION['username'])):

?>

          <th style="font-family: Ubuntu-B;width: 60px; min-width: 60px">Action</th>

        <?php

endif;

?>

        </tr>

      </thead>

      <?php

include('view_favourite.php');

?>

    </table>



  </div>



</body>

<!-- Footer -->


<hr>


<div class="container-fluid" style="font-size: 16px; font-family: UbuntuMono-R; padding-left: 6%; padding-right: 6%">

  <center style="font-family: UbuntuMono-R;">Durjoy Admission Aid<br>
  Developed by Emrul Chowdhury</center>
  </div>
</html>

<!-- Footer -->



</html>



<script>

  $(document).ready(function () {

    $('#announcement').DataTable({



    "order": []

    });

  });

</script>