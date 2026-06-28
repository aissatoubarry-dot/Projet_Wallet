<?php
    namespace Controller;

    use function Services\creerWalletService;
    use function Services\faireDepotService;
    use function Services\faireRetraitService;
    use function Validator\verifierLongueur;
    use function Validator\verifierPrefixe;
    use function Fonctions\saisie;
    use function Fonctions\afficher;

    require_once __DIR__.'/../Fonctions/fonctions.php';
    require_once __DIR__.'/../Services/services.php';
    require_once __DIR__.'/../Validator/validator.php';
   

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

    function faireDepotController(): void{

        $telephone = (int) saisie("Donnez le numero du wallet : ");
        $montant = (int) saisie("Donnez le montant a deposer : ");
        faireDepotService($telephone, $montant);

    }

    function faireRetraitController(): void{

        $telephone = (int) saisie("Donnez le numero du wallet : " );
        $montant = (int) saisie("Donnez le montant a retirer : ");
        faireRetraitService($telephone, $montant);

    }


    function afficherTransaction(array $transactions,array $wallets): void{

        array_map(function($transaction) use ($wallets) {

            afficher("Type : ".$transaction['type']);

            afficher("Montant : ".$transaction['montant']);

            afficher("Frais : ".$transaction['frais']);

            $indexClient = $transaction['indexClient'];

            afficher("Titulaire : ".$wallets[$indexClient]['client']);

            afficher("----------------------");
        }
        
        ,$transactions);

    }

    function listerTransactionsController(): void{

        global $transactions, $wallets;

        afficherTransaction($transactions, $wallets);

    }

?>