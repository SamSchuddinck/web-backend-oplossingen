<?php 
	session_start();
	if(isset($_POST['submit']))
	{
		if($_POST['description'] != '')
		{
			$_SESSION['todos'][] = $_POST['description'];
		}
	}
	if(isset($_GET['done']))
	{
		$_SESSION['done'][] = $_SESSION['todos'][$_GET['done']];
		unset($_SESSION['todos'][$_GET['done']]);
		header('location: index.php');
	}
	if(isset($_GET['delete']))
	{
		if($_GET['type'] == 'todo')
		{
			unset($_SESSION['todos'][$_GET['delete']]);
			header('location: index.php');
		}
		elseif($_GET['type'] == 'done')
		{
			unset($_SESSION['done'][$_GET['delete']]);
			header('location: index.php');
		}
	}
	if(isset($_GET['todo']))
	{
		$_SESSION['todos'][] = $_SESSION['done'][$_GET['todo']];
		unset($_SESSION['done'][$_GET['todo']]);
		header('location: index.php');
	}

	if(!isset($_SESSION['todos']) && !isset($_SESSION['done']))
	{
		$message = "Je hebt nog geen TODO's toegevoegd. Zo weinig werk of meesterplanner?";
	}

	if(isset($_SESSION['todos']) && isset($_SESSION['done']))
	{
		if($_SESSION['todos'] == null && $_SESSION['done'] == null)
		{
			$message = "Je hebt nog geen TODO's toegevoegd. Zo weinig werk of meesterplanner?";
		}
	} 

 ?>
<!doctype html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>To Do App</title>
</head>
<body>
	<h1>Todo App</h1>
	<?php if(isset($message) && $message != null): ?>
		<p><?= $message ?></p>
	<?php else: ?>
		<h3>Nog te doen</h3>
		<?php if($_SESSION['todos'] != null): ?>
			<ol>
				<?php foreach ($_SESSION['todos'] as $key => $todo): ?>
				<li><a class="todo" href="index.php?done=<?= $key ?>"><?= $todo ?></a> - <a class="remove" href="index.php?delete=<?= $key ?>&type=todo">Verwijder</a></li>
				<?php endforeach; ?>
			</ol>
		<?php else: ?>
			<p>Schouderklopje, alles is gedaan!</p>
		<?php endif; ?>
		<h3>Done and done!</h3>
		<?php if(isset($_SESSION['done']) && $_SESSION['done'] != null) : ?>
			<ol>
				<?php if(isset($_SESSION['done']) && $_SESSION['done'] != null) : ?>
					<?php foreach ($_SESSION['done'] as $key => $done): ?>
					<li><a class="done" href="index.php?todo=<?= $key ?>"><?= $done ?></a> - <a class="remove" href="index.php?delete=<?= $key ?>&type=done">Verwijder</a></li>
					<?php endforeach; ?>
				<?php endif; ?>
			</ol>
		<?php else : ?>
			<p>Werk aan de winkel!</p>
		<?php endif; ?>
	<?php endif; ?>
	<h2>Todo toevoegen</h2>
	<form action="index.php" method="post">
		<label for="description">Beschrijving:</label>
		<input name="description" type="text"><br>
		<input type="submit" name="submit" value="Toevoegen">
	</form>
</body>
</html>