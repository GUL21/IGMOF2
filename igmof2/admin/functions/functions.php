<?php
/**
* Основные функции
*/

include("include/db_connect.php");

//Функция получения массива каталога
function get_cat() {
	//запрос к базе данных
	$sql = "SELECT * FROM categories";
	$result = mysql_query($sql);
	if(!$result) {
		return NULL;
	}
	$arr_cat = array();
	if(mysql_num_rows($result) != 0) {
		
		//В цикле формируем массив
		for($i = 0; $i < mysql_num_rows($result);$i++) {
			$row = mysql_fetch_array($result,MYSQL_ASSOC);
			
			//Формируем массив где ключами являются адишники на родительские категории
			if(empty($arr_cat[$row['parent_id']])) {
				$arr_cat[$row['parent_id']] = array();
			}	
			$arr_cat[$row['parent_id']][] = $row;	
		}
		//возвращаем массив
		return $arr_cat;
	}
}	

//вывод каталогa с помощью рекурсии		
function view_cat($arr,$parent_id = 0) {

	//Условия выхода из рекурсии
	if(empty($arr[$parent_id])) {
		return;
	}
	echo '<ul>';
	//перебираем в цикле массив и выводим на экран
	for($i = 0; $i < count($arr[$parent_id]);$i++) {
		echo '<li><a href="?category_id='.$arr[$parent_id][$i]['id'].
					'&parent_id='.$parent_id.'">'
					.$arr[$parent_id][$i]['title'].'</a>';
		//рекурсия - проверяем нет ли дочерних категорий
		view_cat($arr,$arr[$parent_id][$i]['id']);
		echo '</li>';
	}
	echo '</ul>';
	
}
?>