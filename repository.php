<?php
    
    $wallets = [
        0 => ['client'=> 'Baila Wane', 'telephone'=> 771001010, 'code'=> 1234, 'solde'=>0],
        1 => ['client'=> 'Hawa Wane', 'telephone'=>  777777777, 'code'=> 0000, 'solde'=>100000]
    ] ;

    function creerWallet(array $newWallet){
        global $wallets;
        $wallets[] = $newWallet;
    }

    function trouverWalletParTelephone(int $telephone): int{

        global $wallets;

        foreach($wallets as $index => $wallet){

            if($wallet['telephone'] === $telephone){

                return $index;
                
            }

        }

        return -1;
    }

?>