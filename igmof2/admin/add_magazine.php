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
		$url = $_POST['url'];
		$problem = $_POST['problem'];
		$certificate = $_POST['certificate'];
		$year = $_POST['year'];
		$issn = $_POST['ISSN'];
		$period = $_POST['period'];
		$language = $_POST['language'];
		$authors = $_POST['authors'];
		$editor = $_POST['editor'];
		$secretary = $_POST['secretary'];
		$members = $_POST['members'];
		$address = $_POST['address'];
		$main = $_POST['main'];
		$rules = $_POST['rules'];

		$result = mysql_query("INSERT INTO magazines (mag_title, url, problem, certificate, year, issn, period, language, authors, editor, secretary, address, main, rules) VALUES ('$title', '$url', '$problem', '$certificate', '$year', '$ISSN', '$period', '$language', '$authors', '$editor', '$secretary', '$address', '$main', '$rules')");
		header('location: add_magazine.php');
		header("Cache-Control: no-store,no-cache,mustrevalidate");
	}

	$id = mysql_insert_id();
      if(empty($_POST["image"]))
      {
        include("actions/upload-image.php");
        unset($_POST["upload_image"]);
      }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Додати журнал</title>
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
		<h1>Додавання журналу</h1>
		<form method="post" action="add_magazine.php" enctype="multipart/form-data">
							<label>Зображення</label>
							<br><br>
							<input type="file" name="upload_image">
							<br><br>
							<label>Заголовок</label>
							<br><br>
							<input type="text" name="title">
							<br><br>
							<label>Сайт</label>
							<br><br>
							<input type="text" name="url">
							<br><br>
							<label>Проблема</label>
							<br><br>
 							<textarea name="problem"></textarea>
 							<br><br>
							<label>Свідоцтво про державну реєстрацію</label>
							<br><br>
							<input type="text" name="certificate">
							<br><br>
							<label>Рік заснування</label>
							<br><br>
							<input type="number" name="year">
							<br><br>
							<label>ISSN</label>
							<br><br>
							<input type="text" name="ISSN">
							<br><br>
							<label>Періодичність</label>
							<br><br>
							<input type="text" name="period">
							<br><br>
							<label>Мова видання</label>
							<br><br>
							<input type="text" name="language">
							<br><br>
							<label>Засновники</label>
							<br><br>
							<input type="text" name="authors">
							<br><br>
							<label>Головний редактор</label>
							<br><br>
							<input type="text" name="editor">
							<br><br>
							<label>Відповідальний секретар</label>
							<br><br>
							<input type="text" name="secretary">
							<br><br>
							<label>Члени редколегії</label>
							<br><br>
							<textarea name="members"></textarea>
							<br><br>
							<label>Адреса редакції</label>
							<br><br>
							<textarea name="address"></textarea>
							<br><br>
							<label>Відомості</label>
							<br><br>
							<textarea name="main"></textarea>
							<br><br>
							<label>Правила</label>
							<br><br>
							<textarea name="rules"></textarea>
							<br>
			<input type="submit" name="submit" value="Додати">
		</form>
	</div>
	<footer id="foot">
	</footer>
	</div>
	<script type="text/javascript">
		CKEDITOR.replace("problem");
		CKEDITOR.replace("members");
		CKEDITOR.replace("address");
		CKEDITOR.replace("main");
		CKEDITOR.replace("rules");
	</script>
</body>
</html>
<?php
}else
{
    header("Location: ../login.php");
}
?>