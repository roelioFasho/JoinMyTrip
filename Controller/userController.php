<?php

require_once __DIR__ . "/../Model/userModel.php";
require_once __DIR__ . "/../Database/UserRepository.php";

class UserController {

    private $repo;

    public function __construct($conn)
    {
        $this->repo = new UserRepository($conn);
    }

    public function showProfile($userId)
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["change_name"])) {

            $newName = trim($_POST["name"]);

            if (!empty($newName)) {
                $this->repo->updateUserName($userId, $newName);
            }

            header("Location: index.php?profile=1");
            exit;
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["change_profile_picture"])) {

            if (isset($_FILES["profile_picture"]) && $_FILES["profile_picture"]["error"] === 0) {

                $uploadDir = __DIR__ . "/../uploads/";

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $fileName = time() . "_" . basename($_FILES["profile_picture"]["name"]);
                $targetPath = $uploadDir . $fileName;

                $tmp = $_FILES["profile_picture"]["tmp_name"];

                $image = imagecreatefromstring(file_get_contents($tmp));

                if ($image === false) {
                    move_uploaded_file($tmp, $targetPath);
                } else {
                    $w = imagesx($image);
                    $h = imagesy($image);

                    $size = min($w, $h);

                    $x = (int)(($w - $size) / 2);
                    $y = (int)(($h - $size) / 2);

                    $cropped = imagecrop($image, [
                        'x' => $x,
                        'y' => $y,
                        'width' => $size,
                        'height' => $size
                    ]);

                    if ($cropped === false) {
                        move_uploaded_file($tmp, $targetPath);
                    } else {
                        imagejpeg($cropped, $targetPath, 90);
                        imagedestroy($cropped);
                    }

                    imagedestroy($image);
                }

                $this->repo->updateProfilePicture($userId, $fileName);

                header("Location: index.php?profile=1");
                exit;
            }
        }

        $user = $this->repo->getUserById($userId);
        $userTrips = $this->repo->getTripsByUserId($userId);

        require_once __DIR__ . "/../View/userView.php";
    }
}

?>