# Routeur PHP simple
Voici un routeur PHP simple et de petite taille qui peut gérer l'ensemble du routage d'URL pour votre projet.
Il utilise RegExp et les fonctions anonymes de PHP pour créer un système de routage léger et rapide.
Le routeur supporte les paramètres de chemin dynamiques, les routes spéciales 404 et 405 ainsi que la vérification des méthodes de requête comme GET, POST, PUT, DELETE, etc.
La base de code est très petite et très facile à comprendre. Vous pouvez donc l'utiliser comme modèle pour un routeur plus complexe.

Jetez un coup d'oeil au fichier index.php. Comme vous pouvez le voir, la méthode `Route::add()` est utilisée pour ajouter de nouvelles routes à votre projet.
Le premier argument prend le segment de chemin. Vous pouvez aussi utiliser RegExp pour analyser les variables.
Toutes les variables correspondantes seront poussées vers la méthode handler définie dans le second argument.
Le troisième argument correspond à la méthode de requête. La méthode par défaut est 'get'.

## ⛺ Use a different basepath
If your script lives in a subfolder (e.g. /api/v1) set this basepath in your run method:

```php
Route::run('/api/v1');
```
N'oubliez pas de modifier le chemin de base dans le fichier .htaccess si vous utilisez Apache2.

## ⏎ Utiliser return au lieu de echo
Vous n'êtes pas obligé d'utiliser `echo` pour afficher votre contenu. Vous pouvez aussi utiliser l'instruction `return`. Tout ce qui est retourné est automatiquement mis en écho.

``php
// Ajoutez votre première route
Route::add('/', function() {
  return 'Bienvenue :-)' ;
}) ;
```

## ⇒ Utiliser les fonctions flèches
Sachez qu'une fonction Flèche doit toujours retourner une valeur. Par conséquent, vous ne pouvez pas utiliser `echo` directement ici.

``php
Route::add('/arrow/([a-z-0-9-]*)', fn($foo) => 'Ceci est un exemple fonctionnel de fonction flèche. Paramètre : '.$foo ) ;
```

## 📖 Retourner toutes les routes connues
Ceci est utile, par exemple, pour générer automatiquement des routes de test ou des pages d'aide.

```php
$routes = Route::getAll() ;
foreach($routes as $route) {
  echo $route['expression'].' ('.$route['method'].')' ;
}
```

## 🧰 Activer les routes sensibles à la casse, les barres obliques de fin et le mode de correspondance multiple
Les deuxième, troisième et quatrième paramètres de `Route::run('/', false, false, false);` sont définis à false par défaut.
En utilisant ces paramètres, vous pouvez activer et désactiver plusieurs options :
* Deuxième paramètre : Vous pouvez activer le mode sensible à la casse en définissant le deuxième paramètre à true.
* Troisième paramètre : Par défaut, le routeur ignore les barres obliques de fin de ligne. Définissez ce paramètre à true pour éviter cela.
* Quatrième paramètre : Par défaut, le routeur n'exécute que la première route correspondante. Définissez ce paramètre à true pour activer le mode multi-match.

## ⁉ Quelque chose ne fonctionne pas ?
* N'oubliez pas de définir le bon chemin de base comme premier argument dans votre méthode `run()` et dans votre fichier .htaccess.
* Activez mod_rewrite dans vos paramètres Apache2, si vous utilisez Apache2 : `a2enmod apache2`.
* Apache2 charge-t-il au moins le fichier .htaccess ? Vérifiez si l'option `AllowOverride All` est définie dans la configuration d'Apache2 comme dans cet exemple :
```
<Hôte virtuel *:80>
    Nom du serveur mysite.com
    DocumentRoot /var/www/html/mysite.com
    <Directory "/var/www/html/mysite.com">
        AllowOverride All
    </Directory>
</VirtualHost>
```