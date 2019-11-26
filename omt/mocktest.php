<?php
if (isset($_GET['mocktest'])) {
?>

  
  <div class="container-fluid">
    <?php
        include('../success.php');
        include('../errors.php');
        include('get_mocktest_info.php');
        $query = "SELECT * FROM tbl_omt WHERE id = '" . $_GET['id'] . "'";
        $res   = mysqli_query($db, $query);
        if (mysqli_num_rows($res) == 0) {
                echo '<script type="text/javascript">';
echo 'window.location.href="/public_html/403";';
echo '</script>';
                die();
        }
?>
<style>
  table {
    text-align: center;
  }
</style>
<title><?php
        echo $name;
?> | Durjoy</title>
    <div style="margin-bottom: 10px;"><h4>Mock Tests</h4></div>
    <div>
  <table style="width: 100%; font-size: 15px" id="mocktest" class="table table-bordered table-striped table-hover table-responsive">

      <thead>

        <tr>

          <th style="font-family: Ubuntu-B;width: 100%">Name</th>

          <th style="font-family: Ubuntu-B;min-width: 80px; width: 80px">Starts</th>

          <th style="font-family: Ubuntu-B;width: 80px; min-width: 80px">Length</th>


          <th style="font-family: Ubuntu-B;width: 85px; min-width: 85px"></th>

          <th style="font-family: Ubuntu-B;width: 130px; min-width: 130px"></th>
        </tr>

      </thead>

      <?php
        include('view_mocktest.php');
?>

    </table></div>

    <iframe src=" <?php
        echo ('https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Fdurjoybeta.000webhostapp.com%2Fomt%2F%3Fmocktest%3D%26id%3D' . $_GET['id'] . '&layout=button_count&size=large&width=84&height=28&appId');
?>" width="84" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>

  </div>


  <hr><div class="container-fluid" style="font-size: 16px; font-family: UbuntuMono-R; padding-left: 6%; padding-right: 6%">

  <center style="font-family: UbuntuMono-R;">Durjoy Admission Aid<br>
  Developed by Emrul Chowdhury</center>
  </div>

  <script>
    $(document).ready(function () {

    $('#mocktest').DataTable({



    "order": [],

    responsive: true

    });

  });
  </script>


  <?php
        die();
}
?>