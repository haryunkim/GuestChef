<?php
session_start();

if ( !isset($_SESSION['logged_in']) || !$_SESSION['logged_in'] ) {
	header('Location: home.php');
}

if ( !isset($_GET['user_id']) || empty($_GET['user_id'])
		|| !isset($_GET['recipe_id']) || empty($_GET['recipe_id']) ) {
	header('location:profile.php?error2');
} else {

	require 'config/config.php';

	// DB Connection
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if ( $mysqli->connect_errno ) {
		echo $mysqli->connect_error;
		exit();
	}

	$mysqli->set_charset('utf8');


	$sql = "DELETE FROM savedRecipes
					WHERE user_id = " . $_SESSION["user_id"] . " AND recipe_id = " . $_GET["recipe_id"] .";";

	// echo "<hr>" . $sql . "<hr>";

	$results = $mysqli->query($sql);
	if ( !$results ) {
		echo $mysqli->error;
		exit();
	}

	$mysqli->close();

  header("location:profile.php?success2");
}
?>
