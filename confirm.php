<?php

if(isset($_POST['btn-send'])) {
  $name = $_POST['text'];
  $sending_email = $_POST['email'];
  $message = $_POST['message'];

  if(empty($name) || empty($sending_email) || empty($message)) {
    header('location:contact.php?error');
  }
  else {
    $to = "haryunki@usc.edu";

    if(mail($to, $message, $sending_email)) {
      header("location:contact.php?success");
    }
  }
}
else {
  header("location:contact.php");
}

 ?>
