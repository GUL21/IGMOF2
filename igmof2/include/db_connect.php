<?php
// defined('myeshop') or die('Нет контакта!');
$db_host		= 'localhost';
$db_user		= 'root';
$db_pass		= '';
$db_database	= 'igmof'; 
$link = mysql_connect($db_host,$db_user,$db_pass);
mysql_select_db($db_database,$link) or die("Нет контакта".mysql_error());
?>