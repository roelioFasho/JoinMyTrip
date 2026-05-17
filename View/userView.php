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
            min-height: 210px;
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

.name-form {
    margin: 0;
}

.username {
    width: fit-content;

    font-size: 30px;
    font-weight: bold;
    margin-bottom: 15px;

    cursor: pointer;

    transition:
        text-shadow 0.25s ease,
        transform 0.25s ease;
}

.username:hover {
    text-shadow:
        0 0 6px rgba(255,255,255,0.45);

    transform: translateY(-1px);
}

.name-input {
    display: none;

    width: 230px;

    padding: 8px 11px;

    border-radius: 12px;

    border: 1px solid #2da8ff;

    background: rgba(5,10,18,0.75);

    color: white;

    font-family: Arial, sans-serif;
    font-size: 22px;
    font-weight: bold;

    outline: none;

    box-shadow:
        0 0 12px rgba(45,168,255,0.12);
}

.profile-picture {
    width: 140px;
    height: 140px;

    border-radius: 50%;

    background-color: #001f3f;

    border: 3px solid #2da8ff;

    object-fit: cover;
}




.profile-picture-wrapper {
    position: relative;
    width: 140px;
    height: 140px;
    flex-shrink: 0;
}

.profile-picture-form {
    position: absolute;
    top: 4px;
    right: 4px;
    margin: 0;
}

.profile-picture-edit {
    width: 38px;
    height: 38px;

    border-radius: 100%;

    background:
        linear-gradient(
            145deg,
            rgba(20,20,25,0.95),
            rgba(10,10,15,0.95)
        );

    border: 1px solid rgba(45,168,255,0.15);

    color: white;

    display: flex;
    justify-content: center;
    align-items: center;

    font-size: 18px;

    cursor: pointer;

    transition:
        transform 0.25s ease,
        background 0.25s ease,
        border-color 0.25s ease,
        box-shadow 0.25s ease;

    box-shadow:
        0 4px 12px rgba(0,0,0,0.3);
}

.profile-picture-edit:hover {
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

.profile-picture-edit input {
    display: none;
}




        .profile-info {
            flex: 1;
            padding-top: 5px;
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

    top: 22px;
    right: 25px;

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

.description-area {
    margin-top: 22px;
    width: fit-content;

    color: rgba(255,255,255,0.45) !important;

    font-size: 15px;
    cursor: pointer;

    transition:
        transform 0.25s ease,
        color 0.25s ease;
}

.description-area:hover {
    color: rgba(255,255,255,0.85) !important;

    transform:
        translateY(-2px)
        scale(1.02);
}

.description-input {
    margin-top: 22px;

    width: 420px;
    min-height: 40px;

    padding: 12px 14px;

    border-radius: 14px;

    border: 1px solid #2da8ff;

    background: rgba(5,10,18,0.75);

    color: white;

    font-family: Arial, sans-serif;
    font-size: 15px;

    outline: none;

    resize: vertical;

    box-shadow:
        0 0 15px rgba(45,168,255,0.12);
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

    top: 22px;

    right: 90px;

    display: flex;

    gap: 12px;
}

.top-btn {

    width: 50px;
    height: 50px;
    cursor: pointer;

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

    justify-content: center;

    gap: 110px;

    margin-top: 35px;
    margin-bottom: 35px;

    border-top: 1px solid rgba(255,255,255,0.08);

    padding-top: 18px;
}

.tab {

    position: relative;

    padding: 10px 0;

    background: transparent;

    border: none;

    border-radius: 0;

    cursor: pointer;

    font-size: 17px;

    font-weight: 600;

    color: rgba(255,255,255,0.7);

    transition:
        color 0.25s ease,
        transform 0.25s ease;
}

.tab:hover {

    color: #2da8ff;

    transform:
        translateY(-2px)
        scale(1.03);

    text-shadow:
        0 0 5px rgba(45,168,255,0.22);

    transition:
        transform 0.25s ease,
        text-shadow 0.25s ease,
        color 0.25s ease;
}

.tab.active {

    color: #2da8ff;

    background: transparent;

    box-shadow: none;

}



.tab.active::after {

    content: "";

    position: absolute;

    left: 0;
    bottom: -8px;

    width: 100%;
    height: 3px;

    border-radius: 20px;

    background: #2da8ff;
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

            <div class="profile-picture-wrapper">

    <img 
    class="profile-picture"

    src="<?php

    $pfp = $user->getProfilePicture();

    if (
        empty($pfp)
        || $pfp === "user.png"
    ) {

        echo "View/user.png";

    } else {

        echo "uploads/" .
        htmlspecialchars($pfp);

    }

    ?>"

    alt=""
>

    <form method="POST" enctype="multipart/form-data" class="profile-picture-form">

        <label class="profile-picture-edit" title="Change profile picture">
            ✎

            
                <input
                    type="file"
                    name="profile_picture"
                    accept="image/*"
                    onchange="this.form.submit()"
                    hidden
                >               
            
        </label>

        <input type="hidden" name="change_profile_picture" value="1">

    </form>

</div>

            <div class="profile-info">

    <form method="POST" class="name-form" id="nameForm">

    <div
        class="username"
        id="usernameText"
        title="Change name"
    >
        <?php echo htmlspecialchars($user->getName()); ?>
    </div>

    <input
        type="text"
        name="name"
        class="name-input"
        id="nameInput"
        value="<?php echo htmlspecialchars($user->getName()); ?>"
    >

    <input type="hidden" name="change_name" value="1">

</form>

    <div class="stats">

        <div class="stat-box">
            <div class="stat-number">
                <?php echo count($userTrips); ?>
            </div>
            <div class="stat-label">Posts</div>
        </div>

        <div class="stat-box">
            <div class="stat-number">0</div>
            <div class="stat-label">Friends</div>
        </div>

        <div class="stat-box">
            <div class="stat-number">
                <?php echo count($userTrips); ?>
            </div>
            <div class="stat-label">Trips</div>
        </div>

    </div>

    <div class="description-area" id="descriptionArea">
        + Create description
    </div>

</div>

            <div class="top-buttons">

<a href="../index.php" class="top-btn">⌂</a>
<a href="../index.php?chats=1" class="top-btn">✉</a>
<a href="#" class="top-btn">🔔</a>
<a href="../index.php?friends=1" class="top-btn">👥</a>
<a href="../index.php?uploadTrip=1" class="top-btn">+</a>
<a href="../Controller/LogoutController.php" class="top-btn">⎋</a>
</div>




        </div>

        <div class="profile-tabs">

    <div class="tab active">Posts</div>

    <div class="tab">Friends</div>

    <div class="tab">Joined Trips</div>

</div>

<script>

    const tabs = document.querySelectorAll(".tab");

    tabs.forEach(tab => {

        tab.addEventListener("click", () => {

            tabs.forEach(t => t.classList.remove("active"));

            tab.classList.add("active");

        });

    });

</script>

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
<script>

function createDescriptionPlaceholder() {

    return `
        <div
            class="description-area"
            id="descriptionArea"
        >
            + Create description
        </div>
    `;
}

document.addEventListener(
"click",
function(e){

const descriptionArea =
document.getElementById(
"descriptionArea"
);

if(
descriptionArea &&
e.target === descriptionArea
){

descriptionArea.outerHTML =
`
<textarea
class="description-input"
placeholder="Write your description..."
></textarea>
`;

const input =
document.querySelector(
".description-input"
);

input.focus();

input.addEventListener(
"blur",
function(){

if(
input.value.trim()
=== ""
){

input.outerHTML =
createDescriptionPlaceholder();

}

}
);

}

}
);

</script>

<script>

const usernameText = document.getElementById("usernameText");
const nameInput = document.getElementById("nameInput");
const nameForm = document.getElementById("nameForm");

usernameText.addEventListener("click", function () {
    usernameText.style.display = "none";
    nameInput.style.display = "block";
    nameInput.focus();
    nameInput.select();
});

nameInput.addEventListener("blur", function () {
    if (nameInput.value.trim() === "") {
        nameInput.value = usernameText.textContent.trim();
        nameInput.style.display = "none";
        usernameText.style.display = "block";
    } else {
        nameForm.submit();
    }
});

nameInput.addEventListener("keydown", function (e) {
    if (e.key === "Enter") {
        e.preventDefault();

        if (nameInput.value.trim() !== "") {
            nameForm.submit();
        }
    }

    if (e.key === "Escape") {
        nameInput.value = usernameText.textContent.trim();
        nameInput.style.display = "none";
        usernameText.style.display = "block";
    }
});

</script>
</html>