<?php

    namespace Fonctions;

    function saisie(string $message): string{
        return readline($message);
    }

    function afficher(string $message): void{
        echo $message . "\n";
    }
    
?>