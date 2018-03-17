<?php

// Формируем путь в заголовке
$path = '';
$direction_path = '';
$aside_path = '';
$category_path = '';
$type_path = '';
$path_title = '';
$direction_path_title = '';
$aside_path_title = '';
$category_path_title = '';
$type_path_title = '';

$direction_path = '<a href="#">'.$interface_direction[$direction].'</a>';
$direction_path_title = ' | '.$interface_direction[$direction];

switch($aside) {
case '1':
	// $aside_path = ' / <a href="#">'.$interface_aside[1]."</a>";
	// $aside_path_title = ' | '.$interface_aside[1];
	if ($subaside != 0) {
		$subaside_path = ' / <a href="#">'.$interface_subaside[$content_status].'</a>';
		$subaside_path_title = ' | '.$interface_subaside[$content_status];
	}
    break;
case '2':
	$aside_path = ' / <a href="#">'.$interface_aside[2].'</a>';
	$aside_path_title = ' | '.$interface_aside[2];
    break;
case '3':
	$aside_path = ' / <a href="#">'.$interface_aside[3].'</a>';
	$aside_path_title = ' | '.$interface_aside[3];
    break;
default:
	$aside_path = '';
	$aside_path_title = '';
}
	
if ($content_category <> 0) {
	$category_path = ' / <a href="#">'.$interface_category[$content_category].'</a>';
	$category_path_title = ' | '.$interface_category[$content_category];
}
if ($content_author <> 0) {
	$content_author_path = ' / <a href="#">'.$interface_author[$content_author].'</a>';
	$content_author_path_title = ' | '.$interface_author[$content_author];
}
if ($content_type <> 0) {
	$content_type_path = ' / <a href="#">'.$interface_content_type[$content_type].'</a>';
	$content_type_path_title = ' | '.$interface_content_type[$content_type];
}

if ($_SERVER['PHP_SELF'] == '/add.php') {
	$path_content = '<a href="#">'.$interface_system[10].'</a>';
	$path_title = ' | '.$interface_system[10];
} else if ($_SERVER['PHP_SELF'] == '/directions.php') {
	$path_content = $direction_path.$aside_path.$subaside_path.$category_path.$content_author_path.$content_type_path;
	$path_title = $direction_path_title.$aside_path_title.$subaside_path_title.$category_path_title.$content_author_path_title.$content_type_path_title;
} else if ($_SERVER['PHP_SELF'] == '/index.php') {
	$path_content = $direction_path;
	$path_title = $direction_path_title;
}
?>