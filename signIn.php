<?php
session_start();
require 'config/config.php';

// If NOT logged in, do the login things.
// Otherwise, redirect user to home page

if( !isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) {
	// Check if user did username/password POST exists
	if ( isset($_POST['username']) && isset($_POST['password']) ) {
		// If username OR password was not filled out
		if ( empty($_POST['username']) || empty($_POST['password']) ) {

			$error = "Please enter username and password.";

		}
		// User filled out username AND password. Need to check that the username/password combination is correct
		else {

			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

			if($mysqli->connect_errno) {
				echo $mysqli->connect_error;
				exit();
			}

			// Hash the password user typed in. Use this hased version to compare it to the pw saved in the DB.
			$passwordInput = hash("sha256", $_POST["password"]);

			// Search the users table, look for the username & pw combo that the user entered
			$sql = "SELECT * FROM users
						WHERE name = '" . $_POST['username'] . "' AND password = '" . $passwordInput . "';";

			echo "<hr>" . $sql . "<hr>";

			$results = $mysqli->query($sql);

			if(!$results) {
				echo $mysqli->error;
				exit();
			}
			// If there is a match, we will get at least one record back
			if($results->num_rows > 0) {
				$_SESSION["user"] = $_POST["username"];
				$_SESSION["logged_in"] = true;
				while ($row = $results->fetch_assoc()) {
					$_SESSION["user_id"] = $row["user_id"];
				}
				// Redirect the logged in user to the home page
				header("Location: home.php");
			}
			else {
				$error = "Invalid username or password.";
			}
		}
	}
}
else {
	// Logged in user will ge redirected
	header("Location: home.php");
}
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">

 <head>
   <meta charset="utf-8" name="viewport" content="width=device-width, user-scalable=yes">
   <title>Sign In</title>
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
   <div class="whole-container">

   <div id="container1">

   <div class="container-fluid">
     <?php include 'nav.php'; ?>
   </div>
   </div>

   <div class="container-fluid" id="container2">
     <div class="row">

     <div class="form-container sign-in-container col-md-6">
       <form action="signIn.php" method="POST">
       <h1>Sign in</h1>
       <div class="inputName" style="width: 100%;">
         <input id = "username" type="text" placeholder="Username" name="username" />
         <small id="username-error" class="invalid-feedback">Username is required.</small>
       </div>
       <div class="inputPassword" style="width: 100%;">
         <input id = "password" type="password" placeholder="Password" name="password"/>
         <small id="username-error" class="invalid-feedback">Password is required.</small>
       </div>
       <button class="regular-btn">Sign In</button>
			 <?php
					if ( isset($error) && !empty($error) ) {
						echo '<br>';
				 		echo '<div class="alert alert-danger">'.$error.'</div>';
					}
			  ?>
   </form>
  </div>
     <div class="form-container sign-up-container col-md-6">
       <h1>New to GuestChef?</h1>
           <p>
               Create an account by clicking below!
           </p>
           <button OnClick="location.href='signUp.php'" class="regular-btn" id="signIn">Sign Up</button>
     </div>
 </div>
 </div>
 <div id="footer">
   <p>© Haryun Kim 2020</p>
 </div>
 <script>
 document.querySelector('form').onsubmit = function(){
   if ( document.querySelector('#username').value.trim().length == 0 ) {
     document.querySelector('#username').classList.add('is-invalid');
   } else {
     document.querySelector('#username').classList.remove('is-invalid');
   }

   if ( document.querySelector('#password').value.trim().length == 0 ) {
     document.querySelector('#password').classList.add('is-invalid');
   } else {
     document.querySelector('#password').classList.remove('is-invalid');
   }

   return ( !document.querySelectorAll('.is-invalid').length > 0 );
 }

 </script>


 </body>

 </html>
