<?php

include('databaseconn.php');

$query = "SELECT * FROM tbl_university ORDER BY type DESC";

if(!isset($_SESSION['admin'])) {

	$query = "SELECT * FROM tbl_university WHERE visiblity = 'true' ORDER BY type DESC";

}



$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) > 0) {

	echo "<tbody>";

	while($row = mysqli_fetch_assoc($result)) {

				echo "<tr>";

				if(!isset($_SESSION['admin']))

					echo '<td align="center"><img style="max-width: 50px; max-height: 50px" src="'. $row['logo_link']. '"></td>';



				echo '<td>' . $row['name'] . ' (' . $row['acronym'] . ') ';

				if(isset($_SESSION['username'])) {



					$qr = 'SELECT * FROM tbl_university_seen WHERE username = ' ."'". $_SESSION['username'] . "'" . " and uni_id = ". $row['id'];

					$res = mysqli_query($db, $qr);

					//echo $qr;

					if(mysqli_num_rows($res) == 0) {

						echo '<span class="label label-default">New</span>';

						$qr = "INSERT INTO tbl_university_seen (username, uni_id) VALUES('". $_SESSION['username'] . "', " . $row['id'] .")";

					// echo $qr;

						$res = mysqli_query($db, $qr);

					}

				}

				echo "</td>";



				echo '<td><span class="label label-default" style="font-family: Ubuntu-B">'. $row['type'] . "<span></td>";

				echo "<td>" . $row['established'] . "</td>";

				echo "<td>" . $row['location'] . "</td>";

				echo "<td>" . $row['specialization'] . "</td>";

				?>

<td>

	<form style="float: left; padding: 3px" action="university" method="get">

		<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">

		<button type="submit" class="btn btn-success btn-md"



		<?php

					if(!isset($_SESSION['admin'])) echo 'style="width: 130px;"';

		?>





		><span class="glyphicon glyphicon-option-horizontal"

				aria-hidden="true" title="View Details"></span>



			<?php

					if(!isset($_SESSION['admin'])) echo " View Details";

				?>



		</button>

	</form>

	<form style="float: left; padding: 3px"><a target="_blank" href="<?php echo $row['web_link']; ?>"

			role="button" class="btn btn-primary btn-md"







		<?php

					if(!isset($_SESSION['admin'])) echo 'style="width: 130px;"';

		?>





			><span class="glyphicon glyphicon-globe" title="Visit Website"></span>

			<?php

					if(!isset($_SESSION['admin'])) echo " Visit Website";

				?> </a></form>



	<!-- Visiblity -->



	<?php if(isset($_SESSION['admin'])): ?>

	<form style="float: left; padding: 3px" action="" method="post">

		<?php if($row['visiblity'] == 'true') {

															echo '<button type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#vis' . $row['id'] . '"><span class="glyphicon glyphicon-eye-close" title="Set Invisible"></button>';

														} 

														else { 

															echo '<button type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#vis' . $row['id'] . '"><span class="glyphicon glyphicon-eye-open" title="Set Visible"></button>';

						} ?>





		<input type="hidden" id="name" name="name" value="<?php echo $row['name']; ?>">



		<div class="modal fade" id="vis<?php echo($row['id'])?>" role="dialog">

			<div class="modal-dialog">



				<!-- Modal content-->

				<div class="modal-content">

					<div class="modal-header">

						<button type="button" class="close" data-dismiss="modal">&times;</button>

						<h4 class="modal-title">Confirm Action</h4>

					</div>

					<div class="modal-body">

						<?php if($row['visiblity'] == 'true') {

												echo '<p>Are you sure you want to invisible information of <b>' . $row['name'] . '</b>?</p>';

											}

											else {

												echo '<p>Are you sure you want to visible information of <b>' . $row['name'] . '</b>?</p>';

											}?>



					</div>

					<div class="modal-footer">

						<?php if($row['visiblity'] == 'true') {

															echo '<button type="submit" class="btn btn-warning btn-md" name="set_invisible_university">Yes</button>';

														} 

														else { 

															echo '<button type="submit" class="btn btn-warning btn-md" name="set_visible_university">Yes</button>';

											} ?>

						<button type="button" class="btn btn-default" data-dismiss="modal">No</button>

					</div>

				</div>



			</div>

		</div>

	</form>

	<?php endif?>



	<?php if(isset($_SESSION['admin'])):?>

	<form class="" style="float: left; padding: 3px" method="post" action="" enctype="multipart/form-data">

		<input type="hidden" id="name" name="name" value="<?php echo $row['name']; ?>">





		<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#upd<?php echo($row['id'])?>"><span

				class="glyphicon glyphicon-edit" title="Update"></span></button>

		<?php

										include('get_university_info.php');

									?>



		<div class="modal fade" id="upd<?php echo($row['id'])?>" role="dialog">

			<div class="modal-dialog">







				<!-- Modal content-->

				<div class="modal-content">

					<div class="modal-header">

						<button type="button" class="close" data-dismiss="modal">&times;</button>

						<h4 class="modal-title">Update Information of

							<?php

									echo $name;?>

						</h4>

					</div>

					<div class="modal-body">

						<div class="container-fluid">

							<div class="row">

								<div class="col-lg-12">

									<input type="hidden" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php

									echo ($name);

							?>" />



									<div>

										<label style="font-family: Ubuntu-B;" for="type">Type:</label>

										<select class="form-control" style="width: 100%" id="type" name="type">

											<?php

									$types = array(

											"Public",

											"Private",

											"International"

									);

									for ($i = 0; $i < count($types); $i++) {

											echo '<option value="' . $types[$i] . '"';

											

											if ($types[$i] == $type)

													echo 'selected = ""';

											echo ">" . $types[$i] . "</option>\n";

									}

							?>

										</select>

									</div>



									<div style="margin-top: 15px">

										<label style="font-family: Ubuntu-B;" for="acronym">Acronym:</label> <input type="text" class="form-control" id="acronym"

											placeholder="Enter acronym" style="width: 100%" name="acronym" value="<?php

									echo ($acronym);

							?>" />

									</div>



									<div style="margin-top: 15px">

										<label style="font-family: Ubuntu-B;" for="established">Established:</label> <input type="number" class="form-control" style="width: 100%" id="established"

											placeholder="Enter establishment year" name="established" value="<?php

									echo ($established);

							?>" />

									</div>



									<div style="margin-top: 15px">

										<label style="font-family: Ubuntu-B;" for="location">Location:</label> <input type="text" class="form-control" style="width: 100%" id="location"

											placeholder="Enter location" name="location" value="<?php

									echo ($location);

							?>" />

									</div>



									<div style="margin-top: 15px">

										<label style="font-family: Ubuntu-B;" for="division">Division:</label>

										<select class="form-control" style="width: 100%" id="division" name="division">

											<!-- <option value="" selected="">Select One</option> -->

											<?php

									for ($i = 0; $i < count($divisions); $i++) {

											echo '<option value="' . $divisions[$i] . '"';

											if ($divisions[$i] == $division)

													echo 'selected = ""';

											echo ">" . $divisions[$i] . "</option>\n";

									}

							?>

										</select>

									</div>

									<div style="margin-top: 15px">

										<label style="font-family: Ubuntu-B;" for="specialization">Specialization:</label>

										<select class="form-control" style="width: 100%" id="specialization" name="specialization">

											<?php

									for ($i = 0; $i < count($specializations); $i++) {

											echo '<option value="' . $specializations[$i] . '"';

											if ($specializations[$i] == $specialization)

													echo 'selected = ""';

											echo ">" . $specializations[$i] . "</option>\n";

									}

							?>

										</select>

									</div>



									<div style="margin-top: 15px">

										<label style="font-family: Ubuntu-B;" for="phd_granting">PhD Granting:</label>

										<select class="form-control" style="width: 100%" id="phd_granting" name="phd_granting">

											<?php

									$phd_grantings = array(

											"Yes",

											"No"

									);

									for ($i = 0; $i < count($phd_grantings); $i++) {

											echo '<option value="' . $phd_grantings[$i] . '"';

											

											if ($phd_grantings[$i] == $phd_granting)

													echo 'selected = ""';

											echo ">" . $phd_grantings[$i] . "</option>\n";

									}

							?>

										</select>

									</div>



									<div style="margin-top: 15px">

										<label style="font-family: Ubuntu-B;" for="map_link">Map Embeded HTML Code:</label> <input type="text" class="form-control" style="width: 100%" id="map_link"

											placeholder="Enter map embeded HTML code" name="map_link" value='<?php

									echo ($map_link);

							?>' />

									</div>



									<div style="margin-top: 15px">

										<label style="font-family: Ubuntu-B;" for="circular">Logo Link:</label> <input type="file" class="form-control" style="width: 100%" id="logo_link"

											name="logo_link" />

									</div>



									<div style="margin-top: 15px">

										<label style="font-family: Ubuntu-B;" for="web_link">Web Link:</label> <input type="text" class="form-control" style="width: 100%" id="web_link"

											placeholder="Enter web link" name="web_link" value="<?php

									echo ($web_link);

							?>" />

									</div>

								</div>

							</div>

						</div>

					</div>

					<div class="modal-footer">

						<button type="submit" class="btn btn-info btn-md" name="update_fi_university">Update</button>

						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

					</div>

				</div>

			</div>

		</div>

	</form>



	<?php endif?>





	<?php if(isset($_SESSION['admin'])):?>

	<form style="float: left; padding: 3px" action="" method="post">



		<button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#del<?php echo($row['id'])?>"><span

				class="glyphicon glyphicon-trash" title="Delete"></button>



		<input type="hidden" id="name" name="name" value="<?php echo $row['name']; ?>">



		<div class="modal fade" id="del<?php echo($row['id'])?>" role="dialog">

			<div class="modal-dialog">



				<!-- Modal content-->

				<div class="modal-content">

					<div class="modal-header">

						<button type="button" class="close" data-dismiss="modal">&times;</button>

						<h4 class="modal-title">Confirm Delete</h4>

					</div>

					<div class="modal-body">

						<p>Are you sure you want to delete information of <b>

								<?php echo($row['name']) ?></b>?</p>

					</div>

					<div class="modal-footer">

						<button type="submit" class="btn btn-danger btn-md" name="delete_university">Yes</button>

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