<?php

require_once __DIR__ . '/inc/page.inc.php';

$errorMessage = $_GET["message"];

$html = <<< HTML
    <div class="container py-5 text-center">
        <h1 class="display-3 text-white mb-4">Oops! Erreur.</h1>
        
        <p class="lead text-secondary-text mb-5">
            Nous avons rencontré le problème suivant : <br>
            <strong>$errorMessage</strong>
        </p>
        
        <a href="index.php" class="btn btn-primary btn-lg">RETOUR À L'ACCUEIL</a>
    </div>
HTML;

echo (new HTMLPage(title: "Lowify - Error page"))
    ->addContent($html)
    ->addHead('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">')
    ->addHead('<link rel="stylesheet" href="style.css">')
    ->addHead('<meta charset="utf-8" />')
    ->addHead('<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />')
    ->addBodyAttribute("class", "bg-dark text-white p-4")
    ->render();