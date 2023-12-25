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
$allSum = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/order.css">
</head>

<body>
    <div class="container">
        <div class="order__inner">
            <div class="order__description">
                <p>POSTER</p>
                <p>TITLE</p>
                <p>PRICE</p>
            </div>

            <form action="Order.php" method="post">
                <?php foreach ($films as $film): ?>
                    <div class="order">
                        <input type="radio" name="selected_film_id" value="<?php echo $film['film_id']; ?>">
                        <div class="order__item">
                            <img src="<?php echo $film['film_poster'] ?>" alt="film-poster" class="order__item-poster">
                            <div class="order__item-info">
                                <h2 class="order__item-title">
                                    <?php echo $film['film_title'] ?>
                                </h2>
                                <span class="film__item-year">
                                    <?php echo $film['film_year'] ?>
                                </span>
                                <span class="film__item-type">
                                    <?php echo $film['film_type'] ?>
                                </span>
                            </div>
                            <p class="order__item-price">
                                <?php
                                $num = str_replace(['$', ','], '', $film['film_price']);
                                $price = intval($num) % 120;
                                $allSum += $price;
                                echo $price . " $";
                                ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach ?>
                <p class='order__total-sum'>
                    To pay:
                    <?php echo $allSum . "$" ?>
                </p>
                <input type="text" placeholder="Name" class='card__input'>
                <input type="password" placeholder='Code...' class='card__input'>
                <br>
                <button type="submit" class='buy-btn'><a href="Library.php">Buy</a></button>
            </form>
        </div>

    </div>
</body>

</html>

<?php
// Добавляем проверку, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Проверяем, что выбран фильм (если необходимо выбрать обязательно)
    if (isset($_POST['selected_film_id'])) {
        $selectedFilmId = $_POST['selected_film_id'];

        $obj = new Film('', '', '', '', '', '', '', '', '', '', '');
        $film = $obj->getFilmsFromApi($selectedFilmId);
        $newObj = new Film($film->getTitle(), $film->getPoster(), $film->getStory(), $film->getPrice(), $film->getCategory(), $film->getActors(), $film->getCreators(), $film->getRating(), $film->getYear(), $film->getType(), $film->getRuntime());
        $newObj->addFilmToLibrary($pdo, $selectedFilmId, $_SESSION['user_id']);

        $stmt = $pdo->prepare("DELETE FROM favorites WHERE film_id = ? AND user_id = ?");
        $stmt->execute([$selectedFilmId, $_SESSION['user_id']]);
    }
}
?>