<?php

require('function.php');



include('databaseconn.php');

$query = "SELECT * FROM tbl_announcement";

if(!isset($_SESSION['admin'])) {

  $query = "SELECT * FROM tbl_announcement WHERE visiblity = 'true'";

}



$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) > 0) {

  echo "<tbody>";

  while($row = mysqli_fetch_assoc($result)) {

        echo "<tr>";

        echo '<td>' . $row["name"] . ' ';



        if(isset($_SESSION['username'])) {



          $qr = 'SELECT * FROM tbl_announcement_seen WHERE username = ' ."'". $_SESSION["username"] . "'" . " and announcement_id = ". $row['id'];

          $res = mysqli_query($db, $qr);

          //echo $qr;

          if(mysqli_num_rows($res) == 0) {

            echo '<span class="label label-default">New</span>';

            $qr = "INSERT INTO tbl_announcement_seen (username, announcement_id) VALUES('". $_SESSION['username'] . "', " . $row['id'] .")";

          // echo $qr;

            $res = mysqli_query($db, $qr);

          }

        }

        echo "</td>";



        echo '<td>' . $row['unit'] . '</td>';

        echo "<td>" . get_date($row["application_start"]) . " to " . get_date($row["application_end"]) . "</td>";

        echo "<td>" . get_date($row["exam_start"]) . " to " . get_date($row["exam_end"]) . "</td>";

        ?>

<td>

  <form style="float: left; padding:3px;" action="announcement" method="get">

    <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">

    <button type="submit" class="btn btn-success btn-md"><span class="

glyphicon glyphicon-option-horizontal"

        aria-hidden="true" title="View Details"></span>



      <?php

            if(!isset($_SESSION['admin'])) echo " View Details";

          ?>

    </button>

  </form>



  <?php if(!isset($_SESSION['admin']) && isset($_SESSION['username'])): ?>

  <form style="float: left; padding:3px;" action="" method="post">

    <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">

    <?php

                $qr = 'SELECT * FROM tbl_favourite WHERE username = ' ."'". $_SESSION["username"] . "'" . " and announcement_id = ". $row['id'];

                $res = mysqli_query($db, $qr);

                if(mysqli_num_rows($res) == 0) {

                  echo '<button type="submit" class="btn btn-primary btn-md" name="add_to_favourite"><span class="glyphicon glyphicon-star" aria-hidden="true" title="Add to Favourite"></span> Add to Favourite';

                }

                else {

                  echo '<button type="submit" class="btn btn-warning btn-md" name="remove_from_favourite"><span class="glyphicon glyphicon-star-empty" aria-hidden="true" title="Remove from Favourite"></span> Remove from Favourite';

                }

              ?>

    </button>

  </form>

  <?php endif;?>





  <?php if(isset($_SESSION['admin'])): ?>

  <form style="float: left; padding:3px;" action="" method="post">

    <?php if($row["visiblity"] == 'true') {

                              echo '<button type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#vis' . $row["id"] . '"><span class="glyphicon glyphicon-eye-close" title="Set Invisible"></button>';

                            } 

                            else { 

                              echo '<button type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#vis' . $row["id"] . '"><span class="glyphicon glyphicon-eye-open" title="Set Visible"></button>';

            } ?>





    <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">



    <div class="modal fade" id="vis<?php echo($row['id'])?>" role="dialog">

      <div class="modal-dialog">



        <!-- Modal content-->

        <div class="modal-content">

          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Confirm Action</h4>

          </div>

          <div class="modal-body">

            <?php if($row["visiblity"] == 'true') {

                        echo '<p>Are you sure you want to invisible announcement of <b>' . $row["name"] . ' Unit ' . $row["unit"] . '</b>?</p>';

                      }

                      else {

                        echo '<p>Are you sure you want to visible announcement of <b>' . $row["name"] . ' Unit ' . $row["unit"] . '</b>?</p>';

                      }?>



          </div>

          <div class="modal-footer">

            <?php if($row["visiblity"] == 'true') {

                              echo '<button type="submit" class="btn btn-warning btn-md" name="set_invisible_announcement">Yes</button>';

                            } 

                            else { 

                              echo '<button type="submit" class="btn btn-warning btn-md" name="set_visible_announcement">Yes</button>';

                      } ?>

            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>

          </div>

        </div>



      </div>

    </div>

  </form>

  <?php endif?>







  <?php if(isset($_SESSION['admin'])):?>

  <form class="" style="float: left; padding: 3px" method="post" action="" enctype="multipart/form-data">

    <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">





    <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#a_upd<?php echo($row['id'])?>"><span

        class="glyphicon glyphicon-edit" title="Update"></span></button>

    <?php

                    include('get_announcement_info_admin.php');

              ?>



    <div class="modal fade" id="a_upd<?php echo($row['id'])?>" role="dialog">

      <div class="modal-dialog">







        <!-- Modal content-->

        <div class="modal-content">

          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Update Announcement of

              <?php

                  echo $name . " Unit: " . $unit;?>

            </h4>

          </div>

          <div class="modal-body">



            <div class="container-fluid">

              <div class="row">

                <div class="col-lg-12">

                  <div>

                    <label style="font-family: Ubuntu-B;" for="name">Name:</label> <input type="text" class="form-control" id="name" placeholder="Enter name"

                      name="name" style="width: 100%" value="<?php echo($name);?>" readonly />

                  </div>



                  <div style="margin-top: 15px">

                    <label style="font-family: Ubuntu-B;" for="unit">Unit:</label> <input type="text" class="form-control" id="unit" placeholder="Enter unit"

                      style="width: 100%" name="unit" value="<?php echo($unit);?>" required />

                  </div>



                  <div style="margin-top: 15px">

                    <label style="font-family: Ubuntu-B;" for="allowed_groups">Allowed Groups:</label><br>

                    <?php

                    $inn_query  = "SELECT * FROM tbl_groups ORDER BY name ASC";

                    $inn_result = mysqli_query($db, $inn_query);

                    $inn_res    = mysqli_num_rows($inn_result);

                    if ($inn_res > 0) {

                      while ($inn_row = mysqli_fetch_assoc($inn_result)) {

                        echo '<div data-toggle="collapse" data-target="#' . $row['id'] . 'updannouncement' . $inn_row['id'] . '">';

                        echo '<input style="float: left; margin-right: 5px;" type="checkbox" name="is_' . $inn_row['id'] . '" value=""';

                        if($flag[$inn_row['id']] == 1) {

                          echo "checked";

                        }

                        echo '> </div>' . $inn_row['name'] . '<br>';

                       // echo '</div>';

                        echo '<div id="' . $row['id'] . 'updannouncement'. $inn_row['id'] . '" class="panel-collapse collapse ';

                        if($flag[$inn_row['id']] == 1) {

                          echo "in";

                        }

                        echo '">'; 

                        echo '

                        <hr><div class="form-group" style="margin-top: 15px">

                  <label style="font-family: Ubuntu-B;" for="' . strtolower($inn_row['id']) . '_ssc_gpa">Required Minimum GPA in SSC (' . $inn_row['name'] . ' Group):</label> <input type="number" step="any"

                   class="form-control" style="width: 100%" name="' . strtolower($inn_row['id']) . '_ssc_gpa" min="1" max="5" value="' . $ssc_gpa[$inn_row['id']] . '" id="' . strtolower($inn_row['id']) . '_ssc_gpa" />

                </div>

                        ';

                        echo '

                        <div class="form-group" style="margin-top: 15px">

                  <label style="font-family: Ubuntu-B;" for="' . strtolower($inn_row['id']) . '_hsc_gpa">Required Minimum GPA in HSC (' . $inn_row['name'] . ' Group):</label> <input type="number" step="any"

                   class="form-control" style="width: 100%" name="' . strtolower($inn_row['id']) . '_hsc_gpa" min="1" max="5" value="' . $hsc_gpa[$inn_row['id']] . '" id="' . strtolower($inn_row['id']) . '_ssc_gpa" />

                <hr></div></div>

                        ';

                      }

                    }  

                  ?>

                  </div>



                  <div style="margin-top: 15px">

                    <label style="font-family: Ubuntu-B;" for="application_start">Application Start:</label>

                    <input type="date" style="width: 100%" class="form-control" name="application_start" id="application_start"

                      value="<?php echo($application_start);?>" required />

                  </div>



                  <div style="margin-top: 15px">

                    <label style="font-family: Ubuntu-B;" for="application_end">Application End:</label>

                    <input type="date" style="width: 100%" class="form-control" name="application_end" id="application_end"

                      value="<?php echo($application_end);?>" required />

                  </div>



                  <div style="margin-top: 15px">

                    <label style="font-family: Ubuntu-B;" for="exam_start">Exam Start:</label>

                    <input type="date" style="width: 100%" class="form-control" name="exam_start" id="exam_start" value="<?php echo($exam_start);?>"

                      required />

                  </div>



                  <div style="margin-top: 15px">

                    <label style="font-family: Ubuntu-B;" for="exam_end">Exam End:</label>

                    <input type="date" style="width: 100%" class="form-control" name="exam_end" id="exam_end" name="exam_end"

                      value="<?php echo($exam_end);?>" required />

                  </div>





                  <div style="margin-top: 15px">

                    <label style="font-family: Ubuntu-B;" for="ssc_min_year">Required Minimum SSC Year:</label> <input type="number" step="any" style="width: 100%"

                      class="form-control" id="ssc_min_year" name="ssc_min_year" value="<?php echo($ssc_min_year);?>"

                      required />

                  </div>



                  <div style="margin-top: 15px">

                    <label style="font-family: Ubuntu-B;" for="hsc_min_year">Required Minimum HSC Year:</label> <input type="number" step="any" class="form-control"

                      style="width: 100%" id="hsc_min_year" name="hsc_min_year" value="<?php echo($hsc_min_year);?>"

                      required />

                  </div>



                  <div style="margin-top: 15px">

                    <label style="font-family: Ubuntu-B;" for="circular">Circular:</label> <input type="text" class="form-control" style="width: 100%"

                      id="circular" name="circular" value="<?php echo($circular)?>" required />

                  </div>

                </div>

              </div>

            </div>

          </div>

          <div class="modal-footer">

            <button type="submit" class="btn btn-info btn-md" name="update_fi_announcement">Update</button>

            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

          </div>

        </div>

      </div>

    </div>

  </form>





  <?php endif?>







  <?php if(isset($_SESSION['admin'])):?>

  <form action="" style="float: left; padding: 3px" method="post">

    <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#a_del<?php echo($row['id'])?>"><span

        class="glyphicon glyphicon-trash" title="Delete"></button>





    <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">



    <div class="modal fade" id="a_del<?php echo($row['id'])?>" role="dialog">

      <div class="modal-dialog">



        <!-- Modal content-->

        <div class="modal-content">

          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Confirm Delete</h4>

          </div>

          <div class="modal-body">

            <p>Are you sure you want to delete announcement of <b>

                <?php echo($row["name"]) ?> Unit

                <?php echo($row["unit"]) ?></b>?</p>

          </div>

          <div class="modal-footer">

            <button type="submit" class="btn btn-danger btn-md" name="delete_announcement">Yes</button>

            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>

          </div>

        </div>



      </div>

    </div>

  </form>

  <?php endif?>

</td>

<?php

        echo "</tr>";

  }

  echo "</tbody>";

}

?>