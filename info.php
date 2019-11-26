<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="shortcut icon" href="assests/favicon.ico" />
	<style>
		@font-face {
    		font-family: Ubuntu-R;
    		src: url(assests/font/Ubuntu-R.ttf);
		}
		@font-face {
    		font-family: Ubuntu-B;
    		src: url(assests/font/Ubuntu-B.ttf);
		}
		* {
      		font-family: Ubuntu-R;
    	}
	</style>
	<title>University Information | Durjoy</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" href="assests/css/navbar.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<link rel="stylesheet" href="assests/css/navbar.css">
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
	

</head>

<body style="margin-bottom: 30px">

	<nav class="navbar navbar-default navbar-static-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a style="font-size: 32px; color: #333366; font-family: Ubuntu-B" class="navbar-brand" href="index">Durjoy</a>
			</div>
			<div style="font-size: 17px" class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li><a href="index">Home</a></li>

					<?php  if (isset($_SESSION['admin'])): ?>
					<li><a href="admin">Admin Panel</a></li>
					<?php endif?>
					<?php  if (!isset($_SESSION['admin']) && isset($_SESSION['username'])): ?>
					<li><a href="dashboard">Dashboard</a></li>
					<?php endif ?>

					<?php  if (isset($_SESSION['username'])): ?>
					<li><a href="profile">My Profile</a></li>
					<?php endif ?>
					<li><a href="announcement">
							Announcement</a></li>
					<li class="active"><a href="info">Universities of Bangladesh</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php  if (isset($_SESSION['username'])): ?>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>
							<?php echo $_SESSION['name'];?> <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li style="font-size: 18px"><a href="dashboard.php?logout='1'"><span class="glyphicon glyphicon-log-out"></span>
									Logout</a></li>
						</ul>
					</li>
				</ul>
				<?php  endif ?>
				<?php  if (!isset($_SESSION['username'])): ?>
				<li><a href="register"><span class="glyphicon glyphicon-user"></span> Register</a>
				</li>
				<li><a href="login"><span class="glyphicon glyphicon-log-in"></span> Login</a>
				</li>
				</ul>
				<?php  endif ?>
			</div>
		</nav>
	</div>

	<?php include('adminserver.php') ?>

	<div class="container-fluid">

		<?php include('success.php'); ?>
		<?php include('errors.php'); ?>
		<h3>Universities of Bangladesh <span style="font-size: 20px" class="badge">
				<?php include('count_university.php') ?></span></h3>

		<table id="university" class="table table-bordered table-hover table-striped">
			<thead>
				<tr>
					<?php if(!isset($_SESSION['admin'])): ?>
					<th>Logo</th>
					<?php endif; ?>
					<th>Name</th>
					<th>Type</th>
					<th>Estd.</th>
					<th>Location</th>
					<th>Specialization</th>
					<th>Action</th>
				</tr>
			</thead>
			<?php include('view_university.php') ?>
		</table>

	</div>

</body>
<!-- Footer -->

<!-- Footer -->

</html>

<script>
	$(document).ready(function () {
		$('#university').DataTable();
	});
</script>