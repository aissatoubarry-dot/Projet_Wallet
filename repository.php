<?php
    
    $wallets = [
        0 => ['client'=> 'Baila Wane', 'telephone'=> 771001010, 'code'=> 1234, 'solde'=>0],
        1 => ['client'=> 'Hawa Wane', 'telephone'=>  777777777, 'code'=> 0000, 'solde'=>100000]
    ] ;

    function creerWallet(array $newWallet){
        global $wallets;
        $wallets[] = $newWallet;
    }

?>