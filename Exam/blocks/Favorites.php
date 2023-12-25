<?php
require_once "../entities/Film.php";
session_start();
define("HOST", 'localhost');
define("DATABASE", "movienex");
define("CHARSET", "utf8");
define("USER", "root");
define("PASSWORD", '');
$pdo = new PDO('mysql:host=' . HOST . ";dbname=" . DATABASE . ';charset=' . CHARSET, USER, PASSWORD);

$film = new Film('', '', '', '', '', '', '', '', '', '', '');
$films = $film->getFilmFromCart($pdo, $_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <section class="section-films" id="section-films">
        <div class="container">
            <div class="section-films__inner">
                <div class="films__controls">
                    <h2 class="section__title">Your <span>Favorites</span> movies</h2>
                    <a href="Order.php">Going shopping?</a>
                </div>
                <div class="films__container" id='films__container'>
                    <?php foreach ($films as $film): ?>
                        <div class="film__item" data-id='<?php echo $film['film_id'] ?>'>
                            <img src="<?php echo $film['film_poster'] ?>" alt="film-poster" class="film__item-poster">
                            <p class="film__item-title">
                                <?php echo $film['film_title'] ?>
                            </p>
                            <div class="film__item-info">
                                <span class="film__item-year">
                                    <?php echo $film['film_year'] ?>
                                </span>
                                <span class="film__item-type">
                                    <?php echo $film['film_type'] ?>
                                </span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</body>

</html>