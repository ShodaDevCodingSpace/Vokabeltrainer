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
    $trueVocabsReturn[] = '<tr><td>' . $trueVocabs[$i]['english'] . '</td><td>' . $trueVocabs[$i]['german'] . '</td></tr>';
}

for ($i = 0; $i < $falseVocabsCount; $i++) {
    $falseVocabsReturn[] = '<tr><td>' . $falseVocabs[$i]['english'] . '</td><td>' . $falseVocabs[$i]['german'] . '</td></tr>';
}

$trueTable = "<table><thead><tr><th>Englisch</th><th>Deutsch</th></tr></thead><tbody>" . implode('', $trueVocabsReturn) . "</tbody></table>";
$falseTable = "<table><thead><tr><th>Englisch</th><th>Deutsch</th></tr></thead><tbody>" . implode('', $falseVocabsReturn) . "</tbody></table>";

if ($trueVocabsCount === 0) {
    $trueTable = "Keine richtigen Antworten eingegeben.";
}

if ($falseVocabsCount === 0) {
    $falseTable = "Keine falschen Antworten eingegeben.";
}

?>

<?= $resultCount ?>
<h2>Richtige Antworten:</h2>
<?= $trueTable ?>
<h2>Falsche Antworten:</h2>
<?= $falseTable ?>
