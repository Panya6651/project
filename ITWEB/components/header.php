<header> 
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">HewWeng</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">อาหาร</a>
                    </li>
                    <li class="nav-item">
                        <a href="user.php" class="nav-link">ผู้ใช้งาน</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            ยินดีต้อนรับคุณ 
                            <?php echo isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : 'ผู้ใช้งาน'; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php if(isset($_SESSION['role'])&& $_SESSION['role'] === 'admin') :?>
                            <li><a href="/ITWEB/backend/index.php" class="dropdown-item">ตั้งค่า</a></li>
                            <?php endif; ?>
                            <li><a href="#" class="dropdown-item">โปรไฟล์</a></li>
                            <li><a href="controls/signout.php" class="dropdown-item">ออกจากระบบ</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav> 
</header>
