<?php
   include_once BASE_PATH . 'app/ConnectDB.php';

   // Starte die Session
   session_start();

   $db = new MySQL();
   $mysql = $db->getConnection();

   $_SESSION['usedIds'] = isset($_SESSION['usedIds']) ? $_SESSION['usedIds'] : array();

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
            array_push($_SESSION['usedIds'], $id);
        } else {
            echo $vocab['english_term'];
            array_push($_SESSION['usedIds'], $id);
        }
    } else {
      echo $vocab['english_term'];
      array_push($_SESSION['usedIds'], $id);
   }
?>
<h1>Vokabeltrainer</h1>

<?php
print_r($_SESSION['usedIds']);
?>
