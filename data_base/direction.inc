<?php

// GET: direction-aside-subaside-(content_category-content_author-content_type)-content
// GET: 1-3-1-25-bondarenko_kategoria_groshej_ta_obminu_v_postindustrialnij_ekonomici_ua.php
// GET: 1-3-1-25-direction.php

if ($_SERVER['PHP_SELF'] == '/index.php') {	// Выбран возврат на главную страницу
	// Обнуление параметров выбора
	$path = '0-0-0-0';
	$direction = 0;
	$aside = 0;
	$subaside = 0;
	$content_author = 0;
	$content_category = 0;
	$content_type = 0;
	$content_path = 0;
	$content = '';
	$_SESSION['path'] = $path;
	$_SESSION['direction'] = $direction;
	$_SESSION['aside'] = $aside;
	$_SESSION['subaside'] = $subaside;
	$_SESSION['content_author'] = $content_author;
	$_SESSION['content_category'] = $content_category;
	$_SESSION['content_type'] = $content_type;
	$_SESSION['content'] = $content;
	// Обнуление данных формы добавления контента
	closeContentNew (1);
} else {	// Выбрана любая другая страница
	if (IsSet($_GET['path']) && IsSet($_GET['content'])) {	// Изъятие пути к контенту
		$path = $_GET['path'];	// Изъятие пути к контенту
		$_SESSION['path'] = $path;	// Сохраняем в сессии выбор пути к контенту
		$parse_path = preg_split("/[-]+/", $path); // Парсинг пути к контенту
		$direction = $parse_path[0];
		$aside = $parse_path[1];
		$subaside = $parse_path[2];
		$content_category = 0;
		$content_author = 0;
		$content_type = 0;
		$content_path = 0;
		if ($aside == 2 || $aside == 3) {
			if ($subaside == 1) {
				$content_category = $parse_path[3];
				if ($content_category != 0) $content_path = $content_category;
			}
			if ($subaside == 2) {
				$content_author = $parse_path[3];
				if ($content_category != 0) $content_path = $content_category;
			}
			if ($subaside == 3) {
				$content_type = $parse_path[3];
				if ($content_category != 0) $content_path = $content_category;
			}
		}
		$content = $_GET['content'];		// Изъятие названия контента
		$_SESSION['content'] = $content;	// Сохраняем в сессии название контента
		// Обнуление данных формы добавления контента
		closeContentNew (1);
	} else {
		if (IsSet($_GET['path'])) {	// Изъятие пути к контенту
			$path = $_GET['path'];
			$_SESSION['path'] = $path;	// Сохраняем в сессии выбор пути к контенту
			$parse_path = preg_split("/[-]+/", $path); // Парсинг пути к контенту
			$direction = $parse_path[0]; 
			$aside = $parse_path[1];
			$subaside = $parse_path[2];
			$content_category = 0;
			$content_author = 0;
			$content_type = 0;
			$content_path = 0;
			if ($aside == 2 || $aside == 3) {
				if ($subaside == 1) {
					$content_category = $parse_path[3];
					if ($content_category != 0) $content_path = $content_category;
				}
				if ($subaside == 2) {
					$content_author = $parse_path[3];
					if ($content_category != 0) $content_path = $content_category;
				}
				if ($subaside == 3) {
					$content_type = $parse_path[3];
					if ($content_category != 0) $content_path = $content_category;
				}
			}
			$content = '';
			$_SESSION['content'] = $content;
			// Обнуление данных формы добавления контента
			closeContentNew (1);
		} else {	// Выбран не пункт меню
			if (IsSet($_SESSION['path'])) {	// Путь к контенту уже есть в этой сессии, то есть был выбран ранее
				$path = $_SESSION['path'];
				$parse_path = preg_split("/[-]+/", $path); // Парсинг пути к контенту
				$direction = $parse_path[0]; 
				$aside = $parse_path[1];
				$subaside = $parse_path[2];
				$content_category = 0;
				$content_author = 0;
				$content_type = 0;
				$content_path = 0;
				if ($aside == 2 || $aside == 3) {
					if ($subaside == 1) {
						$content_category = $parse_path[3];
						if ($content_category != 0) $content_path = $content_category;
					}
					if ($subaside == 2) {
						$content_author = $parse_path[3];
						if ($content_category != 0) $content_path = $content_category;
					}
					if ($subaside == 3) {
						$content_type = $parse_path[3];
						if ($content_category != 0) $content_path = $content_category;
					}
				}
				$content = '';
				$_SESSION['content'] = $content;
			} else {
				// Обнуление параметров выбора
				$path = '0-0-0-0';
				$direction = 0;
				$aside = 0;
				$subaside = 0;
				$content_author = 0;
				$content_category = 0;
				$content_type = 0;
				$content_path = 0;
				$content = '';
				$_SESSION['path'] = $path;
				$_SESSION['direction'] = $direction;
				$_SESSION['aside'] = $aside;
				$_SESSION['subaside'] = $subaside;
				$_SESSION['content_author'] = $content_author;
				$_SESSION['content_category'] = $content_category;
				$_SESSION['content_type'] = $content_type;
				$_SESSION['content'] = $content;
			}
		}
	}
}

if ($aside != 0) {
	if ($aside == 1) {
		if ($subaside == 1) $content_status = 1;
		if ($subaside == 2) $content_status = 2;
	}
	if ($aside == 2) $content_status = 3;
	if ($aside == 3) $content_status = 4;
}


function get_path($url) { // get path content GET-parameters string
    preg_match('/^([^?]+)(\?path.*?)?(&content.*)?$/', $url, $matches);
    if (isset($matches[2])) {
		parse_str(substr($matches[2], 1), $path);
		$parse_path = preg_split("/[-]+/", $path['path']);
	} else {
		$parse_path[0] = '';
		$parse_path[1] = '';
		$parse_path[2] = '';
		$parse_path[3] = '';
	}
    return $parse_path;
}

function get_content($url) { // get content GET-parameters string
    preg_match('/^([^?]+)(\?path.*?)?(&content.*)?$/', $url, $matches);
    if (isset($matches[3])) {
		parse_str(substr($matches[3], 1), $content);
	} else {
		$content = '';
	}
    return $content['content'];
}


?>