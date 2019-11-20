<?php
	include("include/db_connect.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Співробітники</title>
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
			include("include/block-parametr.php");
		?>
	</div>
	<div id="block-content">
		<h1>Співробітники</h1>
		<table id="table">
 			<thead>
	 		 	<tr>
	 				<th>ПІБ</th>
	 				<th>Відділ</th>
	 				<th>Посада</th>
	 				<th>Вчений ступінь</th>
	 			</tr>
 			</thead>
 			<tbody>
		<?php

			$pib = $_GET["pib"];

			if($_GET["pib"]) 
			{
				$result = mysql_query("SELECT * FROM employees WHERE PIB LIKE '%$pib%'");
			}

			if($_GET["viddil"]) 
			{
				$viddil = implode(',',$_GET["viddil"]);
				$result = mysql_query("SELECT * FROM employees WHERE vid_id IN($viddil)");
			}

			if($_GET["posada"]) 
			{
				$posada = implode(',',$_GET["posada"]);
				$result = mysql_query("SELECT * FROM employees WHERE pos_id IN($posada)");
			}

			if($_GET["stupiny"]) 
			{
				$stupiny = implode(',',$_GET["stupiny"]);
				$result = mysql_query("SELECT * FROM employees WHERE st_id IN($stupiny)");
			}

			if($_GET["pib"] && $_GET["viddil"]) 
			{
				$viddil = implode(',',$_GET["viddil"]);
				$result = mysql_query("SELECT * FROM employees WHERE PIB LIKE '%$pib%' AND vid_id IN($viddil)");
			}

			if($_GET["pib"] && $_GET["posada"]) 
			{
				$posada = implode(',',$_GET["posada"]);
				$result = mysql_query("SELECT * FROM employees WHERE PIB LIKE '%$pib%' AND pos_id IN($posada)");
			}

			if($_GET["pib"] && $_GET["stupiny"]) 
			{
				$stupiny = implode(',',$_GET["stupiny"]);
				$result = mysql_query("SELECT * FROM employees WHERE PIB LIKE '%$pib%' AND st_id IN($stupiny)");
			}

			if($_GET["viddil"] && $_GET["posada"]) 
			{
				$viddil = implode(',',$_GET["viddil"]);
				$posada = implode(',',$_GET["posada"]);
				$result = mysql_query("SELECT * FROM employees WHERE vid_id IN($viddil) AND pos_id IN($posada)");
			}

			if($_GET["viddil"] && $_GET["stupiny"]) 
			{
				$viddil = implode(',',$_GET["viddil"]);
				$stupiny = implode(',',$_GET["stupiny"]);
				$result = mysql_query("SELECT * FROM employees WHERE vid_id IN($viddil) AND st_id IN($stupiny)");
			}

			if($_GET["posada"] && $_GET["stupiny"]) 
			{
				$posada = implode(',',$_GET["posada"]);
				$stupiny = implode(',',$_GET["stupiny"]);
				$result = mysql_query("SELECT * FROM employees WHERE pos_id IN($posada) AND st_id IN($stupiny)");
			}

			if($_GET["pib"] && $_GET["viddil"] && $_GET["posada"]) 
			{
				$posada = implode(',',$_GET["posada"]);
				$viddil = implode(',',$_GET["viddil"]);
				$result = mysql_query("SELECT * FROM employees WHERE PIB LIKE '%$pib%' AND pos_id IN($posada) AND vid_id IN($viddil)");
			}

			if($_GET["pib"] && $_GET["viddil"] && $_GET["stupiny"]) 
			{
				$stupiny = implode(',',$_GET["stupiny"]);
				$viddil = implode(',',$_GET["viddil"]);
				$result = mysql_query("SELECT * FROM employees WHERE PIB LIKE '%$pib%' AND st_id IN($stupiny) AND vid_id IN($viddil)");
			}

			if($_GET["pib"] && $_GET["posada"] && $_GET["stupiny"]) 
			{
				$stupiny = implode(',',$_GET["stupiny"]);
				$posada = implode(',',$_GET["posada"]);
				$result = mysql_query("SELECT * FROM employees WHERE PIB LIKE '%$pib%' AND st_id IN($stupiny) AND pos_id IN($posada)");
			}

			if($_GET["viddil"] && $_GET["posada"] && $_GET["stupiny"]) 
			{
				$viddil = implode(',',$_GET["viddil"]);
				$stupiny = implode(',',$_GET["stupiny"]);
				$posada = implode(',',$_GET["posada"]);
				$result = mysql_query("SELECT * FROM employees WHERE vid_id IN($viddil) AND st_id IN($stupiny) AND pos_id IN($posada)");
			}

			if($_GET["pib"] && $_GET["posada"] && $_GET["stupiny"] && $_GET["viddil"]) 
			{
				$viddil = implode(',',$_GET["viddil"]);
				$stupiny = implode(',',$_GET["stupiny"]);
				$posada = implode(',',$_GET["posada"]);
				$result = mysql_query("SELECT * FROM employees WHERE PIB LIKE '%$pib%' AND st_id IN($stupiny) AND pos_id IN($posada) AND vid_id IN($viddil)");
			}


	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						'
 						<tr>
 							<td><a href="view_employee.php?id='.$row["id"].'&PIB='.$row["PIB"].'">'.$row["PIB"].'</a></td>
 							<td>'.$row["section"].'</td>
 							<td>'.$row["post"].'</td>
 							<td>'.$row["degree"].'</td>
 							<td><a href="edit_employees.php?id='.$row["id"].'">змінити</a><br><a href="employees.php?id='.$row["id"].'&act=del">видалити</a></td>
 						</tr>
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