<?php

require('../function.php');


include('validator.php');
include('../databaseconn.php');

$query = "SELECT * FROM tbl_authors WHERE mocktest_id = '" . $_GET['id'] . "' ORDER BY time ASC";
$result = mysqli_query($db, $query);


if (mysqli_num_rows($result) > 0) {

  

  echo "<tbody>";

  while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo '<td>'.$row['user'].'</td>';
        echo '<td>'.date("M/d/Y H:i:s", strtotime($row['time'])).'</td>';

        ?>

        <td>
 <form action="" style="float: left; padding: 3px" method="post">

    <button style="font-size: 14px" type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#a_del<?php
        echo ($row['id']);
?>"><span

        class="fa fa-remove" title="Delete"></button>





    <input type="hidden" id="id" name="id" value="<?php
        echo $row['id'];
?>">



    <div class="modal fade" id="a_del<?php
        echo ($row['id']);
?>" role="dialog">

      <div class="modal-dialog">



        <!-- Modal content-->

        <div class="modal-content">

          <div class="modal-header">

            <h6 class="modal-title">Confirm Action</h6>

            <button style="font-size: 14px" type="button" class="close" data-dismiss="modal" aria-label="Close">

              <span aria-hidden="true">&times;</span>

          </div>

          <div class="modal-body">


            <p>Are you sure you want to delete this author?</p>
            

          </div>

          <div class="modal-footer">

            <button style="font-size: 14px" type="submit" class="btn btn-primary btn-md" name="delete_author">Yes</button>

            <button style="font-size: 14px" type="button" class="btn btn-dark" data-dismiss="modal">No</button>

          </div>

        </div>



      </div>

    </div>

  </form>



</td>

        <?php
  }

  echo "</tbody>";
}

?>