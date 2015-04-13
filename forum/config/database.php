<?php
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
| NOTE: For MySQL and MySQLi databases, this setting is only used
| as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
| (and in table creation queries made with DB Forge).
| There is an incompatibility in PHP with mysql_real_escape_string() which
| can make your site vulnerable to SQL injection if you are using a
| multi-byte character set and are running versions lower than these.
| Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
 **---------------------------------------------------------*
    | DB_TYPE is Defined that what type of you database using
    | DB_HOST is Defined that where your host is by Default its localhost   
    | DB_NAME is Defined that your database name
    | DB_USER is Defined that your database user name
    | DB_PASS is Defined that your database password
 *------------------------------------------------------------*
 */
define('DB_TYPE', 'mysql'); 
define('DB_HOST', 'localhost');
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASS', '');
