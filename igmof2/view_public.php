<?php
	include("include/db_connect.php");

	$pub = $_GET["publication"];
	$art_id = $_GET["art_id"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Номер видання</title>
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
			<?php
			$result = mysql_query("SELECT * FROM public, magazines WHERE publication = '$pub' AND public.magazine=magazines.mag_title",$link);  
		 				if (mysql_num_rows($result) > 0)
						{
	 						$row = mysql_fetch_array($result); 
	 					do
	 					{
	 						echo 
	 						'
	 							<br>
	 							<a href="view_magazine.php?mag_id='.$row["mag_id"].'&action=view">'.$row["mag_title"].'</a>
	 						';
	 					}
	 					while ($row = mysql_fetch_array($result));
					}		
			?>
			<?php
			$result1 = mysql_query("SELECT * FROM articles WHERE number_mag = '$pub' LIMIT 1",$link);  
		 				if (mysql_num_rows($result1) > 0)
						{
	 						$row1 = mysql_fetch_array($result1); 
	 					do
	 					{
	 						echo 
	 						'
	 							<h1>'.$row1["number_mag"].'</h1>
	 						';
	 					}
	 					while ($row1 = mysql_fetch_array($result1));
					}		
			?>
			<table id="table">
 			<thead>
	 		 	<tr>
	 				<th>Заголовок</th>
	 				<th>Автори(співробітники)</th>
	 				<th>Автори</th>
	 				<th>Сторінка</th>
	 			</tr>
 			</thead>
 			<tbody>
 				<?php
			$result1 = mysql_query("SELECT * FROM articles WHERE number_mag = '$pub'",$link);  
		 				if (mysql_num_rows($result1) > 0)
						{
	 						$row1 = mysql_fetch_array($result1); 
	 					do
	 					{
	 						echo 
	 						'
	 							<tr>
	 								<td><a href="view_article.php?art_id='.$row1["art_id"].'">'.$row1["art_title"].'</a></td>
	 								<td>'.$row1["authors_rel"].'</td>
	 								<td>'.$row1["authors_oth"].'</td>
	 								<td>'.$row1["page"].'</td>
	 							</tr>
	 						';
	 					}
	 					while ($row1 = mysql_fetch_array($result1));
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