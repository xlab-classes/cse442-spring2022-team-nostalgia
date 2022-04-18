<?php require('includes/public_functions.php') ?>

<?php 
	if (isset($_GET['post-slug'])) {
		$post = getPost($_GET['post-slug']);
	}
?>

<?php include('includes/head_section.php'); ?>
    <title> Nostalgia | <?php echo $post['title'] ?></title>
</head>

<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header('Location: login.php'); exit;
    }
?>

<body>
<div class="container">
	<!-- Navbar -->
		<?php include('includes/navbar_section.php'); ?>
	<!-- // Navbar -->
	
	<div class="content">
        <div class="row single-post">
            <div class="col left w-70">
                <!-- post-div-box -->
                <div class="post-div-box">
                    <div class="post-heading">
                        <?php if ($post['published'] == false): ?>
                            <h1 class="post-title">Sorry... This post has not been published</h1>
                        <?php else: ?>
                            <h1 class="post-title"><?php echo $post['title']; ?></h1>
                        <?php endif ?>
                    </div>
                    <hr>
                    <div class="post-body">
                        <?php echo html_entity_decode($post['body']); ?>
                    </div>
                </div>
                <!-- /post-div-box -->
                
                <!-- TODO comments section -->

            </div> <!-- /col left w-70 -->
            <div class="col right">
                <!-- post sidebar -->
                <div class="post-sidebar">
                    <div class="card">
                        <div class="details">
                                <p>submitted by 
                                    <?php 
                                        $user = getUserById($post['user_id']);
                                        echo $user['username'];
                                    ?>
                                    on 
                                    <?php 
                                        echo date('l \t\h\e jS \o\f F, Y \a\t g\:ia', strtotime($post["created_at"]));
                                    ?>
                                </p>
                                <p>🡹🡻</p>
                                <p>XX comments  share  save  report</p>
                            </div>
                        </div>
                    <div class="card">
                        Card for tags/topics/etc if we do that later.
                    </div>
                </div>
                <!-- /post sidebar -->
            </div>
	    </div> <!-- /row single-post -->
    </div>
    <!-- /content -->

<?php include('includes/footer_section.php'); ?>