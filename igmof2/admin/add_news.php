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

	if (isset($_POST['submit']))
	{
		$title = $_POST['title'];
		$anotation = $_POST['anotation'];
		$main = $_POST['main'];

		$result = mysql_query("INSERT INTO news (news_title, news_an, news_main, datatime) VALUES ('$title', '$anotation', '$main', CURRENT_TIMESTAMP())");
		header('location: add_news.php');
		header("Cache-Control: no-store,no-cache,mustrevalidate");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Додати новину</title>
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
		<h1>Додавання новини</h1>
		<form method="post" action="add_news.php" enctype="multipart/form-data">
							<label>Заголовок</label>
							<br><br>
							<input type="text" name="title">
							<br><br>
							<label>Анотація</label>
							<br><br>
							<textarea name="anotation"></textarea>
							<br><br>
							<label>Текст</label>
							<br><br>
							<textarea name="main"></textarea>
							<br>
			<input type="submit" name="submit" value="Додати">
		</form>
	</div>
	<footer id="foot">
	</footer>
	</div>
	<script type="text/javascript">
		CKEDITOR.replace("anotation");
		CKEDITOR.replace("main");
	</script>
</body>
</html>
<?php
}else
{
    header("Location: ../login.php");
}
?>