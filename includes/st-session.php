<?php
	session_start();
	include 'includes/conn.php';

	if(!isset($_SESSION['student']) || trim($_SESSION['student']) == ''){
		header('location: index.php');
	}

	$sql = "SELECT * FROM students WHERE id = '".$_SESSION['student']."'";
	$query = $conn->query($sql);
	$stuser = $query->fetch_assoc();
	
?>