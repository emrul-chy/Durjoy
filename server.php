<?php

//error_reporting(0);

session_start();



ob_start();

include('component.php');

include('databaseconn.php');





// variable declaration

$errors = array();



$success = array();

// connect to database



// REGISTER USER

if (isset($_POST['reg_user'])) {

    // receive all input values from the form

    $name      = htmlentities($_POST['name']);

    $email     = htmlentities($_POST['email']);

    $username  = htmlentities($_POST['username']);

    $password1 = htmlentities($_POST['password1']);

    $password2 = htmlentities($_POST['password2']);

    

    // form validation: ensure that the form is correctly filled

    for ($i = 0; $i < strlen($name); $i++) {

        if ($name[$i] != '.' && $name[$i] != ' ' && ($name[$i] < 'a' || $name[$i] > 'z') && ($name[$i] < 'A' || $name[$i] > 'Z')) {

            array_push($errors, "No special character allowed in name!");

        }

    }

    if (empty($name)) {

        array_push($errors, "Name is required");

    }

    

    $query = "SELECT * FROM tbl_users WHERE email = '$email'";

    $r     = mysqli_query($db, $query);

    $res   = mysqli_num_rows($r);

    

    if ($res > 0) {

        array_push($errors, "Email already in use!");

    } else if (empty($email)) {

        array_push($errors, "Email is required");

    }

    

    if (strlen($username) < 5) {

        array_push($errors, "Username length must be at leat 5");

    }

    

    if (!preg_match('/^\w{5,}$/', $username)) {

        array_push($errors, "Username must not contain any special characters");

    }

    

    /// Check username

    

    $query  = "SELECT * FROM tbl_users WHERE username = '$username'";

    $result = mysqli_query($db, $query);

    $res    = mysqli_num_rows($result);

    

    if ($res > 0) {

        array_push($errors, "Username already exit!");

    }

    

    else if (empty($username)) {

        array_push($errors, "Username is required");

    }

    

    

    if (empty($password1)) {

        array_push($errors, "Password is required");

    }

    //if (empty($password2)) { array_push($errors, "Password is required"); }

    

    if (strlen($password1) < 5) {

        array_push($errors, "Password length must be at leat 5");

    }

    

    if ($password1 != $password2) {

        array_push($errors, "The two passwords do not match!");

    }

    

    

    // marksister user if there are no errors in the form

    if (count($errors) == 0) {

        $password = md5($password1); //encrypt the password before saving in the database

        $query    = "INSERT INTO tbl_users (name, email, username, password, ssc_py, hsc_py, ssc_gpa, hsc_gpa, ssc_marks, hsc_marks, ssc_group, hsc_group, ssc_board, hsc_board) 

                      VALUES('$name', '$email', '$username', '$password', 0, 0, 0, 0, 0, 0, '', '', '', '')";

        mysqli_query($db, $query);

        

        

        $msg   = $username . " registered to durjoy";

        $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

        mysqli_query($db, $query);

        

        $_SESSION['msg'] = "Your registration was successfull! Please log in.";

        header('location: login');

    }

    

}



// ... 



// LOGIN USER

if (isset($_POST['login_user'])) {

    $username = htmlentities($_POST['username']);

    $password = htmlentities($_POST['password']);

    

    if (empty($username)) {

        array_push($errors, "Username is required");

    }

    if (empty($password)) {

        array_push($errors, "Password is required");

    }

    

    if (count($errors) == 0) {

        $password = md5($password);

        $query    = "SELECT * FROM tbl_users WHERE username='$username' AND password='$password'";

        $results  = mysqli_query($db, $query);

        $user     = mysqli_fetch_assoc($results);

        

        if (mysqli_num_rows($results) == 1) {

            //print_r($user);



            $_SESSION['details'] = "updated";

            $_SESSION['name']      = $user['name'];

            $_SESSION['email']     = $user['email'];

            $_SESSION['username']  = $user['username'];



            $_SESSION['ssc_py']    = $user['ssc_py'];

            if($user['ssc_py'] == 0)

                $_SESSION['details'] = "not_updated";



            $_SESSION['ssc_board'] = $user['ssc_board'];

            if(strlen($user['ssc_board']) == 0)

                $_SESSION['details'] = "not_updated";



            $_SESSION['ssc_group'] = $user['ssc_group'];

            if(strlen($user['ssc_group']) == 0)

                $_SESSION['details'] = "not_updated";



            $_SESSION['ssc_gpa']   = $user['ssc_gpa'];

            if($user['ssc_gpa'] == 0)

                $_SESSION['details'] = "not_updated";



            $_SESSION['ssc_marks'] = $user['ssc_marks'];

            if($user['ssc_marks'] == 0)

                $_SESSION['details'] = "not_updated";



            $_SESSION['hsc_py']    = $user['hsc_py'];

            if($user['hsc_py'] == 0)

                $_SESSION['details'] = "not_updated";



            $_SESSION['hsc_board'] = $user['hsc_board'];

            if(strlen($user['hsc_board']) == 0)

                $_SESSION['details'] = "not_updated";



            $_SESSION['hsc_group'] = $user['hsc_group'];

            if(strlen($user['hsc_group']) == 0)

                $_SESSION['details'] = "not_updated";



            $_SESSION['hsc_gpa']   = $user['hsc_gpa'];

            if($user['hsc_gpa'] == 0)

                $_SESSION['details'] = "not_updated";



            $_SESSION['hsc_marks'] = $user['hsc_marks'];

            if($user['hsc_marks'] == 0)

                $_SESSION['details'] = "not_updated";



            $_SESSION['success']   = "You are now logged in";

            

            

            $msg   = $_SESSION['username'] . " logged in";

            $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

            mysqli_query($db, $query);

            

            if ($user['role'] == "admin") {

                $_SESSION['admin'] = "admin";

                if (isset($_GET['back'])) {

                    echo '<script type="text/javascript">';

                    echo 'window.location.href="' . $_GET['back'] . '";';

                    echo '</script>';

                } else {

                    echo '<script type="text/javascript">';

                    echo 'window.location.href="admin";';

                    echo '</script>';

                }

            } else {

                if (isset($_GET['back'])) {

                    echo '<script type="text/javascript">';

                    echo 'window.location.href="' . $_GET['back'] . '";';

                    echo '</script>';

                } else {

                    echo '<script type="text/javascript">';

                    echo 'window.location.href="dashboard";';

                    echo '</script>';

                }

            }

        } else {

            array_push($errors, "Username/password is incorrect");

        }

    }

}



// UPDATE PROFILE



if (isset($_POST['update_user'])) {

    // receive all input values from the form

    $name      = htmlentities($_POST['name']);

    $email     = htmlentities($_POST['email']);

    $username  = htmlentities($_POST['username']);

    $password1 = htmlentities($_POST['password1']);

    $password2 = htmlentities($_POST['password2']);

    

    if (!isset($_SESSION['admin'])) {

        $ssc_py    = htmlentities($_POST['ssc_py']);

        $ssc_board = htmlentities($_POST['ssc_board']);

        $ssc_group = htmlentities($_POST['ssc_group']);

        $ssc_gpa   = htmlentities($_POST['ssc_gpa']);

        $ssc_marks = htmlentities($_POST['ssc_marks']);

        $hsc_py    = htmlentities($_POST['hsc_py']);

        $hsc_board = htmlentities($_POST['hsc_board']);

        $hsc_group = htmlentities($_POST['hsc_group']);

        $hsc_gpa   = htmlentities($_POST['hsc_gpa']);

        $hsc_marks = htmlentities($_POST['hsc_marks']);

    }

    

    for ($i = 0; $i < strlen($name); $i++) {

        if ($name[$i] != '.' && $name[$i] != ' ' && ($name[$i] < 'a' || $name[$i] > 'z') && ($name[$i] < 'A' || $name[$i] > 'Z')) {

            array_push($errors, "No special character allowed in name!");

        }

    }

    

    

    // form validation: ensure that the form is correctly filled

    if (empty($name)) {

        array_push($errors, "Name is required");

    }

    if (empty($email)) {

        array_push($errors, "Email is required");

    }

    if (empty($username)) {

        array_push($errors, "Username is required");

    }

    

    if ($password1 != $password2 && (!empty($password1) || !empty($password2))) {

        array_push($errors, "The two passwords do not match!");

    }




    // echo $ssc_py . " " . $hsc_py;

    

    // marksister user if there are no errors in the form

    if (count($errors) == 0) {

        $password = md5($password1); //encrypt the password before saving in the database

        

        $_SESSION['success'] = "Profile Updated";



       // echo $hsc_py; 

        

        if (!isset($_SESSION['admin'])) {

            $_SESSION['details'] = "updated";

            $_SESSION['name']      = $name;



            $_SESSION['ssc_py']    = $ssc_py;

            if($ssc_py == 0)

                $_SESSION['details'] = "not_updated";



            $_SESSION['ssc_board'] = $ssc_board;

            if(strlen($ssc_board) == 0)

                $_SESSION['details'] = "not_updated";



            $_SESSION['ssc_group'] = $ssc_group;

            if(strlen($ssc_group) == 0)

                $_SESSION['details'] = "not_updated";



            $_SESSION['ssc_gpa']   = $ssc_gpa;

            if($ssc_gpa == 0)

                $_SESSION['details'] = "not_updated";



            $_SESSION['ssc_marks'] = $ssc_marks;

            if($ssc_marks == 0)

                $_SESSION['details'] = "not_updated";



            $_SESSION['hsc_py']    = $hsc_py;

            if($hsc_py == 0) {

                $_SESSION['details'] = "not_updated";

                echo "bug";

            }





            $_SESSION['hsc_board'] = $hsc_board;

            if(strlen($hsc_board) == 0)

                $_SESSION['details'] = "not_updated";



            $_SESSION['hsc_group'] = $hsc_group;

            if(strlen($hsc_group) == 0)

                $_SESSION['details'] = "not_updated";



            $_SESSION['hsc_gpa']   = $hsc_gpa;

            if($hsc_gpa == 0)

                $_SESSION['details'] = "not_updated";



            $_SESSION['hsc_marks'] = $hsc_marks;

            if($hsc_marks == 0)

                $_SESSION['details'] = "not_updated";





//echo $_SESSION['details'];

     //      die();



           // echo $_SESSION['ssc_py'] . " " . $_SESSION['hsc_py'];

            $query                 = "UPDATE tbl_users SET name = '$name', password = '$password', ssc_py = '$ssc_py', ssc_board = '$ssc_board', ssc_group = '$ssc_group', ssc_gpa = '$ssc_gpa', ssc_marks = '$ssc_marks', hsc_py = '$hsc_py', hsc_board = '$hsc_board', hsc_group = '$hsc_group', hsc_gpa = '$hsc_gpa', hsc_marks = '$hsc_marks' WHERE username = '$username'";

            if (empty($password1) && empty($password2)) {

                $query = "UPDATE tbl_users SET name = '$name', ssc_py = '$ssc_py', ssc_board = '$ssc_board', ssc_group = '$ssc_group', ssc_gpa = '$ssc_gpa', ssc_marks = '$ssc_marks', hsc_py = '$hsc_py', hsc_board = '$hsc_board', hsc_group = '$hsc_group', hsc_gpa = '$hsc_gpa', hsc_marks = '$hsc_marks' WHERE username = '$username'";

            }

        } else if (!empty($password1)) {

            $query = "UPDATE tbl_users SET name = '$name', password = '$password' WHERE username = '$username'";

        } else {

            //  echo $name;

            //  echo $username;

            //  die();

            $query = "UPDATE tbl_users SET name = '$name' WHERE username = '$username'";

        }

        

        if (mysqli_query($db, $query)) {

            $_SESSION['name']  = $name;

            $_SESSION['email'] = $email;

            $msg               = $username . " updated his profile";

            $query             = "INSERT INTO tbl_logs (activity) VALUES('$msg')";

            mysqli_query($db, $query);

            array_push($success, "Profile Updated");

        } else {

            array_push($errors, "Error!");

        }

    }

    

}



ob_end_flush();



?>