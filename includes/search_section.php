<div class="login-box">
    <div class = heading>
        <h1>Search for users on Nostalgia!</h1>
    </div>

    <div class="inner">
        <form id="search" action="" method="POST">
            <p>You must enter the exact username!</p>
            <input type="text" name="search" id="search" autocomplete="off" placeholder="Enter a username...">
            <br>
            <input type="submit">
        </form>
        <br>

        <?php
            session_start();
            if(!isset($_SESSION["username"])){
                header('Location: login.php'); exit;
            }
            if (!empty($_POST)){
                $conn = new mysqli("oceanus.cse.buffalo.edu", "elijahhu", "50284336", "cse442_2022_spring_team_d_db");
                if ($conn->connect_error) {
                    die("Connect could not succeed due to: " . $conn->connect_error);
                }

                $search = $_POST["search"];
                if(isset($search) && !empty($search)){
                    $query = $conn->prepare("SELECT * FROM users where user=?");
                    $query->bind_param("s", $search);
                    if ($query->execute() === TRUE) {
                        $res = $query->get_result();
                        $data = $res->fetch_assoc();
                        $msg = "No registered user with this username.";
                        if($res->num_rows == 0){
                            echo '<div class="msg">'.$msg.'</div>';
                        } else {
                            $msg = "This user exists!";
                            if($_SESSION["username"] === $search){
                                $msg = "This is you!";
                            }
                            echo '<div class="msg">'.$msg.'</div>';
                        }
                    }
                }
            }
        ?>
    </div>
</div>