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

		$id = $_GET["id"];

	if (isset($_POST['submit']))
	{
	

		$title = $_POST['title'];
		$anotation = $_POST['anotation'];
		$description = $_POST['description'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		$type = $_POST['type'];
		$include = $_POST['include'];

		$result = mysql_query("UPDATE fcalendar SET title = '$title', anotation = '$anotation', description = '$description', start = '$start', end = '$end', type = '$type', include = '$include' WHERE id = '$id'");
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
		<?php
			$action = $_GET["action"];
			switch ($action) 
			{
				case 'view':
		$result = mysql_query("SELECT * FROM fcalendar WHERE id='$id'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						'
 						<ul id="red">
							<li class="active"><a href="view_event.php?action=view&id='.$id.'">Вигляд</a></li>
							<li><a href="view_event.php?action=edit&id='.$id.'">Редагувати</a></li>
						</ul>
 						<h1>'.$row["title"].'</h1>
 						<h5>Тип події</h5>
 						<p>'.$row["type"].'</p>
 						<h5>Період</h5>
 						<p>'.$row["start"].' - <br> '.$row["end"].'</p>
 						';
 						echo $row["description"];
 						echo 
 						'
 						<h5>Вкладення</h5>
 						<p>'.$row["include"].'</p>
 						';
 						
 					}
    				while ($row = mysql_fetch_array($result));
				}
					break;

					case 'edit':
					echo '
					<ul id="red">
							<li><a href="view_event.php?action=view&id='.$id.'">Вигляд</a></li>
							<li class="active"><a href="view_event.php?action=edit&id='.$id.'">Редагувати</a></li>
						</ul>
					<h1>Редагування</h1>				
		<form method="post">
		';
		$result = mysql_query("SELECT * FROM fcalendar WHERE id='$id'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo 
 						'
							<label>Заголовок</label>
							<br><br>
							<input type="text" name="title" value="'.$row["title"].'">
							<br><br>
							<label>Тип події</label>
							<br><br>
							<input type="text" name="type" value="'.$row["type"].'">
 							<br><br>
							<label>Початок</label>
							<br><br>
							<input type="text" name="start" value="'.$row["start"].'">
							<br><br>
							<label>Кінець</label>
							<br><br>
							<input type="text" name="end" value="'.$row["end"].'">
							<br><br>
							<label>Анотація</label>
							<br><br>
 							<textarea name="anotation">'.$row["anotation"].'</textarea>
 							<br><br>
							<label>Подія</label>
							<br><br>
 							<textarea name="description">'.$row["description"].'</textarea>
 							<br><br>
							<label>Вкладення</label>
							<br><br>
 							<textarea name="include">'.$row["include"].'</textarea>
 						';
 						
 					}
    				while ($row = mysql_fetch_array($result));
				}
		echo '
			<br>
			<input type="submit" name="submit" value="Зберегти">
		</form>
			';
			break;	
				default:
					$result = mysql_query("SELECT * FROM fcalendar WHERE id='$id'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						'
 						<ul id="red">
							<li class="active"><a href="view_event.php?action=view&id='.$id.'">Вигляд</a></li>
							<li><a href="view_event.php?action=edit&id='.$id.'">Редагувати</a></li>
						</ul>
 						<h1>'.$row["title"].'</h1>
 						<h5>Тип події</h5>
 						<p>'.$row["type"].'</p>
 						<h5>Період</h5>
 						<p>'.$row["start"].' -<br> '.$row["end"].'</p>
 						';
 						echo $row["description"];
 						echo 
 						'
 						<h5>Вкладення</h5>
 						<p>'.$row["include"].'</p>
 						';
 					}
    				while ($row = mysql_fetch_array($result));
				}
					break;
			}
		?>
	</div>
	<footer id="foot">
		<?php
			include("include/block-footer.php");
		?>
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