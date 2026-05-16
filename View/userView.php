<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>

    <style>

        body {
    margin: 0;

    font-family: Arial, sans-serif;

    background:
        radial-gradient(circle at top left, rgba(0,140,255,0.18), transparent 30%),
        radial-gradient(circle at top right, rgba(0,90,255,0.15), transparent 25%),
        linear-gradient(
            180deg,
            #02070c 0%,
            #001a2d 30%,
            #002b4a 65%,
            #00457a 100%
        );

    background-attachment: fixed;

    color: white;
}

        .profile-container {
            max-width: 1000px;
            margin: auto;
            padding: 30px;
        }

        .profile-header {

    position: relative;

    display: flex;

    align-items: center;

    gap: 35px;

    padding: 35px;

    border-radius: 24px;

    background: rgba(10,10,15,0.82);

    border: 1px solid rgba(45,168,255,0.12);

    backdrop-filter: blur(12px);

    box-shadow:
        0 10px 35px rgba(0,0,0,0.35),
        0 0 25px rgba(45,168,255,0.05);

    margin-top: 30px;
}

        .profile-picture {
            width: 140px;
            height: 140px;

            border-radius: 50%;

            background-color: #001f3f;

            border: 3px solid #2da8ff;

            object-fit: cover;
        }

        .profile-info {
            flex: 1;
        }

        .username {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .bio {
            color: #bbbbbb;
            margin-top: 10px;
            max-width: 500px;
        }

        .stats {
            display: flex;
            gap: 35px;
            margin-top: 10px;
        }

        .stat-box {
            text-align: center;
        }

        .stat-number {
            font-size: 20px;
            font-weight: bold;
            color: #2da8ff;
        }

        .stat-label {
            font-size: 14px;
            color: #cccccc;
        }

        .edit-btn {

    position: absolute;

    top: 0;
    right: 0;

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

    cursor: pointer;

    transition:
        transform 0.25s ease,
        background 0.25s ease,
        border-color 0.25s ease,
        box-shadow 0.25s ease;

    box-shadow:
        0 4px 12px rgba(0,0,0,0.3);
}

.edit-btn:hover {

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
        .top-buttons {
    position: absolute;
    top: 0;
    right: 60px;

    display: flex;
    gap: 12px;
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

.top-btn:hover {

    background-color: #001f3f;

    border-color: #2da8ff;
}

.top-btn img {

    width: 20px;
    height: 20px;
}
        .profile-tabs {
            display: flex;
            gap: 15px;

            margin-top: 30px;
            margin-bottom: 30px;
        }

       .tab {

    padding: 14px 24px;

    background: rgba(15,15,20,0.82);

    border: 1px solid rgba(45,168,255,0.12);

    border-radius: 14px;

    cursor: pointer;

    transition:
        transform 0.25s ease,
        background 0.25s ease,
        border-color 0.25s ease,
        box-shadow 0.25s ease;
}

.tab:hover {

    background:
        linear-gradient(
            145deg,
            #003b66,
            #005fa3
        );

    border-color: #2da8ff;

    transform: translateY(-4px);

    box-shadow:
        0 10px 20px rgba(45,168,255,0.2);
}

        .tab:hover {
            background-color: #001f3f;
            border-color: #2da8ff;
        }

        .posts-grid {
            display: grid;

            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));

            gap: 20px;
        }

        .post {

    height: 250px;

    background: rgba(10,10,15,0.9);

    border: 1px solid rgba(45,168,255,0.12);

    border-radius: 20px;

    overflow: hidden;

    transition:
        transform 0.3s ease,
        border-color 0.3s ease,
        box-shadow 0.3s ease;

    box-shadow:
        0 10px 30px rgba(0,0,0,0.3);
}

.post:hover {

    transform:
        translateY(-8px)
        scale(1.02);

    border-color: #2da8ff;

    box-shadow:
        0 18px 40px rgba(0,0,0,0.45),
        0 0 35px rgba(45,168,255,0.18);
}

        .post:hover {
            transform: translateY(-4px);
            border-color: #2da8ff;
        }

        .post img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .post {
    position: relative;
    height: 250px;
    border-radius: 18px;
    overflow: hidden;
}

.post img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.post-overlay {

    position: absolute;

    bottom: 0;
    left: 0;
    right: 0;

    padding: 18px;

    background:
        linear-gradient(
            to top,
            rgba(0,0,0,0.9),
            rgba(0,0,0,0.15),
            transparent
        );
}

.post-title {

    font-size: 20px;

    font-weight: bold;

    color: white;

    margin-bottom: 6px;
}

.post-location {

    color: #d6d6d6;

    font-size: 14px;

    margin-bottom: 8px;
}

.post-price {

    color: #2da8ff;

    font-weight: bold;

    font-size: 18px;
}
.post-link {
    text-decoration: none;
    color: inherit;
}
    </style>
</head>

<body>

    <div class="profile-container">

        <div class="profile-header">

            <img class="profile-picture" src="/Views/user.png">

            <div class="profile-info">

                <div class="username">
                    <?php echo htmlspecialchars($user->getName()); ?>
                </div>

                <div class="stats">

                    <div class="stat-box">
                        <div class="stat-number">24</div>
                        <div class="stat-label">Posts</div>
                    </div>

                    <div class="stat-box">
                        <div class="stat-number">138</div>
                        <div class="stat-label">Friends</div>
                    </div>

                    <div class="stat-box">
                        <div class="stat-number">9</div>
                        <div class="stat-label">Trips</div>
                    </div>

                </div>

                <div class="bio">
                    


                
                </div>

            </div>

            <div class="top-buttons">

    <a href="index.php" class="top-btn">⌂</a>

    <div class="top-btn">🔔</div>

    <a href="index.php?chats=1" class="top-btn">✉</a>
    <a href="../Controller/LogoutController.php" class="top-btn">⎋</a>

</div>

<a href="View/UploadTripsView.php" class="edit-btn">✎</a>

        </div>

        <div class="profile-tabs">

            <div class="tab">Posts</div>

            <div class="tab">Friends</div>

            <div class="tab">Joined Trips</div>

        </div>

        <div class="posts-grid">

<?php foreach ($userTrips as $trip): ?>
    <a
    href="index.php?trip=<?php echo $trip['trip_id']; ?>"
    class="post-link"
>

    <div class="post">

        <?php if (!empty($trip["image"])): ?>

            <img
                src="uploads/<?php echo htmlspecialchars($trip["image"]); ?>"
                alt="Trip image"
            >

        <?php endif; ?>

        <div class="post-overlay">

            <div class="post-title">
                <?php echo htmlspecialchars($trip["trip_name"]); ?>
            </div>

            <div class="post-location">
                📍 <?php echo htmlspecialchars($trip["destination"]); ?>
            </div>

            <div class="post-price">
                €<?php echo htmlspecialchars($trip["cost"]); ?>
            </div>

        </div>

    </div></a>

<?php endforeach; ?>

</div>

    </div>

</body>
</html>