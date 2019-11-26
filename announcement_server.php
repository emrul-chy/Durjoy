<?php



// Add announcement

if (isset($_POST['add_announcement'])) {

    // receive all input values from the form

   // $target_dir  = "assests/pdf/";

   // $target_file = $target_dir . basename($_FILES["circular"]["name"]);

   //// $uploadOk    = 1;

   // $FileType    = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));



    

    $name              = htmlentities($_POST['name']);

    $unit              = htmlentities($_POST['unit']);

    $application_start = htmlentities($_POST['application_start']);

    $application_end   = htmlentities($_POST['application_end']);

    $exam_start        = htmlentities($_POST['exam_start']);

    $exam_end          = htmlentities($_POST['exam_end']);

    $ssc_min_year      = htmlentities($_POST['ssc_min_year']);

    $hsc_min_year      = htmlentities($_POST['hsc_min_year']);



   // $target_file = $target_dir . $_POST['name'] . "_" . $_POST['unit'] . "_announcement_" . date("YmdHis") . "." . strtolower(pathinfo($target_file, PATHINFO_EXTENSION));



   // for($i = 0; $i < strlen($target_file); $i++) {

   //     if($target_file[$i] == ' ') {

   //         $target_file[$i] = '_';

   //     }

   // }

   // $circular = $target_file;



    if($application_end < $application_start) {

      array_push($errors, "Application end date should be greater than of equal start date");

    }



    if($exam_end < $exam_start) {

      array_push($errors, "Exam end date should be greater than of equal start date");

    }



    $circular = htmlentities($_POST['circular']);

    

    

    // marksister user if there are no errors in the form

    if (count($errors) == 0) {

        if (count($errors) == 0) {

            $query = "INSERT INTO tbl_announcement (name, unit, application_start, application_end, exam_start, exam_end, ssc_min_year, hsc_min_year, circular) VALUES ('$name', '$unit', '$application_start', '$application_end', '$exam_start', '$exam_end', '$ssc_min_year', '$hsc_min_year', '$circular')";

            

            //  echo "<h1>" . $query . "</h1>";

            

            if (mysqli_query($db, $query)) {

                $msg = $_SESSION['username'] . " added an anouncement: " . $name . " Unit " . $unit ;

        $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

        mysqli_query($db, $query);

                array_push($success, "New announcement added!");



                $in_query  = "SELECT * FROM tbl_announcement WHERE name='$name' and unit='$unit'";

                $in_result = mysqli_query($db, $in_query);

                $in_res    = mysqli_num_rows($in_result);

                $id = -1;

                if ($in_res > 0) {

                                while ($in_row = mysqli_fetch_assoc($in_result)) {

                                    $id = $in_row['id'];

                                    $in_query  = "SELECT * FROM tbl_groups ORDER BY name ASC";

                                    $in_result = mysqli_query($db, $in_query);

                                    $in_res    = mysqli_num_rows($in_result);

                                    if ($in_res > 0) {

                                      while ($in_row = mysqli_fetch_assoc($in_result)) {



                                            $cur = $in_row['id'];

                                        if(isset($_POST['is_' . $in_row['id']])) {



                                            $ssc_gpa = htmlentities($_POST[$cur . '_ssc_gpa']);

                                            $hsc_gpa = htmlentities($_POST[$cur . '_hsc_gpa']);

                                            $in_query = "INSERT INTO tbl_group_eligible (announcement_id, group_id, ssc_gpa, hsc_gpa) VALUES('$id', '$cur', '$ssc_gpa', '$hsc_gpa')";

                                                mysqli_query($db, $in_query);

                                        }

                                      }

                                    }  

                                }



                }

            } else {

                array_push($errors, "Sorry! Something went wrong!");

            }

        }

        

        //header('location: admin.php');

    }

    

}







// Update announcement

if (isset($_POST['update_announcement'])) {

    //echo "ok";

    // die();

    //die();

    include('get_announcement_info.php');

    

    

    

?>



<div class="container-fluid" style="margin-top:70px; margin-bottom: 20px">

    <h3 style="color: #FF3333">Update Announcement of

        <?php

    echo $name . " (Unit: " . $unit . ")";

?>

    </h3>

    <form method="post" action="announcement.php" enctype="multipart/form-data">

        <div class="form-group">

            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo($id);?>" readonly />



            <label for="name">Name:</label> <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"

             value="<?php echo($name);?>" readonly />

        </div>



        <div class="form-group">

            <label for="unit">Unit:</label> <input type="text" class="form-control" id="unit" placeholder="Enter unit" name="unit"

             value="<?php echo($unit);?>" required />

        </div>



        <div class="form-group">

                                    <label for="allowed_groups">Allowed Groups:</label><br>

                                    <?php

                            $query  = "SELECT * FROM tbl_groups ORDER BY name ASC";

                            $result = mysqli_query($db, $query);

                            $res    = mysqli_num_rows($result);

                            if ($res > 0) {

                              while ($row = mysqli_fetch_assoc($result)) {

                                echo '<div data-toggle="collapse" data-target="#' . $row['id'] . '">';

                                echo '<input type="checkbox" name="is_' . strtolower($row['id']) . '" value=""> ' . $row['name'] . '<br>';

                                echo '</div>';

                              }

                            }  

                          ?>

                                </div>



        <div class="form-group">

            <label for="application_start">Application Start:</label>

            <input type="date" class="form-control" name="application_start" id="application_start" value="<?php echo($application_start);?>"

             required />

        </div>



        <div class="form-group">

            <label for="application_end">Application End:</label>

            <input type="date" class="form-control" name="application_end" id="application_end" value="<?php echo($application_end);?>"

             required />

        </div>



        <div class="form-group">

            <label for="exam_start">Exam Start:</label>

            <input type="date" class="form-control" name="exam_start" id="exam_start" value="<?php echo($exam_start);?>"

             required />

        </div>



        <div class="form-group">

            <label for="exam_end">Exam End:</label>

            <input type="date" class="form-control" name="exam_end" id="exam_end" name="exam_end" value="<?php echo($exam_end);?>"

             required />

        </div>



        <div class="form-group">

            <label for="science_ssc_gpa">Required Minimum GPA in SSC (Science Group):</label> <input type="number" step="any"

             class="form-control" id="science_ssc_gpa" name="science_ssc_gpa" value="<?php echo($science_ssc_gpa);?>" required />

        </div>



        <div class="form-group">

            <label for="arts_ssc_gpa">Required Minimum GPA in SSC (Arts Group):</label> <input type="number" step="any" class="form-control"

             id="arts_ssc_gpa" name="arts_ssc_gpa" value="<?php echo($arts_ssc_gpa);?>" required />

        </div>



        <div class="form-group">

            <label for="commerce_ssc_gpa">Required Minimum GPA in SSC (Commerce Group):</label> <input type="number" step="any"

             class="form-control" id="commerce_ssc_gpa" name="commerce_ssc_gpa" value="<?php echo($commerce_ssc_gpa);?>"

             required />

        </div>



        <div class="form-group">

            <label for="science_hsc_gpa">Required Minimum GPA in HSC (Science Group):</label> <input type="number" step="any"

             class="form-control" id="science_hsc_gpa" name="science_hsc_gpa" value="<?php echo($science_hsc_gpa);?>" required />

        </div>



        <div class="form-group">

            <label for="arts_hsc_gpa">Required Minimum GPA in HSC (Arts Group):</label> <input type="number" step="any" class="form-control"

             id="arts_hsc_gpa" name="arts_hsc_gpa" value="<?php echo($arts_hsc_gpa);?>" required />

        </div>



        <div class="form-group">

            <label for="commerce_hsc_gpa">Required Minimum GPA in HSC (Commerce Group):</label> <input type="number" step="any"

             class="form-control" id="commerce_hsc_gpa" value="<?php echo($commerce_hsc_gpa);?>" required />

        </div>



        <div class="form-group">

            <label for="ssc_min_year">Required Minimum SSC Year:</label> <input type="number" step="any" class="form-control" id="ssc_min_year"

             name="ssc_min_year" value="<?php echo($ssc_min_year);?>" required />

        </div>



        <div class="form-group">

            <label for="hsc_min_year">Required Minimum HSC Year:</label> <input type="number" step="any" class="form-control" id="hsc_min_year"

             name="hsc_min_year" value="<?php echo($hsc_min_year);?>" required />

        </div>



        <div class="form-group">

            <label for="circular">Circular:</label> <input type="file" class="form-control" id="circular" name="circular" />

        </div>





        <button type="submit" class="btn btn-primary btn-sm" name="update_fi_announcement">Update</button>

    </form>

</div>



<?php

    die();

    

}



// Final update

if (isset($_POST['update_fi_announcement'])) {

    // receive all input values from the form



  //  $target_dir  = "assests/pdf/";

  //  $target_file = $target_dir . basename($_FILES["circular"]["name"]);

  //  echo $target_file;

  // die();

  //  $uploadOk    = 1;

  //  $FileType    = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    



    $id              = htmlentities($_POST['id']);

    $name              = htmlentities($_POST['name']);

    $unit              = htmlentities($_POST['unit']);

    $application_start = htmlentities($_POST['application_start']);

    $application_end   = htmlentities($_POST['application_end']);

    $exam_start        = htmlentities($_POST['exam_start']);

    $exam_end          = htmlentities($_POST['exam_end']);

    $ssc_min_year      = htmlentities($_POST['ssc_min_year']);

    $hsc_min_year      = htmlentities($_POST['hsc_min_year']);



    /*$target_file = $target_dir . $_POST['name'] . "_" . $_POST['unit'] . "_announcement_" . date("YmdHis") . "." . strtolower(pathinfo($target_file, PATHINFO_EXTENSION));



    for($i = 0; $i < strlen($target_file); $i++) {

        if($target_file[$i] == ' ') {

            $target_file[$i] = '_';

        }

    }*/



    //$circular = $target_file;



    if($application_end < $application_start) {

      array_push($errors, "Application end date should be greater than of equal start date");

    }



    if($exam_end < $exam_start) {

      array_push($errors, "Exam end date should be greater than of equal start date");

    }



    $circular = htmlentities($_POST['circular']);





    if($hsc_min_year < $ssc_min_year) {

        array_push($errors, "Minimum SSC passing year should be smaller than Minimum HSC passing year!");

    }



  //  echo $circular;

  //  die();

  //  echo count($errors);

  //  die();

    

    if (count($errors) == 0) {

        /*if(file_exists($_FILES['circular']['tmp_name']) && is_uploaded_file($_FILES['circular']['tmp_name'])) {

            //echo "ok";

            //die();

            $qr     = "SELECT * FROM tbl_announcement WHERE id = '$id'";

            $result = mysqli_query($db, $qr);

            

            //echo $qr;

            //die();

            $old_circular = "";

            

            while ($row = mysqli_fetch_assoc($result)) {

                $old_circular = $row['circular'];

            }



          // echo $old_circular."\n";

          // unlink($old_circular);

          //  echo $circular;

          //  die();



            

            if (!unlink($old_circular)) {

                array_push($errors, "Error replacing ". $old_circular);

            }

            if (move_uploaded_file($_FILES["circular"]["tmp_name"], $target_file)) {



            } else {

                array_push($errors, "Sorry, there was an error while uploading your file.");

            }

        }*/

        if (count($errors) == 0) {

            $query = "UPDATE tbl_announcement SET unit = '$unit', application_start = '$application_start', application_end = '$application_end', exam_start = '$exam_start', exam_end = '$exam_end', ssc_min_year = '$ssc_min_year', hsc_min_year = '$hsc_min_year', circular = '$circular' WHERE id = '$id'";

            //if(!file_exists($_FILES['circular']['tmp_name']) || !is_uploaded_file($_FILES['circular']['tmp_name'])) {

            if(!isset($_POST['circular']))

                $query = "UPDATE tbl_announcement SET unit = '$unit', application_start = '$application_start', application_end = '$application_end', exam_start = '$exam_start', exam_end = '$exam_end', ssc_min_year = '$ssc_min_year', hsc_min_year = '$hsc_min_year' WHERE id = '$id'";

               // echo $query;

               // die();

            }

          //  echo $arts_hsc_gpa;

          //      die();

            if(mysqli_query($db, $query)) {

                $msg = $_SESSION['username'] . " updated an anouncement: " . $id;

                    $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

                    mysqli_query($db, $query);

                array_push($success, "Announcement Updated");



                                    $in_query = "DELETE FROM tbl_group_eligible WHERE announcement_id = '$id'";

                                    mysqli_query($db, $in_query);

                                    $upd_query  = "SELECT * FROM tbl_groups ORDER BY name ASC";

                                    $upd_result = mysqli_query($db, $upd_query);

                                    $upd_res    = mysqli_num_rows($upd_result);

                                    if ($upd_res > 0) {

                                      while ($upd_row = mysqli_fetch_assoc($upd_result)) {

                                            $cur = $upd_row['id'];

                                            if(isset($_POST['is_' . $upd_row['id']])) {



                                        //      echo $upd_row['name'] . "<br>";

                                         //       echo $_POST[$cur .'_ssc_gpa'] . "<br>";;

                                         //       echo $_POST[$cur .'_hsc_gpa'] . "<br>";;

                                                $ssc_gpa = htmlentities($_POST[$cur . '_ssc_gpa']);

                                                $hsc_gpa = htmlentities($_POST[$cur . '_hsc_gpa']);

                                                $fi_query = "INSERT INTO tbl_group_eligible (announcement_id, group_id, ssc_gpa, hsc_gpa) VALUES('$id', '$cur', '$ssc_gpa', '$hsc_gpa')";

                                          //      echo $fi_query . "\n";

                                                mysqli_query($db, $fi_query);//echo "ok\n";

                                                //else echo "not ok\n";

                                            }

                                      }

                                    }  



                               //     die();

                                



            }

            else {

                array_push($errors, "Error Occured!");

            }

        }

    }

    







// Visiblity true



if (isset($_POST['set_visible_announcement'])) {

    //  echo "wqsfewdf";

    //  die();

    // receive all input values from the form

    $id  = htmlentities($_POST['id']);

    $query = "UPDATE tbl_announcement SET visiblity = 'true' WHERE id = '$id'";

    

    //  echo $query;

    //  die();

    // echo $query;

    //  die();

    if (mysqli_query($db, $query)) {

        $msg = $_SESSION['username'] . " visibled an anouncement:" . $id ;

        $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

        mysqli_query($db, $query);

        array_push($success, "Announcement Visibled");

    } else {

        array_push($errors, "Error!");

    }

}





// Visiblity false



if (isset($_POST['set_invisible_announcement'])) {

    // echo "wqsfewdf";

    // die();

    // receive all input values from the form

    $id  = htmlentities($_POST['id']);

    $query = "UPDATE tbl_announcement SET visiblity = 'false' WHERE id = '$id'";

    if (mysqli_query($db, $query)) {

        $msg = $_SESSION['username'] . " invisibled an anouncement:" . $id ;

        $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

        mysqli_query($db, $query);

        array_push($success, "Announcement Invisibled");

    } else {

        array_push($errors, "Error!");

    }

}



// Add to favourite

if (isset($_POST['add_to_favourite'])) {

    $id  = htmlentities($_POST['id']);



    $qr = 'SELECT * FROM tbl_favourite WHERE username = ' ."'". $_SESSION["username"] . "'" . " and announcement_id = ". $id;

    $res = mysqli_query($db, $qr);

    if(mysqli_num_rows($res) != 0) {

        array_push($errors, "Error!");

    }

    else {

        $query = "INSERT INTO tbl_favourite (username, announcement_id) VALUES('". $_SESSION['username'] . "', " . $id .")";

        if (mysqli_query($db, $query)) {

            $msg = $_SESSION['username'] . " added an anouncement: " . $id . " to favourite";

        $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

                mysqli_query($db, $query);

            array_push($success, "Added to favourite!");

        } else {

            array_push($errors, "Error!");

        }

    }

}



//Remove from favourite

if (isset($_POST['remove_from_favourite'])) {

    $id  = htmlentities($_POST['id']);

    $query = "DELETE FROM tbl_favourite WHERE username = '". $_SESSION['username'] . "' and announcement_id = '$id'";

    if (mysqli_query($db, $query)) {

        $msg = $_SESSION['username'] . " removed an anouncement: " . $id . " from favourite";

        $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

                mysqli_query($db, $query);

        array_push($success, "Removed from favourite!");

    } else {

        array_push($errors, "Error!");

    }

}



// Delete announcement

if (isset($_POST['delete_announcement'])) {

    $id  = htmlentities($_POST['id']);



    $qr     = "SELECT * FROM tbl_announcement WHERE id = '$id'";

    $result = mysqli_query($db, $qr);

    

    

    $query = "DELETE FROM tbl_announcement WHERE id = '$id'";

    



    

   // die();

    if (mysqli_query($db, $query)) {

        $msg = $_SESSION['username'] . " deleted an anouncement: " . $id;

                $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

                mysqli_query($db, $query);

        array_push($success, "Announcement deleted!");

$in_query = "DELETE FROM tbl_group_eligible WHERE announcement_id = '$id'";

        mysqli_query($db, $in_query);

        $in_query = "DELETE FROM tbl_announcement_seen WHERE announcement_id = '$id'";

        mysqli_query($db, $in_query);

    } else {

        array_push($errors, "Error!");

    }


}







?>