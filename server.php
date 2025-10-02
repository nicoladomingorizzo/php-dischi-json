<?php

// Usaimo il file_get_contents per prendere l'array da cds.json
$json_text = file_get_contents('./cds.json');

// Usiamo il json_decode per decodificare la lista presa dal file json
$cds = json_decode($json_text, true);

?>