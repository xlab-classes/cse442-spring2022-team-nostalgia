<?php include('includes/head_section.php') ?>
    <title>Nostalgia — keeping it simple.</title>
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
        <div class="content">
            <div class="row post page-posts">
                <div class="col left w-40">
                    <div class="info-box">
                        <div class="heading">
                            <h1>Create a post!</h1>
                        </div>
                        <div class="inner">
                            <div class="details">
                                <p>Rules: <i>programming</i></p>
                                <ul>
                                    <li>
                                        Keep it clean.
                                    </li>
                                    <li>
                                        Don't spam.
                                    </li>
                                    <li>
                                        TODO: Add more.
                                    </li>
                                </ul>
                            </div>
                            <div class="post-textarea">
                                <form method="post" enctype="multipart/form-data">
                                <textarea class="status" name="status" placeholder="Write your post here!" rows="4" cols="50"></textarea>
                            </div>
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