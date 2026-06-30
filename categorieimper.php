<?php
//1
$categories = [
    0 => [
        "nom" => "CategorieA",
        "code" => "2309",
        "produits" => [
            0 => ["nom" => "lait", "reference" => "020", "qte" => 4, "prix" => 1000],
            1 => ["nom" => "sucre", "reference" => "024", "qte" => 2, "prix" => 2000]
        ]
    ],
    1 => [
        "nom" => "CategorieB",
        "code" => "1241",
        "produits" => []
    ]
];
//2
foreach ($categories as $categorie) {
    if (empty($categorie["produits"])) {
        var_dump($categorie);
    }
}

//3

$codeExiste = true;
do {

    $code = readline("Enter  le code :");
    if (empty($code)) {
        echo "le champ est obligatoire !! \n";
        $codeExiste = false;
    } else {
        foreach ($categories as $categorie) {
            if (($categorie["code"]) === $code) {
                $codeExiste = false;
                echo "le code existe deja !!\n";
            }
        }
    }
} while (!$codeExiste);

do {

    $nom = readline("Enter  le nom :");
    if (empty($nom)) {
        echo "le champ est obligatoire !! \n";
        $codeExiste = false;
    } else {
        foreach ($categories as $categorie) {
            if (($categorie["nom"]) === $nom) {
                $codeExiste = false;
                echo "le code existe deja ...\n";
            }
        }
    }
} while (!$codeExiste);

$categorie = [
    "nom" => $code,
    "code" => $nom,
    "produit" => []
];