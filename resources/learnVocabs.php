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
if (isset($_SESSION['vocabs']) && is_array($_SESSION['vocabs']) && count($_SESSION['vocabs']) > 0) {
   if (empty($_SESSION['usedIds']) || count($_SESSION['usedIds']) == 0) {
      echo $_SESSION['vocabs'][0]['english'];
   } else {
      echo $_SESSION['vocabs'][count($_SESSION['usedIds'])]['english'];
   }
} else {
   echo "No vocabs found.";
}
?>

<form method="POST">
   <input type="text" name="enteredVocab" placeholder="Übersetzung hier eingeben" required>
   <input type="submit" name="submitVocab" text="Abschicken">
</form>


<form method="POST">
   <input type="submit" name="endsession" value="Session beenden">
</form>