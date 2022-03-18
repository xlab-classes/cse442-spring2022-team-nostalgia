<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nostalgia — keeping it simple.</title>
    <meta name="title" content="Nostalgia — keeping it simple.">
    <meta name="description" content="Nostalgia is an ethical social network taking key design elements from early 2000s online culture.">

    <meta property="og:title" content="Nostalgia — keeping it simple.">
    <meta property="og:type" content="website">
    <meta property="og:description" content="Nostalgia is an ethical social network taking key design elements from early 2000s online culture.">

    <script src="scripts.js" defer></script>
</head>

<body>
    <div class="container">
        <nav>
            <div class="top">
                <div class="left">
                    <a href="index.php">
                        <img class="logo" src="logo.png" alt="Nostalgia">    
                    </a>
                </div>
                <div class="center">
                    <h1>Nostalgia</h1>
                </div>
                <div class="right">
                    <a href="index.php">Help</a>
                    <button class="darkmode-toggle">🌑</button>
                </div>
            </div>
            <ul class="links">
                <!-- ADD: current page's navbar link is bolded, or color changed -->
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a class="broken-link" href="index.php">Profile</a>
                </li>
                <li>
                    <a class="broken-link" href="index.php">Search</a>
                </li>
                <li>
                    <a class="broken-link" href="index.php">Friends</a>
                </li>
                <li>
                    <a class="broken-link" href="index.php">Blog</a>
                </li>
                <li>
                    <a class="broken-link" href="index.php">Saved</a>
                </li>
                <li>
                    <a class="broken-link" href="index.php">About</a>
                </li>
                <li>
                    <a class="broken-link" href="index.php">News</a>
                </li>
                <li>
                    <a href="login.php">Login</a>
                </li>
            </ul>
        </nav>
        <main>
            <div class="row login">
                <div class="col left w-40">
                    <div class="info-box">
                        <div class="heading">
                            <h1>Login to Nostalgia!</h1>
                        </div>
                        <div class="inner">
                            <form id="login" action="" method="POST">
                                <input type="text" name="username" id="username" autocomplete="off" placeholder="Enter your username..."><br>
                                <input type="password" name="pass" id="pass" autocomplete="off" placeholder="Enter your password..."><br>
                                <br>
                                <input type="submit">
                            </form>
                            <br>
                            <?php
                                if (!empty($_POST)){

                                    $conn = new mysqli("oceanus.cse.buffalo.edu", "elijahhu", "50284336", "cse442_2022_spring_team_d_db");
                                    if ($conn->connect_error) {
                                        die("Connect could not succeed due to: " . $conn->connect_error);
                                    }

                                    $username = $_POST["username"];
                                    $pass = $_POST["pass"];

                                    if(isset($username) && !empty($username)){
                                        if(isset($pass) && !empty($pass)){
                                            $query = $conn->prepare("SELECT * FROM users where user=?");
                                            $query->bind_param("s", $username);
                                            if ($query->execute() === TRUE) {
                                                $res = $query->get_result();
                                                $data = $res->fetch_assoc();
                                                $msg = "Incorrect username or password.";
                                                if($res->num_rows == 0){
                                                    echo '<div class="msg">'.$msg.'</div>';
                                                } else if (!password_verify($pass, $data['password'])){
                                                    echo '<div class="msg">'.$msg.'</div>';
                                                } else {
                                                    //session_start();
                                                    //$_SESSION["username"] = $username;
                                                    header("Location: homepage.php"); exit;
                                                }
                                            } else {
                                                echo "Query failed due to " . $conn->error;
                                            }
                                        } else {
                                            $msg = "Please enter your password.";
                                            echo '<div class="msg">'.$msg.'</div>';
                                        }
                                    } else {
                                        $msg = "Please enter your username.";
                                        echo '<div class="msg">'.$msg.'</div>';
                                    }

                                }
                            ?>
                            <br>
                            <p>Forgot your password? <a class="in-text" href="forgot.php">Recover it here!</a></p>
                            <p>Don't have an account? <a class="in-text" href="registration.php">Sign up here!</a></p>
                        </div>
                    </div>
                </div>
                <div class="col right">
                </div>
            </div>    
            
        </main>
        <footer>
            <p>
                created by Joseph, Rob, and Elijah
            </p>
        </footer>
    </div>
</body>


<link rel="stylesheet" href="style.php" media="screen">

