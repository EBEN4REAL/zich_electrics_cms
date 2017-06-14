<?php


$db['db_host'] = "localhost";
$db['db_username'] = "root";
$db['db_password'] = "";
$db['db_name'] = "cms_system_2";

foreach ($db as $key => $value) {
	# code...
	define(strtoupper($key), $value );
}
                              //server    //username
$connection = mysqli_connect(DB_HOST , DB_USERNAME , DB_PASSWORD , DB_NAME);

if ($connection) {
	# code...
	
}
else{
	;
}









?>