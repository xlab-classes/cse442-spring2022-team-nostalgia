<?php include('includes/head_section.php');
include('includes/navbar_section.php');
?>
    <title>Nostalgia — My Profile</title>
</head>
<html>
    <body>
        <h1>SpockW's Profile</h1>
        <img src="Profile.jpg" width=200>
        <br>
        <h2>Bio</h2>
        <p>Autobiographical silliness</p>
        <form action="" method="post">
            Edit bio:
            <input type=text name="t1">
            <br>
            <br>
            <input type=submit name="s">
            <?php if(isset($_POST['s'])){$a=$_POST['t1'];echo "Bio:-".$a;} ?>
        </form>
        <h2>Posts</h2>
    </body>
</html>