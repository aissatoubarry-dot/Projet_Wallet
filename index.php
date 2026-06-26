<?php
    
    do {

        echo(" Menu Distributeur\n ");
        echo("1. Créer Wallet \n");
        echo("2. Faire Dépôt \n");
        echo("3. Faire Retrait \n");
        echo("4. Lister les Transactions \n");
        echo("0. Quitter \n");
        $choix = readline("Entrez votre choix:  \n");

        switch ($choix) {
            case 1: 
                echo("Vous voulez creer un wallet \n") ; 
                break;
            case 2: 
                echo("Vous voulez faire un depot \n") ; 
                break;
            case 3: 
                echo("Vous voulez faire un retrait \n"); 
                break;
            case 4: 
                echo("Vous voulez lister les transactions \n") ; 
                break;
            case 0: 
                echo( "Aurevoir! \n"); 
                break;
            default: 
                echo ("Choix invalide, veuillez réessayer \n");
                break;
        }

    }while($choix != 0 );

?>
