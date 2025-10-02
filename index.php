<?php

require_once './server.php';

?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title><?php echo $title ?></title>
    </head>
    <body class="bg-black text-white"> 
        <div class="container text-center mx-auto py-4">
            <h1 class="my-5">LISTA DISCHI</h1>
            
            <!-- Form inserimento nuovo disco -->
            <h3>Aggiungi un nuovo disco</h3>
            <form action="server.php" method="POST" class="mb-5 mt-3 ">
                <!-- titolo -->
                <input
                class="ps-2 mx-1" 
                type="text"
                id="nuovo_titolo"
                name="nuovo_titolo"
                placeholder="Titolo album...">
                
                <!-- artista -->
                <input
                class="ps-2 mx-1" 
                type="text"
                id="nuovo_artista"
                name="nuovo_artista"
                placeholder="Nome artista...">
                
                <!-- url cover -->
                <input
                class="ps-2 mx-1" 
                type="url"
                id="url_cover"
                name="url_cover"
                placeholder="https://esempio.com">
                
                <!-- anno di pubblicazione -->
                <input
                class="ps-2 mx-1" 
                type="number"
                id="anno_di_pubblicazione"
                name="anno_di_pubblicazione"
                min="0"
                max="2025"
                placeholder="Anno">
                
                <!-- genere -->
                <input
                class="ps-2 mx-1" 
                type="text"
                id="genere"
                name="genere"
                placeholder="Genere...">
                
                <button class="btn btn-secondary">Aggiungi</button>
            </form>
            
            <!-- visualizzazione griglia -->
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 justify-content-center">
            <?php
            foreach ($cds as $cd) {
                ?>
                <div class="col d-flex justify-content-center">
                    <!-- card -->
                    <div class="card h-100 bg-secondary text-white shadow-lg" >
                        <!-- immagine -->
                        <img src="<?php echo $cd['url_cover']; ?>" 
                            class="card-img-top p-2 rounded-5 img-fluid" 
                            alt="<?php echo $cd['title']; ?>">
                        <!-- informazioni varie -->
                        <div class="card-body">
                            <h5 class="card-title text-uppercase fw-bold">
                                <?php echo $cd['titolo']; ?>
                            </h5>
                            
                            <p class="card-text mb-1">
                                <small class="text-white-50"><?php echo $cd['artista']; ?></small>
                            </p>
                            
                            <p class="card-text">
                                <strong class="fs-6"><?php echo $cd['anno_pubblicazione']; ?></strong>
                                <br>
                                <strong class="text-white-50"><?php echo $cd['genere']; ?></strong>
                            </p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <br>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>