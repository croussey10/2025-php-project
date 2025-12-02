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
SQL
    );
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
            <a href="artist.php?id=$idArtist" class="text-decoration-none card-link">
                <div class="card h-100 search-card rounded-lg p-3">
                    <img src="$coverArtist" class="card-img-top rounded-circle mb-3" alt="Pochette de l'artiste" style="width: 100%; height: auto; object-fit: cover; aspect-ratio: 1/1;">
                    <div class="card-body p-0 text-center">
                        <h5 class="card-title mb-0 font-weight-bold">$nameArtist</h5>
                        <p class="card-text text-secondary-text">Artiste</p>
                    </div>
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
SQL
    );
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
            <a href="album.php?id=$idAlbum" class="text-decoration-none card-link">
                <div class="card h-100 search-card rounded-lg p-3">
                    <img src="$coverAlbum" class="card-img-top rounded-lg mb-3" alt="Pochette de l'album" style="width: 100%; height: auto; object-fit: cover; aspect-ratio: 1/1;">
                    <div class="card-body p-0 text-center">
                        <h5 class="card-title mb-0 font-weight-bold">$nameAlbum</h5>
                        <p class="card-text text-secondary-text">Album • $dateAlbum</p>
                    </div>
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
SQL
    );
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
        <div class="song-item d-flex align-items-center justify-content-between p-2 rounded mb-2">
            <div class="d-flex align-items-center">
                <div>
                    <p class="mb-0 song-title">$nameSong</p>
                    <p class="mb-0 text-secondary-text song-artist"><a href="javascript:void(0)" class="text-secondary-text text-decoration-none">$nameArtist</a></p>
                </div>
            </div>
            <div class="text-end">
                <p class="mb-0 text-secondary-text">Note: $noteSong / 5</p>
                <p class="mb-0 text-secondary-text">$durationSong</p>
            </div>
        </div>
HTML;
}


$html = <<< HTML
    <div class="container-fluid p-4">
        <a href="index.php" class="text-decoration-underline">< Retour à l'accueil</a>
        <form action="search.php" method="GET" class="mb-5 d-flex justify-content-center">
            <input type="text" name="query" placeholder="Nouvelle recherche..." class="form-control me-2" value="$query" style="max-width: 400px;">
            <button type="submit" class="btn btn-primary">RECHERCHER</button>
        </form>
    
        <h1 class="display-5 mb-4">Résultats de recherche pour "<span class="text-success">$query</span>"</h1>
        
        <section class="mb-5">
            <h2 class="mb-4">Artistes</h2>
            <div class="row">
                $artistsHtml
            </div>
        </section>

        <section class="mb-5">
            <h2 class="mb-4">Albums</h2>
            <div class="row">
                $albumsHtml
            </div>
        </section>
        
        <section class="mb-5">
            <h2 class="mb-4">Chansons</h2>
            <div class="row">
                $songsHtml
            </div>
        </section>

    </div>
HTML;

echo (new HTMLPage(title: "Lowify - Search page"))
    ->addContent($html)
    ->addHead('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">')
    ->addHead('<link rel="stylesheet" href="style.css">')
    ->addHead('<meta charset="utf-8" />')
    ->addHead('<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />')
    ->addBodyAttribute("class", "bg-dark text-white p-4")
    ->render();