<?php
	include("include/db_connect.php");

	$id=$_GET["proj_id"];
	$data=$_GET["data"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Проекти</title>
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
		<h1>Проекти</h1><br>
		<table class="table1">
	 			<?php
	 				$result = mysql_query("SELECT * FROM projects ORDER BY data DESC", $link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo 
 						'
 						<tr>
 							<td>'.$row["title"].'</td>
 							<td><a class="asp" href="chronology.php?data='.$row["data"].'">'.$row["data"].'</a></td>
 							<td><a class="asp" href="view_project.php?title='.$row["title"].'">Читати</a></td>
 						</tr>
 						';
 					}
    				while ($row = mysql_fetch_array($result));
				} 
	 			?>
 		</table>
	</div>
	<footer id="foot">
	</footer>
	</div>
</body>
</html>