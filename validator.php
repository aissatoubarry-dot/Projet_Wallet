<?php

    function unicite(array $wallets, string $champ, $valeur): int{

        $resultat = array_filter($wallets, fn($wallet) => $wallet[$champ] === $valeur);
        if (empty($resultat)) {
            return -1;
        }
        return array_key_first($resultat);
    }

    function verifierLongueur(int $valeur, int $taille = 9):bool{
        return strlen((string)$valeur)==$taille;
    }

    function verifierPrefixe(int $telephone): bool{

        $prefixe = (int) ($telephone / 10000000);

        return $prefixe == 77 || $prefixe == 78 || $prefixe == 76 || $prefixe == 70 || $prefixe == 75;
    }
?>