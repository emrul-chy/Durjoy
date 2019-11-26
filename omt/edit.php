<?php
if (isset($_GET['edit'])) {
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
<title>Edit <?php
        echo $name;
?> | Durjoy</title>

    <h4>Edit <?php
    echo ($name);
?></h4>
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-1">
        <div class="card" style="margin-bottom: 20px; width: 100%" >
          <div class="card-body">
            <h4 class="card-title">Questions</h4>
            <h1 class="card-subtitle mb-2 text-muted"><?php
    include('count_questions.php');
?></h1>
            <?php
    if (time() >= strtotime($date_time)) {
?>
              <button class="btn btn-primary btn-md" disabled>Add</button>
              <?php
    } else {
?>
              <a role="button" data-toggle="modal" data-target="#addQuestion" class="btn btn-primary btn-md" href="#">Add</a>
            <?php
    }
?>
            <a role="button" class="btn btn-dark btn-md" href="?questions&id=<?php
    echo ($_GET['id']);
?>">See All</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-1">
        <div class="card" style="margin-bottom: 20px; width: 100%" >
          <div class="card-body">
            <h4 class="card-title">Authors</h4>
            <h1 class="card-subtitle mb-2 text-muted"><?php
    include('count_authors.php');
?></h1>
            <?php
    if (time() >= strtotime($date_time)) {
?>
              <button class="btn btn-primary btn-md" disabled>Add</button>
              <?php
    } else {
?>
              <a role="button" data-toggle="modal" data-target="#addAuthor" class="btn btn-primary btn-md" href="#">Add</a>
            <?php
    }
?>
            <a role="button" class="btn btn-dark btn-md" href="?authors&id=<?php
    echo ($_GET['id']);
?>">See All</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-1">
        <div class="card" style="margin-bottom: 20px; width: 100%" >
          <div class="card-body">
            <h4 class="card-title">Participants</h4>
            <h1 class="card-subtitle mb-2 text-muted"><?php
    include('count_participants.php');
?></h1>
            <?php
    if (time() >= strtotime($date_time)) {
?>
              <button class="btn btn-primary btn-md" disabled>Add</button>
              <?php
    } else {
?>
              <a role="button" data-toggle="modal" data-target="#addParticipant" class="btn btn-primary btn-md" href="#">Add</a>
            <?php
    }
?>
            <a role="button" class="btn btn-dark btn-md" href="?participants&id=<?php
    echo ($_GET['id']);
?>">See All</a>
          </div>
        </div>
      </div>
    </div>
    <hr>
  <div class="row">
    <div class="col-lg-4 col-md-6 col-sm-12">
        <a role="button" href="?arena=&id=<?php echo($_GET['id']) ?>" style="width: 100%; margin-bottom: 10px;" class="btn btn-primary btn-lg">Arena</a>
      </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <a role="button" href="?standings=&id=<?php echo($_GET['id']) ?>" style="width: 100%; margin-bottom: 10px;" class="btn btn-dark btn-lg">Standings</a>
      </div>

<div class="col-lg-4 col-md-6 col-sm-12">
        <a role="button" href="?mocktest=&id=<?php echo($_GET['id']) ?>" style="width: 100%; margin-bottom: 10px;" class="btn btn-info btn-lg">Test Link</a>
      </div>  </div>
  
    <?php 
    if(time() < strtotime($date_time)):?>
    <hr>
    <form style="max-width: 500px" method="post" action="">
      <div class="form-group">
        <label>
          Name
        </label>
        <input type="hidden" class="form-control" name="id" value="<?php
    echo ($_GET['id']);
?>" required="">
        <input type="text" class="form-control" name="name" value="<?php
    echo ($name);
?>" required="">
      </div>
      <div class="form-group">
        <label>
          Date & Time
        </label>
        <input type="datetime-local" class="form-control" name="date_time"  value="<?php
    echo date('Y-m-d\TH:i:s', strtotime($date_time));
?>" required="">
      </div>

      <div class="form-group">
        <label>
          Duration
        </label>
        <input type="number" min="5" max="300" value="<?php
    echo ($duration);
?>" class="form-control" name="duration" required="">
      </div>

      <div class="form-group">
        <label>
          Penalty for Wrong Answer
        </label>
        <input type="number" min="0" max="1" value="<?php
    echo ($penalty);
?>" step="0.01" class="form-control" name="penalty" required="">
      </div>
      <div class="form-group">
        <input type="checkbox" name="published" <?php
    if ($published == 1)
        echo "checked";
?>> Published
      </div>
      <button type="submit" name="update_mocktest" class="btn btn-primary btn-md">Update</button>
    </form>
  <?php endif ?>
  

<div class="modal" id="addParticipant">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="?edit=&id=<?php echo($_GET['id']) ?>" method="post">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Add Participant</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <input type="text" name="user" class="form-control" required="" placeholder="Username">
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" name="add_participant" class="btn btn-primary">Add</button>
          <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        </div>

      </form>

    </div>
  </div>
</div>

<div class="modal" id="addAuthor">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="?edit=&id=<?php echo($_GET['id']) ?>" method="post">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Add Author</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <input type="text" name="user" class="form-control" required="" placeholder="Username">
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" name="add_author" class="btn btn-primary">Add</button>
          <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        </div>

      </form>

    </div>
  </div>
</div>

<div class="modal" id="addQuestion">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="?edit=&id=<?php echo($_GET['id']) ?>" method="post">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Add Question</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <label style="font-size: 15px" for="questions">
              Question
            </label>
            <input style="font-size: 14px" placeholder="Question" class="form-control" type="text" name="question" required="">
          </div>
          <hr>
          <div class="form-group">
            <label style="font-size: 15px" for="option_a">
              Option #A
            </label>
            <input style="font-size: 14px" placeholder="Option #A" class="form-control" type="text" name="option_a" required="">
            <br><div style="font-size: 14px"> <input type="checkbox" name="is_a"> Correct Answer</div>
          </div>
          <hr>
          <div class="form-group">
            <label style="font-size: 15px" for="option_b">
              Option #B
            </label>
            <input style="font-size: 14px" placeholder="Option #B" class="form-control" type="text" name="option_b" required="">
            <br><div style="font-size: 14px"> <input type="checkbox" name="is_b"> Correct Answer</div>
          </div>
          <hr>
          <div class="form-group">
            <label style="font-size: 15px" for="option_c">
              Option #C
            </label>
            <input style="font-size: 14px" placeholder="Option #C" class="form-control" type="text" name="option_c" required="">
            <br><div style="font-size: 14px"> <input type="checkbox" name="is_c"> Correct Answer</div>
          </div>
          <hr>
          <div class="form-group">
            <label style="font-size: 15px" for="option_d">
              Option #D
            </label>
            <input style="font-size: 14px"  placeholder="Option #D" class="form-control" type="text" name="option_d" required="">
            <br><div style="font-size: 14px"> <input type="checkbox" name="is_d"> Correct Answer</div>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" name="add_question" class="btn btn-primary">Add</button>
          <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        </div>

      </form>

    </div>
  </div>
</div>
</div>

  <hr><div class="container-fluid" style="font-size: 16px; font-family: UbuntuMono-R; padding-left: 6%; padding-right: 6%">

  <center style="font-family: UbuntuMono-R;">Durjoy Admission Aid<br>
  Developed by Emrul Chowdhury</center>
  </div>



  <?php
    die();
}
?>