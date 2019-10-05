<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$filename = $_FILES['photo']['name'];
		$rd = rand(00000,99999);
		$filename = $filename.$rd;
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		//creating user
		$sql = "INSERT INTO admin (username, password, firstname, lastname, photo, created_on) VALUES ('$username', '$password', '$firstname', '$lastname', '$filename', NOW())";
		if($conn->query($sql)){
			$_SESSION['success'] = 'New user added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}	

	elseif(isset($_POST['save'])){
		$id = $_POST['id'];
		$editusername = $_POST['username'];
		$editfirstname = $_POST['firstname'];
		$editlastname = $_POST['lastname'];
			$sql = "UPDATE admin SET username = '$editusername', firstname = '$editfirstname', lastname = '$editlastname' WHERE id = '$id' ";
			if($conn->query($sql)){
				$_SESSION['success'] = 'User profile updated successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
	}	
	
	elseif(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM admin WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'User deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}	

	header('location: users.php');

?>