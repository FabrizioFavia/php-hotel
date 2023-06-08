<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
</head>
<body>
    <?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

    ?>
    <div class="container-lg">

        <h1 class="my-5">Cerca gli hotel selezionando le opzioni disponibili</h1>

        <form action="index.php" method="GET">
            <div class="optContainer d-flex">
                <div class="mb-3">
                    <label class="me-3" for="hotelVote">Voto della struttura: </label>
                    <select class="me-3" name="vote" id="hotelVote">
                        <option value="">Seleziona voto</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select> 
                </div>
                <div class="form-check me-3">
                    <input class="form-check-input" type="checkbox" name="radio" id="radioTrue" value="1">
                    <label class="form-check-label" for="flexRadioDefault1">Con Parcheggio</label>
                </div>
                <div class="form-check me-3">
                    <input class="form-check-input" type="checkbox" name="radio" id="radioFalse" value="">
                    <label class="form-check-label" for="flexRadioDefault2">Senza Parcheggio</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary my-3 me-5">Cerca</button>
        </form>

        <h2 class="my-3">Lista degli Hotel</h2>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome Hotel</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Parcheggio</th>
                    <th scope="col">Voto</th>
                    <th scope="col">Distanza dal centro</th>
                </tr>
            </thead>
            <tbody> 
                <?php
                    $i = 1;
                    foreach ($hotels as $hotel) {
                        if ((isset($_GET["vote"]) && $hotel['vote'] == $_GET["vote"]) || (!isset($_GET["vote"]) || $_GET["vote"]=="")) {
                            if (!isset($_GET["radio"]) || ($_GET["radio"] == '1' && $hotel['parking']) || ($_GET["radio"] == '' && !$hotel['parking'])) {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i++ ?></th>
                                    <td><?php echo  $hotel['name'] ?></td>
                                    <td><?php echo  $hotel['description'] ?></td>
                                    <td><?php echo  $hotel['parking'] ? 'Con parcheggio' : 'Senza parcheggio' ?></td>
                                    <td><?php echo  $hotel['vote'] ?></td>
                                    <td><?php echo  $hotel['distance_to_center'] . " km" ?></td>
                                </tr>
                                <?php
                            }
                        }
                    }
                ?>
            </tbody>
        </table>   
    </div>     

</body>
</html>
