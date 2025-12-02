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
        cover
    FROM artist
SQL
    );
} catch (PDOException $ex) {
    die("Erreur lors de la requette " . $ex->getMessage());
}

$artistsAsHTML = "";

foreach ($artists as $artist) {
    $artistId = $artist['id'];
    $artistName = $artist['name'];
    $artistCover = $artist['cover'];

    $artistsAsHTML .= <<<HTML
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <a href="artist.php?id=$artistId" class="text-decoration-none">
                    <div class="card h-100 p-3">
                        <img src="$artistCover" class="card-img-top rounded-circle" alt="Image de l'artiste $artistName">
                        <div class="card-body text-center">
                            <h5 class="card-title">$artistName</h5>
                            <p class="card-text text-secondary-text">Artiste</p>
                        </div>
                    </div>
                </a>
            </div>
HTML;
}

$html = <<< HTML
    <a href="index.php" class="text-decoration-underline">< Retour à l'accueil</a>
    <div class="container py-5">
        <h1 class="mb-5">Tous les artistes</h1>
        <div class="row">
            $artistsAsHTML
        </div>
    </div>
HTML;

echo (new HTMLPage(title: "Lowify - Artistes"))
    ->addContent($html)
    ->addHead('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">')
    ->addHead('<link rel="stylesheet" href="style.css">')
    ->addHead('<meta charset="utf-8" />')
    ->addHead('<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />')
    ->addBodyAttribute("class", "bg-dark text-white p-4")
    ->render();