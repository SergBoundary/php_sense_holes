<?php
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
	$language_select[2] = 'selected';
}
?>
		<section class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
			<h2><?php echo $interface_system[10]; ?></h2><br /><br />
			<form class="form-horizontal" role="form">
				<div class="form-group">
					<label for="input_language" class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label"><?php echo $interface_system[11]; ?></label>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<select class="form-control" id="input_language" size="1">
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
					<label for="input_" class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label"><?php echo $interface_system[12]; ?></label>
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						 <input type="text" class="form-control" id="input_" placeholder="1900" size="6" maxlength="4">
					</div>
				</div>
				<div class="form-group">
					<label for="input_" class="col-sm-2 control-label"><?php echo $interface_system[13]; ?></label>
					<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
						 <input type="text" class="form-control" id="input_" placeholder="<?php echo $interface_system[13]; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="input_" class="col-sm-2 control-label"><?php echo $interface_system[14]; ?></label>
					<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
						 <input type="text" class="form-control" id="input_" placeholder="<?php echo $interface_system[14]; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="input_" class="col-sm-2 control-label"><?php echo $interface_system[15]; ?></label>
					<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
						 <input type="text" class="form-control" id="input_" placeholder="<?php echo $interface_system[15]; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="input_" class="col-sm-2 control-label"><?php echo $interface_system[16]; ?></label>
					<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
						 <input type="text" class="form-control" id="input_" placeholder="<?php echo $interface_system[16]; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="input_" class="col-sm-2 control-label"><?php echo $interface_system[17]; ?></label>
					<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
						 <input type="text" class="form-control" id="input_" placeholder="<?php echo $interface_system[17]; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="input_" class="col-sm-2 control-label"><?php echo $interface_system[18]; ?></label>
					<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
						 <input type="text" class="form-control" id="input_" placeholder="<?php echo $interface_system[18]; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="input_" class="col-sm-2 control-label"><?php echo $interface_system[19]; ?></label>
					<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
						 <input type="text" class="form-control" id="input_" placeholder="<?php echo $interface_system[19]; ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Войти</button>
					</div>
				</div>
			</form>
		</section>
<?php
/*
  `content_language` varchar(2) NOT NULL,
  `content_year` varchar(4) NOT NULL,
  `content_author` varchar(255) NOT NULL,
  `content_title` varchar(255) NOT NULL,
  `content_annotation` text NOT NULL,
  `content_bibliography` text NULL,
  `content_description` varchar(255) NOT NULL,
  `content_keywords` varchar(500) NOT NULL,
  `content_url` varchar(255) NOT NULL,
  `content_img` varchar(255) NOT NULL,
*/
?>
