<?php
include_once BASE_PATH . 'app/ConnectDB.php';

// Starte die Session
session_start();

$db = new MySQL();
$mysql = $db->getConnection();

    $SQL_GET_RANDOM_VOCAB = "SELECT * FROM translations ORDER BY RAND() LIMIT 1";
    $SQL_GET_RANDOM_VOCAB = $mysql->prepare($SQL_GET_RANDOM_VOCAB);
    $SQL_GET_RANDOM_VOCAB->execute();

    $vocab = $SQL_GET_RANDOM_VOCAB->fetch();
    $vocabid = $vocab['id'];
    if(isset($_SESSION['usedIds'])) {
        if (in_array($vocabid, $_SESSION['usedIds'])) {
            //loop (get new vocab)
            $SQL_GET_RANDOM_VOCAB = "SELECT * FROM translations ORDER BY RAND() LIMIT 1";
            $SQL_GET_RANDOM_VOCAB = $mysql->prepare($SQL_GET_RANDOM_VOCAB);
            $SQL_GET_RANDOM_VOCAB->execute();
            $vocab = $SQL_GET_RANDOM_VOCAB->fetch();
            $vocabid = $vocab['id'];
            echo $vocab['english_term'];

            

        } else {
            echo $vocab['english_term'];
        }
    } else {
      echo $vocab['english_term'];
   }


    $_SESSION['usedIds'] = isset($_SESSION['usedIds']) ? $_SESSION['usedIds'] : array();

    if ($SQL_GET_RANDOM_VOCAB->rowCount() > 0) {
        while ($row = $SQL_GET_RANDOM_VOCAB->fetch()) {
            $german = $row["german_translation"];
            $english = $row["english_term"];
            $id = $row['id'];
            echo $english;

            array_push($_SESSION['usedIds'], $id);
        }
    } else {
        echo "Keine Vokabeln gefunden.";
    }

    $_SESSION['maxId'] = count($_SESSION['usedIds']);

?>
<h1>Vokabeltrainer</h1>

<?php
print_r($_SESSION['usedIds']);
?>
