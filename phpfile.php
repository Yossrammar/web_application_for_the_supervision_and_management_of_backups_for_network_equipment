<?php
$pdo = new Pdo("localhost", "root", "","equipements"); 
if($_POST){
$result = $pdo->exec("INSERT INTO équipements (prenom, nom, sexe, service, date_embauche, salaire) 
VALUES ('$_POST[prenom]', '$_POST[nom]', '$_POST[sexe]', '$_POST[service]','$_POST[date_embauche]', '$_POST[salaire]')");
echo '<div style="background: green; padding: 5px;">l\'employé a bien été ajouté</div>';
}

?>