<?php
if (isset($_GET['arena'])) {
?>

  
  <div class="container-fluid">
    <?php
        include('../success.php');
        include('../errors.php');
        include('get_mocktest_info.php');
        $query = "SELECT * FROM tbl_omt WHERE id = '" . $_GET['id'] . "'";
        $res   = mysqli_query($db, $query);
        if (mysqli_num_rows($res) == 0) {
                echo '<script type="text/javascript">';
echo 'window.location.href="/public_html/403";';
echo '</script>';
                die();
        }
        if (time() < strtotime($date_time)) {
                if (!isset($_SESSION['username'])) {
                        echo '<script type="text/javascript">';
echo 'window.location.href="/public_html/403";';
echo '</script>';
                        die();
                }
                include('validator.php');
        } else if (time() <= strtotime($date_time) + $duration * 60) {
                if (!isset($_SESSION['username'])) {
                        echo '<script type="text/javascript">';
echo 'window.location.href="/public_html/403";';
echo '</script>';
                        die();
                }
                if ($published == 0) {
                        include('validator.php');
                        if (mysqli_num_rows($res) == 0) {
                                echo '<script type="text/javascript">';
echo 'window.location.href="/public_html/403";';
echo '</script>';
                                die();
                        }
                }
                include('validator_running.php');
        } else if ($published == 0) {
                include('validator.php');
                if (mysqli_num_rows($res) == 0) {
                        echo '<script type="text/javascript">';
echo 'window.location.href="/public_html/403";';
echo '</script>';
                        die();
                }
        }
?>

<title><?php
                echo $name;
?> | Durjoy</title>

    <h4><?php
                echo $name;
?></h4>

    <?php
        if (time() > strtotime($date_time) + $duration * 60) {
?>
    
    
    <?php
                if (time() > strtotime($date_time) + $duration * 60)
                        echo '<p style="font-size: 18px">Finished</p>';
?>

    <table style="width: 100%; font-size: 14px" id="questions" class="table table-bordered table-striped table-hover table-responsive">
      <thead>

        <tr>

          <th></th>

          <th style="font-family: Ubuntu-B; width: 100%">Question</th>

          <th style="font-family: Ubuntu-B; min-width: 100px">Option #A</th>

          <th style="font-family: Ubuntu-B; min-width: 100px">Option #B</th>

          <th style="font-family: Ubuntu-B; min-width: 100px">Option #C</th>

          <th style="font-family: Ubuntu-B; min-width: 100px">Option #D</th>

        </tr>



      </thead>




      <?php
                include('view_questions_arena.php');
?>
    </table>
  
<div style="margin-bottom: 30px"></div>  


    <?php
        }
?>
    <?php
        if (time() <= strtotime($date_time) + $duration * 60) {
?>

    <?php
                if (time() >= strtotime($date_time) && time() <= strtotime($date_time) + $duration * 60)
                        echo '<p style="font-size: 18px" id="timer"></p>';
                else
                        echo '<p style="font-size: 18px" id="timerupcoming"></p>';
?>

    <form action="" method="post">
      <table style="width: 100%; font-size: 14px;" id="questions" class="table table-striped table-hover table-responsive">
        <thead>

        <tr>
        <th style="min-width: 80px"></th>
        <th style="font-family: Ubuntu-B; width: 100%">Description</th>
      </tr>
    </thead>
      <?php
                include('validator_running.php');
                include('view_questions_running.php');
                include('submission_validator.php');
?>
    </table>
    <div style="margin-bottom: 30px"></div>
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-12">
        <button type="submit" name="submission" style="width: 100%; margin-bottom: 10px;" class="btn btn-primary btn-lg" <?php
                if ($f == 0 || time() < strtotime($date_time) || mysqli_num_rows($res) > 0)
                        echo "disabled";
?>>Submit Your Answers</button>
      </div>
      
    </form>
      <?php
        } else {
                echo '<div class="row">';
        }
?>

      <div class="col-lg-4 col-md-6 col-sm-12">
        <a role="button" href="?standings=&id=<?php
        echo ($_GET['id']);
?>" style="width: 100%; margin-bottom: 10px;" class="btn btn-dark btn-lg">Standings</a>
      </div>
    </div>
    </div>
  <hr>

  <div class="container-fluid" style="font-size: 16px; font-family: UbuntuMono-R; padding-left: 6%; padding-right: 6%">

  <center style="font-family: UbuntuMono-R;">Durjoy Admission Aid<br>
  Developed by Emrul Chowdhury</center>
  </div>

  <script>
    $(document).ready(function () {

    $('#questions').DataTable({



    "order": [],

    responsive: true

    });

  });
  </script>

  <script>
var countDownDate = new Date("<?php
        echo (date("M d, Y H:i:s", strtotime($date_time) + $duration * 60));
?>").getTime();

var x = setInterval(function() {

  var now = new Date().getTime();

  var distance = new Date("<?php
        echo (date("M d, Y H:i:s", strtotime($date_time) + $duration * 60));
?>").getTime() - now;

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  document.getElementById("timer").innerHTML = "Running · " + hours + ":"
  + minutes + ":" + seconds;

  if (distance < 0) {
    clearInterval(x);
    document.getElementById("timer").innerHTML = "Finished";
  }
}, 1000);
</script>

  <script>
var countDownDate = new Date("<?php
        echo (date("M d, Y H:i:s", strtotime($date_time)));
?>").getTime();

var x = setInterval(function() {

  var now = new Date().getTime();

  var distance = countDownDate - now;

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  document.getElementById("timerupcoming").innerHTML = "Starts in · " + hours + ":"
  + minutes + ":" + seconds;

  if (distance < 0) {
    clearInterval(x);
    document.getElementById("timerupcoming").innerHTML = "Started";
  }
}, 1000);
</script>

 <!--  <script>
    $(document).ready(function () {

    $('#authors').DataTable({



    "order": [],

    responsive: true

    });

  });
  </script> -->



  <?php
        die();
}
?>