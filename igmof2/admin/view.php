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

	$id=$_GET["proj_id"];

	if (isset($_POST['save']))
	{
		$authors = $_POST['authors'];
		$other = $_POST['other'];
		$zag = $_POST['zag'];
		$anotation = $_POST['anotation'];
		$main = $_POST['main'];
		$slova = explode(", ", $_POST['slova']);
		$leader = $_POST['leader'];
		$rk = $_POST['rk'];
		$date = $_POST['date'];

		$result = mysql_query("UPDATE projects SET authors='$authors', other='$other', title='$zag', anotation='$anotation', main='$main', keywords='$slova', leader='$leader', rk='$rk', data='$date' WHERE proj_id='$id'");
	}

	// if (isset())

?>
<!DOCTYPE html>
<html>
<head>
	<title>Редагування проекта</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
	<script src="js/jquery-1.7.min.js"></script>
	<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
	<style>
		#list_authors
		{
			/*border: 1px solid black;*/
			width: 300px;
			height: 400px;
			overflow-y: scroll;
		}
		.drag
		{
			padding: 5px;
			border: 1px solid black;
			cursor: pointer;
		}
	</style>
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
		<h1>Редагування проекта</h1>
		<?php
		$result = mysql_query("SELECT * FROM projects WHERE proj_id='$id'",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo 
 						'
 						<form method="post" action="view.php?proj_id='.$row["proj_id"].'" id="forma">
 						<br>
 						<p class="green">Заголовок</p>
 						<input type="text" name="zag" value="'.$row["title"].'" class="auto"><br><br>
 						<p class="green">Анотація</p>
						<textarea name="anotation">'.$row["anotation"].'</textarea><br><br>
 						<p class="green">Текст</p>
						<textarea name="main">'.$row["main"].'</textarea><br><br>
 						<p class="green">Автори</p>
						<br><br>
						<br><br>
 						';
 						?>
 					<div id="AUTHOR">
 						<div id="list_authors">
 							<?php
 							$result1 = mysql_query("SELECT * FROM employees ORDER BY PIB ASC",$link);  
	 				if (mysql_num_rows($result1) > 0)
					{
 						$row1 = mysql_fetch_array($result1); 
 
 					do
 					{
 							echo 
 							'
								<div class="drag" id="'.$row1["PIB"].'"  draggable="true"
    ondragstart="onDragStart(event);">'.$row1["PIB"].'</div>
 							';
 								}
    				while ($row1 = mysql_fetch_array($result1));
				} 
 							?>
 						</div>					
    					<textarea name="authors" id="drag_authors" name="authors" class="drop">
 							<?php
 							$result2 = mysql_query("SELECT * FROM projects WHERE proj_id='$id'",$link);  
	 				if (mysql_num_rows($result2) > 0)
					{
 						$row2 = mysql_fetch_array($result2); 
 
 					do
 					{
 							echo 
 							'
								'.$row2["authors"].'
 							';
 								}
    				while ($row2 = mysql_fetch_array($result2));
				} 
 							?>
 						</textarea>	
 					</div>	
 							<?php
 							echo 
 							'
 						
 						<p class="green">Інші</p>
 						<textarea name="other">'.$row["other"].'</textarea><br><br>
 						<p class="green">Ключові слова</p>	
 						<input type="text" class="auto" name="slova" value="'.$row["keywords"].'">
						<br><br>
 						<select name="slova[]" size="10" multiple>
 						';
 							$result1 = mysql_query("SELECT * FROM keywords ORDER BY keyword ASC",$link);  
	 				if (mysql_num_rows($result1) > 0)
					{
 						$row1 = mysql_fetch_array($result1); 
 
 					do
 					{
 							echo 
 							'
								<option>'.$row1["keyword"].'</option>
 							';
 								}
    				while ($row1 = mysql_fetch_array($result1));
				} 
 							?>
 							<?php
 							echo 
 							'
 						</select>
 						<p class="green">Керівник</p>	
 						<input type="text" class="auto" name="leader" value="'.$row["leader"].'">
						<br><br>
 						';
 						?>
 						<select name="leader" size="10">
 							<?php
 							$result1 = mysql_query("SELECT * FROM employees ORDER BY PIB ASC",$link);  
	 				if (mysql_num_rows($result1) > 0)
					{
 						$row1 = mysql_fetch_array($result1); 
 
 					do
 					{
 							echo 
 							'
								<option>'.$row1["PIB"].'</option>
 							';
 								}
    				while ($row1 = mysql_fetch_array($result1));
				} 
 							?>
 							<?php
 							echo 
 							'
 						</select>
 						<br><br>
 						<p class="green">РК</p>	
 						<input type="text" name="rk" value="'.$row["rk"].'"><br><br>
 						<p class="green">Роки виконання</p>	
 						<input type="text" name="date" value="'.$row["data"].'"><br><br>
 						<input type="submit" name="save" value="Зберегти">
 						</form>
 						';
 					}
    				while ($row = mysql_fetch_array($result));
				} 
				?>
	</div>
	<footer id="foot">
	</footer>
	<script type="text/javascript">
		CKEDITOR.replace("main");
		CKEDITOR.replace("anotation");
		CKEDITOR.replace("other");
		CKEDITOR.replace("drag_authors");

		function onDragStart(event) {
  event
    .dataTransfer
    .setData('text/plain', event.target.id);

  event
    .currentTarget
    .style
    .backgroundColor = 'yellow';
}

function onDragOver(event) {
  event.preventDefault();
}

function onDrop(event) {
  const id = event
    .dataTransfer
    .getData('text');

  const draggableElement = document.getElementById(id);
  const dropzone = event.target;
  
  dropzone.appendChild(draggableElement);

  event
    .dataTransfer
    .clearData();
}

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