<?php
   session_start();

   if(isset($_POST['10'])) {
      $_SESSION['maxVocabs'] = 10;
      header("Location: https://shoda.lol/learnVocabs");
   }
   if(isset($_POST['20'])) {
      $_SESSION['maxVocabs'] = 20;
      header("Location: https://shoda.lol/learnVocabs");
   }
   if(isset($_POST['25'])) {
      $_SESSION['maxVocabs'] = 25;
      header("Location: https://shoda.lol/learnVocabs");
   }
   if(isset($_POST['endsession'])) {
      session_destroy();
      header("Location: https://shoda.lol");
   }
?>

<h1>Vokabeltrainer</h1>
<p>Wie viele Vokabeln willst du lernen?</p>
<form method="POST">
   <input type="submit" name="10" value="10">
   <input type="submit" name="20" value="20">
   <input type="submit" name="25" value="25">
   <input type="submit" name="endsession" value="Session beenden">
</form>