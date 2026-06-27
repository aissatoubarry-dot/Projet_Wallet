<?php

    function unicite(array $wallets, string $champ, $valeur):int{

        foreach ($wallets as $index => $wallet) {
            if ($wallet[$champ] === $valeur) {
                return $index;
            }
        }
        return -1;
    }

    function verifierLongueur(int $valeur, int $taille = 9):bool{
        return strlen((string)$valeur)==$taille;
    }

    function verifierPrefixe(int $telephone): bool{

        $prefixe = (int) ($telephone / 10000000);

        return $prefixe == 77 || $prefixe == 78 || $prefixe == 76 || $prefixe == 70 || $prefixe == 75;
    }
?>