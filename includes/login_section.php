					<div class="login-box">
                        <div class="heading">
                            <h1>Login to Nostalgia!</h1>
                        </div>
                        <div class="inner">
                            <form id="login" action="" method="POST">
                                <input type="text" name="username" id="username" autocomplete="off" placeholder="Enter your username..."><br>
                                <input type="password" name="pass" id="pass" autocomplete="off" placeholder="Enter your password..."><br>

                                <input type="submit">
                            </form>
                            <br>
                            <?php
                                session_start();
                                if(isset($_SESSION["username"])){
                                    header('Location: index.php'); exit;
                                }
                                if (!empty($_POST)){

                                    $conn = new mysqli("oceanus.cse.buffalo.edu", "elijahhu", "50284336", "cse442_2022_spring_team_d_db");
                                    if ($conn->connect_error) {
                                        die("Connect could not succeed due to: " . $conn->connect_error);
                                    }

                                    $username = $_POST["username"];
                                    $pass = $_POST["pass"];
                                    if(isset($username) && !empty($username)){
                                        if(isset($pass) && !empty($pass)){
                                            $query = $conn->prepare("SELECT * FROM users where username=?");
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
                                                    session_start();
                                                    $_SESSION["username"] = $username;
                                                    header("Location: index.php"); exit;
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
