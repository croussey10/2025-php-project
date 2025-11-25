<?php

$choicePlayer = $_GET['player'] ?? "Faites votre choix";

if ($choicePlayer == "Faites votre choix") {
    $choiceBot = "";
    $state = "";
} else {
    $choiceBot = rand(0, 2);

    if ($choiceBot == 0)
        $choiceBot = "pierre";
    else if ($choiceBot == 1)
        $choiceBot = "feuille";
    else
        $choiceBot = "ciseau";

    if ($choicePlayer == $choiceBot) {
        $state = "DRAW";
    } else if ($choicePlayer == "pierre" && $choiceBot == "ciseau") {
        $state = "WIN";
    } else if ($choicePlayer == "pierre" && $choiceBot == "feuille") {
        $state = "LOSE";
    } else if ($choicePlayer == "feuille" && $choiceBot == "pierre") {
        $state = "WIN";
    } else if ($choicePlayer == "feuille" && $choiceBot == "ciseau") {
        $state = "LOSE";
    } else if ($choicePlayer == "ciseau" && $choiceBot == "feuille") {
        $state = "WIN";
    } else if ($choicePlayer == "ciseau" && $choiceBot == "pierre") {
        $state = "LOSE";
    }
}

$html = <<< HTML
<h1>Jeu Pierre, Feuilles, Ciseaux</h1>

<div>
    <p>Joueur : $choicePlayer</p>
</div>
<div>
    <p>Php : $choiceBot</p>
</div>

<div>
    <p>$state</p>
</div>

<div>
    <a href="http://localhost:80/?player=pierre">PIERRE</a>
    <a href="http://localhost:80/?player=feuille">FEUILLE</a>
    <a href="http://localhost:80/?player=ciseau">CISEAU</a>
</div>

<div>
    <a href="http://localhost:80/">RESET</a>
</div>
HTML;

echo $html;

