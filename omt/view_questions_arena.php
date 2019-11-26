<?php

require('../function.php');
include('../databaseconn.php');

$query  = "SELECT * FROM tbl_questions WHERE mocktest_id = '" . $_GET['id'] . "' ORDER BY time ASC";
$result = mysqli_query($db, $query);


if (mysqli_num_rows($result) > 0) {
    echo "<tbody>";
    $cnt = 1;
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>#" . $cnt . "</td>";
        echo '<td>' . $row['question'] . '</td>';
        echo '<td>' . $row['option_a'] . '<br>';
        if ($row['is_a']) {
            echo '<span style="float: left; padding: 5px; font-size: 13px; font-family: Ubuntu-B" class="badge badge-success">Correct</span>';
            
        }
        echo '</td>';
        echo '<td>' . $row['option_b'] . '<br>';
        if ($row['is_b']) {
            echo '<span style="float: left; padding: 5px; font-size: 13px; font-family: Ubuntu-B" class="badge badge-success">Correct</span>';
            
        }
        echo '</td>';
        echo '<td>' . $row['option_c'] . '<br>';
        if ($row['is_c']) {
            echo '<span style="float: left; padding: 5px; font-size: 13px; font-family: Ubuntu-B" class="badge badge-success">Correct</span>';
            
        }
        echo '</td>';
        echo '<td>' . $row['option_d'] . '<br>';
        if ($row['is_d']) {
            echo '<span style="float: left; padding: 5px; font-size: 13px; font-family: Ubuntu-B" class="badge badge-success">Correct</span>';
            
        }
        echo '</td>';
        $cnt += 1;
        
?>
        <?php

        
        echo "</tr>";
    }
    echo "</tbody>";
}

?>