<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: /itweb/index.php");
    exit;
}
include "controls/idUser.php";  
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
            <form action="controls/editUser.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $user['id']; ?>">
                <div class="mb-3">
                    <label for="">Firstname</label>
                    <input type="text" name="first_name" class="form-control"
                        value="<?= htmlspecialchars($user['first_name']); ?>">
                </div>
                <div class="mb-3">
                    <label for="">Lastname</label>
                    <input type="text" name="last_name" class="form-control"
                        value="<?= htmlspecialchars($user['last_name']); ?>">
                </div>
                <div class="mb-3">
                    <label for="">Address</label>
                    <textarea name="address" id="" class="form-control"
                        value="<?= htmlspecialchars($user['last_name']); ?>">
                    </textarea>
                </div>
                <div class="mb-3">
                    <label for="">phone</label>
                    <input type="text" name="phone" class="form-control"
                        value="<?= htmlspecialchars($user['phone']); ?>">
                </div>
                <div class="mb-3">
                    <label for="">picture</label>
                    <input type="file" name="profile_image" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">email</label>
                    <input type="text" name="email" class="form-control"
                        value="<?= htmlspecialchars($user['email']); ?>">
                    
                    
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                    <button type="reset" class="btn btn-dark">รีเซ็ต</button>
                    <a href="uesr.php"></a>
                      

                </div>
            </form>
            </maim>
    </div>
</body>

</html>