<?php
    session_start();
    define("myeshop", true);
    include("include/db_connect.php");
    include("include/functions.php");

    

    if (isset($_POST['enter']))
 {
 
    $login = $_POST["input_login"];
    $pass  = $_POST["input_pass"];
    
  
 if ($login && $pass)
  {   
   $result = mysql_query("SELECT * FROM reg_admin WHERE login = '$login' AND pass = '$pass'",$link);
   
 If (mysql_num_rows($result) > 0)
  {
    $row = mysql_fetch_array($result);

    $_SESSION['auth_admin'] = 'yes_auth'; 
    
    header("Location: admin/index.php");
  }else
  {
        $msgerror = "Неправильний логін чи пароль"; 
  }
        
    }else
    {
        $msgerror = "Заповніть усі поля!";
    }
 }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Вхід</title>
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
		<h1>Вхід</h1>
		<?php
  
    if ($msgerror)
    {
        echo '<p style="text-align: center; color: red;" >'.$msgerror.'</p>';
        
    }
    
?>
		<form method="post" id="enter">
<label>Ім'я користувача</label><br>
<input type="text" name="input_login"><br><br>
<label>Пароль</label><br>
<input type="password" name="input_pass"><br><br>
<input type="submit" name="enter" value="Вхід"></p>
</form>
	</div>
	<footer id="foot">
	</footer>
	</div>
</body>
</html>