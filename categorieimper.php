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
    "nom" => $nom,
    "code" => $code,
    "produits" => []
];

//4
$catExiste = false;
$code = readline("Enter le code :");
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
            foreach ($categorie["produits"] as $produit) {
                if ($produit["reference"] === $reference) {
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
        foreach ($categorie["produits"] as $produit) {
            if ($produit["nom"] === $nom) {
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
//5 


do {

    $code = readline("Enter le code :");
    if (empty($code)) {
        echo "le champ est obligatoire \n";
        $codeExiste = false;
    } else {
        foreach ($categories as $categorie) {
            if (($categorie["code"]) === $code) {
                $codeExiste = false;
                echo "ce code existe deja !!\n";
            }
        }
    }



} while (!$codeExiste);

$nomIsValid = true;
do {

    $nom = readline("Enter le nom : ");
    if (empty($nom)) {
        echo "le champ est obligatoire!!\n";
        $nomIsValid = false;
    } else {
        foreach ($categories as $categorie) {
            if (($categorie["nom"]) === $nom) {
                $nomIsValid = false;
                echo "ce nom existe deja \n";
            }
        }
    }
} while (!$nomIsValid);

$produits = [];
do {
    $produit = [
        "nom" => readline("Enter le nom : "),
        "reference" => readline("Enter la reference : "),
        "prix" => (int) readline("Enter le prix : "),
        "quantite" => (int) readline("Enter la quantité : ")
    ];
    $produits[] = $produit;

    $choix = strtolower(readline(" voulez vous continuer  oui/non "));

} while ($choix === "oui");
$categorie = [
    "code" => $code,
    "nom" => $nom,
    "produits" => $produits
];

$categories[] = $categorie;
