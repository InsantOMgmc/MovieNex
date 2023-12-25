<?php

class Film
{
    private $title;
    private $poster;
    private $story;
    private $price;
    private $type;
    private $year;
    private $category;
    private $actors;
    private $creators;
    private $rating;
    private $runtime;

    public function __construct($title, $poster, $story, $price, $category, $actors, $creators, $rating, $year, $type, $runtime)
    {
        $this->title = $title;
        $this->poster = $poster;
        $this->story = $story;
        $this->price = $price;
        $this->category = $category;
        $this->actors = $actors;
        $this->creators = $creators;
        $this->rating = $rating;
        $this->year = $year;
        $this->type = $type;
        $this->runtime = $runtime;
    }
    public function getFilmsFromApi($id)
    {
        $apiKey = 'f50642a0';
        $apiUrl = "http://www.omdbapi.com/?apikey=$apiKey&i=$id";

        $response = file_get_contents($apiUrl);
        $data = json_decode($response);
        $genre = explode(', ', $data->Genre);

        $film = new Film($data->Title, $data->Poster, $data->Plot, $data->BoxOffice, $genre, $data->Actors, $data->Writer, $data->imdbRating, $data->Year, $data->Type, $data->Runtime);
        return $film;
    }
    public function addFilmToCart(PDO $pdo, $id, $userId)
    {
        try {

            $poster = $this->getPoster();
            $title = $this->getTitle();
            $type = $this->getType();
            $year = $this->getYear();
            $price = $this->getPrice();
            $query = "INSERT INTO favorites (`film_id`, `film_poster`, `film_title`, `film_price`,`film_type`, `film_year`, `user_Id`) VALUES (?,?,?,?,?,?,?)";
            $blank = $pdo->prepare($query);
            $blank->execute([$id, $poster, $title, $price, $type, $year, $userId]);
        } catch (PDOException $e) {
            if ($e->getCode() == '23000') {
                echo "This movie already exist in your favorites";
            } else {
                echo "database error: " . $e->getMessage();
            }
        }
    }
    public function addFilmToLibrary(PDO $pdo, $id, $userId)
    {
        try {
            $poster = $this->getPoster();
            $title = $this->getTitle();
            $type = $this->getType();
            $year = $this->getYear();
            $price = $this->getPrice();
            $query = "INSERT INTO library (`film_id`, `film_poster`, `film_title`, `film_price`,`film_type`, `film_year`, `user_Id`) VALUES (?,?,?,?,?,?,?)";
            $blank = $pdo->prepare($query);
            $blank->execute([$id, $poster, $title, $price, $type, $year, $userId]);
        } catch (PDOException $e) {
            if ($e->getCode() == '23000') {
                echo "This movie already exist in your favorites";
            } else {
                echo "database error: " . $e->getMessage();
            }
        }
    }
    public function getFilmFromLibrary(PDO $pdo, $userId) {
        $query = "SELECT * FROM library WHERE user_id = ?";
        $blank = $pdo->prepare($query);
        $blank->execute([$userId]);
        return $blank->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getFilmFromCart(PDO $pdo, $userId)
    {
        $query = "SELECT * FROM favorites WHERE user_id = ?";
        $blank = $pdo->prepare($query);
        $blank->execute([$userId]);
        return $blank->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getPoster()
    {
        return $this->poster;
    }
    public function getStory()
    {
        return $this->story;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getCategory()
    {
        return $this->category;
    }
    public function getActors()
    {
        return $this->actors;
    }
    public function getCreators()
    {
        return $this->creators;
    }
    public function getRating()
    {
        return $this->rating;
    }
    public function getType()
    {
        return $this->type;
    }
    public function getYear()
    {
        return $this->year;
    }
    public function getRuntime()
    {
        return $this->runtime;
    }
}