<?php
// Формирование списка выбранных элементов в группе переключателей направлений контента
$content_new_direction = chooseContentNewBtn ('content_new', 'direction', $system_count_directions);
//	echo $content_new_direction.' >> '.$_SESSION['content_new_direction'].'<br / >';
// Формирование списка выбранных элементов в группе переключателей типов контента
$content_new_type = chooseContentNewBtn ('content_new', 'type', $system_count_types);
//	echo $content_new_type.' >> '.$_SESSION['content_new_type'].'<br / >';
// Проверка заполнения полей формы
$has_status = testContentNew ('content_new', $content_new_direction, $content_new_type, array($system_count_directions, $system_count_types));

// Формирование списка выбранных элементов в группах переключателей категорий контента
for ($i=1; $i <= $system_count_directions; $i++) {
	$content_new_category[$i] = chooseContentNewBtnCategory ('content_new', 'category', $system_count_categories[$i], $i);
	$has_status_category[$i] = testContentNewCategory ('content_new', $content_new_category[$i], $system_count_categories[$i], $i);
//	echo $i.'. '.$content_new_category[$i].' >> '.$_SESSION['content_new_category_'.$i].'<br / >';
}

//echo 'content_new_step: '.$_SESSION['content_new_step'];

for ($i=1; $i < 9; $i++) {
	$language_select[$i] = '';
}

switch($_SESSION['language']) {
case 'de':
	$language_select[1] = 'selected';
	break;
case 'en':
	$language_select[2] = 'selected';
	break;
case 'fr':
	$language_select[3] = 'selected';
	break;
case 'it':
	$language_select[4] = 'selected';
	break;
case 'pl':
	$language_select[5] = 'selected';
	break;
case 'ru':
	$language_select[6] = 'selected';
	break;
case 'sp':
	$language_select[7] = 'selected';
	break;
case 'ua':
	$language_select[8] = 'selected';
	break;
default:
	$language_select[6] = 'selected';
}

$parse_path = preg_split("/[-]+/", $_SESSION['path']); // Парсинг пути к контенту
// Определение выбранного направления контента
$direction = $parse_path[0];
// Определение выбранного сатуса контента
if (IsSet($_SESSION['content_new_status']) && ($_SESSION['content_new_status'] != '') && ($_SESSION['content_new_status'] != 0)) {
	switch($_SESSION['content_new_status']) {
	case '1':
		$aside = 1;
		$subaside = 1;
		break;
	case '2':
		$aside = 1;
		$subaside = 2;
		break;
	case '3':
		$aside = 2;
		$subaside = 0;
		break;
	case '4':
		$aside = 3;
		$subaside = 0;
		break;
	default:
		$aside = 0;
		$subaside = 0;
	}
} else {
	$aside = $parse_path[1];
	$subaside = $parse_path[2];
}

for ($i=0; $i <= $system_count_status; $i++) {
	$status_select[$i] = '';
}
if ($aside == 0) {
	$status_select[0] = '<option value="0" selected>----</option>';
} else {
	if ($aside == 1) {
		if ($subaside == 1) $status_select[1] = 'selected';
		if ($subaside == 2) $status_select[2] = 'selected';
	}
	if ($aside == 2) $status_select[3] = 'selected';
	if ($aside == 3) $status_select[4] = 'selected';
}

if (IsSet($_SESSION['content_new_direction']) && ($_SESSION['content_new_direction'] != '')) {
	// Парсинг списка направлений
	$parse_content_new_direction = preg_split("/[-]+/", $_SESSION['content_new_direction']); 
	// Формирование списка выбранных направлений контента
	for ($i=1; $i <= $system_count_directions; $i++) {
		if ($parse_content_new_direction[$i - 1] == '1') {
			$direction_active[$i] = 'active';
			$direction_check[$i] = 'checked';
		} else {
			$direction_active[$i] = '';
			$direction_check[$i] = '';
		}
	}
} else {
	for ($i=1; $i <= $system_count_directions; $i++) {
		if ($direction == $i) {
			$direction_active[$i] = 'active';
			$direction_check[$i] = 'checked';
		} else {
			$direction_active[$i] = '';
			$direction_check[$i] = '';
		}
	}
}

for ($i=1; $i <= $system_count_directions; $i++) {
	if (IsSet($_SESSION['content_new_category_'.$i]) && ($_SESSION['content_new_category_'.$i] != '')) {
		// Парсинг списка категорий
		$parse_content_new_category[$i] = preg_split("/[-]+/", $_SESSION['content_new_category_'.$i]); 
		// Формирование списка выбранных категорий контента
		for ($y=1; $y <= $system_count_categories[$i]; $y++) {
			if ($parse_content_new_category[$i][$y - 1] == '1') {
				$category_active[$i][$y] = 'active';
				$category_check[$i][$y] = 'checked';
			} else {
				$category_active[$i][$y] = '';
				$category_check[$i][$y] = '';
			}
		}
	}
}

if (IsSet($_SESSION['content_new_type']) && ($_SESSION['content_new_type'] != '')) {
	// Парсинг списка типов
	$parse_content_new_type = preg_split("/[-]+/", $_SESSION['content_new_type']); 
	// Формирование списка выбранных типов контента
	for ($i=1; $i <= $system_count_types; $i++) {
		if ($parse_content_new_type[$i - 1] == '1') {
			$type_active[$i] = 'active';
			$type_check[$i] = 'checked';
		} else {
			$type_active[$i] = '';
			$type_check[$i] = '';
		}
	}
}
?>
		<section class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<br /><br />
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="content_language" class="form-horizontal" role="form">
			<div <?php echo ($_SESSION['content_new_step'] <> 4) ? '' :'style="display: none;"'; ?> class="form-group <?php echo $has_status[0]; ?>">
					<label for="language" class="col-xs-3 col-sm-2 col-md-2 col-lg-2 control-label"><?php echo $interface_content_new[1]; ?></label>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
						<select class="form-control" name="language" id="language" size="1" onchange="content_language.submit()">
							<option value="de" <?php echo $language_select[1]; ?>>Deutsch</option>
							<option value="en" <?php echo $language_select[2]; ?>>English</option> 
							<option value="fr" <?php echo $language_select[3]; ?>>Français</option> 
							<option value="it" <?php echo $language_select[4]; ?>>Italiano</option> 
							<option value="pl" <?php echo $language_select[5]; ?>>Polski</option> 
							<option value="ru" <?php echo $language_select[6]; ?>>Русский</option> 
							<option value="sp" <?php echo $language_select[7]; ?>>Español</option> 
							<option value="ua" <?php echo $language_select[8]; ?>>Українська</option> 
						</select>
					</div>
				</div>
			</form>
			
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="content_new" class="form-horizontal" role="form">
<?php
	// 1
				echo '<div '.$form_element_dysplay[1].' class="form-group '.$has_status[1].'">';
					echo '<label for="content_new_direction" class="col-xs-4 col-sm-2 col-md-2 col-lg-2 control-label">'.$interface_content_new[2].'</label>';
					echo '<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">';
						echo '<div class="btn-group" data-toggle="buttons">';
							for ($i=1; $i <= $system_count_directions; $i++) {
								echo '<label for="content_new_direction_'.$i.'" class="btn btn-default '.$direction_active[$i].'">'.$interface_direction[$i];
								echo '<input value="1" type="checkbox"'.$direction_check[$i].' name="content_new_direction_'.$i.'" id="content_new_direction_'.$i.'"></label>';
							}
						echo '</div>';
					echo '</div>';
				echo '</div>';
				echo '<div '.$form_element_dysplay[1].' class="form-group">';
					echo '<div class="'.$has_status[2].'">';
						echo '<label for="content_new_status" class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label">'.$interface_content_new[3].'</label>';
						echo '<div class="col-xs-5 col-sm-3 col-md-3 col-lg-3">';
							echo '<select class="form-control" name="content_new_status" id="content_new_status" size="1">';
								echo $status_select[0];
								for ($i=1; $i <= $system_count_status; $i++) {
									echo '<option value="'.$i.'" '.$status_select[$i].'>'.$interface_status[$i].'</option>';
								}
							echo '</select>';
						echo '</div>';
					echo '</div>';
					echo '<div class="'.$has_status[3].'">';
						echo '<label for="content_new_year" class="col-xs-2 col-sm-1 col-md-1 col-lg-1 control-label">'.$interface_content_new[4].'</label>';
						echo '<div class="col-xs-3 col-sm-2 col-md-2 col-lg-2">';
							echo '<input value="'.$_SESSION['content_new_year'].'" type="text" class="form-control" name="content_new_year" id="content_new_year" placeholder="1900" size="6" maxlength="4" />';
						echo '</div>';
					echo '</div>';
				echo '</div>';
				
				echo '<div '.$form_element_dysplay[1].' class="form-group '.$has_status[4].'">';
					echo '<label for="content_new_authors" class="col-xs-4 col-sm-2 col-md-2 col-lg-2 control-label">'.$interface_content_new[5].'</label>';
					echo '<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">';
						echo '<input value="'.$_SESSION['content_new_authors'].'" type="text" class="form-control" name="content_new_authors" id="content_new_authors" placeholder="'.$interface_content_new[21].' 1 '.$interface_content_new[20].' 1, '.$interface_content_new[21].' 2 '.$interface_content_new[20].' 2, ..." />';
					echo '</div>';
				echo '</div>';
				echo '<div '.$form_element_dysplay[1].' class="form-group '.$has_status[5].'">';
					echo '<label for="content_new_title" class="col-xs-4 col-sm-2 col-md-2 col-lg-2 control-label">'.$interface_content_new[6].'</label>';
					echo '<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">';
						echo '<input value="'.$_SESSION['content_new_title'].'" type="text" class="form-control" name="content_new_title" id="content_new_title" placeholder="'.$interface_content_new[6].'" />';
					echo '</div>';
				echo '</div>';
				echo '<div '.$form_element_dysplay[1].' class="form-group '.$has_status[6].'">';
					echo '<label for="content_new_annotation" class="col-xs-4 col-sm-2 col-md-2 col-lg-2 control-label">'.$interface_content_new[7].'</label>';
					echo '<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">';
						echo '<input value="'.$_SESSION['content_new_annotation'].'" type="text" class="form-control" name="content_new_annotation" id="content_new_annotation" placeholder="'.$interface_content_new[7].'" />';
					echo '</div>';
				echo '</div>';
				echo '<div '.$form_element_dysplay[1].' class="form-group '.$has_status[7].'">';
					echo '<label for="content_new_bibliography" class="col-xs-4 col-sm-2 col-md-2 col-lg-2 control-label">'.$interface_content_new[8].'</label>';
					echo '<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">';
						echo '<input value="'.$_SESSION['content_new_bibliography'].'" type="text" class="form-control" name="content_new_bibliography" id="content_new_bibliography" placeholder="'.$interface_content_new[8].'" />';
					echo '</div>';
				echo '</div>';
				echo '<div '.$form_element_dysplay[1].' class="form-group '.$has_status[8].'">';
					echo '<label for="content_new_description" class="col-xs-4 col-sm-2 col-md-2 col-lg-2 control-label">'.$interface_content_new[9].'</label>';
					echo '<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">';
						echo '<input value="'.$_SESSION['content_new_description'].'" type="text" class="form-control" name="content_new_description" id="content_new_description" placeholder="'.$interface_content_new[9].'" />';
					echo '</div>';
				echo '</div>';
				echo '<div '.$form_element_dysplay[1].' class="form-group '.$has_status[9].'">';
					echo '<label for="content_new_keywords" class="col-xs-4 col-sm-2 col-md-2 col-lg-2 control-label">'.$interface_content_new[10].'</label>';
					echo '<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">';
						echo '<input value="'.$_SESSION['content_new_keywords'].'" type="text" class="form-control" name="content_new_keywords" id="content_new_keywords" placeholder="'.$interface_content_new[10].'" />';
					echo '</div>';
				echo '</div>';
				echo '<div '.$form_element_dysplay[1].' class="form-group '.$has_status[10].'">';
					echo '<label for="content_new_image" class="col-xs-4 col-sm-2 col-md-2 col-lg-2 control-label">'.$interface_content_new[11].'</label>';
					echo '<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">';
						echo '<div class="input-group">';
							echo '<label class="input-group-btn">';
								echo '<span class="btn btn-primary">';
									echo $interface_content_new[19].'&hellip; <input id="content_new_image" type="file" style="display: none;" onchange="$(\'#content_new_image_file\').val($(this).val());" />';
								echo '</span>';
							echo '</label>';
							echo '<input value="'.$_SESSION['content_new_image_file'].'" type="text" class="form-control" name="content_new_image_file" id="content_new_image_file" readonly>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
				echo '<br />';
				echo '<div '.$form_element_dysplay[1].' class="form-group '.$has_status[11].'">';					
					echo '<label for="content_new_type" class="col-xs-4 col-sm-2 col-md-2 col-lg-2 control-label">'.$interface_content_new[12].'</label>';
					echo '<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">';						
						echo '<div class="btn-group" data-toggle="buttons">';							
							for ($i=1; $i <= $system_count_types; $i++) {
								echo '<label for="content_new_type_'.$i.'" class="btn btn-default '.$type_active[$i].'">'.$interface_content_new_type[$i];
								echo '<input value="1" type="checkbox"'.$type_check[$i].' name="content_new_type_'.$i.'" id="content_new_type_'.$i.'"></label>';
							}
						echo '</div>';
					echo '</div>';
				echo '</div>';
	// 2
				echo '<div '.$form_element_dysplay[2].' class="form-group">';
					echo '<label class="col-xs-4 col-sm-2 col-md-2 col-lg-2 control-label">'.$interface_content_new[2].'</label>';
					echo '<label class="col-xs-1 col-sm-1 col-md-1 col-lg-1 control-label">'.$interface_content_new[13].'</label>';
				echo '</div>';
				echo '<hr '.$form_element_dysplay[2].'>';
				if (IsSet($_SESSION['content_new_direction']) && ($_SESSION['content_new_direction'] != '') && ($_SESSION['content_new_direction'] != substr(str_repeat("0-", $system_count_directions), 0, (strlen(str_repeat("0-", $system_count_directions)) - 1)))) {
					// Парсинг списка направлений
					$parse_content_new_direction = preg_split("/[-]+/", $_SESSION['content_new_direction']); 
					// Формирование списка выбранных направлений контента
					for ($i=0; $i < count($parse_content_new_direction); $i++) {
						if ($parse_content_new_direction[$i] == '1') {
							echo '<div '.$form_element_dysplay[2].' class="form-group '.$has_status_category[$i + 1].'">';					
								echo '<label for="content_new_direction_'.($i + 1).'" class="col-xs-4 col-sm-2 col-md-2 col-lg-2 control-label">'.$interface_direction[$i + 1].'</label>';
								echo '<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">';						
									echo '<div class="btn-group" data-toggle="buttons">';							
										for ($y=1; $y <= $system_count_categories[($i + 1)]; $y++) {
											echo '<label for="content_new_category_'.($i + 1).'_'.$y.'" class="btn btn-default '.$category_active[($i + 1)][$y].'">'.$interface_content_new_category[($i + 1)][$y];
											echo '<input value="1" type="checkbox"'.$category_check[($i + 1)][$y].' name="content_new_category_'.($i + 1).'_'.$y.'" id="content_new_category_'.($i + 1).'_'.$y.'"></label>';
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
						}
					}
				} else {
					echo '<div '.$form_element_dysplay[2].' class="form-group">';
						echo '<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2"><p class="text-danger text-right"><strong>'.$interface_system[8].'</strong></p></div>';
						echo '<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9"><p class="text-danger"><strong>'.$interface_system[8].'</strong></p></div>';
					echo '</div>';
				}
	// 3
				echo '<div '.$form_element_dysplay[3].' class="form-group '.$has_status[13].'">';
					echo '<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2">';
					echo '</div>';				
					echo '<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">';
					echo '<button onclick="editText(\'h1\')" id="header1" type="button" class="btn btn-default" title="Header 1"><span class="fa fa-header">&nbsp;1</span></button>';
					echo '<button onclick="editText(\'h2\')" id="header2" type="button" class="btn btn-default" title="Header 2"><span class="fa fa-header">&nbsp;2</span></button>';
					echo '<button onclick="editText(\'h3\')" id="header3" type="button" class="btn btn-default" title="Header 3"><span class="fa fa-header">&nbsp;3</span></button>';
					echo '<button onclick="editText(\'h4\')" id="header4" type="button" class="btn btn-default" title="Header 4"><span class="fa fa-header">&nbsp;4</span></button>&nbsp;&nbsp;';
					echo '<button onclick="editText(\'em\')" id="text_italic" type="button" class="btn btn-default" title="Italic"><span class="fa fa-italic"></span></button>';
					echo '<button onclick="editText(\'strong\')" id="text_bold" type="button" class="btn btn-default" title="Bold"><span class="fa fa-bold"></span></button>';
					echo '<button onclick="editText(\'u\')" id="text_underline" type="button" class="btn btn-default" title="Under line"><span class="fa fa-underline"></span></button>';
					echo '<button onclick="editText(\'strike\')" id="text_strike" type="button" class="btn btn-default" title="Strike line"><span class="fa fa-strikethrough"></span></button>&nbsp;&nbsp;';
					echo '<button onclick="editText(\'ol\')" id="text_list_ol" type="button" class="btn btn-default" title="List numbers"><span class="fa fa-list-ol"></span></button>';
					echo '<button onclick="editText(\'ul\')" id="text_list_ul" type="button" class="btn btn-default" title="List marks"><span class="fa fa-list-ul"></span></button>&nbsp;&nbsp;';
					echo '<button onclick="editText(\'p\')" id="text_paragraph" type="button" class="btn btn-default" title="Paragraph"><span class="fa fa-paragraph"></span></button>&nbsp;&nbsp;';
					//echo '<button onclick="editText(\'img\')" id="text_image" type="button" class="btn btn-default" title="Image"><span class="fa fa-image"></span></button>';
					echo '</div>';				
				echo '</div>';
				echo '<div '.$form_element_dysplay[3].' class="form-group '.$has_status[13].'">';
					echo '<label for="content_new_text" class="col-xs-4 col-sm-2 col-md-2 col-lg-2 control-label">'.$interface_content_new[14].'</label>';
					echo '<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">';
						echo '<textarea name="content_new_text" id="content_new_text" rows="10" class="form-control">'.$_SESSION['content_new_text'].'</textarea>';
					echo '</div>';				
				echo '</div>';
	// 4
				echo '<div '.$form_element_dysplay[4].' class="form-group">';
					echo '<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2"></div>';
					echo '<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">';
				
						echo '<div class="panel panel-default">';
						echo '<div class="panel-heading">'.$_POST['content_new_authors'];
						echo '<br /><strong>'.$_POST['content_new_title'].' ('.$_POST['content_new_year'].')</strong>';
						if ($_POST['content_new_bibliography'] <> '') { 
							echo '<br /><small>'.$_POST['content_new_bibliography'].'</small>';
						}
						echo '</div>';
						echo '<div class="panel-body">';
						echo $_POST['content_new_text'];
						echo '</div>';
						echo '</div>';

					echo '</div>';
				echo '</div>';
?>
				<input value="<?php echo $_SESSION['language']; ?>" type="hidden" class="form-control" name="content_new_language" id="content_new_language" />
				<input value="<?php echo $_SESSION['content_new_step']; ?>" type="hidden" class="form-control" name="content_new_step" id="content_new_step" />
				<hr />
				<div class="form-group">
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					</div>
					<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
						<button type="submit" name="content_new" value="cancel" class="btn btn-default"><?php echo $interface_content_new[15]; ?></button>
						<button <?php echo $submit_disabled[1]; ?> type="submit" name="content_new" value="back" class="btn btn-default">&nbsp;<?php echo $interface_content_new[16]; ?></button>
						<button <?php echo $submit_disabled[2]; ?> type="submit" name="content_new" value="next" class="btn btn-default">&nbsp;<?php echo $interface_content_new[17]; ?></button>
						<button <?php echo $submit_disabled[3]; ?> type="submit" name="content_new" value="save" class="btn btn-default">&nbsp;<?php echo $interface_content_new[18]; ?></button>
					</div>
				</div>
			</form>
		</section>
<?php
	closeContentNew (0);
?>

