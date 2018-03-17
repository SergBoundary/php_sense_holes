<?php

for ($i=1; $i < 4; $i++) {
	$submit_disabled[$i] = '';
}
for ($i=1; $i < 5; $i++) {
	$form_element_dysplay[$i] = 'style="display: none;"';
}

// Выбор кнопки "Далее"
if (IsSet($_POST['content_new']) && ($_POST['content_new'] == 'next')) { 
	if ($_SESSION['content_new_step'] < 3) {
		$_SESSION['content_new_step'] = $_SESSION['content_new_step'] + 1;
	}
// Выбор кнопки "Вернуть"
} elseif (IsSet($_POST['content_new']) && ($_POST['content_new'] == 'back')) { 
	if ($_SESSION['content_new_step'] > 1) {
		$_SESSION['content_new_step'] = $_SESSION['content_new_step'] - 1;
	} 
// Выбор кнопки "Записать"
} elseif (IsSet($_POST['content_new']) && ($_POST['content_new'] == 'save')) { 
	$test_data = testContentNewSave (array($system_count_directions, $system_count_types), $system_count_categories);
	if ($test_data === true) {
		$_SESSION['content_new_step'] = 4;
		
	} else if ($test_data === false) {
	}
// Выбор кнопки "Отменить"
} elseif (IsSet($_POST['content_new']) && ($_POST['content_new'] == 'cancel')) { 
	$parse_path = preg_split("/[-]+/", $_SESSION['path']); // Парсинг пути к контенту
	// Определение выбранного направления контента
	$direction = $parse_path[0];
	$aside = $parse_path[1];
	$subaside = $parse_path[2];
	if ($direction == 0) {
		$cancel_path = $domenname.'/index.php?path=0-0-0-0';
	} else {
		$cancel_path = $domenname.'/directions.php?path='.$_SESSION['path'];
	}
	// Обнуляем данные формы добавления контента
	closeContentNew (1);
	header('Location: '.$cancel_path, true, 301);
	exit();
}

$form_element_dysplay[$_SESSION['content_new_step']] = '';
switch($_SESSION['content_new_step']) {
case 1:
	$submit_disabled[1] = 'disabled';
	$submit_disabled[3] = 'disabled';
	break;
case 2:
	$submit_disabled[3] = 'disabled';
	break;
case 3:
	$submit_disabled[2] = 'disabled';
	break;
case 4:
	$submit_disabled[2] = 'disabled';
	break;
default:
	$submit_disabled[1] = 'disabled';
	$submit_disabled[3] = 'disabled';
}


?>