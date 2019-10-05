<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$sch_yr = $_POST['title'];

		$sql = "INSERT INTO school_year (school_year) VALUES ('$sch_yr')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Season added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	

	elseif(isset($_POST['edit'])){
		$id = $_POST['id'];
		$title = $_POST['title'];

		$sql = "UPDATE school_year SET school_year = '$title' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Season updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	
	elseif(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM school_year WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Season deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: season.php');
	
?>