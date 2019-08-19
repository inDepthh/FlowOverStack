<?php
require_once('config.php');

function insertQuestionIntoDB() {
  try {
     $pdo = new PDO(DBCONNSTRING,DBUSER);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = 'INSERT INTO questions (title, description) VALUES (:title, :description)';
     $title =  $_GET['title'];
     $description =  $_GET['description'];
     $statement = $pdo->prepare($sql);
     $statement->bindValue(':title', $title);
     $statement->bindValue(':description', $description);
     $statement->execute();

     echo "<script>console.log('Success: question inserted')</script>";

     $pdo = null;
  }
  catch (PDOException $e) {
     die( $e->getMessage() );
  }
}

function fetchQuestionTitleFromDB() {
  try {
     $pdo = new PDO(DBCONNSTRING,DBUSER);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      if (isset($_GET['search'])) {
        $sql = 'SELECT questionID, title FROM questions WHERE title like ' .  "'%" . $_GET["search"] . "%'";
      } else {
        $sql = 'SELECT questionID, title FROM questions';
      }

     $statement = $pdo->prepare($sql);
     $statement->execute();

     while ($row = $statement->fetch()) {
       echo "<a href='/FlowOverStack/question.php/?id=" . $row['questionID'] . "'><li>" . $row['title'] . "</li></a>";
     }

     echo "<script>console.log('Success: question fetched')</script>";
     $pdo = null;
  }
  catch (PDOException $e) {
     die( $e->getMessage() );
  }
}

function fetchQuestionDetailsFromDB($id) {
  try {
     $pdo = new PDO(DBCONNSTRING,DBUSER);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = 'SELECT questionID, title, description FROM questions WHERE questionID =' . $id;
     $statement = $pdo->prepare($sql);
     $statement->execute();

     //$id = $_GET['id'];

     $row = $statement->fetch();
     if (isset($id) && $id == $row['questionID']) {
       echo "<p class='answerPageTitle'>" . $row['title'] . "</p><br>";
       echo "<p class='answerPageDescription'>" . $row['description'] . "</p>";
       echo "<input style='display: none' name='id' value='" . $id . "'>";
       echo "<script>console.log('element created')</script>";
     }

     echo "<script>console.log('Success: question fetched')</script>";
     $pdo = null;
  }
  catch (PDOException $e) {
     die( $e->getMessage() );
  }
}

if (isset($_GET['submit'])) {
  insertQuestionIntoDB();
}
?>
