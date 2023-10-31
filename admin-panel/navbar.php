<?php
include('config.php');
if (!isset($_SESSION['username'])) {
    header('location: signin.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
        <a href="dashborad.php" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
        </a>
        <a href="#" class="sidebar-toggler flex-shrink-0">
            <i class="fa fa-bars"></i>
        </a>
        
        <div class="navbar-nav align-items-center ms-auto">
                <a href="./exportDatabase.php">
                    <i class="fa fa-user me-lg-2"></i>
                    <span class="d-none d-lg-inline-flex">Export Database</span>
                </a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-envelope me-lg-2"></i>
                    <span class="d-none d-lg-inline-flex">Message</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    <?php
                    $select = mysqli_query($connection, 'select * from messages limit 3');
                    if (mysqli_num_rows($select) > 0) {
                        while ($msg = mysqli_fetch_assoc($select)) {
                    ?>
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0"><?php echo '<b>' . $msg['firstname'] . '</b>' ?> sent you a message</h6>
                                        <?php
                                        $timefromdb = strtotime($msg['messagetime']);
                                        // Calculate the time difference
                                        $currentTimestamp = time();
                                        $timeDifference = $currentTimestamp - $timefromdb;

                                        // Format and display the time difference
                                        $hours = floor($timeDifference / 3600);
                                        $minutes = floor(($timeDifference % 3600) / 60);
                                        $seconds = $timeDifference % 60;
                                        echo "<small> $hours hours ago </small>";
                                        ?>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">

                    <?php

                        }
                    }
                    ?>

                    <a href="./messages.php" class="dropdown-item text-center">See all message</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <span class="d-none d-lg-inline-flex"><?php echo $_SESSION['username'] ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    <a href="logout.php" class="dropdown-item" onclick="return confirm('are you sure you wanna logout?')"><i class="fa fa-user me-3"></i>Log Out</a>
                    <a href="../front-end/index.php" class="dropdown-item"><i class="fa fa-window-maximize me-3"></i>Eco Mart</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        // Sidebar Toggler
        $(".sidebar-toggler").click(function() {
            $(".sidebar, .content").toggleClass("open");
            return false;
        });
    </script>

</body>

</html>