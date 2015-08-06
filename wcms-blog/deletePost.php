<?php
	require_once("includes/dbconnection.inc.php");
	
	$con = getConnection($host,$dbuser,$dbpass,$dbname);

	if(!empty($_POST["deletePosts"])) {
		$posts = $_POST["deletePosts"];

		$data = implode(',', $posts);
		
	 	$query = "DELETE FROM ".$tableprefix."post WHERE postid IN (".$data.")";

	 	if(mysql_query($query)) {
	 		session_start();
			$_SESSION["success"] = "Posts are deleted";
			header('Location: editPostList.php');
	 	}
	 	else {
	 		die("Posts could not be deleted");
	 	}
	}

?>