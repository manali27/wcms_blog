<?php
	require_once("includes/dbconnection.inc.php");

	$con = getConnection($host,$dbuser,$dbpass,$dbname);		
?>

<!DOCTYPE html>
<html>
	<head>
		<title>View Posts</title>
	</head>
	<body>
		<!-- Navbar -->
		<?php include_once("includes/header.inc.php"); ?>
		<!-- ./Navbar -->
		<form id="viewblog" action="viewSinglePost.php" method="post">
			<input type="hidden" name="postid" id="postid" />
			<input type="hidden" name="title" id="title" />
			<input type="hidden" name="content" id="content" /> 
		</form>

		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

					<?php
						$query1 = "SELECT * FROM ".$tableprefix."post WHERE userid=1 ORDER BY created_time DESC";
						$result = mysql_query($query1);
						
						while($row = mysql_fetch_array($result)) {
					?>

					<div class="panel panel-default" id="post-div">
					  	<div class="panel-heading">
					    	<a href="viewSinglePost.php?postid=<?php echo $row["postid"] ?>" >
					    		<h3 class="panel-title"><b><?php echo $row["title"]; ?></b></h3>
					    	</a>
					  	</div>
					  	<div class="panel-body" id="post-contents">
					    	<?php  echo html_entity_decode($row["content"],ENT_QUOTES); ?>
					  	</div>
					  	<ul class="list-group">
						    <li class="list-group-item">
						    	<span class="glyphicon glyphicon-time" aria-hidden="true" style="padding-right: 5px;"></span>
						    	<?php echo date("dS F Y", strtotime($row["created_time"])); ?>
						    </li>
					  	</ul>
					</div>
					<?php } ?>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<nav>
						<ul class="pager">
				    		<li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Older</a></li>
				    		<li class="next"><a href="#">Newer <span aria-hidden="true">&rarr;</span></a></li>
				  		</ul>
					</nav>
				</div>
			</div>
		</div>
	</body>
</html>