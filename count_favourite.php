<?php
include('databaseconn.php');
$query = "SELECT * FROM tbl_favourite WHERE username = '" . $_SESSION['username'] . "'";
$result = mysqli_query($db, $query);

$cnt = 0;

if (mysqli_num_rows($result) > 0) {
  echo "<tbody>";
  while($tbl = mysqli_fetch_assoc($result)) {
        $innerquery = "SELECT * FROM tbl_announcement WHERE id = '" . $tbl["announcement_id"] . "' and visiblity = 'true'";
        //echo $innerquery;
        $innerresult = mysqli_query($db, $innerquery);
        if(mysqli_num_rows($innerresult) > 0) $cnt++;
  }
}
echo $cnt;
?>