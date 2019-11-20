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
		$structure = $_POST['structure'];
		$diagnoz = $_POST['diagnoz'];
		$contacts = $_POST['contacts'];

		$result = mysql_query("UPDATE texts SET title = '$zagolovok', main = '$anotation' WHERE text_id = '9'");
		$result1 = mysql_query("UPDATE texts SET main = '$structure' WHERE text_id = '10'");
		$result2 = mysql_query("UPDATE texts SET main = '$diagnoz' WHERE text_id = '11'");
		$result3 = mysql_query("UPDATE texts SET main = '$contacts' WHERE text_id = '5'");
		header('location: comitet.php?action=view');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Комітет по метеоритах</title>
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
				echo 
				'
				<ul id="red">
							<li class="active"><a href="comitet.php?action=view">Вигляд</a></li>
							<li><a href="comitet.php?action=edit">Редагувати</a></li>
						</ul>
				';
				$result = mysql_query("SELECT * FROM texts WHERE text_id='9'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo 
 						'
 							<h1>'.$row["title"].'</h1>
 							<h3>Головна</h3>
 							'.$row["main"].'<br>
 						';
 						}
    				while ($row = mysql_fetch_array($result));
				}
				$result1 = mysql_query("SELECT * FROM texts WHERE text_id='10'",$link);  
	 				if (mysql_num_rows($result1) > 0)
					{
 						$row1 = mysql_fetch_array($result1); 
 
 					do
 					{
 						echo 
 						'
 							<h3>Структура</h3>
 							'.$row1["main"].'<br>
 						';
 						}
    				while ($row1 = mysql_fetch_array($result1));
				}
				$result2 = mysql_query("SELECT * FROM texts WHERE text_id='11'",$link);  
	 				if (mysql_num_rows($result2) > 0)
					{
 						$row2 = mysql_fetch_array($result2); 
 
 					do
 					{
 						echo 
 						'
 							<h3>Порядок діагностики</h3>
 							'.$row2["main"].'<br>
 						';
 						}
    				while ($row2 = mysql_fetch_array($result2));
				}
				$result3 = mysql_query("SELECT * FROM texts WHERE text_id='5'",$link);  
	 				if (mysql_num_rows($result3) > 0)
					{
 						$row3 = mysql_fetch_array($result3); 
 
 					do
 					{
 						echo 
 						'
 							<h3>Контакти</h3>
 							'.$row3["main"].'<br>
 						';
 						}
    				while ($row3 = mysql_fetch_array($result3));
				}
				break;
			

					case 'edit':
					echo '
					<ul id="red">
							<li><a href="comitet.php?action=view">Вигляд</a></li>
							<li class="active"><a href="comitet.php?action=edit">Редагувати</a></li>
						</ul>
					<h1>Комітет по метеоритах</h1>				
		<form action="comitet.php" method="post">
		';
		$result = mysql_query("SELECT * FROM texts WHERE text_id='9'",$link);  
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
							<label>Головна</label>
							<br><br>
 							<textarea name="anotation">'.$row["main"].'</textarea>
 						';
 						
 					}
    				while ($row = mysql_fetch_array($result));
				}
				$result1 = mysql_query("SELECT * FROM texts WHERE text_id='10'",$link);  
	 				if (mysql_num_rows($result1) > 0)
					{
 						$row1 = mysql_fetch_array($result1); 
 
 					do
 					{
 						echo 
 						'
 							<br><br>
							<label>Структура</label>
							<br><br>
 							<textarea name="structure">'.$row1["main"].'</textarea>
 						';
 						
 					}
    				while ($row1 = mysql_fetch_array($result1));
				}
				$result2 = mysql_query("SELECT * FROM texts WHERE text_id='11'",$link);  
	 				if (mysql_num_rows($result2) > 0)
					{
 						$row2 = mysql_fetch_array($result2); 
 
 					do
 					{
 						echo 
 						'
 							<br><br>
							<label>Порядок діагностики</label>
							<br><br>
 							<textarea name="diagnoz">'.$row2["main"].'</textarea>
 						';
 						
 					}
    				while ($row2 = mysql_fetch_array($result2));
				}
				$result3 = mysql_query("SELECT * FROM texts WHERE text_id='5'",$link);  
	 				if (mysql_num_rows($result3) > 0)
					{
 						$row3 = mysql_fetch_array($result3); 
 
 					do
 					{
 						echo 
 						'
 							<br><br>
							<label>Контакти</label>
							<br><br>
 							<textarea name="contacts">'.$row3["main"].'</textarea>
 						';
 						
 					}
    				while ($row3 = mysql_fetch_array($result3));
				}
		echo '
			<br>
			<input type="submit" name="submit" value="Зберегти">
		</form>
			';
			break;	
				default:
					$result = mysql_query("SELECT * FROM texts WHERE text_id='5'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						'
 						<ul id="red">
							<li class="active"><a href="comitet.php?action=view">Вигляд</a></li>
							<li><a href="comitet.php?action=edit">Редагувати</a></li>
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
		CKEDITOR.replace("structure");
		CKEDITOR.replace("diagnoz");
		CKEDITOR.replace("contacts");
	</script>
</body>
</html>
<?php
}else
{
    header("Location: ../login.php");
}
?>