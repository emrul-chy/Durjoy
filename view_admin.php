
<?php

if(!isset($_SESSION['admin'])) {

  echo '<h3 style="font-family: Ubuntu">Access Denied</h3>';
  die();
}

include('databaseconn.php');
$query = "SELECT * FROM tbl_users WHERE role='admin' ORDER BY reg_time DESC";
$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) > 0) {
  echo "<tbody>";
  while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo '<td>' . $row["name"] . "</td>";
        echo '<td>' . $row["username"] . "</td>";
        echo '<td>' . $row["email"] . "</td>";
        echo '<td>' . $row["reg_time"] . "</td>";
        ?>
        <td>
          <form action="" method="post" style="float: left; margin-right: 3px; padding:2px;">
          <?php if(isset($_SESSION['admin'])):?>
            <button type="button" class="btn btn-warning btn-md <?php
                          if($row["username"] == 'admin') {
                            echo "disabled";
                          }
                      ?>" data-toggle="modal" data-target="<?php
                          if($row["username"] == 'admin') {
                            echo "disabled";
                          }
                      ?>#makeuser<?php echo($row["username"])?>"><span class="glyphicon glyphicon-minus-sign" title="Change role to user"></span></button>

            
              <input type="hidden" id="username" name="username" value="<?php echo $row["username"]; ?>">

              <div class="modal fade" id="makeuser<?php echo($row["username"])?>" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Confirm Action</h4>
                    </div>
                    <div class="modal-body">
                      <p>Are you sure you want to change the role of <b><?php echo($row["name"]) ?></b> to user?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-warning btn-md <?php
                          if($row["username"] == 'admin') {
                            echo "disabled";
                          }
                      ?>" name="make_user">Yes</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                  </div>
                  
                </div>
              </div>
            </form>
          <?php endif?>
          <form action="" method="post" style="float: left; padding:2px;">
          <?php if(isset($_SESSION['admin'])):?>
            <button type="button" class="btn btn-danger btn-md <?php
                          if($row["username"] == 'admin') {
                            echo "disabled";
                          }
                      ?>" data-toggle="modal" data-target="<?php
                          if($row["username"] == 'admin') {
                            echo "disabled";
                          }
                      ?>#del<?php echo($row["username"])?>"><span class="glyphicon glyphicon-trash" title="Delete"></span></button>

            
              <input type="hidden" id="username" name="username" value="<?php echo $row["username"]; ?>">

              <div class="modal fade" id="del<?php echo($row["username"])?>" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Confirm Delete</h4>
                    </div>
                    <div class="modal-body">
                      <p>Are you sure you want to delete user <b><?php echo($row["name"]) ?></b> (<?php echo $row["username"]; ?>)?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-danger btn-md <?php
                          if($row["username"] == 'admin') {
                            echo "disabled";
                          }
                      ?>" name="delete_user">Yes</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                  </div>
                  
                </div>
              </div>
            </form>
          <?php endif?>
        </td>
        <?php
        echo "</tr>";
  }
  echo "</tbody>";
}
?>