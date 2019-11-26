<?php
include('function.php');

include('databaseconn.php');
if (isset($_POST['update_announcement']))
    $id = $_POST['id'];
else
    $id = $_GET['id'];


$query  = "SELECT * FROM tbl_announcement WHERE id = '$id'";
$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id                = $row['id'];
        $name              = $row['name'];
        $unit              = $row['unit'];
        $application_start = $row['application_start'];
        $application_end   = $row['application_end'];
        $exam_start        = $row['exam_start'];
        $exam_end          = $row['exam_end'];
        $ssc_min_year      = $row['ssc_min_year'];
        $hsc_min_year      = $row['hsc_min_year'];
        $circular          = $row['circular'];
        if (!isset($_SESSION['admin'])) {
            if ($row["visiblity"] == 'false') {
                header('location: announcementList');
            }
        }
    }
    
    $ssc_gpa = array();
    $hsc_gpa = array();
    $flag = array();
    for($i = 0; $i < 100000; $i++) {
      $ssc_gpa[$i] = 1;
      $hsc_gpa[$i] = 1;
      $flag[$i] = 0;
    }
    
    $get_announcement_query  = "SELECT * FROM tbl_groups ORDER BY name ASC";
    $get_announcement_result = mysqli_query($db, $get_announcement_query);
    $get_announcement_res    = mysqli_num_rows($get_announcement_result);
    if ($get_announcement_res > 0) {
        while ($get_announcement_row = mysqli_fetch_assoc($get_announcement_result)) {
          $group_id = $get_announcement_row['id'];
          $in_get_announcement_query  = "SELECT * FROM tbl_group_eligible WHERE announcement_id = '$id' and group_id = '$group_id'";
          $in_get_announcement_result = mysqli_query($db, $in_get_announcement_query);
          $in_get_announcement_res    = mysqli_num_rows($in_get_announcement_result);

          if ($in_get_announcement_res > 0) {
              while ($in_get_announcement_row = mysqli_fetch_assoc($in_get_announcement_result)) {
                $flag[$in_get_announcement_row['group_id']] = 1;
                $ssc_gpa[$in_get_announcement_row['group_id']] = $in_get_announcement_row['ssc_gpa'];
                $hsc_gpa[$in_get_announcement_row['group_id']] = $in_get_announcement_row['hsc_gpa'];
              }
          }
    }
  }
} else {
    header('location: announcementList');
}
?>