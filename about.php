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

    <div class="aboutContainer">
      <h1>About us</h1>
      <p>FlowOverStack is a popular question and answer site. You can ask or answer any question you want! For
        a fast answer, simply use the "Ask a question" button at the top of the page, or click on a question in the
        home page to answer or view answers on a question.
      </p>
    </div>
  </body>
</html>
