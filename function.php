<?php



function get_date($x) {

  $day = $x[8] * 10 + $x[9];

  $month = $x[5] * 10 + $x[6];

  if($month == '1') $month = "January";

  if($month == '2') $month = "February";

  if($month == '3') $month = "March";

  if($month == '4') $month = "April";

  if($month == '5') $month = "May";

  if($month == '6') $month = "Jun";

  if($month == '7') $month = "July";

  if($month == '8') $month = "August";

  if($month == '9') $month = "September";

  if($month == '10') $month = "Octber";

  if($month == '11') $month = "Novmber";

  if($month == '12') $month = "December";

  $year = "";

  for ($i=0; $i < 4; $i++) { 

  	$year = $year . $x[$i];

  }

  if($day == 1 || $day == 21)$day .= "st";



  else if($day == 2 || $day == 22)$day .= "nd";

  else if($day == 3 || $day == 23)$day .= "rd";

  else $day .= "th";

  return $day . " " . $month . ", " . $year;

}



?>