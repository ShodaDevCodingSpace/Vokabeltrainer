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
   include BASE_PATH . 'app/getRandomVocabs.php';
?>

<?php 
if (isset($_SESSION['usedIds']) && !empty($_SESSION['usedIds'])) {
   echo implode(',', $_SESSION['usedIds']);
} else {
   echo "No used IDs found.";
}
 ?>

<form method="POST">
   <input type="text" name="enteredVocab" placeholder="Übersetzung hier eingeben" required>
   <input type="submit" name="submitVocab" text="Abschicken">
</form>


<form method="POST">
   <input type="submit" name="endsession" value="Session beenden">
</form>