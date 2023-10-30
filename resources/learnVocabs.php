<?php
   session_start();

   //vars
   $truefalscase = 0;
   $english = 0;
   $errorNoVocabs = 0;
   $counter = count(isset($_SESSION['usedIds']) ? $_SESSION['usedIds'] : array()) + 1 . '/' . $_SESSION['maxVocabs'];
   $htmlGoOn = '
      <form method="POST">
         <input type="submit" name="GoOn" value="Nächstes">
      </form>
   ';
   $htmlSendInput = '
      <form method="POST">
         <input type="text" name="enteredVocab" placeholder="Übersetzung hier eingeben" required>
         <input type="submit" name="submitVocab" text="Abschicken">
      </form>
   ';
   $htmlEndSession = '      
      <form method="POST">
         <input type="submit" name="endsession" value="Session beenden">
      </form>
   ';

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
         $truefalscase = 'Richtig!';
         if(isset($_POST['GoOn'])) {
            header("Location: https://shoda.lol/learnVocabs");
         }
         if (empty($usedIds)) {
            $usedIds = array(0);
         } else {
            array_push($usedIds, count($usedIds));
         }
         $_SESSION['usedIds'] = $usedIds;

      } else {
         $truefalsecase = 'Falsch!';
         if(isset($_POST['GoOn'])) {
            header("Location: https://shoda.lol/learnVocabs");
         }
         if (empty($usedIds)) {
            $usedIds = array(0);
         } else {
            array_push($usedIds, count($usedIds));
         }
         $_SESSION['usedIds'] = $usedIds;
      }

      if (count($usedIds) + 1 == $maxVocabs) {
         
      }
   }
?>

<?php 
if (isset($_SESSION['vocabs']) && is_array($_SESSION['vocabs']) && count($_SESSION['vocabs']) > 0) {
   if (empty($_SESSION['usedIds']) || count($_SESSION['usedIds']) == 0) {
      $english = $_SESSION['vocabs'][0]['english'];
   } else {
      $english = $_SESSION['vocabs'][count($_SESSION['usedIds'])]['english'];
   }
} else {
   $errorNoVocabs = "No vocabs found.";
}
?>

<?php
   if (isset($htmlgoon) && !empty($htmlgoon)) {
      echo $htmlgoon;
   } else {
      echo "No HTML found.";
   }
?>

<?= $htmlEndSession; ?>