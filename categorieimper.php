<?php
//1  la categorie1 2produit  categaorie2 pas de produit
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
//2 afficher tous les produits qui n'ont pas de  produits
foreach ($categories as $categorie) {
    if (empty($categorie["produits"])) {
        var_dump($categorie);
    }
}

//3 Enregistrer une nouvelle categorie action 1 saisir le code action 2 saisir le nom mais tous obligatoir et unique les produit sont initialiser à tableau vide


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

//4 ajouter un produit à une categorie action 1 recherche le categorie par code ;action 2 saisir les informations du produit et l'affecté à la trouvé NB: lors de la saisie du produit la refernce et le nom sont obligatoir et uniQUE prix et qte sont positif

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





if ($catExiste) {
    $produit = [
        "nom" => $nom,
        "reference" => $reference,
        "prix" => (int) readline("Enter  le prix : "),
        "qte" => (int) readline("Enter la quantité : ")
    ];
    $categories[$index]["produits"][] = $produit;
} else {
    echo "cette categorie n'existe pas !!";
}
//5  on ajoute une categorie en lui affectant des produits tantque utlisateur repond oui à la question  voulez vous ajouter 


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
        "qte" => (int) readline("Enter la quantité : ")
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
