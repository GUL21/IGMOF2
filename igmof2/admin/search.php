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

	$search = $_GET["q"];
	$title = $_GET["title"];
	$id = $_GET["id"];
	$art_id = $_GET["art_id"];
	
	$q_1 = mysql_query("SELECT * FROM articles WHERE art_title LIKE '%$search%'");
	$r_1 = mysql_num_rows($q_1);

	$q_2 = mysql_query("SELECT * FROM projects WHERE title LIKE '%$search%'");
	$r_2 = mysql_num_rows($q_2);

	$q_3 = mysql_query("SELECT * FROM fcalendar WHERE title LIKE '%$search%'");
	$r_3 = mysql_num_rows($q_3);

	$q_4 = mysql_query("SELECT * FROM employees WHERE PIB LIKE '%$search%'");
	$r_4 = mysql_num_rows($q_4);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Пошук</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
		<h1>Результати пошуку "<?php echo $search; ?>"</h1>
		<p class="zaglavie_1">Співробітники - <?php echo $r_4; ?></p>
		<ul class="list_1">
			<?php 
				$result = mysql_query("SELECT * FROM employees WHERE PIB LIKE '%$search%'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						'
							<li style="margin-bottom: 10px;">'.$row["PIB"].'</li><br>
 						';

 					}
 					while ($row = mysql_fetch_array($result));
				}
	?>
		</ul>
		<p class="zaglavie_1">Публікації - <?php echo $r_1; ?></p>
		<ul class="list_1">
			<?php 
				$result = mysql_query("SELECT * FROM articles WHERE art_title LIKE '%$search%'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						'
							<li style="margin-bottom: -10px;"><a href="view_article.php?art_id='.$row["art_id"].'">'.$row["art_title"].'</a></li>
 						';

 					}
 					while ($row = mysql_fetch_array($result));
				}
	?>
		</ul>
		<p class="zaglavie_1">Проекти - <?php echo $r_2; ?></p>
		<ul class="list_1">
			<?php 
				$result = mysql_query("SELECT * FROM projects WHERE title LIKE '%$search%'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						'
							<li style="margin-bottom: 10px;"><a href="view_project.php?title='.$row["title"].'">'.$row["title"].'</a></li>
 						';

 					}
 					while ($row = mysql_fetch_array($result));
				}
	?>
		</ul>
		<p class="zaglavie_1">Події - <?php echo $r_3; ?></p>
		<ul class="list_1">
			<?php 
				$result = mysql_query("SELECT * FROM fcalendar WHERE title LIKE '%$search%'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						'
							<li style="margin-bottom: 10px;"><a href="view_event.php?id='.$row["id"].'">'.$row["title"].'</a></li><br>
 						';

 					}
 					while ($row = mysql_fetch_array($result));
				}
	?>
		</ul>
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
