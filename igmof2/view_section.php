<?php
	include("include/db_connect.php");

	$id = $_GET["id"];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Відділи</title>
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
		$result = mysql_query("SELECT * FROM categories WHERE id='$id'",$link); 

	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{			

					echo '
 						<h1>'.$row["name"].'</h1>	
 						<a>'.$row["p_a"].'</a>		
 						';
 					echo $row["main"];
 						
 					}
    				while ($row = mysql_fetch_array($result));
				}
?>

<table id="table">
 			<thead>
	 		 	<tr>
	 				<th>ПІБ</th>
	 				<th>Відділ</th>
	 				<th>Посада</th>
	 				<th>Вчений ступінь</th>
	 				<th>Вчене звання</th>
	 			</tr>
 			</thead>
 			<tbody>

	 			<?php
	 				$result = mysql_query("SELECT * FROM  categories, employees WHERE categories.id = '$id' AND categories.name=employees.section",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo 
 						'

 						<tr>
 							<td><a href="view_employee.php?pid='.$row["pid"].'&PIB='.$row["PIB"].'">'.$row["PIB"].'</a></td>
 							<td>'.$row["section"].'</td>
 							<td>'.$row["post"].'</td>
 							<td>'.$row["degree"].'</td>
 							<td>'.$row["status"].'</td>
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