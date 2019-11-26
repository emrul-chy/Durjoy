<?php



// Delete User

if (isset($_POST['delete_user'])) {

    // receive all input values from the form

    $username = htmlentities(htmlentities($_POST['username']));





    $query = "DELETE FROM tbl_users WHERE username = '$username'";

    if($username == "admin") {
        array_push($errors, "Error in deleting!");
    }
    
    else if (!(mysqli_query($db, $query))) {

        array_push($errors, "Error in deleting!");

    }

    else {

        $msg = $_SESSION['username'] . " deleted a user: " . $username;

        $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

        mysqli_query($db, $query);

        array_push($success, "User deleted!");

    }

    

}



// Make admin

if (isset($_POST['make_admin'])) {

    $username  = htmlentities(htmlentities($_POST['username']));

    $query = "UPDATE tbl_users SET role = 'admin' WHERE username = '$username'";

    if (mysqli_query($db, $query)) {

        $msg = $_SESSION['username'] . " changed role of: " . $username . " to admin";

        $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

     //   echo $query;

    //    die();

        mysqli_query($db, $query);

        array_push($success, "Action performed!");

    } else {

        array_push($errors, "Error!");

    }

}



// Make user 

if (isset($_POST['make_user'])) {

    $username  = htmlentities(htmlentities($_POST['username']));

    $query = "UPDATE tbl_users SET role = 'user' WHERE username = '$username'";

    if (mysqli_query($db, $query)) {

        $msg = $_SESSION['username'] . " changed role of: " . $username . " to user";

        $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

        mysqli_query($db, $query);

        array_push($success, "Action performed!");

    } else {

        array_push($errors, "Error!");

    }

}



//Delete Group

if (isset($_POST['delete_group'])) {

    // receive all input values from the form

    $id = htmlentities(htmlentities($_POST['id']));





    $query = "DELETE FROM tbl_groups WHERE id = '$id'";

    

    if (!(mysqli_query($db, $query))) {

        array_push($errors, "Error in deleting!");

    }

    else {

        $msg = $_SESSION['username'] . " deleted group: " . $id;

            $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

            mysqli_query($db, $query);

        array_push($success, "Group deleted!");

    }

    

}



//Update Group

if (isset($_POST['update_group'])) {

    // receive all input values from the form

    $id = htmlentities(htmlentities($_POST['id']));

    $name = htmlentities(htmlentities($_POST['name']));



    $query = "SELECT * FROM tbl_groups WHERE name = '$name' and id != '$id'";



    if(mysqli_num_rows(mysqli_query($db, $query)) > 0) {

        array_push($errors, "Group already exits!");

    }

    if(count($errors) == 0) {

        $query = "UPDATE tbl_groups SET name = '$name' WHERE id = '$id'";

       // echo $id . " : " . $query;

       // die();

        

        if (!(mysqli_query($db, $query))) {

            array_push($errors, "Error in updating!");

        }

        else {

            $msg = $_SESSION['username'] . " updated group: " . $name;

            $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

            mysqli_query($db, $query);

            array_push($success, "Group updated!");

        }

    }

}



//Add Group

if (isset($_POST['add_group'])) {

    // receive all input values from the form



    $name = htmlentities(htmlentities($_POST['name']));

    $query = "SELECT * FROM tbl_groups WHERE name = '$name'";



    if(mysqli_num_rows(mysqli_query($db, $query)) > 0) {

        array_push($errors, "Group already exits!");

    }

    if(count($errors) == 0) {

        $query = "INSERT INTO tbl_groups (name) VALUES('$name')";

        

        if (!(mysqli_query($db, $query))) {

            array_push($errors, "Error in adding!");

        }

        else {

            $msg = $_SESSION['username'] . " added group: " . $name;

            $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

            mysqli_query($db, $query);

            array_push($success, "Group added!");

        }

    }

    

}



//Delete Board

if (isset($_POST['delete_specialization'])) {

    // receive all input values from the form

    $id = htmlentities(htmlentities($_POST['id']));





    $query = "DELETE FROM tbl_specializations WHERE id = '$id'";

    

    if (!(mysqli_query($db, $query))) {

        array_push($errors, "Error in deleting!");

    }

    else {

        $msg = $_SESSION['username'] . " deleted specialization: " . $id;

            $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

            mysqli_query($db, $query);

        array_push($success, "Board deleted!");

    }

    

}



//Update Board

if (isset($_POST['update_board'])) {

    // receive all input values from the form

    $id = htmlentities(htmlentities($_POST['id']));

    $name = htmlentities(htmlentities($_POST['name']));



    $query = "SELECT * FROM tbl_boards WHERE name = '$name' and id != '$id'";



    if(mysqli_num_rows(mysqli_query($db, $query)) > 0) {

        array_push($errors, "Board already exits!");

    }

    if(count($errors) == 0) {

        $query = "UPDATE tbl_boards SET name = '$name' WHERE id = '$id'";

       // echo $id . " : " . $query;

       // die();

        

        if (!(mysqli_query($db, $query))) {

            array_push($errors, "Error in updating!");

        }

        else {

            $msg = $_SESSION['username'] . " updated board: " . $name;

            $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

            mysqli_query($db, $query);

            array_push($success, "Board updated!");

        }

    }

    

}



//Add Board

if (isset($_POST['add_board'])) {

    // receive all input values from the form



    $name = htmlentities(htmlentities($_POST['name']));

    $query = "SELECT * FROM tbl_boards WHERE name = '$name'";



    if(mysqli_num_rows(mysqli_query($db, $query)) > 0) {

        array_push($errors, "Board already exits!");

    }

    if(count($errors) == 0) {

        $query = "INSERT INTO tbl_boards (name) VALUES('$name')";

        

        if (!(mysqli_query($db, $query))) {

            array_push($errors, "Error in adding!");

        }

        else {

            $msg = $_SESSION['username'] . " added board: " . $name;

            $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

            mysqli_query($db, $query);

            array_push($success, "Board added!");

        }

    }

    

}



//Delete Division

if (isset($_POST['delete_division'])) {

    // receive all input values from the form

    $id = htmlentities(htmlentities($_POST['id']));





    $query = "DELETE FROM tbl_divisions WHERE id = '$id'";

    

    if (!(mysqli_query($db, $query))) {

        array_push($errors, "Error in deleting!");

    }

    else {

        $msg = $_SESSION['username'] . " deleted divsion: " . $id;

            $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

            mysqli_query($db, $query);

        array_push($success, "Division deleted!");

    }

    

}



//Update Division

if (isset($_POST['update_division'])) {

    // receive all input values from the form

    $id = htmlentities(htmlentities($_POST['id']));

    $name = htmlentities(htmlentities($_POST['name']));



    $query = "SELECT * FROM tbl_divisions WHERE name = '$name' and id != '$id'";



    if(mysqli_num_rows(mysqli_query($db, $query)) > 0) {

        array_push($errors, "Division already exits!");

    }

    if(count($errors) == 0) {

        $query = "UPDATE tbl_divisions SET name = '$name' WHERE id = '$id'";

       // echo $id . " : " . $query;

       // die();

        

        if (!(mysqli_query($db, $query))) {

            array_push($errors, "Error in updating!");

        }

        else {

            $msg = $_SESSION['username'] . " updated divsion: " . $name;

            $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

            mysqli_query($db, $query);

            array_push($success, "Division updated!");

        }

    }

    

}



//Add Division

if (isset($_POST['add_division'])) {

    // receive all input values from the form



    $name = htmlentities(htmlentities($_POST['name']));

    $query = "SELECT * FROM tbl_divisions WHERE name = '$name'";



    if(mysqli_num_rows(mysqli_query($db, $query)) > 0) {

        array_push($errors, "Division already exits!");

    }

    if(count($errors) == 0) {

        $query = "INSERT INTO tbl_divisions (name) VALUES('$name')";

        

        if (!(mysqli_query($db, $query))) {

            array_push($errors, "Error in adding!");

        }

        else {

            $msg = $_SESSION['username'] . " added divsion: " . $name;

            $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

            mysqli_query($db, $query);

            

            array_push($success, "Division added!");

        }

    }

    

}



//Delete Specialization

if (isset($_POST['delete_board'])) {

    // receive all input values from the form

    $id = htmlentities(htmlentities($_POST['id']));





    $query = "DELETE FROM tbl_boards WHERE id = '$id'";

    

    if (!(mysqli_query($db, $query))) {

        array_push($errors, "Error in deleting!");

    }

    else {

        $msg = $_SESSION['username'] . " deleted board: " . $id;

            $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

            mysqli_query($db, $query);

            

        array_push($success, "Specialization deleted!");

    }

    

}



//Update Specialization

if (isset($_POST['update_specialization'])) {

    // receive all input values from the form

    $id = htmlentities(htmlentities($_POST['id']));

    $name = htmlentities(htmlentities($_POST['name']));



    $query = "SELECT * FROM tbl_specializations WHERE name = '$name' and id != '$id'";



    if(mysqli_num_rows(mysqli_query($db, $query)) > 0) {

        array_push($errors, "Specialization already exits!");

    }

    if(count($errors) == 0) {

        $query = "UPDATE tbl_specializations SET name = '$name' WHERE id = '$id'";

       // echo $id . " : " . $query;

       // die();

        

        if (!(mysqli_query($db, $query))) {

            array_push($errors, "Error in updating!");

        }

        else {

            $msg = $_SESSION['username'] . " updated specialization: " . $name;

            $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

            mysqli_query($db, $query);

            

            array_push($success, "Specialization updated!");

        }

    }

    

}



//Add Specialization

if (isset($_POST['add_specialization'])) {

    // receive all input values from the form



    $name = htmlentities(htmlentities($_POST['name']));

    $query = "SELECT * FROM tbl_specializations WHERE name = '$name'";



    if(mysqli_num_rows(mysqli_query($db, $query)) > 0) {

        array_push($errors, "Specialization already exits!");

    }

    if(count($errors) == 0) {

        $query = "INSERT INTO tbl_specializations (name) VALUES('$name')";

        

        if (!(mysqli_query($db, $query))) {

            array_push($errors, "Error in adding!");

        }

        else {

            $msg = $_SESSION['username'] . " added specialization: " . $name;

            $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

            mysqli_query($db, $query);

            

            array_push($success, "Specialization added!");

        }

    }

    

}





//Update SSC Min

if (isset($_POST['update_ssc_min'])) {

    // receive all input values from the form



    $year = htmlentities(htmlentities($_POST['year']));

    $query = "UPDATE tbl_years SET ssc_min = '$year'";



    if (!(mysqli_query($db, $query))) {

        array_push($errors, "Error in updating!");

    }

      else {

        $msg = $_SESSION['username'] . " updated ssc_min year: " . $year;

            $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

            mysqli_query($db, $query);

            

       array_push($success, "Year updated!");

    }

    

    include('component.php');

}



//Update SSC Max

if (isset($_POST['update_ssc_max'])) {

    // receive all input values from the form



    $year = htmlentities(htmlentities($_POST['year']));

    $query = "UPDATE tbl_years SET ssc_max = '$year'";



    if (!(mysqli_query($db, $query))) {

        array_push($errors, "Error in updating!");

    }

      else {

        $msg = $_SESSION['username'] . " updated ssc_max year: " . $year;

            $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

            mysqli_query($db, $query);

       array_push($success, "Year updated!");

    }

    

    include('component.php');

}



//Update HSC Min

if (isset($_POST['update_hsc_min'])) {

    // receive all input values from the form



    $year = htmlentities(htmlentities($_POST['year']));

    $query = "UPDATE tbl_years SET hsc_min = '$year'";



    if (!(mysqli_query($db, $query))) {

        array_push($errors, "Error in updating!");

    }

      else {

        $msg = $_SESSION['username'] . " updated hsc_min year: " . $year;

            $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

            mysqli_query($db, $query);

       array_push($success, "Year updated!");

    }

    

    include('component.php');

}





//Update HSC Max

if (isset($_POST['update_hsc_max'])) {

    // receive all input values from the form



    $year = htmlentities(htmlentities($_POST['year']));

    $query = "UPDATE tbl_years SET hsc_max = '$year'";



    if (!(mysqli_query($db, $query))) {

        array_push($errors, "Error in updating!");

    }

      else {

        $msg = $_SESSION['username'] . " updated hsc_max year: " . $year;

            $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

            mysqli_query($db, $query);

       array_push($success, "Year updated!");

    }

    

    include('component.php');

}







?>



