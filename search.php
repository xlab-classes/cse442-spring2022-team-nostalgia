<?php include('includes/head_section.php') ?>
    <title>Nostalgia — Search</title>
</head>
<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header('Location: login.php'); exit;
    }
?>
<body>
    <div class="container">
        <!-- navbar -->
        <?php include('includes/navbar_section.php') ?>
        <!-- /navbar -->

        <!-- content -->
        <div class="content search">
            <div class="row page-search">
                <div class="col left w-40">
                    <?php include('includes/search_section.php') ?>
                </div>
                <div class="col right">
                </div>
            </div>
        </div>
        <!-- /content -->

        <!-- footer -->
        <?php include('includes/footer_section.php') ?>
