<?php

if ($content != '') {
	// Загрузка контента
	$query_content = "SELECT cn.content_id, cn.content_img, cn.content_author, cn.content_title, cn.content_year, cn.content_annotation, cn.content_bibliography, cn.content_url, cn.content_language, cn.content_description, cn.content_keywords, cn.content_reg_date 
					  FROM contents AS cn 
					  WHERE cn.content_url = '".$content."' AND cn.content_language = '".$language_use."' 
					  ORDER BY cn.content_id";
	$result_content = mysqli_query($db, $query_content) or die(mysqli_error($db));
	// Если контент найден
	if (mysqli_num_rows($result_content) == 1) {
		$row_content = mysqli_fetch_array($result_content, MYSQL_ASSOC);
		$content_img = $row_content['content_img'];
		$content_author = $row_content['content_author'];
		$content_title = $row_content['content_title'];
		$content_year = $row_content['content_year'];
		$content_annotation = $row_content['content_annotation'];
		$content_bibliography = $row_content['content_bibliography'];
		$content_description = $row_content['content_description'];
		$content_keywords = $row_content['content_keywords'];
		$content_title = mb_strtoupper($content_title, 'UTF-8');
	} else {
		die(mysqli_error($db));
	}
} else {
	$i = 0;
	// Загрузка ключевых слов
	$query_keywords_category = "SELECT content_category_".$language_use."
					FROM content_categories 
					WHERE direction_id = '".$direction."' 
					ORDER BY content_category_id";
	if ($result_keywords_category = mysqli_query($db, $query_keywords_category)) {
		while ($row_keywords_category = mysqli_fetch_array($result_keywords_category, MYSQLI_NUM)) {
			$keywords_category = $keywords_category.mb_strtolower(trim($row_keywords_category[0]), 'UTF-8').', ';
			$i++;
		}
		$ln = strlen($keywords_category) - 2;
		$content_keywords = substr($keywords_category, 0, $ln);
		// echo $content_keywords;
	}

	// Отбор списка аннотаций контента
	if ($aside == 1) {
		$query_annotation = "SELECT DISTINCT cn.content_img, cn.content_author, cn.content_title, cn.content_year, cn.content_annotation, cn.content_url 
			FROM contents AS cn, content_relations_direction AS crd, content_relations_status AS crs 
			WHERE cn.content_id = crs.content_id AND cn.content_id = crd.content_id  
			AND crs.content_status_id = '".$content_status."' AND cn.content_language = '".$language_use."' AND crd.direction_id ='".$direction."' 
			ORDER BY cn.content_title";
	}
	if ($aside == 2) {
		switch($subaside) {
		case '1':
			if ($content_category == 0) {
				$query_annotation = "SELECT DISTINCT cn.content_img, cn.content_author, cn.content_title, cn.content_year, cn.content_annotation, cn.content_url 
					FROM content_categories AS cc, contents AS cn, content_relations_category AS crc, content_relations_direction AS crd, content_relations_status AS crs 
					WHERE cc.content_category_id = crc.content_category_id AND crc.content_id = cn.content_id AND cn.content_id = crd.content_id AND cc.direction_id = crd.direction_id AND crc.content_id = crs.content_id  
					AND crs.content_status_id = '".$content_status."' AND cn.content_language = '".$language_use."' AND crd.direction_id = '".$direction."' 
					ORDER BY cn.content_title";
			} else {
				$query_annotation = "SELECT DISTINCT cn.content_img, cn.content_author, cn.content_title, cn.content_year, cn.content_annotation, cn.content_url 
					FROM content_categories AS cc, contents AS cn, content_relations_category AS crc, content_relations_direction AS crd, content_relations_status AS crs 
					WHERE cc.content_category_id = crc.content_category_id AND crc.content_id = cn.content_id AND cn.content_id = crd.content_id AND cc.direction_id = crd.direction_id AND crc.content_id = crs.content_id  
					AND cc.content_category_".$language_use." = '".$interface_category[$content_category]."' AND crs.content_status_id = '".$content_status."' AND cn.content_language = '".$language_use."' AND crd.direction_id = '".$direction."' 
					ORDER BY cn.content_title";
			}
			break;
		case '2':
			if ($content_author == 0) {
				$query_annotation = "SELECT DISTINCT cn.content_img, cn.content_author, cn.content_title, cn.content_year, cn.content_annotation, cn.content_url 
					FROM content_authors AS ca, contents AS cn, content_relations_author AS cra, content_relations_direction AS crd, content_relations_status AS crs 
					WHERE ca.content_author_id = cra.content_author_id AND cra.content_id = cn.content_id AND cra.content_id = crd.content_id AND cra.content_id = crs.content_id  
					AND crs.content_status_id = '".$content_status."' AND cn.content_language = '".$language_use."' AND crd.direction_id = '".$direction."' 
					ORDER BY content_author";
			} else {
				$query_annotation = "SELECT DISTINCT cn.content_img, cn.content_author, cn.content_title, cn.content_year, cn.content_annotation, cn.content_url 
					FROM content_authors AS ca, contents AS cn, content_relations_author AS cra, content_relations_direction AS crd, content_relations_status AS crs 
					WHERE ca.content_author_id = cra.content_author_id AND cra.content_id = cn.content_id AND cra.content_id = crd.content_id AND cra.content_id = crs.content_id  
					AND Concat(ca.content_author_surname_".$language_use.", ' ', ca.content_author_name_".$language_use.") = '".$interface_author[$content_author]."' AND crs.content_status_id = '".$content_status."' AND cn.content_language = '".$language_use."' AND crd.direction_id = '".$direction."' 
					ORDER BY content_author";
			}
			break;
		case '3':
			if ($content_type == 0) {
				$query_annotation = "SELECT DISTINCT cn.content_img, cn.content_author, cn.content_title, cn.content_year, cn.content_annotation, cn.content_url 
					FROM content_types AS ct, contents AS cn, content_relations_type AS crt, content_relations_direction AS crd, content_relations_status AS crs 
					WHERE ct.content_type_id = crt.content_type_id AND crt.content_id = cn.content_id AND cn.content_id = crd.content_id AND crt.content_id = crs.content_id  
					AND crs.content_status_id = '".$content_status."' AND cn.content_language = '".$language_use."' AND crd.direction_id = '".$direction."' 
					ORDER BY ct.content_type_id";
			} else {
				$query_annotation = "SELECT DISTINCT cn.content_img, cn.content_author, cn.content_title, cn.content_year, cn.content_annotation, cn.content_url 
					FROM content_types AS ct, contents AS cn, content_relations_type AS crt, content_relations_direction AS crd, content_relations_status AS crs 
					WHERE ct.content_type_id = crt.content_type_id AND crt.content_id = cn.content_id AND cn.content_id = crd.content_id AND crt.content_id = crs.content_id  
					AND ct.content_type_".$language_use." = '".$interface_content_type[$content_type]."' AND crs.content_status_id = '".$content_status."' AND cn.content_language = '".$language_use."' AND crd.direction_id = '".$direction."' 
					ORDER BY ct.content_type_id";
			}
			break;
		default:
		}
	}
	if ($aside == 3) {
		switch($subaside) {
		case '1':
			if ($content_category == 0) {
				$query_annotation = "SELECT DISTINCT cn.content_img, cn.content_author, cn.content_title, cn.content_year, cn.content_annotation, cn.content_url 
					FROM content_categories AS cc, contents AS cn, content_relations_category AS crc, content_relations_direction AS crd, content_relations_status AS crs 
					WHERE cc.content_category_id = crc.content_category_id AND crc.content_id = cn.content_id AND cn.content_id = crd.content_id AND cc.direction_id = crd.direction_id AND crc.content_id = crs.content_id  
					AND crs.content_status_id = '".$content_status."' AND cn.content_language = '".$language_use."' AND crd.direction_id = '".$direction."' 
					ORDER BY cn.content_title";
			} else {
				$query_annotation = "SELECT DISTINCT cn.content_img, cn.content_author, cn.content_title, cn.content_year, cn.content_annotation, cn.content_url 
					FROM content_categories AS cc, contents AS cn, content_relations_category AS crc, content_relations_direction AS crd, content_relations_status AS crs 
					WHERE cc.content_category_id = crc.content_category_id AND crc.content_id = cn.content_id AND cn.content_id = crd.content_id AND cc.direction_id = crd.direction_id AND crc.content_id = crs.content_id  
					AND cc.content_category_".$language_use." = '".$interface_category[$content_category]."' AND crs.content_status_id = '".$content_status."' AND cn.content_language = '".$language_use."' AND crd.direction_id = '".$direction."' 
					ORDER BY cn.content_title";
			}
			break;
		case '2':
			if ($content_author == 0) {
				$query_annotation = "SELECT DISTINCT cn.content_img, cn.content_author, cn.content_title, cn.content_year, cn.content_annotation, cn.content_url 
					FROM content_authors AS ca, contents AS cn, content_relations_author AS cra, content_relations_direction AS crd, content_relations_status AS crs 
					WHERE ca.content_author_id = cra.content_author_id AND cra.content_id = cn.content_id AND cra.content_id = crd.content_id AND cra.content_id = crs.content_id  
					AND crs.content_status_id = '".$content_status."' AND cn.content_language = '".$language_use."' AND crd.direction_id = '".$direction."' 
					ORDER BY content_author";
			} else {
				$query_annotation = "SELECT DISTINCT cn.content_img, cn.content_author, cn.content_title, cn.content_year, cn.content_annotation, cn.content_url 
					FROM content_authors AS ca, contents AS cn, content_relations_author AS cra, content_relations_direction AS crd, content_relations_status AS crs 
					WHERE ca.content_author_id = cra.content_author_id AND cra.content_id = cn.content_id AND cra.content_id = crd.content_id AND cra.content_id = crs.content_id  
					AND Concat(ca.content_author_surname_".$language_use.", ' ', ca.content_author_name_".$language_use.") = '".$interface_author[$content_author]."' AND crs.content_status_id = '".$content_status."' AND cn.content_language = '".$language_use."' AND crd.direction_id = '".$direction."' 
					ORDER BY content_author";
			}
			break;
		case '3':
			if ($content_type == 0) {
				$query_annotation = "SELECT DISTINCT cn.content_img, cn.content_author, cn.content_title, cn.content_year, cn.content_annotation, cn.content_url 
					FROM content_types AS ct, contents AS cn, content_relations_type AS crt, content_relations_direction AS crd, content_relations_status AS crs 
					WHERE ct.content_type_id = crt.content_type_id AND crt.content_id = cn.content_id AND cn.content_id = crd.content_id AND crt.content_id = crs.content_id  
					AND crs.content_status_id = '".$content_status."' AND cn.content_language = '".$language_use."' AND crd.direction_id = '".$direction."' 
					ORDER BY ct.content_type_id";
			} else {
				$query_annotation = "SELECT DISTINCT cn.content_img, cn.content_author, cn.content_title, cn.content_year, cn.content_annotation, cn.content_url 
					FROM content_types AS ct, contents AS cn, content_relations_type AS crt, content_relations_direction AS crd, content_relations_status AS crs 
					WHERE ct.content_type_id = crt.content_type_id AND crt.content_id = cn.content_id AND cn.content_id = crd.content_id AND crt.content_id = crs.content_id  
					AND ct.content_type_".$language_use." = '".$interface_content_type[$content_type]."' AND crs.content_status_id = '".$content_status."' AND cn.content_language = '".$language_use."' AND crd.direction_id = '".$direction."' 
					ORDER BY ct.content_type_id";
			}
			break;
		default:
		}
	}
}
?>