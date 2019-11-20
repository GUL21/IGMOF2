<?php
	include("../include/db_connect.php");

	$id=$_GET["proj_id"];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Алмаз</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
</head>
<body>
	<div id="block-body">
	<header id="head">
		<div id="nav">
			<ul>
				<li><a href="index.php">Головна</a></li>
				<li class="active"><a class="act" href="projects.php">Проекти</a></li>
				<li><a href="">Контакти</a></li>
			</ul>
		</div>
		<div id="block-header">
			<?php
				include("../include/block-header.php");
			?>
		</div>
	</header>
	<div id="block-left">
		<?php
			include("../include/block-left.php");
		?>
	</div>
	<div id="block-right">
		<?php
			include("../include/block-right.php");
		?>
	</div>
	<div id="block-content">
		<center>
			<h3>
				<i>-Алмаз-</i>
			</h3>
		</center>
		<br>
	 			<?php

	 				$result = mysql_query("SELECT * FROM Проекти WHERE Фрази LIKE '%алмаз%'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo 
 						'
 							<h1>'.$row["Заголовок"].'</h1><br>
 						';
 						echo $row["Анотація"];
 						echo 
 						'
 							<a class="asp" href="../../view_project.php?Заголовок='.$row["Заголовок"].'">Читати далі</a><br>
 						';
 					}
    				while ($row = mysql_fetch_array($result));
				} 
	 			?>
 			</tbody>
 		</table>
	</div>
	<footer id="foot">
	</footer>
	</div>
</body>
</html>