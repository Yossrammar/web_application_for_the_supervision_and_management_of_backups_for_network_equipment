<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=équipement', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit();
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des valeurs du formulaire
    $marque = $_POST['Marque'];
    $model = $_POST['Model'];
    $client = $_POST['Client'];
    $adresseIP = $_POST['AdresseIP'];
    $description = $_POST['description'];
    $aSuperviser = $_POST['Radios'];
    $adresseEmail = $_POST['AdresseEmail'];
    $motDePasse = $_POST['mot_de_passe'];

    // Requête d'insertion des données dans la base de données
    $sql = "INSERT INTO equipements (marque, model, client, adresse_ip, description, a_superviser, adresse_email, mot_de_passe) 
            VALUES (:marque, :model, :client, :adresseIP, :description, :aSuperviser, :adresseEmail, :motDePasse)";
    $stmt = $pdo->prepare($sql);

    // Liaison des valeurs des paramètres
    $stmt->bindParam(':marque', $marque);
    $stmt->bindParam(':model', $model);
    $stmt->bindParam(':client', $client);
    $stmt->bindParam(':adresseIP', $adresseIP);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':aSuperviser', $aSuperviser);
    $stmt->bindParam(':adresseEmail', $adresseEmail);
    $stmt->bindParam(':motDePasse', $motDePasse);

    // Exécution de la requête
    if ($stmt->execute()) {
        echo "Les données ont été insérées avec succès.";
    } else {
        echo "Erreur lors de l'insertion des données.";
    }
}
?>
