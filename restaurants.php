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

$sql = "SELECT restaurant_id, name, address, phone_number, menu, cuisines.cuisine as cuisine, prices.price_symbol as price, latitude, longtitude
FROM restaurants
JOIN cuisines
ON restaurants.cuisine_id = cuisines.cuisine_id
JOIN prices
ON restaurants.price_id = prices.price_id
ORDER BY rand()
LIMIT 1;";

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
       <title>Restaurant</title>
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

     <div class="container-fluid" id="container2">
       <div class="row">
         <div class="leftSide col-md-6">
           <div id="map" style="height: calc(85.5vh - 60px); position: relative; overflow: hidden; width: 100%; padding: 0; margin: 0;">

           </div>

         </div>
         <?php while ( $row = $results->fetch_assoc() ) : ?>
         <div class="rightSide col-md-6">
           <h1>Let's try...</h1>
           <h1><strong><?php echo $row['name']; ?></strong></h1>
           <hr>
           <p><strong>Address: </strong><?php echo $row['address']; ?></p>
           <p><strong>Phone: </strong><?php echo $row['phone_number']; ?></p>
           <p><strong>Cuisine: </strong><?php echo $row['cuisine']; ?></p>
           <p><strong>Price: </strong><?php echo $row['price']; ?></p>
           <p><strong>Menu: </strong><a href="<?php echo $row['menu']; ?>" target="_blank">Here</a></p>
					 <br>
					 <?php if ( isset($_SESSION['logged_in']) && $_SESSION['logged_in'] ) : ?>
					 	<button type="button" class="btn btn-primary btn-lg" OnClick="location.href='saveRestaurant.php?restaurant_id=<?php echo $row['restaurant_id'] ?>
							&name=<?php echo $row['name'] ?>'">Save for later</button>
					<?php endif; ?>
         </div>


       </div>

     </div>
     <div id="footer">
       <p>© Haryun Kim 2020</p>
     </div>

     <script>
       function initMap(){
         var location = {lat: <?php echo $row['latitude']; ?>, lng: <?php echo $row['longtitude']; ?>};
         var map = new google.maps.Map(document.getElementById("map"), {
           zoom: 16,
           center: location
         });
         var marker = new google.maps.Marker({
           position: location,
           map: map
         });
       }
       <?php endwhile; ?>
     </script>
     <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLwOPGJv57ZClSsFMxRqNH8XwEYfnYN28&callback=initMap">

     </script>


   </body>
 </html>
