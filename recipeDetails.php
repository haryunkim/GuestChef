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

$sql = "SELECT * FROM (
SELECT  recipe_name, time, img_path, recipes.recipe_id
AS recipe_id1, ingredients.ingredient_name AS ingredient, measurement_qty.qty_amount
AS qty, measurement_units.measurement_description AS unit FROM recipes
INNER JOIN recipe_ingredients
ON recipes.recipe_id = recipe_ingredients.recipe_id
INNER JOIN ingredients
ON recipe_ingredients.ingredient_id = ingredients.ingredient_id
INNER JOIN measurement_qty
ON recipe_ingredients.measurement_qty_id = measurement_qty.measurement_qty_id
INNER JOIN measurement_units
ON recipe_ingredients.measurement_id = measurement_units.measurement_id
) t WHERE  recipe_id1 = " . $_GET["recipe_id"] .";";


$sql = $sql . ";";


$results = $mysqli->query($sql);


if ( $results == false ) {
	echo $mysqli->error;
	exit();
}

$mysqli->close();
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">

 <head>
   <meta charset="utf-8" name="viewport" content="width=device-width, user-scalable=yes">
   <title>Recipes</title>
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

 <div class="container-fluid" id="container2">
   <div class="row">
     <div class="leftSide col-md-6">
       <h1>Let's Make...</h1>
       <?php $row1 = $results->fetch_assoc(); ?>
       <img src="<?php echo $row1['img_path']; ?>" class="foodImg" alt="Food Image">
     </div>
     <div class="rightSide col-md-6">
       <h1><?php echo $row1['recipe_name']; ?></h1>
       <h5>Total time: <?php echo $row1['time']; ?></h5>
       <hr>

       <h4>Ingredients</h4>
       <?php while ( $row2 = $results->fetch_assoc() ) : ?>
       <ul>
         <li><?php echo $row2['qty'] . " " . $row2['unit'] . " " . $row2['ingredient']; ?></li>
       </ul>
			 	<?php endwhile; ?>
     </div>
   </div>

 </div>
 <div id="footer">
   <p>© Haryun Kim 2020</p>
 </div>

 </body>

 </html>
