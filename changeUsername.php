<?php
session_start();
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8" name="viewport" content="width=device-width, user-scalable=yes">
     <title>Change Username</title>
     <style>
     input {
         background-color: #eee;
         border: none;
         padding: 12px 15px;
         margin: 8px 0;
         width: 24%;
     }
     </style>
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

     <div class="form-container change-container">
       <form action="changeUsernameConfirm.php" method="POST">
         <h1 style="padding-top: 40px;">Change Username</h1>
         <br>
         <div class="inputName" style="width: 100%;">
           <input id = "NewUsername" type="text" placeholder="New Username" name="name" style="text-align: center;"/>
           <small id="username-error" class="invalid-feedback">Input is required.</small>
         </div>
         <br>
         <button class="btn btn-warning" name="btn-submit">Submit</button>
       </form>
       <?php
       $message = "";
       if(isset($_GET['error'])) {
         $message = "Username has already been taken. Please choose another one.";
         echo '<br />';
         echo '<div class="alert alert-danger" style="margin-left: auto; margin-right: auto; width: 25%;">'.$message.'</div>';
       }
        ?>
         </div>

     <div id="footer">
       <p>© Haryun Kim 2020</p>
     </div>

     <script>
     document.querySelector('form').onsubmit = function(){
       if ( document.querySelector('#NewUsername').value.trim().length == 0 ) {
         document.querySelector('#NewUsername').classList.add('is-invalid');
       } else {
         document.querySelector('#NewUsername').classList.remove('is-invalid');
       }
       return ( !document.querySelectorAll('.is-invalid').length > 0 );
     }
     </script>

   </body>
 </html>
