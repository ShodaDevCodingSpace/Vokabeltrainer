<?php
session_start();

$trueVocabsCount = $_SESSION['trueVocabsCount'];
$falseVocabsCount = $_SESSION['falseVocabsCount'];
$trueVocabs = $_SESSION['trueVocabs'];
$falseVocabs = $_SESSION['falseVocabs'];

// Initialisieren Sie die Arrays direkt mit leeren Arrays.
$trueVocabsReturn = [];
$falseVocabsReturn = [];

// Ergebnis-Zeichenfolgen
$resultCount = "Richtig: $trueVocabsCount/10 <br>Falsch: $falseVocabsCount/10<br>";

// Kopieren Sie die richtigen und falschen Antworten in die entsprechenden Arrays.
while ($trueVocabsCount < $_SESSION['maxVocabs']) {
    $trueVocabsReturn[] = $trueVocabs[$trueVocabsCount];
    $trueVocabsCount++; // Zähler erhöhen
}
while ($falseVocabsCount < $_SESSION['maxVocabs']) {
    $falseVocabsReturn[] = $falseVocabs[$falseVocabsCount];
    $falseVocabsCount++; // Zähler erhöhen
}

// Ergebnis-Zeichenfolgen für die Antworten
$result = "Richtig: " . implode(', ', $trueVocabsReturn) . "<br>Falsch: " . implode(', ', $falseVocabsReturn) . "<br>";

var_dump($_SESSION['trueVocabsCount']);
var_dump($_SESSION['falseVocabsCount']);
var_dump($_SESSION['trueVocabs']);
var_dump($_SESSION['falseVocabs']);
?>

<?= $resultCount ?>
<?= $result ?>
