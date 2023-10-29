<?php
   session_start();


   if(isset($_POST['endsession'])) {
      session_unset();
      session_destroy();
      header("Location: https://shoda.lol");
   }
?>
<?php
   if(!count$_SESSION['usedIds']) === $_SESSION['maxVocabs']) {
      ?>
<p><?= count(isset($_SESSION['usedIds']) ? $_SESSION['usedIds'] : array()) + 1; ?>/<?= $_SESSION['maxVocabs']; ?></p>
<?php 
   } else {
      ?>
<p><?= $_SESSION['maxVocabs']; ?>/<?= $_SESSION['maxVocabs']; ?></p>
<?php
   }
?>
<?php
   include BASE_PATH . 'app/getRandomVocabs.php';
?>
<?= $response; ?>

<form method="POST">
   <input type="submit" name="endsession" value="Session beenden">
</form>