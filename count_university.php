<?php
include('databaseconn.php');
if (!isset($_SESSION['admin'])) {
    $query = "SELECT * FROM tbl_university WHERE visiblity = 'true'";
}
else {
		$query = "SELECT * FROM tbl_university WHERE (visiblity = 'true' or visiblity='false')";
}
if (isset($_GET['type']) && $_GET['type'] != 'Any') {
    $type  = htmlentities($_GET['type']);
    $query .= " and type = '$type'";
}

if (isset($_GET['division']) && $_GET['division'] != 'Any') {
    $division  = htmlentities($_GET['division']);
    $query .= " and division = '$division'";
}

if (isset($_GET['specialization']) && $_GET['specialization'] != 'Any') {
    $specialization  = htmlentities($_GET['specialization']);
    $query .= " and specialization = '$specialization'";
}

$result = mysqli_query($db, $query);
$res = mysqli_num_rows($result);
echo "$res";
?>