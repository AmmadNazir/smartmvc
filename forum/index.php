<?php
/*
 * Welcome TO SmartMVC is a php mvc Framework v 1.0
 * 
 * 
 * 
 * 
 * Need Help contct ME
 */
$DATABASE_USAGE = TRUE; //TRUE mean Working FALSE is NOT
/*
| -------------------------------------------------------------------
 * 
| DATABASE CONNECTIVITY SETTINGS
 * 
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
 * 
| page of the User Guide .
 * 
| for Setup Database goto  config/DATABASE.php SetUp an Data Base you using
 * 
 */

/******************************
 * 
 * Main Index With Error Handling
 * Important Dont Remove any Thing
 * 
 * ************************/

$NotWorking = '<p style="text-align:center; font-size:20px;background-color: #fff; margin: 40px;font: 13px/20px normal Helvetica, Arial, sans-serif;">Its Just a Demo Without Database<br>if you want to run Database go to Main file <b>(index.php)</b> in Line Number 10 change it to FALSE to TRUE</p>';
/*Loading a path file you ue for other paths*/
require 'config/PATHS.php';
/****************/
/* Mian Database COnfiger File You Set It up in config/Database.php */
$DATABASE = 'config/DATABASE.php';
/******************/

if(file_exists($DATABASE) && $DATABASE_USAGE == TRUE)
    {
        require_once $DATABASE;
    }
elseif($DATABASE_USAGE == FALSE)
    {
        echo $NotWorking; 
        exit();
    }
/*********************************************
||| null if any existing spl function avail able
 ********************************************/
spl_autoload_register(NULL, FALSE);
/*********************************************
||| Load up Extsion
 ********************************************/
spl_autoload_extensions('.php');

/*********************************************
||| StratUp spl auto load function
 * Its Spl Auto Load Class 
 ********************************************/
function libsLoader($class)
{
    $fileName = $class . '.php';
    $folder = LIBS . $fileName;
    if(!file_exists($folder))
    {
        print '<p style="text-align:center; font-size:20px;background-color: #fff; margin: 40px;font: 14px/20px normal Helvetica, Arial, sans-serif;">Some Thing Went Wrong</p>';
        print '<p style="text-align:center; font: 16px/25px normal Helvetica, Arial, sans-serif; color:red;">Files or <b>' .$fileName. '.php</b> Not Here! Look Like file Gone For Walk</p><br>';
        exit();
    }
    include_once $folder;
}
/* Here We Register spl Auoload*/
spl_autoload_register('libsLoader');
/* Initlize Bootstrap Class */
$bootstrap = new Bootstrap();
/**  Start Up Bootstrap Class **/
$bootstrap->init();