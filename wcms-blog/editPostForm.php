<?php
    require_once("includes/dbconnection.inc.php");

    $con = getConnection($host,$dbuser,$dbpass,$dbname);   

    $postid = $_GET["postid"];

    $query = "SELECT * FROM ".$tableprefix."post where postid=".$postid;
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);    
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Edit Post Form</title>
	</head>
	<body>

		<!-- Navbar -->
		<?php include_once("includes/header.inc.php"); ?>
		<!-- ./Navbar -->
		
		<div class="container">
			<div class="row">

				<!-- First Div -->
				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2"></div>
				<!-- ./First Div -->

				<!-- Second Div -->
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
					<div id="main-div">
						<h2><b>Edit Post</b></h2>
						<form name="editPost-form" id="editPost-form" action="editPost.php" method="post">

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

							<div style="display: none;" id="dangeralert" class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <ul id="errorlog">
                                	<?php
                                        //session_start();
                                        if(isset($_SESSION["error"])) {
                                            echo $_SESSION["error"];
                                            unset($_SESSION["error"]);
                                            session_destroy();
                                        }                                       
                                    ?>
                                </ul>
                            </div>

                            
                            <div class="form-group col-xs-6 col-sm-6 col-md-4 col-lg-6" style="padding-left: 0px;">
                                <input type="text" name="date" class="form-control" style="font-weight: bold;" value="Date:&nbsp;&nbsp; <?php echo date('dS F Y'); ?>" readonly />
                            </div>
                            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding-right: 0px;">
                                <input type="text" name="date" class="form-control" style="font-weight: bold;" value="Time:&nbsp;&nbsp; <?php echo date('h:i A'); ?>" readonly />
                            </div>

                            <div class="form-group" id="postid-div">
                                <label for="postid" class="sr-only">Post ID</label>
                                <input type="hidden" name="postid" id="postid" class="form-control" value="<?php echo $postid; ?>" />                            
                            </div>

                            <div class="form-group" id="title-div">
                                <label for="title" class="sr-only">Title</label>
                                <input type="text" name="title" class="form-control input-lg" id="title" placeholder="Enter post title" value="<?php echo $row['title']; ?>" />
                                <span for="title" class="help-block" id="error-msg-title" style="display: none;">This field is required</span>
                            </div> 

                            <div class="form-group" id="content-div">
                                <label for="edit-editor" class="sr-only">Content</label>                               
                                <div id="edit-editor">
                                    <?php echo html_entity_decode($row["content"],ENT_QUOTES); ?>
                                </div>
                                <span for="editor" class="help-block" id="error-msg-content" style="display: none;">This field is required</span>
                            </div> 

                            <div class="form-group" id="timestamp-div">
                                <label for="timestamp" class="sr-only">Timestamp</label>
                                <input type="hidden" name="timestamp" id="timestamp" class="form-control" value="<?php echo date('Y-m-d H:i:s'); ?>" />                           	
                            </div>

                            <hr/>

                            <h4><b>Enter your credentials:</b></h4>

                            <div class="form-group" id="email-div">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email"/>
                                <span for="email" class="help-block" id="error-msg-email" style="display: none;">This field is required</span>
                            </div> 

                            <div class="form-group" id="password-div">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password"/>
                                <span for="password" class="help-block" id="error-msg-password" style="display: none;">This field is required</span>
                            </div> 

                            <button type="submit" class="btn btn-success btn-block" id="edit-btn">Update</button>

						</form>
					</div>					
				</div>
				<!-- ./Second Div -->

				<!-- Third Div -->
				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2"></div>
				<!-- ./Third Div -->

			</div>			
		</div>
	</body>
</html>
