<?php
require_once "../Model/tripModel.php";
$tripRepository = new TripRepository($conn);
$trips = $tripRepository->getAllTrips();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Trips</title>
    <style>
        body { font-family: Arial; background:#f4f6f8; }
        .container { width: 90%; margin: auto; }
        .trip {
            background: white;
            padding: 15px;
            margin: 15px 0;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        img {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>All Trips</h2>

    <?php foreach ($trips as $trip): ?>
        <div class="trip">
            <h3><?= $trip['trip_name'] ?></h3>
            <p><b>Destination:</b> <?= $trip['destination'] ?></p>
            <p><b>Cost:</b> €<?= $trip['cost'] ?></p>
            <p><?= $trip['itinerary'] ?></p>

            <?php if ($trip['image']): ?>
                <img src="../uploads/<?= $trip['image'] ?>">
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>