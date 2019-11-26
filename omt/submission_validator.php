<?php
include('../databaseconn.php');
$query = "SELECT * FROM tbl_submissions WHERE mocktest_id = '" . $_GET['id'] . "' and user = '" . $_SESSION['username'] . "'";
$res = mysqli_query($db, $query);

?>