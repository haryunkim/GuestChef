<?php
session_start();

if ( !isset($_POST['name']) || empty($_POST['name']) ) {

	$error = "Input is required.";

} else {
	require 'config/config.php';

	// DB Connection
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if ( $mysqli->errno ) {
		echo $mysqli->error;
		exit();
	}

  // Check if username or email already exists in the users table
	$sql_registered = "SELECT * FROM users
	WHERE name = '" . $_POST["name"] . "';";

	$results_registered = $mysqli->query($sql_registered);
	if (!$results_registered) {
		echo $mysqli->error;
		exit();
	}

	if($results_registered->num_rows > 0) {
		// If there is even 1 match in the user table
		// $error = "Username or email has already been taken. Please choose another one.";
    header('location:changeUsername.php?error');
	}
else {

	$sql = "UPDATE users
					SET name = '" . $_POST['name'] . "'
					WHERE user_id = " . $_SESSION['user_id'] . ";";


	$results = $mysqli->query($sql);
	if ( !$results ) {
		echo $mysqli->error;
		exit();
	}


	$mysqli->close();

}
}
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <!-- Google fonts used -->
     <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Dancing+Script&display=swap" rel="stylesheet">

     <!-- css stylesheets -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <link rel="stylesheet" href="css/restaurants.css">

     <!-- bootstrap -->
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   </head>
   <body>
     <div class="container">
 			<div class="row">
 				<div class="col text-center">
 				<?php if ( isset($error) && !empty($error) ) : ?>
 					<div class="col-12 text-danger"><?php echo $error; ?></div>
 					<button type="button" class="btn btn-primary" OnClick="location.href='recipes.php'">Go Back</button>
 				<?php else : ?>
 					<div class="col-12 text-success"><h6>Your username has been changed to <?php echo $_POST['name'] ?></h6></div>
 					<div class="col-12 mt-3">Please <a href="logout.php">Logout</a> and log back in to finish the process</div>
 				<?php endif; ?>

   </body>
 </html>
