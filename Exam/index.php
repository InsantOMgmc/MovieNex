<?php
session_start();
if (isset($_POST['logout'])) {
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieMany</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="wrapper">
        <header class="header">
            <div class="container">
                <div class="header__inner">

                    <a href="#logo" class="logo">
                        <img src="img/header/Logo.svg" alt="logo">
                        MovieNex
                    </a>

                    <nav class="header__nav">
                        <ul class="header__nav-list">
                            <li class="header__nav-item">
                                <a href="#section-films" class="header__nav-link">Films</a>
                            </li>
                            <li class="header__nav-item">
                                <a href="#benefits" class="header__nav-link">Benefits</a>
                            </li>

                            <li class="header__nav-item">
                                <a href="#" class="header__nav-link">About</a>
                            </li>
                            <?php if (isset($_SESSION['user_email'])): ?>
                                <li class="sidebar__list-item">
                                    <a href="blocks/Library.php" class="header__nav-link">Library</a>
                                </li>
                                <li class="sidebar__list-item">
                                    <a href="blocks/Favorites.php" class="header__nav-link">Favorites</a>
                                </li>
                                <li class="sidebar__list-item">
                                    <a href="blocks/logout.php" class="header__logout">Log out</a>
                                </li>

                            <?php else: ?>
                                <a href="pages/login.html" class="header__login">Sign in</a>
                            <?php endif; ?>
                        </ul>
                    </nav>
                    <div class="burger">
                        <span></span>
                    </div>
                </div>
            </div>
        </header>

        <main class="main">
            <div class="hero" style="background-image: url(img/header/hero.jpg);"></div>
            <section class="secton-hero">
                <div class="container">
                    <div class="hero-item">
                        <div class="hero__title-blog">
                            <h1 class="hero__title">
                                <span>Explore</span> the Boundless World of <span>Cinema</span> with
                                <span>MovieNex</span>
                            </h1>
                            <p class="hero__subtitle">"A Guide to the World of Endless Possibilities in Cinema."<br>
                                "Every movie is a new adventure. Discover the exciting <br> world of cinema."</p>
                        </div>
                        <div class="hero__links">
                            <a href="#section-films" class="hero__watch-btn">
                                <img src="img/hero/icon-watch.svg" alt="icon-watch">
                                Watch now
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section-films" id="section-films">
                <div class="container">
                    <div class="section-films__inner">
                        <div class="films__controls">
                            <h2 class="section__title">Our <span>Movies</span> </h2>
                            <div class="films-controls__search-container">
                                <input type="text" placeholder='Search...' class='films-controls__search'
                                    id='search-movie' onkeyup="findMovies()">
                            </div>
                        </div>
                        <div class="films__container" id='films__container'>
                        </div>
                        <div id="pagination-buttons" class='pagination'>
                            <button id="prev" class='pagination__btn'>Prev</button>
                            <span id="current-page" class='pagination__counter'>1</span>
                            <button id="next" class='pagination__btn'>Next</button>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section-benefits" id="benefits">
                <div class="container">
                    <h2 class="section__title">Benefits</h2>
                    <div class="benefits__container">
                        <div class="benefits__item">
                            <img src="img/benefits/icon1.png" alt="benefits-icon" class="benefits__item-icon">
                            <h2 class="benefits__item-title">Wide <span>range</span> of content</h2>
                            <p class="benefits__item-subtitle">
                                The site provides a wide selection of movies, including different genres, release years,
                                countries of production and other parameters. This ensures that the interests of a
                                diverse audience are catered to, allowing users to easily find and buy movies according
                                to their preferences.
                            </p>
                        </div>
                        <div class="benefits__item">
                            <img src="img/benefits/icon2.png" alt="benefits-icon" class="benefits__item-icon">
                            <h2 class="benefits__item-title">Convenience <span>and</span> accessibility</h2>
                            <p class="benefits__item-subtitle">
                                Users can easily and conveniently purchase movies directly through the website, avoiding
                                the need to visit stores or wait for delivery. The electronic form of purchase provides
                                instant access to content, which is especially convenient for those who prefer streaming
                                or digital movie downloads.
                            </p>
                        </div>
                        <div class="benefits__item">
                            <img src="img/benefits/icon3.png" alt="benefits-icon" class="benefits__item-icon">
                            <h2 class="benefits__item-title">Personalized <span>shopping</span></h2>
                            <p class="benefits__item-subtitle">
                                The site can offer personalized movie recommendations
                                based on a user's previous purchases, views or interests. This creates a unique and
                                adaptive experience that promotes customer retention and encourages additional
                                purchases, improving consumer satisfaction.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

        </main>

        <footer class=" footer">
        </footer>
    </div>

    <script src="js/main.js"></script>
    <script src="js/films.js"></script>
</body>

</html>