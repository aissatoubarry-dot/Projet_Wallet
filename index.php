<?php
    require_once 'controller.php';
    
    do {

        afficher(" Menu Distributeur\n ");
        afficher("1. Créer Wallet \n");
        afficher("2. Faire Dépôt \n");
        afficher("3. Faire Retrait \n");
        afficher("4. Lister les Transactions \n");
        afficher("0. Quitter \n");
        $choix = saisie("Entrez votre choix:  \n");

        switch ($choix) {
            case 1: 
                afficher("Vous voulez creer un wallet \n") ; 
                creerWalletController();
                break;
            case 2: 
                afficher("Vous voulez faire un depot \n") ; 
                faireDepotController();
                break;
            case 3: 
                afficher("Vous voulez faire un retrait \n"); 
                faireRetraitController();
                break;
            case 4: 
                afficher("Vous voulez lister les transactions \n") ; 
                listerTransactionsController();
                break;
            case 0: 
                afficher( "Aurevoir! \n"); 
                break;
            default: 
                afficher ("Choix invalide, veuillez réessayer \n");
                break;
        }

    }while($choix != 0 );

?>
