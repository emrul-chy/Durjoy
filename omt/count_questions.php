<?php
include('../databaseconn.php');
$query = "SELECT * FROM tbl_questions WHERE mocktest_id = '" . $_GET['id'] . "'";
$res = mysqli_query($db, $query);
echo mysqli_num_rows($res);
?>