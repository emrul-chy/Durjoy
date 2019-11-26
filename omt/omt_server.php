<?php
date_default_timezone_set("Asia/Dhaka");

include('../component.php');

include('../databaseconn.php');



// variable declaration

$errors  = array();
$success = array();


if (isset($_POST['add_mocktest'])) {
    $name = htmlentities($_POST['name']);
    
    $date_time = htmlentities($_POST['date_time']);
    
    $duration = htmlentities($_POST['duration']);
    
    $penalty = htmlentities($_POST['penalty']);
    
    $published = 0;
    if (isset($_POST['published'])) {
        $published = 1;
    }
    
    $publisher = $_SESSION['username'];
    
    if (empty($name)) {
        array_push($errors, "Name is required");
        
    }
    
    if (empty($date_time)) {
        array_push($errors, "Date & Time is required");
        
    }
    
    if (empty($duration)) {
        array_push($errors, "Duration is required");
        
    }
    
    if (count($errors) == 0) {
        $query = "INSERT INTO tbl_omt (name, date_time, duration, penalty, published, publisher) 

                      VALUES('$name', '$date_time', '$duration', '$penalty', '$published', '$publisher')";
        
        //   echo $query; die();
        array_push($success, "New Mock Test Added");
        mysqli_query($db, $query);
        
        $last_id = 0;
        
        include('find_last.php');

        
        $query = "INSERT INTO tbl_authors (mocktest_id, user) VALUES('$last_id', '" . $_SESSION['username'] . "')";

       // echo $query; die();
        
        
        mysqli_query($db, $query);
        
        $msg = $_SESSION['username'] . " added a new Online Mock Test";
        
        $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";
        
        mysqli_query($db, $query);
        
    }
    
    //echo $name . " -> " . $date_time . " -> " . $duration . " -> " . $published; die();
}

if (isset($_POST['update_mocktest'])) {
    $id = htmlentities($_POST['id']);
    
    $name = htmlentities($_POST['name']);
    
    $date_time = htmlentities($_POST['date_time']);
    
    $duration = htmlentities($_POST['duration']);
    
    $penalty = htmlentities($_POST['penalty']);
    
    $published = 0;
    if (isset($_POST['published'])) {
        $published = 1;
    }
    
    $publisher = $_SESSION['username'];
    
    if (empty($name)) {
        array_push($errors, "Name is required");
        
    }
    
    if (empty($date_time)) {
        array_push($errors, "Date & Time is required");
        
    }
    
    if (empty($duration)) {
        array_push($errors, "Duration is required");
        
    }
    
    if (count($errors) == 0) {
        $query = "UPDATE tbl_omt SET name = '$name', date_time = '$date_time', duration = '$duration', penalty = '$penalty', published = '$published' WHERE id = '$id'";
        
        //   echo $query; die();
        array_push($success, "Mock Test Updated");
        mysqli_query($db, $query);
        
        
        
        
        $msg = $_SESSION['username'] . " Updated " . $name;
        
        $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";
        
        mysqli_query($db, $query);
        
    }
    
    //echo $name . " -> " . $date_time . " -> " . $duration . " -> " . $published; die();
}


if (isset($_POST['set_visible_mocktest'])) {
    //  echo "wqsfewdf";
    
    //  die();
    
    // receive all input values from the form
    
    $id = htmlentities($_POST['id']);
    
    $query = "UPDATE tbl_omt SET published = '1' WHERE id = '$id'";
    
    
    
    //  echo $query;
    
    //  die();
    
    // echo $query;
    
    //  die();
    
    if (mysqli_query($db, $query)) {
        $msg = $_SESSION['username'] . " visibled an mocktest:" . $id;
        
        $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";
        
        mysqli_query($db, $query);
        
        array_push($success, "Mocktest Visibled");
        
    } else {
        array_push($errors, "Error!");
        
    }
    
}





// Visiblity false



if (isset($_POST['set_invisible_mocktest'])) {
    // echo "wqsfewdf";
    
    // die();
    
    // receive all input values from the form
    
    $id = htmlentities($_POST['id']);
    
    $query = "UPDATE tbl_omt SET published = '0' WHERE id = '$id'";
    //   echo $query; die();
    
    if (mysqli_query($db, $query)) {
        $msg = $_SESSION['username'] . " invisibled an mocktest:" . $id;
        
        $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";
        
        mysqli_query($db, $query);
        
        array_push($success, "Mocktest Invisibled");
        
    } else {
        array_push($errors, "Error!");
        
    }
    
}


//Submission
if (isset($_POST['submission'])) {
    
    $id = htmlentities($_GET['id']);
    $user = $_SESSION['username'];
    $mocktest_id = $_GET['id'];
    $total_question = 0;
    $total_correct = 0;
    $total_wrong = 0;
    $time = date("y-m-d H:i:s", time());
    include('get_mocktest_info.php');
    include('checker.php');
    include('submission_validator.php');
    if(mysqli_num_rows($res) > 0) {
        array_push($errors, "Multiple Submission Attempts");
    }

    $score = $total_correct - ($total_wrong * $penalty);

    if(time() > strtotime($date_time) + $duration * 60) {
        array_push($errors,  "Test is over!");
    }

    if (count($errors) == 0) {
        $query = "INSERT INTO tbl_submissions (mocktest_id, user, correct, wrong, score, time) VALUES('$mocktest_id', '$user', '$total_correct', '$total_wrong', '$score', '$time')";

       // echo $query; die();
        mysqli_query($db, $query);

        $msg = $_SESSION['username'] . " submitted answer to mocktest:" . $id;
        
        $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";
        
        mysqli_query($db, $query);
        
        array_push($success, "Submission Successful");
        
    } else {
        array_push($errors, "Error!");
        
    }
    
}





// Delete mocktest

if (isset($_POST['delete_mocktest'])) {
    $id = htmlentities($_POST['id']);
    
    
    $query = "DELETE FROM tbl_omt WHERE id = '$id'";
    
    
    
    
    
    
    
    // die();
    
    if (mysqli_query($db, $query)) {
        $msg = $_SESSION['username'] . " deleted an mocktest: " . $id;
        
        $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";
        
        mysqli_query($db, $query);
        
        array_push($success, "Mocktest deleted!");
    } else {
        array_push($errors, "Error!");
        
    }
    
    
}

// Delete question

if (isset($_POST['delete_question'])) {
    $id = htmlentities($_POST['id']);
    
    
    $query = "DELETE FROM tbl_questions WHERE id = '$id'";
    
    
    
    
    
    
    
    // die();
    
    if (mysqli_query($db, $query)) {
        $msg = $_SESSION['username'] . " deleted an question: " . $id;
        
        $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";
        
        mysqli_query($db, $query);
        
        array_push($success, "Question deleted!");
    } else {
        array_push($errors, "Error!");
        
    }
    
    
}

// Delete participant

if (isset($_POST['delete_participant'])) {
    $id = htmlentities($_POST['id']);
    
    
    $query = "DELETE FROM tbl_registration WHERE id = '$id'";
    
    
    
    
    
    
    
    // die();
    
    if (mysqli_query($db, $query)) {
        $msg = $_SESSION['username'] . " deleted an participant: " . $id;
        
        $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";
        
        mysqli_query($db, $query);
        
        array_push($success, "Participant deleted!");
    } else {
        array_push($errors, "Error!");
        
    }
    
    
}

// Delete author

if (isset($_POST['delete_author'])) {
    $id = htmlentities($_POST['id']);
    
    
    $query = "DELETE FROM tbl_authors WHERE id = '$id'";
    
    
    
    
    
    
    
    // die();
    
    if (mysqli_query($db, $query)) {
        $msg = $_SESSION['username'] . " deleted an author: " . $id;
        
        $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";
        
        mysqli_query($db, $query);
        
        array_push($success, "Author deleted!");
    } else {
        array_push($errors, "Error!");
        
    }
    
    
}

///Registration
if (isset($_GET['register'])) {
    if (!isset($_SESSION['username'])) {
        //echo "ok"; die();
        array_push($errors, "Please login or register to participate in Online Mock Test");
    } else {
        $query = "SELECT * FROM tbl_registration WHERE user = '" . $_SESSION['username'] . "' and mocktest_id = '" . $_GET['id'] . "'";
        
        $res = mysqli_query($db, $query);
        $time = date("Y-m-d H:i:s", time());
        include('get_mocktest_info.php');
        if($published == 0 && !isset($_SESSION['admin'])) {
            array_push($errors, "You are not allowed to register!");
        }
        else if (mysqli_num_rows($res) > 0) {
            array_push($errors, "Already Registered");
        } else {
            $id = htmlentities($_GET['id']);
            
            
            $query = "INSERT INTO tbl_registration (user, mocktest_id, time) VALUES('" . $_SESSION['username'] . "', '" . $_GET['id'] . "', '$time')";
            
            
            
         //  echo $query; die();
            
            
            
            // die();
            
            if (mysqli_query($db, $query)) {

                $msg = $_SESSION['username'] . " registered for mocktest: " . $id;
                
                $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";
                
                mysqli_query($db, $query);
                
                array_push($success, "Registration Successful!!");
            } else {
                array_push($errors, "Error!");
                
            }
            
        }
    }
    
    
}


///Add participants
if (isset($_POST['add_participant'])) {
    $query = "SELECT * FROM tbl_registration WHERE user = '" . $_POST['user'] . "' and mocktest_id = '" . $_GET['id'] . "'";
    
    $res = mysqli_query($db, $query);
    if (mysqli_num_rows($res) > 0) {
        array_push($errors, "Already Registered");
    } else {
        $query = "SELECT * FROM tbl_users WHERE username = '" . $_POST['user'] . "'";
        $res   = mysqli_query($db, $query);
        
        if (mysqli_num_rows($res) == 1) {
            $query = "INSERT INTO tbl_registration (user, mocktest_id) VALUES('" . $_POST['user'] . "', '" . $_GET['id'] . "')";
            
           // echo $query;
           // die();

            array_push($success, "User added!");


            
            mysqli_query($db, $query);
        } else {
            array_push($errors, "User doesn't exist!");
        }
    }
}

///Add participants
if (isset($_POST['add_author'])) {
    $query = "SELECT * FROM tbl_authors WHERE user = '" . $_POST['user'] . "' and mocktest_id = '" . $_GET['id'] . "'";
    
    $res = mysqli_query($db, $query);
    if (mysqli_num_rows($res) > 0) {
        array_push($errors, "Already Added");
    } else {
        $query = "SELECT * FROM tbl_users WHERE username = '" . $_POST['user'] . "'";
        $res   = mysqli_query($db, $query);
        
        if (mysqli_num_rows($res) == 1) {
            $query = "SELECT * FROM tbl_users WHERE username = '" . $_POST['user'] . "' and role = 'admin'";
            $res   = mysqli_query($db, $query);

            if (mysqli_num_rows($res) == 1) {
                $time = date("Y-m-d H:i:s", time());
                $query = "INSERT INTO tbl_authors (user, mocktest_id, time) VALUES('" . $_POST['user'] . "', '" . $_GET['id'] . "', '$time')";

                //echo $query; die();

                array_push($success, "Author added!");


                
                mysqli_query($db, $query);
            }
            else {
                array_push($errors, $_POST['user'] . " is not an admin!");
            }
        } else {
            array_push($errors, "User doesn't exist!");
        }
    }
}

if (isset($_POST['add_question'])) {
    $id = $_GET['id'];

    $question = htmlentities($_POST['question']);
    
    $option_a = htmlentities($_POST['option_a']);

    $option_b = htmlentities($_POST['option_b']);

    $option_c = htmlentities($_POST['option_c']);

    $option_d = htmlentities($_POST['option_d']);
    
    if (empty($question)) {
        array_push($errors, "Question is required");
        
    }
    
    if (empty($option_a)) {
        array_push($errors, "Option #A is required");
        
    }
    
    if (empty($option_b)) {
        array_push($errors, "Option #B is required");
        
    }

    if (empty($option_c)) {
        array_push($errors, "Option #C is required");
        
    }

    if (empty($option_d)) {
        array_push($errors, "Option #D is required");
        
    }

    $is_a = 0;
    $is_b = 0;
    $is_c = 0;
    $is_d = 0;

    if(isset($_POST['is_a'])) {
        $is_a = 1;
    }

    if(isset($_POST['is_b'])) {
        $is_b = 1;
    }

    if(isset($_POST['is_c'])) {
        $is_c = 1;
    }

    if(isset($_POST['is_d'])) {
        $is_d = 1;
    }
    
    if (count($errors) == 0) {
        $query = "INSERT INTO tbl_questions (mocktest_id, question, option_a, option_b, option_c, option_d, is_a, is_b, is_c, is_d) VALUES ('$id', '$question', '$option_a', '$option_b', '$option_c', '$option_d', '$is_a', '$is_b', '$is_c', '$is_d')";
        
        //   echo $query; die();
        array_push($success, "New Question Added");
        mysqli_query($db, $query);
        
        
        
        
        $msg = $_SESSION['username'] . " added a new Question";
        
        $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";
        
        mysqli_query($db, $query);
        
    }
    
    //echo $name . " -> " . $date_time . " -> " . $duration . " -> " . $published; die();
}


if (isset($_POST['update_question'])) {
    $mocktest_id = $_GET['id'];

    $id = $_POST['id'];

    $question = htmlentities($_POST['question']);
    
    $option_a = htmlentities($_POST['option_a']);

    $option_b = htmlentities($_POST['option_b']);

    $option_c = htmlentities($_POST['option_c']);

    $option_d = htmlentities($_POST['option_d']);
    
    if (empty($question)) {
        array_push($errors, "Question is required");
        
    }
    
    if (empty($option_a)) {
        array_push($errors, "Option #A is required");
        
    }
    
    if (empty($option_b)) {
        array_push($errors, "Option #B is required");
        
    }

    if (empty($option_c)) {
        array_push($errors, "Option #C is required");
        
    }

    if (empty($option_d)) {
        array_push($errors, "Option #D is required");
        
    }

    $is_a = 0;
    $is_b = 0;
    $is_c = 0;
    $is_d = 0;

    if(isset($_POST['is_a'])) {
        $is_a = 1;
    }

    if(isset($_POST['is_b'])) {
        $is_b = 1;
    }

    if(isset($_POST['is_c'])) {
        $is_c = 1;
    }

    if(isset($_POST['is_d'])) {
        $is_d = 1;
    }
    
    if (count($errors) == 0) {
        $query = "UPDATE tbl_questions SET mocktest_id = '$mocktest_id', question = '$question', option_a = '$option_a', option_b = '$option_b', option_c = '$option_c', option_d = '$option_d', is_a = '$is_a', is_b = '$is_b', is_c = '$is_c', is_d = '$is_d' WHERE id = '$id'";
        
        // echo $query; die();
        array_push($success, "Question Updated");
        mysqli_query($db, $query);
        
        
        
        
        $msg = $_SESSION['username'] . " updated a Question: " . $id;
        
        $query = "INSERT INTO tbl_logs (activity) VALUES('$msg')";
        
        mysqli_query($db, $query);
        
    }
    
    //echo $name . " -> " . $date_time . " -> " . $duration . " -> " . $published; die();
}

?>