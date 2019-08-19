<?php
require_once('config.php');

function insertFeedbackIntoDB() {
  try {
     $pdo = new PDO(DBCONNSTRING,DBUSER);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = 'INSERT INTO feedback (message) VALUES (:message)';
     $message =  $_GET['feedback'];
     $statement = $pdo->prepare($sql);
     $statement->bindValue(':message', $message);
     $statement->execute();

     echo "<script>console.log('Success: feedback inserted')</script>";

     $pdo = null;
  }
  catch (PDOException $e) {
     die( $e->getMessage() );
  }
}

if (isset($_GET['feedback'])) {
  insertFeedbackIntoDB();
}
?>
