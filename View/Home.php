<?php
require_once __DIR__ . "/../Database/tripsDB.php";

$stmt = $conn->prepare("SELECT * FROM Trips ORDER BY trip_id DESC");
$stmt->execute();
$trips = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>

    <style>
        body {
    margin: 0;
    font-family: Arial, sans-serif;

    background:
        linear-gradient(
            180deg,
            #02070c 0%,
            #001a2d 35%,
            #002b4a 70%,
            #003b66 100%
        );

    background-attachment: fixed;

    color: white;
}

       .topbar {

    height: 80px;

    background: rgba(0, 0, 0, 0.72);

    backdrop-filter: blur(12px);

    border-bottom: 1px solid rgba(45,168,255,0.2);

    display: flex;

    justify-content: flex-end;

    align-items: center;

    padding: 0 45px;

    gap: 20px;

    position: sticky;

    top: 0;

    z-index: 10;

    box-shadow:
        0 4px 20px rgba(0,0,0,0.35),
        0 0 20px rgba(45,168,255,0.08);
}

.top-btn {

    width: 50px;
    height: 50px;

    border-radius: 14px;

    background:
        linear-gradient(
            145deg,
            rgba(20,20,25,0.95),
            rgba(10,10,15,0.95)
        );

    border: 1px solid rgba(45,168,255,0.15);

    color: white;

    text-decoration: none;

    display: flex;

    justify-content: center;

    align-items: center;

    font-size: 22px;

    transition:
        transform 0.25s ease,
        background 0.25s ease,
        border-color 0.25s ease,
        box-shadow 0.25s ease;

    box-shadow:
        0 4px 12px rgba(0,0,0,0.3);
}

.top-btn:hover {

    background:
        linear-gradient(
            145deg,
            #003b66,
            #0066b3
        );

    border-color: #2da8ff;

    transform:
        translateY(-5px)
        scale(1.08);

    box-shadow:
        0 10px 25px rgba(45,168,255,0.35),
        0 0 20px rgba(45,168,255,0.25);
}

        .page {
            max-width: 1100px;
            margin: auto;
            padding: 35px;
        }

        h1 {
            color: #2da8ff;
            margin-bottom: 25px;
        }

        .trips-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
        }

       .trip-card {

    position: relative;

    overflow: hidden;

    transition:
        transform 0.35s ease,
        box-shadow 0.35s ease,
        border-color 0.35s ease;
}

.trip-card::before {

    content: "";

    position: absolute;

    top: -120%;
    left: -40%;

    width: 180%;
    height: 300%;

    background:
        linear-gradient(
            120deg,
            transparent,
            rgba(45,168,255,0.08),
            transparent
        );

    transform: rotate(20deg);

    transition: 0.7s ease;

    pointer-events: none;
}

.trip-card:hover::before {

    top: -20%;
    left: 100%;
}

.trip-card:hover .trip-img {

    transform: scale(1.06);
}

.trip-img {

    transition:
        transform 0.5s ease,
        filter 0.4s ease;
}

.trip-card:hover .trip-img {

    filter:
        brightness(1.08)
        saturate(1.1);
}

.trip-card:hover .trip-title {

    color: #59c2ff;

    text-shadow:
        0 0 12px rgba(45,168,255,0.35);
}
        .trip-card:hover {

    transform:
        translateY(-10px)
        scale(1.025);

    border-color: #2da8ff;

    box-shadow:
        0 20px 45px rgba(0,0,0,0.45),
        0 0 35px rgba(45,168,255,0.22);

}

        .trip-img {
            width: 100%;
            height: 210px;
            object-fit: cover;
            background: #111;
        }

        .trip-content {
            padding: 18px;
        }

        .trip-title {
            font-size: 23px;
            color: #2da8ff;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .trip-destination {
            font-size: 16px;
            color: #ddd;
            margin-bottom: 12px;
        }

        .trip-info {
            margin: 8px 0;
            color: #ccc;
            font-size: 14px;
        }

        .label {
            color: #2da8ff;
            font-weight: bold;
        }

        .price {
            margin-top: 15px;
            font-size: 20px;
            font-weight: bold;
            color: #00ffae;
        }

        .category {
            display: inline-block;
            margin-top: 12px;
            padding: 6px 12px;
            border-radius: 20px;
            background: #001f3f;
            color: #2da8ff;
            font-size: 13px;
        }
        .trip-link {
    text-decoration: none;
    color: inherit;
}
    </style>
</head>

<body>

<div class="topbar">
<a href="../index.php?profile=1" class="top-btn">👤</a>
<a href="../index.php?chats=1" class="top-btn">✉</a>
<a href="#" class="top-btn">🔔</a>
<a href="../index.php?friends=1" class="top-btn">👥</a>
<a href="../index.php?uploadTrip=1" class="top-btn">+</a>
<a href="../Controller/LogoutController.php" class="top-btn">⎋</a>
</div>

<div class="page">
    <h1>Explore Trips</h1>

    <div class="trips-grid">

        <?php foreach ($trips as $trip): ?>

            <a href="index.php?trip=<?php echo $trip['trip_id']; ?>"
   class="trip-link">

    <div class="trip-card">

                <?php if (!empty($trip["image"])): ?>

    <?php
    $image = $trip["image"];

    if (!str_starts_with($image, "uploads/")) {
        $image = "uploads/" . $image;
    }
    ?>

    <img
        class="trip-img"
        src="<?php echo htmlspecialchars($image); ?>"
    >

<?php else: ?>

    <div class="trip-img"></div>

<?php endif; ?>

                <div class="trip-content">

                    <div class="trip-title">
                        <?php echo htmlspecialchars($trip["trip_name"]); ?>
                    </div>

                    <div class="trip-destination">
                        📍 <?php echo htmlspecialchars($trip["destination"]); ?>
                    </div>

                    <div class="trip-info">
                        <span class="label">Departure:</span>
                        <?php echo htmlspecialchars($trip["departure"]); ?>
                    </div>

                    <div class="trip-info">
                        <span class="label">Return:</span>
                        <?php echo htmlspecialchars($trip["return_date"]); ?>
                    </div>

                    <div class="trip-info">
                        <span class="label">Itinerary:</span>
                        <?php echo htmlspecialchars($trip["itinerary"]); ?>
                    </div>

                    <div class="price">
                        €<?php echo htmlspecialchars($trip["cost"]); ?>
                    </div>

                    <div class="category">
                        <?php echo htmlspecialchars($trip["category"]); ?>
                    </div>

                </div>
            </div> </a>

        <?php endforeach; ?>

    </div>
</div>

</body>
</html>