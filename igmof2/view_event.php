<?php
	include("include/db_connect.php");

		$id = $_GET["id"];

	
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
					$result = mysql_query("SELECT * FROM fcalendar WHERE id='$id'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						'
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
		?>
	</div>
	<footer id="foot">
		<?php
			include("include/block-footer.php");
		?>
	</footer>
	</div>
</body>
</html>