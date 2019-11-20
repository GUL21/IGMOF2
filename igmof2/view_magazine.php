<?php
	include("include/db_connect.php");

	$mag_id = $_GET["mag_id"];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Про журнал</title>
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
		$result = mysql_query("SELECT * FROM magazines WHERE mag_id='$mag_id'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						'
 						<a href="'.$row["url"].'"><h1>'.$row["mag_title"].'*</h1></a>
 						';
 						echo 
 						'
 						<img src="img/'.$row["image"].'" id="magaz">
 						';
 						echo
 						'
 						<table id="table-1">
	 						<tbody>
	 							<tr>
	 								<td>Проблематика</td>
	 								<td>'.$row["problem"].'</td>
	 							</tr>
	 							<tr>
	 								<td>Свідоцтво про державну реєстрацію</td>
	 								<td>'.$row["certificate"].'</td>
	 							</tr>
	 							<tr>
	 								<td>Рік заснування</td>
	 								<td>'.$row["year"].'</td>
	 							</tr>
	 							<tr>
	 								<td>ISSN</td>
	 								<td>'.$row["ISSN"].'</td>
	 							</tr>
	 							<tr>
	 								<td>Періодичність</td>
	 								<td>'.$row["period"].'</td>
	 							</tr>
	 							<tr>
	 								<td>Мова видання</td>
	 								<td>'.$row["language"].'</td>
	 							</tr>
	 							<tr>
	 								<td>Засновники</td>
	 								<td>'.$row["authors"].'</td>
	 							</tr>
	 							<tr>
	 								<td>Головний редактор</td>
	 								<td>'.$row["editor"].'</td>
	 							</tr>
	 							<tr>
	 								<td>Відповідальний секретар</td>
	 								<td>'.$row["secretary"].'</td>
	 							</tr>
	 							<tr>
	 								<td>Члени редколегії</td>
	 								<td>'.$row["members"].'</td>
	 							</tr>
	 							<tr>
	 								<td>Адреса<br>редакції</td>
	 								<td>'.$row["address"].'</td>
	 							</tr>
	 						</tbody>
 						</table>
 						';
 						echo 
 						'
							<h3>*Щоб потрапити на сайт журналу, перейдіть за посиланням в заголовку</h3>
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