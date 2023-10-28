<?php
include_once BASE_PATH.'app/ConnectDB.php';

$db = new MySQL();
$mysql = $db->getConnection();

$SQL_GET_RANDOM_VOCAB = "SELECT * FROM translations ORDER BY RAND() LIMIT 1";
$SQL_GET_RANDOM_VOCAB = $mysql->prepare($SQL_GET_RANDOM_VOCAB);
$SQL_GET_RANDOM_VOCAB->execute();

// Verwende "rowCount()" nicht, um die Anzahl der Ergebnisse zu zählen.
// Stattdessen verwenden wir "rowCount()" für Statements, die Daten ändern (INSERT, UPDATE, DELETE).
// Verwende stattdessen "rowCount()" bei einem SELECT-Statement.
$rowCount = $SQL_GET_RANDOM_VOCAB->rowCount();

$usedIds = array(); // Du solltest "array()" statt "new Array()" verwenden.

if ($rowCount > 0) {
    while ($row = $SQL_GET_RANDOM_VOCAB->fetch()) { // "fetch_assoc()" ist nicht notwendig, da du die Spalten über ihren Namen ansprechen möchtest.
        $german = $row["german_translation"];
        $english = $row["english_term"];
        $id = $row['id']; // Ändere ":" zu ";".
        echo $english;

        $usedIds[] = $id; // Verwende [] für das Hinzufügen eines Elements zu einem Array.
    }
} else {
    echo "Keine Vokabeln gefunden.";
}
?>
<h1>Vokabeltrainer</h1>

<?php
print_r($usedIds);
?>
