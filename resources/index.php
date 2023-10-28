<?php
include_once BASE_PATH.'app/ConnectDB.php';

$db = new MySQL();
$mysql = $db->getConnection();

   $SQL_GET_RANDOM_VOCAB = "SELECT * FROM translations`";
   $SQL_GET_RANDOM_VOCAB = $mysql->prepare($SQL_GET_RANDOM_VOCAB);
   $SQL_GET_RANDOM_VOCAB->execute();
   
   if ($SQL_GET_RANDOM_VOCAB->rowCount > 0) {
       while($row = $SQL_GET_RANDOM_VOCAB->fetch_assoc()) {
           $german = $row["german_translations"];
           $english = $row["english_term"];
           echo $english;
         }
   } else {
       echo "Keine Vokabeln gefunden.";
   }
?>
<h1>Vokabeltrainer</h1>
<?= $english; ?>