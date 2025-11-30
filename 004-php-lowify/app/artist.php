<?php

require_once __DIR__ . '/inc/page.inc.php';
require __DIR__ . '/inc/database.inc.php';

$host = "mysql";
$dbname = "lowify";
$username = "lowify";
$password = "lowifypassword";
$db = null;

try {
    $db = new DatabaseManager(
        dsn: "mysql:host=$host;dbname=$dbname; charset=utf8mb4",
        username: $username,
        password: $password
    );
} catch (PDOException $ex) {
    die("Error connecting to database" . $ex->getMessage());
}

$idArtist = $_GET["id"];

$artists = [];

try {
    $artists = $db->executeQuery(<<< SQL
        SELECT 
            id,
            name,
            biography,
            cover,
            monthly_listeners
        FROM artist
        WHERE id = $idArtist
SQL);
} catch (PDOException $ex) {
    die("Erreur lors de la requette artists" . $ex->getMessage());
}

$artist = $artists[0];

$artistId = $artist["id"];
$artistName = $artist['name'];
$artistBiography = $artist['biography'];
$artistCover = $artist['cover'];
$artistMonthlyListeners = $artist['monthly_listeners'];

$songs = [];

try {
    $songs = $db->executeQuery(<<< SQL
        SELECT
        song.name,
        song.note,
        album.cover
    FROM song
             INNER JOIN album ON song.album_id = album.id
    WHERE song.artist_id = :artistId
    ORDER BY note DESC
    LIMIT 5
SQL, ["artistId" => $artistId]);
} catch (PDOException $ex) {
    die("Erreur lors de la requette songs" . $ex->getMessage());
}

$songInfosHtml = "";

foreach ($songs as $songArtist) {
    $songName = $songArtist['name'];
    $songNote = $songArtist['note'];
    $albumCover = $songArtist['cover'];
    $songInfosHtml .= <<< HTML
        <p>$songName NOTE : $songNote</p>
        <br>
        <img src="$albumCover" width="300" alt="img-cover-album">
        <br>
HTML;
}

$albums = [];

try {
    $albums = $db->executeQuery(<<< SQL
    SELECT
        album.id,
        album.name
    FROM album
    WHERE artist_id = $artistId
SQL);
} catch (PDOException $ex) {
    die("Erreur lors de la requette albums" . $ex->getMessage());
}

foreach ($albums as $album) {
    echo $album["name"];
}

$html = <<< HTML
    <h1>$artistName</h1>
    <h2>$artistBiography</h2>
    <img src="$artistCover" width="300" alt="cover-artist">
    <p>Nombre d'écoutes mensuels : $artistMonthlyListeners</p>
    <div>
        <h2>Top 5 songs : </h2>
        $songInfosHtml
    </div>
HTML;


echo (new HTMLPage(title: "Lowify - Artistes"))
    ->addContent($html)
//    ->addContent($songsArtist)
    ->addHead('<meta charset="utf-8" />')
    ->addHead('<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />')
    ->addBodyAttribute("class", "bg-dark text-white p-4")
    ->render();
