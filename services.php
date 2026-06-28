<?php
    require_once 'repository.php';
    require_once 'validator.php';

    function creerWalletService ( array $wallet):void{
        global $wallets;

        $indexTel = unicite($wallets, 'telephone', $wallet['telephone']);

        $indexCode = unicite($wallets, 'code', $wallet['code']);

        if($indexCode != -1){
            afficher("Ce code existe déjà!");
            return;
        }

        if ($indexTel != -1) {
            afficher("Ce numero existe déjà!");
            return;
        }
        
        creerWallet($wallet);
        afficher("Wallet creé avec succès \n");
                
    }


    function faireDepotService(int $telephone, int $montant): void{

        global $wallets;

        $index = trouverWalletParTelephone($telephone);

        if($index == -1){

            afficher("Ce numero n'existe pas dans le wallet!!!");
            return;

        }

        if($montant <= 0){

            afficher("Le montant doit etre positif!!!");
            return;

        }

        $wallets[$index]['solde'] += $montant;

        afficher("Depot effectué avec succès!!!");

        afficher("Nouveau solde : " .$wallets[$index]['solde']);

    }


    function calculerFrais(int $montant): int{

        if($montant <= 10000){

            return 200;

        }

        if($montant <= 100000){

            return 500;

        }

        $frais = $montant * 0.01;

        if($frais > 5000){

            return 5000;

        }

        return $frais;
    }


    function faireRetraitService(int $telephone, int $montant): void{

        global $wallets;

        $index = trouverWalletParTelephone($telephone);

        if($index == -1){

            afficher("Ce numero n'existe pas dans le wallet!!!");
            return;

        }

        if($montant <= 0){

            afficher("Le montant doit etre positif!!!");
            return;

        }

        $frais = calculerFrais($montant);

        $montantTotal = $montant + $frais;

        if($wallets[$index]['solde'] < $montantTotal){

            afficher("Solde insuffisant");
            return;

        }

        $wallets[$index]['solde'] -= $montantTotal;

        afficher("Retrait effectue avec succes");

        afficher("Frais : " . $frais);

        afficher("Nouveau solde : " .$wallets[$index]['solde']);

    }

?>