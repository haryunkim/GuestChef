<?php

require 'config/config.php';

// Server-side validation
if ( !isset($_POST['email']) || empty($_POST['email'])
	|| !isset($_POST['name']) || empty($_POST['name'])
	|| !isset($_POST['password']) || empty($_POST['password']) ) {
	$error = "Please fill out all required fields.";
}
else {
	// Connect to database and add this user into our DB
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if($mysqli->connect_errno) {
		echo $mysqli->connect_error;
		exit();
	}

	// Check if username or email already exists in the users table
	$sql_registered = "SELECT * FROM users
	WHERE name = '" . $_POST["name"] . "' OR email = '" . $_POST["email"] ."';";

	$results_registered = $mysqli->query($sql_registered);
	if (!$results_registered) {
		echo $mysqli->error;
		exit();
	}

	if($results_registered->num_rows > 0) {
		// If there is even 1 match in the user table
		$error = "Username or email has already been taken. Please choose another one.";
	}
	else {
		// Hashing passwords
		$password = hash("sha256", $_POST["password"]);
		//$password2 = hash("sha256", "password");

		//echo $password . "<hr>";
		//echo $password2 . "<hr>";

		// Add this user into our DB
		$sql = "INSERT INTO users(name, email, password) VALUES('" . $_POST["name"] ."','"
			. $_POST["email"] . "','" . $password . "');";


		$results = $mysqli->query($sql);
		if(!$results) {
			echo $mysqli->error;
			exit();
		}
	}

	$mysqli->close();
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" name="viewport" content="width=device-width, user-scalable=yes">
  <title>Sign In Confirmation</title>
  <!-- Google fonts used -->
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Dancing+Script&display=swap" rel="stylesheet">

  <!-- css stylesheets -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/signIn.css">

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

		<div class="row mt-4">
			<div class="col-12">
				<?php if ( isset($error) && !empty($error) ) : ?>
					<div class="text-danger"><?php echo $error; ?></div>
				<?php else : ?>
					<div class="text-success"><?php echo $_POST['name']; ?> was successfully registered.</div>
				<?php endif; ?>
		</div>
	</div>

	<div class="row mt-4 mb-4">
		<div class="col-12">
			<a href="signIn.php" role="button" class="btn btn-primary">Sign In</a>
			<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" role="button" class="btn btn-light">Back</a>
		</div>
	</div>

</div>
<div id="footer">
	<p>© Haryun Kim 2020</p>
</div>

</body>
</html>
