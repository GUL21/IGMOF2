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
		$authors = $_POST['authors'];
		$other = $_POST['other'];
		$zag = $_POST['zag'];
		$anotation = $_POST['anotation'];
		$main = $_POST['main'];
		$slova = $_POST['slova'];
		$leader = $_POST['leader'];
		$rk = $_POST['rk'];
		$date = $_POST['date'];

		$result = mysql_query("INSERT INTO projects (authors, other, title, anotation, main, keywords, leader, rk, data) VALUES ('$authors', '$other', '$zag', '$anotation', '$main', '$slova', '$leader', '$rk', '$date')");
		header('location: add_project.php');
		header("Cache-Control: no-store,no-cache,mustrevalidate");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Додавання проекту</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
		<h1>Додавання нового проекту</h1>
 			<form method="post" enctype="multipart/form-data" action="add_project.php" id="forma">
 				<br>
 				<p class="green">Заголовок</p>
 				<input type="text" name="zag" class="auto"><br><br>
 				<p class="green">Анотація</p>
				<textarea name="anotation"></textarea><br><br>
 				<p class="green">Текст</p>
				<textarea name="main"></textarea><br><br>
 				<p class="green">Автори</p>
 				<textarea name="authors"></textarea><br><br>
 				<p class="green">Інші</p>
 				<textarea name="other"></textarea><br><br>
 				<p class="green">Ключові слова</p>	
 				<textarea name="slova"></textarea><br><br>
 				<p class="green">Керівник</p>	
 				<textarea name="leader"></textarea>
 				<br><br>
 				<p class="green">РК</p>	
 				<input type="text" name="rk"><br><br>
 				<p class="green">Роки виконання</p>	
 				<input type="text" name="date"><br><br>
 				<input type="submit" name="add" value="Зберегти">
 			</form>				
	</div>
	<footer id="foot">
	</footer>
	<script type="text/javascript">
		CKEDITOR.replace("main");
		CKEDITOR.replace("slova");
		CKEDITOR.replace("leader");
		CKEDITOR.replace("anotation");
		CKEDITOR.replace("other");
		CKEDITOR.replace("authors");
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