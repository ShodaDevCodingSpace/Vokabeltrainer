<?php
   session_start();
   echo $_SESSION['maxVocabs'];
   
   if(isset($_POST['endsession'])) {
      session_destroy();
      header("Location: https://shoda.lol");
   }
?>
<form method="POST">
   <input type="submit" name="endsession" value="Session beenden">
</form>