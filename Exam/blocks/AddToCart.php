<?php
require_once "../entities/Film.php";
session_start();
define("HOST", 'localhost');
define("DATABASE", "movienex");
define("CHARSET", "utf8");
define("USER", "root");
define("PASSWORD", '');
$pdo = new PDO('mysql:host=' . HOST . ";dbname=" . DATABASE . ';charset=' . CHARSET, USER, PASSWORD);

$id = isset($_POST['filmId']) ? $_POST['filmId'] : 'null';
$apiKey = 'f50642a0';
$apiUrl = "http://www.omdbapi.com/?apikey=$apiKey&i=$id";

$response = file_get_contents($apiUrl);
$data = json_decode($response);
$genre = explode(', ', $data->Genre);

$film = new Film($data->Title, $data->Poster, $data->Plot, $data->BoxOffice, $genre, $data->Actors, $data->Writer, $data->imdbRating, $data->Year, $data->Type, $data->Runtime);

$film->addFilmToCart($pdo, $id, $_SESSION['user_id']);

header("Location: Favorites.php");