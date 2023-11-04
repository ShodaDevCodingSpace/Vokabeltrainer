<?php
   $trueVocabsCount = $_SESSION['trueVocabsCount'];
   $falseVocabsCount = $_SESSION['falseVocabsCount'];
   $trueVocabs = $_SESSION['trueVocabs'];
   $falseVocabs = $_SESSION['falseVocabs'];

   //result
   $resultCount = "
      Richtig: $trueVocabsCount/10 <br>
      Falsch: $falseVocabsCount/10 <br>
   ";

   $result = "
      Richtig: $trueVocabs <br>
      Falsch: $falseVocabs <br>
   ";
?>

<?= $resultCount ?>
<?= $result ?>