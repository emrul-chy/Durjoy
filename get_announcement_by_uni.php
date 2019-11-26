<?php

$a_get_query = "SELECT * FROM tbl_announcement WHERE id = '" . $par_row['id']. "'";
//echo $a_get_query;
//die();
$a_x = mysqli_query($db, $a_get_query);
if (mysqli_num_rows($a_x) > 0) {
  while($a_row = mysqli_fetch_assoc($a_x)) {

        $id = $a_row['id'];
        $name = $a_row['name'];
        $unit = $a_row['unit'];
        $application_start = $a_row['application_start'];
        $application_end = $a_row['application_end'];
        $exam_start = $a_row['exam_start'];
        $exam_end = $a_row['exam_end'];
        $ssc_min_year = $a_row['ssc_min_year'];
        $hsc_min_year = $a_row['hsc_min_year'];
        $circular = $a_row['circular'];
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
                $flag[$group_id] = 1;
                $ssc_gpa[$group_id] = $in_get_announcement_row['ssc_gpa'];
                $hsc_gpa[$group_id] = $in_get_announcement_row['hsc_gpa'];
              }
          }
    }
}
}

?>