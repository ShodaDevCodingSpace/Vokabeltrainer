<?php


   include BASE_PATH . 'app/ConnectDB.php';

   $mysql = new MySQL();
   $mysql = $mysql->getConnection();

   session_start();

   $maxVocabs = $_SESSION['maxVocabs'];
   $_SESSION['x'] = 0;


   $SQL_GET_RANDOM_VOCAB_BY_AMOUNT = "SELECT * FROM translations ORDER BY RAND() LIMIT $maxVocabs";
   $SQL_GET_RANDOM_VOCAB_BY_AMOUNT = $mysql->prepare($SQL_GET_RANDOM_VOCAB_BY_AMOUNT);
   $SQL_GET_RANDOM_VOCAB_BY_AMOUNT->execute();

   if ($SQL_GET_RANDOM_VOCAB_BY_AMOUNT && $SQL_GET_RANDOM_VOCAB_BY_AMOUNT->rowCount() > 0) {
      $vocabs = array();
  
      while ($SQL_GET_RANDOM_VOCAB_BY_AMOUNT_ROW = $SQL_GET_RANDOM_VOCAB_BY_AMOUNT->fetch(PDO::FETCH_ASSOC)) {
          $german = $SQL_GET_RANDOM_VOCAB_BY_AMOUNT_ROW['german_translation'];
          $english = $SQL_GET_RANDOM_VOCAB_BY_AMOUNT_ROW['english_term'];
  
          $vocabs[] = array('german' => $german, 'english' => $english);
          $_SESSION['vocabs'] = $vocabs;
      }
  }