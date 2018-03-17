		<section class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
			<?php
			// echo '$path: '.$path;
			if ($content != '') {
				echo '<div class="panel panel-default">';
				echo '<div class="panel-heading">'.$content_author;
				echo '<br /><strong>'.$content_title.' ('.$content_year.')</strong>';
				if ($content_bibliography <> '') { 
					echo '<br /><small>'.$content_bibliography.'</small>';
				}
				echo '</div>';
				echo '<div class="panel-body">';
				include($dir.'content/'.$content.'.php'); 
				echo '</div>';
				echo '</div>';
			} else {
				// Загрузка списка аннотаций контента
				$i = 0;
				if ($result_annotation = mysqli_query($db, $query_annotation)) {
					echo '<div class="row masonry" data-columns>';
					while ($row_annotation = mysqli_fetch_array($result_annotation, MYSQLI_NUM)) {
						$i++;
						$annotation_img[$i] = $row_annotation[0];
						$annotation_author[$i] = $row_annotation[1];
						$annotation_title[$i] = $row_annotation[2];
						$annotation_year[$i] = $row_annotation[3];
						$annotation_annotation[$i] = $row_annotation[4];
						$annotation_url[$i] = $row_annotation[5];
						echo '<div class="item">';
						echo '<div class="thumbnail">';
						echo '<div class="caption">';
						echo '<img src="'.$annotation_img[$i].'" alt="" class="img-responsive">';
						echo '<br />'.$annotation_author[$i];
						echo '<h4>'.$annotation_title[$i].' ('.$annotation_year[$i].')</h4>';
						echo '<p>'.$annotation_annotation[$i].'.. <a href="'.$_SERVER['PHP_SELF'].'?path='.$_SESSION['path'].'&content='.$annotation_url[$i].'">'.$interface_system[7].'&nbsp;&raquo;</a></p>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
					}
					echo '</div>';
					if ($i == 0) {
						echo '<div class="text-center">';
						echo '<br />';
						echo '<p><h1><small>'.$interface_system[8].'</small></h1>';
						echo '<br />';
						echo '<form method="post" action="'.$domenname.'/add.php'.'" name="content_add" role="form">';
						echo '<input type="hidden" name="content_new_direction_'.$direction.'" id="content_new_direction_'.$direction.'" />';
						echo '<button type="submit" name="content_new_step" value="1" class="btn btn-default btn-lg">'.$interface_system[9].'</button>';
						echo '</form>';
						echo '</div>';
					} else {
						echo '<div class="thumbnail">';
						echo '<div class="text-center">';
						echo '<br />';
						echo '<form method="post" action="'.$domenname.'/add.php'.'" name="content_add" role="form">';
						echo '<input type="hidden" name="content_new_direction_'.$direction.'" id="content_new_direction_'.$direction.'" />';
						echo '<button type="submit" name="content_new_step" value="1" class="btn btn-default btn-lg">'.$interface_system[9].'</button>';
						echo '</form>';
						echo '<br />';
						echo '</div>';
						echo '</div>';
					}
				} else {
					die(mysqli_error($db));
				}
			}
			?>
		</section>
