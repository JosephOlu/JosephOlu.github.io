<?php
$db = mysqli_connect('localhost', 'root', 'onthetable','todolist');

$task = '';
$date = '';
$time = '';
$id = 0;

if(isset($_POST['add'])){
	$task = $_POST['task'];
	$date = $_POST['taskDate'];
	$time = $_POST['taskTime'];
	mysqli_query($db, "INSERT INTO tasks (task, taskDate, taskTime) VALUES ('$task', '$date', '$time')");
	header('location: index.php');
}

if(isset($_POST['save'])){
	$id = $_GET['edit'];
	$task = $_POST['task'];
	mysqli_query($db, "UPDATE tasks SET task = '$task', taskDate = '$date', taskTime = '$time' where id= $id");
	header('location: index.php');
}

if(isset($_GET['del'])){
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM tasks where id = $id");
	header('location: index.php');
}

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$results = mysqli_query($db, "SELECT * from tasks where id = $id");
	$row = mysqli_fetch_array($results);
	$task = $row['task'];
}


?>