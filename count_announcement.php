<?php
include('databaseconn.php');
$query = "SELECT * FROM tbl_announcement";
if(!isset($_SESSION['admin'])) {
	$query = "SELECT * FROM tbl_announcement WHERE visiblity = 'true'";
}
$result = mysqli_query($db, $query);
$res = mysqli_num_rows($result);
echo "$res";
?>