<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>

    <style>

        body {
            margin: 0;
            background-color: black;
            font-family: Arial, sans-serif;
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
            gap: 30px;
            padding-bottom: 30px;
            border-bottom: 1px solid #1d1d1d;
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

            width: 42px;
            height: 42px;

            border-radius: 10px;

            background-color: #111111;

            border: 1px solid #1d1d1d;

            display: flex;
            justify-content: center;
            align-items: center;

            cursor: pointer;

            transition: 0.2s;
        }

        .edit-btn:hover {
            background-color: #001f3f;
            border-color: #2da8ff;
        }

        .edit-btn img {
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
            padding: 12px 22px;

            background-color: #101010;

            border: 1px solid #1d1d1d;

            border-radius: 10px;

            cursor: pointer;

            transition: 0.2s;
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

            background-color: #0d0d0d;

            border: 1px solid #1d1d1d;

            border-radius: 15px;

            overflow: hidden;

            transition: 0.2s;
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

            <div class="edit-btn">
                <img src="/Views/edit.png">
            </div>

        </div>

        <div class="profile-tabs">

            <div class="tab">Posts</div>

            <div class="tab">Friends</div>

            <div class="tab">Joined Trips</div>

        </div>

        <div class="posts-grid">



        </div>

    </div>

</body>
</html>