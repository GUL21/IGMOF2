<?php
	session_start();
if ($_SESSION['auth_admin'] == "yes_auth")
{
     
       if (isset($_GET["logout"]))
    {
        unset($_SESSION['auth_admin']);
        header("Location: ../login.php");
    }
  $_SESSION['urlpage'] = "<a href='index.php' >Главная</a>";

	include("include/db_connect.php");

	$id = $_GET["news_id"];

	if (isset($_POST['submit']))
	{
		$title = $_POST['title'];
		$anotation = $_POST['anotation'];
		$main = $_POST['main'];

		$result = mysql_query("UPDATE news SET news_title = '$title', news_an = '$anotation', news_main = '$main' WHERE news_id = '$id'");
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Новини</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
		$result = mysql_query("SELECT * FROM news WHERE news_id='$id'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						'
 						<ul id="red">
							<li class="active"><a href="view_news.php?news_id='.$row["news_id"].'&action=view">Вигляд</a></li>
							<li><a href="view_news.php?news_id='.$row["news_id"].'&action=edit">Редагувати</a></li>
						</ul>
				<h1>'.$row["news_title"].'</h1>
				'.$row["news_main"].'
 						';

 					}
 					while ($row = mysql_fetch_array($result));
				}
				break;

				case 'edit':
		$result = mysql_query("SELECT * FROM news WHERE news_id='$id'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo '
					<ul id="red">
							<li><a href="view_news.php?news_id='.$row["news_id"].'&action=view">Вигляд</a></li>
							<li class="active"><a href="view_news.php?news_id='.$row["news_id"].'&action=edit">Редагувати</a></li>
						</ul>
					<h1>Редагування новини</h1>				
		<form method="post">
		';
 						echo 
 						'
							<label>Заголовок</label>
							<br><br>
							<input type="text" name="title" value="'.$row["news_title"].'">
							<br><br>
							<label>Анотація</label>
							<br><br>
 							<textarea name="anotation">'.$row["news_an"].'</textarea>
 							<br><br>
							<label>Текст</label>
							<br><br>
 							<textarea name="main">'.$row["news_main"].'</textarea>
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
					$result = mysql_query("SELECT * FROM news WHERE news_id='$id'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						'
 						<ul id="red">
							<li class="active"><a href="view_news.php?news_id='.$row["news_id"].'&action=view">Вигляд</a></li>
							<li><a href="view_news.php?news_id='.$row["news_id"].'&action=edit">Редагувати</a></li>
						</ul>
				<h1>'.$row["news_title"].'</h1>
				'.$row["news_main"].'
 						';

 					}
 					while ($row = mysql_fetch_array($result));
				}
				break;
			}
	?>
		</ul>
	</div>
	<footer id="foot">
	</footer>
	</div>
</body>
<script type="text/javascript">
	CKEDITOR.replace("anotation");
	CKEDITOR.replace("main");
</script>
</html>
<?php
}else
{
    header("Location: ../login.php");
}
?>