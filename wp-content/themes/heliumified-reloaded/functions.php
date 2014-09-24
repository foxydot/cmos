<?php

define('PADD_THEME_NAME', 'Heliumified Reloaded');
define('PADD_THEME_VERS', '1.0');
define('PADD_THEME_SLUG', 'heliumified-reloaded');
define('PADD_THEME_SYMB', 'He 2');
define('PADD_NAME_SPACE', 'padd');
define('PADD_LOOP_THUMB_W', 515);
define('PADD_LOOP_THUMB_H', 210);
define('PADD_THEME_FWVER','4.0.0');

define('PADD_THEME_PATH', get_template_directory());
define('PADD_FUNCT_PATH', PADD_THEME_PATH . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR);

require ABSPATH . 'wp-includes' . DIRECTORY_SEPARATOR . 'class-feed.php';
require ABSPATH . 'wp-includes' . DIRECTORY_SEPARATOR . 'class-simplepie.php';

require PADD_FUNCT_PATH . 'class-option.php';
require PADD_FUNCT_PATH . 'class-socialnetwork.php';
require PADD_FUNCT_PATH . 'class-socialbookmark.php';
require PADD_FUNCT_PATH . 'class-twitter.php';
require PADD_FUNCT_PATH . 'class-pagination.php';
require PADD_FUNCT_PATH . 'class-input.php';
require PADD_FUNCT_PATH . 'class-widgets.php';

require PADD_THEME_PATH . DIRECTORY_SEPARATOR . 'administration' . DIRECTORY_SEPARATOR . 'options-functions.php';

require PADD_FUNCT_PATH . 'defaults.php';
require PADD_FUNCT_PATH . 'functions.php';
require PADD_FUNCT_PATH . 'hooks.php';
require PADD_FUNCT_PATH . 'setup.php';
require PADD_FUNCT_PATH . 'prelude.php';
