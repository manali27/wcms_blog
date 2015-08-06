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

		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="well well-lg">
						<?php
							$query1 = "SELECT * FROM ".$tableprefix."post WHERE userid=1 AND postid=".$_GET['postid']."";
							$result = mysql_query($query1);
						
							while($row = mysql_fetch_array($result)) {
						
							echo "<h1>".$row["title"]."</h1>";

							echo "<p>".html_entity_decode($row["content"],ENT_QUOTES)."</p>";
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>