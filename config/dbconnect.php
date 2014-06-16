<?php
	$hostname = 'localhost';
	$username = "root";
	$password = "407";
	$dbname = "lbgonline_dev";

	$table_name_flats = "flats";
	$table_name_students = "students";
	$table_name_applications = "applications";
	$table_name_admins = "lbg_admins";

	$db = new PDO('mysql:host=localhost;dbname=lbgonline_dev;charset=utf8',"$username","$password");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

?>
