<?php

require('../function.php');


include('validator.php');
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
<td>
   <form action="" style="float: left; padding: 3px" method="post">

    <button style="font-size: 14px" type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#a_upd<?php
        echo ($row['id']);
?>"><span

        class="fa fa-edit" title="Edit"></button>





    <input type="hidden" id="id" name="id" value="<?php
        echo $row['id'];
?>">



    <div class="modal fade" id="a_upd<?php
        echo ($row['id']);
?>" role="dialog">

      <div class="modal-dialog">



        <!-- Modal content-->

        <div class="modal-content">

            <form action="?edit=&id=<?php echo($_GET['id']) ?>" method="post">
            	<input type="hidden" name="id" value="<?php echo($row['id']) ?>">

        <!-- Modal Header -->
	        <div class="modal-header">
	          <h5 class="modal-title">Update Question</h5>
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	        </div>

	        <!-- Modal body -->
	        <div class="modal-body">
	          <div class="form-group">
	            <label style="font-size: 15px" for="questions">
	              Question
	            </label>
	            <input style="font-size: 14px" placeholder="Question" class="form-control" type="text" name="question" value="<?php echo($row['question']) ?>" required="">
	          </div>
	          <hr>
	          <div class="form-group">
	            <label style="font-size: 15px" for="option_a">
	              Option #A
	            </label>
	            <input style="font-size: 14px" placeholder="Option #A" class="form-control" type="text" name="option_a" value="<?php echo($row['option_a']) ?>" required="">
	            <br><div style="font-size: 14px"> <input type="checkbox" name="is_a" <?php if($row['is_a'] == 1) echo 'checked'; ?>> Correct Answer</div>
	          </div>
	          <hr>
	          <div class="form-group">
	            <label style="font-size: 15px" for="option_b">
	              Option #B
	            </label>
	            <input style="font-size: 14px" placeholder="Option #B" class="form-control" type="text" name="option_b" value="<?php echo($row['option_b']) ?>" required="">
	            <br><div style="font-size: 14px"> <input type="checkbox" name="is_b" <?php if($row['is_b'] == 1) echo 'checked'; ?>> Correct Answer</div>
	          </div>
	          <hr>
	          <div class="form-group">
	            <label style="font-size: 15px" for="option_c">
	              Option #C
	            </label>
	            <input style="font-size: 14px" placeholder="Option #C" class="form-control" type="text" name="option_c" value="<?php echo($row['option_c']) ?>" required="">
	            <br><div style="font-size: 14px"> <input type="checkbox" name="is_c" <?php if($row['is_c'] == 1) echo 'checked'; ?>> Correct Answer</div>
	          </div>
	          <hr>
	          <div class="form-group">
	            <label style="font-size: 15px" for="option_d">
	              Option #D
	            </label>
	            <input style="font-size: 14px"  placeholder="Option #D" class="form-control" type="text" name="option_d" value="<?php echo($row['option_d']) ?>" required="">
	            <br><div style="font-size: 14px"> <input type="checkbox" name="is_d" <?php if($row['is_d'] == 1) echo 'checked'; ?>> Correct Answer</div>
	          </div>
	        </div>

	        <!-- Modal footer -->
	        <div class="modal-footer">
	          <button type="submit" name="update_question" class="btn btn-primary">Update</button>
	          <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
	        </div>

	      </form>


          </div>

        </div>



      </div>

    </div>

  </form>

  <form action="" style="float: left; padding: 3px" method="post">

    <button style="font-size: 14px" type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#a_del<?php
        echo ($row['id']);
?>"><span

        class="fa fa-trash" title="Delete"></button>





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

            <h6 class="modal-title">Confirm Delete</h6>

            <button style="font-size: 14px" type="button" class="close" data-dismiss="modal" aria-label="Close">

              <span aria-hidden="true">&times;</span>

          </div>

          <div class="modal-body">

            <p>Are you sure you want to delete this question?</p>

          </div>

          <div class="modal-footer">

            <button style="font-size: 14px" type="submit" class="btn btn-primary btn-md" name="delete_question">Yes</button>

            <button style="font-size: 14px" type="button" class="btn btn-dark" data-dismiss="modal">No</button>

          </div>

        </div>



      </div>

    </div>

  </form>



</td>
  
        <?php

        
        echo "</tr>";
    }
    echo "</tbody>";
}

?>