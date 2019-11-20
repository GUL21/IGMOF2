<?php
	include("include/db_connect.php");

	$id = $_GET["id"];
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
	 				<th>Вчене звання</th>
	 			</tr>
 			</thead>
 			<tbody>
 				<ul class="letter">
 							<li><a href="employees_A.php">А</a></li>
 							<li><a href="employees_B.php">Б</a></li>
 							<li><a href="employees_V.php">В</a></li>
 							<li><a href="employees_G.php">Г</a></li>
 							<li><a href="employees_D.php">Д</a></li>
 							<li><a href="employees_E.php">Е</a></li>
 							<li><a href="employees_Ye.php">Є</a></li>
 							<li><a href="employees_Zh.php">Ж</a></li>
 							<li><a href="employees_Z.php">З</a></li>
 							<li><a href="employees_I.php">І</a></li>
 							<li><a href="employees_Yi.php" class="red">Ї</a></li>
 							<li><a href="employees_Y.php">Й</a></li>
 							<li><a href="employees_K.php">К</a></li>
 							<li><a href="employees_L.php">Л</a></li>
 							<li><a href="employees_M.php">М</a></li>
 							<li><a href="employees_N.php">Н</a></li>
 							<li><a href="employees_O.php">О</a></li>
 							<li><a href="employees_P.php">П</a></li>
 							<li><a href="employees_R.php">Р</a></li>
 							<li><a href="employees_S.php">С</a></li>
 							<li><a href="employees_T.php">Т</a></li>
 							<li><a href="employees_U.php">У</a></li>
 							<li><a href="employees_F.php">Ф</a></li>
 							<li><a href="employees_H.php">Х</a></li>
 							<li><a href="employees_Ts.php">Ц</a></li>
 							<li><a href="employees_Ch.php">Ч</a></li>
 							<li><a href="employees_Sh.php">Ш</a></li>
 							<li><a href="employees_Shch.php">Щ</a></li>
 							<li><a href="employees_Yu.php">Ю</a></li>
 							<li><a href="employees_Ya.php">Я</a></li>		
 				</ul>
		<?php
			$result = mysql_query("SELECT * FROM employees, categories WHERE PIB LIKE 'Ї%' AND employees.section=categories.name AND employees.visible='1'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						'
 						<tr>
 							<td><a href="view_employee.php?pid='.$row["pid"].'&PIB='.$row["PIB"].'">'.$row["PIB"].'</a></td>
 							<td><a href="view_section.php?id='.$row["id"].'">'.$row["section"].'</a></td>
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