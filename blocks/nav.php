<?php
// Обнуление активации меню
for ($i=1; $i<11; $i++) {
	$direction_active[$i] = '';
}
	$direction_active[$direction] = 'class="active"';
?>
	    <nav class="navbar navbar-inverse" role="navigation">
		  <div class="container-fluid">
		    <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sense-holes-navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
			  </button>
              <a class="navbar-brand" href="<?php echo $domenname.'/index.php'; ?>" title="<?php echo $interface_system[4]; ?>"><span class="glyphicon glyphicon-home"></span></a>
            </div>
			<div class="collapse navbar-collapse" id="sense-holes-navigation">
	          <ul class="nav navbar-nav">
 		        <li <?php echo $direction_active[1]; ?>><a href="<?php echo $dir; ?>directions.php?path=1-1-1-0"><?php echo $interface_direction[1]; ?></a></li>
 		        <li <?php echo $direction_active[2]; ?>><a href="<?php echo $dir; ?>directions.php?path=2-1-1-0"><?php echo $interface_direction[2]; ?></a></li>
 		        <li <?php echo $direction_active[3]; ?>><a href="<?php echo $dir; ?>directions.php?path=3-1-1-0"><?php echo $interface_direction[3]; ?></a></li>
 		        <li <?php echo $direction_active[4]; ?>><a href="<?php echo $dir; ?>directions.php?path=4-1-1-0"><?php echo $interface_direction[4]; ?></a></li>
 		        <li <?php echo $direction_active[5]; ?>><a href="<?php echo $dir; ?>directions.php?path=5-1-1-0"><?php echo $interface_direction[5]; ?></a></li>
 		        <li <?php echo $direction_active[6]; ?>><a href="<?php echo $dir; ?>directions.php?path=6-1-1-0"><?php echo $interface_direction[6]; ?></a></li>
 		        <li <?php echo $direction_active[7]; ?>><a href="<?php echo $dir; ?>directions.php?path=7-1-1-0"><?php echo $interface_direction[7]; ?></a></li>
 		        <li <?php echo $direction_active[8]; ?>><a href="<?php echo $dir; ?>directions.php?path=8-1-1-0"><?php echo $interface_direction[8]; ?></a></li>
	          </ul>
              <ul class="nav navbar-nav navbar-right">
                <li <?php echo $direction_active[9]; ?>><a href="<?php echo $dir; ?>directions.php?path=9-1-1-0"><?php echo $interface_direction[9]; ?></a></li>
				<li <?php echo $direction_active[10]; ?>><a href="http://senses.pro/db_load" title="<?php echo $interface_system[5]; ?>"><span class="glyphicon glyphicon-log-in"></span></a></li>
              </ul>
			  </div>
		  </div>
	    </nav>
