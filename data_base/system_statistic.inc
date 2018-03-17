<?php
// Подсчет направлений 
$query_system_count = "SELECT Count(direction_id) AS count
					FROM directions
					WHERE direction_id <> 0";
$result_system_count = mysqli_query($db, $query_system_count) or die(mysqli_error($db));
// Если направления найдены
if (mysqli_num_rows($result_system_count) == 1) {
	$row_system_count = mysqli_fetch_array($result_system_count, MYSQL_ASSOC);
	$system_count_directions = $row_system_count['count'] - 1;
} else {
	die(mysqli_error($db));
}

// Подсчет статусов 
$query_system_count = "SELECT Count(content_status_id) AS count
					FROM content_status";
$result_system_count = mysqli_query($db, $query_system_count) or die(mysqli_error($db));
// Если статусы найдены
if (mysqli_num_rows($result_system_count) == 1) {
	$row_system_count = mysqli_fetch_array($result_system_count, MYSQL_ASSOC);
	$system_count_status = $row_system_count['count'];
} else {
	die(mysqli_error($db));
}

// Подсчет категорий 
for ($i = 1; $i <= $system_count_directions; $i++) {
	$query_system_count = "SELECT Count(content_category_id) AS count
						FROM content_categories
						WHERE direction_id = ".$i;
	$result_system_count = mysqli_query($db, $query_system_count) or die(mysqli_error($db));
	// Если категории найдены
	if (mysqli_num_rows($result_system_count) == 1) {
		$row_system_count = mysqli_fetch_array($result_system_count, MYSQL_ASSOC);
		$system_count_categories[$i] = $row_system_count['count'];
	} else {
		die(mysqli_error($db));
	}
}

// Подсчет типов 
$query_system_count = "SELECT Count(content_type_id) AS count
					FROM content_types";
$result_system_count = mysqli_query($db, $query_system_count) or die(mysqli_error($db));
// Если типы найдены
if (mysqli_num_rows($result_system_count) == 1) {
	$row_system_count = mysqli_fetch_array($result_system_count, MYSQL_ASSOC);
	$system_count_types = $row_system_count['count'];
} else {
	die(mysqli_error($db));
}

// Функция подсчета статистики контента
function countContentStatistic ($db, $direction, $status, $data) {
	if ($direction == 0) {
		// Подсчет контента статуса всех направлений
		$query_count = "SELECT Count(cn.content_id) AS count
						FROM contents AS cn, content_relations_status AS crs 
						WHERE cn.content_id = crs.content_id AND crs.content_status_id = '".$status."' AND cn.content_language = '".$_SESSION['language']."'";
	} else {
		if ($data != '') {
			switch($data) {
				case 'category':
					// Подсчет категорий контента
					$query_count = "SELECT Count(content_category_id) AS count FROM content_categories WHERE content_category_id IN (
							SELECT cc.content_category_id
							FROM content_categories AS cc, contents AS cn, content_relations_category AS crc, content_relations_direction AS crd, content_relations_status AS crs 
							WHERE cc.content_category_id = crc.content_category_id AND crc.content_id = cn.content_id AND cn.content_id = crd.content_id AND cc.direction_id = crd.direction_id AND crc.content_id = crs.content_id
							AND crs.content_status_id = '".$status."' AND cn.content_language = '".$_SESSION['language']."' AND crd.direction_id = '".$direction."')";
					break;
				case 'author':
					// Подсчет авторов контента 
					$query_count = "SELECT Count(content_author_id) AS count FROM content_authors WHERE content_author_id IN (
							SELECT ca.content_author_id
							FROM content_authors AS ca, contents AS cn, content_relations_author AS cra, content_relations_direction AS crd, content_relations_status AS crs 
							WHERE cn.content_id = cra.content_id AND cn.content_id = crs.content_id AND cn.content_id = crd.content_id AND 
							cn.content_id = crd.content_id AND cn.content_id = crs.content_id AND ca.content_author_id = cra.content_author_id 
							AND crs.content_status_id = '".$status."' AND cn.content_language = '".$_SESSION['language']."' AND crd.direction_id = '".$direction."')";
					break;
				case 'type':
					// Подсчет типов контента 
					$query_count = "SELECT Count(content_type_id) AS count FROM content_types WHERE content_type_id IN (
							SELECT ct.content_type_id
							FROM contents AS cn, content_types AS ct, content_relations_direction AS crd, content_relations_status AS crs, content_relations_type AS crt 
							WHERE cn.content_id = crd.content_id AND cn.content_id = crs.content_id AND cn.content_id = crt.content_id AND ct.content_type_id = crt.content_type_id 
							AND crs.content_status_id = '".$status."' AND cn.content_language = '".$_SESSION['language']."' AND crd.direction_id = '".$direction."')";
					break;
				default:
			}
		} else {
			// Подсчет контента статуса в выбраном направлении
			$query_count = "SELECT Count(cn.content_id) AS count
							FROM contents AS cn, content_relations_direction AS crd, content_relations_status AS crs 
							WHERE cn.content_id = crs.content_id AND cn.content_id = crd.content_id 
							AND crs.content_status_id = '".$status."' AND cn.content_language = '".$_SESSION['language']."' AND crd.direction_id = '".$direction."'";
		}
	}
	// Подсчет контента
	$result_count = mysqli_query($db, $query_count) or die(mysqli_error($db));
	// Если контент найден
	if (mysqli_num_rows($result_count) == 1) {
		$row_count = mysqli_fetch_array($result_count, MYSQL_ASSOC);
		$count = $row_count['count'];
	} else {
		die(mysqli_error($db));
	}
	return $count;
}

// Функции обработки формы добавления контента
/*
// Функция добавления нового контента в базу данных
function addContentNew () {
	//$content_new_language = $_POST['content_new_language'];
	//$content_new_year = $_POST['content_new_year'];
	//$content_new_title = $_POST['content_new_title'];
	//$content_new_annotation = $_POST['content_new_annotation'];
	//$content_new_bibliography = $_POST['content_new_bibliography'];
	//$content_new_description = $_POST['content_new_description'];
	$image_file = $_POST['content_new_image_file'];
	//$content_new_keywords = $_POST['content_new_keywords'];
	$status = $_POST['content_new_status'];
	$authors_array = addContentNewAuthors ($content_new_authors);
	//$content_new_authors_array = addContentNewAuthors($_POST['content_new_authors']);
	$url = addContentNewURL($authors_array, $_POST['content_new_title'], $_POST['content_new_language']);
	$text = $_POST['content_new_text'];
	
	$query = "INSERT INTO `contents` (`content_img`, `content_author`, `content_title`, `content_year`, `content_annotation`, `content_bibliography`, `content_url`, `content_language`, `content_description`, `content_keywords`, `content_reg_date`) VALUES
	(".$image_file.", ".$_POST['content_new_authors'].", ".$_POST['content_new_title'].", ".$_POST['content_new_year'].", ".$_POST['content_new_annotation'].", ".$_POST['content_new_bibliography'].", ".$url.", ".$_POST['content_new_language'].", ".$_POST['content_new_description'].", ".$_POST['content_new_keywords'].", '".date('Y-m-d H:i:s')."');";
	if (mysqli_query($db, $query) === TRUE) {
		printf("Inserted into table 'contents'.<br>");
	} else {
		printf("Not inserted into table 'contents'.<br>");
	}

	// Insert into table `content_authors`
	$author_test = addContentNewAuthorTest ($authors_array);
	$author_image = addContentNewImage($_POST['content_new_image_file']);
	if ($author_test === true) {
		$insert_record = $insert_record."('../img/oxana_yosypenko.jpg', ".$authors_array[0][$i].", ".$authors_array[1][$i].", '', '', 'Оксана Йосипенко — український філософ, перекладач, дослідник французької філософії.', 'Оксана Йосипенко — український філософ, перекладач, дослідник французької філософії.', 'oxana_yosypenko_ua', ".$_POST['content_new_language'].", 'Оксана Йосипенко — український філософ, перекладач, дослідник французької філософії.', 'оксана йосипенко, український філософ, перекладач, дослідник французької філософії', '".date('Y-m-d H:i:s')."'), ";
	}
	$insert_record = substr($insert_record, 0, (strlen($insert_record) - 2))
	$query = "INSERT INTO `content_authors` (`content_author_img`, `content_author_surname`, `content_author_name`, `content_author_born`, `content_author_death`, `content_author_annotation`, `content_author_biography`, `content_author_url`, `content_author_language`, `content_author_description`, `content_author_keywords`, `content_author_reg_date`) VALUES ".$insert_record.";";
	if (mysqli_query($db, $query) === TRUE) {
		printf("Inserted into table 'content_authors'.<br>");
	} else {
		printf("Not inserted into table 'content_authors'.<br>");
	}

	// Insert into table `content_relations_direction`
	$query = "INSERT INTO `content_relations_direction` (`direction_id`, `content_id`) VALUES
	('1', '23');";
	if (mysqli_query($db, $query) === TRUE) {
		printf("Inserted into table 'content_relations_direction'.<br>");
	} else {
		printf("Not inserted into table 'content_relations_direction'.<br>");
	}

	// Insert into table `content_relations_status`
	$query = "INSERT INTO `content_relations_status` (`content_status_id`, `content_id`) VALUES
	('3', '23');";
	if (mysqli_query($db, $query) === TRUE) {
		printf("Inserted into table 'content_relations_status'.<br>");
	} else {
		printf("Not inserted into table 'content_relations_status'.<br>");
	}

	// Insert into table `content_relations_category`
	$query = "INSERT INTO `content_relations_category` (`content_category_id`, `content_id`) VALUES
	('43', '23');";
	if (mysqli_query($db, $query) === TRUE) {
		printf("Inserted into table 'content_relations_category'.<br>");
	} else {
		printf("Not inserted into table 'content_relations_category'.<br>");
	}

	// Insert into table `content_relations_author`
	$query = "INSERT INTO `content_relations_author` (`content_author_id`, `content_id`) VALUES
	('1', '23');";
	if (mysqli_query($db, $query) === TRUE) {
		printf("Inserted into table 'content_relations_author'.<br>");
	} else {
		printf("Not inserted into table 'content_relations_author'.<br>");
	}

	// Insert into table `content_relations_type`
	$query = "INSERT INTO `content_relations_type` (`content_type_id`, `content_id`) VALUES
	('5', '23');";
	if (mysqli_query($db, $query) === TRUE) {
		printf("Inserted into table 'content_relations_type'.<br>");
	} else {
		printf("Not inserted into table 'content_relations_type'.<br>");
	}

}
*/
// Функция формирования массива со списком авторов
function addContentNewAuthors ($authors, $language) {
	$author_list = preg_split("/[,]+/", $authors);
	for ($i = 0; $i < count($author_list); $i++) {
		// Фамилия автора
		$authors_array[0][$i] = strstr(trim($author_list[$i], ' '), ' ', true).' ';
		// Имя автора
		$authors_array[1][$i]  = strstr(trim($author_list[$i], ' '), ' ');
		// URL автора
		$authors_array[2][$i]  = addContentNewURL($_POST['content_new_authors'], $_POST['content_new_title'], $_POST['content_new_language']);
	}
    return $author_array;
}

// !!ПЕРЕДЕЛАТЬ - Функция проверки наличия автора в базе данных
function addContentNewAuthorTest ($authors) {
	for ($i = 0; $i < count($authors); $i++) {
		$query = "INSERT INTO `content_authors` (`content_author_img`, `content_author_name`, `content_author_surname`, `content_author_born`, `content_author_death`, `content_author_annotation`, `content_author_biography`, `content_author_url`, `content_author_language`, `content_author_description`, `content_author_keywords`, `content_author_reg_date`";
		// Фамилия автора
		$authors_array[0][$i] = strstr(trim($author_list[$i], ' '), ' ', true).' ';
		// Имя автора
		$authors_array[1][$i]  = strstr(trim($author_list[$i], ' '), ' ');
		// URL автора
		$authors_array[2][$i]  = addContentNewURL($_POST['content_new_authors'], $_POST['content_new_title'], $_POST['content_new_language']);
	}
    return $author_test;
}

// Функция формирования названия файла контента
function addContentNewURL ($author, $title, $language) {
	for ($i = 0; $i < count($author); $i++) {
		$surname = strstr(trim($author[0][$i], ' '), ' ', true).' ';
		$authors = $authors.' '.$surname;
	}
	$str = $authors.' '.$title.' '. $language;
	// Переводим в транслит
	switch($language) {
	case 'de':
		$str = deTranslit($str);
		break;
	case 'fr':
		$str = frTranslit($str);
		break;
	case 'it':
		$str = itTranslit($str);
		break;
	case 'pl':
		$str = plTranslit($str);
		break;
	case 'ru':
		$str = ruTranslit($str);
		break;
	case 'sp':
		$str = spTranslit($str);
		break;
	case 'ua':
		$str = uaTranslit($str);
		break;
	default:
		$str = ruTranslit($str);
	}
    // Переводим в нижний регистр
    $str = strtolower($str);
    // Заменям ненужные символы на "_"
    $str = preg_replace('~[^-a-z0-9_]+~u', '_', $str);
    // Удаляем начальные и конечные '_'
    $str = trim($str, "_");
    return $str;
}

// Функция транслитерации с немецкого текста
function deTranslit($str) {
    $de = array('A', 'Ä', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'Ö', 'P', 'Q', 'R', 'S', 'ẞ', 'T', 'U', 'Ü', 'V', 'W', 'X', 'Y', 'Z', 'Ei', 'Eu', 'Äu', 'a', 'ä', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'ö', 'p', 'q', 'r', 's', 'ß', 't', 'u', 'ü', 'v', 'w', 'x', 'y', 'z', 'ei', 'eu', 'äu');
    $lat = array('A', 'E', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'Io', 'P', 'Q', 'R', 'S', 'S', 'T', 'U', 'Iu', 'V', 'W', 'X', 'Y', 'Z', 'Ai', 'Oi', 'Oi', 'a', 'e', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'io', 'p', 'q', 'r', 's', 's', 't', 'u', 'iu', 'v', 'w', 'x', 'y', 'z', 'ai', 'oi', 'oi');
    return str_replace($de, $lat, $str);
}
// Функция транслитерации с французского текста
function frTranslit($str) {
    $fr = array('A', 'Â', 'À', 'Æ', 'B', 'C', 'Ç', 'D', 'E', 'É', 'Ê', 'È', 'Ë', 'F', 'G', 'H', 'I', 'Î', 'Ï', 'J', 'K', 'L', 'M', 'N', 'O', 'Ô', 'Œ', 'P', 'Q', 'R', 'S', 'T', 'U', 'Û', 'Ù', 'Ü', 'V', 'W', 'X', 'Y', 'Ÿ', 'Z', 'a', 'â', 'à', 'æ', 'b', 'c', 'ç', 'd', 'e', 'é', 'ê', 'è', 'ë', 'f', 'g', 'h', 'i', 'î', 'ï', 'j', 'k', 'l', 'm', 'n', 'o', 'ô', 'œ', 'p', 'q', 'r', 's', 'ß', 't', 'u', 'û', 'ù', 'ü', 'v', 'w', 'x', 'y', 'ÿ', 'z');
    $lat = array('A', 'A', 'A', 'A', 'B', 'C', 'S', 'D', 'E', 'E', 'E', 'E', 'E', 'F', 'G', 'H', 'I', 'I', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'O', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'U', 'U', 'U', 'V', 'W', 'X', 'Y', 'Y', 'Z', 'a', 'a', 'a', 'a', 'b', 'c', 's', 'd', 'e', 'e', 'e', 'e', 'e', 'f', 'g', 'h', 'i', 'i', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'o', 'o', 'p', 'q', 'r', 's', 'ß', 't', 'u', 'û', 'ù', 'ü', 'v', 'w', 'x', 'y', 'y', 'z');
    return str_replace($fr, $lat, $str);
}
// Функция транслитерации с итальянского текста
function itTranslit($str) {
    $it = array('A', 'À', 'Ạ', 'B', 'C', 'D', 'E', 'É', 'È', 'F', 'G', 'H', 'I', 'Í', 'Ì', 'Î', 'J', 'K', 'L', 'M', 'N', 'O', 'Ò', 'Ó', 'P', 'Q', 'R', 'S', 'T', 'U', 'Ù', 'Ú', 'V', 'W', 'X', 'Y', 'Z', 'a', 'à', 'ạ', 'b', 'c', 'd', 'e', 'é', 'è', 'f', 'g', 'h', 'i', 'í', 'ì', 'î', 'j', 'k', 'l', 'm', 'n', 'o', 'ò', 'ó', 'p', 'q', 'r', 's', 't', 'u', 'ù', 'ú', 'v', 'w', 'x', 'y', 'z');
    $lat = array('A', 'A', 'A', 'B', 'C', 'D', 'E', 'E', 'E', 'F', 'G', 'H', 'I', 'I', 'I', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'O', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'U', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'a', 'a', 'b', 'c', 'd', 'e', 'e', 'e', 'f', 'g', 'h', 'i', 'i', 'i', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'o', 'o', 'p', 'q', 'r', 's', 't', 'u', 'u', 'u', 'v', 'w', 'x', 'y', 'z');
    return str_replace($it, $lat, $str);
}
// Функция транслитерации с польского текста
function plTranslit($str) {
    $pl = array('A', 'Ą', 'B', 'C', 'D', 'E', 'Ę', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'Ł', 'M', 'N', 'Ń', 'O', 'Ó', 'P', 'Q', 'R', 'S', 'Ś', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'Ż', 'Ź', 'a', 'ą', 'b', 'c', 'd', 'e', 'ę', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'ł', 'm', 'n', 'ń', 'o', 'ó', 'p', 'q', 'r', 's', 'ś', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'ż', 'ź');
    $lat = array('A', 'O', 'B', 'C', 'D', 'E', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'L', 'M', 'N', 'N', 'O', 'U', 'P', 'Q', 'R', 'S', 'SH', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'ZH', 'ZH', 'a', 'o', 'b', 'c', 'd', 'e', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'l', 'm', 'n', 'n', 'o', 'u', 'p', 'q', 'r', 's', 'sh', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'zh', 'zh');
    return str_replace($pl, $lat, $str);
}
// Функция транслитерации с русского текста
function ruTranslit($str) {
    $ru = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');
    $lat = array('A', 'B', 'V', 'G', 'D', 'Ie', 'Io', 'Zh', 'Z', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'Kh', 'Ts', 'Ch', 'Sh', 'Shch', '', 'Y', '', 'E', 'Iu', 'Ia', 'a', 'b', 'v', 'g', 'd', 'ie', 'io', 'zh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'kh', 'ts', 'ch', 'sh', 'shch', '', 'y', '', 'e', 'iu', 'ia');
    return str_replace($ru, $lat, $str);
}
// Функция транслитерации с испанского текста
function spTranslit($str) {
    $sp = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'Ñ', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'ñ', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
    $lat = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
    return str_replace($sp, $lat, $str);
}
// Функция транслитерации с украинского текста
function uaTranslit($str) {
    $ua = array('А', 'Б', 'В', 'Г', 'Ґ', 'Д', 'Е', 'Є', 'Ж', 'З', 'И', 'І', 'Ї', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ь', 'Ю', 'Я',            'а', 'б', 'в', 'г', 'ґ', 'д', 'е', 'є', 'ж', 'з', 'и', 'і', 'ї', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ь', 'ю', 'я');
    $lat = array('A', 'B', 'V', 'H', 'G', 'D', 'E', 'Ie', 'Zh', 'Z', 'Y', 'I', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'Kh', 'Ts', 'Ch', 'Sh', 'Shch', '', 'Iu', 'Ia', 'a', 'b', 'v', 'h', 'g', 'd', 'e', 'ie', 'gh', 'z', 'y', 'i', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'kh', 'ts', 'ch', 'sh', 'shch', '', 'iu', 'ia');
    return str_replace($ua, $lat, $str);
}

// Функция обработки группы переключателей формы
function chooseContentNewBtn ($form, $choose, $system_count_choose) {
	// Получение отобранных направлений
	$content_new_choose = '';
	for ($i=1; $i <= $system_count_choose; $i++) {
		if (IsSet($_POST[$form.'_'.$choose.'_'.$i])) {
			$content_new_choose = $content_new_choose.'1-'; 
		} else {
			$content_new_choose = $content_new_choose.'0-'; 
		}
	}
	$content_new_choose = substr($content_new_choose, 0, (strlen($content_new_choose) - 1));
	$_SESSION[$form.'_'.$choose] = $content_new_choose;
	return $content_new_choose; 
}

// Функция обработки группы переключателей формы
function chooseContentNewBtnCategory ($form, $choose, $system_count_choose, $i) {
	// Получение отобранных направлений
	$content_new_choose = '';
	for ($y=1; $y <= $system_count_choose; $y++) {
		if (IsSet($_POST[$form.'_'.$choose.'_'.$i.'_'.$y])) {
			$content_new_choose = $content_new_choose.'1-'; 
		} else {
			$content_new_choose = $content_new_choose.'0-'; 
		}
	}
	$content_new_choose = substr($content_new_choose, 0, (strlen($content_new_choose) - 1));
	$_SESSION[$form.'_'.$choose.'_'.$i] = $content_new_choose;
	return $content_new_choose; 
}

// Функция проверки заполнения полей формы
function testContentNew ($form, $direction, $type, $system_count) {
	if (IsSet($_SESSION['language'])) {
		$has_status[0] = 'has-success';
	} else {
		$has_status[0] = 'has-error';
	}
	if (IsSet($_POST[$form.'_language'])) {
		$_SESSION[$form.'_language'] = $_POST[$form.'_language'];
	}
	if (IsSet($_SESSION[$form.'_direction']) && ($_SESSION[$form.'_direction'] != '') && ($_SESSION[$form.'_direction'] != substr(str_repeat("0-", $system_count[0]), 0, (strlen(str_repeat("0-", $system_count[0])) - 1)))) {
		$_SESSION[$form.'_direction'] = $direction;
		$has_status[1] = 'has-success';
	} else {
		$has_status[1] = 'has-error';
	}
	if (IsSet($_POST[$form.'_status']) && ($_POST[$form.'_status'] != 0) && ($_POST[$form.'_status'] != str_repeat("-", 4))) {
		$_SESSION[$form.'_status'] = $_POST[$form.'_status'];
		$has_status[2] = 'has-success';
	} else {
		$has_status[2] = 'has-error';
	}
	if (IsSet($_POST[$form.'_year']) && ($_POST[$form.'_year'] != '')) {
		$_SESSION[$form.'_year'] = $_POST[$form.'_year'];
		$has_status[3] = 'has-success';
	} else {
		$has_status[3] = 'has-error';
	}
	if (IsSet($_POST[$form.'_authors']) && ($_POST[$form.'_authors'] != '')) {
		$_SESSION[$form.'_authors'] = $_POST[$form.'_authors'];
		$has_status[4] = 'has-success';
	} else {
		$has_status[4] = 'has-error';
	}
	if (IsSet($_POST[$form.'_title']) && ($_POST[$form.'_title'] != '')) {
		$_SESSION[$form.'_title'] = $_POST[$form.'_title'];
		$has_status[5] = 'has-success';
	} else {
		$has_status[5] = 'has-error';
	}
	if (IsSet($_POST[$form.'_annotation']) && ($_POST[$form.'_annotation'] != '')) {
		$_SESSION[$form.'_annotation'] = $_POST[$form.'_annotation'];
		$has_status[6] = 'has-success';
	} else {
		$has_status[6] = 'has-error';
	}
	if (IsSet($_POST[$form.'_bibliography']) && ($_POST[$form.'_bibliography'] != '')) {
		$_SESSION[$form.'_bibliography'] = $_POST[$form.'_bibliography'];
		$has_status[7] = 'has-success';
	} else {
		$has_status[7] = 'has-error';
	}
	if (IsSet($_POST[$form.'_description']) && ($_POST[$form.'_description'] != '')) {
		$_SESSION[$form.'_description'] = $_POST[$form.'_description'];
		$has_status[8] = 'has-success';
	} else {
		$has_status[8] = 'has-error';
	}
	if (IsSet($_POST[$form.'_keywords']) && ($_POST[$form.'_keywords'] != '')) {
		$_SESSION[$form.'_keywords'] = $_POST[$form.'_keywords'];
		$has_status[9] = 'has-success';
	} else {
		$has_status[9] = 'has-error';
	}
	if (IsSet($_POST[$form.'_image_file']) && ($_POST[$form.'_image_file'] != '')) {
		$_SESSION[$form.'_image_file'] = $_POST[$form.'_image_file'];
		$has_status[10] = 'has-success';
	} else {
		$has_status[10] = 'has-error';
	}
	if (IsSet($_SESSION[$form.'_type']) && ($_SESSION[$form.'_type'] != '') && ($_SESSION[$form.'_type'] != substr(str_repeat("0-", $system_count[1]), 0, (strlen(str_repeat("0-", $system_count[1])) - 1)))) {
		$_SESSION[$form.'_type'] = $type;
		$has_status[11] = 'has-success';
	} else {
		$has_status[11] = 'has-error';
	}
	if (IsSet($_POST[$form.'_categories']) && ($_POST[$form.'_categories'] != '')) {
		$_SESSION[$form.'_categories'] = $_POST[$form.'_categories'];
		$has_status[12] = 'has-success';
	} else {
		$has_status[12] = 'has-error';
	}
	if (IsSet($_POST[$form.'_text']) && ($_POST[$form.'_text'] != '')) {
		$_SESSION[$form.'_text'] = $_POST[$form.'_text'];
		$has_status[13] = 'has-success';
	} else {
		$has_status[13] = 'has-error';
	}
	return $has_status;
}

// Функция проверки заполнения полей формы
function testContentNewCategory ($form, $category, $system_count, $i) {
	if (IsSet($_SESSION[$form.'_category_'.$i]) && ($_SESSION[$form.'_category_'.$i] != '') && ($_SESSION[$form.'_category_'.$i] != substr(str_repeat("0-", $system_count), 0, (strlen(str_repeat("0-", $system_count)) - 1)))) {
		$_SESSION[$form.'_category_'.$i] = $category;
		$has_status_category = 'has-success';
	} else {
		$has_status_category = 'has-error';
	}
	return $has_status_category;
}

// Функция проверки готовности формы к записи
function testContentNewSave ($system_count, $system_count_categories) {
	$save_data = true;
	if (!IsSet($_POST['content_new_language']) || strlen($_POST['content_new_language']) == 0) { 
		$save_data = false;
	}
	if (!IsSet($_POST['content_new_status']) || strlen($_POST['content_new_status']) == 0) { 
		$save_data = false;
	}
	if (!IsSet($_POST['content_new_year']) || strlen($_POST['content_new_year']) == 0) { 
		$save_data = false;
	}
	if (!IsSet($_POST['content_new_authors']) || strlen($_POST['content_new_authors']) == 0) { 
		$save_data = false;
	}
	if (!IsSet($_POST['content_new_title']) || strlen($_POST['content_new_title']) == 0) { 
		$save_data = false;
	}
	if (!IsSet($_POST['content_new_annotation']) || strlen($_POST['content_new_annotation']) == 0) { 
		$save_data = false;
	}
	if (!IsSet($_POST['content_new_bibliography']) || strlen($_POST['content_new_bibliography']) == 0) { 
		$save_data = false;
	}
	if (!IsSet($_POST['content_new_description']) || strlen($_POST['content_new_description']) == 0) { 
		$save_data = false;
	}
	if (!IsSet($_POST['content_new_image_file']) || strlen($_POST['content_new_image_file']) == 0) { 
		$save_data = false;
	}
	if (!IsSet($_POST['content_new_keywords']) || strlen($_POST['content_new_keywords']) == 0) { 
		$save_data = false;
	}
	if (!IsSet($_POST['content_new_text']) || strlen($_POST['content_new_text']) == 0) { 
		$save_data = false;
	}
	// Формирование и проверка списка выбранных элементов в группе переключателей направлений контента
	chooseContentNewBtn ('content_new', 'direction', $system_count[0]);
	if (IsSet($_SESSION['content_new_direction']) && ($_SESSION['content_new_direction'] != '')) {
		if (strpos($_SESSION['content_new_direction'], '1') === false) {
			$save_data = false;
		}
	} else {
		$save_data = false;
	}
	// Формирование и проверка списка выбранных элементов в группе переключателей типов контента
	chooseContentNewBtn ('content_new', 'type', $system_count[1]);
	if (IsSet($_SESSION['content_new_type']) && ($_SESSION['content_new_type'] != '')) {
		if (strpos($_SESSION['content_new_type'], '1') === false) {
			$save_data = false;
		}
	} else {
		$save_data = false;
	}
	// Формирование и проверка списка выбранных элементов в группах переключателей категорий контента
	$parse_content_new_direction = preg_split("/[-]+/", $_SESSION['content_new_direction']); 
	// Формирование списка выбранных направлений контента
	for ($i=1; $i <= $system_count[0]; $i++) {
		if ($parse_content_new_direction[$i - 1] == '1') {
			chooseContentNewBtnCategory ('content_new', 'category', $system_count_categories[$i], $i);
			if (IsSet($_SESSION['content_new_category_'.$i]) && ($_SESSION['content_new_category_'.$i] != '')) {
				if (strpos($_SESSION['content_new_category_'.$i], '1') === false) {
					$save_data = false;
				}
			} else {
				$save_data = false;
			}
		}
	}
	return $save_data;
}

// Функция закрытия формы
function closeContentNew ($step) {
	// Обнуление данных формы добавления контента
	if ($step == 1) $_SESSION['content_new_step'] = 1;
	$_SESSION['content_new_direction'] = '';
	$_SESSION['content_new_status'] = 0;
	$_SESSION['content_new_year'] = '';
	$_SESSION['content_new_authors'] = '';
	$_SESSION['content_new_title'] = '';
	$_SESSION['content_new_annotation'] = '';
	$_SESSION['content_new_bibliography'] = '';
	$_SESSION['content_new_description'] = '';
	$_SESSION['content_new_keywords'] = '';
	$_SESSION['content_new_image_file'] = '';
	$_SESSION['content_new_categories'] = '';
	$_SESSION['content_new_type'] = '';
	$_SESSION['content_new_text'] = '';
	for ($i=1; $i <= $system_count_directions; $i++) {
		$_SESSION['content_new_category_'.$i] = '';
	}
}
?>