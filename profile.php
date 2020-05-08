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

$user_id = (int)$_SESSION["user_id"];

$sql_restaurants = "SELECT restaurants.name AS restaurant_name, user_id, savedRestaurants.restaurant_id as restaurant_id FROM savedRestaurants
 JOIN restaurants
  ON restaurants.restaurant_id = savedRestaurants.restaurant_id
 WHERE user_id = $user_id";

$sql_recipes = "SELECT recipes.recipe_name AS recipe_name, user_id, savedRecipes.recipe_id as recipe_id FROM savedRecipes
 JOIN recipes
 ON recipes.recipe_id = savedRecipes.recipe_id
 WHERE user_id = $user_id";

$sql_restaurants = $sql_restaurants . ";";

$sql_recipes = $sql_recipes . ";";

$results_restaurants = $mysqli->query($sql_restaurants);

$results_recipes = $mysqli->query($sql_recipes);

if ( $results_restaurants == false ) {
	echo $mysqli->error;
	exit();
}

if ( $results_recipes == false ) {
	echo $mysqli->error;
	exit();
}

$mysqli->close();
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8" name="viewport" content="width=device-width, user-scalable=yes">
     <title>Profile</title>
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
     <div id="container1">

       <div class="container-fluid">
         <?php include 'nav.php'; ?>
       </div>
     </div>

     <div id="container2" style="padding-bottom: 35px;padding-top: 15px; text-align: center;">
       <h1>Welcome <?php echo $_SESSION["user"] ?>!</h1>
       <br>
			 <a href="changeUsername.php">Change Username</a>
			 <br>
       <h2 style="text-align: left">Saved Restaurants</h2>

       <table class="table table-hover table-responsive mt-4">
         <thead>
           <tr>
             <th>Name</th>
             <th></th>
           </tr>
         </thead>
        <tbody>
          <?php while ( $row1 = $results_restaurants->fetch_assoc() ) : ?>
       <tr>
         <td>
					 <a href="restaurantDetails.php?restaurant_id=<?php echo $row1["restaurant_id"]?>">
	 					<?php echo $row1["restaurant_name"]?>
	 				</a>
         </td>
         <td><a href="deleteRestaurant.php?user_id=<?php echo $_SESSION["user_id"]; ?>&restaurant_id=<?php echo $row1["restaurant_id"]?>"
           class="btn btn-outline-danger" onclick="return confirm('You are about to delete <?php echo $row1['restaurant_name']; ?> from your saved list');">
 					Delete
 				</a></td>
       </tr>
        <?php endwhile; ?>
     </tbody>
   </table>
   <?php
      $message = "";
      if(isset($_GET['error'])) {
        $message = "Cannot delete at this time";
        echo '<br />';
        echo '<div style="width: 50%;" class="alert alert-danger">'.$message.'</div>';
      }
      if(isset($_GET['success'])) {
        $message = "Deleted successfully";
        echo '<br />';
        echo '<div style="width: 25%;" class="alert alert-success">'.$message.'</div>';
      }

    ?>
       <br>
       <h2 style="text-align: left;">Saved Recipes</h2>
       <table class="table table-hover table-responsive mt-4">
         <thead>
           <tr>
             <th>Name</th>
             <th></th>
           </tr>
         </thead>
        <tbody>
          <?php while ( $row2 = $results_recipes->fetch_assoc() ) : ?>
       <tr>
         <td>
					 <a href="recipeDetails.php?recipe_id=<?php echo $row2["recipe_id"]?>">
	 					<?php echo $row2["recipe_name"]?>
	 				</a>
         </td>
         <td><a href="deleteRecipe.php?user_id=<?php echo $_SESSION["user_id"]; ?>&recipe_id=<?php echo $row2["recipe_id"]?>"
           class="btn btn-outline-danger" onclick="return confirm('You are about to delete <?php echo $row2['recipe_name']; ?> from your saved list');">
 					Delete
 				</a></td>
       </tr>
       <?php endwhile; ?>
     </tbody>
   </table>
   <?php
      $message = "";
      if(isset($_GET['error2'])) {
        $message = "Cannot delete at this time";
        echo '<br />';
        echo '<div style="width: 50%;" class="alert alert-danger">'.$message.'</div>';
      }
      if(isset($_GET['success2'])) {
        $message = "Deleted successfully";
        echo '<br />';
        echo '<div style="width: 25%;" class="alert alert-success">'.$message.'</div>';
      }

    ?>
     </div>

     <div id="footer">
       <p>© Haryun Kim 2020</p>
     </div>

   </body>
 </html>
