<div id="block-parametr">
	<p class="search-title">Критерії</p>
	<form method="get" action="search_filter.php">
		<p class="category">Прізвище Ім'я По-батькові</p>
		<input type="text" name="pib" class="i">
		<p class="category">Відділ</p>
		<?php
		$result = mysql_query("SELECT * FROM categories WHERE parent_id='0'",$link);
 
 If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
  do
 {
 $viddil = ""; 
 if ($_GET["name"])
 {
    if (in_array($row["id"],$_GET["name"]))
    {
        $viddil = "checked";
    }
    
 } 
  
  
  echo '
<input '.$viddil.' type="checkbox" name="viddil[]" value="'.$row["id"].'" id="viddil'.$row["id"].'" /><label for="viddil'.$row["id"].'">'.$row["name"].'</label><br>
  
  '; 
 }
  while ($row = mysql_fetch_array($result));  
} 
  
?>
		<p class="category">Посада</p>
				<?php
		$result = mysql_query("SELECT * FROM posts",$link);
 
 If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
  do
 {
 $posada = ""; 
 if ($_GET["post"])
 {
    if (in_array($row["pos_id"],$_GET["post"]))
    {
        $posada = "checked";
    }
    
 } 
  
  
  echo '
<input '.$posada.' type="checkbox" name="posada[]" value="'.$row["pos_id"].'" id="post'.$row["pos_id"].'" /><label for="post'.$row["pos_id"].'">'.$row["post"].'</label><br>
  
  
  '; 
 }
  while ($row = mysql_fetch_array($result));  
} 
  
?>
		<p class="category">Вчений ступінь</p>
				<?php
		$result = mysql_query("SELECT * FROM academic_degrees",$link);
 
 If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
  do
 {
 $stupiny = ""; 
 if ($_GET["degree"])
 {
    if (in_array($row["st_id"],$_GET["degree"]))
    {
        $stupiny = "checked";
    }
    
 } 
  
  
  echo '
<input '.$stupiny.' type="checkbox" name="stupiny[]" value="'.$row["st_id"].'" id="stupiny'.$row["st_id"].'" /><label for="stupiny'.$row["st_id"].'">'.$row["degree"].'</label><br>
  
  
  '; 
 }
  while ($row = mysql_fetch_array($result));  
} 
  
?>
<br>
		<input type="submit" name="submit_search" value="Шукати">
	</form>
</div>
