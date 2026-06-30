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
                echo "ce nom existe deja ...\n";
            }
        }
    }
} while (!$codeExiste);

$categorie = [
    "nom" => $code,
    "code" => $nom,
    "produit" => []
];

//4
$catExiste = false;
$code = readline("saisir le code :");
foreach ($categories as $index => $categorie) {
    if (($categorie["code"]) === $code) {
        $catExiste = true;
        break;
    }
}

if (!$catExiste)
    do {

        $reference = readline("Enter  le reference :");
        if (empty($reference)) {
            echo "le champ est obligatoire !! \n";
            $codeExiste = false;
        } else {
            foreach ($categories as $categorie) {
                if (($categorie["produits"]["reference"]) === $reference) {
                    $codeExiste = false;
                    echo "cette reference existe deja !!\n";
                }
            }
        }
    } while (!$codeExiste);

do {

    $nom = readline("Enter  le nom du produit :");
    if (empty($nom)) {
        echo "le champ est obligatoire !! \n";
        $codeExiste = false;
    } else {
        foreach ($categories as $categorie) {
            if (($categorie["produits"]["nom"]) === $nom) {
                $codeExiste = false;
                echo "ce nom existe deja ...\n";
            }
        }
    }
} while (!$codeExiste);





if ($categorieExiste) {
    $produit = [
        "nom" => $nom,
        "reference" => $reference,
        "prix" => (int) readline("Enter  le prix : "),
        "quantite" => (int) readline("Enter la quantité : ")
    ];
    $categories[$index]["produits"][] = $produit;
} else {
    echo "cette categorie n'existe pas !!";
}
