<?php
	include("include/db_connect.php");

	$zag = $_GET["title"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Про проект</title>
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
		<?php
		$result = mysql_query("SELECT * FROM projects WHERE title='$zag'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						'
 						<h1>'.$row["title"].'</h1>
 						';
 						
 						echo $row["main"];
 						echo 
 						'
 						<p class="green">Автори:</p>
 						<p>'.$row["authors"].'</p>
 						<p class="green">Інші автори:</p>
 						<p>'.$row["other"].'</p>
 						<p class="green">Ключові слова:</p>
 						<p>'.$row["keywords"].'</p>
 						<p class="green">Керівник:</p>
 						<p>'.$row["leader"].'</p>
 						<p class="green">РК:</p>
 						<p>'.$row["rk"].'</p>
 						<p class="green">Роки виконання:</p>
 						<p>'.$row["data"].'</p>
 						';
 						
 						
 					}
    				while ($row = mysql_fetch_array($result));
				}
		?> 
	</div>
	<footer id="foot">
	</footer>
	</div>
</body>
</html>