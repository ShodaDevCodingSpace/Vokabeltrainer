<?php
include_once BASE_PATH . 'app/ConnectDB.php';

// Starte die Session
session_start();

$db = new MySQL();
$mysql = $db->getConnection();

$_SESSION['usedIds'] = isset($_SESSION['usedIds']) ? $_SESSION['usedIds'] : array();

$vocabid = null;

if (isset($_SESSION['usedIds'])) {
    do {
        $SQL_GET_RANDOM_VOCAB = "SELECT * FROM translations WHERE id NOT IN (" . implode(",", $_SESSION['usedIds']) . ") ORDER BY RAND() LIMIT 1";
        $SQL_GET_RANDOM_VOCAB = $mysql->prepare($SQL_GET_RANDOM_VOCAB);
        $SQL_GET_RANDOM_VOCAB->execute();
        $vocab = $SQL_GET_RANDOM_VOCAB->fetch();
        if ($vocab) {
            $vocabid = $vocab['id'];
            $_SESSION['usedIds'][] = $vocabid;
            echo $vocab['english_term'];
        }
    } while (!$vocab && count($_SESSION['usedIds']) < $totalVocabCount); // Wiederhole, bis eine neue Vokabel gefunden wird oder alle Vokabeln verwendet wurden
}

if (count($_SESSION['usedIds']) == $totalVocabCount) {
    echo "Alle Vokabeln wurden verwendet.";
}
?>
<h1>Vokabeltrainer</h1>

<?php
print_r($_SESSION['usedIds']);
?>
