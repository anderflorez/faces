<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
	<meta name="description" content="Faces">
	<meta name="author" content="Anderson Florez">
	<title>Faces</title>

	<!-- Bootstrap Core CSS -->
	<link rel="stylesheet" type="text/css" 
		href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
		integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
		crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="../css/faces.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div id="title" class="col-sm-offset-1 col-sm-10">
				<h1 class="text-center">Upload</h1>
				<span id="menu-button" class="glyphicon glyphicon-menu-hamburger btn btn-default pull-right"></span>
				<span class="clearfix"></span>
			</div>
			<div id="navigation" class="col-sm-offset-1 col-sm-10 col-xs-offset-0">
				<ul class="nav nav-tabs nav-justified">
					<li><a href="faces.php">Faces</a></li>
					<li class="active"><a href="uploads.php">Upload</a></li>
					<li><a href="search.php">Search</a></li>
				</ul>
			</div>
			<div id="content" class="col-sm-offset-1 col-sm-10">
				<form class="form-horizontal" action="uploads.php" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-sm-2 control-label" for="pictitle">Title</label>
						<div class="col-sm-9">
						<input type="text" name="pictitle" id="pictitle" 
							class="form-control" placeholder="Picture Title">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="comments">Comments</label>
						<div class="col-sm-9">
						<input type="text" name="comments" id="comments" 
							class="form-control" placeholder="Comments">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-4">
							<input type="file" accept="image/*" name="picture" id="picture">
						</div>
						<div class="col-sm-offset-3 col-sm-1">
							<input type="submit" name="upload" id="upload" class="btn btn-default">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php
		if (isset($_POST['upload'])) {
			if ($_POST['pictitle']) {
				$title = filter_var($_POST['pictitle'], FILTER_SANITIZE_STRING);
			}
			else {
				$title = "none";
			}

			if ($_POST['comments']) {
				$comments = filter_var($_POST['comments'], FILTER_SANITIZE_STRING);
			}
			else {
				$comments = "none";
			}

			$filename = $_SERVER['REQUEST_TIME'] . '.jpg';

			if ($_FILES) {
				$dest_folder = "../images/";
				move_uploaded_file($_FILES['picture']['tmp_name'], $dest_folder . $filename);
			}
		}
	?>

	<!-- JQuery -->
	<script type="text/javascript" 
			src="https://code.jquery.com/jquery-3.1.1.min.js"
			integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
			crossorigin="anonymous">
	</script>

	<!-- Bootstrap Core JavaScript -->
	<script type="text/javascript"
			src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
			integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
			crossorigin="anonymous">
	</script>

	<!-- Custome JavaScript -->
	<script type="text/javascript" src="../js/faces.js"></script>
</body>
</html>