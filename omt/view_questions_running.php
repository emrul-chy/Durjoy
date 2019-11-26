<?php



include('validator_running.php');
include('../databaseconn.php');

$query  = "SELECT * FROM tbl_questions WHERE mocktest_id = '" . $_GET['id'] . "' ORDER BY time ASC";
$result = mysqli_query($db, $query);


if (mysqli_num_rows($result) > 0) {
    echo "<tbody>";
    $cnt = 1;
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>Question #" . $cnt . "</td>";
        echo '<td style="font-size: 18px; font-family: Ubuntu-B"><b><div class="alert alert-info" style="font-family: Ubuntu-B; " align="center">'. $row['question'] . '</div></b><br>';
        ?>

        <div style="font-size: 16px" class="from-group">
          <input class="from-control" type="checkbox" name="<?php echo($cnt) ?>is_a"> <?php echo $row['option_a']; ?> 
        </div>
        <div style="font-size: 16px" class="from-group">
          <input class="from-control" type="checkbox" name="<?php echo($cnt) ?>is_b"> <?php echo $row['option_b']; ?>
        </div>
        <div style="font-size: 16px" class="from-group">
          <input class="from-control" type="checkbox" name="<?php echo($cnt) ?>is_c"> <?php echo $row['option_c']; ?>
        </div>
        <div style="font-size: 16px" class="from-group">
          <input class="from-control" type="checkbox" name="<?php echo($cnt) ?>is_d"> <?php echo $row['option_d']; ?>
        </div>

        <?php echo "</td>";
        echo "</tr>";
        $cnt += 1;
    }
    echo "</tbody>";
}

?>