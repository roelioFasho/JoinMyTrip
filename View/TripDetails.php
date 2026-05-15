<?php
require_once __DIR__ . "/../Database/tripsDB.php";

$id = $_GET["trip"];

$stmt = $conn->prepare("
    SELECT * FROM Trips
    WHERE trip_id = ?
");

$stmt->execute([$id]);

$trip = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($trip["trip_name"]); ?></title>

    <style>

        body {
            margin: 0;
            background: #050b14;
            color: white;
            font-family: Arial;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            padding: 40px;
        }

        .hero {
            width: 100%;
            height: 450px;
            object-fit: cover;
            border-radius: 20px;
        }

        .title {
            font-size: 42px;
            margin-top: 25px;
            color: #2da8ff;
        }

        .destination {
            font-size: 22px;
            color: #ccc;
            margin-top: 10px;
        }

        .section {
            margin-top: 30px;
            background: rgba(255,255,255,0.03);
            padding: 25px;
            border-radius: 16px;
            border: 1px solid rgba(45,168,255,0.15);
        }

        .label {
            color: #2da8ff;
            font-weight: bold;
        }

        .price {
            font-size: 32px;
            color: #00ffaa;
            margin-top: 20px;
            font-weight: bold;
        }

    </style>
</head>

<body>

<div class="container">

    <img class="hero"
         src="uploads/<?php echo htmlspecialchars($trip["image"]); ?>">

    <div class="title">
        <?php echo htmlspecialchars($trip["trip_name"]); ?>
    </div>

    <div class="destination">
        📍 <?php echo htmlspecialchars($trip["destination"]); ?>
    </div>

    <div class="section">

        <p>
            <span class="label">Departure:</span>
            <?php echo htmlspecialchars($trip["departure"]); ?>
        </p>

        <br>

        <p>
            <span class="label">Return:</span>
            <?php echo htmlspecialchars($trip["return_date"]); ?>
        </p>

        <br>

        <p>
            <span class="label">Category:</span>
            <?php echo htmlspecialchars($trip["category"]); ?>
        </p>

    </div>

    <div class="section">

        <h2>Trip itinerary</h2>

        <br>

        <p>
            <?php echo nl2br(htmlspecialchars($trip["itinerary"])); ?>
        </p>

    </div>

    <div class="price">
        €<?php echo htmlspecialchars($trip["cost"]); ?>
    </div>

</div>

</body>
</html>