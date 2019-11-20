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
		$public = $_POST['public'];
		$magaz = $_POST['magaz'];

		$result = mysql_query("INSERT INTO public (publication, magazine) VALUES ('$public', '$magaz')");
		header('location: add_public.php');
		header("Cache-Control: no-store,no-cache,mustrevalidate");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Додавання номера видання</title>
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
		<h1>Додавання номера видання</h1>
 			<form method="post" enctype="multipart/form-data">
 				<br>
 				<p class="green">Номер видання</p>
 				<input type="text" name="public"><br><br>
 				<p class="green">Журнал</p>
 				<select name="magaz">
								<?php

	 				$result = mysql_query("SELECT * FROM magazines",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo 
 						'
 							<option>'.$row["mag_title"].'</option>
 						';
 						
 						echo 
 						'
 							
 						';
 					}
    				while ($row = mysql_fetch_array($result));
				} 
	 			?>
							</select><br><br><br>
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