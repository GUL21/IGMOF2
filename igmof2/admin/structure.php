<?php
	include("include/db_connect.php");

	$id = $_GET["news_id"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Структура інституту</title>
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
		<h1>Структура інституту</h1>
		<?php
//Выбираем данные из БД
$result=mysql_query("SELECT * FROM  categories");
//Если в базе данных есть записи, формируем массив
if   (mysql_num_rows($result) > 0){
    $cats = array();
//В цикле формируем массив разделов, ключом будет id родительской категории, а также массив разделов, ключом будет id категории
    while($cat =  mysql_fetch_assoc($result)){
        $cats_ID[$cat['id']][] = $cat;
        $cats[$cat['parent_id']][$cat['id']] =  $cat;
    }
}
function build_tree($cats,$parent_id,$only_parent = false){
    if(is_array($cats) and isset($cats[$parent_id])){
        $tree = '<ul class="categoria">';
        if($only_parent==false){
            foreach($cats[$parent_id] as $cat){
                $tree .= '<li><a href="view_section.php?id='.$cat["id"].'">'.$cat['name'];
                $tree .=  build_tree($cats,$cat['id']);
                $tree .= '</a></li><br>';
            }
        }elseif(is_numeric($only_parent)){
            $cat = $cats[$parent_id][$only_parent];
            $tree .= '<li>'.$cat['name'].' #'.$cat['id'];
            $tree .=  build_tree($cats,$cat['id']);
            $tree .= '</li><br>';
        }
        $tree .= '</ul>';
    }
    else return null;
    return $tree;
}
function find_parent ($tmp, $cur_id){
    if($tmp[$cur_id][0]['parent_id']!=0){
        return find_parent($tmp,$tmp[$cur_id][0]['parent_id']);
    }
    return (int)$tmp[$cur_id][0]['id'];
}
echo build_tree($cats,0,find_parent($cats_ID,ВАШ_ID_КАТЕГОРИИ));
?>
	</div>
	<footer id="foot">
	</footer>
	</div>
</body>
</html>
