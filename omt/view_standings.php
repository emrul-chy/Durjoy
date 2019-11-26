<?php

require('../function.php');


include('../databaseconn.php');

$query = "SELECT * FROM tbl_submissions WHERE mocktest_id = '" . $_GET['id'] .  "' ORDER BY score DESC";
$result = mysqli_query($db, $query);


$cnt = 1;

if (mysqli_num_rows($result) > 0) {

  

  echo "<tbody>";

  while($row = mysqli_fetch_assoc($result)) {
        echo "</tr>";
        echo "<td>" . $cnt . "</td>";
        echo '<td>' . $row['user'] . "</td>";
        echo '<td align="center"><span style="padding: 4px; font-size: 17px; font-family: Ubuntu-B" class="badge badge-success">' . sprintf('%0.2f', $row['score']) . "</span></td>";
        echo '<td align="center"><span class="alert alert-success" style=" font-family: Ubuntu-R; font-size: 16px;">' . $row['correct'] . "</span></td>";
        echo '<td align="center"><span class="alert alert-danger" style=" font-family: Ubuntu-R; font-size: 16px;">' . $row['wrong'] . "</span></td>";
        echo '<td align="center"><span class="alert alert-info" style=" font-family: Ubuntu-R; font-size: 16px;">' . date('H:i:s', (strtotime($row['time']) - strtotime($date_time)) - 6 * 3600)  . "</td>";
        echo "</tr>";

        $cnt += 1;
  }

  echo "</tbody>";
}

?>