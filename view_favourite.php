<?php

include('function.php');

include('databaseconn.php');

$query = "SELECT * FROM tbl_favourite WHERE username = '" . $_SESSION['username'] . "'";



$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) > 0) {

  echo "<tbody>";

  while($tbl = mysqli_fetch_assoc($result)) {

        $innerquery = "SELECT * FROM tbl_announcement WHERE id = '" . $tbl["announcement_id"] . "' and visiblity = 'true' ORDER BY exam_end";

        //echo $innerquery;

        $innerresult = mysqli_query($db, $innerquery);

        while($row = mysqli_fetch_assoc($innerresult)) {

          echo "<tr>";

          echo '<td>' . $row["name"] . ' ';

          echo "</td>";



          echo '<td>' . $row['unit'] . '</td>';

        echo "<td>" . get_date($row["application_start"]) . " to " . get_date($row["application_end"]) . ' ';

        if($row['application_end'] < date("Y-m-d")) {

          echo '<span style="float: left; padding: 5px; font-size: 13px; font-family: Ubuntu-B" class="badge badge-danger">Finished</span>';

        }

        else if($row['application_start'] > date("Y-m-d")) {

          echo '<span style="float: left; padding: 5px; font-size: 13px; font-family: Ubuntu-B" class="badge badge-primary">Upcoming</span>';

        }

        else {

          echo '<span style="float: left; padding: 5px; font-size: 13px; font-family: Ubuntu-B" class="badge badge-success">Running</span>';

        }

        echo "</td>";

        echo "<td>" . get_date($row["exam_start"]) . " to " . get_date($row["exam_end"]) . " ";

        if($row['exam_end'] < date("Y-m-d")) {

          echo '<span style="float: left; padding: 5px; font-size: 13px; font-family: Ubuntu-B" class="badge badge-danger">Finished</span>';

        }

        else if($row['exam_start'] > date("Y-m-d")) {

          echo '<span style="float: left; padding: 5px; font-size: 13px; font-family: Ubuntu-B" class="badge badge-primary">Upcoming</span>';

        }

        else {

          echo '<span style="float: left; padding: 5px; font-size: 13px; font-family: Ubuntu-B" class="badge badge-success">Running</span>';

        }

        echo "</td>";

          ?>

          <td align="center">

            <form action="announcement.php" style="float: left; padding: 2px; margin-right: 3px;" method="get">

              <input type="hidden" id="id" name="id" value="<?php echo $row["id"]; ?>">

              <button type="submit" class="btn btn-success btn-sm" style="width: 100px">



            <?php

              if(!isset($_SESSION['admin'])) echo "Details";

            ?>

              </button>

            </form>



            <?php if(!isset($_SESSION['admin']) && isset($_SESSION['username'])): ?>

              <form action="dashboard.php" style="float: left; padding: 2px; margin-right: 3px;" method="post">

                <input type="hidden" id="id" name="id" value="<?php echo $row["id"]; ?>">

                <?php

                  $qr = 'SELECT * FROM tbl_favourite WHERE username = ' ."'". $_SESSION["username"] . "'" . " and announcement_id = ". $row['id'];

                  $res = mysqli_query($db, $qr);

                  if(mysqli_num_rows($res) == 0) {

                    echo '<button type="submit" class="btn btn-primary btn-sm" name="add_to_favourite"><span class="glyphicon glyphicon-star" aria-hidden="true" title="Add to Favourite"></span> Add to Favourite';

                  }

                  else {

                    echo '<button style="width: 100px" type="submit" class="btn btn-dark btn-sm" name="remove_from_favourite">Remove';

                  }

                ?>

                </button>

              </form>

            <?php endif;?>

          </td>

          <?php

          echo "</tr>";

        }

  }

  echo "</tbody>";

}

?>