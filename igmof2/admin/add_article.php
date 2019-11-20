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
		$art_title = $_POST['art_title'];
		$authors_r = $_POST['authors_rel'];
		$authors_o = $_POST['authors_oth'];
		$page = $_POST['page'];
		$main_ua = $_POST['main_ua'];
		$main_ru = $_POST['main_ru'];
		$main_en = $_POST['main_en'];
		$number_mag = $_POST['number_mag'];
		$keywords = $_POST['keywords'];
		$include = $_POST['include'];

		$result = mysql_query("INSERT INTO articles (art_title, authors_rel, authors_oth, page, main_ua, main_ru, main_en, number_mag, keywords, include) VALUES('$art_title', '$authors_r', '$authors_o', '$page', '$main_ua', '$main_ru', '$main_en', '$number_mag', '$keywords', '$include')");
		header('location: add_article.php');


	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Додавання публікації</title>
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
		<h1>Додати нову публікацію</h1>
 			<form id="forma" method="post">
 				<h5>Назва публікації</h5>
 				<textarea name="art_title"></textarea>	
				<h5>Автори(співробітники)</h5>
				<textarea name="authors_rel"></textarea>
				<h5>Автори</h5>
				<textarea name="authors_oth"></textarea>
				<h5>Сторінка</h5>
				<input type="number" name="page">
				<h5>Текст українською</h5>
				<textarea name="main_ua"></textarea>
				<h5>Текст російською</h5>
				<textarea name="main_ru"></textarea>
				<h5>Текст англійською</h5>
				<textarea name="main_en"></textarea>
<h5>Номер журналу</h5>
<h4>Геохімія та рудоутворення</h4>
<select name="number_mag" size="10" id="mag">

<?php
$category = mysql_query("SELECT * FROM public WHERE magazine='Геохімія та рудоутворення' ORDER BY publication DESC",$link);
    
If (mysql_num_rows($category) > 0)
{
$result_category = mysql_fetch_array($category);
do
{
  
  echo '
  
  <option>'.$result_category["publication"].'</option>
  
  ';
    
}
 while ($result_category = mysql_fetch_array($category));
}
?> 

</select>
<h4>Мінералогічний журнал</h4>
<select name="number_mag" size="10" id="mag">

<?php
$category = mysql_query("SELECT * FROM public WHERE magazine='Мінералогічний журнал' ORDER BY publication DESC",$link);
    
If (mysql_num_rows($category) > 0)
{
$result_category = mysql_fetch_array($category);
do
{
  
  echo '
  
  <option>'.$result_category["publication"].'</option>
  
  ';
    
}
 while ($result_category = mysql_fetch_array($category));
}
?> 

</select>
<h4>Пошукова та екологічна геохімія</h4>
<select name="number_mag" size="10" id="mag">

<?php
$category = mysql_query("SELECT * FROM public WHERE magazine='Пошукова та екологічна геохімія' ORDER BY publication DESC",$link);
    
If (mysql_num_rows($category) > 0)
{
$result_category = mysql_fetch_array($category);
do
{
  
  echo '
  
  <option>'.$result_category["publication"].'</option>
  
  ';
    
}
 while ($result_category = mysql_fetch_array($category));
}
?> 

</select>
				<h5>Ключові слова</h5>
				<textarea name="keywords"></textarea>
				<h5>Вкладення</h5>
				<textarea name="include"></textarea>
			<br>
			<input type="submit" name="submit" value="Додати">
		</form>	
	</div>
	<footer id="foot">
	</footer>
	</div>
		<script type="text/javascript">
    CKEDITOR.replace("art_title");
    CKEDITOR.replace("authors_rel");
    CKEDITOR.replace("authors_oth");
    CKEDITOR.replace("main_ua");
    CKEDITOR.replace("main_ru");
    CKEDITOR.replace("main_en");
    CKEDITOR.replace("keywords");
    CKEDITOR.replace("include");
</script>
</body>
</html>
<?php
}else
{
    header("Location: ../login.php");
}
?>