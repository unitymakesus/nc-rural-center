<?php 
function db127_add_setting($plugin) {  
	$plugin->setting_start(); 
	$plugin->techlink('https://divibooster.com/changing-hiding-the-select-page-centered-menu-text/'); 
	$plugin->checkbox(__FILE__); ?> Change centered menu "Select Page" text: <?php $plugin->textpicker(__FILE__, 'selectpagetext'); 
	$plugin->setting_end(); 
} 
$wtfdivi->add_setting('header-main', 'db127_add_setting');

