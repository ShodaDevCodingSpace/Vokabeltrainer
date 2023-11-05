<?php
   session_start();

   //en->de
   if(isset($_POST['de10'])) {
      $_SESSION['maxVocabs'] = 10;
      header("Location: https://shoda.lol/learnVocabsDE");
      include_once BASE_PATH . 'app/getRandomVocabs.php';
   }
   if(isset($_POST['de20'])) {
      $_SESSION['maxVocabs'] = 20;
      header("Location: https://shoda.lol/learnVocabsDE");
      include_once BASE_PATH . 'app/getRandomVocabs.php';
   }
   if(isset($_POST['de25'])) {
      $_SESSION['maxVocabs'] = 25;
      header("Location: https://shoda.lol/learnVocabsDE");
      include_once BASE_PATH . 'app/getRandomVocabs.php';
   }

   //de->en
   if(isset($_POST['en10'])) {
      $_SESSION['maxVocabs'] = 10;
      header("Location: https://shoda.lol/learnVocabsEN");
      include_once BASE_PATH . 'app/getRandomVocabs.php';
   }
   if(isset($_POST['en20'])) {
      $_SESSION['maxVocabs'] = 20;
      header("Location: https://shoda.lol/learnVocabsEN");
      include_once BASE_PATH . 'app/getRandomVocabs.php';
   }
   if(isset($_POST['en25'])) {
      $_SESSION['maxVocabs'] = 25;
      header("Location: https://shoda.lol/learnVocabsEN");
      include_once BASE_PATH . 'app/getRandomVocabs.php';
   }

   if(isset($_POST['endsession'])) {
      session_unset();
      session_destroy();
      header("Location: https://shoda.lol");
   }
?>

<h1>Vokabeltrainer</h1>
<h2>Englisch/Deutsch (Deutsche Eingabe)</h2>
<p>Wie viele Vokabeln willst du lernen?</p>
<form method="POST">
   <input type="submit" name="de10" value="10">
   <input type="submit" name="de20" value="20">
   <input type="submit" name="de25" value="25">
</form>

<h2>Deutsch/Englisch (Englische Eingabe)</h2>
<p>Wie viele Vokabeln willst du lernen?</p>
<form method="POST">
   <input type="submit" name="en10" value="10">
   <input type="submit" name="en20" value="20">
   <input type="submit" name="en25" value="25">
</form>

<form method="POST">
   <input type="submit" name="endsession" value="Session beenden">
</form>