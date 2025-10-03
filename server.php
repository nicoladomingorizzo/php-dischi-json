<?php

// Se metodo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Usaimo il file_get_contents per prendere l'array da cds.json
    $json_text = file_get_contents('./cds.json');

    // Usiamo il json_decode per decodificare la lista presa dal file json
    $cds = json_decode($json_text, true);

    // Creiamo la variabile del nuovo_cd con i dati di  $_POST
    $nuovo_cd = [
        'titolo' => trim($_POST['nuovo_titolo'] ?? ''),
        'artista' => trim($_POST['nuovo_artista'] ?? ''),
        'url_cover' => trim($_POST['url_cover'] ?? ''),
        'anno_pubblicazione' => (int) ($_POST['anno_di_pubblicazione'] ?? 0),
        'genere' => trim($_POST['genere'] ?? '')
    ];

    if (!empty($nuovo_cd['titolo'])) {
        $cds[] = $nuovo_cd;

        // Ricodifico il file che avevo preso dal json
        $json_text = json_encode($cds);

        // Sovrascrivo il file json
        file_put_contents('./cds.json', $json_text);
    }

    // // Reindirizziamo con header alla index
    header('Location: ./index.php');
    exit;
}

// Leggiamo i dati esistenti per la visualizzazione su index.php
$json_text = file_get_contents('./cds.json');
$cds = json_decode($json_text, true);

$title = 'PHP Dischi JSON';

?>