<?php

require('function.php');



include('databaseconn.php');

if(!isset($_SESSION['admin'])) {

  $par_query = "SELECT * FROM tbl_announcement WHERE visiblity = 'true' and name='$name' ORDER BY exam_start ASC";

}

else {

  $par_query = "SELECT * FROM tbl_announcement WHERE name='$name' ORDER BY exam_start ASC";

}



$par_result = mysqli_query($db, $par_query);

if (mysqli_num_rows($par_result) > 0) {

  echo "<tbody>";

  while($par_row = mysqli_fetch_assoc($par_result)) {

        echo "<tr>";

        echo '<td ><a  role="button" class="btn btn-primary" style="height:100%; width: 100%; white-space:normal; font-size: 15px;  padding:10px;font-family: Ubuntu-B; text-decoration: none; " href="announcement?id=' . $par_row['id'] . '">Unit '. $par_row['unit'] . '</a>';



        if(isset($_SESSION['username'])) {



          $par_qr = 'SELECT * FROM tbl_announcement_seen WHERE username = ' ."'". $_SESSION["username"] . "'" . " and announcement_id = ". $par_row['id'];

          $par_res = mysqli_query($db, $par_qr);

          //echo $par_qr;

          if(mysqli_num_rows($par_res) == 0) {

            echo '<span class="badge badge-default">New</span>';

            $par_qr = "INSERT INTO tbl_announcement_seen (username, announcement_id) VALUES('". $_SESSION['username'] . "', " . $par_row['id'] .")";

          // echo $par_qr;

            $par_res = mysqli_query($db, $par_qr);

          }

        }

        echo "</td>";

        echo "<td>From " . get_date($par_row["application_start"]) . "<br>to " . get_date($par_row["application_end"]) . '<br>';

        if($par_row['application_end'] < date("Y-m-d")) {

          echo '<span style="float: left; padding: 5px; font-size: 13px; font-family: Ubuntu-B" class="badge badge-danger">Finished</span>';

        }

        else if($par_row['application_start'] > date("Y-m-d")) {

          echo '<span style="float: left; padding: 5px; font-size: 13px; font-family: Ubuntu-B" class="badge badge-primary">Upcoming</span>';

        }

        else {

          echo '<span style="float: left; padding: 5px; font-size: 13px; font-family: Ubuntu-B" class="badge badge-success">Running</span>';

        }

        echo "</td>";

        echo "<td>From " . get_date($par_row["exam_start"]) . "<br>to " . get_date($par_row["exam_end"]) . "<br> ";

        if($par_row['exam_end'] < date("Y-m-d")) {

          echo '<span style="float: left; padding: 5px; font-size: 13px; font-family: Ubuntu-B" class="badge badge-danger">Finished</span>';

        }

        else if($par_row['exam_start'] > date("Y-m-d")) {

          echo '<span style="float: left; padding: 5px; font-size: 13px; font-family: Ubuntu-B" class="badge badge-primary">Upcoming</span>';

        }

        else {

          echo '<span style="float: left; padding: 5px; font-size: 13px; font-family: Ubuntu-B" class="badge badge-success">Running</span>';

        }


        echo "</td>";

        ?>



  <?php if(isset($_SESSION['admin'])): ?>

    <td>

  <?php endif; ?>





  <?php if(isset($_SESSION['admin'])): ?>

  <form style="float: left; padding:3px;" action="" method="post">

    <?php if($par_row["visiblity"] == 'true') {

                              echo '<button style="font-size: 14px" type="button" class="btn btn-dark btn-md" data-toggle="modal" data-target="#vis' . $par_row["id"] . '"><span class="fa fa-eye-slash" title="Set Invisible"></button>';

                            } 

                            else { 

                              echo '<button style="font-size: 14px" type="button" class="btn btn-dark btn-md" data-toggle="modal" data-target="#vis' . $par_row["id"] . '"><span class="fa fa-eye" title="Set Visible"></button>';

            } ?>





    <input type="hidden" id="id" name="id" value="<?php echo $par_row['id']; ?>">



    <div class="modal fade" id="vis<?php echo($par_row['id'])?>" role="dialog">

      <div class="modal-dialog">



        <!-- Modal content-->

        <div class="modal-content">

          <div class="modal-header">

            <h6 class="modal-title">Confirm Action</h6>

            <button style="font-size: 14px" type="button" class="close" data-dismiss="modal" aria-label="Close">

              <span aria-hidden="true">&times;</span>

          </div>

          <div class="modal-body">

            <?php if($par_row["visiblity"] == 'true') {

                        echo '<p>Are you sure you want to invisible announcement of <b>' . $par_row["name"] . ' Unit ' . $par_row["unit"] . '</b>?</p>';

                      }

                      else {

                        echo '<p>Are you sure you want to visible announcement of <b>' . $par_row["name"] . ' Unit ' . $par_row["unit"] . '</b>?</p>';

                      }?>



          </div>

          <div class="modal-footer">

            <?php if($par_row["visiblity"] == 'true') {

                              echo '<button style="font-size: 14px" type="submit" class="btn btn-primary btn-md" name="set_invisible_announcement">Yes</button>';

                            } 

                            else { 

                              echo '<button style="font-size: 14px" type="submit" class="btn btn-primary btn-md" name="set_visible_announcement">Yes</button>';

                      } ?>

            <button style="font-size: 14px" type="button" class="btn btn-dark btn-md" data-dismiss="modal">No</button>

          </div>

        </div>



      </div>

    </div>

  </form>

  <?php endif?>







  <?php if(isset($_SESSION['admin'])):?>

  <form class="" style="float: left; padding: 3px" method="post" action="" enctype="multipart/form-data">

    <input type="hidden" id="id" name="id" value="<?php echo $par_row['id']; ?>">





    <button style="font-size: 14px" type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#a_upd<?php echo($par_row['id'])?>"><span

        class="fa fa-edit" title="Update"></span></button>

    <?php

                    include('get_announcement_by_uni.php');

              ?>



    <div class="modal fade" id="a_upd<?php echo($par_row['id'])?>" role="dialog">

      <div class="modal-dialog">







        <!-- Modal content-->

        <div class="modal-content">

          <div class="modal-header">

            <h6 class="modal-title">Update Announcement of

              <?php

                  echo $name . " Unit: " . $unit;?>

            </h6>

            <button style="font-size: 14px" type="button" class="close" data-dismiss="modal" aria-label="Close">

              <span aria-hidden="true">&times;</span>

          </div>

          <div class="modal-body">



            <div class="container-fluid">

              <div class="row">

                <div class="col-lg-12">

                  <div>

                    <label for="name">Name:</label> <input type="text" class="form-control" id="name" placeholder="Enter name"

                      name="name" style="width: 100%" value="<?php echo($name);?>" readonly />

                  </div>



                  <div style="margin-top: 15px">

                    <label for="unit">Unit:</label> <input type="text" class="form-control" id="unit" placeholder="Enter unit"

                      style="width: 100%" name="unit" value="<?php echo($unit);?>" required />

                  </div>



                  <div style="margin-top: 15px">

                    <label for="allowed_groups">Allowed Groups:</label><br>

                    <?php

                    $inn_query  = "SELECT * FROM tbl_groups ORDER BY name ASC";

                    $inn_result = mysqli_query($db, $inn_query);

                    $inn_res    = mysqli_num_rows($inn_result);

                    if ($inn_res > 0) {

                      while ($inn_row = mysqli_fetch_assoc($inn_result)) {

                        echo '<div data-toggle="collapse" href="#' . $par_row['id'] . 'updannouncement' . $inn_row['id'] . '">';

                        echo '<input style="float: left; margin-right: 5px;" type="checkbox" name="is_' . $inn_row['id'] . '" value=""';

                        if($flag[$inn_row['id']] == 1) {

                          echo "checked";

                        }

                        echo '> </div>' . $inn_row['name'] . '<br>';

                       // echo '</div>';

                        echo '<div id="' . $par_row['id'] . 'updannouncement'. $inn_row['id'] . '" class="collapse ';

                        if($flag[$inn_row['id']] == 1) {

                          echo "show";

                        }

                        echo '">'; 

                        echo '

                        <hr><div class="form-group" style="margin-top: 15px">

                  <label for="' . strtolower($inn_row['id']) . '_ssc_gpa">Required Minimum GPA in SSC (' . $inn_row['name'] . ' Group):</label> <input type="number" step="any"

                   class="form-control" style="width: 100%" name="' . strtolower($inn_row['id']) . '_ssc_gpa" min="1" max="5" value="' . $ssc_gpa[$inn_row['id']] . '" id="' . strtolower($inn_row['id']) . '_ssc_gpa" />

                </div>

                        ';

                        echo '

                        <div class="form-group" style="margin-top: 15px">

                  <label for="' . strtolower($inn_row['id']) . '_hsc_gpa">Required Minimum GPA in HSC (' . $inn_row['name'] . ' Group):</label> <input type="number" step="any"

                   class="form-control" style="width: 100%" name="' . strtolower($inn_row['id']) . '_hsc_gpa" min="1" max="5" value="' . $hsc_gpa[$inn_row['id']] . '" id="' . strtolower($inn_row['id']) . '_ssc_gpa" />

                <hr></div></div>

                        ';

                      }

                    }  

                  ?>

                  </div>



                  <div style="margin-top: 15px">

                    <label for="application_start">Application Start:</label>

                    <input type="date" style="width: 100%" class="form-control" name="application_start" id="application_start"

                      value="<?php echo($application_start);?>" required />

                  </div>



                  <div style="margin-top: 15px">

                    <label for="application_end">Application End:</label>

                    <input type="date" style="width: 100%" class="form-control" name="application_end" id="application_end"

                      value="<?php echo($application_end);?>" required />

                  </div>



                  <div style="margin-top: 15px">

                    <label for="exam_start">Exam Start:</label>

                    <input type="date" style="width: 100%" class="form-control" name="exam_start" id="exam_start" value="<?php echo($exam_start);?>"

                      required />

                  </div>



                  <div style="margin-top: 15px">

                    <label for="exam_end">Exam End:</label>

                    <input type="date" style="width: 100%" class="form-control" name="exam_end" id="exam_end" name="exam_end"

                      value="<?php echo($exam_end);?>" required />

                  </div>





                  <div style="margin-top: 15px">

                    <label for="ssc_min_year">Required Minimum SSC Year:</label> <input type="number" step="any" style="width: 100%"

                      class="form-control" id="ssc_min_year" name="ssc_min_year" value="<?php echo($ssc_min_year);?>"

                      required />

                  </div>



                  <div style="margin-top: 15px">

                    <label for="hsc_min_year">Required Minimum HSC Year:</label> <input type="number" step="any" class="form-control"

                      style="width: 100%" id="hsc_min_year" name="hsc_min_year" value="<?php echo($hsc_min_year);?>"

                      required />

                  </div>



                  <div style="margin-top: 15px">

                    <label for="circular">Circular:</label> <input type="text" class="form-control" style="width: 100%"

                      id="circular" name="circular" value="<?php echo($circular)?>" required />

                  </div>

                </div>

              </div>

            </div>

          </div>

          <div class="modal-footer">

            <button style="font-size: 14px" type="submit" class="btn btn-primary btn-md" name="update_fi_announcement">Update</button>

            <button style="font-size: 14px" type="button" class="btn btn-dark btn-md" data-dismiss="modal">Cancel</button>

          </div>

        </div>

      </div>

    </div>

  </form>





  <?php endif?>







  <?php if(isset($_SESSION['admin'])):?>

  <form action="" style="float: left; padding: 3px" method="post">

    <button style="font-size: 14px" type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#a_del<?php echo($par_row['id'])?>"><span

        class="fa fa-trash" title="Delete"></button>





    <input type="hidden" id="id" name="id" value="<?php echo $par_row['id']; ?>">



    <div class="modal fade" id="a_del<?php echo($par_row['id'])?>" role="dialog">

      <div class="modal-dialog">



        <!-- Modal content-->

        <div class="modal-content">

          <div class="modal-header">

            <h6 class="modal-title">Confirm Delete</h6>

            <button style="font-size: 14px" type="button" class="close" data-dismiss="modal" aria-label="Close">

              <span aria-hidden="true">&times;</span>

          </div>

          <div class="modal-body">

            <p>Are you sure you want to delete announcement of <b>

                <?php echo($par_row["name"]) ?> Unit

                <?php echo($par_row["unit"]) ?></b>?</p>

          </div>

          <div class="modal-footer">

            <button style="font-size: 14px" type="submit" class="btn btn-primary btn-md" name="delete_announcement">Yes</button>

            <button style="font-size: 14px" type="button" class="btn btn-dark" data-dismiss="modal">No</button>

          </div>

        </div>



      </div>

    </div>

  </form>

  </td>

  <?php endif?>



<?php

        echo "</tr>";

  }

  echo "</tbody>";

}

?>