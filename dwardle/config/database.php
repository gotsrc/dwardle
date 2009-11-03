<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the "Database Connection"
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the "default" group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = "production";
$active_record = TRUE;

/* Live Environment Settings */
$db['live']['hostname'] = "localhost";
$db['live']['username'] = "dwardle";
$db['live']['password'] = "3hS6HiMUH1ORNrBVk0Pi4UMu0t9X68Wo";
$db['live']['database'] = "dwardle";
$db['live']['dbdriver'] = "mysqli";
$db['live']['dbprefix'] = "dwl_";
$db['live']['pconnect'] = TRUE;
$db['live']['db_debug'] = TRUE;
$db['live']['cache_on'] = FALSE;
$db['live']['cachedir'] = "";
$db['live']['char_set'] = "utf8";
$db['live']['dbcollat'] = "utf8_general_ci";


/* Production Environment Settings */
$db['production']['hostname'] = "localhost";
$db['production']['username'] = "dwardle";
$db['production']['password'] = "3hS6HiMUH1ORNrBVk0Pi4UMu0t9X68Wo";
$db['production']['database'] = "dwardle_production";
$db['production']['dbdriver'] = "mysqli";
$db['production']['dbprefix'] = "dwl_";
$db['production']['pconnect'] = TRUE;
$db['production']['db_debug'] = TRUE;
$db['production']['cache_on'] = FALSE;
$db['production']['cachedir'] = "";
$db['production']['char_set'] = "utf8";
$db['production']['dbcollat'] = "utf8_general_ci";


/* Test Production Settings */
$db['test']['hostname'] = "localhost";
$db['test']['username'] = "dwardle";
$db['test']['password'] = "3hS6HiMUH1ORNrBVk0Pi4UMu0t9X68Wo";
$db['test']['database'] = "dwardle_test";
$db['test']['dbdriver'] = "mysqli";
$db['test']['dbprefix'] = "dwl_";
$db['test']['pconnect'] = TRUE;
$db['test']['db_debug'] = TRUE;
$db['test']['cache_on'] = FALSE;
$db['test']['cachedir'] = "";
$db['test']['char_set'] = "utf8";
$db['test']['dbcollat'] = "utf8_general_ci";

/* End of file database.php */
/* Location: ./system/application/config/database.php */
