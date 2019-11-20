<?php
	include("include/db_connect.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Спеціалізована вчена рада</title>
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
					$result = mysql_query("SELECT * FROM texts WHERE text_id='3'",$link);  
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
 						
 					}
    				while ($row = mysql_fetch_array($result));
				}
				?>
				<table id="table">
 							<thead>
	 		 					<tr>
	 								<th>Посада</th>
	 								<th>Прізвище, ім'я, по-батькові</th>
	 								<th>Місце основної роботи</th>
	 								<th>Спеціальність у раді</th>
	 							</tr>
 							</thead>
 							<tbody>
				<?php
				$result1 = mysql_query("SELECT * FROM special_council",$link);
				if (mysql_num_rows($result1) > 0)
					{
 						$row1 = mysql_fetch_array($result1); 
 
 					do
 					{
 						echo
 						'
 								<tr>
	 								<th>'.$row1["post"].'</th>
	 								<th>'.$row1["PIB"].'</th>
	 								<th>'.$row1["work"].'</th>
	 								<th>'.$row1["speciality"].'</th>
	 							</tr>
 						';	
 					}
    				while ($row1 = mysql_fetch_array($result1));
				} 
		?>
			</tbody>
 		</table>
 		<ul id="about">
			<li>
				<a href="index.php">Новини</a>
			</li>
		</ul>
	</div>
	<footer id="foot">
	</footer>
	</div>
</body>
</html>