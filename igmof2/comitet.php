<?php
	include("include/db_connect.php");
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
		switch ($action) {
			case 'structure':
			$result = mysql_query("SELECT * FROM texts WHERE text_id='10'",$link);  
			if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
						'
							<h1>'.$row["title"].'</h1>
				<ul id="about">
			<li>
				<a href="comitet.php?action=main">Головна</a>
			</li>
			<li class="about_active">
				<a>Структура</a>
			</li>
			<li>
				<a href="comitet.php?action=diagnostic">Порядок діагностики</a>
			</li>
			<li>
				<a href="comitet.php?action=contacts">Контакти</a>
			</li>
		</ul>
		';
		echo $row["main"];				
 					}
    				while ($row = mysql_fetch_array($result));
				}
				break;
			
			case 'diagnostic':
			$result = mysql_query("SELECT * FROM texts WHERE text_id='11'",$link);  
			if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
						'
							<h1>'.$row["title"].'</h1>
				<ul id="about">
			<li>
				<a href="comitet.php?action=main">Головна</a>
			</li>
			<li>
				<a href="comitet.php?action=structure">Структура</a>
			</li>
			<li class="about_active">
				<a>Порядок діагностики</a>
			</li>
			<li>
				<a href="comitet.php?action=contacts">Контакти</a>
			</li>
		</ul>
		';
		echo $row["main"];				
 					}
    				while ($row = mysql_fetch_array($result));
				}
				break;

			case 'contacts':
			$result = mysql_query("SELECT * FROM texts WHERE text_id='5'",$link);  
			if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
						'
							<h1>'.$row["title"].'</h1>
							<ul id="about">
								<li>
									<a href="comitet.php?action=main">Головна</a>
								</li>
								<li>
									<a href="comitet.php?action=structure">Структура</a>
								</li>
								<li>
									<a href="comitet.php?action=diagnostic">Порядок діагностики</a>
								</li>
								<li class="about_active">
									<a>Контакти</a>
								</li>
							</ul>
						';
 						echo $row["main"];				
 					}
    				while ($row = mysql_fetch_array($result));
				}
				break;

			default:
				$result = mysql_query("SELECT * FROM texts WHERE text_id='9'",$link);  
			if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
						'
							<h1>'.$row["title"].'</h1>
				<ul id="about">
			<li class="about_active">
				<a>Головна</a>
			</li>
			<li>
				<a href="comitet.php?action=structure">Структура</a>
			</li>
			<li>
				<a href="comitet.php?action=structure">Порядок діагностики</a>
			</li>
			<li>
				<a href="comitet.php?action=contacts">Контакти</a>
			</li>
		</ul>
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
</body>
</html>