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
    $errorMessage = "Erreur lors de la requette artists";
    header("Location: error.php?message=$errorMessage");
}

if ($artists == null) {
    $errorMessage = "L'artiste avec l'ID $idArtist n'a pas été trouvé";
    header("Location: error.php?message=$errorMessage");
}

$artist = $artists[0];

$artistId = $artist["id"];
$artistName = $artist['name'];
$artistBiography = $artist['biography'];
$artistCover = $artist['cover'];
$artistMonthlyListeners = $artist['monthly_listeners'];
if ($artistMonthlyListeners >= 1000000) {
    $artistMonthlyListeners = $artistMonthlyListeners / 1000000;
    $artistMonthlyListeners = number_format($artistMonthlyListeners, 1) . "M";
} elseif ($artistMonthlyListeners >= 1000) {
    $artistMonthlyListeners = $artistMonthlyListeners / 1000;
    $artistMonthlyListeners = number_format($artistMonthlyListeners, 1) . "K";
}

$songs = [];

try {
    $songs = $db->executeQuery(<<< SQL
        SELECT
        song.name,
        song.note,
        song.duration,
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

foreach ($songs as $song) {
    $songName = $song['name'];
    $songNote = $song['note'];

    $songDuration = $song['duration'];
    $minutes = $songDuration / 60;
    $secondes = $songDuration % 60;
    $songDuration = sprintf("%d:%02d", $minutes, $secondes);

    $albumCover = $song['cover'];
    $songInfosHtml .= <<< HTML
        <p>$songName NOTE : $songNote DUREE : $songDuration</p>
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
        album.name,
        album.cover,
        album.release_date
    FROM album
    WHERE artist_id = $artistId
    ORDER BY album.release_date DESC
SQL);
} catch (PDOException $ex) {
    die("Erreur lors de la requette albums" . $ex->getMessage());
}

$albumsArtistHtml = "";

foreach ($albums as $album) {
    $idAlbum = $album["id"];
    $nameAlbumsArtist = $album["name"];
    $coverAlbumsArtist = $album["cover"];
    $dateAlbumsArtist = substr($album["release_date"], 0, 10);
    $albumsArtistHtml .= <<< HTML
        <a href="album.php?id=$idAlbum" class="text-decoration-none text-white">
            <p>Album name : $nameAlbumsArtist</p>
            <p>Date de sortie : $dateAlbumsArtist</p>
            <img src="$coverAlbumsArtist" width="300" alt="img-cover-album">
        </a>
        <br>
HTML;
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
    <div>
        <h2>ALL ALBUM :</h2>
        $albumsArtistHtml
    </div>
HTML;


echo (new HTMLPage(title: "Lowify - Artiste page"))
    ->addContent($html)
    ->addHead('<meta charset="utf-8" />')
    ->addHead('<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />')
    ->addBodyAttribute("class", "bg-dark text-white p-4")
    ->render();
