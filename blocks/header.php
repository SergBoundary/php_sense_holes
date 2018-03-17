		<div class="pull-right">
			<?php
			$parse_path = preg_split("/[-]+/", $_SESSION['path']);
			$length = strlen($_SESSION['path'])-strlen($parse_path[3]);

							$query_language = "SELECT content_language 
								FROM contents 
								GROUP BY content_language
								ORDER BY content_language";
							if ($result_language = mysqli_query($db, $query_language)) {
								$i=0;
								while ($row_language = mysqli_fetch_array($result_language, MYSQLI_NUM)) {
									$interface_language[$i] = trim($row_language[0]);
									echo '<a href="'.$_SERVER['PHP_SELF'].'?path='.substr($_SESSION['path'], 0, $length).'0&content=&language='.$interface_language[$i].'">'.$interface_language[$i].'</a>&nbsp;&nbsp;';
									$i++;
								}
							} else {
								die(mysqli_error($db));
							}
			?>
		</div>
		<div class="row">
          <header>
		    <div class="container hidden-xs hidden-sm hidden-md visible-lg">
		      <a href="<?php echo $domenname.'/index.php'; ?>" title="<?php echo $interface_system[1]; ?>"><img src="<?php echo $dir; ?>img\interstellar_black_hole_en_1.jpg" width="100%" title="<?php echo $interface_system[1].' | '.$interface_system[2].' vs '.$interface_system[3]; ?>" alt="<?php echo $interface_system[1].' | '.$interface_system[2].' vs '.$interface_system[3]; ?>" /></a>
		    </div>
		    <div class="container hidden-xs hidden-sm visible-md hidden-lg">
		      <a href="<?php echo $domenname.'/index.php'; ?>" title="<?php echo $interface_system[1]; ?>"><img src="<?php echo $dir; ?>img\interstellar_black_hole_en_2.jpg" width="100%" title="<?php echo $interface_system[1].' | '.$interface_system[2].' vs '.$interface_system[3]; ?>" alt="<?php echo $interface_system[1].' | '.$interface_system[2].' vs '.$interface_system[3]; ?>" /></a>
		    </div>
		    <div class="container hidden-xs visible-sm hidden-md hidden-lg">
		      <a href="<?php echo $domenname.'/index.php'; ?>" title="<?php echo $interface_system[1]; ?>"><img src="<?php echo $dir; ?>img\interstellar_black_hole_en_3.jpg" width="100%" title="<?php echo $interface_system[1].' | '.$interface_system[2].' vs '.$interface_system[3]; ?>" alt="<?php echo $interface_system[1].' | '.$interface_system[2].' vs '.$interface_system[3]; ?>" /></a>
		    </div>
		    <div class="container visible-xs hidden-sm hidden-md hidden-lg">
		      <a href="<?php echo $domenname.'/index.php'; ?>" title="<?php echo $interface_system[1]; ?>"><img src="<?php echo $dir; ?>img\interstellar_black_hole_en_4.jpg" width="100%" title="<?php echo $interface_system[1].' | '.$interface_system[2].' vs '.$interface_system[3]; ?>" alt="<?php echo $interface_system[1].' | '.$interface_system[2].' vs '.$interface_system[3]; ?>" /></a>
		    </div>
	      </header>
		</div>