<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FOOTER_SECTION</title>
  <!-- ==================================BOOTSTRAP LINK================== -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <!-- ================REMIXICON LINK================================ -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

  <!-- ==============================BOXICON LINKS============================= -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <!-- ===========================>>>FONT AWESOME LINK <<<=================== -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


  <link rel="stylesheet" href="../css/style.css"> <!--Index Link CSS Link-->

</head>

<body>
  <section id="contact">



    <div class="contact-wrapper">

      <!-- Left contact page -->

      <form id="contact-form" class="form-horizontal" role="form" action="include/saveFeedback.php" method="POST">
        <p class="footerHeader">FEEDBACK</p>
        <div class="form-group">
          <div class="col-sm-12">
            <input type="text" class="form-control" id="name" placeholder="NAME" name="name" value="" required
              style="background:transparent; border: 2px solid white;">
          </div>
        </div>



        <textarea class="form-control" id="feedbackTextarea" maxlength="280" rows="5" cols="50" placeholder="FEEDBACK"
          name="feedback" required style="background:transparent; border: 2px solid white;"></textarea>

        <button class="btn send-button" id="submit" type="submit" name="submitReview">
          <div class="alt-send-button">
            <i class="fa fa-paper-plane"></i><span class="send-text">SEND</span>
          </div>

        </button>

      </form>

      <!--  -->

      <!-- Left contact page -->

      <div class="direct-contact-container">
        <p class="footerHeader">Social Links</p>

        <ul class="contact-list">
          <li class="list-item"> <i class="fa-solid fa-envelope fa-2x"></i><span
              class="contact-text place">wow9@gmail.com</span></i></li>

          <li class="list-item"><i class="fa-brands fa-facebook fa-2x"></i><span class="contact-text phone"><a href=""
                title="Give me a call">FACEBOOK</a></span></i></li>

          <li class="list-item"><i class="fa-brands fa-youtube fa-2x"></i><span class="contact-text gmail"><a
                href="https://www.youtube.com/@wowgrapherweb" title="Send me an email"
                target="_blank">YOUTUBE</a></span></i></li>

          <li class="list-item"><i class="fa-brands fa-instagram fa-2x"></i> <span class="contact-text gmail"><a
                href="mailto:#" title="Send me an email">INSTAGRAM</a></span></i></li>

        </ul>
      </div>

      <div class="upcoming-feature-container">
        <p class="footerHeader">Upcoming Features</p>
        <ul>
          <li><a href="../coder/index.php" style="text-decoration:none;">Wow Learner</a></li>
          <li>Wow Developer Mode</li>
          <li>Wow Seller</li>
        </ul>
      </div>

    </div>
    <hr>

    <div class="copyright">&copy; 2023 WowGrapher. All rights reserved.</div>

  </section>
  <!-- ===================================================================================== -->
</body>

</html>