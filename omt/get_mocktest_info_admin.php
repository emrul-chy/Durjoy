<?php



$a_get_query = "SELECT * FROM tbl_omt WHERE id = '" . $row['id']. "'";

//echo $a_get_query;

//die();

$a_x = mysqli_query($db, $a_get_query);

if (mysqli_num_rows($a_x) > 0) {

  while($a_row = mysqli_fetch_assoc($a_x)) {



        $id = $a_row['id'];

        $name = $a_row['name'];

        $date_time = $a_row['date_time'];

        $duration = $a_row['duration'];

        $penalty = $a_row['penalty'];

        $published = $a_row['published'];

        $publisher = $a_row['publisher'];

        $published_time= $a_row['published_time'];


  }

}



?>