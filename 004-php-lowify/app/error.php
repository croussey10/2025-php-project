<?php

require_once __DIR__ . '/inc/page.inc.php';

$errorMessage = $_GET["message"];

$html = <<< HTML
<h1>$errorMessage</h1>
<a href="artists.php">Page d'accueil</a>
HTML;

echo (new HTMLPage(title: "Lowify - Error page"))
    ->addContent($html)
    ->addHead('<meta charset="utf-8" />')
    ->addHead('<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />')
    ->addBodyAttribute("class", "bg-dark text-white p-4")
    ->render();