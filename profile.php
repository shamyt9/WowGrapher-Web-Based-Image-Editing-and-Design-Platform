<?php
session_start();
include("include/connection.php");

$created = $_SESSION['email'];
if ($created) {

} else {
  header("Location:userlogin.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <!-- font awesome -->
  <!-- ===========================>>>FONT AWESOME LINK <<<=================== -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- ================================================================== -->

  <title>Document</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background: url("img/aboutBackground.jpg");
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;

    }

    .profile-container {
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      margin-top: 100px;
      border: 2px solid white;

      border-radius: 15px;
      padding: 30px;
      background: transparent;
      backdrop-filter: blur(5px);
      box-shadow: -1px 1px 10px #566573, inset 2px 2px 2px rgb(148, 215, 148);
      height: auto;
    }

    .profile-container h1 {
      text-align: center;
      font-size: 3rem;
      color: white;
    }

    .profile-container h2 {

      text-align: center;
      font-size: 2.5rem;
      color: white;
      margin-top: 50px;
    }

    .profile-container p {

      text-align: center;
      font-size: 1.4rem;
      color: white;
      margin-top: 50px;
    }

    .profile-container img {
      width: 300px;
      height: 300px;
      border-radius: 50%;
      border: 5px solid white;
      margin-right: 40%;
      margin-top: 50px;
    }

    @media (max-width:1199px) {
      .profile-container img {
        margin-right: 50px;
        width: 250px;
        height: 250px;
        border-radius: 50%;
      }
    }

    @media (max-width:767px) {
      .profile-container img {
        margin-left: 130px;
        width: 200px;
        height: 200px;
        border-radius: 50%;
      }
    }

    .editimage {
      color: white;
      text-align: center;
      background: none;
      margin-left: 70px;
      margin-top: 10px;
      border: none;
      outline: none;
    }

    .editimage:hover {
      color: blue;
      background-color: white;
      padding: 5px;
      border-radius: 20px;
    }

    .file-input-container {
      display: inline-block;
      position: relative;
      overflow: hidden;
      border: 2px solid white;
      border-radius: 20px;
      margin-top: 30px;
      cursor: pointer;
      padding: 5px;
      margin-left: 70px;
    }

    /* Style for the file input */
    .file-input {
      position: absolute;
      top: 0;
      left: 0;
      opacity: 0;
      font-size: 100px;
      cursor: pointer;
    }

    /* Style for the clickable text or button */
    .file-input-label {
      display: inline-block;
      color: #fff;
      font-size: 2rem;
      background-color: #3498db;
      padding: 10px;
      cursor: pointer;
      border-radius: 5px;
    }

    .change {
      margin: 17px 85px;

    }

    /* gallery images  */
    .gallery {
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    }

    .lcard .image {
      display: flex;
      flex-direction: column;
      height: 300px;
      border: 5px solid white;
      padding: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    }

    .lcard .image img {
      max-width: 100%;
      max-height: 70%;
      object-fit: contain;
      border-radius: 5px;
    }

    .lcard {
      display: grid;
      grid-gap: 10px;
      grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
      grid-auto-rows: 300px;
    }

    .image:hover {
      border: 4px solid red;
      transition: transform 0.2s;
      cursor: pointer;
    }

    .fullscreen {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url('img/aboutBackground.jpg');
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999;
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.3s ease;
    }

    .fullscreen.active {
      opacity: 1;
      pointer-events: auto;
    }

    .fullscreen img {
      max-width: 90%;
      max-height: 90%;
    }

    .galleryContainer {
      margin-top: 150px;
      height: auto;
      padding: 20px;
    }

    .textElement {
      display: flex;
      flex-direction: column;
      line-height: 5px;
      text-align: center;
      margin-top: 15px;
    }

    .textElement p {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      font-size: 20px;
      font-weight: bold;
      border-radius: 10px;
    }

    .creatorLikes {
      display: flex;
      flex-direction: row;
      justify-content: space-around;
      margin-top: 5px;
    }

    .like-icon {
      position: absolute;
      font-size: 25px;
      color: black;
    }

    .like-icon:hover {
      font-size: 26px;
      transition: 0.2s ease;
      color: red;
      -webkit-text-fill-color: red;
    }

    .like-icon.liked {
      color: red;
    }

    .galleryHeader {
      font-size: 50px;
      font-weight: bold;
      text-align: center;
      color: black;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
  </style>

</head>

<body>
  <?php include("include/header.php"); ?>
  <div class="container profile-container">
    <div class="row">
      <h1 class="user-name">
        <?php echo $_SESSION['username']; ?>
      </h1>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        <img src='backendimages/<?php echo $_SESSION["pimage"]; ?>'>
        <button type="button" class="btn btn-primary change" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Change profile
        </button>

      </div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        <h2>Your Review</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque tenetur aperiam deserunt. Quasi harum quidem
          itaque rem dicta at minima amet officia, quibusdam omnis odit. Nostrum assumenda necessitatibus quod! Qui sint
          voluptatem tempore quam reprehenderit animi doloremque voluptatum obcaecati in dolorem, voluptatibus hic
          perferendis explicabo nulla, ad sunt, alias illum repellat quaerat. Molestias, incidunt earum! Neque sequi eos
          dolorum? Maiores sunt rerum unde quod aut? Incidunt rem illo accusantium reprehenderit!</p>
      </div>

    </div>
  </div>

  <!-- gallery section -->
  <div class="container galleryContainer">
    <p class="galleryHeader">Liked Images</p>
    <div class="gallery">
      <div class="lcard">
        <?php
        $id = $_SESSION['id'];
        // Modified query to retrieve only liked images
        $gettingdata = "SELECT * FROM gallery INNER JOIN likes ON gallery.gallery_id = likes.gallery_id WHERE likes.id = $id";
        $result = mysqli_query($connect, $gettingdata);
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="image">


              <img src="backendimages/<?php echo $row["gallery_image"]; ?>" alt="Image 1">
              <div class="textElement">
                <p style="color: navy;">
                  <?php echo $row["galery_image_name"]; ?>
                </p>
                <div class="creatorLikes">
                  <p class="btn btn-primary">Created by:
                    <?php echo $row["creator"]; ?>
                  </p>
                  <p class="btn btn-danger">Likes:
                    <?php echo $row["image_likes"]; ?>
                  </p>
                </div>
              </div>
            </div>
            <?php
          }
        } else {
          echo "Error: " . mysqli_error($connect);
        }
        ?>
      </div>
    </div>
  </div>
  <div class="fullscreen" id="fullscreen"></div>


  <!-- ===========================MODAL================================ -->
  <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="saveProfile.php" method="POST" enctype="multipart/form-data">
            <div class="file-input-container">
              <input type="file" name="profileimage" id="profileImage" class="file-input">
              <label for="profileImage" class="file-input-label">Choose Profile</label>

            </div>


            <button type="submit" class="btn btn-primary" name="save">Save changes</button>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
  <script>
    $(document).ready(function () {
      // image 
      const images = document.querySelectorAll('.image img');
      const fullscreen = document.getElementById('fullscreen');
      images.forEach(img => {
        img.addEventListener('click', function () {
          fullscreen.innerHTML = `<img src="${this.src}" alt="${this.alt}">`;
          fullscreen.classList.toggle('active');
        });
      });
      fullscreen.addEventListener('click', function () {
        this.classList.remove('active');
      });
    });
  </script>
</body>

</html>