<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=db5012382115.hosting-data.io;dbname=ma_base_de_donnees', 'nom_utilisateur', 'mot_de_passe');

// Récupération des données du formulaire
$nom_utilisateur = $_POST['nom_utilisateur'];
$email = $_POST['email'];
$mot_de_passe = $_POST['mot_de_passe'];

// Vérification si l'utilisateur existe déjà dans la base de données
$stmt = $pdo->prepare('SELECT COUNT(*) FROM utilisateurs WHERE email = ?');
$stmt->execute([$email]);
if ($stmt->fetchColumn() > 0) {
    echo 'Cet email est déjà utilisé. Veuillez en choisir un autre.';
    exit();
}

// Insertion de l'utilisateur dans la base de données
$stmt = $pdo->prepare('INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES (?, ?, ?)');
$stmt->execute([$nom_utilisateur, $email, password_hash($mot_de_passe, PASSWORD_DEFAULT)]);

echo 'Inscription réussie !';
?>

