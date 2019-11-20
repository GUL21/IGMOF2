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

	$key=$_GET["keywords"];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Ключові слова</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
	<script src="js/jquery-1.7.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
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
		<center>
			<h3>
				<i>-<?php echo $key; ?>-</i>
			</h3>
		</center>
		<br>
	 			<?php
	 				$result = mysql_query("SELECT * FROM projects WHERE keywords LIKE '%$key%'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo 
 						'
 							<h1>'.$row["title"].'</h1><br>
 						';
 						echo $row["anotation"];
 						echo 
 						'
 							<a class="asp" href="view_project.php?title='.$row["title"].'">Читати далі</a><br>
 						';
 					}
    				while ($row = mysql_fetch_array($result));
				}

					$result1 = mysql_query("SELECT * FROM articles WHERE keywords LIKE '%$key%'",$link);  
	 				if (mysql_num_rows($result1) > 0)
					{
 						$row1 = mysql_fetch_array($result1); 
 
 					do
 					{
 						echo 
 						'
 							<h1>'.$row1["art_title"].'</h1><br>
 						';
 						echo $row1["main_ua"];
 						echo 
 						'
 							<a class="asp" href="view_article.php?art_id='.$row1["art_id"].'">Читати далі</a><br>
 						';
 					}
    				while ($row1 = mysql_fetch_array($result1));
				} 
	 			?>
	</div>
	<footer id="foot">
	</footer>
	</div>
</body>
</html>
<?php
}else
{
    header("Location: ../login.php");
}
?>