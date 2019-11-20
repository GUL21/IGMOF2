<?php
	session_start();
if ($_SESSION['auth_admin'] == "yes_auth")
{
  define('myeshop', true);
       
       if (isset($_GET["logout"]))
    {
        unset($_SESSION['auth_admin']);
        header("Location: ../login.php");
    }
  $_SESSION['urlpage'] = "<a href='index.php' >Главная</a>";

	include("include/db_connect.php");

	$id = $_GET["pid"];

	if (isset($_POST['update']))
	{
		$PIB = $_POST['PIB'];
		$section = $_POST['section'];
		$post = $_POST['post'];
		$degree = $_POST['degree'];
		$status = $_POST['status'];

		$result = mysql_query("UPDATE employees SET PIB='$PIB', section='$section', post='$post', degree='$degree', status='$status' WHERE pid='$id'");
		header('location: employees.php');


	}
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
			include("include/block-right.php");
		?>
	</div>
	<div id="block-content">
		<h1>Редагування співробітника</h1>
		<?php
		$result = mysql_query("SELECT * FROM employees WHERE pid='$id'",$link);
				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						'
 							<form id="forma" method="post">
 							<h5>ПІБ</h5>
								<input type="text" class="auto" name="PIB" value="'.$row["PIB"].'" ><br><br>
							<h5>Відділ</h5>
 							<input type="text" name="section" class="auto" value="'.$row["section"].'"><br>
 							';
 					}
 					while ($row = mysql_fetch_array($result));
				}
				?>
				<select name="section" size="10">
				<?php
				$result1 = mysql_query("SELECT * FROM categories WHERE parent_id='0'",$link);
				if (mysql_num_rows($result1) > 0)
					{
 						$row1 = mysql_fetch_array($result1); 
 
 					do
 					{
 						echo
 						' 
									<option>'.$row1["name"].'</option>	
						';
				}
 					while ($row1 = mysql_fetch_array($result1));
				}
				?>					
				</select>
				<?php
				$result = mysql_query("SELECT * FROM employees WHERE pid='$id'",$link);
				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						' 
 								<h5>Посада</h5>
								<input type="text" class="auto" name="post" value="'.$row["post"].'" ><br>
						';
						}
 					while ($row = mysql_fetch_array($result));
				}
				?>
				<select name="post" size="10">
				<?php
				$result2 = mysql_query("SELECT * FROM posts",$link);
				if (mysql_num_rows($result2) > 0)
					{
 						$row2 = mysql_fetch_array($result2); 
 
 					do
 					{
 						echo
 						' 
									<option>'.$row2["post"].'</option>	
						';
				}
 					while ($row2 = mysql_fetch_array($result2));
				}
				?>					
				</select>
				<?php
				$result = mysql_query("SELECT * FROM employees WHERE pid='$id'",$link);
				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						' 
 								<h5>Вчений ступінь</h5>
								<input type="text" class="auto" name="degree" value="'.$row["degree"].'" ><br>
						';
						}
 					while ($row = mysql_fetch_array($result));
				}
				?>
				<select name="degree" size="10">
					<option></option>
				<?php
				$result3 = mysql_query("SELECT * FROM academic_degrees",$link);
				if (mysql_num_rows($result3) > 0)
					{
 						$row3 = mysql_fetch_array($result3); 
 
 					do
 					{
 						echo
 						' 
									<option>'.$row3["degree"].'</option>	
						';
				}
 					while ($row3 = mysql_fetch_array($result3));
				}
				?>					
				</select>
				<?php
				$result = mysql_query("SELECT * FROM employees WHERE pid='$id'",$link);
				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						' 
 								<h5>Вчене звання</h5>
								<input type="text" class="auto" name="status" value="'.$row["status"].'" ><br>
						';
						}
 					while ($row = mysql_fetch_array($result));
				}
				?>
				<select name="status" size="10">
					<option></option>
				<?php
				$result4 = mysql_query("SELECT * FROM academic_status",$link);
				if (mysql_num_rows($result4) > 0)
					{
 						$row4 = mysql_fetch_array($result4); 
 
 					do
 					{
 						echo
 						' 
									<option>'.$row4["status"].'</option>	
						';
				}
 					while ($row4 = mysql_fetch_array($result4));
				}
				?>					
				</select>
				<?php
				$result = mysql_query("SELECT * FROM employees WHERE pid='$id'",$link);
				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						' 
 								<br><br>
								<input type="submit" name="update" value="Змінити">
							</form>
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
<?php
}else
{
    header("Location: ../login.php");
}
?>