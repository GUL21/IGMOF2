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

	if (isset($_POST['submit']))
	{
		$zagolovok = $_POST['name'];
		$viddil = $_POST['viddil'];
		$anotation = $_POST['anotation'];
		$id = $_POST['id'];

		$result = mysql_query("INSERT INTO categories (name, parent_id, main, p_a) VALUES ('$zagolovok', '$id', '$anotation', '$viddil')");
		header("Cache-Control: no-store,no-cache,mustrevalidate");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Додати підвідділ</title>
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
		<h1>Додати новий підвідділ</h1>		
		<form method="post">
							<label>Заголовок</label>
							<br><br>
							<input type="text" name="name">
							<br><br>
							<label>Відділ</label>
							<br><br>
							<select name="viddil" id="i1">
								<?php

	 				$result = mysql_query("SELECT * FROM categories WHERE parent_id='0'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo 
 						'
 							<option>'.$row["name"].'</option>
 						';
 						
 						echo 
 						'
 							
 						';
 					}
    				while ($row = mysql_fetch_array($result));
				} 
	 			?>
							</select>
							<select name="id" id="i2">
								<?php

	 				$result = mysql_query("SELECT * FROM categories WHERE parent_id='0'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo 
 						'
 							<option>'.$row["id"].'</option>
 						';
 						
 						echo 
 						'
 							
 						';
 					}
    				while ($row = mysql_fetch_array($result));
				} 
	 			?>
							</select>
							<br><br>
							<label>Текст</label>
							<br><br>
 							<textarea name="anotation"></textarea>
			<br>
			<input type="submit" name="submit" value="Зберегти">
		</form>	
	</div>
	<footer id="foot">
	</footer>
	</div>
		<script type="text/javascript">
		CKEDITOR.replace("anotation");

    (function() {

        var first = document.getElementById('i1'),

            second = document.getElementById('i2');

        first.onchange = function(){ second.selectedIndex = this.selectedIndex; };

        second.onchange = function(){ first.selectedIndex = this.selectedIndex; };

    })();
</script>
</body>
</html>
<?php
}else
{
    header("Location: ../login.php");
}
?>