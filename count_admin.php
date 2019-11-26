<?php
include('databaseconn.php');
$query = "SELECT * FROM tbl_users WHERE role='admin'";
$result = mysqli_query($db, $query);
$res = mysqli_num_rows($result);
echo "$res";
?>