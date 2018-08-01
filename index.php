<?php
include("server.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Todo list</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<form method="POST" action="">

	<div class="input-grp">
		<label>Task to do:</label>
		<input class="textIn" type="text" name="task" value="<?php echo $task ?>">
	</div>
	<div class="input-grp">
		<label>Date to complete it:</label>
		<input class="textIn" type="date" name="taskDate" value="<?php echo $date ?>">
	</div>
	<div class="input-grp">
		<label>At what time:</label>
		<input class="textIn" type="time" name="taskTime" value="<?php echo $time ?>">
	</div>

<div>
	<?php if(isset($_GET['edit'])): ?>
		<button type="submit" name="save">Update</button>
		<?php else: ?>
			<button type="submit" name="add">Add</button>
		<?php endif ?>
</div>
</form>



<table>
	<thead>
		<tr>
			<th class="header">Task</th>
			<th class="header">Deadline</th>
			<th class="header" span="2">modify</th>
		</tr>
	</thead>

<?php
	$resultsArray = mysqli_query($db, "SELECT * FROM tasks");
?>

	<tr>
		<?php while($row = mysqli_fetch_array($resultsArray)){ ?>
			<td><?php echo $row['task'] ?></td>
			<td><?php echo date('H:m', strtotime($row['taskTime'])).' on '.date('d/m', strtotime($row['taskDate'])) ?></td>
			<td>
				<a id="del" href="server.php?del=<?php echo $row['id'] ?>">Delete</a>			
				<a id="edit" href="index.php?edit=<?php echo $row['id'] ?>">Edit</a>
			</td>
		</td>
	</tr>
	<?php } ?>
</table>
</body>
</html>
