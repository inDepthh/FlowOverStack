<!DOCTYPE html>
<html>
  <head>
    <title>FlowOverStack</title>
    <link rel="stylesheet" media="screen and (max-device-width: 800px)" href="mobilestyles.css" >
    <link rel="stylesheet" media="screen and (min-device-width: 800px)" href="styles.css" />
  </head>


  <body>
    <?php include 'includes/question_DB.php'; ?>
    <div class="container">
      <div class="menu">
        <img class="logo" src="images/FlowOverStackLogo.png" alt="logo" height="53" width="300" />
        <a class="active" href="">Home</a>
        <a href="feedback.php">Feedback</a>
        <a href="about.php">About</a>
        <button id="btnAsk" onclick="btnAskOnClick()">Ask a question</button>
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
    </script>

<div id="dialogContainer">
  <div class="dialog"></div>
  <h1 class="createAskQuestionH1">Ask a question</h1>
  <br><br><br>
  <form action="" method="GET" class="questionForm">
    <div class="titleContainer">
      <label for="title" class="askQuestionTitleLabel" >Title: </label>
      <input type="text" name="title" required
        minlength="10" maxlength="200" class="askQuestionTitleInput" >
    </div>
    <label class="askQuestionDescriptionLabel">Description: </label>
    <div class="askQuestionDescriptionContainer">
      <textarea rows="7" cols="103" maxlength="2000" name="description" class="askQuestionDescriptionInput"></textarea>
    </div>
    <input type="submit" name="submit" value="Ask Question" class="askQuestionSubmit" >
    <input type="button" value="Cancel" id="askQuestionCancel" onclick="btnAskCancelOnClick()">
  </form>
</div>

<div id="questionsContainer">
  <h1>Questions</h1>
  <br>
  <ul class="questions">
    <?php
    fetchQuestionTitleFromDB();
    ?>
  </ul>
</div>

  </body>
</html>
