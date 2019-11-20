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

	if (isset($_POST['submit']))
	{
		$zagolovok = $_POST['title'];
		$anotation = $_POST['anotation'];

		$result = mysql_query("UPDATE texts SET title = '$zagolovok', main = '$anotation' WHERE text_id = '4'");
		header('location: uk_min_society.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Українське мінералогічне товариство</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
		$result = mysql_query("SELECT * FROM texts WHERE text_id='4'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						'
 						<ul id="red">
							<li class="active"><a href="uk_min_society.php?action=view">Вигляд</a></li>
							<li><a href="uk_min_society.php?action=edit">Редагувати</a></li>
						</ul>
 						<h1>'.$row["title"].'</h1>
 						';
 						echo $row["main"];
 						
 					}
    				while ($row = mysql_fetch_array($result));
				}
					break;

					case 'edit':
					echo '
					<ul id="red">
							<li><a href="uk_min_society.php?action=view">Вигляд</a></li>
							<li class="active"><a href="uk_min_society.php?action=edit">Редагувати</a></li>
						</ul>
					<h1>Українське мінералогічне товариство</h1>				
		<form method="post">
		';
		$result = mysql_query("SELECT * FROM texts WHERE text_id='4'",$link);  
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
							<label>Текст</label>
							<br><br>
 							<textarea name="anotation">'.$row["main"].'</textarea>
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
					$result = mysql_query("SELECT * FROM texts WHERE text_id='4'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						'
 						<ul id="red">
							<li class="active"><a href="uk_min_society.php?action=view">Вигляд</a></li>
							<li><a href="uk_min_society.php?action=edit">Редагувати</a></li>
						</ul>
 						<h1>'.$row["title"].'</h1>
 						';
 						echo $row["main"];
 						
 					}
    				while ($row = mysql_fetch_array($result));
				}
					break;
			}
		?>
	</div>
	<footer id="foot">
	</footer>
	</div>
		<script type="text/javascript">
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