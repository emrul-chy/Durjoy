<?php
if (isset($_GET['questions'])) {
  
    if (!isset($_SESSION['admin'])) {
        echo '<script type="text/javascript">';
echo 'window.location.href="/public_html/403";';
echo '</script>';
        die();
    }

    include('validator.php');
?>

  
  <div class="container-fluid">
    <?php
    include('../success.php');
    include('../errors.php');
    include('get_mocktest_info.php');
?>
  <title><?php echo $name; ?> Questions | Durjoy</title>
  <h4><?php echo $name; ?> Questions<a role="button" style="float: right;" class="btn btn-primary btn-md" href="?edit=&id=<?php echo($id) ?>">Back to Edit</a> </h4>
    <br>
    <table style="width: 100%; font-size: 14px" id="questions" class="table table-bordered table-striped table-hover table-responsive">
      <thead>

        <tr>

          <th></th>

          <th style="font-family: Ubuntu-B; width: 100%">Question</th>

          <th style="font-family: Ubuntu-B; min-width: 100px">Option #A</th>

          <th style="font-family: Ubuntu-B; min-width: 100px">Option #B</th>

          <th style="font-family: Ubuntu-B; min-width: 100px">Option #C</th>

          <th style="font-family: Ubuntu-B; min-width: 100px">Option #D</th>


          <th style="font-family: Ubuntu-B; min-width: 100px">Action</th>

        </tr>



      </thead>


      <?php include('view_questions.php')?>

    </table>
    
  </div>

  <hr><div class="container-fluid" style="font-size: 16px; font-family: UbuntuMono-R; padding-left: 6%; padding-right: 6%">

  <center style="font-family: UbuntuMono-R;">Durjoy Admission Aid<br>
  Developed by Emrul Chowdhury</center>
  </div>

  <script>
    $(document).ready(function () {

    $('#questions').DataTable({



    "order": [],

    responsive: true

    });

  });
  </script>



  <?php
    die();
}
?>