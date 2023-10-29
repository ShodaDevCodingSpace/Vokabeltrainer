<?php
   session_start();
   echo $_SESSION['maxVocabs'];

   if(isset($_POST['endsession'])) {
      session_unset();
      session_destroy();
      header("Location: https://shoda.lol");
   }
?>

<?php
   include BASE_PATH . 'app/getRandomVocabs.php';
?>

<form method="POST">
   <input type="submit" name="endsession" value="Session beenden">
</form>