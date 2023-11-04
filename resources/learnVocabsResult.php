<?php
   session_start();

   $trueVocabsCount = $_SESSION['trueVocabsCount'];
   $falseVocabsCount = $_SESSION['falseVocabsCount'];
   $trueVocabs = $_SESSION['trueVocabs'];
   $falseVocabs = $_SESSION['falseVocabs'];
   $trueVocabsReturn = array();
   $falseVocabsReturn = array();

   //result
   $resultCount = "
      Richtig: $trueVocabsCount/10 <br>
      Falsch: $falseVocabsCount/10 <br>
   ";
   while($trueVocabsCount < $_SESSION['maxVocabs']) {
      array_push($trueVocabsReturn, $trueVocabs[$trueVocabsCount]);
   }
   while($falseVocabsCount < $_SESSION['maxVocabs']) {
      array_push($falseVocabsReturn, $falseVocabs[$falseVocabsCount]);
   }
   $result = "
      Richtig: $trueVocabsReturn <br>
      Falsch: $falseVocabsReturn <br>
   ";
?>

<?= $resultCount ?>
<?= $result ?>