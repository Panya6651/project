<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: /itweb/index.php");
    exit;
}

include 'controls/fetchUser.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Console</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="/itweb/assets/css/style.css">
</head>

<body>
    <div class="d-flex">
        <?php include '../backend/components/header.php'; ?>

        <main class="p-4 flex-grow-1">
            <h2>จัดการผู้ใช้งาน</h2>
            <table class="table table-bordered">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>imges</th>
                        <th>Name</th>
                        <th>E-Mail</th>
                        <th>Tel Number</th>
                        <th>Created Date</th>
                        <th>Role</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td class="text-center"><?= htmlspecialchars($row['id']); ?></td>
                        <td><img src="../assets/imgs/<?=htmlspecialchars($row['profile_image']); ?>" alt=""
                                style="width: 100px;"></td>
                        <td><?= htmlspecialchars($row['first_name']) . " " . htmlspecialchars($row['last_name']); ?>
                        </td>
                        <td><?= htmlspecialchars($row['email']); ?></td>
                        <td class="text-center"><?= htmlspecialchars($row['phone']); ?></td>
                        <td class="text-center"><?= htmlspecialchars($row['created_at']); ?></td>
                        <td class="text-center"><?= htmlspecialchars($row['role']); ?></td>
                        <td class="text-center">
                            <a href="edituser.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <button class="btn btn-sm btn-danger" onclick="confirmDelete(<?= $row['id'] ?>)">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                            <script>
                            function confirmDelete(id) {
                                Swal.fire({
                                    title: 'คุณแน่ใจหรือไม่?',
                                    text: "คุณต้องการลบผู้ใช้งานนี้หรือไม่?",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: 'ใช่, ลบเลย!',
                                    cancelButtonText: 'ยกเลิก'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = `controls/deleteUser.php?id=${id}`;
                                    }
                                });
                            }
                            </script>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
    </div>
    <?php if (isset($_SESSION['success'])) : ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'สำเร็จ',
        text: '<?= $_SESSION['success']; ?>',
        confirmButtonText: 'ตกลง'
    });
    </script>
    <?php unset($_SESSION['success']);
endif; ?>
    <?php if (isset($_SESSION['error'])) : ?>
    <script>
    Swal.fire({
        icon: 'error',
        title: 'ผิดพลาด',
        text: '<?= $_SESSION['error']; ?>',
        confirmButtonText: 'ตกลง'
    });
    </script>
    <?php unset($_SESSION['error']);
endif; ?>
</body>

</html>