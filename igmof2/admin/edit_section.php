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

	$id = $_GET["id"];
	$act = $_GET["act"];

	if (isset($_POST['submit']))
	{
		$zagolovok = $_POST['name'];
		$anotation = $_POST['anotation'];

		$result = mysql_query("UPDATE categories SET name = '{$_POST['name']}', main = '{$_POST['anotation']}' WHERE id = '$id'");
		header("edit_section.php?id='$id'");
	}
		 if (isset($act))
{

	switch ($act) {
		case 'del':
			mysql_query("DELETE FROM categories WHERE id='$id'");
header('location: index.php');
			break;

	}
}
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
					<ul id="red">
							<li><a href="view_section.php?id='.$row["id"].'">Вигляд</a></li>
							<li class="active"><a href="edit_section.php?id='.$row["id"].'">Редагувати</a></li>
						</ul>
 						<h1>'.$row["name"].'</h1>			
		<form method="post">
		';
		
 						echo 
 						'
							<label>Заголовок</label>
							<br><br>
							<input type="text" name="name" value="'.$row["name"].'">
							<br><br>
							<label>Текст</label>
							<br><br>
 							<textarea name="anotation">'.$row["main"].'</textarea>
 						<a id="right" href="edit_section.php?id='.$row["id"].'&act=del">Видалити відділ</a>
 						';
 						
 					}
    				while ($row = mysql_fetch_array($result));
				}
		echo '
			<br>
			<input type="submit" name="submit" value="Зберегти">

		</form>
		
			';			
		?>
		
	</div>
	<footer id="foot">
	</footer>
	</div>
		<script type="text/javascript">
		CKEDITOR.replace("anotation");
	</script>
</body>
</html>
<?php
}else
{
    header("Location: ../login.php");
}
?>