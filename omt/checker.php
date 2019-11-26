<?php


include('../databaseconn.php');


$query = "SELECT * FROM tbl_questions WHERE mocktest_id = '$mocktest_id'";

$result = mysqli_query($db, $query);


if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $total_question++;
        $correct = 0;
        $ok      = 0;
        
        $is_a = 0;
        $is_b = 0;
        $is_c = 0;
        $is_d = 0;
        
        if (isset($_POST[$total_question . 'is_a'])) {
            $is_a = 1;
        }

        if (isset($_POST[$total_question . 'is_b'])) {
            $is_b = 1;
        }

        if (isset($_POST[$total_question . 'is_c'])) {
            $is_c = 1;
        }

        if (isset($_POST[$total_question . 'is_d'])) {
            $is_d = 1;
        }

     //   echo $is_a . " : " . $is_b . " : " . $is_c . " : " . $is_d . "<br>";
        
        
        
        if ($row['is_a'] && $ok != -1) {
            $correct++;
            if ($is_a) {
                $ok++;
            }
        } else {
            if ($is_a) {
                $ok = -1;
            }
        }
        if ($row['is_b'] && $ok != -1) {
            $correct++;
            if ($is_b) {
                $ok++;
            }
        } else {
            if ($is_b) {
                $ok = -1;
            }
        }
        if ($row['is_c'] && $ok != -1) {
            $correct++;
            if ($is_c) {
                $ok++;
            }
        } else {
            if ($is_c) {
                $ok = -1;
            }
        }
        if ($row['is_d'] && $ok != -1) {
            $correct++;
            if ($is_d) {
                $ok++;
            }
        } else {
            if ($is_d) {
                $ok = -1;
            }
        }
        if ($ok == $correct) {
            $total_correct++;
        } else if ($ok == -1 || ($ok != 0)) {
            $total_wrong++;
        }

       // echo "> " . $total_correct . " " . $total_wrong . "<br>";
    }
    
}

?>