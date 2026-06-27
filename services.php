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

?>