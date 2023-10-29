<?php
   session_start();


   if(isset($_POST['endsession'])) {
      session_unset();
      session_destroy();
      header("Location: https://shoda.lol");
   }

   if(isset($_POST['submitVocab'])) {
      $enteredVocab = $_POST['enteredVocab'];
      $usedIds = isset($_SESSION['usedIds']) ? $_SESSION['usedIds'] : array();
      $vocabs = $_SESSION['vocabs'];
      $maxVocabs = $_SESSION['maxVocabs'];

      if($enteredVocab === $vocabs[count($usedIds)]['german']) {
         echo "Richtig!";
      } else {
         echo "Falsch!";
      }

      if (count($usedIds) + 1 == $maxVocabs) {
         session_unset();
         session_destroy();
         header("Location: https://shoda.lol");
      
      } else {
         if (empty($usedIds)) {
            $usedIds = array(0);
         } else {
            array_push($usedIds, count($usedIds));
         }
         $_SESSION['usedIds'] = $usedIds;
         header("Location: https://shoda.lol/learnVocabs");
      }

      

   }
?>

<p><?= count(isset($_SESSION['usedIds']) ? $_SESSION['usedIds'] : array()) + 1; ?>/<?= $_SESSION['maxVocabs']; ?></p>


<?php 
print_r($_SESSION['vocabs']);
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