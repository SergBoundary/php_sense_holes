	      <aside class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
			<div id="accordion" class="panel-group">
			  <div class="panel panel-default">
			    <div class="panel-heading">
				  <a href="#collapse-1" data-parent="#accordion" data-toggle="collapse"><strong><?php echo $direction_aside[1]; ?></strong></a>
				</div>
				<div id="collapse-1" class="panel-collapse collapse<?php echo $aside_active[1]; ?>">
				  <div class="panel-body">
		            <p><a href="<?php echo $_SERVER['PHP_SELF'].'?aside=1&aside_path='.$direction_aside[4] ?>"><?php echo $direction_aside[4]; ?></a></p>
		            <p><a href="<?php echo $_SERVER['PHP_SELF'].'?aside=2&aside_path='.$direction_aside[5] ?>"><?php echo $direction_aside[5]; ?></a></p>
				  </div>
				</div>
			  </div>
			  <div class="panel panel-default">
			    <div class="panel-heading">
				  <a href="#collapse-2" data-parent="#accordion" data-toggle="collapse"><strong><?php echo $direction_aside[2]; ?></strong></a>
				</div>
				<div id="collapse-2" class="panel-collapse collapse<?php echo $aside_active[2]; ?>">
				  <div class="panel-body">
		            <p><a href="<?php echo $_SERVER['PHP_SELF'].'?aside=3&aside_path='.$direction_aside[6] ?>"><?php echo $direction_aside[6]; ?></a></p>
		            <p><a href="<?php echo $_SERVER['PHP_SELF'].'?aside=4&aside_path='.$direction_aside[7] ?>"><?php echo $direction_aside[7]; ?></a></p>
				  </div>
				</div>
			  </div>
			  <div class="panel panel-default">
			    <div class="panel-heading">
				  <a href="#collapse-3" data-parent="#accordion" data-toggle="collapse"><strong><?php echo $direction_aside[3]; ?></strong></a>
				</div>
				<div id="collapse-3" class="panel-collapse collapse<?php echo $aside_active[3]; ?>">
				  <div class="panel-body">
		            <p><a href="<?php echo $_SERVER['PHP_SELF'].'?aside=5&aside_path='.$direction_aside[6] ?>"><?php echo $direction_aside[6]; ?></a></p>
		            <p><a href="<?php echo $_SERVER['PHP_SELF'].'?aside=6&aside_path='.$direction_aside[7] ?>"><?php echo $direction_aside[7]; ?></a></p>
				  </div>
				</div>
			  </div>
			</div>

            <div class="panel panel-default">
			  <div class="panel-heading"><span class="text-muted"><a href="<?php echo $_SERVER['PHP_SELF'].'?aside='.$aside.'&category=0' ?>" title="<?php echo $direction_aside[9]; ?>"><?php echo $direction_aside[9]; ?></a></span></div>
			  <div class="panel-body">
				<?php
				// Загрузка статусов
				$i = 0;
				$query_category = "SELECT `category_id`, `category_".$language_use."` FROM `categories` WHERE `direction_id` = '".$chosen."' ORDER BY `category_id`";
				if ($result_category = mysqli_query($db, $query_category)) {
					while ($row_category = mysqli_fetch_array($result_category, MYSQLI_NUM)) {
						$i++;
						$category[$i] = $row_category[1];
						echo "<div class=\"caption\">";
						echo "<p><a href=\"".$_SERVER['PHP_SELF'].'?category='.$i."\">".$category[$i]."</a></p>";
						echo "</div>";
					}
				} else {
					die(mysqli_error($db));
				}
				?>
		      </div>
		    </div>
			</aside>
