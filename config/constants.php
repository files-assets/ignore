<?php

define('BASE_URL', 'http://goph');

define('NAME', 'Mundo GOPH');
define('BRAND_NAME', 'org. GOPH');

define('DATABASE_HOST', 'localhost');
define('DATABASE_NAME', 'goph');
define('DATABASE_USER', 'root');
define('DATABASE_PASS', '');
define('DATABASE_OPTS', [
  PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION
]);

define('EMPTY_GIF', 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7');
