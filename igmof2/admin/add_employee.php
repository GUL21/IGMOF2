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
		$pib = $_POST['pib'];
		$viddil = $_POST['section'];
		$id = $_POST['id'];
		$posada = $_POST['post'];
		$iid = $_POST['iid'];
		$stupin = $_POST['degree'];
		$iidd = $_POST['iidd'];
		$status = $_POST['status'];
		$iiidd = $_POST['iiidd'];

		$result = mysql_query("INSERT INTO employees (PIB, section, post, degree, status, vid_id, pos_id, st_id, stat_id) VALUES('$pib', '$viddil', '$posada', '$stupin', '$status', '$id', '$iid', '$iidd', '$iiidd')");
		header('location: add_employee.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Додавання співробітника</title>
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
		<h1>Додати нового співробітника</h1>
 			<form id="forma" method="post">
 				<h5>ПІБ</h5>
 				<input type="text" name="pib" class="auto">	
				<h5>Відділ</h5>
				<select name="section" id="i1">
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
				<select name="id" id="i2" class="unvisible">
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
							<h5>Посада</h5>
				<select name="post" id="i3">
								<?php

	 				$result = mysql_query("SELECT * FROM posts",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo 
 						'
 							<option>'.$row["post"].'</option>
 						';
 						
 						echo 
 						'
 							
 						';
 					}
    				while ($row = mysql_fetch_array($result));
				} 
	 			?>
							</select>
				<select name="iid" id="i4" class="unvisible">
								<?php

	 				$result = mysql_query("SELECT * FROM posts",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo 
 						'
 							<option>'.$row["pos_id"].'</option>
 						';
 						
 						echo 
 						'
 							
 						';
 					}
    				while ($row = mysql_fetch_array($result));
				} 
	 			?>
							</select>
							<h5>Вчений ступінь</h5>
				<select name="degree" id="i5">
					<option></option>
								<?php

	 				$result = mysql_query("SELECT * FROM academic_degrees",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo 
 						'
 							<option>'.$row["degree"].'</option>
 						';
 						
 						echo 
 						'
 							
 						';
 					}
    				while ($row = mysql_fetch_array($result));
				} 
	 			?>
							</select>
				<select name="iidd" id="i6" class="unvisible">
								<?php

	 				$result = mysql_query("SELECT * FROM academic_degrees",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo 
 						'
 							<option>'.$row["st_id"].'</option>
 						';
 						
 						echo 
 						'
 							
 						';
 					}
    				while ($row = mysql_fetch_array($result));
				} 
	 			?>
							</select>
				<h5>Вчене звання</h5>
				<select name="status" id="i7">
					<option></option>
								<?php

	 				$result = mysql_query("SELECT * FROM academic_status",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo 
 						'
 							<option>'.$row["status"].'</option>
 						';
 						
 						echo 
 						'
 							
 						';
 					}
    				while ($row = mysql_fetch_array($result));
				} 
	 			?>
							</select>
				<select name="iiidd" id="i8" class="unvisible">
								<?php

	 				$result = mysql_query("SELECT * FROM academic_status",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo 
 						'
 							<option>'.$row["status_id"].'</option>
 						';
 						
 						echo 
 						'
 							
 						';
 					}
    				while ($row = mysql_fetch_array($result));
				} 
	 			?>
							</select><br><br><br>
			
			<input type="submit" name="submit" value="Додати">
		</form>	
	</div>
	<footer id="foot">
	</footer>
	</div>
		<script type="text/javascript">

    (function() {

        var first = document.getElementById('i1');
            second = document.getElementById('i2');
            third = document.getElementById('i3');
            fourth = document.getElementById('i4');
            fifth = document.getElementById('i5');
            sixth = document.getElementById('i6');
            seventh = document.getElementById('i7');
            eigth = document.getElementById('i8');

        first.onchange = function(){ second.selectedIndex = this.selectedIndex; };

        second.onchange = function(){ first.selectedIndex = this.selectedIndex; };

        third.onchange = function(){ fourth.selectedIndex = this.selectedIndex; };

        fourth.onchange = function(){ third.selectedIndex = this.selectedIndex; };

        fifth.onchange = function(){ sixth.selectedIndex = this.selectedIndex; };

        sixth.onchange = function(){ fifth.selectedIndex = this.selectedIndex; };

        seventh.onchange = function(){ eigth.selectedIndex = this.selectedIndex; };

        eigth.onchange = function(){ seventh.selectedIndex = this.selectedIndex; };



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
