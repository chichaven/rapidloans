<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $type_pret = htmlspecialchars($_POST['type_pret']);
    $montant = htmlspecialchars($_POST['montant']);

    // Validation basique
    if (empty($nom) || empty($email) || empty($telephone) || empty($type_pret) || empty($montant)) {
        die("Erreur : Tous les champs sont requis.");
    }

    // Préparer le message email
    $to = "bduplex711@gmail.com"; // Remplacez par votre adresse email
    $subject = "Nouvelle demande de prêt - Prêts Québec";
    $message = "Nom : $nom\n";
    $message .= "Email : $email\n";
    $message .= "Téléphone : $telephone\n";
    $message .= "Type de prêt : $type_pret\n";
    $message .= "Montant : $montant\n";
    $headers = "From: no-reply@pretsquebec.com";

    // Envoyer l'email
    if (mail($to, $subject, $message, $headers)) {
        // Redirection avec message de succès
        header("Location: index.html?success=1");
    } else {
        echo "Erreur lors de l'envoi de l'email.";
    }
} else {
    echo "Méthode non autorisée.";
}
?>
