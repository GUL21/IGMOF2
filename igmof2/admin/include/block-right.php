<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/reset.css">
<?php
	include("db_connect.php");

    $key = $_GET["keyword"];

?>
<p class="zaglavie">МОВИ</p>
<ul class="listik">
	<li><img src="img/uk.gif" class="lang"><a href="">English</a></li>
	<li><img src="img/ua.gif" class="lang"><a href="">Українська</a></li>
</ul>
<p class="zaglavie">КЛЮЧОВІ СЛОВА</p>
<p class="words">
    <?php
	$result=mysql_query("SELECT * FROM  keywords LIMIT 10");
        if (mysql_num_rows($result) > 0)
        {
            $row = mysql_fetch_array($result); 
 
                do
                {
                    echo
                    '
                        <a href="view_keywords.php?keyword='.$row["keyword"].'">'.$row["keyword"].'</a>
                    ';
                }
            while ($row = mysql_fetch_array($result));
        }

    ?>
    <br>
        <a id="right" href="keywords.php">+</a>
</p>