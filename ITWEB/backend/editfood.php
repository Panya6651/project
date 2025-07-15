<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: /itweb/index.php");
    exit;
}
include "controls/idfood.php";  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="d-flex">
        <?php include '../backend/components/header.php'; ?>

        <main class="p-4 flex-grow-1">
            <h2>เเก้ไขผู้ใช้งาน</h2>
            <form action="controls/editUser.php" method="POST">
                <input type="hidden" name="id" value="<?= $user['id']; ?>">

                <div class="mb-3">
                    <label for="">productname</label>
                    <input type="text" name="product_name" class="form-control"
                        value="<?= htmlspecialchars($user['product_name']); ?>">
                </div>
                <div class="mb-3">
                    <label for="">description</label>
                    <input type="text" name="description" class="form-control"
                        value="<?= htmlspecialchars($user['description']); ?>">
                </div>
                <div class="mb-3">
                    <label for="">price</label>
                    <input type="text" name="price" class="form-control"
                        value="<?= htmlspecialchars($user['price']); ?>">
                </div>
                <div class="mb-3">
                    <label for="">createdat</label>
                    <input type="text" name="created_at" class="form-control"
                        value="<?= htmlspecialchars($user['created_at']); ?>">
                </div>
            </form>
        </maim>
    </div>
</body>

</html>