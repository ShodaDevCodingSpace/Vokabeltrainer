<?php
   session_start();


   if(isset($_POST['endsession'])) {
      session_unset();
      session_destroy();
      header("Location: https://shoda.lol");
   }
?>

<p><?= count(isset($_SESSION['usedIds']) ? $_SESSION['usedIds'] : array()) + 1; ?>/<?= $_SESSION['maxVocabs']; ?></p>


<?php 
print_r($_SESSION['vocabs']);
if(!isset($_SESSION['usedIds'])) {
   echo $_SESSION['vocabs'][0]['english'];
} else {

}
 ?>

<form method="POST">
   <input type="text" name="enteredVocab" placeholder="Übersetzung hier eingeben" required>
   <input type="submit" name="submitVocab" text="Abschicken">
</form>


<form method="POST">
   <input type="submit" name="endsession" value="Session beenden">
</form>