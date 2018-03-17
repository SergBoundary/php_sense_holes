<?php
// Проверка GET и установка языка по умолчанию
if (IsSet($_GET['language'])) {
	$language_use = $_GET['language'];
	$_SESSION['language'] = $language_use;
} elseif (IsSet($_POST['language'])) {
	$language_use = $_POST['language'];
	$_SESSION['language'] = $language_use;
} else {
	if (IsSet($_SESSION['language'])) {
		$language_use = $_SESSION['language'];
	} else {
		$language_use = 'ru';
		$_SESSION['language'] = $language_use;
	}
}

// Загрузка системного словоря
$i = 0;
$query_system = "SELECT id, ".$language_use." 
				FROM system_dictionary 
				ORDER BY id";
if ($result_system = mysqli_query($db, $query_system)) {
	while ($row_system = mysqli_fetch_array($result_system, MYSQLI_NUM)) {
	  $i++;
	  $interface_system[$i] = $row_system[1];
	}
} else {
  die(mysqli_error($db));
}

// Загрузка меню
$i = 0;
$query_direction = "SELECT direction_id, direction_".$language_use." 
				FROM directions 
				ORDER BY direction_id";
if ($result_direction = mysqli_query($db, $query_direction)) {
	while ($row_direction = mysqli_fetch_array($result_direction, MYSQLI_NUM)) {
	  $interface_direction[$i] = $row_direction[1];
	  $i++;
	}
} else {
  die(mysqli_error($db));
}

// Загрузка подменю
$i = 0;
$query_direction_aside = "SELECT direction_aside_id, direction_aside_".$language_use." 
				FROM direction_aside 
				ORDER BY direction_aside_id";
if ($result_direction_aside = mysqli_query($db, $query_direction_aside)) {
	while ($row_direction_aside = mysqli_fetch_array($result_direction_aside, MYSQLI_NUM)) {
	  $i++;
	  $interface_aside[$i] = $row_direction_aside[1];
	}
} else {
  die(mysqli_error($db));
}

// Загрузка под-подменю
$i = 0;
$query_direction_subaside = "SELECT direction_subaside_numb, direction_subaside_".$language_use." 
				FROM direction_subaside 
				WHERE direction_aside_id = '".$aside."' 
				ORDER BY direction_subaside_numb";
if ($result_direction_subaside = mysqli_query($db, $query_direction_subaside)) {
	while ($row_direction_subaside = mysqli_fetch_array($result_direction_subaside, MYSQLI_NUM)) {
	  $i++;
	  $interface_subaside[$i] = $row_direction_subaside[1];
	}
} else {
  die(mysqli_error($db));
}

// Загрузка категорий контента
$i = 1;
$query_category = "SELECT cc.content_category_id, cc.content_category_".$language_use."
				FROM content_categories AS cc, contents AS cn, content_relations_category AS crc, content_relations_direction AS crd, content_relations_status AS crs 
				WHERE cc.content_category_id = crc.content_category_id AND crc.content_id = cn.content_id AND cn.content_id = crd.content_id AND cc.direction_id = crd.direction_id AND crc.content_id = crs.content_id  
				AND crs.content_status_id = '".$content_status."' AND cn.content_language = '".$language_use."' AND crd.direction_id = '".$direction."' 
				GROUP BY cc.content_category_".$language_use."
				ORDER BY cc.content_category_id";
if ($result_category = mysqli_query($db, $query_category)) {
	while ($row_category = mysqli_fetch_array($result_category, MYSQLI_NUM)) {
		$interface_category[$i] = $row_category[1];
		$i++;
	}
} else {
	die(mysqli_error($db));
}

// Загрузка авторов контента
$i = 1;
$query_author = "SELECT Concat(ca.content_author_surname_".$language_use.", ' ', ca.content_author_name_".$language_use.") AS author
				FROM content_authors AS ca, contents AS cn, content_relations_author AS cra, content_relations_direction AS crd, content_relations_status AS crs 
				WHERE ca.content_author_id = cra.content_author_id AND cra.content_id = cn.content_id AND cra.content_id = crd.content_id AND cra.content_id = crs.content_id  
				AND crs.content_status_id = '".$content_status."' AND cn.content_language = '".$language_use."' AND crd.direction_id = '".$direction."' 
				GROUP BY author
				ORDER BY author";
if ($result_author = mysqli_query($db, $query_author)) {
	while ($row_author = mysqli_fetch_array($result_author, MYSQLI_NUM)) {
		$interface_author[$i] = $row_author[0];
		$i++;
	}
} else {
	die(mysqli_error($db));
}

// Загрузка типов контента
$i = 1;
$query_content_type = "SELECT ct.content_type_id, ct.content_type_".$language_use."
				FROM content_types AS ct, contents AS cn, content_relations_type AS crt, content_relations_direction AS crd, content_relations_status AS crs 
				WHERE ct.content_type_id = crt.content_type_id AND crt.content_id = cn.content_id AND cn.content_id = crd.content_id AND crt.content_id = crs.content_id  
				AND crs.content_status_id = '".$content_status."' AND cn.content_language = '".$language_use."' AND crd.direction_id = '".$direction."' 
				GROUP BY ct.content_type_".$language_use."
				ORDER BY ct.content_type_id";
if ($result_content_type = mysqli_query($db, $query_content_type)) {
	while ($row_content_type = mysqli_fetch_array($result_content_type, MYSQLI_NUM)) {
		$interface_content_type[$i] = $row_content_type[1];
		$i++;
	}
} else {
	die(mysqli_error($db));
}

// Загрузка статусов
$i = 0;
$query_status = "SELECT content_status_id, content_status_".$language_use." 
				FROM content_status 
				ORDER BY content_status_id";
if ($result_status = mysqli_query($db, $query_status)) {
	while ($row_status = mysqli_fetch_array($result_status, MYSQLI_NUM)) {
	  $i++;
	  $interface_status[$i] = $row_status[1];
	}
} else {
  die(mysqli_error($db));
}

// Загрузка полей нового контента
if (IsSet($_SESSION['content_new_step'])) {
	$i = 1;
	$query_content_new = "SELECT content_new_id, content_new_".$language_use." 
					FROM content_new 
					ORDER BY content_new_id";
	if ($result_content_new = mysqli_query($db, $query_content_new)) {
		while ($row_content_new = mysqli_fetch_array($result_content_new, MYSQLI_NUM)) {
		  $interface_content_new[$i] = $row_content_new[1];
		  $i++;
		}
	} else {
	  die(mysqli_error($db));
	}
	// Загрузка направлений контента
	$i = 0;
	$query_direction = "SELECT direction_id, direction_".$language_use." 
					FROM directions 
					ORDER BY direction_id";
	if ($result_direction = mysqli_query($db, $query_direction)) {
		while ($row_direction = mysqli_fetch_array($result_direction, MYSQLI_NUM)) {
			// Загрузка категорий контента
			$y = 1;
			$query_content_new_category = "SELECT content_category_id, content_category_".$language_use." 
							FROM content_categories 
							WHERE direction_id = '".$i."' 
							ORDER BY content_category_id";
			if ($result_content_new_category = mysqli_query($db, $query_content_new_category)) {
				while ($row_content_new_category = mysqli_fetch_array($result_content_new_category, MYSQLI_NUM)) {
					$interface_content_new_category[$i][$y] = $row_content_new_category[1];
					$y++;
				}
			} else {
				die(mysqli_error($db));
			}
			$i++;
		}
	} else {
	  die(mysqli_error($db));
	}
	// Загрузка типов контента
	$i = 1;
	$query_content_new_type = "SELECT content_type_id, content_type_".$language_use." 
					FROM content_types 
					ORDER BY content_type_id";
	if ($result_content_new_type = mysqli_query($db, $query_content_new_type)) {
		while ($row_content_new_type = mysqli_fetch_array($result_content_new_type, MYSQLI_NUM)) {
			$interface_content_new_type[$i] = $row_content_new_type[1];
			$i++;
		}
	} else {
		die(mysqli_error($db));
	}
}
?>