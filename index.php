<?php
session_start();
$dir = '';
include($dir.'data_base\vars.inc');
include($dir.'data_base\db.inc');
include($dir.'data_base\system_statistic.inc');
include($dir.'data_base\direction.inc');
include($dir.'data_base\language.inc');
include($dir.'data_base\path.inc');
$_SESSION['content_access'] = 1;
?>
<!doctype html>
<html lang="<?php echo $language_use; ?>">
<?php include($dir.'data_base\head.inc'); ?>
<body>
  <div class="container">
    <div class="row">
	  <div class="wrapper container">
		<?php include('blocks\header.php'); ?>
	    <div class="heading">
	      <h3><?php echo $path_content; ?></h3>
		</div>
		<?php include('blocks\nav.php'); ?>
		<section>
		<div class="row">
			<div class="col-sm-3 col-md-3 col-lg-3">
				<?php include('blocks\panel_events.php'); ?>
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3">
				<?php include('blocks\panel_annotations.php'); ?>
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3">
				<?php include('blocks\panel_criticism.php'); ?>
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3">
				<?php include('blocks\panel_library.php'); ?>
			</div>
		</div>
		</section>
		<hr />
	    <?php include('blocks\footer.php'); ?>
		<br />
	  </div>
    </div>
  </div>
  <div class="container">
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