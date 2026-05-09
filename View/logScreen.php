<?php
$message = "";

if (isset($_GET["error"])) {
    if ($_GET["error"] == "empty") {
        $message = "Please fill in all fields.";
    } elseif ($_GET["error"] == "invalid") {
        $message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #000000, #001f3f);
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: white;
        }

        .container {
            width: 20%;
            margin: 120px auto;
            padding: 30px;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 15px #001f3f;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #00aaff;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #111;
            color: white;
        }

        input:focus {
            outline: none;
            box-shadow: 0 0 5px #00aaff;
        }

        button {
            width: 100%;
            margin-top: 20px;
            padding: 10px;
            background-color: #003366;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0055aa;
        }

        .message {
            margin-top: 15px;
            text-align: center;
            color: #ff4d4d;
        }
        .register-text {
    margin-top: 20px;
    text-align: center;
    color: #cccccc;
    font-size: 14px;
}

.register-text a {
    color: #00aaff;
    text-decoration: none;
    font-weight: bold;
    margin-left: 5px;
}

.register-text a:hover {
    text-decoration: underline;
}
    </style>
</head>
<body>

<div class="container">
    <h1>User Login</h1>

    
    <form method="POST" action="../Controller/AuthController.php">
        <label>Email</label>
<input type="email" name="email">

        <label>Password</label>
        <input type="password" name="password">

        <button type="submit">Login</button>
    </form>

    <?php if ($message): ?>
        <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>
</div>
<div class="register-text">
    Don't have an account?
    <a href="Register.php">Register</a>
</div>

</body>
</html>
