<?php
// Connexion à la base de données
$pdo = new PDO('mysql:hostdb5012382115.hosting-data.io;dbname=ma_base_de_donnees', 'dbu153007', '2207042010Az@');

// Récupération des données du formulaire
$email = $_POST['email'];
$mot_de_passe = $_POST['mot_de_passe'];

// Vérification si l'utilisateur existe dans la base de données
$stmt = $pdo->prepare('SELECT * FROM utilisateurs WHERE email = ?');
$stmt->execute([$email]);
$user = $stmt->fetch();

if (!$user) {
    echo 'Cet email n\'est pas enregistré. Veuillez vous inscrire d\'ab
