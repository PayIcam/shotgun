Shotgun
==========

Shotgun est une micro-billetterie, pour les associations de l'Icam.

Dépendances écosystème PayIcam
--------------------------

Cette application est dépendante de [PayIcam](https://github.com/PayIcam/server) pour réaliser la partie paiement en ligne, et gestion des droits pour la partie administrative.

Elle est également dépendante de [ginger](https://github.com/simde-utc/ginger) pour vérifier si les utilisateurs sont bien cotisants au [BDE-UTC](https://assos.utc.fr/), et récupérer leurs infos personnelles (nom, prénom, email)

L'authentification des utilisateurs, se fait en utilisant le système d'authentification centralisé CAS.

Installation
------------

```
curl -s https://getcomposer.org/installer | php
./composer.phar install
```

Puis accéder à `http://my.url/shotgunutc/install`.


Auteur/Licence
--------------

Cette application a été produite par [Matthieu Guffroy](http://www.mattgu.com).
Et est soumise à la licence [Beerware](http://fr.wikipedia.org/wiki/Beerware).
Puis réadaptée pour PayIcam.


