<?php include "../include/connection.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Material Design for Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
  <!-- Custom styles -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"
    integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw=="
    crossorigin="anonymous"></script>


  <!-- 1. Bootstrap link -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background: #BFC9CA;
    }

    .sidebar {
      height: 100vh;
      width: 250px;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #2E4053;
      padding-top: 56px;
    }

    .sidebar-header {
      padding: 10px 20px;
      border-bottom: 1px solid #dee2e6;
    }

    .sidebar-header h3 {
      margin: 0;
      font-weight: 700;
    }

    .sidebar .list-group-item {
      border: none;
    }

    .sidebar .list-group-item a {
      text-decoration: none;
      color: #000;
    }

    .sidebar .list-group-item.active {
      background-color: #2E4053;
    }

    .main-content {
      margin-left: 250px;
    }

    .navbar {
      background: #BFC9CA;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
      padding: 0 15px;
    }

    .navbar-light .navbar-toggler {
      border: none;
    }

    .modal-content {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .show-template {
      margin: 100px 0 0 300px;
      width: 400px;
      text-align: center;
      border: 2px solid rgb(255, 255, 255);
      background: transparent;
      backdrop-filter: blur(10px);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.8);
      border-radius: 10px;
      font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;

    }

    .show-template:hover {
      box-shadow: inset 2px 2px 1px red, inset -2px -2px 1px blue;
      transition: box-shadow 0.2s ease;
    }

    .card-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      padding: 20px;
    }

    .show-template {
      background-color: #333;
      color: white;
      text-align: center;
      padding: 20px;
      border-radius: 10px;
      width: 300px;
      /* Adjust width as needed */
    }

    .show-template img {
      max-width: 100%;
      border-radius: 10px;
    }

    .show-template span {
      font-size: 85px;
      font-weight: bold;
    }

    .show-template p {
      font-size: 45px;
      font-weight: bold;
    }

    @media (max-width: 768px) {
      .show-template {
        width: calc(50% - 20px);
      }
    }

    @media (max-width: 576px) {
      .show-template {
        width: calc(100% - 20px);
      }
    }
  </style>

</head>

<body>
  <!--Main Navigation-->
  <header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse ">
      <div class="position-sticky">

        <div class="list-group list-group-flush mx-3 mt-4">
          <a href="#" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
            <span>Main dashboard</span>
          </a>

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary py-3 mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Template
          </button>
          <a href=" galleryImageForm.php" class="btn btn-primary py-3 mt-4" aria-current="true">
            <span>Add Gallery Image</span>
          </a>







        </div>
      </div>
    </nav>
    <!-- Sidebar -->
    <!-- ******************************* M  O D A L  FOR  A D D  TEMPLATES ********************************** -->


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Templates</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="savetemplate.php" method="POST" enctype="multipart/form-data">
              <table class="table">
                <tr>
                  <th>Image : </th>
                  <td><input type="file" required name='aimage' class="form-control"></td>
                </tr>
                <tr>
                  <th>Name : </th>
                  <td><input type="text" required name='aname' class="form-control" placeholder="Name of template"
                      required></td>
                </tr>
                <tr>
                  <th>Orientation : </th>
                  <td><select name="orientation" id="orientation">
                      <option value="select">--Select Your Orientation--</option>
                      <option value="Portrait">Portrait</option>
                      <option value="Landscape">Landscape</option>
                    </select></td>
                </tr>
                <tr>
                  <th>Orientation Code:</th>
                  <td><input type="text" id="assignedValue" name="orcode" pattern="[01]"
                      title="enter Landscape_code = 0 or portrait_code = 1" placeholder="Enter Orientation Code"
                      required></td>
                </tr>
              </table>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="asubmit">ADD</button>
            </form>
          </div>

        </div>
      </div>
    </div>
    <!--******************************************************************************************************** -->



    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
          aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="#">
          <img src="../img/idlogo.png" height="55" alt="" loading="lazy" style="border-radius:50%;" />
        </a>
        <!-- Search form -->
        <form class="d-none d-md-flex input-group w-auto my-auto">
          <input autocomplete="off" type="search" class="form-control rounded"
            placeholder='Search (ctrl + "/" to focus)' style="min-width: 225px" />
          <span class="input-group-text border-0"><i class="fas fa-search"></i></span>
        </form>

        <!-- Right links -->
        <ul class="navbar-nav ms-auto d-flex flex-row">
          <!-- Notification dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
              role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-bell"></i>
              <span class="badge rounded-pill badge-notification bg-danger">1</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Some news</a></li>
              <li><a class="dropdown-item" href="#">Another news</a></li>
              <li>
                <a class="dropdown-item" href="#">Something else</a>
              </li>
            </ul>
          </li>

          <!-- Icon -->
          <li class="nav-item">
            <a class="nav-link me-3 me-lg-0" href="#">
              <i class="fas fa-fill-drip"></i>
            </a>
          </li>
          <!-- Icon -->
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" href="#">
              <i class="fab fa-github"></i>
            </a>
          </li>

          <!-- Icon dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdown" role="button"
              data-mdb-toggle="dropdown" aria-expanded="false">
              <i class="united kingdom flag m-0"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="#"><i class="united kingdom flag"></i>English
                  <i class="fa fa-check text-success ms-2"></i></a>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="poland flag"></i>Polski</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="china flag"></i>中文</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="japan flag"></i>日本語</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="germany flag"></i>Deutsch</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="france flag"></i>Français</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="spain flag"></i>Español</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="russia flag"></i>Русский</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="portugal flag"></i>Português</a>
              </li>
            </ul>
          </li>

          <!-- Avatar -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#"
              id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              <img src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg" class="rounded-circle" height="22"
                alt="" loading="lazy" />
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#">My profile</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
  </header>
  <!--Main Navigation-->
  <div class="card-container">
    <?php
    $getrows = "SELECT * FROM template ";
    $execute = mysqli_query($connect, $getrows);
    $totalrows = mysqli_num_rows($execute);



    ?>

    <a href="../Data Manipulation/templateList.php" style="text-decoration: none;">
      <div class="show-template" style="background:url('../img/bg14.jpg'); background-size:cover;">
        <span style="color:white; font-size:85px;font-weight:bold;">
          <?php echo $totalrows; ?>
        </span>
        <p style="color:white; font-size:45px;font-weight:bold;">Templates</p>
      </div>
    </a>


    <?php
    $getrows = "SELECT * FROM accounttable ";
    $execute = mysqli_query($connect, $getrows);
    $totalrows = mysqli_num_rows($execute);



    ?>

    <a href="../Data Manipulation/UserList.php" style="text-decoration: none;">
      <div class="show-template">
        <span style="color:white; font-size:85px;font-weight:bold;">
          <?php echo $totalrows; ?>
        </span><i class="hello fa fa-male" aria-hidden="true" style="color:white; font-size:85px; margin-left:5px;"></i>
        <p style="color:white; font-size:45px;font-weight:bold;">Total Users</p>
      </div>
    </a>

    <?php
    $getrows = "SELECT * FROM gallery ";
    $execute = mysqli_query($connect, $getrows);
    $totalrows = mysqli_num_rows($execute);



    ?>

    <a href="../Data Manipulation/showGallery.php" style="text-decoration: none;">
      <div class="show-template" style="background:url('../img/bg12.jpg'); background-size:cover;">
        <span style="color:white; font-size:85px;font-weight:bold;">
          <?php echo $totalrows; ?>
        </span>
        <p style="color:white; font-size:45px;font-weight:bold;">Gallery Images</p>
      </div>
    </a>

  </div>
  </main>


  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript" src="js/admin.js"></script>








  <script>
    // FOR CHANGING ORIENTATION CODE
    function updateValue() {
      var orientationSelect = document.getElementById("orientation");
      var assignedValueInput = document.getElementById("assignedValue");

      if (orientationSelect.value === "Portrait") {
        assignedValueInput.value = "1";
      } else if (orientationSelect.value === "Landscape") {
        assignedValueInput.value = "0";
      }
    }
    updateValue();
  </script>





</body>

</html>