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

	if (isset($_POST['add']))
	{
		$pos = $_POST['pos'];
		$pib = $_POST['pib'];
		$place = $_POST['place'];
		$spec = $_POST['spec'];

		$result = mysql_query("INSERT INTO special_council (post, PIB, work, speciality) VALUES('$pos','$pib','$place','$spec')");
		header('location: add_member.php');
		header("Cache-Control: no-store,no-cache,mustrevalidate");


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
		<h1>Додати нового члена спеціалізованої ради</h1>
 			<form id="forma" method="post">
 				<h5>Посада</h5>
 				<select name="pos">
					<option>Голова ради</option>	
					<option>Заступник голови</option>	
					<option>Вчений секретар</option>	
					<option>Член ради</option>	
 				</select><br><br>
 				<h5>ПІБ</h5>
				<input type="text" class="auto" name="pib"><br><br>
 				<h5>Місце роботи</h5>
				<input type="text" name="place" class="auto"><br><br>
 				<h5>Спеціалізація</h5>
				<input type="text" name="spec" class="auto"><br><br>
				<input type="submit" name="add" value="Додати">
			</form>
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