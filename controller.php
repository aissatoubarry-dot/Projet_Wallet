<?php

    require_once 'services.php';

    function saisie(string $message): string{
        return readline($message);
    }

    function afficher(string $message): void{
        echo $message . "\n";
    }

    function afficherWallet(array $wallets):void{

        for ($index=0; $index < count($wallets); $index++) { 
            afficher ('Titulaire: ' .$wallets[$index]['client'] ."\n");
            afficher ('Telephone: ' .$wallets[$index]['telephone'] ."\n");
            afficher ('code: ' .$wallets[$index]['code'] ."\n");
            afficher ('solde: ' .$wallets[$index]['solde'] ."\n");
        }

    }

   
    function saisirWallet():array{

        $wallet = ['client' => '', 'telephone' => '', 'code' => 0, 'solde' => 0];
        $wallet['client'] = saisie("Donnez votre nom: ");


        do {
            $wallet['telephone'] = (int) saisie("Donnez votre numero de telephone: ");

            if (!verifierLongueur($wallet['telephone'])) {
                afficher("Le numero doit contenir 9 chiffres");
            }

            else if (!verifierPrefixe($wallet['telephone'])) {
                afficher("Prefixe invalide");
            }

        } while (!verifierLongueur($wallet['telephone']) || !verifierPrefixe($wallet['telephone']));


        do {
            $wallet['code'] = (int) saisie("Donnez votre code: ");

            if (!verifierLongueur($wallet['code'],4)) {
                afficher("Le code doit avoir 4 chiffres!!");
    
            }

        } while (!verifierLongueur($wallet['code'],4));


        $wallet['solde'] = (int) saisie("Donnez votre solde: ");
        return $wallet;

    }

    function creerWalletController():void{

        $wallet = saisirWallet();
        creerWalletService($wallet);

    }

?>