<?php require('includes/public_functions.php') ?>
<?php include('includes/head_section.php') ?>
    <title>Nostalgia — Posts</title>
</head>

<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header('Location: login.php'); exit;
    }
?>

<?php $posts = getPublishedPosts(); ?>

<body>
    <div class="container">
        <!-- navbar -->
        <?php include('includes/navbar_section.php') ?>
        <!-- /navbar -->

        <!-- content -->
        <div class="content">
            <div class="row page-posts">
                <div class="create-post-btn">
                    <h1><a href="create_post.php">Create your own post!</a></h1>
                </div>

                <br>
                <?php foreach ($posts as $post): ?>
                    <div class="post-box">
                        <div class="heading">
                            <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
                                <h1><?php echo $post['title']?></h1>
                            </a>
                        </div>
                        <div class="inner">
                            <div class="post-pic">
                                <img src="<?php echo 'static/images/' . $post['image']; ?>" class="post_image" alt="">
                            </div>
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
                                <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
                                    <p>Read more...</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <br>
                <?php endforeach ?>
            </div> <!-- row post page-posts -->
    </div>
    <!-- /content -->

    <!-- footer -->
    <?php include('includes/footer_section.php') ?>