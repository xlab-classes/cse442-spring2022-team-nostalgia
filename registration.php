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
                            <h1>Create an account for Nostalgia!!</h1>
                        </div>
                        <div class="inner">
                            <form id="register" action="" method="POST">
                                <input type="text" name="reguser" id="reguser" autocomplete="off" placeholder="Enter desired username..."><br>
                                <p>Your password must contain:</p>
                                <ul>
                                    <li class="password-conditions">at least 8 characters
                                    <li class="password-conditions">at least 1 lower case letter
                                    <li class="password-conditions">at least 1 upper case letter
                                    <li class="password-conditions">at least 1 number
                                </ul>
                                <input type="password" name="regpass" id="regpass" autocomplete="off" placeholder="Enter desired password..."><br>
                                <input type="password" name="passcheck" id="passcheck" autocomplete="off" placeholder="Re-enter password..."><br>
                                <br>
                                <input type="submit">
                            </form>

                            <?php
                                if (!empty($_POST)){
                                    $conn = new mysqli("oceanus.cse.buffalo.edu", "elijahhu", "50284336", "cse442_2022_spring_team_d_db");
                                    if ($conn->connect_error) {
                                        die("Connect could not be made due to: " . $conn->connect_error);
                                    }

                                    $username = $_POST["reguser"];
                                    $pass = $_POST["regpass"];
                                    $check = $_POST["passcheck"];

                                    if(isset($username) && !empty($username)){
                                        if(isset($pass) && !empty($pass)){
                                            if(isset($check) && !empty($check)){

                                                $query = $conn->prepare("SELECT * FROM users where user=?");
                                                $query->bind_param("s", $username);
                                                if ($query->execute() === TRUE) {
                                                    $count = $query->get_result();

                                                    if($count->num_rows > 0){
                                                        $msg = "This username has already been taken. Please choose another one.";
                                                        echo '<div class="msg">'.$msg.'</div>';
                                                    } else if (strlen($pass) < 8){
                                                        $msg = "Your password is too short. It must be at least 8 characters.";
                                                        echo '<div class="msg">'.$msg.'</div>';
                                                    } else if (!preg_match("#[a-z]+#", $pass)){
                                                        $msg = "Your password must contain at least 1 lowercase letter.";
                                                        echo '<div class="msg">'.$msg.'</div>';
                                                    } else if (!preg_match("#[A-Z]+#", $pass)){
                                                        $msg = "Your password must contain at least 1 uppercase letter.";
                                                        echo '<div class="msg">'.$msg.'</div>';
                                                    } else if (!preg_match("#[0-9]+#", $pass)){
                                                        $msg = "Your password must contain at least 1 number.";
                                                        echo '<div class="msg">'.$msg.'</div>';
                                                    } else if ($pass != $check){
                                                        $msg = "Your passwords do not match!";
                                                        echo '<div class="msg">'.$msg.'</div>';
                                                    } else {
                                                        $hashed = password_hash($pass, PASSWORD_DEFAULT);
                                                        $insquery = $conn->prepare("INSERT INTO users (user, password) VALUES (?, ?)");
                                                        $insquery->bind_param("ss", $username, $hashed);
                                                        if($insquery->execute() === TRUE){
                                                            $msg = "You've successfully created an account!";
                                                            echo '<div class="msg">'.$msg.'</div>';
                                                        } else {
                                                            echo "Query failed due to: " . $conn->error;
                                                        }
                                                    }
                                                } else {
                                                    echo "Query failed due to " . $conn->error;
                                                }
                                            } else {
                                                $msg = "Please re-enter your password.";
                                                echo '<div class="msg">'.$msg.'</div>';
                                            }
                                        } else {
                                            $msg = "Please fill in the password field.";
                                            echo '<div class="msg">'.$msg.'</div>';
                                        }
                                    } else {
                                        $msg = "Please fill in the username field.";
                                        echo '<div class="msg">'.$msg.'</div>';
                                    }
                                }
                            ?>
                            <br>
                            <p>Already have an account? <a class="in-text" href="login.php">Login!</a></p>
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