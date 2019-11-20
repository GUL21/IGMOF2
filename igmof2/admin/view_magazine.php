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

	$mag_id = $_GET["mag_id"];

	if (isset($_POST['submit']))
	{
		$title = $_POST['title'];
		$problem = $_POST['problem'];
		$url = $_POST['url'];
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

		$result = mysql_query("UPDATE magazines SET mag_title = '$title', url = '$url', problem = '$problem', certificate = '$certificate', year = '$year', issn = '$issn', period = '$period', language = '$language', authors = '$authors', editor = '$editor', secretary = '$secretary', members = '$members', address = '$address' WHERE mag_id = '$mag_id'");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Про журнал</title>
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
		$result = mysql_query("SELECT * FROM magazines WHERE mag_id='$mag_id'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						'
 						<ul id="red">
							<li class="active"><a href="view_magazine.php?mag_id='.$row["mag_id"].'&action=view">Вигляд</a></li>
							<li><a href="view_magazine.php?mag_id='.$row["mag_id"].'&action=edit">Редагувати</a></li>
						</ul>
 						<a href="'.$row["url"].'"><h1>'.$row["mag_title"].'*</h1></a>
 						';
 						echo 
 						'
 						<img src="img/'.$row["image"].'" id="magaz">
 						';
 						echo
 						'
 						<table id="table-1">
	 						<tbody>
	 							<tr>
	 								<td>Проблематика</td>
	 								<td>'.$row["problem"].'</td>
	 							</tr>
	 							<tr>
	 								<td>Свідоцтво про державну реєстрацію</td>
	 								<td>'.$row["certificate"].'</td>
	 							</tr>
	 							<tr>
	 								<td>Рік заснування</td>
	 								<td>'.$row["year"].'</td>
	 							</tr>
	 							<tr>
	 								<td>ISSN</td>
	 								<td>'.$row["ISSN"].'</td>
	 							</tr>
	 							<tr>
	 								<td>Періодичність</td>
	 								<td>'.$row["period"].'</td>
	 							</tr>
	 							<tr>
	 								<td>Мова видання</td>
	 								<td>'.$row["language"].'</td>
	 							</tr>
	 							<tr>
	 								<td>Засновники</td>
	 								<td>'.$row["authors"].'</td>
	 							</tr>
	 							<tr>
	 								<td>Головний редактор</td>
	 								<td>'.$row["editor"].'</td>
	 							</tr>
	 							<tr>
	 								<td>Відповідальний секретар</td>
	 								<td>'.$row["secretary"].'</td>
	 							</tr>
	 							<tr>
	 								<td>Члени редколегії</td>
	 								<td>'.$row["members"].'</td>
	 							</tr>
	 							<tr>
	 								<td>Адреса<br>редакції</td>
	 								<td>'.$row["address"].'</td>
	 							</tr>
	 						</tbody>
 						</table>
 						';
 						echo 
 						'
							<h3>*Щоб потрапити на сайт журналу, перейдіть за посиланням в заголовку</h3>
 						';
 					
 					}
    				while ($row = mysql_fetch_array($result));
				}
					break;

					case 'edit':
		$result = mysql_query("SELECT * FROM magazines WHERE mag_id='$mag_id'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo '
					<ul id="red">
							<li><a href="view_magazine.php?mag_id='.$row["mag_id"].'&action=view">Вигляд</a></li>
							<li class="active"><a href="view_magazine.php?mag_id='.$row["mag_id"].'&action=edit">Редагувати</a></li>
						</ul>
					<h1>'.$row["mag_title"].'</h1>				
		<form action="view_magazine.php?mag_id='.$row["mag_id"].'&action=view" method="post">
		';
 						echo 
 						'
							<label>Заголовок</label>
							<br><br>
							<input type="text" name="title" value="'.$row["mag_title"].'">
							<br><br>
							<label>Проблема</label>
							<br><br>
 							<textarea name="problem">'.$row["problem"].'</textarea>
 							<br><br>
 							<label>Сайт</label>
							<br><br>
 							<input type="text" name="url" value="'.$row["url"].'">
 							<br><br>
							<label>Свідоцтво про державну реєстрацію</label>
							<br><br>
							<input type="text" name="certificate" value="'.$row["certificate"].'">
							<br><br>
							<label>Рік заснування</label>
							<br><br>
							<input type="number" name="year" value="'.$row["year"].'">
							<br><br>
							<label>ISSN</label>
							<br><br>
							<input type="text" name="ISSN" value="'.$row["ISSN"].'">
							<br><br>
							<label>Періодичність</label>
							<br><br>
							<input type="text" name="period" value="'.$row["period"].'">
							<br><br>
							<label>Мова видання</label>
							<br><br>
							<input type="text" name="language" value="'.$row["language"].'">
							<br><br>
							<label>Засновники</label>
							<br><br>
							<input type="text" name="authors" value="'.$row["authors"].'">
							<br><br>
							<label>Головний редактор</label>
							<br><br>
							<input type="text" name="editor" value="'.$row["editor"].'">
							<br><br>
							<label>Відповідальний секретар</label>
							<br><br>
							<input type="text" name="secretary" value="'.$row["secretary"].'">
							<br><br>
							<label>Члени редколегії</label>
							<br><br>
							<textarea name="members">'.$row["members"].'</textarea>
							<br><br>
							<label>Адреса редакції</label>
							<br><br>
							<textarea name="address">'.$row["address"].'</textarea>
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
					$result = mysql_query("SELECT * FROM magazines WHERE mag_id='$mag_id'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						'
 						<ul id="red">
							<li class="active"><a href="view_magazine.php?mag_id='.$row["mag_id"].'&action=view">Вигляд</a></li>
							<li><a href="view_magazine.php?mag_id='.$row["mag_id"].'&action=edit">Редагувати</a></li>
						</ul>
 						<h1>'.$row["mag_title"].'</h1>
 						';
 						echo 
 						'
 						<img src="img/'.$row["image"].'" id="magaz">
 						<table id="table-1">
	 						<tbody>
	 							<tr>
	 								<td>Проблематика</td>
	 								<td>'.$row["problem"].'</td>
	 							</tr>
	 							<tr>
	 								<td>Свідоцтво про державну реєстрацію</td>
	 								<td>'.$row["certificate"].'</td>
	 							</tr>
	 							<tr>
	 								<td>Рік заснування</td>
	 								<td>'.$row["year"].'</td>
	 							</tr>
	 							<tr>
	 								<td>ISSN</td>
	 								<td>'.$row["ISSN"].'</td>
	 							</tr>
	 							<tr>
	 								<td>Періодичність</td>
	 								<td>'.$row["period"].'</td>
	 							</tr>
	 							<tr>
	 								<td>Мова видання</td>
	 								<td>'.$row["language"].'</td>
	 							</tr>
	 							<tr>
	 								<td>Засновники</td>
	 								<td>'.$row["authors"].'</td>
	 							</tr>
	 							<tr>
	 								<td>Головний редактор</td>
	 								<td>'.$row["editor"].'</td>
	 							</tr>
	 							<tr>
	 								<td>Відповідальний секретар</td>
	 								<td>'.$row["secretary"].'</td>
	 							</tr>
	 							<tr>
	 								<td>Члени редколегії</td>
	 								<td>'.$row["members"].'</td>
	 							</tr>
	 							<tr>
	 								<td>Адреса редакції</td>
	 								<td>'.$row["address"].'</td>
	 							</tr>
	 						</tbody>
 						</table>
 						';
 						echo 
 						'
 						<ul id="about">
 							<li class="about_active"><a href="view_magazine.php?mag_id='.$row["mag_id"].'&action=view">Загальне</a></li>
 							<li><a href="about_magazine.php?mag_id='.$row["mag_id"].'&action=view">Відомості</a></li>
 							<li><a href="rules.php?mag_id='.$row["mag_id"].'&action=view">Правила</a></li>
 							<li><a href="archieve.php?mag_id='.$row["mag_id"].'&action=view">Архів</a></li>
 						</ul>
 						';		
 					}
    				while ($row = mysql_fetch_array($result));
				}
					break;
				}
		?>
	</div>
	<footer id="foot">
	</footer>
	</div>
	<script type="text/javascript">
		CKEDITOR.replace("problem");
		CKEDITOR.replace("members");
		CKEDITOR.replace("address");
	</script>
</body>
</html>
<?php
}else
{
    header("Location: ../login.php");
}
?>