<?php
	session_start();
if ($_SESSION['auth_admin'] == "yes_auth")
{
  define('myeshop', true);
       
       if (isset($_GET["logout"]))
    {
        unset($_SESSION['auth_admin']);
        header("Location: ../login.php");
    }
  $_SESSION['urlpage'] = "<a href='index.php' >Главная</a>";

	include("include/db_connect.php");

	if (isset($_POST['add']))
	{
	
		$title = $_POST['title'];
		$anotation = $_POST['anotation'];
		$description = $_POST['description'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		$type = $_POST['type'];
		$include = $_POST['include'];

		$result = mysql_query("INSERT INTO fcalendar (title, anotation, description, start, end, type, include) VALUES('$title', '$anotation', '$description', '$start', '$end', '$type', '$include')");
		header("events.php");
	}

	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Події</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
	<script src="js/jquery-1.7.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
</head>
<body>
	<div id="block-body">
	<header id="head">
		<div id="block-header">
			<?php
				include("include/block-header.php");
			?>
		</div>
	</header>
	<div id="block-left">
		<?php
			include("include/block-left.php");
		?>
	</div>
	<div id="block-right">
		<?php
			include("include/block-right.php");
		?>
	</div>
	<div id="block-content">
		<h1>Додати подію</h1>				
		<form method="post">
		
							<label>Заголовок</label>
							<br><br>
							<input type="text" name="title">
							<br><br>
							<label>Тип події</label>
							<br><br>
							<select name="type">
								<?php 
		$result = mysql_query("SELECT * FROM events_type",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						'
							<option>'.$row["event"].'</option>
 						';

 					}
 					while ($row = mysql_fetch_array($result));
				}
	?>
							</select>
 							<br><br>
							<label>Початок</label>
							<br><br>
							<input type="datetime-local" name="start">
							<br><br>
							<label>Кінець</label>
							<br><br>
							<input type="datetime-local" name="end">
							<br><br>
							<label>Анотація</label>
							<br><br>
 							<textarea name="anotation"></textarea>
 							<br><br>
							<label>Подія</label>
							<br><br>
 							<textarea name="description"></textarea>
 							<br><br>
							<label>Вкладення</label>
							<br><br>
 							<textarea name="include"></textarea>
			<br>
			<input type="submit" name="add" value="Додати">
		</form>
	</div>
	<footer id="foot">
	</footer>
	</div>
	<script type="text/javascript">
		CKEDITOR.replace("description");
		CKEDITOR.replace("include");
		CKEDITOR.replace("anotation");
	</script>
</body>
</html>
<?php
}else
{
    header("Location: ../login.php");
}
?>