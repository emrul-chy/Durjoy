<?php
  if(isset($_GET['create'])) {
     if(!isset($_SESSION['admin'])) {
      echo '<script type="text/javascript">';
echo 'window.location.href="/public_html/403";';
echo '</script>'; die();
     }
  ?>

  <title>Create New Mock Test | Durjoy</title>
  <div class="container-fluid">
    <?php
    include('../success.php');
  include('../errors.php')
    ?>
    <h4>Create New Mock Test</h4>
    <form style="max-width: 500px" method="post" action="">
      <div class="form-group">
        <label>
          Name
        </label>
        <input type="text" class="form-control" name="name" required="">
      </div>
      <div class="form-group">
        <label>
          Date & Time
        </label>
        <input type="datetime-local" class="form-control" name="date_time" required="">
      </div>

      <div class="form-group">
        <label>
          Duration
        </label>
        <input type="number" min="5" max="300" value="60" class="form-control" name="duration" required="">
      </div>

      <div class="form-group">
        <label>
          Penalty for Wrong Answer
        </label>
        <input type="number" min="0" max="1" value="0" step="0.01" class="form-control" name="penalty" required="">
      </div>
      <div class="form-group">
        <input type="checkbox" name="published"> Published
      </div>
      <button type="submit" name="add_mocktest" class="btn btn-primary btn-md">Create</button>
    </form>
  </div>

  <hr><div class="container-fluid" style="font-size: 16px; font-family: UbuntuMono-R; padding-left: 6%; padding-right: 6%">

  <center style="font-family: UbuntuMono-R;">Durjoy Admission Aid<br>
  Developed by Emrul Chowdhury</center>
  </div>



  <?php
    die();
  }
?>