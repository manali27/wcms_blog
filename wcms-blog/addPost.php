<?php
	require_once("includes/dbconnection.inc.php");
	
	$title = $_POST["title"];
	$content = $_POST["content"];
	$timestamp = $_POST["timestamp"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	
	$con = getConnection($host,$dbuser,$dbpass,$dbname);
	
	$query1 = "SELECT * FROM ".$tableprefix."user where userid=1";
	
	$result = mysql_query($query1);
	
	$row = mysql_fetch_array($result);
	
	if($email == $row["email"] && md5($password) == $row["password"]) {
		
		$query2 = "INSERT INTO ".$tableprefix."post VALUES(NULL,".$row[0].",'".$timestamp."','".$title."','".htmlentities($content,ENT_QUOTES)."')";

		if(mysql_query($query2)){
			session_start();
			$_SESSION["success"] = "Post published";
			header('Location: createPostForm.php');
			//echo "Post created";
		}
		else{
			die("Post could not be created");
		}
	}
	else {
		session_start();
    	$_SESSION["error"] = "<li>Invalid email or password</li>";
    	header('Location: createPostForm.php');
	}
?>
