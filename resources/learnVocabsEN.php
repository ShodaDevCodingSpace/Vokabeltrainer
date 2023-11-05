<?php
   session_start();

   //vars
   $truefalsecase = 0;
   $german = 0;
   $errorNoVocabs = 0;

   settype($_SESSION['trueVocabs'], "array");
   settype($_SESSION['falseVocabs'], "array");
   settype($_SESSION['trueVocabsCount'], "integer");
   settype($_SESSION['falseVocabsCount'], "integer");

   $htmlInputForm = '
      <form method="POST">
         <input type="text" name="enteredVocab" placeholder="Übersetzung hier eingeben" required>
         <input type="submit" name="submitVocab" text="Abschicken">
      </form>
   ';
   $htmlEndSessionForm = '      
      <form method="POST">
         <input type="submit" name="endsession" value="Session beenden">
      </form>
   ';

   if(isset($_POST['endsession'])) {
      session_unset();
      session_destroy();
      header("Location: https://shoda.lol");
   }

   $x = isset($_SESSION['x']) ? $_SESSION['x'] : 0;
   $counter = ($x + 1) . '/' . $_SESSION['maxVocabs'];
   
   if(isset($_POST['submitVocab'])) {
      $enteredVocab = $_POST['enteredVocab'];
      $usedIds = isset($_SESSION['usedIds']) ? $_SESSION['usedIds'] : array();
      $vocabs = $_SESSION['vocabs'];
      $maxVocabs = $_SESSION['maxVocabs'];
      if(!isset($_SESSION['enteredVocabs']) || empty($_SESSION['enteredVocabs'])) {
         $_SESSION['enteredVocabs'] = array();
      }
   
      if($enteredVocab === $vocabs[count($usedIds)]['english']) {
         $_SESSION['trueVocabsCount'] = $_SESSION['trueVocabsCount'] + 1;
         array_push($_SESSION['trueVocabs'], $vocabs[$x]);
         $truefalsecase = 'Richtig!';
         if (empty($usedIds)) {
            $usedIds = array(0);
         } else {
            array_push($usedIds, count($usedIds));
         }
         $_SESSION['usedIds'] = $usedIds;
         $x++;
         $_SESSION['x'] = $x;
      } else {
         $_SESSION['falseVocabsCount']++;
         $_SESSION['falseVocabs'][] = $vocabs[count($usedIds)];
         $truefalsecase = 'Falsch!';
         if (empty($usedIds)) {
            $usedIds = array(0);
         } else {
            array_push($usedIds, count($usedIds));
         }
         $_SESSION['usedIds'] = $usedIds;
         $x++;
         $_SESSION['x'] = $x;
      }

      $counter = ($x + 1) . '/' . $_SESSION['maxVocabs'];

      if($x == $maxVocabs) {
         header("Location: https://shoda.lol/learnVocabsResultEN");
      }
   }
?>

<?php 
   if (isset($_SESSION['vocabs']) && is_array($_SESSION['vocabs']) && count($_SESSION['vocabs']) > 0) {
      if (empty($_SESSION['usedIds']) || count($_SESSION['usedIds']) == 0) {
         $german = $_SESSION['vocabs'][0]['german'];
      } else {
         $german = $_SESSION['vocabs'][count($_SESSION['usedIds'])]['german'];
      }
   } else {
      $errorNoVocabs = "No vocabs found.";
}
?>
<?= $german; ?>
<br>
<?= $htmlInputForm; ?>
<?= $counter; ?>

<?= $htmlEndSessionForm; ?>