<?php
	require_once("includes/dbconnection.inc.php");
	
	$con = getConnection($host,$dbuser,$dbpass,$dbname);
	
	$query1 = "Create table IF NOT EXISTS ".$tableprefix."user(userid int PRIMARY KEY AUTO_INCREMENT, author varchar(100),email varchar(254),password varchar(32))";
	
	$query2 = "Create table IF NOT EXISTS ".$tableprefix."post(postid int PRIMARY KEY AUTO_INCREMENT, userid int references ".$tableprefix."user(userid), created_time timestamp, title text, content longtext)";

	if(mysql_query($query1,$con) && mysql_query($query2,$con)){
		echo "Tables are created";
	}
	else{
		die("Could not create tables");
	}
	
	$query3="INSERT INTO ".$tableprefix."user(`userid`, `author`, `email`, `password`) VALUES (NULL, 'Manali', 'manali@gmail.com', MD5('manali')), (NULL, 'Jay', 'jjay@gmail.com', MD5('jayswal'))";
	
	if(mysql_query($query3,$con)){
		echo "User table rows created";
	}
	else{
		die("User table rows could not be created");
	}
?>
