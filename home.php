<?php
session_start();
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">

 <head>
   <meta charset="utf-8" name="viewport" content="width=device-width, user-scalable=yes">
   <title>GuestChef</title>
   <!-- Google fonts used -->
   <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Dancing+Script&display=swap" rel="stylesheet">

   <!-- css stylesheets -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link rel="stylesheet" href="css/home.css">
   <!-- icons used -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

   <!-- bootstrap -->
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 </head>

 <body>
   <section class="colored-section" id="title">
     <div class="container-fluid">

       <!-- nav bar -->
       <?php include 'nav.php'; ?>

       <!-- title -->
       <div class="row">

         <div class="col-lg-6">
           <h1 class="big-heading">Welcome to GuestChef! Sometimes
             we'd like to be a guest a restaurant but other times
             we'd like to be the chef and cook on our own or for others.
             At GuestChef you have a chance to do both! We'll provide restaurant
             and recipes ideas so sign up and check us out!</h1>
         </div>

         <div class="col-lg-6">
           <img class="chef-img" src="images/chef.jpg" alt="chef-picture" style="width: 220px;">
         </div>

       </div>
     </div>
   </section>

   <!-- features -->
   <section class="white-section" id="features">
     <div class="container-fluid">

       <div class="row">

         <div class="feature-box col-lg-4">
           <span class="icon fas fa-check-circle fa-4x"></span>
           <h3 class="feature-title"><strong>Easy to use.</strong></h3>
           <p class="p1">Simply choose to be the guest or the chef and we'll
             provide a restaurant or recipe suggestion</p>
         </div>
         <div class="feature-box col-lg-4">
           <span class="icon fas fa-bullseye fa-4x"></span>
           <h3 class="feature-title"><strong>LA area.</strong></h3>
           <p class="p1">We're currently targeting restaurants in LA with the
           hopes of expanding even further</p>
         </div>
         <div class="feature-box col-lg-4">
           <span class="icon fas fa-heart fa-4x"></span>
           <h3 class="feature-title"><strong>Enjoyable.</strong></h3>
           <p class="p1">We hope you have fun using GuestChef and trying
             a diverse range of food</p>
         </div>
       </div>
     </div>

   </section>
   <!-- footer -->
   <div id="footer">
     <p>© Haryun Kim 2020</p>
   </div>

 </body>

 </html>
