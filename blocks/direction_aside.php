<?php

// Обнуление активации подменю
for ($i=1; $i<4; $i++) {
	$aside_active_tagbefore[$i] = '';
	$aside_active_tagend[$i] = '';
}
$aside_active_tagbefore[$aside] = '<strong>';
$aside_active_tagend[$aside] = '</strong>';

// Обнуление активации под-подменю
for ($i=1; $i<4; $i++) {
	$subaside_active_tagbefore[$i] = '';
	$subaside_active_tagend[$i] = '';
}
$subaside_active_tagbefore[$subaside] = '<strong>';
$subaside_active_tagend[$subaside] = '</strong>';

// Обнуление активации списка категорий
for ($i=1; $i<20; $i++) {
	$category_active_tagbefore[$i] = '';
	$category_active_tagend[$i] = '';
}
$category_active_tagbefore[$content_category] = '<strong>';
$category_active_tagend[$content_category] = '</strong>';

// Обнуление активации списка авторов
for ($i=1; $i<10; $i++) {
	$author_active_tagbefore[$i] = '';
	$author_active_tagend[$i] = '';
}
$author_active_tagbefore[$content_author] = '<strong>';
$author_active_tagend[$content_author] = '</strong>';

// Обнуление активации списка типов
for ($i=1; $i<10; $i++) {
	$content_type_active_tagbefore[$i] = '';
	$content_type_active_tagend[$i] = '';
}
$content_type_active_tagbefore[$content_type] = '<strong>';
$content_type_active_tagend[$content_type] = '</strong>';

// Подсчет контента мероприятий
$count_events = countContentStatistic ($db, $direction, 1, '');
// Подсчет контента аннотаций
$count_annotations = countContentStatistic ($db, $direction, 2, '');
// Подсчет актуального контента
$count_topical = $count_events + $count_annotations;
// Подсчет критического контента
$count_criticism = countContentStatistic ($db, $direction, 3, '');
// Подсчет библиотечного контента
$count_library = countContentStatistic ($db, $direction, 4, '');
// Подсчет категорий контента критики
$count_criticism_categories = countContentStatistic ($db, $direction, 3, 'category');
// Подсчет авторов контента критики 
$count_criticism_authors = countContentStatistic ($db, $direction, 3, 'author');
// Подсчет типов контента критики 
$count_criticism_types = countContentStatistic ($db, $direction, 3, 'type');
// Подсчет категорий контента библиотеки
$count_library_categories = countContentStatistic ($db, $direction, 4, 'category');
// Подсчет авторов контента библиотеки 
$count_library_authors = countContentStatistic ($db, $direction, 4, 'author');
// Подсчет типов контента библиотеки 
$count_library_types = countContentStatistic ($db, $direction, 4, 'type');

?>
	    <aside class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<p><a href="<?php echo $_SERVER['PHP_SELF'].'?path='.$direction.'-1-1-0'; ?>"><span class="text-muted"><?php echo $aside_active_tagbefore[1].$interface_aside[1].$aside_active_tagend[1]; ?></span><span class="badge pull-right"><?php echo $count_topical; ?></span></a></p>
					<p><a href="<?php echo $_SERVER['PHP_SELF'].'?path='.$direction.'-2-1-0'; ?>"><span class="text-muted"><?php echo $aside_active_tagbefore[2].$interface_aside[2].$aside_active_tagend[2]; ?></span><span class="badge pull-right"><?php echo $count_criticism; ?></span></a></p>
					<p><a href="<?php echo $_SERVER['PHP_SELF'].'?path='.$direction.'-3-1-0'; ?>"><span class="text-muted"><?php echo $aside_active_tagbefore[3].$interface_aside[3].$aside_active_tagend[3]; ?></span><span class="badge pull-right"><?php echo $count_library; ?></span></a></p>
				</div>
			</div>

			<div class="panel panel-default">
			<div class="panel-body">
			<?php
				switch($aside) {
				case '1':
					echo '<p><a href="'.$_SERVER['PHP_SELF'].'?path='.$direction.'-'.$aside.'-1-0"><span class="text-muted">'.$subaside_active_tagbefore[1].$interface_subaside[1].$subaside_active_tagend[1].'</span><span class="badge pull-right">'.$count_events.'</span></a></p>';
					echo '<p><a href="'.$_SERVER['PHP_SELF'].'?path='.$direction.'-'.$aside.'-2-0"><span class="text-muted">'.$subaside_active_tagbefore[2].$interface_subaside[2].$subaside_active_tagend[2].'</span><span class="badge pull-right">'.$count_annotations.'</span></a></p>';
					break;
				case '2':
					echo '<p><a href="'.$_SERVER['PHP_SELF'].'?path='.$direction.'-'.$aside.'-1-0"><span class="text-muted">'.$subaside_active_tagbefore[1].$interface_subaside[1].$subaside_active_tagend[1].'</span><span class="badge pull-right">'.$count_criticism_categories.'</span></a></p>';
					echo '<p><a href="'.$_SERVER['PHP_SELF'].'?path='.$direction.'-'.$aside.'-2-0"><span class="text-muted">'.$subaside_active_tagbefore[2].$interface_subaside[2].$subaside_active_tagend[2].'</span><span class="badge pull-right">'.$count_criticism_authors.'</span></a></p>';
					echo '<p><a href="'.$_SERVER['PHP_SELF'].'?path='.$direction.'-'.$aside.'-3-0"><span class="text-muted">'.$subaside_active_tagbefore[3].$interface_subaside[3].$subaside_active_tagend[3].'</span><span class="badge pull-right">'.$count_criticism_types.'</span></a></p>';
					break;
				case '3':
					echo '<p><a href="'.$_SERVER['PHP_SELF'].'?path='.$direction.'-'.$aside.'-1-0"><span class="text-muted">'.$subaside_active_tagbefore[1].$interface_subaside[1].$subaside_active_tagend[1].'</span><span class="badge pull-right">'.$count_library_categories.'</span></a></p>';
					echo '<p><a href="'.$_SERVER['PHP_SELF'].'?path='.$direction.'-'.$aside.'-2-0"><span class="text-muted">'.$subaside_active_tagbefore[2].$interface_subaside[2].$subaside_active_tagend[2].'</span><span class="badge pull-right">'.$count_library_authors.'</span></a></p>';
					echo '<p><a href="'.$_SERVER['PHP_SELF'].'?path='.$direction.'-'.$aside.'-3-0"><span class="text-muted">'.$subaside_active_tagbefore[3].$interface_subaside[3].$subaside_active_tagend[3].'</span><span class="badge pull-right">'.$count_library_types.'</span></a></p>';
					break;
				default:
					echo '<p><a href="'.$_SERVER['PHP_SELF'].'?path='.$direction.'-'.$aside.'-1-0"><span class="text-muted">'.$subaside_active_tagbefore[1].$interface_subaside[1].$subaside_active_tagend[1].'</span><span class="badge pull-right">'.$count_events.'</span></a></p>';
					echo '<p><a href="'.$_SERVER['PHP_SELF'].'?path='.$direction.'-'.$aside.'-2-0"><span class="text-muted">'.$subaside_active_tagbefore[2].$interface_subaside[2].$subaside_active_tagend[2].'</span><span class="badge pull-right">'.$count_annotations.'</span></a></p>';
				}
			?>
			</div>
			</div>

			<?php
				if ($aside == 2) {
					switch($subaside) {
					case '1':
						if ($count_criticism_categories != 0) {
							echo '<div class="panel panel-default">';
							$i = 0;
							// Загрузка категорий
							$query_category = "SELECT cc.content_category_".$language_use.", Count(cc.content_category_id) AS count_category 
								FROM content_categories AS cc, contents AS cn, content_relations_category AS crc, content_relations_direction AS crd, content_relations_status AS crs 
								WHERE cc.content_category_id = crc.content_category_id AND crc.content_id = cn.content_id AND cn.content_id = crd.content_id AND cc.direction_id = crd.direction_id AND crc.content_id = crs.content_id  
								AND crs.content_status_id = '".$content_status."' AND cn.content_language = '".$language_use."' AND crd.direction_id = '".$direction."' 
								GROUP BY cc.content_category_".$language_use."
								ORDER BY cc.content_category_id";
							if ($result_category = mysqli_query($db, $query_category)) {
								// Вывод на экран титула списка авторов 
								$query_category_title = "SELECT direction_subaside_title_".$language_use."
													FROM direction_subaside_title 
													WHERE direction_aside_id = '3' AND direction_subaside_numb = '1'";
								$result_category_title = mysqli_query($db, $query_category_title) or die(mysqli_error($db));
								// Если титул не найден
								if (mysqli_num_rows($result_category_title) == 1) {
									$row_category_title = mysqli_fetch_array($result_category_title, MYSQL_ASSOC);
									$interface_category[$i] = $row_category_title['direction_subaside_title_'.$language_use];
									echo '<div class="panel-heading"><a href="'.$_SERVER['PHP_SELF'].'?path='.$direction.'-'.$aside.'-'.$subaside.'-0"><span class="text-muted">'.$category_active_tagbefore[$i].$interface_category[$i].$category_active_tagend[$i].'</span></a></div>';
								} else {
									die(mysqli_error($db));
								}
								echo '<div class="panel-body">';
								$i++;
								while ($row_category = mysqli_fetch_array($result_category, MYSQLI_NUM)) {
									$interface_category[$i] = trim($row_category[0]);
									$interface_category_count[$i] = trim($row_category[1]);
									echo '<div class="caption">';
									echo '<p><a href="'.$_SERVER['PHP_SELF'].'?path='.$direction.'-'.$aside.'-'.$subaside.'-'.$i.'"><span class="text-muted">'.$category_active_tagbefore[$i].$interface_category[$i].$category_active_tagend[$i].'<span class="badge pull-right">'.$interface_category_count[$i].'</span></span></a></p>';
									echo '</div>';
									$i++;
								}
								echo '</div>';
							} else {
								die(mysqli_error($db));
							}
							echo '</div>';
						}
						break;
					case '2':
						if ($count_criticism_authors != 0) {
							echo '<div class="panel panel-default">';
							$i = 0;
							// Загрузка авторов
							$query_author = "SELECT DISTINCT Concat(ca.content_author_surname_".$language_use.", ' ', ca.content_author_name_".$language_use.") AS author, Count(ca.content_author_id) AS count
								FROM content_authors AS ca, contents AS cn, content_relations_author AS cra, content_relations_direction AS crd, content_relations_status AS crs 
								WHERE ca.content_author_id = cra.content_author_id AND cra.content_id = cn.content_id AND cra.content_id = crd.content_id AND cra.content_id = crs.content_id  
								AND crs.content_status_id = '".$content_status."' AND cn.content_language = '".$language_use."' AND crd.direction_id = '".$direction."' 
								GROUP BY content_author
								ORDER BY content_author";
							if ($result_author = mysqli_query($db, $query_author)) {
								// Вывод на экран титула списка авторов 
								$query_author_title = "SELECT direction_subaside_title_".$language_use."
													FROM direction_subaside_title 
													WHERE direction_aside_id = '3' AND direction_subaside_numb = '2'";
								$result_author_title = mysqli_query($db, $query_author_title) or die(mysqli_error($db));
								// Если титул не найден
								if (mysqli_num_rows($result_author_title) == 1) {
									$row_author_title = mysqli_fetch_array($result_author_title, MYSQL_ASSOC);
									$interface_author[$i] = $row_author_title['direction_subaside_title_'.$language_use];
									echo '<div class="panel-heading"><a href="'.$_SERVER['PHP_SELF'].'?path='.$direction.'-'.$aside.'-'.$subaside.'-0"><span class="text-muted">'.$author_active_tagbefore[$i].$interface_author[$i].$author_active_tagend[$i].'</span></a></div>';
								} else {
									die(mysqli_error($db));
								}
								echo '<div class="panel-body">';
								$i++;
								while ($row_author = mysqli_fetch_array($result_author, MYSQLI_NUM)) {
									$interface_author[$i] = trim($row_author[0]);
									$interface_author_count[$i] = trim($row_author[1]);
									echo '<div class="caption">';
									echo '<p><a href="'.$_SERVER['PHP_SELF'].'?path='.$direction.'-'.$aside.'-'.$subaside.'-'.$i.'"><span class="text-muted">'.$author_active_tagbefore[$i].$interface_author[$i].$author_active_tagend[$i].'<span class="badge pull-right">'.$interface_author_count[$i].'</span></span></a></p>';
									echo '</div>';
									$i++;
								}
								echo '</div>';
							} else {
								die(mysqli_error($db));
							}
							echo '</div>';
						}
						break;
					case '3':
						if ($count_criticism_types != 0) {
							echo '<div class="panel panel-default">';
							$i = 0;
							// Загрузка типов контента
							$query_content_type = "SELECT ct.content_type_".$language_use.", Count(ct.content_type_id) AS count_type 
								FROM content_types AS ct, contents AS cn, content_relations_type AS crt, content_relations_direction AS crd, content_relations_status AS crs 
								WHERE ct.content_type_id = crt.content_type_id AND crt.content_id = cn.content_id AND cn.content_id = crd.content_id AND crt.content_id = crs.content_id  
								AND crs.content_status_id = '".$content_status."' AND cn.content_language = '".$language_use."' AND crd.direction_id = '".$direction."' 
								GROUP BY ct.content_type_".$language_use."
								ORDER BY ct.content_type_id";
							if ($result_content_type = mysqli_query($db, $query_content_type)) {
								// Вывод на экран титула списка авторов 
								$query_content_type_title = "SELECT direction_subaside_title_".$language_use."
													FROM direction_subaside_title 
													WHERE direction_aside_id = '3' AND direction_subaside_numb = '3'";
								$result_content_type_title = mysqli_query($db, $query_content_type_title) or die(mysqli_error($db));
								// Если титул не найден
								if (mysqli_num_rows($result_content_type_title) == 1) {
									$row_content_type_title = mysqli_fetch_array($result_content_type_title, MYSQL_ASSOC);
									$interface_content_type[$i] = $row_content_type_title['direction_subaside_title_'.$language_use];
									echo '<div class="panel-heading"><a href="'.$_SERVER['PHP_SELF'].'?path='.$direction.'-'.$aside.'-'.$subaside.'-0"><span class="text-muted">'.$content_type_active_tagbefore[$i].$interface_content_type[$i].$content_type_active_tagend[$i].'</span></a></div>';
								} else {
									die(mysqli_error($db));
								}
								echo '<div class="panel-body">';
								$i++;
								while ($row_content_type = mysqli_fetch_array($result_content_type, MYSQLI_NUM)) {
									$interface_content_type[$i] = trim($row_content_type[0]);
									$interface_content_type_count[$i] = trim($row_content_type[1]);
									echo '<div class="caption">';
									echo '<p><a href="'.$_SERVER['PHP_SELF'].'?path='.$direction.'-'.$aside.'-'.$subaside.'-'.$i.'"><span class="text-muted">'.$content_type_active_tagbefore[$i].$interface_content_type[$i].$content_type_active_tagend[$i].'<span class="badge pull-right">'.$interface_content_type_count[$i].'</span></span></a></p>';
									echo '</div>';
									$i++;
								}
								echo '</div>';
							} else {
								die(mysqli_error($db));
							}
							echo '</div>';
						}
						break;
					default:
					}
				} elseif ($aside == 3) {
					//$content_status = 4;
					switch($subaside) {
					case '1':
						if ($count_library_categories != 0) {
							echo '<div class="panel panel-default">';
							$i = 0;
							// Загрузка категорий
							$query_category = "SELECT cc.content_category_".$language_use.", Count(cc.content_category_id) AS count_category 
								FROM content_categories AS cc, contents AS cn, content_relations_category AS crc, content_relations_direction AS crd, content_relations_status AS crs 
								WHERE cc.content_category_id = crc.content_category_id AND crc.content_id = cn.content_id AND cn.content_id = crd.content_id AND cc.direction_id = crd.direction_id AND crc.content_id = crs.content_id  
								AND crs.content_status_id = '".$content_status."' AND cn.content_language = '".$language_use."' AND crd.direction_id = '".$direction."' 
								GROUP BY cc.content_category_".$language_use."
								ORDER BY cc.content_category_id";
							if ($result_category = mysqli_query($db, $query_category)) {
								// Вывод на экран титула списка авторов 
								$query_category_title = "SELECT direction_subaside_title_".$language_use."
													FROM direction_subaside_title 
													WHERE direction_aside_id = '3' AND direction_subaside_numb = '1'";
								$result_category_title = mysqli_query($db, $query_category_title) or die(mysqli_error($db));
								// Если титул не найден
								if (mysqli_num_rows($result_category_title) == 1) {
									$row_category_title = mysqli_fetch_array($result_category_title, MYSQL_ASSOC);
									$interface_category[$i] = $row_category_title['direction_subaside_title_'.$language_use];
									echo '<div class="panel-heading"><a href="'.$_SERVER['PHP_SELF'].'?path='.$direction.'-'.$aside.'-'.$subaside.'-0"><span class="text-muted">'.$category_active_tagbefore[$i].$interface_category[$i].$category_active_tagend[$i].'</span></a></div>';
								} else {
									die(mysqli_error($db));
								}
								echo '<div class="panel-body">';
								$i++;
								while ($row_category = mysqli_fetch_array($result_category, MYSQLI_NUM)) {
									$interface_category[$i] = trim($row_category[0]);
									$interface_category_count[$i] = trim($row_category[1]);
									echo '<div class="caption">';
									echo '<p><a href="'.$_SERVER['PHP_SELF'].'?path='.$direction.'-'.$aside.'-'.$subaside.'-'.$i.'"><span class="text-muted">'.$category_active_tagbefore[$i].$interface_category[$i].$category_active_tagend[$i].'<span class="badge pull-right">'.$interface_category_count[$i].'</span></span></a></p>';
									echo '</div>';
									$i++;
								}
								echo '</div>';
							} else {
								die(mysqli_error($db));
							}
							echo '</div>';
						}
						break;
					case '2':
						if ($count_library_authors != 0) {
							echo '<div class="panel panel-default">';
							$i = 0;
							// Загрузка авторов
							$query_author = "SELECT Concat(ca.content_author_surname_".$language_use.", ' ', ca.content_author_name_".$language_use.") AS author, Count(ca.content_author_id) AS count
								FROM content_authors AS ca, contents AS cn, content_relations_author AS cra, content_relations_direction AS crd, content_relations_status AS crs 
								WHERE ca.content_author_id = cra.content_author_id AND cra.content_id = cn.content_id AND cra.content_id = crd.content_id AND cra.content_id = crs.content_id  
								AND crs.content_status_id = '".$content_status."' AND cn.content_language = '".$language_use."' AND crd.direction_id = '".$direction."' 
								GROUP BY author
								ORDER BY author";
							if ($result_author = mysqli_query($db, $query_author)) {
								// Вывод на экран титула списка авторов 
								$query_author_title = "SELECT direction_subaside_title_".$language_use."
													FROM direction_subaside_title 
													WHERE direction_aside_id = '3' AND direction_subaside_numb = '2'";
								$result_author_title = mysqli_query($db, $query_author_title) or die(mysqli_error($db));
								// Если титул не найден
								if (mysqli_num_rows($result_author_title) == 1) {
									$row_author_title = mysqli_fetch_array($result_author_title, MYSQL_ASSOC);
									$interface_author[$i] = $row_author_title['direction_subaside_title_'.$language_use];
									echo '<div class="panel-heading"><a href="'.$_SERVER['PHP_SELF'].'?path='.$direction.'-'.$aside.'-'.$subaside.'-0"><span class="text-muted">'.$author_active_tagbefore[$i].$interface_author[$i].$author_active_tagend[$i].'</span></a></div>';
								} else {
									die(mysqli_error($db));
								}
								echo '<div class="panel-body">';
								$i++;
								while ($row_author = mysqli_fetch_array($result_author, MYSQLI_NUM)) {
									$interface_author[$i] = trim($row_author[0]);
									$interface_author_count[$i] = trim($row_author[1]);
									echo '<div class="caption">';
									echo '<p><a href="'.$_SERVER['PHP_SELF'].'?path='.$direction.'-'.$aside.'-'.$subaside.'-'.$i.'"><span class="text-muted">'.$author_active_tagbefore[$i].$interface_author[$i].$author_active_tagend[$i].'<span class="badge pull-right">'.$interface_author_count[$i].'</span></span></a></p>';
									echo '</div>';
									$i++;
								}
								echo '</div>';
							} else {
								//die(mysqli_error($db));
							}
							echo '</div>';
						}
						break;
					case '3':
						if ($count_library_types != 0) {
							echo '<div class="panel panel-default">';
							$i = 0;
							// Загрузка типов контента
							$query_content_type = "SELECT ct.content_type_".$language_use.", Count(ct.content_type_id) AS count_type 
								FROM content_types AS ct, contents AS cn, content_relations_type AS crt, content_relations_direction AS crd, content_relations_status AS crs 
								WHERE ct.content_type_id = crt.content_type_id AND crt.content_id = cn.content_id AND cn.content_id = crd.content_id AND crt.content_id = crs.content_id  
								AND crs.content_status_id = '".$content_status."' AND cn.content_language = '".$language_use."' AND crd.direction_id = '".$direction."' 
								GROUP BY ct.content_type_".$language_use."
								ORDER BY ct.content_type_id";
							if ($result_content_type = mysqli_query($db, $query_content_type)) {
								// Вывод на экран титула списка авторов 
								$query_content_type_title = "SELECT direction_subaside_title_".$language_use."
													FROM direction_subaside_title 
													WHERE direction_aside_id = '3' AND direction_subaside_numb = '3'";
								$result_content_type_title = mysqli_query($db, $query_content_type_title) or die(mysqli_error($db));
								// Если титул не найден
								if (mysqli_num_rows($result_content_type_title) == 1) {
									$row_content_type_title = mysqli_fetch_array($result_content_type_title, MYSQL_ASSOC);
									$interface_content_type[$i] = $row_content_type_title['direction_subaside_title_'.$language_use];
									echo '<div class="panel-heading"><a href="'.$_SERVER['PHP_SELF'].'?path='.$direction.'-'.$aside.'-'.$subaside.'-0"><span class="text-muted">'.$content_type_active_tagbefore[$i].$interface_content_type[$i].$content_type_active_tagend[$i].'</span></a></div>';
								} else {
									die(mysqli_error($db));
								}
								echo '<div class="panel-body">';
								$i++;
								while ($row_content_type = mysqli_fetch_array($result_content_type, MYSQLI_NUM)) {
									$interface_content_type[$i] = trim($row_content_type[0]);
									$interface_content_type_count[$i] = trim($row_content_type[1]);
									echo '<div class="caption">';
									echo '<p><a href="'.$_SERVER['PHP_SELF'].'?path='.$direction.'-'.$aside.'-'.$subaside.'-'.$i.'"><span class="text-muted">'.$content_type_active_tagbefore[$i].$interface_content_type[$i].$content_type_active_tagend[$i].'<span class="badge pull-right">'.$interface_content_type_count[$i].'</span></span></a></p>';
									echo '</div>';
									$i++;
								}
								echo '</div>';
							} else {
								die(mysqli_error($db));
							}
							echo '</div>';
						}
						break;
					default:
					}
				}
			?>
	    </aside>
