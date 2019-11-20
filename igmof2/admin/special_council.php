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
	$act = $_GET["act"];

	if (isset($_POST['submit']))
	{
		$zagolovok = $_POST['title'];
		$anotation = $_POST['anotation'];

		$result = mysql_query("UPDATE texts SET title = '$zagolovok', main = '$anotation' WHERE text_id = '3'");
		header('location: special_council.php');
	}

	if (isset($_POST['go']))
	{
		$pos = $_POST['pos'];
		$pib = $_POST['pib'];
		$place = $_POST['place'];
		$spec = $_POST['spec'];

		$result = mysql_query("INSERT INTO special_council(post, PIB, work, speciality) VALUES ('$pos', '$pib', '$place', '$spec')");
		header('location: special_council.php');
	}

	 if (isset($act))
{

	switch ($act) {
		case 'del':
			mysql_query("DELETE FROM special_council WHERE sp_id='$id'");
			break;
	}
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
		<?php
			$action = $_GET["action"];
			switch ($action) 
			{
				case 'view':
$result = mysql_query("SELECT * FROM texts WHERE text_id='3'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						'
 						<ul id="red">
							<li class="active"><a href="special_council.php?action=view">Вигляд</a></li>
							<li><a href="special_council.php?action=edit">Редагувати</a></li>
						</ul>
 						<h1>'.$row["title"].'</h1>
 						';
 						echo $row["main"];
 						
 					}
    				while ($row = mysql_fetch_array($result));
				}
				?>
				<table id="table">
 							<thead>
	 		 					<tr>
	 								<th>Посада</th>
	 								<th>Прізвище, ім'я, по-батькові</th>
	 								<th>Місце основної роботи</th>
	 								<th>Спеціальність у раді</th>
	 							</tr>
 							</thead>
 							<tbody>
				<?php
				$result1 = mysql_query("SELECT * FROM special_council",$link);
				if (mysql_num_rows($result1) > 0)
					{
 						$row1 = mysql_fetch_array($result1); 
 
 					do
 					{
 						echo
 						'
 								<tr style="background-color: white;">
	 								<th>'.$row1['post'].'</th>
	 								<th>'.$row1['PIB'].'</th>
	 								<th>'.$row1['work'].'</th>
	 								<th>'.$row1['speciality'].'</th>
	 								<th><a href="change_special_council.php?sp_id='.$row1["sp_id"].'">змінити</a><br><a href="special_council.php?action=view&sp_id='.$row1["sp_id"].'&act=del">видалити</a></th>
	 							</tr>
 						';	
 					}
    				while ($row1 = mysql_fetch_array($result1));
				}
				echo'
				<a class="history" href="add_member.php">Додати нового члена ради</a> 
				';
					break;


					case 'edit':
					echo '
					<ul id="red">
							<li><a href="special_council.php?action=view">Вигляд</a></li>
							<li class="active"><a href="special_council.php?action=edit">Редагувати</a></li>
						</ul>
					<h1>Спеціалізована вчена рада</h1>				
		<form action="special_council.php" method="post">
		';
		$result = mysql_query("SELECT * FROM texts WHERE text_id='3'",$link);

	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo 
 						'
							<label>Заголовок</label>
							<br><br>
							<input type="text" name="title" value="'.$row["title"].'">
							<br><br>
							<label>Текст</label>
							<br><br>
 							<textarea name="anotation">'.$row["main"].'</textarea>
 						';
 						
 					}
    				while ($row = mysql_fetch_array($result));
				}
		echo '
			<br>
			<input type="submit" name="submit" value="Зберегти">
		</form>	
			';
			break;	
				default:
					$result = mysql_query("SELECT * FROM texts WHERE text_id='3'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						'
 						<ul id="red">
							<li class="active"><a href="special_council.php?action=view">Вигляд</a></li>
							<li><a href="special_council.php?action=edit">Редагувати</a></li>
						</ul>
 						<h1>'.$row["title"].'</h1>
 						';
 						echo $row["main"];
 						
 					}
    				while ($row = mysql_fetch_array($result));
				}
				?>
				<table id="table">
 							<thead>
	 		 					<tr>
	 								<th>Посада</th>
	 								<th>Прізвище, ім'я, по-батькові</th>
	 								<th>Місце основної роботи</th>
	 								<th>Спеціальність у раді</th>
	 							</tr>
 							</thead>
 							<tbody>
				<?php
				$result1 = mysql_query("SELECT * FROM special_council",$link);
				if (mysql_num_rows($result1) > 0)
					{
 						$row1 = mysql_fetch_array($result1); 
 
 					do
 					{
 						echo
 						'
 								<tr style="background-color: white;">
	 								<th>'.$row1["post"].'</th>
	 								<th>'.$row1["PIB"].'</th>
	 								<th>'.$row1["work"].'</th>
	 								<th>'.$row1["speciality"].'</th>
	 								<th><a href="change_special_council.php?sp_id='.$row1["sp_id"].'">змінити</a><br><a href="special_council.php?action=view&sp_id='.$row1["sp_id"].'&act=del">видалити</a></th>
	 							</tr>
 						';	
 					}
    				while ($row1 = mysql_fetch_array($result1));
				} 
					break;
			}
		?>
			</tbody>
 		</table>
 		<ul id="about">
			<li>
				<a href="index.php">Новини</a>
			</li>
		</ul>
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
