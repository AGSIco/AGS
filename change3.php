<?php
libxml_use_internal_errors(true);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST["titre"];
    $texte = $_POST["texte"];
    $src_media = $_POST["src_media"];

    $dom = new DOMDocument();
    $dom->loadHTMLFile('index.html');
    libxml_clear_errors();
    $element_titre = $dom->getElementById('titre');
    $element_texte = $dom->getElementById('texte');
    $element_media = $dom->getElementById('media');

    $element_titre->nodeValue = $titre;
    $element_texte->nodeValue = $texte;
    $element_media->setAttribute('src', $src_media);

    $dom->saveHTMLFile('index.html');
    header('Location: index.html?showTable=true');
    exit;
}
?>
