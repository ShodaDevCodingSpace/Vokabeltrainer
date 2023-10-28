<?php

class MySQL
{
   private $host = "localhost";
   private $username = "admin__";
   private $password = "Qzd47!s61";
   private $dbname = "Vokabeltrainer";
   private $conn;

   public function __construct() {
      try {
         $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
         $this->conn = new PDO($dsn, $this->username, $this->password);
         $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
         echo "Verbindung zur Datenbank fehlgeschlagen: " . $e->getMessage();
      }
   }

   public function getConnection() {
        return $this->conn;
    }
}