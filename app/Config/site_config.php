<?php
require_once 'messages.php';
//db config
define('DB_HOST', 'localhost');
define('DB_NAME', 'moneylover');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_PREFIX', '');
//site config

define('BASE_PATH', 'http://localhost/MoneyLover/');

//Social Logins
/*define('FACEBOOK_APP_ID', '496000307258442');
define('FACEBOOK_APP_SECRET', '50daeb49e907be25802c13447859f2c0');
define('FACEBOOK_REDIRECT_URI', 'http://localhost/MoneyLover/facebook_login');*/

//Google App Details
define('GOOGLE_APP_NAME', 'Money Lover');
define('GOOGLE_OAUTH_CLIENT_ID', '69541603314-58s399oeuvm6orrfhueiq5o85n1tspnl.apps.googleusercontent.com');
define('GOOGLE_OAUTH_CLIENT_SECRET', 'wOpialnf0CiGLVR5tTgy0hKZ');
define('GOOGLE_OAUTH_REDIRECT_URI', 'http://localhost/MoneyLover/google_login');
define("GOOGLE_SITE_NAME", 'http://localhost/');
?>
