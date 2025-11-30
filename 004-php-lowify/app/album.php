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
        song.name AS song_name
    FROM album
    INNER JOIN song ON album.id = song.album_id
    WHERE album.id = $idAlbum
SQL);
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
$dateAlbumsArtist = substr($album["release_date"], 0, 10);

$albumInfos= <<< HTML
<p>Album name : $nameAlbumsArtist</p>
<p>Date de sortie : $dateAlbumsArtist</p>
<img src="$coverAlbumsArtist" width="300" alt="img-cover-album">
<br>
HTML;


$albumsArtistHtml = "";
$songsCounter = 0;

foreach ($albums as $album) {
    $songsCounter++;
    $songsAlbum = $album["song_name"];
    $albumsArtistHtml .= <<< HTML
            <p>$songsCounter : $songsAlbum</p>
            <br>
HTML;
}

$html = <<< HTML
    $albumInfos
    $albumsArtistHtml
HTML;

echo (new HTMLPage(title: "Lowify - Album page"))
    ->addContent($html)
    ->addHead('<meta charset="utf-8" />')
    ->addHead('<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />')
    ->addBodyAttribute("class", "bg-dark text-white p-4")
    ->render();