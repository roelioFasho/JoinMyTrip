<?php
require __DIR__ . '/../Database/tripsDB.php';

$stmt = $conn->query("
    SELECT user_id, name, age, email
    FROM Users
    ORDER BY user_id DESC
");

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suggested Friends</title>

    <style>
        *{
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body{
            font-family: 'Segoe UI', sans-serif;
            background: #0a0a0f;
            color: #e0e0f0;
            min-height: 100vh;
            padding: 2rem 1rem;
        }

        .container{
            max-width: 700px;
            margin: 0 auto;
        }

        h1{
            font-size: 2rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: .4rem;
        }

        h1 span{
            color: #4a90ff;
        }

        .subtitle{
            color: #5a5a80;
            font-size: .9rem;
            margin-bottom: 2rem;
        }

        .card{
            background: #13131f;
            border: 1px solid #1e1e35;
            border-radius: 10px;
            padding: 1.2rem 1.5rem;
            margin-bottom: .75rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            transition: .2s;
        }

        .card:hover{
            border-color: #4a90ff;
            transform: translateY(-2px);
        }

        .avatar{
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: #1e1e45;
            border: 2px solid #4a90ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            font-weight: 700;
            color: #4a90ff;
            flex-shrink: 0;
        }

        .info{
            flex: 1;
        }

        .info h3{
            font-size: 1rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: .2rem;
        }

        .info p{
            font-size: .85rem;
            color: #7a7aa0;
        }

        .btn-add{
            background: #4a90ff;
            color: white;
            border: none;
            border-radius: 7px;
            padding: .55rem 1.1rem;
            font-size: .85rem;
            font-weight: 600;
            cursor: pointer;
            transition: .2s;
        }

        .btn-add:hover{
            background: #3b7be0;
        }

        .no-users{
            text-align: center;
            padding: 3rem;
            color: #666;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>Suggested <span>Friends</span></h1>
    <p class="subtitle">People you may know</p>

    <?php if($users): ?>

        <?php foreach($users as $user): ?>

            <div class="card">

                <div class="avatar">
                    <?= strtoupper(substr($user['name'], 0, 1)) ?>
                </div>

                <div class="info">
                    <h3><?= htmlspecialchars($user['name']) ?></h3>
                    <p>Age: <?= htmlspecialchars($user['age']) ?></p>
                    <p><?= htmlspecialchars($user['email']) ?></p>
                </div>

                <button class="btn-add">
                    + Add Friend
                </button>

            </div>

        <?php endforeach; ?>

    <?php else: ?>

        <div class="no-users">
            No users found in database.
        </div>

    <?php endif; ?>

</div>

</body>
</html>