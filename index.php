<?php require('includes/public_functions.php') ?>
<?php include('includes/head_section.php') ?>
    <title>Nostalgia — Home</title>
</head>

<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header('Location: login.php'); exit;
    }
?>

<body>
    <!-- container = navbar + main + footer -->
    <div class="container">
        <!-- navbar -->
        <?php include('includes/navbar_section.php') ?>
        <!-- /navbar -->

        <!-- content -->
        <div class="content">
            <div class="row">
                <div class="col left w-40">
                    <div class="profile-box">
                        <div class="heading">
                            <h1>Hi Rob!</h1>
                        </div>
                        <div class="inner">
                            <div class="profile-pic">
                                <img src="static/images/profile.jpg" alt="profile picture">
                            </div>
                            <div class="details">
                                <p>🔴 Busy</p>
                                <p>Status: <i>programming</i></p>
                                <p>Mood: <i>stressed</i></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col right">
                </div>
            </div>
        </div>
        <!-- /content -->

        <!-- footer -->
        <?php include('includes/footer_section.php') ?>