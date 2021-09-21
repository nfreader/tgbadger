<?php
session_start();
define('DME_DIR', '/usr/src/myapp/tg');
define('DME', DME_DIR."/tgstation.dme");
define('ICON_DIR', DME_DIR."/icons");

define('OUTPUT_DIR', '/usr/src/myapp/public/icons');

if (!defined('PASSWORD')) {
    define('PASSWORD', false);
}
