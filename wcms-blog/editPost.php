<?php
	require_once("includes/dbconnection.inc.php");
	
	$postid = $_POST["postid"];
	$title = $_POST["title"];
	$content = $_POST["content"];
	$timestamp = $_POST["timestamp"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	
	$con = getConnection($host,$dbuser,$dbpass,$dbname);
	
	$query1 = "SELECT * FROM ".$tableprefix."user WHERE userid=1";
	
	$result = mysql_query($query1);
	
	$row = mysql_fetch_array($result);
	
	if($email == $row["email"] && md5($password) == $row["password"]) {
		
		$query2 = "UPDATE ".$tableprefix."post SET created_time='".$timestamp."',title='".$title."',content='".htmlentities($content,ENT_QUOTES)."' WHERE postid=".$postid;

		if(mysql_query($query2)){
			session_start();
			$_SESSION["success"] = "Post updated";
			header('Location: editPostForm.php?postid='.$postid);
			//echo "Post created";
		}
		else{
			die("Post could not be updated");
		}
	}
	else {
		session_start();
    	$_SESSION["error"] = "<li>Invalid email or password</li>";
    	header('Location: editPostForm.php?postid='.$postid);
    	return false;
	}
?>
