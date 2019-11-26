<?php
require('../function.php');
include('../databaseconn.php');
$id    = $_GET['id'];
$query = "SELECT * FROM tbl_omt WHERE id = '$id' ORDER BY date_time ASC";
if (!isset($_SESSION['admin'])) {
        $query = "SELECT * FROM tbl_omt WHERE published = '1' and id = '$id' ORDER BY date_time ASC";
}
$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0) {
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . date("M/d/Y", strtotime($row['date_time'])) . '<br>' . date("H:i", strtotime($row['date_time'])) . '<sup>UTC+6</sup></td>';
                echo '<td>' . $row['duration'] . " Minutes</td>";
                echo '<td align="center">';
                if (isset($_SESSION['username'])) {
                        $Q = "SELECT * FROM tbl_registration WHERE user = '" . $_SESSION['username'] . "' and   mocktest_id = '" . $row['id'] . "'";
                        $R = mysqli_query($db, $Q);
                        if (mysqli_num_rows($R) > 0) {
                                if (time() < strtotime($row['date_time'])) {
?>
                <button type="submit" class="btn btn-info btn-md" disabled>Registered</button>
                <?php
                                } else {
?>
                <form action="../omt" method="get">
                  <input type="hidden" name="arena">
                  <input type="hidden" name="id" value="<?php
                                        echo ($row['id']);
?>">
                  <button type="submit" class="btn btn-primary btn-md">Enter</button>
                </form>
                <?php
                                }
                        } else {
?>
          <form action="../omt" method="get">
            <input type="hidden" name="register">
            <input type="hidden" name="id" value="<?php
                                echo ($row['id']);
?>">
            <button type="submit" class="btn btn-info btn-md">Register</button>
          </form>
          <?php
                        }
                } else {
                        if (time() > strtotime($row['date_time']) + $row['duration'] * 60) {
?>
                      <a role="button" href="?arena=&id=<?php
                                echo ($row['id']);
?>" style="margin-bottom: 10px;" class="btn btn-primary btn-md">Enter</a>
                      <?php
                        } else {
?>

          <form action="../omt" method="get">
            <input type="hidden" name="register">
            <input type="hidden" name="id" value="<?php
                                echo ($row['id']);
?>">
            <button type="submit" class="btn btn-info btn-md">Register</button>
          </form>
          <?php
                        }
                }
                echo '</td><td align="center">';
                if (time() > strtotime($row['date_time']) + $row['duration'] * 60) {
?>
                      <a role="button" href="?standings=&id=<?php
                        echo ($row['id']);
?>" style="margin-bottom: 10px;" class="btn btn-dark btn-md">Standings</a>
                      <?php
                } else if (time() >= strtotime($row['date_time']) && time() <= strtotime($row['date_time']) + $row['duration'] * 60)
                        echo '<div class="alert alert-success" style="padding: 7px; font-size: 15px" id="timer"></div>';
                else
                        echo '<div class="alert alert-info" style="padding: 7px; font-size: 15px" id="timerupcoming"></div>';
                echo "</td></tr>";
?>
<script>
var countDownDate = new Date("<?php
                echo (date("M d, Y H:i:s", (strtotime($row['date_time']) + $row['duration'] * 60)));
?>").getTime();

var x = setInterval(function() {

  var now = new Date().getTime();

  var distance = countDownDate - now;

  var distance = new Date("<?php
                echo (date("M d, Y H:i:s", (strtotime($row['date_time']) + $row['duration'] * 60)));
?>").getTime() - new Date().getTime();


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
</script>

<script>
var countDownDate = new Date("<?php
                echo (date("M d, Y H:i:s", strtotime($row['date_time'])));
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
        }
        echo "</tbody>";
}
?>