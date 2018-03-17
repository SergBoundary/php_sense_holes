<?php
// Обнуление активации статусного меню
for ($i=1; $i<4; $i++) {
	$aside_active[$i] = '';
}
$aside_active[$aside] = 'class="active"';

// Обнуление активации меню метакатегорий
for ($i=1; $i<4; $i++) {
	$procategory_active[$i] = '';
}
$procategory_active[$procategory] = 'class="active"';

// Обнуление активации меню категорий
for ($i=1; $i<10; $i++) {
	$category_active[$i] = '';
}
$category_active[$category] = '<span class="glyphicon glyphicon glyphicon-stop"></span>&nbsp;';

$count_critic = '4';
?>
	    <aside class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
		    <ul class="nav nav-pills nav-stacked thumbnail">
				<li role="presentation" <?php echo $aside_active[1]; ?>><a href="<?php echo $_SERVER['PHP_SELF'].'?direction='.$direction.'&aside=1'; ?>"><?php echo $interface_aside[1]; ?><span class="badge pull-right"><?php echo $count_critic; ?></span></a></li>
				<li role="presentation" <?php echo $aside_active[2]; ?>><a href="<?php echo $_SERVER['PHP_SELF'].'?direction='.$direction.'&aside=2'; ?>"><?php echo $interface_aside[2]; ?><span class="badge pull-right"><?php echo $count_critic; ?></span></a></li>
				<li role="presentation" <?php echo $aside_active[3]; ?>><a href="<?php echo $_SERVER['PHP_SELF'].'?direction='.$direction.'&aside=3'; ?>"><?php echo $interface_aside[3]; ?><span class="badge pull-right"><?php echo $count_critic; ?></span></a></li>
	        </ul>

		    <ul class="nav nav-pills nav-stacked thumbnail">
				<?php
				if ($aside == 1) {
					echo '<li role="presentation"'.$procategory_active[1].'><a href="'.$_SERVER['PHP_SELF'].'?procategory=1">'.$interface_aside[4].'<span class="badge pull-right">'.$count_critic.'</span></a></li>';
					echo '<li role="presentation"'.$procategory_active[2].'><a href="'.$_SERVER['PHP_SELF'].'?procategory=2">'.$interface_aside[5].'<span class="badge pull-right">'.$count_critic.'</span></a></li>';
				} elseif ($aside == 2 || $aside == 3) {
					echo '<li role="presentation"'.$procategory_active[1].'><a href="'.$_SERVER['PHP_SELF'].'?procategory=1">'.$interface_aside[6].'<span class="badge pull-right">'.$count_critic.'</span></a></li>';
					echo '<li role="presentation"'.$procategory_active[2].'><a href="'.$_SERVER['PHP_SELF'].'?procategory=2">'.$interface_aside[7].'<span class="badge pull-right">'.$count_critic.'</span></a></li>';
					echo '<li role="presentation"'.$procategory_active[3].'><a href="'.$_SERVER['PHP_SELF'].'?procategory=3">'.$interface_aside[8].'<span class="badge pull-right">'.$count_critic.'</span></a></li>';
				}
				?>
	        </ul>

		    <!-- 
			<div class="panel panel-default">
              <div id="digital_watch" class="panel-body"></div>
            </div>
			-->

				<?php
				if ($aside == 1) {
					switch($procategory) {
					case '1':
						break;
					case '2':
						break;
					default:
					}
				} elseif ($aside == 2 || $aside == 3) {
					switch($procategory) {
					case '1':
						break;
					case '2':
						break;
					case '3':
						echo '<div class="panel panel-default">';
						$i = 0;
						echo '<div class="panel-heading"><span class="text-muted"><a href="'.$_SERVER['PHP_SELF'].'?category=0" title="'.$interface_aside[9].'">'.$category_active[$i].$interface_aside[9].'</a></span></div>';
						echo '<div class="panel-body">';
						// Загрузка статусов
						$query_category = "SELECT `category_id`, `category_".$language_use."` FROM `categories` WHERE `direction_id` = '".$direction."' ORDER BY `category_id`";
						if ($result_category = mysqli_query($db, $query_category)) {
							while ($row_category = mysqli_fetch_array($result_category, MYSQLI_NUM)) {
								$i++;
								$interface_category[$i] = $row_category[1];
								echo '<div class="caption">';
								echo '<p><a href="'.$_SERVER['PHP_SELF'].'?category='.$i.'">'.$category_active[$i].$interface_category[$i].'</a></p>';
								echo '</div>';
							}
						} else {
							die(mysqli_error($db));
						}
						echo '</div>';
						echo '</div>';
						break;
					default:
					}
				}
				?>
	      </aside>
