<?php
require_once('config.php');

error_reporting(0); 
ini_set('error_log', 'errors');

// $id = $_GET['id'];
if (isset($id) && !is_numeric($id)) {
  echo "<h2>Site is under maintanance, please try again later</h2>";
  echo gettype($id);
}

function insertAnswerIntoDB() {
  try {
     $pdo = new PDO(DBCONNSTRING,DBUSER);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = 'INSERT INTO answers (questionID, answer) VALUES (:questionID, :answer)';
     $answer =  $_GET['answer'];
  
     $questionID = $_GET['id'];
     
     $statement = $pdo->prepare($sql);
     $statement->bindValue(':questionID', $questionID);
     $statement->bindValue(':answer', $answer);
     $statement->execute();

     echo "<script>console.log('Success: answer inserted')</script>";

     $pdo = null;
  }
  catch (PDOException $e) {
     die( $e->getMessage() );
  }
}

function fetchAnswerFromDB($id) {
  try {
     $pdo = new PDO(DBCONNSTRING,DBUSER);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     // $id = $_GET['id'];
     $sql = 'SELECT questionID, answer FROM answers WHERE questionID =' . $id;
     $statement = $pdo->prepare($sql);
     $statement->execute();

     

     while ($row = $statement->fetch()) {
       echo "<li class='answerFetched'>" . $row['answer'] . "</li><br>";
       echo "<script>console.log('Answer populated')</script>";
     }

     echo "<script>console.log('Success: answer fetched')</script>";
     $pdo = null;
  }
  catch (PDOException $e) {
     die( $e->getMessage() );
  }
}

if (isset($_GET['answer'])) {
  insertAnswerIntoDB();
}
?>
