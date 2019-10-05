<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$title = $_POST['title'];
		$firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
		$filename = $_FILES['photo']['name'];
		$rd = rand(00000,99999);
		$filename = $filename.$rd;
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		//creating user
		$sql = "INSERT INTO teachers (title, firstname, lastname, address, photo, created_on) VALUES ('$title', '$firstname', '$lastname', '$address', '$filename', NOW())";
		if($conn->query($sql)){
			$_SESSION['success'] = 'New teacher added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}	

	elseif(isset($_POST['save'])){
		$id = $_POST['id'];
		$edittitle = $_POST['title'];
		$editfirstname = $_POST['firstname'];
		$editlastname = $_POST['lastname'];
		$editaddress = $_POST['address'];
			$sql = "UPDATE teachers SET title = '$edittitle', firstname = '$editfirstname', lastname = '$editlastname', address = '$editaddress' WHERE id = '$id' ";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Teacher profile updated successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
	}	
	
	elseif(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM teachers WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Teacher deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
    }
    elseif(isset($_POST['upload'])){
		$id = $_POST['id'];
        $filename = $_FILES['photo']['name'];
        $rd = rand(00000,99999);
		$filename = $filename.$rd;
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		
		$sql = "UPDATE teachers SET photo = '$filename' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Teacher photo updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}	
	header('location: teacher.php');

?>