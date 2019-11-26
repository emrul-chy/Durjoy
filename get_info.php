<?php

include('databaseconn.php');

if (isset($_POST['update_university']))

    $str = $_POST['id'];

else

    $str = $_GET['id'];

$query  = "SELECT * FROM tbl_university WHERE id = '$str'";

$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {

        $id             = $row['id'];
        
        $name           = $row['name'];

        $type           = $row['type'];

        $acronym        = $row['acronym'];

        $established    = $row['established'];

        $location       = $row['location'];

        $division       = $row['division'];

        $specialization = $row['specialization'];

        $phd_granting   = $row['phd_granting'];

        $map_link       = $row['map_link'];

        $logo_link      = $row['logo_link'];

        $web_link       = $row['web_link'];

        /**/

        //echo $row["visiblity"];

        if (!isset($_SESSION['admin'])) {

            if ($row["visiblity"] == 'false') {

                echo '<script type="text/javascript">';

                echo 'window.location.href="universityList";';

                echo '</script>';

            }

        }

    }

} else {

    header('location: info.php');

}

?>