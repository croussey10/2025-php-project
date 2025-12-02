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
SQL
    );
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
$songRank = 1;

foreach ($songs as $song) {
    $songName = $song['name'];
    $songNote = $song['note'];

    $songDuration = $song['duration'];
    $minutes = $songDuration / 60;
    $secondes = $songDuration % 60;
    $songDuration = sprintf("%d:%02d", $minutes, $secondes);

    $albumCover = $song['cover'];
    $songInfosHtml .= <<< HTML
        <div class="top-songs d-flex justify-content-between align-items-center p-2 mb-2">
            <!-- Numéro et Nom de la chanson -->
            <span class="d-flex align-items-center">
                <span class="text-secondary-text me-3" style="width: 20px; text-align: right;">$songRank</span>
                <span>$songName</span>
            </span>
            <!-- Durée et Note -->
            <span class="text-secondary-text d-none d-md-block">$songDuration &nbsp;|&nbsp; Note: $songNote/5</span>
        </div>
    
HTML;
    $songRank++;
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
SQL
    );
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
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <a href="album.php?id=$idAlbum" class="text-decoration-none">
                <div class="card h-100 p-3">
                    <img src="$coverAlbumsArtist" class="card-img-top" alt="Couverture de l'album $nameAlbumsArtist">
                    <div class="card-body">
                        <h5 class="card-title">$nameAlbumsArtist</h5>
                        <p class="card-text text-secondary-text">Album · $dateAlbumsArtist</p>
                    </div>
                </div>
            </a>
        </div>
HTML;
}

$html = <<< HTML
    <div class="container-fluid">
        <a href="index.php" class="text-decoration-underline">< Retour à l'accueil</a>
        <!-- HEADER ARTISTE (Style Spotify) -->
        <!-- Le background simule la couleur de l'artiste + dégradé vers le fond sombre -->
        <div class="artist-header p-5 d-flex align-items-end" style="background: linear-gradient(to bottom, #1ed76044, #121212);">
            <img src="$artistCover" class="artist-cover" alt="Couverture de l'artiste $artistName">
            <div class="artist-info ms-4">
                <h1 class="display-1 fw-bold">$artistName</h1>
                <h2 class="mb-3">Biographie</h2>
                <p>$artistBiography</p>
                <p class="text-secondary-text fw-bold"> $artistMonthlyListeners auditeurs mensuels</p>
            </div>
        </div>
    </div>

    <div class="container py-5">
        
        <!-- TOP 5 CHANSONS -->
        <section class="mb-5">
            <h2 class="mb-4">Top 5 des chansons populaires</h2>
            <div class="list-unstyled">
                $songInfosHtml
            </div>
        </section>
        
        <!-- TOUS LES ALBUMS -->
        <section class="mb-5">
            <h2 class="mb-4">Discographie</h2>
            <div class="row">
                $albumsArtistHtml
            </div>
        </section>
    </div>
HTML;


echo (new HTMLPage(title: "Lowify - $artistName"))
    ->addContent($html)
    ->addHead('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">')
    ->addHead('<link rel="stylesheet" href="style.css">')
    ->addHead('<meta charset="utf-8" />')
    ->addHead('<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />')
    ->addBodyAttribute("class", "bg-dark text-white p-4")
    ->render();
