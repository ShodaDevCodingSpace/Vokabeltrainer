<?php
   require_once BASE_PATH . 'Exceptions/VocabsNotFountException.php';


   include BASE_PATH . 'app/connectDB.php';

   $mysql = new mysql();
   $mysql = new $mysql->getConnection();

   session_start();

   $maxVocabs = $_SESSION['maxVocabs'];

   if($maxVocabs == 0) {
      $message = "No vocabs found!";
      throw new VocabsNotFountException($message);
   }

   $SQL_GET_RANDOM_VOCAB_BY_AMOUNT = "SELECT * FROM translations ORDER BY RAND() LIMIT $maxVocabs";
   $SQL_GET_RANDOM_VOCAB_BY_AMOUNT = $mysql->prepare($SQL_GET_RANDOM_VOCAB_BY_AMOUNT);
   $SQL_GET_RANDOM_VOCAB_BY_AMOUNT->execute();

   while($SQL_GET_RANDOM_VOCAB_BY_AMOUNT->rowCount() > 0) {
      $SQL_GET_RANDOM_VOCAB_BY_AMOUNT = $SQL_GET_RANDOM_VOCAB_BY_AMOUNT->fetch(PDO::FETCH_ASSOC);
      $english = $SQL_GET_RANDOM_VOCAB_BY_AMOUNT['english_term'];
      $german = $SQL_GET_RANDOM_VOCAB_BY_AMOUNT['german_translation'];
   }
