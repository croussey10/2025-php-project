<?php

require_once __DIR__ . '/inc/page.inc.php';
require __DIR__ . '/inc/database.inc.php';

// Connexion à la BDD

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

// Récupération des artistes

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
SQL
    );
} catch (PDOException $ex) {
    die("Erreur lors de la requette " . $ex->getMessage());
}

// Affichage des artistes

$artistsHtml = "";

foreach ($artists as $artist) {
    $idArtist = $artist["id"];
    $nameArtist = $artist["name"];
    $coverArtist = $artist["cover"];
    $artistMonthlyListeners = $artist["monthly_listeners"];
    $artistMonthlyListeners = $artist['monthly_listeners'];
    if ($artistMonthlyListeners >= 1000000) {
        $artistMonthlyListeners = $artistMonthlyListeners / 1000000;
        $artistMonthlyListeners = number_format($artistMonthlyListeners, 1) . "M";
    } elseif ($artistMonthlyListeners >= 1000) {
        $artistMonthlyListeners = $artistMonthlyListeners / 1000;
        $artistMonthlyListeners = number_format($artistMonthlyListeners, 1) . "K";
    }
    $artistsHtml .= <<< HTML
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="artist.php?id=$idArtist" class="text-decoration-none">
                <div class="card h-100 p-3">
                    <img src="$coverArtist" class="card-img-top rounded-circle" alt="Image de l'artiste $nameArtist">
                    <div class="card-body">
                        <h5 class="card-title">$nameArtist</h5>
                        <p class="card-text text-secondary-text">Artiste · $artistMonthlyListeners auditeurs</p>
                    </div>
                </div>
            </a>
        </div>
HTML;
}
$artistsHtml = "<div class='row'>" . $artistsHtml . "</div>";

// Récupération des albums et affichage des 5 albums les mieux notés

$albumsTopSorties = [];

try {
    $albumsTopSorties = $db->executeQuery(<<< SQL
    SELECT
        album.id,
        album.name,
        album.cover,
        album.release_date
    FROM album
    ORDER BY album.release_date DESC
    LIMIT 5
SQL
    );
} catch (PDOException $ex) {
    die("Erreur lors de la requette albums" . $ex->getMessage());
}

$albumsTopSortiesHtml = "";

foreach ($albumsTopSorties as $albumTopSorties) {
    $idAlbum = $albumTopSorties["id"];
    $nameAlbum = $albumTopSorties["name"];
    $coverAlbum = $albumTopSorties["cover"];
    $dateAlbum = substr($albumTopSorties["release_date"], 0, 10);
    $albumsTopSortiesHtml .= <<< HTML
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="album.php?id=$idAlbum" class="text-decoration-none">
                <div class="card h-100 p-3">
                    <img src="$coverAlbum" class="card-img-top" alt="Couverture de l'album $nameAlbum">
                    <div class="card-body">
                        <h5 class="card-title">$nameAlbum</h5>
                        <p class="card-text text-secondary-text">Album · $dateAlbum</p>
                    </div>
                </div>
            </a>
        </div>
HTML;
}
$albumsTopSortiesHtml = "<div class='row'>" . $albumsTopSortiesHtml . "</div>";

// Récupération des albums et affichage des 5 albums avec la moyenne des sons les plus haute

$albumsTopNotes = [];

try {
    $albumsTopNotes = $db->executeQuery(<<< SQL
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
SQL
    );
} catch (PDOException $ex) {
    die("Erreur lors de la requette albums" . $ex->getMessage());
}

$albumsTopNotesHtml = "";

foreach ($albumsTopNotes as $albumTopNotes) {
    $idAlbum = $albumTopNotes["id"];
    $nameAlbumsArtist = $albumTopNotes["name"];
    $coverAlbumsArtist = $albumTopNotes["cover"];
    $noteAlbumsArtist = number_format($albumTopNotes["note_moyenne"], 2);
    $albumsTopNotesHtml .= <<< HTML
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="album.php?id=$idAlbum" class="text-decoration-none">
                <div class="card h-100 p-3">
                    <img src="$coverAlbumsArtist" class="card-img-top" alt="Couverture de l'album $nameAlbumsArtist">
                    <div class="card-body">
                        <h5 class="card-title">$nameAlbumsArtist</h5>
                        <p class="card-text text-secondary-text">Note: $noteAlbumsArtist / 5</p>
                    </div>
                </div>
            </a>
        </div>
HTML;
}
$albumsTopNotesHtml = "<div class='row'>" . $albumsTopNotesHtml . "</div>";

// Rendu html

$html = <<< HTML
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="display-4 mb-4">Bienvenue sur LOWIFY</h1>
        </div>
        
        <!-- Barre de recherche (utilise les styles du CSS) -->
        <form action="search.php" method="GET" class="mb-5 d-flex justify-content-center">
            <input type="text" name="query" placeholder="Rechercher artistes, albums, ou chansons..." class="form-control me-2" style="max-width: 400px;">
            <button type="submit" class="btn btn-primary">RECHERCHER</button>
        </form>

        <section class="mb-5">
            <h2 class="mb-4">Top Trending Artistes</h2>
            $artistsHtml
        </section>

        <section class="mb-5">
            <h2 class="mb-4">Nouvelles Sorties</h2>
            $albumsTopSortiesHtml
        </section>
        
        <section class="mb-5">
            <h2 class="mb-4">Meilleurs Albums (par note)</h2>
            $albumsTopNotesHtml
        </section>
        <section class="mb-5">
            <h2>
                <a href="artists.php" class="text-decoration-underline">Afficher Tous les artists</a>
            </h2>
        </section>
    </div>
HTML;


echo (new HTMLPage(title: "Lowify - Page d'accueil"))
    ->addContent($html)
    ->addHead('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">')
    ->addHead('<link rel="stylesheet" href="style.css">')
    ->addHead('<meta charset="utf-8" />')
    ->addHead('<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />')
    ->render();