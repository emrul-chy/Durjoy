<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php
include('adminserver.php');
?>

<?php
session_start();

if (!isset($_SESSION['admin'])) {
    if (!isset($_SESSION['username'])) {
        header('location: login.php');
    } else {
        header('location: dashboard.php');
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
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
    unset($_SESSION['admin']);
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    * {
      font-family: Ubuntu;
    }
  </style>
  <title>Admin Panel | Durjoy</title>
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

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
/* Fixed sidenav, full height */
.sidenav {
    height: 100%;
    width: 200px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #2c3e50;
    overflow-x: hidden;
    font-family: Ubuntu;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    color: #bdc3c7;
    display: block;
    border: none;
    background: none;
    width: 100%;
    text-align: left;
    cursor: pointer;
    outline: none;
    font-size: 17px;
    font-family: Ubuntu;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
    color: #FFFFFF;
    font-style: bold;
    font-size: 18px;
    background-color: #e74c3c;
}

/* Main content */
.main {
    margin-left: 200px; /* Same as the width of the sidenav */
    padding: 0px 10px;
}

/* Add an active class to the active dropdown button */
.active {
    background-color: #e74c3c;
    color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
    display: none;
    background-color: #1a2530;
    padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
    float: right;
    padding-right: 8px;
}

/* Some media queries for responsiveness */
@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div class="sidenav">
  <div style="padding-left: 15px; padding-top: 15px; padding-bottom: 12px; background-color: #1e2b38; font-size: 20px; color: #FFFFFF"><span style="margin-right: 10px" class="glyphicon glyphicon-dashboard"></span>Admin Panel</div>
  <a data-toggle="collapse" data-parent="#accordion" href="#viewannouncement"><span style="margin-right: 10px" class="
glyphicon glyphicon-bullhorn"></span>Announcements</a>
  <a data-toggle="collapse" data-parent="#accordion" href="#viewuniversity"><span style="margin-right: 10px" class="glyphicon glyphicon-education"></span>University Information</a>
  <button class="dropdown-btn"><span style="margin-right: 10px" class="glyphicon glyphicon-plus-sign"></span>Create 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Announcements</a>
  <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">University Information</a>
  </div>

  <a data-toggle="collapse" data-parent="#accordion" href="#viewuser"><span style="margin-right: 10px" class="
glyphicon glyphicon-user"></span>Users</a>
<a data-toggle="collapse" data-parent="#accordion" href="#viewadmin"><span style="margin-right: 10px" class="
glyphicon glyphicon-king"></span>Admins</a>
  <a href="index.php"><span style="margin-right: 10px" class="
glyphicon glyphicon-home"></span>Home</a>
  
</div>

<div align="right" style="z-index: 1;
    top: 0;
    left: 200px;
    padding-right: 215px;
    padding-left: 15px;
    padding-top: 15px;
    padding-bottom: 15px;
    position: fixed;
    overflow-x: hidden;
    font-size: 18px; color: #FFFFFF; width: 100%; height: 55px; background-color: #1e2b38"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['name']; ?> 
    <a style="text-decoration: none; color: #FFFFFF;" href="#contact"><span style="margin-left: 10px; margin-right: 10px" class="glyphicon glyphicon-log-out"></span>Logout</a>
</div>


<div class="main">
  <div class="container-fluid" style="margin-top: 70px">
    <div class="row">
      <div class="col-lg-3">
        <div class="panel-groupr">
          <div class="panel panel-default" >
            <div style="font-size: 20px; font-style: bold; color: #ffffff; background-color: #89d172;" class="panel-heading">
              Users
            </div>
            <div style="font-size:42px; text-align: right; color: #ffffff; background-color: #7ccc63;" class="panel-body" >
                 <span class="
glyphicon glyphicon-user"></span> <?php include('count_user.php') ?>
            </div>
            <div style="color: #ffffff; background-color: #6fb759;" class="panel-footer" >
              <a style="text-decoration: none; color: #ffffff" data-toggle="collapse" data-parent="#accordion" href="#viewuser">View Detail <span style="float: right;" class="
glyphicon glyphicon-circle-arrow-right"></span></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="panel-groupr">
          <div class="panel panel-default" >
            <div style="font-size: 20px; font-style: bold; color: #ffffff; background-color: #f4a529;" class="panel-heading">
              Admin
            </div>
            <div style="font-size:42px; text-align: right; color: #ffffff; background-color: #f39c12;" class="panel-body" >
                 <span class="
glyphicon glyphicon-king"></span> <?php include('count_admin.php') ?>
            </div>
            <div style="color: #ffffff; background-color: #da8c10;" class="panel-footer" >
              <a style="text-decoration: none; color: #ffffff" data-toggle="collapse" data-parent="#accordion" href="#viewadmin">View Detail <span style="float: right;" class="
glyphicon glyphicon-circle-arrow-right"></span></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="panel-groupr">
          <div class="panel panel-default" >
            <div style="font-size: 20px; font-style: bold; color: #ffffff; background-color: #e95d4f;" class="panel-heading">
              Announcement
            </div>
            <div style="font-size:42px; text-align: right; color: #ffffff; background-color: #e74c3c;" class="panel-body" >
             <span class="glyphicon glyphicon-bullhorn"></span> <?php include('count_announcement.php');?>
            </div>
            <div style="color: #ffffff; background-color: #cf4436;" class="panel-footer" >
              <a style="text-decoration: none; color: #ffffff" data-toggle="collapse" data-parent="#accordion" href="#viewannouncement">View Detail <span style="float: right;" class="
glyphicon glyphicon-circle-arrow-right"></span></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="panel-groupr">
          <div class="panel panel-default" >
            <div style="font-size: 20px; font-style: bold; color: #ffffff; background-color: #415161;" class="panel-heading">
              University Info
            </div>
            <div style="font-size:42px; text-align: right; color: #ffffff; background-color: #2c3e50;" class="panel-body" >
             <span class="glyphicon glyphicon-education"></span> <?php include('count_university.php') ?>
            </div>
            <div style="color: #ffffff; background-color: #273748;" class="panel-footer" >
              <a style="text-decoration: none; color: #ffffff" data-toggle="collapse" data-parent="#accordion" href="#viewuniversity">View Detail <span style="float: right;" class="
glyphicon glyphicon-circle-arrow-right"></span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php
    include('success.php');
    include('errors.php');
  ?>
  <div class="panel-group" id="accordion" style="margin-top: 10px">
  <div class="panel panel-default">
    <div id="collapse1" class="panel-collapse collapse">
      <div class="panel-body">
              <h3>Create an Announcement</h3>
              <form method = "post" action="" style="margin-bottom: 3%" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name">Name:</label>
                  <select class="form-control" id="name" name="name" required="">
                    <option value="" selected="">Select One</option>
                    <?php
$name   = array();
$query  = "SELECT * FROM tbl_university";
$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($name, $row['name']);
    }
}
for ($i = 0; $i < count($name); $i++) {
    echo '<option value="' . $name[$i] . '"';
    echo ">" . $name[$i] . "</option>\n";
}
?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="unit">Unit:</label> <input type="text" class="form-control" id="unit" placeholder="Enter unit" name="unit" required/>
                </div>

                <div class="form-group">
                  <label for="allowed_groups">Allowed Groups:</label><br>
                  <input type="checkbox" name="is_science" value=""> Science<br>
                  <input type="checkbox" name="is_arts" value=""> Arts<br>
                  <input type="checkbox" name="is_commerce" value=""> Commerce<br>
                </div>

                <div class="form-group">
                  <label for="application_start">Application Start:</label>
                  <input type="date" class="form-control" id="application_start" placeholder="Enter date of application start" name="application_start" required/>
                </div>

                <div class="form-group">
                  <label for="application_end">Application End:</label>
                  <input type="date" class="form-control" id="application_end" placeholder="Enter date of application end" name="application_end" required/>
                </div>

                <div class="form-group">
                  <label for="exam_start">Exam Start:</label>
                  <input type="date" class="form-control" id="exam_start" placeholder="Enter date of exam start" name="exam_start" required/>
                </div>

                <div class="form-group">
                  <label for="exam_end">Exam End:</label>
                  <input type="date" class="form-control" id="exam_end" placeholder="Enter date of exam end" name="exam_end" required/>
                </div>

                <div class="form-group">
                  <label for="science_ssc_gpa">Required Minimum GPA in SSC (Science Group):</label> <input type="number" step="any" class="form-control" id="science_ssc_gpa" min="-1" max="5" value="-1" name="science_ssc_gpa"/>
                </div>

                <div class="form-group">
                  <label for="arts_ssc_gpa">Required Minimum GPA in SSC (Arts Group):</label> <input type="number" step="any" class="form-control" id="arts_ssc_gpa" min="-1" max="5" value="-1" name="arts_ssc_gpa"/>
                </div>

                <div class="form-group">
                  <label for="commerce_ssc_gpa">Required Minimum GPA in SSC (Commerce Group):</label> <input type="number" step="any" class="form-control" id="commerce_ssc_gpa" min="-1" max="5" value="-1"name="commerce_ssc_gpa"/>
                </div>

                <div class="form-group">
                  <label for="science_hsc_gpa">Required Minimum GPA in HSC (Science Group):</label> <input type="number" step="any" class="form-control" id="science_hsc_gpa" min="-1" max="5" value="-1" name="science_hsc_gpa"/>
                </div>

                <div class="form-group">
                  <label for="arts_hsc_gpa">Required Minimum GPA in HSC (Arts Group):</label> <input type="number" step="any" class="form-control" id="arts_hsc_gpa" min="-1" max="5" value="-1" name="arts_hsc_gpa"/>
                </div>

                <div class="form-group">
                  <label for="commerce_hsc_gpa">Required Minimum GPA in HSC (Commerce Group):</label> <input type="number" step="any" class="form-control" id="commerce_hsc_gpa" min="-1" max="5" value="-1" name="commerce_hsc_gpa"/>
                </div>

                <div class="form-group">
                  <label for="ssc_min_year">Required Minimum SSC Passing Year:</label> <input type="number" class="form-control" id="ssc_min_year" name="ssc_min_year" placeholder="Enter required SSC passing year" min="2015" max="2018" required/>
                </div>

                <div class="form-group">
                  <label for="hsc_min_year">Required Minimum HSC Passing Year:</label> <input type="number" class="form-control" id="hsc_min_year" name="hsc_min_year" placeholder="Enter required HSC passing year" min="2015" max="2018" required/>
                </div>

                <div class="form-group">
                  <label for="circular">Circular:</label> <input type="file" class="form-control" id="circular" name="circular" required/>
                </div>

                <button type="submit" class="btn btn-success btn-md" name="add_announcement">Create</button>
                <button style="margin-left: 5px" type="submit" class="btn btn-danger btn-md" name="">Reset</button>
              </form>

      </div>
    </div>
    <div id="viewuser" class="panel-collapse collapse">
      <div class="panel-body">
        <h3>Users <span style="font-size: 20px" class="badge"> <?php include('count_user.php') ?></span></h3>
        <table id ="user" class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Registration Time</th>
                <th>Action</th>
              </tr>
            </thead>

            <?php include('view_user.php'); ?>
          </table>
      </div>
    </div>
    <div id="viewadmin" class="panel-collapse collapse">
      <div class="panel-body">
        <h3>Admin <span style="font-size: 20px" class="badge"> <?php include('count_admin.php') ?></span></h3>
        <table id ="admin" class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Registration Time</th>
                <th>Action</th>
              </tr>
            </thead>

            <?php include('view_admin.php'); ?>
          </table>
      </div>
    </div>
    <div id="viewannouncement" class="panel-collapse collapse">
      <div class="panel-body">
        <h3>Announcement <span style="font-size: 20px" class="badge"> <?php include('count_announcement.php') ?></span></h3>
        <table id ="announcement" class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th>University Name</th>
                <th>Unit</th>
                <th>Application Schedule</th>
                <th>Admission Test Schedule</th>
                <?php if(isset($_SESSION['admin'])) { ?>
                  <th>Action</th>
                <?php }
                 else { ?>
                  <th>Details</th>
                <?php } ?>
              </tr>
            </thead>
            <?php include('view_announcement.php'); ?>
          </table>

      </div>
    </div>
    <div id="viewuniversity" class="panel-collapse collapse">
      <div class="panel-body">
        <h3>Universities of Bangladesh <span style="font-size: 20px" class="badge"> <?php include('count_university.php') ?></span></h3>
          <table id ="university" class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <?php if(!isset($_SESSION['admin'])): ?>
                  <th>Logo</th>
                <?php endif; ?>
                <th>Name</th>
                <th>Type</th>
                <th>Estd.</th>
                <th>Location</th>
                <th>Specialization</th>
                <th>Action</th>
              </tr>
            </thead>
            <?php include('view_university.php'); ?>
          </table>
      </div>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">
       <h3>Create an University Information</h3>
              <form method = "post" action="" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name">Name:</label> <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required/>
                </div>

                <div class="form-group">
                  <label for="type">Type:</label>
                  <select class="form-control" id="type" name="type">
                    <option value="" selected="" required="">Select One</option>
                    <?php
$type = array(
    "Public",
    "Private"
);
for ($i = 0; $i < count($type); $i++) {
    echo '<option value="' . $type[$i] . '"';
    echo ">" . $type[$i] . "</option>\n";
}
?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="acronym">Acronym:</label> <input type="text" class="form-control" id="acronym" placeholder="Enter acronym" name="acronym" required=""/>
                </div>

                <div class="form-group">
                  <label for="established">Established:</label> <input type="number" class="form-control" id="established" placeholder="Enter establishment year" name="established" max="2018" min="1500" required=""/>
                </div>

                <div class="form-group">
                  <label for="location">Location:</label> <input type="text" class="form-control" id="location" placeholder="Enter location" name="location" required/>
                </div>

                <div class="form-group">
                  <label for="division">Division:</label>
                  <select class="form-control" id="division" name="division" required="">
                    <option value="" selected="">Select One</option>
                    <?php
$division = array(
    "Barisal division",
    "Chittagong division",
    "Dhaka division",
    "Khulna division",
    "Mymensingh division",
    "Rajshahi division",
    "Rangpur division",
    "Sylhet division"
);
for ($i = 0; $i < count($division); $i++) {
    echo '<option value="' . $division[$i] . '"';
    echo ">" . $division[$i] . "</option>\n";
}
?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="specialization">Specialization:</label>
                  <select class="form-control" id="specialization" name="specialization">
                    <option value="" selected="" required="">Select One</option>
                    <?php
$specialization = array(
    "Agricultural Science",
    "Engineering",
    "General",
    "General & Technological",
    "Maritime",
    "Medical",
    "Science & Technology",
    "Science, Technology and Engineering",
    "Textile Engineering",
    "Veterinary Science"
);
for ($i = 0; $i < count($specialization); $i++) {
    echo '<option value="' . $specialization[$i] . '"';
    echo ">" . $specialization[$i] . "</option>\n";
}
?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="phd_granting">PhD Granting:</label>
                  <select class="form-control" id="phd_granting" name="phd_granting">
                    <option value="" selected="" required="">Select One</option>
                    <?php
$phd_granting = array(
    "Yes",
    "No"
);
for ($i = 0; $i < count($phd_granting); $i++) {
    echo '<option value="' . $phd_granting[$i] . '"';
    echo ">" . $phd_granting[$i] . "</option>\n";
}
?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="map_link">Map Embeded HTML Code:</label> <input type="text" class="form-control" id="map_link" placeholder="Enter map embeded HTML code" name="map_link" required/>
                </div>

                <div class="form-group">
                  <label for="logo">Logo:</label> <input type="file" class="form-control" id="logo" name="logo" required/>
                </div>

                <div class="form-group">
                  <label for="web_link">Web Link:</label> <input type="text" class="form-control" id="web_link" placeholder="Enter web link" name="web_link" required/>
                </div>

                <button type="submit" class="btn btn-success btn-md" name="add_university">Create</button>
                <button style="margin-left: 5px" type="submit" class="btn btn-danger btn-md" name="">Reset</button>
            </form>
        </div>
    </div>
</div>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>

<script>  
 $(document).ready(function(){  
      $('#university').DataTable();  
 });  
</script> 

<script>  
 $(document).ready(function(){  
      $('#announcement').DataTable();  
 });  
</script> 

<script>  
 $(document).ready(function(){  
      $('#user').DataTable();  
 });  
</script> 

<script>  
 $(document).ready(function(){  
      $('#admin').DataTable();  
 });  
</script> 

</body>
</html> 
