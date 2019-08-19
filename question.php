<?php 

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
  $id = $_GET['id'];
}
else {
  $id = "1";
}

?>


<!DOCTYPE html>
<html>
  <head>
    <title>FlowOverStack</title>
    <link rel="stylesheet" type="text/css" media="screen and (max-device-width: 800px)" href="../mobilestyles.css" >
    <link rel="stylesheet" type="text/css" media="screen and (min-device-width: 800px)" href="../styles.css" />
  </head>


  <body>
    <?php include 'includes/question_DB.php'; ?>
    <?php include 'includes/answer_DB.php'; ?>
    <div class="container">
      <div class="menu">
        <img class="logo" src="../images/FlowOverStackLogo.png" alt="logo" height="53" width="300" />
        <a class="active" href="/FlowOverStack/">Home</a>
        <a href="./feedback.php">Feedback</a>
        <a href="./about.php">About</a>
        <button id="btnAsk" onclick="btnAskOnQuestionPage()">Ask a question</button>
        <form method="GET">
          <input class="search" type="text" name="search" placeholder="Search..." onKeyPress="return checkSubmit(event)"></input>
        </form>

      </div>
    </div>

    <script>
      function btnAskOnClick() {
        questionsContainer.style.display = "none";
        dialogContainer.style.display = "block";
      }

      function btnAskCancelOnClick() {
        questionsContainer.style.display = "block";
        dialogContainer.style.display = "none";
      }

      function btnAskOnQuestionPage() {
        window.location.href='./';
      }

      function checkSubmit(e) {
         if(e && e.keyCode == 13) {
             document.forms[0].submit();
         }
      }

    </script>


    <?php if (isset($_GET['search'])) {
      echo "<script>window.location.href = FlowOverStack/?search=" . $_GET['search']  . "'</script>";
    }
    ?>

  <div id="answerQuestionContainer">
    <form method='GET' class='questionForm'>
      <div class="titleContainer">
        <?php
            fetchQuestionDetailsFromDB($id);
        ?>
      </div>
      <label class="answerDescriptionLabel">Answer: </label>
      <div class="answerDescriptionContainer">
        <textarea rows="7" cols="103" maxlength="2000" name="answer" class="askQuestionDescriptionInput" required></textarea>
      </div>
      <input type="submit" value="Answer Question" class="AnswerQuestionSubmit" >
    </form>

    <div class="answersContainer">
      <br><br><br><br><hr>
      <h1>Answers</h1>
      <ul class="answers">
        <?php
          fetchAnswerFromDB($id);
        ?>
      </ul>
    </div>
  </div>

  </body>
</html>
