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

$idAlbum = $_GET["id"];

$albums = [];

try {
    $albums = $db->executeQuery(<<< SQL
    SELECT
        album.name AS album_name,
        album.cover,
        album.release_date,
        song.name AS song_name,
        song.duration,
        song.note,
        artist.name AS artist_name,
        artist.id AS artist_id
    FROM album
    INNER JOIN song ON album.id = song.album_id
    INNER JOIN artist ON album.artist_id = artist.id
    WHERE album.id = $idAlbum
SQL
    );
} catch (PDOException $ex) {
    $errorMessage = "Erreur lors de la requette albums";
    header("Location: error.php?message=$errorMessage");
}

if ($albums == null) {
    $errorMessage = "L'album avec l'ID $idAlbum n'a pas été trouvé.";
    header("Location: error.php?message=$errorMessage");
}

$album = $albums[0];

$nameAlbumsArtist = $album["album_name"];
$coverAlbumsArtist = $album["cover"];
$nameArtist = $album["artist_name"];
$idArtist = $album["artist_id"];
$dateAlbumsArtist = substr($album["release_date"], 0, 10);

$albumInfos = <<< HTML
    <a href="index.php" class="text-secondary-text text-decoration-none">< Retour à l'accueil</a>
    <br>
    
    <h3 class="mb-3">
        <a href="artist.php?id='$idArtist'" class="text-white text-decoration-underline">$nameArtist</a>
    </h3>
    
    <div class="album-header d-flex align-items-end p-4 mb-4">
        <img src="$coverAlbumsArtist" class="album-cover img-fluid me-4 rounded shadow-lg" width="300" alt="Couverture de l'album: $nameAlbumsArtist">
        
        <div class="album-info">
            <p class="text-uppercase text-light-emphasis mb-1">Album</p>
            <h1 class="display-4 fw-bold mb-2">$nameAlbumsArtist</h1>
            <p class="text-white-50">Date de sortie : $dateAlbumsArtist</p>
        </div>
    </div>
HTML;


$songsHtml = "";
$songsCounter = 0;

$songsHtml .= <<< HTML
    <div class="container py-4">
        <h2 class="mb-4">Liste des chansons</h2>
        <div class="list-group">
HTML;

foreach ($albums as $album) {
    $songsCounter++;
    $songsAlbum = $album["song_name"];
    $durationSong = $album["duration"];
    $minutes = $durationSong / 60;
    $secondes = $durationSong % 60;
    $durationSong = sprintf("%d:%02d", $minutes, $secondes);
    $noteSong = $album["note"];
    $songsHtml .= <<< HTML
            <div class="song-item list-group-item d-flex justify-content-between align-items-center bg-transparent border-0 py-2 px-3 mb-2 rounded-lg text-white">
                <span class="d-flex align-items-center">
                    <span class="song-index text-secondary-text me-3" style="width: 20px; text-align: right;">$songsCounter</span>
                    <span class="song-name fw-medium">$songsAlbum</span>
                </span>
                <span class="text-secondary-text">$durationSong &nbsp;|&nbsp; Note: $noteSong/5</span>
            </div>
HTML;
}

$songsHtml .= <<< HTML
        </div>
    </div>
HTML;

$html = <<< HTML
    $albumInfos
    $songsHtml
HTML;

echo (new HTMLPage(title: "Lowify - Album page"))
    ->addContent($html)
    ->addHead('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">')
    ->addHead('<link rel="stylesheet" href="style.css">')
    ->addHead('<meta charset="utf-8" />')
    ->addHead('<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />')
    ->addBodyAttribute("class", "bg-dark text-white p-4")
    ->render();