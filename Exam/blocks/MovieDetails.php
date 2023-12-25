<?php
require_once "../entities/Film.php";
$filmId = isset($_GET['id']) ? $_GET['id'] : '0';

$apiKey = 'f50642a0';
$apiUrl = "http://www.omdbapi.com/?apikey=$apiKey&i=$filmId";

$obj = new Film('', '', '', '', '', '', '', '', '', '', '');
$film = $obj->getFilmsFromApi($filmId);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <div class="film-details__container">
        <div class="film-details__inner">
            <img src="<?php echo $film->getPoster() ?>" alt="movie-poster" class="film-details__img">
            <div class="film-details__info-blog">
                <h2 class="film-details__title">
                    <?php echo $film->getTitle() ?>
                </h2>
                <p class="film-details__rating">
                    <svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id="Star 1"
                            d="M6 0L7.34708 4.1459H11.7063L8.17963 6.7082L9.52671 10.8541L6 8.2918L2.47329 10.8541L3.82037 6.7082L0.293661 4.1459H4.65292L6 0Z"
                            fill="#CCFF00" />
                    </svg>
                    <?php echo $film->getRating() ?>
                </p>
                <div class="film-details__about">
                    <span class="film-details__year">
                        <?php echo $film->getYear() ?>
                    </span>
                    <span class="film-details__type">
                        <svg width="26" height="18" viewBox="0 0 26 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.15126 13V4.3016H7.1746V8.17751H11.3191V4.3016H12.3425V13H11.3191V9.1241H7.1746V13H6.15126ZM14.6458 13V4.3016H17.7542C18.9822 4.3016 19.9032 4.70667 20.5172 5.51682C21.1312 6.32696 21.4382 7.37162 21.4382 8.6508C21.4382 9.92998 21.1312 10.9746 20.5172 11.7848C19.9032 12.5949 18.9822 13 17.7542 13H14.6458ZM17.7542 5.22261H15.6691V12.079H17.7542C18.6411 12.079 19.3063 11.7635 19.7497 11.1324C20.1931 10.4928 20.4149 9.66561 20.4149 8.6508C20.4149 7.63599 20.1931 6.81305 19.7497 6.18199C19.3063 5.5424 18.6411 5.22261 17.7542 5.22261Z"
                                fill="white" />
                            <rect x="0.5" y="0.5" width="25" height="17" stroke="white" />
                        </svg>

                        <?php echo $film->getType() ?>
                    </span>
                    <span class="film-details__length">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="ic:outline-watch-later">
                                <path id="Vector"
                                    d="M6.50016 1.08325C3.521 1.08325 1.0835 3.52075 1.0835 6.49992C1.0835 9.47908 3.521 11.9166 6.50016 11.9166C9.47933 11.9166 11.9168 9.47908 11.9168 6.49992C11.9168 3.52075 9.47933 1.08325 6.50016 1.08325ZM6.50016 10.8333C4.11141 10.8333 2.16683 8.88867 2.16683 6.49992C2.16683 4.11117 4.11141 2.16659 6.50016 2.16659C8.88891 2.16659 10.8335 4.11117 10.8335 6.49992C10.8335 8.88867 8.88891 10.8333 6.50016 10.8333ZM6.771 3.79158H5.9585V7.04158L8.77516 8.77492L9.2085 8.07075L6.771 6.60825V3.79158Z"
                                    fill="#CCFF00" />
                            </g>
                        </svg>

                        <?php echo $film->getRuntime() ?>
                    </span>
                </div>
                <div class="film-details__genres">
                    <?php foreach ($film->getCategory() as $genre): ?>
                        <p class="film-details__genre">
                            <?php echo $genre ?>
                        </p>
                    <?php endforeach; ?>
                </div>

                <form id="addToCartForm" class="film-actions" method="post" action="AddToCart.php">
                    <input type="hidden" id="filmId" name="filmId" value="<?php echo $filmId; ?>">
                    <button type="submit" id="addToCartButton" class="film-actions__favorites">
                        <img src="../img/icons/add-library.svg" alt="favorite-icon" class="film-actions__icon">
                        <span class="film-actions__tooltip">Add to favorites</span>
                    </button>
                </form>
            </div>
        </div>
        <div class="film-details__other-info-blog">
            <h4>Plot:</h4>
            <p class="film-details__other-info">
                <?php echo $film->getStory() ?>
            </p>
        </div>
        <div class="film-details__other-info-blog">
            <h4>Creators:</h4>
            <p class="film-details__other-info">
                <?php echo $film->getCreators() ?>
            </p>
        </div>
        <div class="film-details__other-info-blog">
            <h4>Actors:</h4>
            <p class="film-details__other-info">
                <?php echo $film->getActors() ?>
            </p>
        </div>
    </div>
</body>

</html>