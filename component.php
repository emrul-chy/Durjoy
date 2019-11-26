<?php 
	include('databaseconn.php');
	$query = "SELECT * FROM tbl_years";
	$result = mysqli_query($db, $query);
	$res = mysqli_num_rows($result);
	if($res > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$ssc_min = $row["ssc_min"];
			$ssc_max = $row["ssc_max"];
			$hsc_min = $row["hsc_min"];
			$hsc_max = $row["hsc_max"];
		}
	}

	$boards = array();
	$query = "SELECT * FROM tbl_boards";
	$result = mysqli_query($db, $query);
	$res = mysqli_num_rows($result);
	if($res > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			array_push($boards, $row["name"]);
		}
	}

	$groups = array();
	$query = "SELECT * FROM tbl_groups";
	$result = mysqli_query($db, $query);
	$res = mysqli_num_rows($result);
	if($res > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			array_push($groups, $row["name"]);
		}
	}

	$divisions = array();
	$query = "SELECT * FROM tbl_divisions";
	$result = mysqli_query($db, $query);
	$res = mysqli_num_rows($result);
	if($res > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			array_push($divisions, $row["name"]);
		}
	}

	$specializations = array();
	$query = "SELECT * FROM tbl_specializations";
	$result = mysqli_query($db, $query);
	$res = mysqli_num_rows($result);
	if($res > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			array_push($specializations, $row["name"]);
		}
	}
?>