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

	$id = $_GET["sp_id"];

	if (isset($_POST['update']))
	{
		$pos = $_POST['pos'];
		$pib = $_POST['pib'];
		$place = $_POST['place'];
		$spec = $_POST['spec'];

		$result = mysql_query("UPDATE special_council SET post='$pos', PIB='$pib', work='$place', speciality='$spec' WHERE sp_id='$id'");
		header('location: special_council.php?action=view');


	}

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
		<h1>Редагування члена спеціалізованої ради</h1>
		<?php
		
			$result1 = mysql_query("SELECT * FROM special_council WHERE sp_id='$id'",$link);
				if (mysql_num_rows($result1) > 0)
					{
 						$row1 = mysql_fetch_array($result1); 
 
 					do
 					{
 						echo
 						'
 							<form id="forma" method="post">
 								<h5>Посада</h5>
 							<input type="text" name="pos" class="pos" value="'.$row1["post"].'"><br>
 							<select name="pos" size="4">
									<option>Голова ради</option>
									<option>Заступник голови</option>	
									<option>Вчений секретар</option>	
									<option>Член ради</option>	
 								</select><br><br>
 								<h5>ПІБ</h5>
								<input type="text" class="auto" name="pib" value="'.$row1["PIB"].'" ><br><br>
 								<h5>Місце роботи</h5>
								<input type="text" name="place" value="'.$row1["work"].'" class="auto"><br><br>
 								<h5>Спеціалізація</h5>
								<input type="text" name="spec" value="'.$row1["speciality"].'" class="auto"><br><br>
								<input type="submit" name="update" value="Змінити">
							</form>
 						';
 					}
 					while ($row1 = mysql_fetch_array($result1));
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