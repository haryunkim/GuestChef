<?php
session_start();

require 'config/config.php';

// DB Connection
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ( $mysqli->connect_errno ) {
	echo $mysqli->connect_error;
	exit();
}

$mysqli->set_charset('utf8');

$sql_inDB = "SELECT * FROM savedRecipes
WHERE user_id = '" . $_SESSION["user_id"] . "' AND recipe_id = '" . $_GET["recipe_id"] ."';";

$results_inDB = $mysqli->query($sql_inDB);
if (!$results_inDB) {
  echo $mysqli->error;
  exit();
}

if($results_inDB->num_rows > 0) {
  // If there is even 1 match in the user table
  $error = "This has already been saved to your profile";
}
else {

  $sql = "INSERT INTO savedRecipes(user_id, recipe_id) VALUES ('" . $_SESSION["user_id"] ."','"
    . $_GET["recipe_id"] . "');";

  $results = $mysqli->query($sql);
  if(!$results) {
    echo $mysqli->error;
    exit();
  }
}

$mysqli->close();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8" name="viewport" content="width=device-width, user-scalable=yes">
    <title>Saved Restaurant</title>
    <!-- Google fonts used -->
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Dancing+Script&display=swap" rel="stylesheet">

    <!-- css stylesheets -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/recipes.css">

    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</head>
	<body>
		<div id="container1">

			<div class="container-fluid">
				<?php include 'nav.php'; ?>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col text-center">
				<?php if ( isset($error) && !empty($error) ) : ?>
					<div class="col-12 text-danger"><?php echo $error; ?></div>
					<button type="button" class="btn btn-primary" OnClick="location.href='recipes.php'">Go Back</button>
				<?php else : ?>
					<div class="col-12 text-success">Successfully added to your profile</div>
					<div class="col-12 mt-3">Check it out in your <a href="profile.php">Profile</a> or <a href="recipes.php">Go Back</a></div>
				<?php endif; ?>

</div>
</div>

</div>
<div id="footer">
	<p>© Haryun Kim 2020</p>
</div>
	</body>
</html>
