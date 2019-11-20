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

	$dis_id=$_GET["dis_id"];

	if (isset($_POST['save']))
	{
		$leader = $_POST['leader'];
		$getter = $_POST['getter'];
		$theme = $_POST['theme'];
		$autoreph = $_POST['autoreph'];
		$response = $_POST['response'];
		$dissertation = $_POST['dissertation'];
		$degree = $_POST['degree'];
		$year = $_POST['year'];

		$result = mysql_query("INSERT INTO dissertation (getter, theme, autoreph, response, dissertation, degree, leader, year) VALUES ('$getter', '$theme', '$autoreph', '$response', '$dissertation', '$degree', '$leader', '$year'");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Додавання здобувача</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
	<script src="js/jquery-1.7.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
		<h1>Додавання інформації про захист</h1>
 						<form method="post" id="forma">
 						<br>
 						<p class="green">Здобувач</p>
 						<input type="text" name="getter" class="auto"><br><br>
 						<p class="green">Тема дисертації</p>
 						<input type="text" name="theme" class="auto"><br><br>
 						<p class="green">Автореферат</p>
 						<textarea name="autoreph"></textarea><br><br>
 						<p class="green">Відгук офіційного опонента</p>
 						<textarea name="response"></textarea><br><br>
 						<p class="green">Дисертація</p>
 						<textarea name="dissertation"></textarea><br><br>
 						<p class="green">Науковий ступінь</p>
 						<select name="degree" size="10">
 							<?php
 							$result2 = mysql_query("SELECT * FROM academic_degrees",$link);  
	 				if (mysql_num_rows($result2) > 0)
					{
 						$row2 = mysql_fetch_array($result2); 
 
 					do
 					{
 							echo 
 							'
								<option>'.$row2["degree"].'</option>
 							';
 					}
 					while ($row2 = mysql_fetch_array($result2));
				} 
 							?>
 							</select>
 						<p class="green">Науковий керівник</p>
 						<select name="leader" size="10">
 							<?php
 							$result1 = mysql_query("SELECT * FROM employees ORDER BY PIB ASC",$link);  
	 				if (mysql_num_rows($result1) > 0)
					{
 						$row1 = mysql_fetch_array($result1); 
 
 					do
 					{
 							echo 
 							'
								<option>'.$row1["PIB"].'</option>
 							';
 					}
 					while ($row1 = mysql_fetch_array($result1));
				} 
 							?>
 							</select>
 						<p class="green">Рік</p>
 						<input type="number" name="year"><br><br>
 						<input type="submit" name="save" value="Зберегти">
 						</form>
	</div>
	<footer id="foot">
	</footer>
	<script type="text/javascript">
		CKEDITOR.replace("autoreph");
		CKEDITOR.replace("response");
		CKEDITOR.replace("dissertation");
	</script>
	</div>
</body>
</html>
<?php
}else
{
    header("Location: ../login.php");
}
?>