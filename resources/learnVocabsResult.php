<?php
session_start();

$trueVocabsCount = $_SESSION['trueVocabsCount'];
$falseVocabsCount = $_SESSION['falseVocabsCount'];
$trueVocabs = $_SESSION['trueVocabs'];
$falseVocabs = $_SESSION['falseVocabs'];

$trueVocabsReturn = [];
$falseVocabsReturn = [];

$resultCount = "Richtig: $trueVocabsCount/10 <br>Falsch: $falseVocabsCount/10<br>";

// Kopieren Sie die richtigen und falschen Antworten in die entsprechenden Arrays.
for ($i = 0; $i < $trueVocabsCount; $i++) {
    $trueVocabsReturn[] = $trueVocabs[$i]['english'] . ' (' . $trueVocabs[$i]['german'] . ')';
}

for ($i = 0; $i < $falseVocabsCount; $i++) {
    $falseVocabsReturn[] = $falseVocabs[$i]['english'] . ' (' . $falseVocabs[$i]['german'] . ')';
}

$result = "Richtig: " . implode(', ', $trueVocabsReturn) . "<br>Falsch: " . implode(', ', $falseVocabsReturn) . "<br>";

?>

<?= $resultCount ?>
<?= $result ?>
