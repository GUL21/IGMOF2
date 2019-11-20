<?php

	include("include/db_connect.php");

	$id = $_GET["news_id"];

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
					$result = mysql_query("SELECT * FROM news WHERE news_id='$id'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						'
				<h1>'.$row["news_title"].'</h1>
				'.$row["news_main"].'
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
