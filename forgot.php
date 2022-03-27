<?php include('includes/head_section.php') ?>
    <title>Nostalgia — keeping it simple.</title>
</head>

<body>
    <div class="container">
        <!-- navbar -->
        <?php include('includes/navbar_section.php') ?>
        <!-- /navbar -->

        <!-- content -->
        <div class="content">
            <div class="row page-forgot">
                <div class="col left w-40">
                    <div class="info-box">
                        <div class="heading">
                            <h1>Reset/Change Password</h1>
                        </div>
                        <div class="inner">
                            <p>Please enter your email address below and you will be sent instructions to change your password.</p>
                            <form id="forgot" action="login.php">
                                <input type="text" id="user" autocomplete="off" placeholder="Enter your email..."><br>
                                <br>
                                <input type="submit">
                            </form>
                            <br>
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
