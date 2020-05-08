<?php

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">

 <head>
   <meta charset="utf-8" name="viewport" content="width=device-width, user-scalable=yes">
   <title>Sign In/Up</title>
   <!-- Google fonts used -->
   <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Dancing+Script&display=swap" rel="stylesheet">

   <!-- css stylesheets -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link rel="stylesheet" href="css/signup.css">

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

     <div class="form-container sign-up-container col-md-6">
       <form action="signupConfirm.php" method="POST">
       <h1>Sign Up</h1>
       <div class="inputName" style="width: 100%;">
         <input id = "username" type="text" placeholder="Username" name="name" />
         <small id="username-error" class="invalid-feedback">Username is required.</small>
       </div>
       <div class="inputEmail" style="width: 100%;">
         <input id = "email" type="email" placeholder="Email" name="email"/>
         <small id="username-error" class="invalid-feedback">Email is required.</small>
       </div>
       <div class="inputPassword" style="width: 100%;">
         <input id = "password" type="password" placeholder="Password" name="password"/>
         <small id="username-error" class="invalid-feedback">Password is required.</small>
       </div>
         <button class="regular-btn">Sign Up</button>
   </form>
     </div>
     <div class="form-container sign-in-container col-md-6">
       <h1>Already have an account?</h1>
           <p>
               Welcome back! Login by clikcing below.
           </p>
           <button OnClick="location.href='signIn.php'" class="regular-btn" id="signIn">Sign In</button>
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

     if ( document.querySelector('#email').value.trim().length == 0 ) {
       document.querySelector('#email').classList.add('is-invalid');
     } else {
       document.querySelector('#email').classList.remove('is-invalid');
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
