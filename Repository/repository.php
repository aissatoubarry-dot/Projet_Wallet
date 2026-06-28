<?php
    
    namespace Repository;
    $wallets = [
        0 => ['client'=> 'Baila Wane', 'telephone'=> 771001010, 'code'=> 1234, 'solde'=>0],
        1 => ['client'=> 'Hawa Wane', 'telephone'=>  777777777, 'code'=> 0000, 'solde'=>100000]
    ] ;

    $transactions = [
        0 => ['type' => 'depot','montant' => 10000,'frais' => 0,'indexClient' => 0 ],
        1 => ['type' => 'retrait','montant' => 5000,'frais' => 200,'indexClient' => 0 ]
    ];

    function creerWallet(array $newWallet){
        global $wallets;
        $wallets[] = $newWallet;
    }

    function trouverWalletParTelephone(int $telephone): int{

        global $wallets;

        $resultat = array_filter($wallets, fn($wallet) => $wallet['telephone'] === $telephone);

        if (empty($resultat)) {
            return -1;
        }

        return array_key_first($resultat);

    }

    function ajouterTransaction(string $type, int $montant, int $frais, int $indexClient): void{

        global $transactions;
        $transactions[] = ['type' => $type,'montant' => $montant, 'frais' => $frais, 'indexClient' => $indexClient];
        
    }

?>