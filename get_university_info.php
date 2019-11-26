<?php
include('databaseconn.php');
$get_query = "SELECT * FROM tbl_university WHERE name = '" . $row['name']."'";
$get_x = mysqli_query($db, $get_query);
//echo $row['name'];

if (mysqli_num_rows($get_x) > 0) {
  while($res = mysqli_fetch_assoc($get_x)) {

        $id = $res['id'];
        $name = $res['name'];
        $type = $res['type'];
        $acronym = $res['acronym'];
        $established = $res['established'];
        $location = $res['location'];
        $division = $res['division'];
        $specialization = $res['specialization'];
        $phd_granting = $res['phd_granting'];
        $map_link = $res['map_link'];
        $logo_link = $res['logo_link'];
        $web_link = $res['web_link'];

  }
}
?>