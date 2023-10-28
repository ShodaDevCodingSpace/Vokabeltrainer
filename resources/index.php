<?php
include_once BASE_PATH.'app/ConnectDB.php';

$db = new MySQL();
$mysql = $db->getConnection();

   $SQL_GET_RANDOM_VOCAB = "SELECT * FROM vokabeln ORDER BY RAND() LIMIT 10";
   $SQL_GET_RANDOM_VOCAB = $mysql->prepare($SQL_GET_RANDOM_VOCAB);
   $SQL_GET_RANDOM_VOCAB->execute();
   
   if ($SQL_GET_RANDOM_VOCAB->num_rows > 0) {
       while($row = $SQL_GET_RANDOM_VOCAB->fetch_assoc()) {
           $deutsch = $row["deutsch"];
           $englisch = $row["englisch"];
         }
   } else {
       echo "Keine Vokabeln gefunden.";
   }
?>
<h1>Vokabeltrainer</h1>
<?= $englisch ?>