<?php

require('../function.php');



include('../databaseconn.php');

$query = "SELECT * FROM tbl_omt ORDER BY date_time ASC";

if(!isset($_SESSION['admin'])) {

  $query = "SELECT * FROM tbl_omt WHERE published = '1' ORDER BY date_time ASC";

}

$result = mysqli_query($db, $query);


if (mysqli_num_rows($result) > 0) {

  

  echo "<tbody>";

  while($row = mysqli_fetch_assoc($result)) {
        if(strtotime($row['date_time']) + 60 * $row['duration'] < time()) continue;

        echo "<tr>";

        echo '<td>'.$row['name'].'</td>';
        echo '<td>'.date("M/d/Y", strtotime($row['date_time'])).'<br>' . date("H:i", strtotime($row['date_time'])) . '<sup>UTC+6</sup></td>';
        echo '<td>'.$row['duration'] . " Minutes</td>";
          echo '<td align="center">';
          if(isset($_SESSION['username'])) {
            $Q = "SELECT * FROM tbl_registration WHERE user = '" . $_SESSION['username'] . "' and   mocktest_id = '" . $row['id'] . "'";
            $R = mysqli_query($db, $Q);

            if (mysqli_num_rows($R) > 0) {
              if(time() < strtotime($row['date_time'])) {
                ?>
                <button type="submit" class="btn btn-info btn-md" disabled>Registered</button>
                <?php
              }
              else {
                ?>
                <form action="../omt" method="get">
                  <input type="hidden" name="arena">
                  <input type="hidden" name="id" value="<?php echo($row['id']) ?>">
                  <button type="submit" class="btn btn-primary btn-md">Enter</button>
                </form>
                <?php
              }
            }
            else {
              ?>
          <form action="../omt" method="get">
            <input type="hidden" name="register">
            <input type="hidden" name="id" value="<?php echo($row['id']) ?>">
            <button type="submit" class="btn btn-info btn-md">Register</button>
          </form>
          <?php
            }
          }
          else {
          ?>
          <form action="../omt" method="get">
            <input type="hidden" name="register">
            <input type="hidden" name="id" value="<?php echo($row['id']) ?>">
            <button type="submit" class="btn btn-info btn-md">Register</button>
          </form>
          <?php
          echo "</td>";
        }

        echo '<td align="center">';

        if (time() > strtotime($row['date_time']) + $row['duration'] * 60)
                        echo '<p style="font-size: 15px">Finished</p>';
                else if (time() >= strtotime($row['date_time']) && time() <= strtotime($row['date_time']) + $row['duration'] * 60)
                        echo '<p class="alert alert-success" style="padding: 7px; font-size: 15px" id="timer' . $row['id'] . '"></p>';
                else
                        echo '<p class="alert alert-info" style="padding: 7px; font-size: 15px" id="timerupcoming' . $row['id'] . '"></p>';
                echo "</td>";

        ?>


  <?php if(isset($_SESSION['admin'])): ?>
    <?php 
      $query = "SELECT * FROM tbl_authors WHERE mocktest_id = '" . $row['id'] . "' and user = '" . $_SESSION['username'] . "'";
      $res = mysqli_query($db, $query);
        if(mysqli_num_rows($res) == 0) {
          echo "<td></td>";
          continue;
        }
    ?>

    <td>

  <?php endif; ?>





  <?php if(isset($_SESSION['admin'])): ?>

  <form style="float: left; padding:3px;" action="" method="post">

    <?php if($row["published"] == '1') {

                              echo '<button style="font-size: 14px" type="button" class="btn btn-dark btn-md" data-toggle="modal" data-target="#vis' . $row["id"] . '"><span class="fa fa-eye-slash" title="Set Invisible"></button>';

                            } 

                            else { 

                              echo '<button style="font-size: 14px" type="button" class="btn btn-dark btn-md" data-toggle="modal" data-target="#vis' . $row["id"] . '"><span class="fa fa-eye" title="Set Visible"></button>';

            } ?>





    <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">



    <div class="modal fade" id="vis<?php echo($row['id'])?>" role="dialog">

      <div class="modal-dialog">



        <!-- Modal content-->

        <div class="modal-content">

          <div class="modal-header">

            <h6 class="modal-title">Confirm Action</h6>

            <button style="font-size: 14px" type="button" class="close" data-dismiss="modal" aria-label="Close">

              <span aria-hidden="true">&times;</span>

          </div>

          <div class="modal-body">

            <?php if($row["published"] == '1') {

                        echo '<p>Are you sure you want to invisible <b>' . $row["name"] . '' . '</b>?</p>';

                      }

                      else {

                        echo '<p>Are you sure you want to visible <b>' . $row["name"] . '' . '</b>?</p>';

                      }?>



          </div>

          <div class="modal-footer">

            <?php if($row["published"] == '1') {

                              echo '<button style="font-size: 14px" type="submit" class="btn btn-primary btn-md" name="set_invisible_mocktest">Yes</button>';

                            } 

                            else { 

                              echo '<button style="font-size: 14px" type="submit" class="btn btn-primary btn-md" name="set_visible_mocktest">Yes</button>';

                      } ?>

            <button style="font-size: 14px" type="button" class="btn btn-dark btn-md" data-dismiss="modal">No</button>

          </div>

        </div>



      </div>

    </div>

  </form>

  <?php endif?>







  <?php if(isset($_SESSION['admin'])):?>

  <form class="" style="float: left; padding: 3px" method="get" action="../omt/" enctype="multipart/form-data">

    <input type="hidden" id="edit" name="edit">
    <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">





    <button type="submit" style="font-size: 14px" type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#a_upd<?php echo($row['id'])?>"><span

        class="fa fa-edit" title="Update"></span></button>

  </form>





  <?php endif?>







  <?php if(isset($_SESSION['admin'])):?>

  <form action="" style="float: left; padding: 3px" method="post">

    <button style="font-size: 14px" type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#a_del<?php echo($row['id'])?>"><span

        class="fa fa-trash" title="Delete"></button>





    <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">



    <div class="modal fade" id="a_del<?php echo($row['id'])?>" role="dialog">

      <div class="modal-dialog">



        <!-- Modal content-->

        <div class="modal-content">

          <div class="modal-header">

            <h6 class="modal-title">Confirm Delete</h6>

            <button style="font-size: 14px" type="button" class="close" data-dismiss="modal" aria-label="Close">

              <span aria-hidden="true">&times;</span>

          </div>

          <div class="modal-body">

            <p>Are you sure you want to delete  <b>

                <?php echo($row["name"]) ?></b>?</p>

          </div>

          <div class="modal-footer">

            <button style="font-size: 14px" type="submit" class="btn btn-primary btn-md" name="delete_mocktest">Yes</button>

            <button style="font-size: 14px" type="button" class="btn btn-dark" data-dismiss="modal">No</button>

          </div>

        </div>



      </div>

    </div>

  </form>

  </td>

  <?php endif?>


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

  document.getElementById("timer<?php echo($row['id']) ?>").innerHTML = "Running · " + hours + ":"
  + minutes + ":" + seconds;

  if (distance < 0) {
    clearInterval(x);
    document.getElementById("timer<?php echo($row['id']) ?>").innerHTML = "Finished";
  }
}, 1000);
</script>

<script>
var countDownDate = new Date("<?php
        echo (date("M d, Y H:i:s", strtotime($row['date_time'])));
?>").getTime();

var x = setInterval(function() {

  var now = new Date().getTime();

  var distance = countDownDate - now;

  var distance = new Date("<?php
        echo (date("M d, Y H:i:s", (strtotime($row['date_time']))));
?>").getTime() - new Date().getTime();

  var hours = Math.floor((distance) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  document.getElementById("timerupcoming<?php echo($row['id']) ?>").innerHTML = "Starts in · " + hours + ":"
  + minutes + ":" + seconds;

  if (distance < 0) {
    clearInterval(x);
    document.getElementById("timerupcoming<?php echo($row['id']) ?>").innerHTML = "Started";
  }
}, 1000);
</script>


<?php

        echo "</tr>";

  }

  echo "</tbody>";

}

?>