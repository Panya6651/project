<?php
    include '../backend/controls/db.php';
    

    // ดึงข้อมูลผู้ใช้งานจาก databse
    $sql = "SELECT `id`, `first_name`, `last_name`, `address`, `phone`, `email`, `password`, `created_at`, `role`, `profile_image` FROM `users`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
?>