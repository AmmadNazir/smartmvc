<?php

// DATABASE Connection 
// it will run on version php 5 +
    
    // define you db type is importent like you are using which type of DATABASE type like mysql,mssql,pqsql, etc....
    // if not working then your server is not support PDO mysql go to your php.ini file !!! 
    define('DB_TYPE', 'mysql'); // database ADOPTER
    // by default it runs 'localhost' if you are using port it dose't metter if you are using online server give it just IP
    // remember your local ip is always '127.0.0.1' if you write this one it will work ;)
    define('DB_HOST', 'localhost'); 
    // here your main DATABASE name type it correct
    define('DB_NAME', 'mvc');
    // database user name if you are using 'localhost' then its 'root' by default
    define('DB_USER', 'root');
    // database password if you are using 'localhost' then its null
    define('DB_PASS', '5131676');