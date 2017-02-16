<?php
	require_once 'connect.php';
?>

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
				<h1 class="text-center">Faces</h1>
				<span id="menu-button" class="glyphicon glyphicon-menu-hamburger btn btn-default pull-right"></span>
				<span class="clearfix"></span>
			</div>
			<div id="navigation" class="col-sm-offset-1 col-sm-10">
				<ul class="nav nav-tabs nav-justified">
					<li class="active"><a href="faces.php">Faces</a></li>
					<li><a href="uploads.php">Upload</a></li>
				</ul>
			</div>
			<div id="content" class="col-sm-offset-1 col-sm-10">

			<?php
				$sql = "SELECT title, comments, picture, face FROM faces ORDER BY picture DESC";
				$result = mysqli_query($db, $sql);

				if (!$result) {
					echo "Error trying to obtain the pictures " . mysqli_error();
					exit;
				}

				if (mysqli_num_rows($result) == 0) {
					echo "No pictures found!";
					exit;
				}

				while ($row = mysqli_fetch_assoc($result)) {
					$str = $row['face'];
					$json = json_decode($str, true);
					$size = getimagesize("../images/" . $row['picture']);

					echo '
						<div class="col-md-12 panel">
							<div class="col-md-7">
								<img class="pic" src="../images/' . $row['picture'] . '">';

					foreach ($json as $person) {
						if (isset($person['faceAttributes'])) {
							if (isset($person['faceAttributes']['gender'])) {
								$gender = "Gender: " . $person['faceAttributes']['gender'] . "<br>";
							}
							else {
								$gender = "";
							}

							if (isset($person['faceAttributes']['age'])) {
								$age = "Age: " . $person['faceAttributes']['age'] . "<br>";
							}
							else {
								$age =  "";
							}
							if (isset($person['faceAttributes']['smile'])) {
								$smile = $person['faceAttributes']['smile'] * 100;
								if ($smile > 30) {
									$smile = "Smiling";
								}
								else {
									$smile = "Not Smiling";
								}
							}
							else {
								$smile = "";
							}

						}

						if (isset($person['faceRectangle'])) {
							if (isset($person['faceRectangle']['top'])) {
								$persontop = $person['faceRectangle']['top'];								
							}
							if (isset($person['faceRectangle']['left'])) {
								$personleft = $person['faceRectangle']['left'];
							}
							if (isset($person['faceRectangle']['width'])) {
								$personwidth = $person['faceRectangle']['width'];
							}
							if (isset($person['faceRectangle']['height'])) {
								$personheight = $person['faceRectangle']['height'];
							}
						}

						$persontop = $persontop * 100 / $size[1];
						$personleft = $personleft * 100 / $size[0];
						$square_width = $personwidth * 100 / $size[0];
						$square_height = $personheight * 100 / $size[1];

						echo '<div style="position: absolute; 
								border: 2px solid #40CC49; 
								width: ' . $square_width . '%; 
								height: ' . $square_height . '%;
								top: ' . $persontop .'%;
								left: ' . $personleft . '%;">
							</div>';

						$details = $persontop + $square_height;
						echo '<div style="position: absolute; 
								top: ' . $details .'%;
								left: ' . $personleft . '%;
								color: #40CC49"><strong>';
						print_r($gender);
						print_r($age);
						print_r($smile);
						echo '</strong></div>';
					}

					echo '</div>
							<div class="col-sm-5">
								<h3>Title</h3>
								<p>' . $row['title'] . '</p>
								<h3>Comments</h3>
								<p>' . $row['comments'] . '</p>
							</div>
						</div>';
				}
			?>
			</div>
		</div>
	</div>
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