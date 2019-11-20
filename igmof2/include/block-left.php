<p class="zaglavie_1">ПРО ІНСТИТУТ</p>
<ul class="list_1">
	<li><a href="history.php">Історія і діяльність</a></li>
	<li><a href="structure.php">Структура інституту</a></li>
	<li><a href="employees.php">Наукові співробітники</a></li>
	<li><a href="projects.php">Проекти</a></li>
	<li><a href="academic_council.php">Вчена рада</a></li>
	<li><a href="special_council.php?action=view">Спеціалізована вчена рада</a></li>
	<li><a href="uk_min_society.php">Українське мінералогічне товариство</a></li>
	<li><a href="comitet.php">Комітет по метеоритах</a></li>
	<li><a href="aspirantura.php">Аспірантура, докторантура</a></li>
	<li><a href="collective_centr.php">Центр колективного користування</a></li>
	<li><a href="contacts.php">Контакти</a></li>
</ul>
<p class="zaglavie_1">ПЕРІОДИЧНІ ВИДАННЯ</a></p>
<ul class="list_1">
	<?php 
		$result = mysql_query("SELECT * FROM magazines",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						'
							<li><a href="view_magazine.php?mag_id='.$row["mag_id"].'&action=view">'.$row["mag_title"].'</a></li>
 						';

 					}
 					while ($row = mysql_fetch_array($result));
				}
	?>
	
</ul>
<p class="zaglavie_1">ІНФОРМАЦІЙНІ ПОВІДОМЛЕННЯ</p>
<ul class="list_1">
	<?php 
		$result = mysql_query("SELECT * FROM events_type",$link);  
	 				if (mysql_num_rows($result) > 0)
					{
 						$row = mysql_fetch_array($result); 
 
 					do
 					{
 						echo
 						'
							<li><a href="event.php?event='.$row["event"].'">'.$row["event"].'</a></li>
 						';

 					}
 					while ($row = mysql_fetch_array($result));
				}
	?>
</ul>
<p class="zaglavie_1">
	<a href="login.php">ВХІД</a>
</p>
