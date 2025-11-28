<?php

function generateSelectOptions($selected = 12): string
{
    // on initialise une variable html vide
    $selectOption = "";

    // utilisation de la fonction range pour générer un tableau de valeurs
    $options = range(8, 42);

    // pour chaque nombre de 8 à 42
    foreach ($options as $value) {
        // si le nombre courant est celui sélectionné, on ajoute l'attribut selected à l'option
        $attribute = "";
        if ((int) $value == (int) $selected) {
            $attribute = "selected";
        }

        // on crée une option avec l'attribut et la valeur'
        $selectOption .= "<option $attribute value=\"$value\">$value</option>";
    }

    return $selectOption;
}

$selected = $_POST["lenghtPassword"] ?? 12;
$htmlSelectOption = generateSelectOptions($selected);

$useMin = $_POST["use-min"] ?? 0;
$useMaj = $_POST["use-maj"] ?? 0;
$useNumbers = $_POST["use-numbers"] ?? 0;
$useSymbols = $_POST["use-symbols"] ?? 0;
$useMinChecked = $useMin == 1 ? 'checked' : '';
$useMajChecked = $useMaj == 1 ? 'checked' : '';
$useNumbersChecked = $useNumbers == 1 ? 'checked' : '';
$useSymbolsChecked = $useSymbols == 1 ? 'checked' : '';

$minChar = "abcdefghijklmnopqrstuvwxyz";
$majChar = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$numberChar = "0123456789";
$symbolChar = "&!%@$*^";

$CharsInPassword = "";

if ($useMin == 1) {
    $CharsInPassword .= $minChar;
}
if ($useMaj == 1) {
    $CharsInPassword .= $majChar;
}
if ($useNumbers == 1) {
    $CharsInPassword .= $numberChar;
}
if ($useSymbols == 1) {
    $CharsInPassword .= $symbolChar;
}

$password = "";

if ($CharsInPassword !== "") {
    $maxChar = strlen($CharsInPassword) - 1;

    for ($selectValue = 0; $selectValue < $selected; $selectValue++) {
        $index = random_int(0, $maxChar);
        $password .= $CharsInPassword[$index];
    }
} else {
    $password = "Aucune option sélectionnée !";
}

$html = <<< HTML

<form method="POST" action="/">
    
    <div>
        <select name="lenghtPassword" id="lenghtPassword">
            $htmlSelectOption
        </select>
        
        <input type="checkbox" name="use-min" id="use-min" value="1" $useMinChecked>
        <label for="use-min">Use min ?</label>

        <input type="checkbox" name="use-maj" id="use-maj" value="1" $useMajChecked>
        <label for="use-maj">Use maj ?</label>

        <input type="checkbox" name="use-numbers" id="use-numbers" value="1" $useNumbersChecked>
        <label for="use-numbers">Use number ?</label>

        <input type="checkbox" name="use-symbols" id="use-symbols" value="1" $useSymbolsChecked>
        <label for="use-symbols">Use symbols ?</label>
    </div>

    <div>
        <button type="submit">GENERER</button>
    </div>
    
    <div>
        <p>Mot de passe généré : $password</p>
    </div>
</form>

HTML;

echo $html;

