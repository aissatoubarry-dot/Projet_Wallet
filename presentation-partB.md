# Présentation Technique de la Partie B

## Projet : Application Wallet

Réalisé par : **Aïssatou Barry**

---

# Introduction

Dans la Partie B de ce projet, nous avons amélioré l'application Wallet développée lors de la Partie A.

L'objectif principal était de rendre le code plus propre, plus organisé et plus professionnel. Pour cela, nous avons utilisé certaines fonctionnalités avancées du langage PHP telles que les fonctions natives sur les tableaux et les Namespaces.

Cette partie nous a également permis de découvrir des outils très utilisés dans le développement moderne en PHP comme Composer et Packagist.

# 1. Les fonctions anonymes

Une fonction anonyme est une fonction qui ne possède pas de nom.

Contrairement aux fonctions classiques, elle est généralement utilisée directement à l'endroit où elle est déclarée.

Exemple :

```php
$bonjour = function () {
    echo "Bonjour";
};
```

Dans notre projet, nous avons utilisé des fonctions anonymes avec la fonction `array_map()` afin de parcourir et afficher les transactions.

Exemple :

```php
array_map(function($transaction){

    echo $transaction['montant'];

}, $transactions);
```

L'utilisation des fonctions anonymes permet d'écrire un code plus compact et plus lisible.

# 2. Les fonctions fléchées (Arrow Functions)

Les fonctions fléchées ont été introduites à partir de PHP 7.4.

Elles permettent d'écrire des fonctions anonymes de manière plus courte.

La syntaxe générale est la suivante :

```php
fn($x) => $x * 2;
```

Dans notre projet, nous avons utilisé une fonction fléchée pour rechercher un wallet à partir de son numéro de téléphone.

Exemple :

```php
$resultat = array_filter(
    $wallets,
    fn($wallet) => $wallet['telephone'] === $telephone
);
```

Cette écriture rend le code plus simple et évite d'écrire plusieurs lignes pour une opération simple.

# 3. Les Closures en PHP

Une Closure est une fonction anonyme capable d'utiliser des variables déclarées à l'extérieur grâce au mot-clé `use`.

Exemple :

```php
array_map(

    function($transaction) use ($wallets){

        echo $wallets[
            $transaction['indexClient']
        ]['client'];

    },

    $transactions

);
```

Dans cet exemple, la variable `$wallets` est déclarée à l'extérieur de la fonction anonyme.

L'instruction :

```php
use ($wallets)
```

permet à la fonction d'accéder à cette variable.

Les Closures sont très utiles lorsqu'une fonction a besoin d'utiliser des données externes.

# 4. Les fonctions natives de tableaux en PHP

PHP possède plusieurs fonctions permettant de manipuler facilement les tableaux.

Durant ce projet, nous avons principalement utilisé les fonctions suivantes :

## array_filter()

Cette fonction permet de filtrer les éléments d'un tableau selon une condition.

Exemple :

```php
$resultat = array_filter(
    $wallets,
    fn($wallet) => $wallet['telephone'] === $telephone
);
```

Dans notre projet, cette fonction est utilisée pour rechercher un wallet à partir de son numéro de téléphone.

## array_map()

Cette fonction permet d'appliquer un traitement sur chaque élément d'un tableau.

Exemple :

```php
array_map(function($transaction){

    echo $transaction['montant'];

}, $transactions);
```

Dans notre application, `array_map()` est utilisée pour afficher les différentes transactions.

## array_key_first()

Cette fonction retourne la première clé d'un tableau.

Exemple :

```php
return array_key_first($resultat);
```

Elle nous permet de récupérer l'index du wallet trouvé après l'utilisation de `array_filter()`.

L'utilisation de ces fonctions natives nous a permis de réduire le nombre de boucles `foreach` dans notre code et d'améliorer sa lisibilité.

# 5. Les Namespaces

Les Namespaces permettent de mieux organiser un projet PHP.

Ils servent également à éviter les conflits de noms entre les différentes fonctions ou fichiers.

Dans notre projet, nous avons organisé le code en plusieurs dossiers :

```text
Projet_Wallet/

Controller/
Services/
Repository/
Validator/
Fonctions/

index.php
```

Chaque dossier possède son propre Namespace.

Exemple :

```php
namespace Services;
```

Pour utiliser une fonction située dans un autre Namespace, nous utilisons l'instruction :

```php
use function Fonctions\afficher;
```

L'utilisation des Namespaces rend l'application plus structurée et facilite sa maintenance.

# 6. Composer

Composer est le gestionnaire de dépendances officiel de PHP.

Il permet d'installer facilement des bibliothèques externes dans un projet.

Par exemple, lorsqu'un développeur souhaite utiliser une bibliothèque, il peut simplement l'installer avec Composer sans avoir à télécharger manuellement tous les fichiers.

Exemple :

```bash
composer install
```

Composer simplifie énormément le développement des applications PHP modernes.

# 7. Packagist

Packagist est la plateforme officielle contenant les bibliothèques PHP utilisables avec Composer.

Le site officiel est :

https://packagist.org

Il regroupe des milliers de packages développés par la communauté PHP.

Parmi les bibliothèques les plus connues disponibles sur Packagist, on peut citer :

* Symfony
* PHPUnit
* Monolog

Lorsque nous installons une bibliothèque avec Composer, celle-ci est généralement téléchargée depuis Packagist.

# Conclusion

La Partie B nous a permis de découvrir des concepts importants du développement moderne en PHP.

Grâce à l'utilisation des fonctions natives, des fonctions anonymes et des Namespaces, nous avons pu améliorer la qualité et l'organisation de notre projet Wallet.


