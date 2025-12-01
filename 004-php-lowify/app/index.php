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

$artists = [];

try {
    $artists = $db->executeQuery(<<<SQL
    SELECT 
        id,
        name,
        cover,
        monthly_listeners
    FROM artist
    ORDER BY monthly_listeners DESC
    LIMIT 5
SQL);
} catch (PDOException $ex) {
    die("Erreur lors de la requette " . $ex->getMessage());
}

$artistsHtml = "";

foreach ($artists as $artist) {
    $idArtist = $artist["id"];
    $nameArtist = $artist["name"];
    $coverArtist = $artist["cover"];
    $listenersArtist = $artist["monthly_listeners"];
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

$albumsSorties = [];

try {
    $albumsSorties = $db->executeQuery(<<< SQL
    SELECT
        album.id,
        album.name,
        album.cover,
        album.release_date
    FROM album
    ORDER BY album.release_date DESC
    LIMIT 5
SQL);
} catch (PDOException $ex) {
    die("Erreur lors de la requette albums" . $ex->getMessage());
}

$albumsSortiesHtml = "";

foreach ($albumsSorties as $album) {
    $idAlbum = $album["id"];
    $nameAlbumsArtist = $album["name"];
    $coverAlbumsArtist = $album["cover"];
    $dateAlbumsArtist = substr($album["release_date"], 0, 10);
    $albumsSortiesHtml .= <<< HTML
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="album.php?id=$idAlbum" class="text-decoration-none text-white">
                <div class="card h-100 bg-dark text-white border-dark shadow">
                    <p>Album name : $nameAlbumsArtist</p>
                    <p>Date de sortie : $dateAlbumsArtist</p>
                    <img src="$coverAlbumsArtist" width="300" alt="img-cover-album">
                </div>
            </a>
        </div>
HTML;
}

$albumsTop = [];

try {
    $albumsTop = $db->executeQuery(<<< SQL
    SELECT
        album.id,
        album.name,
        album.cover,
        AVG(song.note) AS note_moyenne
    FROM album
    INNER JOIN song ON album.id = song.album_id
    GROUP BY
        album.id,
        album.name,
        album.cover
    ORDER BY AVG(song.note) DESC
    LIMIT 5
SQL);
} catch (PDOException $ex) {
    die("Erreur lors de la requette albums" . $ex->getMessage());
}

$albumsTopHtml = "";

foreach ($albumsTop as $albumTop) {
    $idAlbum = $albumTop["id"];
    $nameAlbumsArtist = $albumTop["name"];
    $coverAlbumsArtist = $albumTop["cover"];
    $noteAlbumsArtist = number_format($albumTop["note_moyenne"], 2);
    $albumsTopHtml .= <<< HTML
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="album.php?id=$idAlbum" class="text-decoration-none text-white">
                <div class="card h-100 bg-dark text-white border-dark shadow">
                    <p>Album name : $nameAlbumsArtist</p>
                    <p>Note : $noteAlbumsArtist</p>
                    <img src="$coverAlbumsArtist" width="300" alt="img-cover-album">
                </div>
            </a>
        </div>
HTML;
}

$html = <<< HTML
    <h2>Top trending :</h2>
    $artistsHtml
    <h2>Top sorties :</h2>
    $albumsSortiesHtml
    <h2>Top albums :</h2>
    $albumsTopHtml
HTML;


echo (new HTMLPage(title: "Lowify - Page d'accueil"))
    ->addContent($html)
    ->addHead('<meta charset="utf-8" />')
    ->addHead('<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />')
    ->addBodyAttribute("class", "bg-dark text-white p-4")
    ->render();