$mdp = "Internet13013!" RESPONSABLE ou "0107" SALARIE
$hash = password_hash($mdp, PASSWORD_DEFAULT);

- mettre le ini_set dans le config à 0 lorsque l'on met le site en production

- Accès à la partie administration : bourvence/login

- Générer le fichier products.index pour moteur_recherche :
aller dans le navigateur et entrer l'url :
http://localhost/bourvence/moteur_recherche/generate_index.php
cela générera le fichier d'index

- Pour sendmail:
Dans wamp, remplacer dans PHP.ini
SMTP=smtp.gmail.com
smtp_port=587
sendmail_from = cavebourvence@gmail.com
sendmail_path = "C:\wamp64\sendmail\sendmail.exe\"