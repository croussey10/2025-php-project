<?php

require_once __DIR__ . '/inc/page.inc.php';
require __DIR__ . '/inc/database.inc.php';

$rawCSS = <<< CSS
h1{
    color: red;
}
CSS;

$rawJS = <<< JS
document.addEventListener("load", () => window.alert("hi"));
JS;

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

$allArtists = [];

try {
    $allArtists = $db->executeQuery(<<<SQL
    SELECT 
        id,
        name,
        cover
    FROM artist
SQL);
} catch (PDOException $ex) {
    die("Erreur lors de la requette " . $ex->getMessage());
}

$artistsAsHTML = "";

foreach ($allArtists as $artist) {
    $artistId = $artist['id'];
    $artistName = $artist['name'];
    $artistCover = $artist['cover'];

    $artistsAsHTML .= <<<HTML
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="artist.php?id=$artistId" class="text-decoration-none text-white">
                    <div class="card h-100 bg-dark text-white border-dark shadow">
                        <img src="$artistCover" class="card-img-top rounded-circle" width="300" alt="Image 1">
                        <div class="card-body bg-secondary-subtle  text-white">
                            <h5 class="card-title">$artistName</h5>
                        </div>
                    </div>
                </a>
            </div>
HTML;
}

$html = <<< HTML
    <p>$artistsAsHTML</p>
HTML;

echo (new HTMLPage(title: "Lowify - Artistes"))
    ->addContent($html)
    ->addHead('<meta charset="utf-8" />')
    ->addHead('<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />')
    ->addBodyAttribute("class", "bg-dark text-white p-4")
    ->addRawScript($rawJS)
    ->addRawStyle($rawCSS)
    ->render();