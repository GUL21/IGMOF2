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

	$art_id = $_GET["art_id"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Публікація</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
			<?php
			$result = mysql_query("SELECT * FROM articles WHERE art_id = '$art_id'",$link);  
		 				if (mysql_num_rows($result) > 0)
						{
	 						$row = mysql_fetch_array($result); 
	 					do
	 					{
	 						echo 
	 						'
	 							<h1>'.$row["art_title"].'</h1>
	 							'.$row["authors_rel"].'<br>
	 							<i>'.$row["authors_oth"].'</i><br>
	 							'.$row["main_ua"].'<br>
	 							'.$row["main_ru"].'<br>
	 							'.$row["main_en"].'<br>
	 							<span class="g">Номер журналу</span><br><br> 
	 							<a href="view_public.php?publication='.$row["number_mag"].'">'.$row["number_mag"].'</a><br><br>
	 							<span class="g">Ключові слова</span><br>
	 							'.$row["keywords"].'<br>
	 							<span class="g">Сторінка</span><br>
	 							'.$row["page"].'<br><br>
	 							<span class="g">Вкладення</span><br>
	 							'.$row["include"].'
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