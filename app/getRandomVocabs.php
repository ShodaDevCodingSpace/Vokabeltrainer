<?php
include_once BASE_PATH . 'app/ConnectDB.php';

session_start();

$db = new MySQL();
$mysql = $db->getConnection();

$_SESSION['usedIds'] = isset($_SESSION['usedIds']) ? $_SESSION['usedIds'] : array();

$vocabId = null;
$totalVocabCount = $maxVocabs;

if (count($_SESSION['usedIds']) < $totalVocabCount) {
   do {
       $SQL_GET_RANDOM_VOCAB = "SELECT * FROM translations";
       if (!empty($_SESSION['usedIds'])) {
           $SQL_GET_RANDOM_VOCAB .= " WHERE id NOT IN (" . implode(',', $_SESSION['usedIds']) . ")";
       }
       $SQL_GET_RANDOM_VOCAB .= " ORDER BY RAND() LIMIT 1";
       $SQL_GET_RANDOM_VOCAB = $mysql->prepare($SQL_GET_RANDOM_VOCAB);
       $SQL_GET_RANDOM_VOCAB->execute();
       $vocab = $SQL_GET_RANDOM_VOCAB->fetch();
       if ($vocab) {
           $vocabId = $vocab['id'];
           $_SESSION['usedIds'][] = $vocabId;
           $response = $vocab['english_term'];
       }
   } while (!$vocab && count($_SESSION['usedIds']) < $totalVocabCount);
}

if (count($_SESSION['usedIds']) > $totalVocabCount) {
    $response = "No more vocabs";
}

return $response;
?>