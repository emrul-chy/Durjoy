<?php

include('databaseconn.php');

if (!isset($_SESSION['admin'])) {

    $query = "SELECT * FROM tbl_university WHERE visiblity = 'true'";

}

else {

		$query = "SELECT * FROM tbl_university WHERE (visiblity = 'true' or visiblity='false')";

}



if (isset($_GET['type']) && $_GET['type'] != 'Any') {

    $type  = htmlentities($_GET['type']);

    $query .= " and type = '$type'";

}





if (isset($_GET['division']) && $_GET['division'] != 'Any') {

    $division  = htmlentities($_GET['division']);

    $query .= " and division = '$division'";

}



if (isset($_GET['specialization']) && $_GET['specialization'] != 'Any') {

    $specialization  = htmlentities($_GET['specialization']);

    $query .= " and specialization = '$specialization'";

}


$query .= " ORDER BY name ASC";


$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) > 0) {

    echo "<tbody>";

    while ($row = mysqli_fetch_assoc($result)) {

        echo "<tr>";

            echo '<td align="center"><img style="max-width: 50px; max-height: 50px" src="' . $row['logo_link'] . '"></td>';

        

        echo '<td>' . $row['name'] . ' (' . $row['acronym'] . ') ';

        /*if (isset($_SESSION['username'])) {

            $qr  = 'SELECT * FROM tbl_university_seen WHERE username = ' . "'" . $_SESSION['username'] . "'" . " and uni_id = " . $row['id'];

            $res = mysqli_query($db, $qr);

            //echo $qr;

            if (mysqli_num_rows($res) == 0) {

                echo '<span class="label label-default">New</span>';

                $qr  = "INSERT INTO tbl_university_seen (username, uni_id) VALUES('" . $_SESSION['username'] . "', " . $row['id'] . ")";

                // echo $qr;

                $res = mysqli_query($db, $qr);

            }

        }*/

        echo "</td>";

        echo "<td>" . $row['established'] . "</td>";

?>

<td>

	<form style="float: left; padding: 3px" action="university" method="get">

		<input type="hidden" id="id" name="id" value="<?php

        echo $row['id'];

?>">

		<button style="font-size: 14px" style="font-size: 14px" type="submit" class="btn btn-success btn-md"



		<?php

        if (!isset($_SESSION['admin']))

            echo 'style="width: 130px;"';

?>





		>



			<?php

        if (!isset($_SESSION['admin']))

            echo "Details";

        else echo '<span class="fa fa-info-circle"

				aria-hidden="true" title="View Details"></span>';

?>



		</button>

	</form>

	<form style="float: left; padding: 3px"><a target="_blank" href="<?php

        echo $row['web_link'];

?>"

			role="button" style="font-size: 14px" class="btn btn-primary btn-md"







		<?php

        if (!isset($_SESSION['admin']))

            echo 'style="width: 130px;"';

?>





			>

			<?php

        if (!isset($_SESSION['admin']))

            echo "Website";

        else

        	echo '<span class="fa fa-globe" title="Visit Website"></span>';

?> </a></form>



	<!-- Visiblity -->



	<?php

        if (isset($_SESSION['admin'])):

?>

	<form style="float: left; padding: 3px" action="" method="post">

		<?php

            if ($row['visiblity'] == 'true') {

                echo '<button style="font-size: 14px" type="button" class="btn btn-dark btn-md" data-toggle="modal" data-target="#vis' . $row['id'] . '"><span class="fa fa-eye-slash" title="Set Invisible"></button>';

            } else {

                echo '<button style="font-size: 14px" type="button" class="btn btn-dark btn-md" data-toggle="modal" data-target="#vis' . $row['id'] . '"><span class="fa fa-eye" title="Set Visible"></button>';

            }

?>





		<input type="hidden" id="name" name="name" value="<?php

            echo $row['name'];

?>">



		<div class="modal fade" id="vis<?php

            echo ($row['id']);

?>" role="dialog">

			<div class="modal-dialog">



				<!-- Modal content-->

				<div class="modal-content">

					<div class="modal-header">

						<h6 class="modal-title">Confirm Action</h6>

						<button style="font-size: 14px" type="button" class="close" data-dismiss="modal" aria-label="Close">

          		<span aria-hidden="true">&times;</span>

        		</button>

					</div>

					<div class="modal-body">

						<?php

            if ($row['visiblity'] == 'true') {

                echo '<p>Are you sure you want to invisible information of <b>' . $row['name'] . '</b>?</p>';

            } else {

                echo '<p>Are you sure you want to visible information of <b>' . $row['name'] . '</b>?</p>';

            }

?>



					</div>

					<div class="modal-footer">

						<?php

            if ($row['visiblity'] == 'true') {

                echo '<button style="font-size: 14px" type="submit" class="btn btn-primary btn-md" name="set_invisible_university">Yes</button>';

            } else {

                echo '<button style="font-size: 14px" type="submit" class="btn btn-primary btn-md" name="set_visible_university">Yes</button>';

            }

?>

						<button style="font-size: 14px" type="button" class="btn btn-dark" data-dismiss="modal">No</button>

					</div>

				</div>



			</div>

		</div>

	</form>

	<?php

        endif;

?>



	<?php

        if (isset($_SESSION['admin'])):

?>

	<form class="" style="float: left; padding: 3px" method="post" action="" enctype="multipart/form-data">

		<input type="hidden" id="name" name="name" value="<?php

            echo $row['name'];

?>">





		<button style="font-size: 14px" type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#upd<?php

            echo ($row['id']);

?>"><span

				class="fa fa-edit" title="Update"></span></button>

		<?php

            include('get_university_info.php');

?>



		<div class="modal fade" id="upd<?php

            echo ($row['id']);

?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

			<div class="modal-dialog" role="document">

				<!-- Modal content-->

				<div class="modal-content">

					<div class="modal-header">

						<h6 class="modal-title">Update Information of

							<?php

            echo $name;

?>

						</h6>

						<button style="font-size: 14px" type="button" class="close" data-dismiss="modal" aria-label="Close">

          		<span aria-hidden="true">&times;</span>

        		</button>

					</div>

					<div class="modal-body">

						<div class="container-fluid">

							<div class="row">

								<div class="col-lg-12">

									<input type="hidden" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php

            echo ($name);

?>" />



									<div>

										<label for="type">Type:</label>

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

										<label for="acronym">Acronym:</label> <input type="text" class="form-control" id="acronym"

											placeholder="Enter acronym" style="width: 100%" name="acronym" value="<?php

            echo ($acronym);

?>" />

									</div>



									<div style="margin-top: 15px">

										<label for="established">Established:</label> <input type="number" class="form-control" style="width: 100%" id="established"

											placeholder="Enter establishment year" name="established" value="<?php

            echo ($established);

?>" />

									</div>



									<div style="margin-top: 15px">

										<label for="location">Location:</label> <input type="text" class="form-control" style="width: 100%" id="location"

											placeholder="Enter location" name="location" value="<?php

            echo ($location);

?>" />

									</div>



									<div style="margin-top: 15px">

										<label for="division">Division:</label>

										<select class="form-control" style="width: 100%" id="division" name="division">

											<!-- <option value="" selected="">Select One</option> -->

											<?php

            for ($i = 0; $i < count($divisions); $i++) {

                echo '<option value="' . $divisions[$i] . '"';

                if (strtolower($divisions[$i]) == strtolower($division))

                    echo 'selected = ""';

                echo ">" . $divisions[$i] . "</option>\n";

            }

?>

										</select>

									</div>

									<div style="margin-top: 15px">

										<label for="specialization">Specialization:</label>

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

										<label for="phd_granting">PhD Granting:</label>

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

										<label for="map_link">Map Embeded HTML Code:</label> <input type="text" class="form-control" style="width: 100%" id="map_link"

											placeholder="Enter map embeded HTML code" name="map_link" value='<?php

            echo ($map_link);

?>' />

									</div>



									<div style="margin-top: 15px">

										<label for="circular">Logo Link:</label> <input type="file" class="form-control" style="width: 100%" id="logo_link"

											name="logo_link" />

									</div>



									<div style="margin-top: 15px">

										<label for="web_link">Web Link:</label> <input type="text" class="form-control" style="width: 100%" id="web_link"

											placeholder="Enter web link" name="web_link" value="<?php

            echo ($web_link);

?>" />

									</div>

								</div>

							</div>

						</div>

					</div>

					<div class="modal-footer">

						<button style="font-size: 14px" type="submit" class="btn btn-primary btn-md" name="update_fi_university">Update</button>

						<button style="font-size: 14px" type="button" class="btn btn-dark btn-md" data-dismiss="modal">Cancel</button>

					</div>

				</div>

			</div>

		</div>

	</form>



	<?php

        endif;

?>





	<?php

        if (isset($_SESSION['admin'])):

?>

	<form style="float: left; padding: 3px" action="" method="post">



		<button style="font-size: 14px" type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#del<?php

            echo ($row['id']);

?>"><span

				class="fa fa-trash" title="Delete"></button>



		<input type="hidden" id="id" name="id" value="<?php

            echo $row['id'];

?>">



		<div class="modal fade" id="del<?php

            echo ($row['id']);

?>" role="dialog">

			<div class="modal-dialog" role="document">



				<!-- Modal content-->

				<div class="modal-content">

					<div class="modal-header">

						<h6 class="modal-title">Confirm Delete</h6>

						<button style="font-size: 14px" type="button" class="close" data-dismiss="modal" aria-label="Close">

          		<span aria-hidden="true">&times;</span>

        		</button>

					</div>

					<div class="modal-body">

						<p>Are you sure you want to delete information of <b>

								<?php

            echo ($row['name']);

?></b>?</p>

					</div>

					<div class="modal-footer">

						<button style="font-size: 14px" type="submit" class="btn btn-primary btn-md" name="delete_university">Yes</button>

						<button style="font-size: 14px" type="button" class="btn btn-dark btn-md" data-dismiss="modal">No</button>

					</div>

				</div>



			</div>

		</div>

	</form>

	<?php

        endif;

?>

</td>

<?php

        echo "</tr>";

    }

    echo "</tbody>";

}

?>