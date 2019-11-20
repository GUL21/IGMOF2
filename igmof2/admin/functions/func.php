<?php

function get_events(){
	global $db;
	// $query = "SELECT * FROM events";
	$query = "SELECT id, title, `start`, `end` FROM fcalendar";
	$res = mysqli_query($db, $query);
	return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function get_json($arr){
	$data = '[';
	foreach($arr as $item){
		$data .= '{ "start": "' . $item['start'] . '", "end": "' . $item['end'] . '", "title": "' . $item['title'] . '" },';
	}
	$data .= ']';
	return $data;
}

function print_arr($arr){
	echo '<pre>' . print_r($arr, true) . '</pre>';
}