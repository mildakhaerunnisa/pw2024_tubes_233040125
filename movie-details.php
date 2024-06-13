<?php
require "function.php";

//melakukan query
// $movie = query("SELECT * FROM movies");
// $m2 = query("SELECT * FROM movies");
// $m3 = query("SELECT * FROM movies");
$queryKategori = "SELECT * FROM category";
$result1 = mysqli_query($conn, $queryKategori);
$kategori = mysqli_fetch_assoc($result1);



$name = htmlspecialchars($_GET['name']);
$queryMovies = "SELECT * FROM movies WHERE name = '$name'";

$result = mysqli_query($conn, $queryMovies);
$movie = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Free Guy 2021</title>

  <!--favicon -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- css link-->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- google font link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body id="#top">

  <!--#HEADER-->

  <header class="header" data-header>
    <div class="container">

      <div class="overlay" data-overlay></div>

      <div class="header-actions">

      <a href="index.php" class="btn btn-primary">Home</a>

      </div>

      <button class="menu-open-btn" data-menu-open-btn>
        <ion-icon name="reorder-two"></ion-icon>
      </button>

      <nav class="navbar" data-navbar>

        <div class="navbar-top">
          <button class="menu-close-btn" data-menu-close-btn>
            <ion-icon name="close-outline"></ion-icon>
          </button>

        </div>

        <ul class="navbar-list">

          <li>
            <a href=""></a>
          </li>
        </ul>

        <ul class="navbar-social-list">

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-pinterest"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-youtube"></ion-icon>
            </a>
          </li>

        </ul>

      </nav>

    </div>
  </header>

  <main>
    <article>

      <!--#MOVIE DETAIL-->

      <section class="movie-detail">
        <div class="container">
          <figure class="movie-detail-banner">

            <img src="assets/images/<?php echo $movie['gambar']; ?>" alt="Free guy movie poster">

            <button class="play-btn">
              <ion-icon name="play-circle-outline"></ion-icon>
            </button>

          </figure>

          <div class="movie-detail-content">

            <p class="detail-subtitle">New Episodes</p>

            <h1 class="h1 detail-title">
              <?php echo $movie['name']; ?>
            </h1>

            <div class="meta-wrapper">

              <div class="badge-wrapper">
                <div class="badge badge-fill">PG 13</div>

                <div class="badge badge-outline"><?php echo $movie['Quality']; ?></div>
              </div>

              <p class="genre-wrapper">
              <?php echo $kategori['name']; ?>
            </p>

              <div class="date-time">

                <div>
                  <ion-icon name="calendar-outline"></ion-icon>

                  <time datetime="2021"><?php echo $movie['year']; ?></time>
                </div>

                <div>
                  <ion-icon name="time-outline"></ion-icon>

                  <time datetime="PT115M"><?php echo $movie['hour']; ?></time>
                </div>

              </div>

            </div>

            <p class="storyline">
              <?php echo $movie['storyline']; ?>
            </p>

            <div class="details-actions">

              <button class="share">
                <ion-icon name="share-social"></ion-icon>

                <span>Share</span>
              </button>

              <div class="title-wrapper">
                <p class="title">Streaming</p>

                <p class="text">Online Streaming</p>
              </div>

              <button class="btn btn-primary">
                <ion-icon name="play"></ion-icon>

                <span>Watch Now</span>
              </button>
        </div>
      </section>
    </article>
  </main>


  <!--#FOOTER-->

  <footer class="footer" id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="quicklink-wrapper">
          <ul class="quicklink-list">
          <li>
              <a href="#home" class="quicklink-link">Home</a>
            </li>
            <li>
              <a href="#movie" class="quicklink-link">Movie</a>
            </li>
            <li>
              <a href="#footer" class="quicklink-link">Contact Us</a>
            </li>
            <li>
              <a href="#" class="quicklink-link">Trems of use</a>
            </li>
          </ul>

          <ul class="social-list">

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-pinterest"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>

          </ul>

        </div>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">
        <p class="copyright">
          &copy; 2024 <a href="#">By Milda</a>. All Rights Reserved
        </p>
      </div>
    </div>

  </footer>

  <!--#GO TO TOP -->

  <a href="#top" class="go-top" data-go-top>
    <ion-icon name="chevron-up"></ion-icon>
  </a>

  <!--js link-->
  <script src="./assets/js/script.js"></script>

  <!-- ionicon link-->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>