<?php
require 'function.php';
//melakukan query
$movie = query("SELECT * FROM movies");
$m2 = query("SELECT * FROM movies");
$m3 = query("SELECT * FROM movies");



// Cek apakah ada parameter "query" yang dikirimkan melalui Ajax
if (isset($_GET['query'])) {
  $searchQuery = $_GET['query'];

  // Melakukan query dengan menggunakan parameter pencarian
  $movies = query("SELECT * FROM movies WHERE name LIKE '%$searchQuery%'");

}


?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feel Movie</title>

  <!--favicon -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!--css link-->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!--google font link-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body id="top">

  <!--HEADER -->
  <header class="header" data-header>
    <div class="container">
      <div class="overlay" data-overlay></div>
      <div class="header-actions">
        <a href="login.php" class="btn btn-primary">Log Out</a>
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
          <li><a href="#hero" class="navbar-link">Home</a></li>
          <li><a href="#movie" class="navbar-link">Movie</a></li>
          <li><a href="#footer" class="navbar-link">Contact Us</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <article>
      <!-- HERO-->

      <section class="hero" id="hero">
        <div class="container">

          <div class="hero-content">

            <p class="hero-subtitle">Feelmovie</p>

            <h1 class="h1 hero-title">
              <strong>Movie</strong>, Animations, TVs Shows, & More.
            </h1>

            <div class="meta-wrapper">
              <div class="badge-wrapper">
                <div class="badge badge-fill">PG 18</div>
                <div class="badge badge-outline">HD</div>
              </div>
              <div class="genre-wrapper">
                <p>Online Streaming</p>
              </div>
              <div class="date-time">
                <div>
                  <ion-icon name="calendar-outline"></ion-icon>
                  <time datetime="2024">2024</time>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!--MOVIE-->

      <section class="upcoming" id="movie">
        <div class="container">
          <div class="flex-wrapper">
            <div class="title-wrapper">
              <p class="section-subtitle">Online Streaming</p>
              <h2 class="h2 section-title">Movies</h2>
            </div>
            <ul class="filter-list">
              <li>
                <button class="filter-btn" onclick="scrollToSection('movie')">Movie</button>
              </li>
            </ul>
          </div>

          <ul class="movies-list has-scrollbar">
            <?php $count = 0; ?>
            <?php foreach ($movie as $movie) : ?>
              <?php if ($movie['id'] != 20 && $count <= 3) :
              ?>

                <li>
                  <div class="movie-card">
                    <a href="./movie-details.php?name=<?= urlencode($movie['name']) ?>">
                      <figure class="card-banner">
                        <img src="./assets/images/<?= $movie["gambar"]; ?>">
                      </figure>
                    </a>
                    <div class="title-wrapper">
                      <a>
                        <h1 class="h1 hero-title card-title"><?= $movie["name"] ?></h1>
                      </a>
                      <time><?= $movie["year"] ?></time>
                    </div>
                    <div class="card-meta">
                      <div class="badge badge-outline"><?= $movie["Quality"]; ?></div>
                      <div class="duration">
                        <ion-icon name="time-outline"></ion-icon>
                        <time><?= $movie["hour"] ?></time>
                      </div>
                      <div class="rating">
                        <ion-icon name="star"></ion-icon>
                        <data><?= $movie["Rating"]; ?></data>
                      </div>
                    </div>
                  </div>
                </li>
                <?php $count++; ?>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>

      </section>


  <!--#FOOTER -->

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
                <ion-icon name="logo-instagram"></ion-icon>
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
          &copy; 2024 <a href="#">Milda</a>. All Rights Reserved
        </p>
      </div>
    </div>
  </footer>

  <!--GO TO TOP -->

  <a href="#top" class="go-top" data-go-top>
    <ion-icon name="chevron-up"></ion-icon>
  </a>

  <!--js link -->
  <script src="./assets/js/script.js"></script>

  <script>
    function scrollToSection(sectionId) {
      var section = document.getElementById(sectionId);
      if (section) {
        section.scrollIntoView({
          behavior: "smooth"
        });
      }
    }
  </script>

  <script>
    var searchInput = document.getElementById('search-input');
    var searchResults = document.getElementById('search-results');

    searchInput.addEventListener('keyup', function() {
      var query = searchInput.value.trim();

      if (query !== '') {
        // Membuat objek XMLHttpRequest
        var xhr = new XMLHttpRequest();

        // Menentukan callback untuk menangani respon dari server
        xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
              // Menguraikan respon JSON menjadi array objek
              var movies = JSON.parse(xhr.responseText);

              // Menghapus hasil pencarian sebelumnya
              searchResults.innerHTML = '';

              // Menampilkan hasil pencarian baru
              for (var i = 0; i < movies.length; i++) {
                var movie = movies[i];
                var li = document.createElement('li');
                li.textContent = movie.name;
                searchResults.appendChild(li);
              }
            } else {
              console.log('Request error:', xhr.status);
            }
          }
        };

        // Mengirim request GET ke file search.php dengan parameter query
        xhr.open('GET', 'search.php?query=' + encodeURIComponent(query), true);
        xhr.send();
      } else {
        // Jika kotak pencarian kosong, hapus hasil pencarian sebelumnya
        searchResults.innerHTML = '';
      }
    });
  </script>


  <!--ionicon link-->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>