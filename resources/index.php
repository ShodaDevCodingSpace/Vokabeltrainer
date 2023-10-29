<?php
   session_start();
   
   if(isset($_POST['10'])) {
      $_SESSION['maxVocabs'] = 10;
   }
   if(isset($_POST['20'])) {
      $_SESSION['maxVocabs'] = 20;
   }
   if(isset($_POST['25'])) {
      $_SESSION['maxVocabs'] = 25;
   }
?>

<h1>Vokabeltrainer</h1>
<p>Wie viele Vokabeln willst du lernen?</p>
<form method="POST">
   <input type="submit" name="10" value="10">
   <input type="submit" name="20" value="20">
   <input type="submit" name="25" value="25">
</form>