<?php
include_once BASE_PATH.'app/ConnectDB.php';

$db = new MySQL();
$mysql = $db->getConnection();

   $SQL_GET_RANDOM_VOCAB = "SELECT * FROM `translations`";
   $SQL_GET_RANDOM_VOCAB = $mysql->prepare($SQL_GET_RANDOM_VOCAB);
   $SQL_GET_RANDOM_VOCAB->execute();
   
   echo $SQL_GET_RANDOM_VOCAB->num_rows;
?>
<h1>Vokabeltrainer</h1>
<?= $english; ?>