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
					<form id="editPostList-form" name="editPostList-form" action="deletePost.php" method="post">
						<?php 
                        	session_start();
                        	if(isset($_SESSION["success"])): ?>
								<div style="" id="successalert" class="alert alert-success alert-dismissable">
                            		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            		<span id="successlog">
                               			<?php
                                			echo $_SESSION["success"];
                                			unset($_SESSION["success"]);
                                			session_destroy();
                        				?>
                            		</span>
                        		</div>
                    	<?php endif; ?>

						<div class="table-responsive">
						  	<table class="table table-striped table-bordered">
						  		<thead style="text-align: center;">
							  		<tr>
							  			<th style="text-align: center;">POSTS</th>
							  			<th style="text-align: center;">AUTHOR</th>
							  			<th style="text-align: center;">DATE</th>
							  			<th style="text-align: center;">EDIT POST</th>
							  			<th style="text-align: center;"><input type="submit" class="btn btn-default" value="DELETE" /></th>
							  		</tr>
							  	</thead>
							  	<tbody>
								<?php
									$query1 = "SELECT a.postid,a.created_time,a.title,a.userid,b.author FROM ".$tableprefix."post a, ".$tableprefix."user b WHERE a.userid=1 AND a.userid = b.userid ORDER BY created_time DESC";
									$result = mysql_query($query1);
									
									while($row = mysql_fetch_array($result)) {
								?>
									<tr>
										<td><?php echo $row["title"]; ?></td>
										<td><?php echo $row["author"]; ?></td>
										<td><?php echo date("dS F Y", strtotime($row["created_time"])); ?></td>
										<td style="text-align: center;"><a class="btn btn-primary" href="editPostForm.php?postid=<?php echo $row['postid']; ?>">EDIT</a></td>
										<td style="text-align: center;"><input type="checkbox" name="deletePosts[]" value="<?php echo $row['postid']; ?>" /></td>
									</tr>

								<?php } ?>
								</tbody>
						  	</table>
						</div>
					</form>				
				</div>
			</div>
		</div>

	</body>
</html>