            <div class="panel panel-default">
				<?php
				// Загрузка под-подменю
				$i = 0;
				$query_annotations_new = "SELECT direction_subaside_".$language_use." 
								FROM direction_subaside 
								WHERE direction_aside_id = '1' AND direction_subaside_numb = '2'";
				$result_annotations_new = mysqli_query($db, $query_annotations_new) or die(mysqli_error($db));
				// Если пункт под-подменю найден
				if (mysqli_num_rows($result_annotations_new) == 1) {
					$row_annotations_new = mysqli_fetch_array($result_annotations_new, MYSQL_ASSOC);
					$interface_annotations_new = $row_annotations_new['direction_subaside_'.$language_use];
				} else {
					die(mysqli_error($db));
				}
				// Подсчет контента аннотаций 
				$count_annotations_new = countContentStatistic ($db, 0, 2, '');
				?>
				<div class="panel-heading"><a href="#"><span class="text-muted"><strong><?php echo $interface_annotations_new; ?></strong></span><span class="badge pull-right"><?php echo $count_annotations_new; ?></span></a></div>
				<div class="panel-body">
				<?php
				if ($count_annotations_new == 0) {
					echo '<div class="text-center">';
					echo '<br />';
					echo '<p><h1><small>'.$interface_system[8].'</small></h1>';
					echo '<br />';
					echo '<form method="post" action="'.$domenname.'/add.php'.'" name="content_add" role="form">';
					echo '<input type="hidden" name="content_new_direction_'.$direction.'" id="content_new_direction_'.$direction.'" />';
					echo '<button type="submit" name="content_new_step" value="1" class="btn btn-default btn-lg">'.$interface_system[9].'</button>';
					echo '</form>';
					//echo '<p><a href="'.$_SERVER['PHP_SELF'].'?addcontent=1" class="btn btn-default btn-lg" role="button">'.$interface_system[9].'</a></p>';
					echo '</div>';
				} else {
					// Загрузка трех последних загрузок контента
					$i = 0;
// http://sebo.com/directions/philosophy.php?content=bondarenko_vozvraschenie_ontologii_k_opytu_bytia_ru.php
					$query_panel_annotations = "SELECT cn.content_img, cn.content_author, cn.content_title, cn.content_year, cn.content_annotation, cn.content_url, cn.content_id 
									FROM contents AS cn, content_relations_status AS crs 
									WHERE cn.content_id = crs.content_id AND crs.content_status_id = '2' AND cn.content_language = '".$language_use."' 
									ORDER BY cn.content_reg_date DESC, cn.content_title 
									LIMIT 3";
					if ($result_panel_annotations = mysqli_query($db, $query_panel_annotations)) {
						while ($row_panel_annotations = mysqli_fetch_array($result_panel_annotations, MYSQLI_NUM)) {
							$i++;
							$panel_annotations_img[$i] = $row_panel_annotations[0];
							$panel_annotations_author[$i] = $row_panel_annotations[1];
							$panel_annotations_title[$i] = $row_panel_annotations[2];
							$panel_annotations_year[$i] = $row_panel_annotations[3];
							$panel_annotations_annotation[$i] = $row_panel_annotations[4];
							$panel_annotations_url[$i] = $row_panel_annotations[5];
							$panel_annotations_content_id[$i] = $row_panel_annotations[6];
							$query_panel_annotations_direction = "SELECT DISTINCT dr.direction_id, dr.direction_".$language_use.", crs.content_status_id
											FROM contents AS cn, directions AS dr, content_relations_direction AS crd, content_relations_status AS crs 
											WHERE cn.content_id = crd.content_id AND crd.direction_id = dr.direction_id AND cn.content_id = crs.content_id 
											AND cn.content_id = '".$panel_annotations_content_id[$i]."' 
											ORDER BY dr.direction_id";
							if ($result_panel_annotations_direction = mysqli_query($db, $query_panel_annotations_direction)) {
								while ($row_panel_annotations_direction = mysqli_fetch_array($result_panel_annotations_direction, MYSQLI_NUM)) {
									// $i++;
									$panel_annotations_direction_id = $row_panel_annotations_direction[0];
									$panel_annotations_direction_name = $row_panel_annotations_direction[1];
									$panel_annotations_status_id = $row_panel_annotations_direction[2];
									switch($panel_annotations_status_id) {
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
											$subaside = 1;
											break;
										case '4':
											$aside = 3;
											$subaside = 1;
											break;
										default:
									}
									echo '<a href="directions.php?path='.$panel_annotations_direction_id.'-'.$aside.'-'.$subaside.'-0">#'.mb_strtolower($panel_annotations_direction_name, 'UTF-8').'</a> ';
								}
							}
							echo '<div class="caption">';
							echo '<img src="'.$panel_annotations_img[$i].'" alt="" class="img-responsive">';
							echo '<br />'.$panel_annotations_author[$i];
							echo '<h4>'.$panel_annotations_title[$i].' ('.$panel_annotations_year[$i].')</h4>';
							echo '<p>'.$panel_annotations_annotation[$i].'.. <a href="directions.php?path='.$panel_annotations_direction_id.'-'.$aside.'-'.$subaside.'-0&content='.$panel_annotations_url[$i].'">'.$interface_system[7].'&nbsp;&raquo;</a></p>';
							echo '</div>';
						}
					} else {
						die(mysqli_error($db));
					}
				}
				?>
				</div>
		    </div>
