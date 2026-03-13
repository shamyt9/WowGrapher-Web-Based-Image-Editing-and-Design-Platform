<?php
session_start();
include ("include/connection.php");

$created = $_SESSION['email'];
if (!$created) {
  header("Location:userlogin.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Templates</title>
  <!-- ================REMIXICON LINK================================ -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

  <!-- ==============================BOXICON LINKS============================= -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <!-- ===========================>>>FONT AWESOME LINK <<<=================== -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- =========================CUSTOME CSS======================= -->


  <link rel="stylesheet" href="CSS/style.css"> <!--Index Link CSS Link-->
  <style>
    .templatesHeading {
      font-size: 3rem;
      font-family: verdana;
      font-weight: bold;
      text-align: center;
      margin-top: 50px;
    }

    .stock-container {
      border: 2px dotted rgb(223, 223, 223);
      padding: 20px;
      background: rgba(255, 255, 255, 0.239);
      backdrop-filter: blur(20px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
      margin-top: 20px;
    }

    .template-cards .card {
      cursor: pointer;
      color: black;
      margin-bottom: 20px;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.3);
    }

    .template-cards .card:hover {
      box-shadow: -1px -1px 1px red, inset -2px -2px 2px white;
      transition: 0.2s ease-in-out;
    }

    .template-cards .card p {
      text-align: center;
      font-size: 1.5rem;
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      color: rgb(34, 34, 34);
    }

    @media screen and (max-width: 767px) {
      .template-cards .card img {
        width: 399px;
      }

      .template-cards .card {
        width: 400px;
      }

      .searchBoxContainer #search-btn {

        float: right;
        font-size: 20px;
        color: #4B4B4B;
        border: none;
        cursor: pointer;
      }
    }

    /* Additional styles for hr */
    hr {
      height: 10px;
      border-radius: 20px;
      background: transparent;
      box-shadow: 0px 0px 10px black, inset 2px 2px white;
      margin-top: 20px;
    }

    .searchBox_select {
      display: flex;
      flex-direction: row;
      width: 100%;
      overflow: hidden;
      border: 1px solid #C1C1C1;
      border-radius: 10px;
    }

    .custom-select {
      position: relative;
      width: 20%;
    }

    .custom-select select {
      width: 100%;
      padding: 8px;
      color: #4B4B4B;
      font-family: verdana;
      font-weight: bold;
      appearance: none;
      background-color: #D8D8D8;
      outline: none;
      border: none;
      cursor: pointer;
      letter-spacing: 2px;
    }



    .custom-select::after {
      content: '\25BC';
      /* Unicode character for down arrow */
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      pointer-events: none;
      /* Ensures the arrow doesn't interfere with select functionality */
    }

    .custom-select select:focus {
      outline: none;
    }

    .custom-select select::-ms-expand {
      display: none;
      /* Removes default arrow in IE */
    }

    .custom-select select option {
      padding: 10px;
      border-bottom: 1px solid #ccc;
      background-color: #fff;
      font-size: 20px;
    }

    .searchBoxContainer {
      width: 80%;
    }

    .searchContainer {
      width: 100%;
      background: white;
      display: flex;
      flex-direction: row;
      justify-content: space-between;
      align-items: center;

    }

    .searchBoxContainer #search {
      width: 90%;
      padding: 6px;
      outline: none;
      border: none;
      color: #4B4B4B;
      font-size: 20px;
    }

    .searchBoxContainer #search-btn {
      float: right;
      margin-right: 10px;
      font-size: 20px;
      color: #4B4B4B;
      border: none;
      cursor: pointer;
    }

    .searchBoxContainer #search-btn:hover {
      color: red;
      scale: 1.2;
      transition: 0.2s;
    }

    .stock-container #noRecord {
      text-align: center;
      font-size: 50px;

    }
  </style>

</head>

<body>
  <?php include ("include/header.php"); ?>

  <div style="margin-top:200px;">
    <p class="templatesHeading">Stock Collection</p>
  </div>

  <div class="container template-container">

    <div class="searchBox_select">
      <div class="custom-select">
        <select id="orientation" name="orient">
          <option value="all" selected>All</option>
          <option value="portrait">Portrait</option>
          <option value="landscape">Landscape</option>
        </select>

      </div>
      <div class="searchBoxContainer">
        <dir class="searchContainer">
          <input type="text" placeholder=" Type to Search..." id="search">
          <i class="fas fa-search" id="search-btn" readonly></i>
      </div>
    </div>


    <hr
      style="height:10px;border-radius:20px;background:transparent;box-shadow:0px 0px 10px black,inset 2px 2px white;">

    <div class="row stock-container">
      <!-- data is loading from backend -->
    </div>
  </div>
  </div>

  <?php include ("include/footer.php"); ?>

  <!-- =======================LINKS OF ICONS (SEARCH)============================= -->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  <!-- =====================SWIPPER .JS LINK ===================================== -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <!-- ======================JQUERY CDN LINK================================ -->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>

  <!-- ===================== SCRIPT JS ================================ -->
  <script>
    $(document).ready(function () {
      var flag = false;

      $("#orientation").on("change", function () {
        flag = true;
        var selectedValue = $(this).val();

        // AJAX call inside the change event handler
        $.ajax({
          url: "backendCode/templateRetrieve.php",
          type: "POST",
          data: { selected: selectedValue },
          success: function (data) {
            if (data) {
              $(".stock-container").html(data);
            } else {

              window.location.href = "include/404Error.php";
            }
          }
        });
      });

      // Check if flag is false, i.e., no change event occurred
      if (!flag) {
        var selectedValue = $("#orientation").val();
        $.ajax({
          url: "backendCode/templateRetrieve.php",
          type: "POST",
          data: { selected: selectedValue },
          success: function (data) {
            if (data) {
              $(".stock-container").html(data);
            } else {

              window.location.href = "include/404Error.php";
            }
          }
        });
      }


      //live search option
      $("#search").on("keyup", function () {
        var value = $(this).val();

        $.ajax({
          url: 'backendCode/templateLiveSearch.php',
          type: 'POST',
          data: { search: value },
          success: function (data) {
            if (data) {
              $(".stock-container").html(data);

            }
            else {
              $(".stock-container").html("<p id='noRecord'>No Record Found</p>");

            }
          }
        })

      });


      //load more code
      /* $(document).on("click", ".loadMoreBtn", function () {
         var lastId = $(this).data("id");
         $(this).remove();
         loadImages(lastId);
 
       })*/




    });

  </script>


</body>

</html>