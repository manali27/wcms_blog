<?php
	$host="localhost";
	$dbuser="manali";
	$dbpass="password";
	$dbname="wcms_blog";
	$tableprefix="blog_";
	
	function getConnection($host,$dbuser,$dbpass,$dbname){
		$con=mysql_connect($host,$dbuser,$dbpass);
		if($con){
			if(mysql_select_db($dbname,$con)){
			}
			else{
				die("Cannot select database");
			}
		}
		else{
			die("Cannot connect to database");
		}
		return $con;
	}
?>
