<?php

require('../function.php');



include('../databaseconn.php');

$query = "SELECT * FROM tbl_omt ORDER BY id ASC";

if (!isset($_SESSION['admin'])) {
    $query = "SELECT * FROM tbl_omt WHERE published = '1' ORDER BY date_time ASC";
    
}

$result = mysqli_query($db, $query);


if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['publisher'] == $_SESSION['username']) {
            $last_id = $row['id'];
        }
    }
}

?>