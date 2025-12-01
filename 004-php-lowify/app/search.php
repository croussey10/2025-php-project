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

$query = $_GET["query"];

$artists = [];

try {
    $artists = $db->executeQuery(<<<SQL
    SELECT
        id,
        name,
        cover
    FROM artist
    WHERE name LIKE '%$query%'
SQL);
} catch (PDOException $ex) {
    die("Erreur lors de la requette " . $ex->getMessage());
}

$artistsHtml = "";

foreach ($artists as $artist) {
    $idArtist = $artist["id"];
    $nameArtist = $artist["name"];
    $coverArtist = $artist["cover"];
    $artistsHtml .= <<< HTML
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="artist.php?id=$idArtist" class="text-decoration-none text-white">
                <div class="card h-100 bg-dark text-white border-dark shadow">
                    <h5 class="card-title">$nameArtist</h5>
                    <img src="$coverArtist" class="card-img-top rounded-circle" width="300" alt="Image 1">
                </div>
            </a>
        </div>
HTML;
}

$albums = [];

try {
    $albums = $db->executeQuery(<<< SQL
    SELECT
        album.id,
        album.name AS album_name,
        album.cover,
        album.release_date,
        artist.name AS artist_name
    FROM album
    INNER JOIN artist ON album.artist_id = artist.id
    WHERE album.name LIKE '%$query%'
SQL);
} catch (PDOException $ex) {
    die("Erreur lors de la requette albums" . $ex->getMessage());
}

$albumsHtml = "";

foreach ($albums as $album) {
    $idAlbum = $album["id"];
    $nameAlbum = $album["album_name"];
    $coverAlbum = $album["cover"];
    $nameArtist = $album["artist_name"];
    $dateAlbum = substr($album["release_date"], 0, 10);
    $albumsHtml .= <<< HTML
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="album.php?id=$idAlbum" class="text-decoration-none text-white">
                <div class="card h-100 bg-dark text-white border-dark shadow">
                    <p>Artist name : $nameArtist</p>
                    <p>Album name : $nameAlbum</p>
                    <p>Date sorti : $dateAlbum</p>
                    <img src="$coverAlbum" width="300" alt="img-cover-album">
                </div>
            </a>
        </div>
HTML;
}

$songs = [];

try {
    $songs = $db->executeQuery(<<< SQL
    SELECT
        song.id,
        song.name AS song_name,
        song.duration,
        song.note,
        album.name AS album_name,
        artist.name AS artist_name
    FROM song
    INNER JOIN album ON song.album_id = album.id
    INNER JOIN artist ON song.artist_id = artist.id
    WHERE song.name LIKE '%$query%'
SQL);
} catch (PDOException $ex) {
    die("Erreur lors de la requette albums" . $ex->getMessage());
}

$songsHtml = "";

foreach ($songs as $song) {
    $idSong = $song["id"];
    $nameSong = $song["song_name"];
    $noteSong = $song["note"];
    $nameAlbum = $song["album_name"];
    $nameArtist = $song["artist_name"];

    $durationSong = $song['duration'];
    $minutes = $durationSong / 60;
    $secondes = $durationSong % 60;
    $durationSong = sprintf("%d:%02d", $minutes, $secondes);

    $songsHtml .= <<< HTML
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100 bg-dark text-white border-dark shadow">
                <p>Song name : $nameSong</p>
                <p>Duration : $durationSong</p>
                <p>Note : $noteSong</p>
                <p>Album name : $nameAlbum</p>
                <p>Artist name : $nameArtist</p>
            </div>
        </div>
HTML;
}


$html = <<< HTML
    $artistsHtml
    $albumsHtml
    $songsHtml
HTML;

echo (new HTMLPage(title: "Lowify - Search page"))
    ->addContent($html)
    ->addHead('<meta charset="utf-8" />')
    ->addHead('<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />')
    ->addBodyAttribute("class", "bg-dark text-white p-4")
    ->render();