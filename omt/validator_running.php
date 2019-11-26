<?php
include('../databaseconn.php');
$query = "SELECT * FROM tbl_registration WHERE mocktest_id = '" . $_GET['id'] . "' and user = '" . $_SESSION['username'] . "'";
$res = mysqli_query($db, $query);
if(mysqli_num_rows($res) == 0 && !isset($_SESSION['admin'])) {
  echo '<script type="text/javascript">';
echo 'window.location.href="/public_html/403";';
echo '</script>';
  die();
}
$f = 1;
if(mysqli_num_rows($res) == 0) {
	$f = 0;
}
?>