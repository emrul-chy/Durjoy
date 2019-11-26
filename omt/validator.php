<?php
include('../databaseconn.php');
$query = "SELECT * FROM tbl_omt WHERE id = '" . $_GET['id'] . "'";
$res = mysqli_query($db, $query);
if(mysqli_num_rows($res) == 0) {
  echo '<script type="text/javascript">';
echo 'window.location.href="/public_html/403";';
echo '</script>';
  die();
}
$query = "SELECT * FROM tbl_authors WHERE mocktest_id = '" . $_GET['id'] . "' and user = '" . $_SESSION['username'] . "'";
$res = mysqli_query($db, $query);
if(mysqli_num_rows($res) == 0) {
  echo '<script type="text/javascript">';
echo 'window.location.href="/public_html/403";';
echo '</script>';
  die();
}
?>