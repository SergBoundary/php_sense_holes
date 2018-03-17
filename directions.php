<?php
session_start();
$dir = '';
include($dir.'data_base\vars.inc');
include($dir.'data_base\db.inc');
include($dir.'data_base\system_statistic.inc');
include($dir.'data_base\direction.inc');
include($dir.'data_base\language.inc');
include($dir.'data_base\path.inc');
include($dir.'data_base\content.inc');
$_SESSION['content_access'] = 1;
?>
<!doctype html>
<html lang="<?php echo $language_use; ?>">
<?php include($dir.'data_base\head.inc'); ?>
<body>
  <div class="container">
    <div class="row">
	  <div class="wrapper container">
		<?php include($dir.'blocks\header.php'); ?>
	    <div class="heading">
	      <h3><?php echo $path_content; ?></h3>
		</div>
		<?php include($dir.'blocks\nav.php'); ?>
		<div class="row">
	    <div class="container">
		<div class="row">
			<?php 
				if ($direction == 9) {
					include($dir.'blocks\direction_contact_aside.php'); 
					include($dir.'blocks\direction_contact_section.php'); 
				} else {
					include($dir.'blocks\direction_aside.php'); 
					include($dir.'blocks\direction_section.php'); 
				}
			?>
		</div>
		</div>
		</div>
	    <div class="row">
		<hr />
	    <?php include($dir.'blocks\footer.php'); ?>
		<br />
		</div>
	  </div>
    </div>
  </div>
  <!-- JavaScript -->
  <script type="text/javascript" src="<?php echo $dir; ?>js\index.js"></script>
  <!-- JQuery -->
  <script type="text/javascript" src="<?php echo $dir; ?>js\jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="<?php echo $dir; ?>jquery.gdocsviewer.min.js"></script>
  <!-- Bootstrap -->
  <script type="text/javascript" src="<?php echo $dir; ?>js\bootstrap.js"></script>
  <!-- Salvattore -->
  <script type="text/javascript" src="<?php echo $dir; ?>js\salvattore.min.js"></script>
</body>
</html>