<!DOCTYPE html>
<html>
  <head>
    <title>FlowOverStack</title>
    <link rel="stylesheet" type="text/css" media="screen and (max-device-width: 800px)" href="mobilestyles.css" >
    <link rel="stylesheet" type="text/css" media="screen and (min-device-width: 800px)" href="styles.css" />
  </head>

  <body>
    <?php include 'includes/feedback_DB.php'; ?>
    <div class="container">
      <div class="menu">
        <img class="logo" src="images/FlowOverStackLogo.png" alt="logo" height="53" width="300" />
        <a class="active" href="./">Home</a>
        <a href="feedback.php">Feedback</a>
        <a href="about.php">About</a>
        <button id="btnAsk" onclick="btnAskOnQuestionPage()">Ask a question</button>
        <form method="GET">
          <input class="search" type="text" name="search" placeholder="Search..." onKeyPress="return checkSubmit(event)"></input>
        </form>
      </div>
    </div>

    <script>
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
      echo "<script>window.location.href ='./?search=" . $_GET['search']  . "'</script>";
    }
    ?>

  <div id="feedbackFormContainer">
    <form method='GET' class='feedbackForm'>
      <div class="sendFeedbackTextareaContainer">
        <label class="feedbackTextareaLabel">Feedback: </label>
        <textarea rows="7" cols="103" maxlength="2000" name="feedback" class="sendFeedbackTextarea" required></textarea>
      </div>
      <input type="submit" value="Send Feedback" class="SendFeedbackSubmit" >
    </form>
  </body>
</html>
