<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Guide Page</title>

  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <!-- custom css -->
  <link rel="stylesheet" href="CSS/style.css">
  <style>
    body {

      padding: 0;
      background-image: linear-gradient(rgba(20, 23, 61, 0.3), rgba(20, 23, 61, 0.5)), url('img/bg9.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }


    .Gcontainer {

      max-width: 1200px;
      margin: 150px auto;
      padding: 20px;
      background: transparent;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    }

    .Gh1 {
      text-align: center;
      color: #333;
      font-family: verdana;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .video-list {
      list-style: none;
      padding: 0;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      grid-gap: 20px;
    }

    .video-card {
      background: rgba(255, 255, 255, 0.283);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      color: #333;
      text-decoration: none;
      transition: transform 0.3s;
      border: 1px solid white;
    }

    .video-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.6);
    }

    .video-title {
      font-size: 18px;
      margin-bottom: 10px;
    }

    .video-description {
      font-size: 14px;
      margin-bottom: 15px;
    }

    .video-embed {
      width: 100%;
      height: 200px;
      border: none;
    }
  </style>
</head>

<body>
  <?php include ("include/header.php"); ?>
  <div class="Gcontainer">
    <h1 class="Gh1">Learn To Use</h1>
    <ul class="video-list">
      <li>
        <div class="video-card">
          <h2 class="video-title">Background Eraser Guide</h2>
          <p class="video-description">
            Learn how to effectively remove backgrounds from
            images using our Background Eraser tool.
          </p>
          <iframe class="video-embed" src="https://www.youtube.com/embed/1Up3VOyv-yw?si=3dUGW0JQHiiiIsXK"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay;LOOP; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>
        </div>
      </li>
      <li>
        <div class="video-card">
          <h2 class="video-title">Wow Editor Guide</h2>
          <p class="video-description">
            Discover the features and functionalities of our Wow
            Editor tool for creating stunning designs.
          </p>
          <iframe class="video-embed" src="https://www.youtube.com/embed/hBBrpoj_uA8?si=lfQKqqnXPFSWAGPY"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay;LOOP; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>


        </div>
      </li>
      <li>
        <div class="video-card">
          <h2 class="video-title">Image Enhancer Guide</h2>
          <p class="video-description">
            Enhance the quality and appearance of your images
            with our Image Enhancer tool.
          </p>
          <iframe class="video-embed" src="https://www.youtube.com/embed/19aEBa4rMbk?si=DB_tGqBmZq8dE1HT"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>
        </div>
      </li>
      <li>
        <div class="video-card">
          <h2 class="video-title">Wow Result Generator</h2>
          <p class="video-description">
            Learn how to generate result cards easily with easy interface.
          </p>
          <iframe class="video-embed" src="https://www.youtube.com/embed/Jx7E991pRUk?si=l1vhLFMdkSYY9Q7G"
            title="YouTube video player" title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>
        </div>
      </li>
      <li>
        <div class="video-card">
          <h2 class="video-title">Image Compressor Guide</h2>
          <p class="video-description">
            Learn how to compress images without losing quality
            using our Image Compressor tool.
          </p>
          <iframe class="video-embed" src="https://www.youtube.com/embed/bASN8vlKdyA?si=l5bcIfwMfjrXL-9b"
            title="YouTube video player" title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>
        </div>
      </li>

    </ul>
  </div>

  <?php include ("include/footer.php"); ?>
</body>

</html>