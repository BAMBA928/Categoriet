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
function saisirObligatoire(string $message): string
{
    do {
        $valeur = trim(readline($message));

        if (empty($valeur)) {
            echo "Le champ est obligatoire !\n";
        }

    } while (empty($valeur));

    return $valeur;
}

function valeurExiste(array $categories, string $cle, string $valeur): bool
{
    foreach ($categories as $categorie) {
        if ($categorie[$cle] === $valeur) {
            return true;
        }
    }

    return false;
}

function produitExiste(array $categories, string $cle, string $valeur): bool
{
    foreach ($categories as $categorie) {
        foreach ($categorie["produits"] as $produit) {
            if ($produit[$cle] === $valeur) {
                return true;
            }
        }
    }

    return false;
}


do {
    $code = saisirObligatoire("Entrer le code : ");

    if (valeurExiste($categories, "code", $code)) {
        echo "Ce code existe déjà.\n";
        $valide = false;
    } else {
        $valide = true;
    }

} while (!$valide);

do {
    $nom = saisirObligatoire("Entrer le nom : ");

    if (valeurExiste($categories, "nom", $nom)) {
        echo "Ce nom existe déjà.\n";
        $valide = false;
    } else {
        $valide = true;
    }

} while (!$valide);

$categorie = [
    "nom" => $nom,
    "code" => $code,
    "produits" => []
];

//4

do {
    $reference = saisirObligatoire("Référence : ");

    if (produitExiste($categories, "reference", $reference)) {
        echo "Cette référence existe déjà.\n";
        $valide = false;
    } else {
        $valide = true;
    }

} while (!$valide);

do {
    $nomProduit = saisirObligatoire("Nom : ");

    if (produitExiste($categories, "nom", $nomProduit)) {
        echo "Ce nom existe déjà.\n";
        $valide = false;
    } else {
        $valide = true;
    }

} while (!$valide);

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


//5 Ajouter une catégorie en lui affectant des produits
// Tant que l'utilisateur répond "oui", il peut ajouter un nouveau produit.

do {
    $code = saisirObligatoire("Entrer le code de la catégorie : ");

    if (valeurExiste($categories, "code", $code)) {
        echo "Ce code existe déjà.\n";
        $valide = false;
    } else {
        $valide = true;
    }

} while (!$valide);


do {
    $nom = saisirObligatoire("Entrer le nom de la catégorie : ");

    if (valeurExiste($categories, "nom", $nom)) {
        echo "Ce nom existe déjà.\n";
        $valide = false;
    } else {
        $valide = true;
    }

} while (!$valide);


$produits = [];

do {

    do {
        $reference = saisirObligatoire("Entrer la référence : ");

        if (produitExiste($categories, "reference", $reference)) {
            echo "Cette référence existe déjà.\n";
            $valide = false;
        } else {
            $valide = true;
        }

    } while (!$valide);

    do {
        $nomProduit = saisirObligatoire("Entrer le nom du produit : ");

        if (produitExiste($categories, "nom", $nomProduit)) {
            echo "Ce nom existe déjà.\n";
            $valide = false;
        } else {
            $valide = true;
        }

    } while (!$valide);

    do {
        $prix = (int) readline("Entrer le prix : ");
    } while ($prix <= 0);

    do {
        $qte = (int) readline("Entrer la quantité : ");
    } while ($qte <= 0);

    $produits[] = [
        "nom" => $nomProduit,
        "reference" => $reference,
        "prix" => $prix,
        "qte" => $qte
    ];

    $choix = strtolower(trim(readline("Voulez-vous ajouter un autre produit ? (oui/non) : ")));

} while ($choix === "oui");


$categorie = [
    "nom" => $nom,
    "code" => $code,
    "produits" => $produits
];
$categories[] = $categorie;