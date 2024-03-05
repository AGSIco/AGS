<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Vérifiez si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenez les données du formulaire
    $titre = $_POST["titre"];
    $sous_titre = $_POST["sous_titre"];
    $src_image = $_POST["src_image"];
    $texte = $_POST["texte"];

    // Chargez le contenu HTML de page1.html
    $html = file_get_contents('actualite.html');

    // Créez un objet DOM
    $dom = new DOMDocument();
    
    // Chargez le HTML dans l'objet DOM
    $dom->loadHTML($html);
    libxml_clear_errors();

    // Obtenez les éléments à mettre à jour
    $element_titre = $dom->getElementById('titre');
    $element_sous_titre = $dom->getElementById('sous_titre');
    $element_src_image = $dom->getElementById('src_image');
    $element_texte = $dom->getElementById('texte');

    // Mettez à jour les éléments avec les nouvelles données
    $element_titre->nodeValue = $titre;
    $element_sous_titre->nodeValue = $sous_titre;
    $element_src_image->setAttribute('src', $src_image);
    $element_texte->nodeValue = $texte;

    // Enregistrez le HTML mis à jour
    $html = $dom->saveHTML();

    // Écrivez le HTML mis à jour dans page1.html
    file_put_contents('actualite.html', $html);

    // Redirigez vers page1.html
    header('Location: actualite.html');
    exit;
}
?>
