<?php
include_once BASE_PATH.'app/ConnectDB.php';

$db = new MySQL();
$mysql = $db->getConnection();

$SQL_GET_RANDOM_VOCAB = "SELECT * FROM `translations`";
$SQL_GET_RANDOM_VOCAB = $mysql->prepare($SQL_GET_RANDOM_VOCAB);
$SQL_GET_RANDOM_VOCAB->execute();

// Um die Anzahl der Zeilen (Datensätze) im Ergebnis zu erhalten, solltest du rowCount verwenden, nicht num_rows.
echo $SQL_GET_RANDOM_VOCAB->rowCount();
?>
<h1>Vokabeltrainer</h1>
