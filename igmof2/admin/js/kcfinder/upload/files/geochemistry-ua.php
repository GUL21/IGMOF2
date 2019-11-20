<?php
	include("../include/db_connect.php");

	$id=$_GET["proj_id"];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Геохімія</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
</head>
<body>
	<div id="block-body">
	<header id="head">
		<div id="nav">
			<ul>
				<li><a href="index.php">Головна</a></li>
				<li class="active"><a class="act" href="projects.php">Проекти</a></li>
				<li><a href="">Контакти</a></li>
			</ul>
		</div>
		<div id="block-header">
			<?php
				include("../include/block-header.php");
			?>
		</div>
	</header>
	<div id="block-left">
		<?php
			include("../include/block-left.php");
		?>
	</div>
	<div id="block-right">
		<?php
			include("../include/block-right.php");
		?>
	</div>
	<div id="block-content">
		<center>
			<h3>
				<i>-Геохімія-</i>
			</h3>
		</center>
		<br>
	 			<?php
$num = 5; // Çäåñü óêàçûâàåì ñêîëüêî õîòèì âûâîäèòü òîâàðîâ.
    $page = (int)$_GET['page'];              
    
  $count = mysql_query("SELECT COUNT(*) FROM Проекти WHERE Фрази LIKE '%алмаз%'",$link);
    $temp = mysql_fetch_array($count);
  If ($temp[0] > 0)
  {  
  $tempcount = $temp[0];
  // Íàõîäèì îáùåå ÷èñëî ñòðàíèö
  $total = (($tempcount - 1) / $num) + 1;
  $total =  intval($total);
  $page = intval($page);
  if(empty($page) or $page < 0) $page = 1;  
       
  if($page > $total) $page = $total;
   
  // Âû÷èñëÿåì íà÷èíàÿ ñ êàêîãî íîìåðà
    // ñëåäóåò âûâîäèòü òîâàðû 
  $start = $page * $num - $num;
  $qury_start_num = " LIMIT $start, $num"; 
  }
	 				// $i = 1;
	 				$result = mysql_query("SELECT * FROM Проекти WHERE Фрази LIKE '%геохімія%' $qury_start_num",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo 
 						'
 							<h1>'.$row["Заголовок"].'</h1><br>
 						';
 						echo $row["Анотація"];
 						echo 
 						'
 							<a class="asp" href="../../view_project.php?Заголовок='.$row["Заголовок"].'">Читати далі</a><br>
 						';
 					}
    				while ($row = mysql_fetch_array($result));
				} 
				if ($page != 1){ $pstr_prev = '<li><a class="pstr-prev" href="projects.php?page='.($page - 1).'">&lt;</a></li>';}
if ($page != $total) $pstr_next = '<li><a class="pstr-next" href="projects.php?page='.($page + 1).'">&gt;</a></li>';
// Ôîðìèðóåì ññûëêè ñî ñòðàíèöàìè
if($page - 5 > 0) $page5left = '<li><a href="projects.php?page='.($page - 5).'">'.($page - 5).'</a></li>';
if($page - 4 > 0) $page4left = '<li><a href="projects.php?page='.($page - 4).'">'.($page - 4).'</a></li>';
if($page - 3 > 0) $page3left = '<li><a href="projects.php?page='.($page - 3).'">'.($page - 3).'</a></li>';
if($page - 2 > 0) $page2left = '<li><a href="projects.php?page='.($page - 2).'">'.($page - 2).'</a></li>';
if($page - 1 > 0) $page1left = '<li><a href="projects.php?page='.($page - 1).'">'.($page - 1).'</a></li>';
if($page + 5 <= $total) $page5right = '<li><a href="projects.php?page='.($page + 5).'">'.($page + 5).'</a></li>';
if($page + 4 <= $total) $page4right = '<li><a href="projects.php?page='.($page + 4).'">'.($page + 4).'</a></li>';
if($page + 3 <= $total) $page3right = '<li><a href="projects.php?page='.($page + 3).'">'.($page + 3).'</a></li>';
if($page + 2 <= $total) $page2right = '<li><a href="projects.php?page='.($page + 2).'">'.($page + 2).'</a></li>';
if($page + 1 <= $total) $page1right = '<li><a href="projects.php?page='.($page + 1).'">'.($page + 1).'</a></li>';
if ($page+5 < $total)
{
    $strtotal = '<li><p class="nav-point">...</p></li><li><a href="projects.php?page='.$total.'">'.$total.'</a></li>';
}else
{
    $strtotal = ""; 
}
if ($total > 1)
{
    echo '
    <div class="pstrnav">
    <ul>
    ';
    echo $pstr_prev.$page5left.$page4left.$page3left.$page2left.$page1left."<li><a class='pstr-active' href='projects.php?page=".$page."'>".$page."</a></li>".$page1right.$page2right.$page3right.$page4right.$page5right.$strtotal.$pstr_next;
    echo '
    </ul>
    </div>
    ';
}

	 			?>
 			</tbody>
 		</table>
	</div>
	<footer id="foot">
	</footer>
	</div>
</body>
</html>