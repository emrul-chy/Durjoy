<?php
if (isset($_GET['standings'])) {
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
                if(!isset($_SESSION['username'])) {
                  echo '<script type="text/javascript">';
echo 'window.location.href="/public_html/403";';
echo '</script>';
                  die();
                }
                include('validator.php');
        }
        else if ($published == 0) {
                if(!isset($_SESSION['username'])) {
                  echo '<script type="text/javascript">';
echo 'window.location.href="/public_html/403";';
echo '</script>';
                  die();
                }
                include('validator.php');
        }
?>
    <title><?php
        echo $name;
?> Standings | Durjoy</title>
    <h4><?php
        echo $name;
?> Standings </h4>
    <?php
        if (time() > strtotime($date_time) + $duration * 60)
                echo '<p style="font-size: 18px">Finished</p>';
        else if (time() >= strtotime($date_time) && time() <= strtotime($date_time) + $duration * 60)
                echo '<p style="font-size: 18px" id="timer"></p>';
        else
                echo '<p style="font-size: 18px" id="timerupcoming"></p>';
?>
    <table style="width: 100%; font-size: 15px" id="participants" class="table table-bordered table-striped table-hover table-responsive">
      <thead>

        <tr>

          <th style="text-align: center; font-family: Ubuntu-B;">#</th>
          <th style="text-align: center; font-family: Ubuntu-B; width: 100%">Username</th>
          <th style="text-align: center; font-family: Ubuntu-B; min-width: 80px">Score</th>
          <th style="text-align: center; font-family: Ubuntu-B; min-width: 120px">Correct Answer</th>
          <th style="text-align: center; font-family: Ubuntu-B; min-width: 120px">Wrong Answer</th>
          <th style="text-align: center; font-family: Ubuntu-B; min-width: 120px">Submission Time</th>
          
        </tr>
        <?php
        include('view_standings.php');
?>


      </thead>


    
    </table>
    
  </div>


  <hr><div class="container-fluid" style="font-size: 16px; font-family: UbuntuMono-R; padding-left: 6%; padding-right: 6%">

  <center style="font-family: UbuntuMono-R;">Durjoy Admission Aid<br>
  Developed by Emrul Chowdhury</center>
  </div>

  <script>
    $(document).ready(function () {

    $('#participants').DataTable({



    "order": [],

    responsive: true,
    "pageLength": 50

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

  var hours = Math.floor((distance) / (1000 * 60 * 60));
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

  var hours = Math.floor((distance) / (1000 * 60 * 60));
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



  <?php
        die();
}
?>