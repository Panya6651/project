<?php
    session_start();
    include 'db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        $product_name = $_POST['product_name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $created_at = $_POST['created_at'];
        $profile_image = null;

        if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0){
            $target_dir = "../../assets/imgs/";
            $image_name = basename($_FILES["profile_image"]["name"]);
            $target_file = $target_dir . $image_name;

            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if(in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])){
                if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
                    $profile_image = $image_name;
                } else {
                    $_SESSION['error'] = "Sorry, there was an error uploading your file.";
                    header("Location: ../editfood.php?id=" . $id);
                    exit;
                }
            } else {
                $_SESSION['error'] = "Invalid file type. Only JPG, JPEG, PNG & GIF files are allowed.";
                header("Location: ../editfood.php?id=" . $id);
                exit;
            }
        }

        $stmt = $pdo->prepare("UPDATE products SET product_name = ?, description = ?, price = ?, created_at = ?".($profile_image ? ", profile_image = ?" : "")." WHERE id = ?");
        $params = [$product_name, $description, $price, $created_at];
        if ($profile_image) {
            $params[] = $profile_image;
        }
        $params[] = $id;
        $result = $stmt->execute($params);

        if ($result) {
            $_SESSION['success'] = "User updated successfully!";
            header("Location: ../food.php");
        } else {
            $_SESSION['error'] = "Failed to update user.";
            header("Location: ../editfood.php?id=" . $id);
        }

        exit;
    }
?>