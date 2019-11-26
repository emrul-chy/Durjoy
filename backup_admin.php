<?php include('adminserver.php') ?>

<?php
  session_start(); 

  if (!isset($_SESSION['admin'])) {
    if(!isset($_SESSION['username'])) {
      header('location: login.php');
    }
    else {
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="assests/css/navbar.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>


<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a style="font-size: 32px; color: #333366" class="navbar-brand" href="admin.php"><b>Durjoy</b></a>
    </div>
    <div style="font-size: 17px" class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li class="active"><a href="admin.php">Admin Panel</a></li>

        <li><a href="profile.php">My Profile</a></li>
        <li><a href="announcement.php">Announcement</a></li>
        <li><a href="info.php">Universities of Bangladesh</a></li>

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
        <?php  if (isset($_SESSION['username'])): ?>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['name'];?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li style="font-size: 18px"><a href="dashboard.php?logout='1'"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
          </li>
        </ul>
        <?php  endif ?>
        <?php  if (!isset($_SESSION['username'])): ?>
          <li><a href="register.php"><span class="glyphicon glyphicon-log-in"></span> Register</a>
            </li>
          <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
          </li>
        </ul>
        <?php  endif ?>
    </div>
  </div>
</nav>

  
<div class="container-fluid" style="margin-top:70px">
    <div class="row">
      <div class="col-lg-6">

        <button type="button" class="btn btn-primary btn-block btn-lg" data-toggle="collapse" data-target="#info"><span class="glyphicon glyphicon-plus-sign"></span>
              Create an university info</button>
            <div id="info" class="collapse in">
              <?php 
                  if(isset($_POST['add_university'])) {
                      include('success.php');
                      include('errors.php');
                  }
              ?>
              <form method = "post" action="admin.php" style="margin-top: 3%; margin-bottom: 3%" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name">Name:</label> <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required/>
                </div>

                <div class="form-group">
                  <label for="type">Type:</label>
                  <select class="form-control" id="type" name="type">
                    <option value="" selected="" required="">Select One</option>
                    <?php
                      $type = array("Public", "Private");
                      for($i = 0; $i < count($type); $i++) {
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
                      $division = array("Barisal division", "Chittagong division", "Dhaka division", "Khulna division", "Mymensingh division", "Rajshahi division", "Rangpur division", "Sylhet division");
                      for($i = 0; $i < count($division); $i++) {
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
                      $specialization = array("Agricultural Science", "Engineering", "General", "General & Technological", "Maritime", "Medical", "Science & Technology", "Science, Technology and Engineering", "Textile Engineering", "Veterinary Science");
                      for($i = 0; $i < count($specialization); $i++) {
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
                      $phd_granting = array("Yes", "No");
                      for($i = 0; $i < count($phd_granting); $i++) {
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

      <div class="col-lg-6">

        <button type="button" class="btn btn-primary btn-block btn-lg" data-toggle="collapse" data-target="#announcement"><span class="glyphicon glyphicon-plus-sign"></span>
              Create an announcement</button>
            <div id="announcement" class="collapse in">

              <?php 
                  if(isset($_POST['add_announcement'])) {
                      include('success.php');
                      include('errors.php');
                  }
              ?>
              <form method = "post" action="admin.php" style="margin-top: 3%; margin-bottom: 3%" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name">Name:</label>
                  <select class="form-control" id="name" name="name" required="">
                    <option value="" selected="">Select One</option>
                    <?php
                      $name = array();
                      $query = "SELECT * FROM tbl_university";
                      $result = mysqli_query($db, $query);
                      if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                          array_push($name, $row['name']);
                        }
                      }
                      for($i = 0; $i < count($name); $i++) {
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
    </div>
</div>

</body>
<!-- Footer -->

<!-- Footer -->
</html>