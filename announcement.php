<?php
include('server.php');

if (!isset($_GET['id'])) {
        echo '<script type="text/javascript">';
        echo 'window.location.href="403";';
        echo '</script>';
        die();
}
$id     = $_GET['id'];
$query  = "SELECT * FROM tbl_announcement WHERE id = '$id'";
$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) == 0) {
        echo '<script type="text/javascript">';
        echo 'window.location.href="404";';
        echo '</script>';
        die();
}
if (!isset($_SESSION['admin'])) {
        $query  = "SELECT * FROM tbl_announcement WHERE id = '$id' and visiblity = 'true'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) == 0) {
                echo '<script type="text/javascript">';
                echo 'window.location.href="403";';
                echo '</script>';
                die();
        }
}

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
                if (!isset($_SESSION['admin'])) {
                        if ($row["visiblity"] == 'false') {
                                echo '<script type="text/javascript">';
                                echo 'window.location.href="announcementList";';
                                echo '</script>';
                        }
                }
        }
} else {
        header('location: announcementList');
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
echo $name;
?> | Unit

    <?php
echo $unit;
?> | Durjoy</title>
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



<body style="margin-bottom: 30px">

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

        <li class="nav-item">

          <a class="nav-link" href="dashboard">Dashboard</a>

        </li>

      <?php
endif;
?>



      <li class="nav-item active">

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

          <a href="login?back=announcement?id=<?php
        echo ($_GET['id']);
?>" class="nav-link"><span class="fa fa-sign-in"></span> Login</a>

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

            <a class="dropdown-item" href="dashboard?logout=1&back=announcement?id=<?php
                echo ($_GET['id']);
?>">Logout</a>

          <?php
        endif;
?>

          <?php
        if (isset($_SESSION['admin'])):
?>

            <a class="dropdown-item" href="admin?logout=1&back=announcement?id=<?php
                echo ($_GET['id']);
?>">Logout</a>

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



  <div class="container-fluid" style="padding-right: 10%; padding-left: 10%">

    <div class="row">

      <div class="col-lg-12">

        <div style="margin-top: 25px;">

          <div>

            <img style="max-height: 75px; max-width: 75px; margin-right: 20px; float: left;" src="<?php
echo ($logo_link);
?>" style="float: left;" /><h3>Admission

            Circular of <?php
echo '<a style="text-decoration: none" href="university?id=' . $uni_id . '">' . $name . "</a> (Unit " . $unit . ")";
?></h3> 
          </div>

        </div>

      </div>

    </div>

  </div>





  <div class="container-fluid" style="margin-top:20px; padding-right: 10%; padding-left: 10%">

    <div class="row">

      <div class="col-lg-12">

            <div class="card">



              <div style="font-size: 16px" class="card-header bg-info text-white">Application Phase</div>

              <ul class="list-group list-group-flush">

                <li class="list-group-item">

                <b style="font-family: Ubuntu-B">Start from: </b>

                <?php
echo (get_date($application_start));
?></br></li>

<li class="list-group-item">

                <b style="font-family: Ubuntu-B">Deadline: </b>

                <?php
echo (get_date($application_end));
?></br></li>

</ul>

            </div>



            <div class="card" style="margin-top: 20px">

              <div style="font-size: 16px" class="card-header bg-info text-white">Exam Schedule</div>

              <ul class="list-group list-group-flush">

                <li class="list-group-item">

                <b style="font-family: Ubuntu-B">Start from: </b>

                <?php
echo (get_date($exam_start));
?></br></li>

                <li class="list-group-item">

                <b style="font-family: Ubuntu-B">End on: </b>

                <?php
echo (get_date($exam_end));
?></br></li>

</ul>

              </div>



            <div class="card" style="margin-top: 20px">



              <div style="font-size: 16px" class="card-header bg-info text-white">Group(s) Allowed</div>

                <ul class="list-group list-group-flush">

                  <?php
$inn_query  = "SELECT * FROM tbl_groups";
$inn_result = mysqli_query($db, $inn_query);
$inn_res    = mysqli_num_rows($inn_result);
if ($inn_res > 0) {
        while ($inn_row = mysqli_fetch_assoc($inn_result)) {
                if ($flag[$inn_row['id']] == 1) {
                        echo '<li class="list-group-item">' . $inn_row['name'] . "</li>";
                }
        }
}
?>

                <ul>

            </div>



            <?php
if (!isset($_SESSION['admin'])):
?>

            <div style="margin-top: 20px" class="card">



              <div style="font-size: 16px" class="card-header bg-info text-white">Eligiblity</div>

              <div style="font-size: 15px" class="card-body bg-white text-dark">

                <?php
        if (!isset($_SESSION['username'])) {
                echo 'Please <a href="login?back=announcement?id=' . $_GET['id'] . '">Login</a> or <a href="register">Register</a> to check eligiblity!';
        } else if ($_SESSION['details'] != 'updated') {
?>

Please update your <a href="profile">profile</a> to check eligiblity!

<?php
        } else if (!isset($_SESSION['admin'])) {
                $reason = array();
                if ($_SESSION['ssc_py'] < $ssc_min_year) {
                        array_push($reason, "SSC passing year must be equal or greater than to " . $ssc_min_year);
                }
                if ($_SESSION['hsc_py'] < $hsc_min_year) {
                        array_push($reason, "HSC passing year must be equal or greater than to " . $hsc_min_year);
                }
                $ssc_group  = $_SESSION['ssc_group'];
                $hsc_group  = $_SESSION['hsc_group'];
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



            <div style="margin-top: 20px" class="card ">



              <div style="font-size: 16px" class="card-header bg-info text-white">Source</div>

              <div style="font-size: 15px" class="card-body bg-white text-dark">

                <span style="margin-right: 10px" class="fa fa-share-alt"></span><a target="_blank" style="font-size: 18px" href="<?php
echo ($circular);
?>">Click Here</a>

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

  <div class="container-fluid" style="margin-top: 20px; padding-right: 10%; padding-left: 10%">

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
                echo '<button style="width: 100%; font-size: 16px;" type="submit" class="btn btn-primary btn-sm" name="add_to_favourite"><span class="fa fa-star" aria-hidden="true" title="Add to Favourite"></span> Add to Favourite';
        } else {
                echo '<button style="width: 100%; font-size: 16px;" type="submit" class="btn btn-dark btn-sm" name="remove_from_favourite"><span class="fa fa-times-circle" aria-hidden="true" title="Remove from Favourite"></span> Remove from Favourite';
        }
?>

          </button>

        </form>

      </div>

      <div class="col-lg-4 col-sm-12 col-md-12">

        <button style="width: 100%; font-size: 16px;" class="btn btn-success btn-sm"><span class="fa fa-heart"></span>

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

           class="fa fa-globe"></span> Visit University Website</a>

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


<hr>


<div class="container-fluid" style="font-size: 16px; font-family: UbuntuMono-R; padding-left: 6%; padding-right: 6%">

  <center style="font-family: UbuntuMono-R;">Durjoy Admission Aid<br>
  Developed by Emrul Chowdhury</center>
  </div>
</html>


<!-- Footer -->



</html>