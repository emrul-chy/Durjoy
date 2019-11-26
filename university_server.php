<?php

// Add University

if (isset($_POST['add_university'])) {

    // receive all input values from the form

    $target_dir    = "assests/img/";

    $target_file   = $target_dir . basename($_FILES["logo"]["name"]);

    $uploadOk      = 1;

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image

    if (isset($_POST['add_university']) && isset($_POST['logo'])) {

        $check = getimagesize($_FILES["logo"]["tmp_name"]);

        if ($check !== false) {

            //    echo "File is an image - " . $check["mime"] . " " . $_FILES["logo"]["tmp_name"]. ".";

            $uploadOk = 1;

        } else {

            //    echo "File is not an image.";

            $uploadOk = 0;

        }

    }

    // Check if file already exists

    if (file_exists($target_file)) {

        //echo "Sorry, file already exists.";

        $uploadOk = 0;

    }

    // Check file size

    if ($_FILES["logo"]["size"] > 500000) {

        //echo "Sorry, your file is too large.";

        $uploadOk = 0;

    }

    // Allow certain file formats

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {

        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

        $uploadOk = 0;

    }

    

    $name           = htmlentities($_POST['name']);

    $type           = htmlentities($_POST['type']);

    $acronym        = htmlentities($_POST['acronym']);

    $acronym        = strtoupper($acronym);

    $established    = htmlentities($_POST['established']);

    $location       = htmlentities($_POST['location']);

    $location       = ucwords(strtolower($location));

    $division       = htmlentities($_POST['division']);

    $specialization = htmlentities($_POST['specialization']);

    $phd_granting   = htmlentities($_POST['phd_granting']);

    $map_link       = htmlentities($_POST['map_link']);

    

    $web_link = htmlentities($_POST['web_link']);

    

    $cur = "";

    

    //echo $division;

    for ($i = 0; $i < strlen($division); $i++) {

        if ($division[$i] == ' ')

            break;

        //echo $division[$i] . "<br>";

        $cur .= $division[$i];

    }

    //echo $cur;

    $cur = strtolower($cur);

    

    $target_file = $target_dir . $_POST['acronym'] . "_" . $cur . "_" . $_POST['established'] . "_logo." . strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    

    $logo_link = $target_file;

    

    //echo $target_file;

    //die();

  //  echo $name;

    //die();

    //  echo $target_file='C:\xampp\htdocs\Durjoy\assests\img';

    //echo $uploadOk . "<br>";

    //echo $target_file. "<br>";

    //echo $_FILES["logo"]["tmp_name"]."<br>";

    //echo $target_file."<br>";

    // Check if $uploadOk is set to 0 by an error

    

    

    //echo "logo_link = " . $logo_link;

    

    

    // form validation: ensure that the form is correctly filled

    if (empty($name)) {

        array_push($errors, "Name is required");

    } else {

        $f = 0;

        for ($i = 0; $i < strlen($name); $i++) {

            if ($name[$i] == ' ' || $name[$i] == ',' || $name[$i] == '&' || $name[$i] == '-')

                continue;

            if (!($name[$i] >= 'a' && $name[$i] <= 'z') && !($name[$i] >= 'A' && $name[$i] <= 'Z')) {

                $f = 1;

            }

        }

        if ($f == 1)

            array_push($errors, "Name should have letters between ' ' or ',' or '&' or '-' or 'a' - 'z' or 'A' - 'Z'");

    }

    if (empty($acronym)) {

        array_push($errors, "Acronym is required");

    } else {

        $f = 0;

        for ($i = 0; $i < strlen($acronym); $i++) {

            if (!($acronym[$i] >= 'a' && $acronym[$i] <= 'z') && !($acronym[$i] >= 'A' && $acronym[$i] <= 'Z')) {

                $f = 1;

            }

        }

        if ($f == 1)

            array_push($errors, "Acronym should have letters between 'a' - 'z' or 'A' - 'Z'");

    }

    if (empty($established)) {

        array_push($errors, "Established is required");

    }

    if (empty($location)) {

        array_push($errors, "Location is required");

    }

    if (empty($division)) {

        array_push($errors, "Division is required");

    }

    if (empty($specialization)) {

        array_push($errors, "Specialization is required");

    }

    if (empty($phd_granting)) {

        array_push($errors, "PHD Granting is required");

    }

    if (empty($map_link)) {

        array_push($errors, "Map Link is required");

    }

    if (empty($logo_link)) {

        array_push($errors, "Logo Link is required");

    }

    if (empty($web_link)) {

        array_push($errors, "Web Link is required");

    }

    

    $query  = "SELECT * FROM tbl_university WHERE name = '$name'";

    $result = mysqli_query($db, $query);

    $res    = mysqli_num_rows($result);

    

    if ($res > 0) {

        array_push($errors, "University already exit!");

    }

    

    if ($uploadOk == 0) {

        array_push($errors, "Sorry, your file was not uploaded.");

        // if everything is ok, try to upload file

    }

    

    // marksister user if there are no errors in the form

    if (count($errors) == 0) {

        if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {

        } else {

            array_push($errors, "Sorry, there was an error uploading your file.");

        }

        if (count($errors) == 0) {

            $query = "INSERT INTO tbl_university (name, type, acronym, established, location, division, specialization, phd_granting, map_link, logo_link, web_link) VALUES ('$name', '$type', '$acronym', '$established', '$location', '$division', '$specialization', '$phd_granting', '$map_link', '$logo_link', '$web_link')";

            

            //  echo "<h1>" . $query . "</h1>";

            

            if (mysqli_query($db, $query)) {



                $msg = $_SESSION['username'] . " created a new university information: " . $name;

                $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

                mysqli_query($db, $query);

                array_push($success, "New university information added!");

            }

        }

        

        //header('location: admin.php');

    }

    

}



// Delete University



if (isset($_POST['delete_university'])) {

    // receive all input values from the form

    $id = htmlentities($_POST['id']);

    

    $qr     = "SELECT * FROM tbl_university WHERE id = '$id'";

    $result = mysqli_query($db, $qr);

    

    echo mysqli_num_rows($result);

    $logo_link = "";

    

    while ($row = mysqli_fetch_assoc($result)) {

        $logo_link = $row['logo_link'];

    }

    //die();

    

    $query = "DELETE FROM tbl_university WHERE id = '$id'";

    

    if (!unlink($logo_link)) {

        array_push($errors, "Error deleting $logo_link");

    }

    

    

    

    

    if (mysqli_query($db, $query)) {

        array_push($success, "University information deleted!");

        mysqli_query($db, $query);

        



        $msg = $_SESSION['username'] . " delete a university information: " . $name;

        $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

        mysqli_query($db, $query);

        //header('location: admin.php');

    } else {

        array_push($errors, "Error deleting record!");

    }

    

}



//UPDATE



if (isset($_POST['update_university'])) {

    // echo "ok";

    // die();

    include('get_info.php');

?>





        <div class="container-fluid" style="margin-top:70px; margin-bottom: 20px">

          <div class="row">

            <div class="col-lg-12">

              <h3 style="color: #FF3333" >Update Information of <?php

    echo $name;

?></h3>

            </div>

          </div>

        </div>



        <div class="container-fluid">

          <form method = "post" action="info.php" enctype="multipart/form-data">

            <div class="row">

                <div class="col-lg-6">

                       <input type="hidden" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php

    echo ($name);

?>"/>



                        <div class="form-group">

                          <label for="type">Type:</label>

                          <select class="form-control" id="type" name="type">

                            <?php

    $types = array(

        "Public",

        "Private",

        "International"

    );

    for ($i = 0; $i < count($types); $i++) {

        echo '<option value="' . $types[$i] . '"';

        

        if ($types[$i] == $type)

            echo 'selected = ""';

        echo ">" . $types[$i] . "</option>\n";

    }

?>

                          </select>

                        </div>



                        <div class="form-group">

                          <label for="acronym">Acronym:</label> <input type="text" class="form-control" id="acronym" placeholder="Enter acronym" name="acronym" value="<?php

    echo ($acronym);

?>" />

                        </div>



                        <div class="form-group">

                          <label for="established">Established:</label> <input type="number" class="form-control" id="established" placeholder="Enter establishment year" name="established" value="<?php

    echo ($established);

?>"/>

                        </div>



                        <div class="form-group">

                          <label for="location">Location:</label> <input type="text" class="form-control" id="location" placeholder="Enter location" name="location" value="<?php

    echo ($location);

?>" />

                        </div>



                        <div class="form-group">

                          <label for="division">Division:</label>

                          <select class="form-control" id="division" name="division">

                            <!-- <option value="" selected="">Select One</option> -->

                            <?php

    for ($i = 0; $i < count($divisions); $i++) {

        echo '<option value="' . $divisions[$i] . '"';

        if ($divisions[$i] == $division)

            echo 'selected = ""';

        echo ">" . $divisions[$i] . "</option>\n";

    }

?>

                          </select>

                        </div>

                </div>



                <div class="col-lg-6">



                  <div class="form-group">

                          <label for="specialization">Specialization:</label>

                          <select class="form-control" id="specialization" name="specialization">

                            <?php

    for ($i = 0; $i < count($specializations); $i++) {

        echo '<option value="' . $specializations[$i] . '"';

        if ($specializations[$i] == $specialization)

            echo 'selected = ""';

        echo ">" . $specializations[$i] . "</option>\n";

    }

?>

                          </select>

                        </div>



                        <div class="form-group">

                          <label for="phd_granting">PhD Granting:</label>

                          <select class="form-control" id="phd_granting" name="phd_granting">

                            <?php

    $phd_grantings = array(

        "Yes",

        "No"

    );

    for ($i = 0; $i < count($phd_grantings); $i++) {

        echo '<option value="' . $phd_grantings[$i] . '"';

        

        if ($phd_grantings[$i] == $phd_granting)

            echo 'selected = ""';

        echo ">" . $phd_grantings[$i] . "</option>\n";

    }

?>

                          </select>

                        </div>



                        <div class="form-group">

                          <label for="map_link">Map Embeded HTML Code:</label> <input type="text" class="form-control" id="map_link" placeholder="Enter map embeded HTML code" name="map_link" value='<?php

    echo ($map_link);

?>'/>

                        </div>



                        <div class="form-group">

                            <label for="circular">Logo Link:</label> <input type="file" class="form-control" id="logo_link" name="logo_link"/>

                        </div>



                        <div class="form-group">

                          <label for="web_link">Web Link:</label> <input type="text" class="form-control" id="web_link" placeholder="Enter web link" name="web_link" value="<?php

    echo ($web_link);

?>" />

                        </div>



                

                </div>

                

              </div>

              <button type="submit" class="btn btn-primary btn-sm" name="update_fi_university">Update</button>

              </form>

            </div>



            <?php

    

    die();

}



// Add Faculty

if (isset($_POST['add_faculty'])) {

    // receive all input values from the form

    $university_id = htmlentities($_POST['university_id']);

    $name  = htmlentities($_POST['name']);

    $query = "INSERT INTO tbl_faculty (university_id, name) VALUES('$university_id', '$name')";

    if(mysqli_query($db, $query)) {

        array_push($success, "Faculty " . $name . " of university_id " . $university_id . " added");

    } else {

        array_push($errors, "Error!");

    }

}



// Delete Faculty

if (isset($_POST['delete_faculty'])) {

    // receive all input values from the form

    $faculty_id  = htmlentities($_POST['faculty_id']);

    $query = "DELETE FROM tbl_faculty WHERE id = '$faculty_id'";

    if(mysqli_query($db, $query)) {

        $query = "DELETE FROM tbl_department WHERE faculty_id = '$faculty_id'";

        mysqli_query($db, $query);

        array_push($success, "Faculty [" . $faculty_id . "] deleted");

    } else {

        array_push($errors, "Error!");

    }

}



// Update Faculty

if (isset($_POST['update_faculty'])) {

    // receive all input values from the form

    $faculty_id  = htmlentities($_POST['faculty_id']);

    $name = htmlentities($_POST['name']);



    $query = "UPDATE tbl_faculty SET name = '$name' WHERE id = '$faculty_id'";

    if(mysqli_query($db, $query)) {

        array_push($success, "Faculty [" . $faculty_id . "] updated");

    } else {

        array_push($errors, "Error!");

    }

}



// Add Department

if (isset($_POST['add_department'])) {

    // receive all input values from the form

    $faculty_id = htmlentities($_POST['faculty_id']);

    $name  = htmlentities($_POST['name']);

    $query = "INSERT INTO tbl_department (faculty_id, name) VALUES('$faculty_id', '$name')";

    if(mysqli_query($db, $query)) {

        array_push($success, "Department " . $name . " of faculty_id " . $faculty_id . " added");

    } else {

        array_push($errors, "Error!");

    }

}



// Delete Department

if (isset($_POST['delete_department'])) {

    // receive all input values from the form

    $department_id  = htmlentities($_POST['department_id']);

    $query = "DELETE FROM tbl_department WHERE id = '$department_id'";

    if(mysqli_query($db, $query)) {

        array_push($success, "Department [" . $department_id . "] deleted");

    } else {

        array_push($errors, "Error!");

    }

}



// Update Department

if (isset($_POST['update_department'])) {

    // receive all input values from the form

    $department_id  = htmlentities($_POST['department_id']);

    $name = htmlentities($_POST['name']);



    $query = "UPDATE tbl_department SET name = '$name' WHERE id = '$department_id'";

    if(mysqli_query($db, $query)) {

        array_push($success, "Department [" . $department_id . "] updated");

    } else {

        array_push($errors, "Error!");

    }

}



// Visiblity True

if (isset($_POST['set_visible_university'])) {

    // receive all input values from the form

    $name  = htmlentities($_POST['name']);

    $query = "UPDATE tbl_university SET visiblity = 'true' WHERE name = '$name'";

    //  echo $query;

    //  die();

    if (mysqli_query($db, $query)) {



        $msg = $_SESSION['username'] . " visibled information of university: " . $name;

        $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

        mysqli_query($db, $query);

        array_push($success, "Information Visibled");

    } else {

        array_push($errors, "Error!");

    }

}





// Visiblity False

if (isset($_POST['set_invisible_university'])) {

    // receive all input values from the form

    $name  = htmlentities($_POST['name']);

     // echo $query;

    //  die();

    $query = "UPDATE tbl_university SET visiblity = 'false' WHERE name = '$name'";

    if (mysqli_query($db, $query)) {



        $msg = $_SESSION['username'] . " invisibled information of university: " . $name;

        $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

        mysqli_query($db, $query);

        array_push($success, "Information Invisibled");

    } else {

        array_push($errors, "Error!");

    }

}



if (isset($_POST['update_fi_university'])) {

    // receive all input values from the form

    $target_dir  = "assests/img/";

    $target_file = $target_dir . basename($_FILES["logo_link"]["name"]);

  //  echo $target_file;

   // die();

    $uploadOk    = 1;

    $FileType    = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    

    $name           = htmlentities($_POST['name']);

    $type           = htmlentities($_POST['type']);

    $acronym        = htmlentities($_POST['acronym']);

    $established    = htmlentities($_POST['established']);

    $location       = htmlentities($_POST['location']);

    $division       = htmlentities($_POST['division']);

    $specialization = htmlentities($_POST['specialization']);

    $phd_granting   = htmlentities($_POST['phd_granting']);

    $map_link       = htmlentities($_POST['map_link']);

    $web_link       = htmlentities($_POST['web_link']);

    $logo_link = $target_file;

  //  echo $logo_link;die();

    

    // form validation: ensure that the form is correctly filled

    if (empty($name)) {

        array_push($errors, "name is required");

    }

    if (empty($type)) {

        array_push($errors, "type is required");

    }

    if (empty($acronym)) {

        array_push($errors, "acronym is required");

    }

    if (empty($established)) {

        array_push($errors, "established is required");

    }

    if (empty($location)) {

        array_push($errors, "location is required");

    }

    if (empty($division)) {

        array_push($errors, "division is required");

    }

    if (empty($specialization)) {

        array_push($errors, "specialization is required");

    }

    if (empty($phd_granting)) {

        array_push($errors, "phd_granting is required");

    }

   /* if (empty($map_link)) {

        array_push($errors, "map_link is required");

    }

    if (empty($logo_link)) {

        array_push($errors, "logo_link is required");

    }

    if (empty($web_link)) {

        array_push($errors, "web_link is required");

    }
*/
    

    //echo $acronym;

     $cur = "";

    

    //echo $division;

    for ($i = 0; $i < strlen($division); $i++) {

        if ($division[$i] == ' ')

            break;

        //echo $division[$i] . "<br>";

        $cur .= $division[$i];

    }

    //echo $cur;

    $cur = strtolower($cur);


    

    $query  = "SELECT * FROM tbl_university WHERE name='$name'";

    $result = mysqli_query($db, $query);

    $res    = mysqli_num_rows($result);

    

    //echo count($errors);



    $f=0;
    
    $target_file = $target_dir . $_POST['acronym'] . "_" . $cur . "_" . $_POST['established'] . "_logo." . strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    

    $logo_link = $target_file;


    

    if (count($errors) == 0) {

        if(file_exists($_FILES['logo_link']['tmp_name']) && is_uploaded_file($_FILES['logo_link']['tmp_name'])) {

         //   echo "ok";

            //die();

            $f = 1;

            $qr     = "SELECT * FROM tbl_university WHERE name = '$name'";

            $result = mysqli_query($db, $qr);

            

            //echo $qr;

            //die();

            $old_logo_link = "";

            

            while ($row = mysqli_fetch_assoc($result)) {

                $old_logo_link = $row['logo_link'];

            }



            if($old_logo_link != "") {
                if (!unlink($old_logo_link)) {
    
                    array_push($errors, "Error replacing ". $old_logo_link);
    
                }
                
            }

          //  echo $logo_link; die();

            if (move_uploaded_file($_FILES["logo_link"]["tmp_name"], $logo_link)) {
                array_push($success, "Information Updated!");
            } else {

                array_push($errors, "Sorry, there was an error uploading your file.");

            }

        }

        if (count($errors) == 0) {

            $query = "UPDATE tbl_university SET type = '$type', acronym = '$acronym', established = '$established', location = '$location', division = '$division', specialization = '$specialization', phd_granting = '$phd_granting', map_link = '$map_link', logo_link = '$logo_link', web_link = '$web_link' WHERE name = '$name'";



            if(!$f) {

                $query = "UPDATE tbl_university SET type = '$type', acronym = '$acronym', established = '$established', location = '$location', division = '$division', specialization = '$specialization', phd_granting = '$phd_granting', map_link = '$map_link', web_link = '$web_link' WHERE name = '$name'";

                

            }



            //echo $logo_link;

            //die();





            mysqli_query($db, $query);



            $msg = $_SESSION['username'] . " updated information of university: " . $name;

            $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

            mysqli_query($db, $query);

            

            array_push($success, "Information Updated");

        }

    }

    

    

}



?>