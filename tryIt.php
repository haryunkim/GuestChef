<?php
session_start();
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8" name="viewport" content="width=device-width, user-scalable=yes">
     <title>Try It</title>
     <!-- Google fonts used -->
     <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Dancing+Script&display=swap" rel="stylesheet">

     <!-- css stylesheets -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <link rel="stylesheet" href="css/tryIt.css">

     <!-- bootstrap -->
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   </head>
   <body>

     <div class="container-fluid">

       <?php include 'nav.php'; ?>

     <div class="username">
       <h1>Hi <?php echo $_SESSION['user']; ?></h1>
       <h5>Please choose an option below</h5>

     </div>

     <div class="options">
       <button OnClick="location.href='restaurants.php'" type="button" class="btn btn-group btn-warning btn-lg btn1"><span>Be the Guest!</span></button>
       <button OnClick="location.href='recipes.php'" type="button" class="btn btn-group btn-warning btn-lg btn2"><span>Be the Chef!</span></button>
     </div>

   </div>

     <div id="footer">
       <p>© Haryun Kim 2020</p>
     </div>

   </body>
 </html>-
