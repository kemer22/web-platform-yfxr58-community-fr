<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=ma_base_de_donnees', 'nom_utilisateur', 'mot_de_passe');

// Récupération des données du formulaire
$email = $_POST['email'];
$mot_de_passe = $_POST['mot_de_passe'];

// Vérification si l'utilisateur existe dans la base de données
$stmt = $pdo->prepare('SELECT * FROM utilisateurs WHERE email = ?');
$stmt->execute([$email]);
$user = $stmt->fetch();

if (!$user) {
    echo 'Cet email n\'est pas enregistré. Veuillez vous inscrire d\'ab
