<?php
// Name Array
$a[] = "Alvin";
$a[] = "Barbara";
$a[] = "Cosme";
$a[] = "Dalila";
$a[] = "Erick";
$a[] = "Flossie";
$a[] = "Gill";
$a[] = "Henriette";
$a[] = "Zelda";
$a[] = "Greg";
$a[] = "Hilary";
$a[] = "Linda";
$a[] = "Paul";
$a[] = "Rosa";
$a[] = "Zeke";
$a[] = "Aletta";
$a[] = "Xavier";
$a[] = "Xina";
$a[] = "Darby";
$a[] = "Adrian";
$a[] = "Frank";
$a[] = "Howard";
$a[] = "Blanca";
$a[] = "Elida";


// Get the Search Query from the Form
$q = $_REQUEST["q"];

$hint = "";

// Go through the Name array to find a match - As long as query is not left empty
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output the text "No Suggestion" if query was not found. 
echo $hint === "" ? "no suggestion" : $hint;
?>