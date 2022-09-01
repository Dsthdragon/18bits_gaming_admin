<?php

// Always provide a TRAILING SLASH (/) AFTER A PATH
define('URL', 'http://'.$_SERVER['HTTP_HOST'].'/18bitsadmin/');
define('MAIN_SITE', 'http://'.$_SERVER['HTTP_HOST'].'/18bitsgaming/');
define('LIBS', 'libs/');
define('UTILS', 'util/');
define('NAME', '18bits Gaming');
define('ABOUT', 'Let\'s Have Fun');
define('ROOT',dirname(__FILE__));

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', '18bitsgaming');
define('DB_USER', 'root');
define('DB_PASS', '');

// This is for other hash keys... Not sure yet
define('HASH_GENERAL_KEY', 'rinnaswillruletheworldtomorrowmaybe');

// This is for database passwords only
define('HASH_PASSWORD_KEY', '10-9-8-7-6-5-4-3-2-1hereisrinnasyourall');
