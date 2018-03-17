<?php
// Переменные соединения
include('vars.inc');

// Create connection
$db = mysqli_connect ($servername, $username, $password, $database);

// Test connection
if (mysqli_connect_errno()) {
    printf("No connection: %s\n", mysqli_connect_error());
    exit();
}

// CREATE REFERENCE TABLES ------------------------------------

// Create table `system_dictionary`
$query = "CREATE TABLE IF NOT EXISTS `system_dictionary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `de` varchar(50) NOT NULL,
  `en` varchar(50) NOT NULL,
  `fr` varchar(50) NOT NULL,
  `it` varchar(50) NOT NULL,
  `pl` varchar(50) NOT NULL,
  `ru` varchar(50) NOT NULL,
  `sp` varchar(50) NOT NULL,
  `ua` varchar(50) NOT NULL,
  INDEX (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
//mysqli_query($db, $query) or die(mysql_error());
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'system_dictionary'.<br>");
} else {
	printf("Not create table 'system_dictionary'.<br>");
}


// Create table `languages`
$query = "CREATE TABLE IF NOT EXISTS `languages` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_symbol` varchar(2) NOT NULL,
  `language_name` varchar(50) NOT NULL,
  INDEX (`language_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
//mysqli_query($db, $query) or die(mysql_error());
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'languages'.<br>");
} else {
	printf("Not create table 'languages'.<br>");
}

// Create table 'directions'
$query = "CREATE TABLE IF NOT EXISTS `directions` (
  `direction_id` int(11) NOT NULL,
  `direction_de` varchar(100) NOT NULL,
  `direction_en` varchar(100) NOT NULL,
  `direction_fr` varchar(100) NOT NULL,
  `direction_it` varchar(100) NOT NULL,
  `direction_pl` varchar(100) NOT NULL,
  `direction_ru` varchar(100) NOT NULL,
  `direction_sp` varchar(100) NOT NULL,
  `direction_ua` varchar(100) NOT NULL,
  `direction_description_de` varchar(100) NOT NULL,
  `direction_description_en` varchar(100) NOT NULL,
  `direction_description_fr` varchar(100) NOT NULL,
  `direction_description_it` varchar(100) NOT NULL,
  `direction_description_pl` varchar(100) NOT NULL,
  `direction_description_ru` varchar(100) NOT NULL,
  `direction_description_sp` varchar(100) NOT NULL,
  `direction_description_ua` varchar(100) NOT NULL,
  INDEX (`direction_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;";
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'directions'.<br>");
} else {
	printf("Not create table 'directions'.<br>");
}

// Create table 'direction_aside'
$query = "CREATE TABLE IF NOT EXISTS `direction_aside` (
  `direction_aside_id` int(11) NOT NULL,
  `direction_aside_de` varchar(100) NOT NULL,
  `direction_aside_en` varchar(100) NOT NULL,
  `direction_aside_fr` varchar(100) NOT NULL,
  `direction_aside_it` varchar(100) NOT NULL,
  `direction_aside_pl` varchar(100) NOT NULL,
  `direction_aside_ru` varchar(100) NOT NULL,
  `direction_aside_sp` varchar(100) NOT NULL,
  `direction_aside_ua` varchar(100) NOT NULL,
  `direction_description_aside_de` varchar(100) NOT NULL,
  `direction_description_aside_en` varchar(100) NOT NULL,
  `direction_description_aside_fr` varchar(100) NOT NULL,
  `direction_description_aside_it` varchar(100) NOT NULL,
  `direction_description_aside_pl` varchar(100) NOT NULL,
  `direction_description_aside_ru` varchar(100) NOT NULL,
  `direction_description_aside_sp` varchar(100) NOT NULL,
  `direction_description_aside_ua` varchar(100) NOT NULL,
  INDEX (`direction_aside_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;";
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'direction_aside'.<br>");
} else {
	printf("Not create table 'direction_aside'.<br>");
}

// Create table 'direction_subaside'
$query = "CREATE TABLE IF NOT EXISTS `direction_subaside` (
  `direction_subaside_id` int(11) NOT NULL AUTO_INCREMENT,
  `direction_aside_id` int(11) NOT NULL,
  `direction_subaside_numb` int(11) NOT NULL,
  `direction_subaside_de` varchar(100) NOT NULL,
  `direction_subaside_en` varchar(100) NOT NULL,
  `direction_subaside_fr` varchar(100) NOT NULL,
  `direction_subaside_it` varchar(100) NOT NULL,
  `direction_subaside_pl` varchar(100) NOT NULL,
  `direction_subaside_ru` varchar(100) NOT NULL,
  `direction_subaside_sp` varchar(100) NOT NULL,
  `direction_subaside_ua` varchar(100) NOT NULL,
  `direction_description_subaside_de` varchar(100) NOT NULL,
  `direction_description_subaside_en` varchar(100) NOT NULL,
  `direction_description_subaside_fr` varchar(100) NOT NULL,
  `direction_description_subaside_it` varchar(100) NOT NULL,
  `direction_description_subaside_pl` varchar(100) NOT NULL,
  `direction_description_subaside_ru` varchar(100) NOT NULL,
  `direction_description_subaside_sp` varchar(100) NOT NULL,
  `direction_description_subaside_ua` varchar(100) NOT NULL,
  INDEX (`direction_subaside_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'direction_subaside'.<br>");
} else {
	printf("Not create table 'direction_subaside'.<br>");
}

// Create table 'direction_subaside_title'
$query = "CREATE TABLE IF NOT EXISTS `direction_subaside_title` (
  `direction_subaside_title_id` int(11) NOT NULL AUTO_INCREMENT,
  `direction_aside_id` int(11) NOT NULL,
  `direction_subaside_numb` int(11) NOT NULL,
  `direction_subaside_title_de` varchar(100) NOT NULL,
  `direction_subaside_title_en` varchar(100) NOT NULL,
  `direction_subaside_title_fr` varchar(100) NOT NULL,
  `direction_subaside_title_it` varchar(100) NOT NULL,
  `direction_subaside_title_pl` varchar(100) NOT NULL,
  `direction_subaside_title_ru` varchar(100) NOT NULL,
  `direction_subaside_title_sp` varchar(100) NOT NULL,
  `direction_subaside_title_ua` varchar(100) NOT NULL,
  INDEX (`direction_subaside_title_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'direction_subaside_title'.<br>");
} else {
	printf("Not create table 'direction_subaside_title'.<br>");
}

// Create table 'content_status'
$query = "CREATE TABLE IF NOT EXISTS `content_status` (
  `content_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `content_status_de` varchar(100) NOT NULL,
  `content_status_en` varchar(100) NOT NULL,
  `content_status_fr` varchar(100) NOT NULL,
  `content_status_it` varchar(100) NOT NULL,
  `content_status_pl` varchar(100) NOT NULL,
  `content_status_ru` varchar(100) NOT NULL,
  `content_status_sp` varchar(100) NOT NULL,
  `content_status_ua` varchar(100) NOT NULL,
  INDEX (`content_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'content_status'.<br>");
} else {
	printf("Not create table 'content_status'.<br>");
}

// Create table 'content_types'
$query = "CREATE TABLE IF NOT EXISTS `content_types` (
  `content_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `content_type_de` varchar(100) NOT NULL,
  `content_type_en` varchar(100) NOT NULL,
  `content_type_fr` varchar(100) NOT NULL,
  `content_type_it` varchar(100) NOT NULL,
  `content_type_pl` varchar(100) NOT NULL,
  `content_type_ru` varchar(100) NOT NULL,
  `content_type_sp` varchar(100) NOT NULL,
  `content_type_ua` varchar(100) NOT NULL,
  INDEX (`content_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'content_types'.<br>");
} else {
	printf("Not create table 'content_types'.<br>");
}

// Create table 'content_categories'
$query = "CREATE TABLE IF NOT EXISTS `content_categories` (
  `content_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `direction_id` int(11) NOT NULL,
  `content_category_de` varchar(100) NOT NULL,
  `content_category_en` varchar(100) NOT NULL,
  `content_category_fr` varchar(100) NOT NULL,
  `content_category_it` varchar(100) NOT NULL,
  `content_category_pl` varchar(100) NOT NULL,
  `content_category_ru` varchar(100) NOT NULL,
  `content_category_sp` varchar(100) NOT NULL,
  `content_category_ua` varchar(100) NOT NULL,
  INDEX (`content_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'content_categories'.<br>");
} else {
	printf("Not create table 'content_categories'.<br>");
}

// Create table 'content_authors'
$query = "CREATE TABLE IF NOT EXISTS `content_authors` (
  `content_author_id` int(11) NOT NULL AUTO_INCREMENT,
  `content_author_name_de` varchar(255) NOT NULL,
  `content_author_name_en` varchar(255) NOT NULL,
  `content_author_name_fr` varchar(255) NOT NULL,
  `content_author_name_it` varchar(255) NOT NULL,
  `content_author_name_pl` varchar(255) NOT NULL,
  `content_author_name_ru` varchar(255) NOT NULL,
  `content_author_name_sp` varchar(255) NOT NULL,
  `content_author_name_ua` varchar(255) NOT NULL,
  `content_author_surname_de` varchar(255) NOT NULL,
  `content_author_surname_en` varchar(255) NOT NULL,
  `content_author_surname_fr` varchar(255) NOT NULL,
  `content_author_surname_it` varchar(255) NOT NULL,
  `content_author_surname_pl` varchar(255) NOT NULL,
  `content_author_surname_ru` varchar(255) NOT NULL,
  `content_author_surname_sp` varchar(255) NOT NULL,
  `content_author_surname_ua` varchar(255) NOT NULL,
  `content_author_reg_date` datetime NULL,
  INDEX (`content_author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'content_authors'.<br>");
} else {
	printf("Not create table 'content_authors'.<br>");
}

// Create table 'content_author_data'
$query = "CREATE TABLE IF NOT EXISTS `content_author_data` (
  `content_author_data_id` int(11) NOT NULL AUTO_INCREMENT,
  `content_author_id` int(11) NOT NULL,
  `content_author_born` varchar(10) NULL,
  `content_author_death` varchar(10) NULL,
  `content_author_url` varchar(255) NULL,
  `content_author_img_id` int(11) NULL,
  `content_author_data_reg_date` datetime NULL,
  INDEX (`content_author_data_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'content_author_data'.<br>");
} else {
	printf("Not create table 'content_author_data'.<br>");
}
/*
ALTER TABLE  `content_author_data` ADD INDEX (  `content_author_id` ) ;
ALTER TABLE  `content_author_data` ADD FOREIGN KEY (  `content_author_id` ) REFERENCES  `sense_holes`.`content_authors` ( `content_author_id` ) ON DELETE CASCADE ON UPDATE CASCADE ;

*/

// Create table 'content_author_keywords'
$query = "CREATE TABLE IF NOT EXISTS `content_author_keywords` (
  `content_author_keywords_id` int(11) NOT NULL AUTO_INCREMENT,
  `content_author_id` int(11) NOT NULL,
  `content_author_keywords_de` varchar(500) NOT NULL,
  `content_author_keywords_en` varchar(500) NOT NULL,
  `content_author_keywords_fr` varchar(500) NOT NULL,
  `content_author_keywords_it` varchar(500) NOT NULL,
  `content_author_keywords_pl` varchar(500) NOT NULL,
  `content_author_keywords_ru` varchar(500) NOT NULL,
  `content_author_keywords_sp` varchar(500) NOT NULL,
  `content_author_keywords_ua` varchar(500) NOT NULL,
  `content_author_keywords_reg_date` datetime NULL,
  INDEX (`content_author_keywords_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'content_author_keywords'.<br>");
} else {
	printf("Not create table 'content_author_keywords'.<br>");
}

// Create table 'content_author_description'
$query = "CREATE TABLE IF NOT EXISTS `content_author_description` (
  `content_author_description_id` int(11) NOT NULL AUTO_INCREMENT,
  `content_author_id` int(11) NOT NULL,
  `content_author_description_de` varchar(255) NOT NULL,
  `content_author_description_en` varchar(255) NOT NULL,
  `content_author_description_fr` varchar(255) NOT NULL,
  `content_author_description_it` varchar(255) NOT NULL,
  `content_author_description_pl` varchar(255) NOT NULL,
  `content_author_description_ru` varchar(255) NOT NULL,
  `content_author_description_sp` varchar(255) NOT NULL,
  `content_author_description_ua` varchar(255) NOT NULL,
  `content_author_description_reg_date` datetime NULL,
  INDEX (`content_author_description_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'content_author_description'.<br>");
} else {
	printf("Not create table 'content_author_description'.<br>");
}

// Create table 'content_author_annotation'
$query = "CREATE TABLE IF NOT EXISTS `content_author_annotation` (
  `content_author_annotation_id` int(11) NOT NULL AUTO_INCREMENT,
  `content_author_id` int(11) NOT NULL,
  `content_author_annotation_de` text NULL,
  `content_author_annotation_en` text NULL,
  `content_author_annotation_fr` text NULL,
  `content_author_annotation_it` text NULL,
  `content_author_annotation_pl` text NULL,
  `content_author_annotation_ru` text NULL,
  `content_author_annotation_sp` text NULL,
  `content_author_annotation_ua` text NULL,
  `content_author_annotation_reg_date` datetime NULL,
  INDEX (`content_author_annotation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'content_author_annotation'.<br>");
} else {
	printf("Not create table 'content_author_annotation'.<br>");
}

// Create table 'content_author_biography'
$query = "CREATE TABLE IF NOT EXISTS `content_author_biography` (
  `content_author_biography_id` int(11) NOT NULL AUTO_INCREMENT,
  `content_author_id` int(11) NOT NULL,
  `content_author_biography_de` text NULL,
  `content_author_biography_en` text NULL,
  `content_author_biography_fr` text NULL,
  `content_author_biography_it` text NULL,
  `content_author_biography_pl` text NULL,
  `content_author_biography_ru` text NULL,
  `content_author_biography_sp` text NULL,
  `content_author_biography_ua` text NULL,
  `content_author_biography_reg_date` datetime NULL,
  INDEX (`content_author_biography_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'content_author_biography'.<br>");
} else {
	printf("Not create table 'content_author_biography'.<br>");
}

// Create table 'content_author_image'
$query = "CREATE TABLE IF NOT EXISTS `content_author_image` (
  `content_author_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `content_author_id` int(11) NOT NULL,
  `content_author_image_name` varchar(255) NULL,
  INDEX (`content_author_image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
//mysqli_query($db, $query) or die(mysql_error());
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'content_author_image'.<br>");
}

// ALTER TABLE  `content_author_image` ADD INDEX (  `content_author_id` ) ;
// ALTER TABLE  `content_author_image` ADD FOREIGN KEY (  `content_author_id` ) REFERENCES  `sense_holes`.`content_author_data` ( `content_author_id` ) ON DELETE CASCADE ON UPDATE CASCADE ;

// Create table 'content_new'
$query = "CREATE TABLE IF NOT EXISTS `content_new` (
  `content_new_id` int(11) NOT NULL AUTO_INCREMENT,
  `content_new_de` varchar(100) NOT NULL,
  `content_new_en` varchar(100) NOT NULL,
  `content_new_fr` varchar(100) NOT NULL,
  `content_new_it` varchar(100) NOT NULL,
  `content_new_pl` varchar(100) NOT NULL,
  `content_new_ru` varchar(100) NOT NULL,
  `content_new_sp` varchar(100) NOT NULL,
  `content_new_ua` varchar(100) NOT NULL,
  INDEX (`content_new_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'content_new'.<br>");
} else {
	printf("Not create table 'content_new'.<br>");
}


// CREATE CONTENT TABLES ------------------------------------

// Create table 'contents'
$query = "CREATE TABLE IF NOT EXISTS `contents` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `content_img` varchar(255) NOT NULL,
  `content_author` varchar(255) NOT NULL,
  `content_title` varchar(255) NOT NULL,
  `content_year` varchar(4) NOT NULL,
  `content_annotation` text NOT NULL,
  `content_bibliography` text NULL,
  `content_url` varchar(255) NOT NULL,
  `content_language` varchar(2) NOT NULL,
  `content_description` varchar(255) NOT NULL,
  `content_keywords` varchar(500) NOT NULL,
  `content_reg_date` datetime NULL,
  INDEX (`content_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'contents'.<br>");
} else {
	printf("Not create table 'contents'.<br>");
}

// Create table 'content_relations_direction'
$query = "CREATE TABLE IF NOT EXISTS `content_relations_direction` (
  `content_relation_direction_id` int(11) NOT NULL AUTO_INCREMENT,
  `direction_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  INDEX (`content_relation_direction_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'content_relations_direction'.<br>");
} else {
	printf("Not create table 'content_relations_direction'.<br>");
}

// Create table 'content_relations_status'
$query = "CREATE TABLE IF NOT EXISTS `content_relations_status` (
  `content_relation_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `content_status_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  INDEX (`content_relation_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'content_relations_status'.<br>");
} else {
	printf("Not create table 'content_relations_status'.<br>");
}

// Create table 'content_relations_category'
$query = "CREATE TABLE IF NOT EXISTS `content_relations_category` (
  `content_relation_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `content_category_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  INDEX (`content_relation_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'content_relations_category'.<br>");
} else {
	printf("Not create table 'content_relations_category'.<br>");
}

// Create table 'content_relations_author'
$query = "CREATE TABLE IF NOT EXISTS `content_relations_author` (
  `content_relations_author_id` int(11) NOT NULL AUTO_INCREMENT,
  `content_author_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  INDEX (`content_relations_author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'content_relations_author'.<br>");
} else {
	printf("Not create table 'content_relations_author'.<br>");
}

// Create table 'content_relations_type'
$query = "CREATE TABLE IF NOT EXISTS `content_relations_type` (
  `content_relation_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `content_type_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  INDEX (`content_relation_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'content_relations_type'.<br>");
} else {
	printf("Not create table 'content_relations_type'.<br>");
}


// CREATE ADMINISTRATION TABLES ------------------------------------

// Create table 'user'
$query = "CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_surename` varchar(255) NOT NULL,
  `user_sex` tinyint(1) NOT NULL DEFAULT '0',
  `user_borndate` date NOT NULL,
  `user_status_id` int(2) NOT NULL,
  `user_image_id` int(11) NOT NULL,
  `user_language_id` int(5) NOT NULL DEFAULT '0',
  `user_time_limit` datetime NULL,
  INDEX (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
//mysqli_query($db, $query) or die(mysql_error());
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'user'.<br>");
}

// Create table 'user_image'
$query = "CREATE TABLE IF NOT EXISTS `user_image` (
  `user_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_image_name` varchar(255) NULL,
  INDEX (`user_image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
//mysqli_query($db, $query) or die(mysql_error());
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'user_image'.<br>");
}

// Create table 'group'
$query = "CREATE TABLE IF NOT EXISTS `group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) NOT NULL,
  `group_address_id` int(11) NOT NULL,
  `group_data_begin` date NOT NULL,
  `group_data_end` date NOT NULL,
  INDEX (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
//mysqli_query($db, $query) or die(mysql_error());
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'group'.<br>");
}

// Create table 'group_image'
$query = "CREATE TABLE IF NOT EXISTS `group_image` (
  `group_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `group_image_name` varchar(255) NULL,
  `group_image_title` tinyint(1) NOT NULL DEFAULT '0',
  INDEX (`group_image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
//mysqli_query($db, $query) or die(mysql_error());
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'group_image'.<br>");
}

// Create table 'user_group'
$query = "CREATE TABLE IF NOT EXISTS `user_group` (
  `user_gpoup_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_image_id` int(11) NOT NULL DEFAULT '0',
  `user_address_id` int(11) NOT NULL,
  `user_group_data_begin` date NOT NULL,
  `user_group_data_end` date NULL,
  INDEX (`user_gpoup_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
//mysqli_query($db, $query) or die(mysql_error());
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'user_group'.<br>");
}


/*
// Create table 'reference_state'
$query = "CREATE TABLE IF NOT EXISTS `reference_state` (
  `reference_state_id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_country_id` int(11) NOT NULL,
  `reference_state_name` varchar(100) NOT NULL,
  INDEX (`reference_state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'reference_state'.<br>");
}

// Create table 'reference_town'
$query = "CREATE TABLE IF NOT EXISTS `reference_town` (
  `reference_town_id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_country_id` int(11) NOT NULL,
  `reference_state_id` int(11) NOT NULL,
  `reference_town_name` varchar(100) NOT NULL,
  INDEX (`reference_town_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'reference_town'.<br>");
}

// Create table 'reference_street'
$query = "CREATE TABLE IF NOT EXISTS `reference_street` (
  `reference_street_id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_country_id` int(11) NOT NULL,
  `reference_state_id` int(11) NOT NULL,
  `reference_town_id` int(11) NOT NULL,
  `reference_street_name` varchar(100) NOT NULL,
  INDEX (`reference_street_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'reference_street'.<br>");
}

// Create table 'reference_user_status'
$query = "CREATE TABLE IF NOT EXISTS `reference_user_status` (
  `reference_user_status_id` int(2) NOT NULL AUTO_INCREMENT,
  `reference_user_status_name` varchar(50) NOT NULL,
  INDEX (`reference_user_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
//mysqli_query($db, $query) or die(mysql_error());
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'reference_user_status'.<br>");
}

// CREATE GROUP TABLES ------------------------------------

// Create table 'group'
$query = "CREATE TABLE IF NOT EXISTS `group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) NOT NULL,
  `group_address_id` int(11) NOT NULL,
  `group_data_begin` date NOT NULL,
  `group_data_end` date NOT NULL,
  INDEX (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
//mysqli_query($db, $query) or die(mysql_error());
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'group'.<br>");
}

// Create table 'group_address'
$query = "CREATE TABLE IF NOT EXISTS `group_address` (
  `group_address_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `group_address_post` varchar(50) NOT NULL,
  `reference_country_id` int(11) NOT NULL, 
  `reference_town_id` int(11) NOT NULL, 
  `reference_street_id` int(11) NOT NULL, 
  `group_address_house` varchar(100) NOT NULL,
  `group_address_apartment` varchar(100) NOT NULL,
  `group_address_date_begin` date NOT NULL,
  `group_address_date_end` date NULL,
  `group_address_map` text NOT NULL,
  INDEX (`group_address_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
//mysqli_query($db, $query) or die(mysql_error());
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'group_address'.<br>");
}

// Create table 'group_image'
$query = "CREATE TABLE IF NOT EXISTS `group_image` (
  `group_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `group_image_name` varchar(50) NULL,
  `group_image_title` tinyint(1) NOT NULL DEFAULT '0',
  INDEX (`group_image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
//mysqli_query($db, $query) or die(mysql_error());
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'group_image'.<br>");
}

// CREATE USER TABLES ------------------------------------

// Create table 'user'
$query = "CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_surename` varchar(255) NOT NULL,
  `user_sex` tinyint(1) NOT NULL DEFAULT '0',
  `user_identificator` varchar(25) NOT NULL,
  `user_borndate` date NOT NULL,
  `user_status_id` int(2) NOT NULL,
  `user_image_id` int(11) NOT NULL,
  `user_language_id` int(5) NOT NULL DEFAULT '0',
  `user_time_limit` datetime NULL,
  INDEX (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
//mysqli_query($db, $query) or die(mysql_error());
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'user'.<br>");
}

// Create table 'user_address'
$query = "CREATE TABLE IF NOT EXISTS `user_address` (
  `user_address_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_address_post` varchar(50) NOT NULL,
  `user_address_town` varchar(50) NOT NULL,
  `user_address_street` varchar(100) NOT NULL,
  `user_address_house` varchar(100) NOT NULL,
  `user_address_apartment` varchar(100) NOT NULL,
  `user_address_data_begin` date NOT NULL,
  `user_address_data_end` date NULL,
  INDEX (`user_address_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
//mysqli_query($db, $query) or die(mysql_error());
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'user_address'.<br>");
}

// Create table 'user_image'
$query = "CREATE TABLE IF NOT EXISTS `user_image` (
  `user_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_image_name` varchar(100) NULL,
  INDEX (`user_image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
//mysqli_query($db, $query) or die(mysql_error());
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'user_image'.<br>");
}

// Create table 'user_group'
$query = "CREATE TABLE IF NOT EXISTS `user_group` (
  `user_gpoup_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_image_id` int(11) NOT NULL DEFAULT '0',
  `user_address_id` int(11) NOT NULL,
  `user_group_data_begin` date NOT NULL,
  `user_group_data_end` date NULL,
  INDEX (`user_gpoup_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
//mysqli_query($db, $query) or die(mysql_error());
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'user_group'.<br>");
}

// CREATE WORK TABLES ------------------------------------

// Create table 'initiative'
$query = "CREATE TABLE IF NOT EXISTS `initiative` (
  `initiative_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `initiative_theme` varchar(100) NOT NULL,
  `initiative_ref` int(11) NOT NULL,
  `initiative_content` text NOT NULL,
  `initiative_registration` datetime NOT NULL,
  `initiative_data_begin` date NOT NULL,
  `initiative_data_end` date NOT NULL,
  `initiative_points` int(11) NOT NULL DEFAULT '0',
  `initiative_status` tinyint(1) NOT NULL DEFAULT '0',
  INDEX (`initiative_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
//mysqli_query($db, $query) or die(mysql_error());
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'initiative'.<br>");
}

// Create table 'initiative_attachment'
$query = "CREATE TABLE IF NOT EXISTS `initiative_attachment` (
  `initiative_attachment_id` int(11) NOT NULL AUTO_INCREMENT,
  `initiative_attachment_file` varchar(255) NOT NULL,
  INDEX (`initiative_attachment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
//mysqli_query($db, $query) or die(mysql_error());
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'initiative_attachment'.<br>");
}

// Create table 'initiative_ballot'
$query = "CREATE TABLE IF NOT EXISTS `initiative_ballot` (
  `initiative_ballot_id` int(11) NOT NULL AUTO_INCREMENT,
  `initiative_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `initiative_ballot_yes` date NOT NULL,
  `initiative_ballot_no` date NOT NULL,
  INDEX (`initiative_ballot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
//mysqli_query($db, $query) or die(mysql_error());
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'initiative_ballot'.<br>");
}

// Create table 'initiative_discussion'
$query = "CREATE TABLE IF NOT EXISTS `initiative_discuss` (
  `initiative_discuss_id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `initiatives_id` int(11) NOT NULL,
  `initiative_discuss_refer` int(11) NOT NULL,
  `initiative_discuss_content` varchar(50) NOT NULL,
  `initiative_discuss_data` date NOT NULL,
  INDEX (`initiative_discuss_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
//mysqli_query($db, $query) or die(mysql_error());
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'initiative_discussion'.<br>");
}

// CREATE SYSTEM TABLES ------------------------------------

// Create table `system_division`
$query = "CREATE TABLE IF NOT EXISTS `system_division` (
  `system_division_id` int(11) NOT NULL AUTO_INCREMENT,
  `system_division_name` int(11) NOT NULL,
  INDEX (`system_division_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
//mysqli_query($db, $query) or die(mysql_error());
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'system_division'.<br>");
}

// Create table `system_new`
$query = "CREATE TABLE IF NOT EXISTS `system_new` (
  `users_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `system_division_id` int(11) NOT NULL,
  `system_new_id_mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;";
//mysqli_query($db, $query) or die(mysql_error());
if (mysqli_query($db, $query) === TRUE) {
    printf("Create table 'system_new'.<br>");
}
*/
?>
