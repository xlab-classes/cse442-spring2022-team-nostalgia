<div class="search-box">
    <div class = heading>
        <h1>Search for users on Nostalgia!</h1>
    </div>

    <div class="inner">
        <form id="search" action="" method="POST">
            <p>You must enter the exact username!</p>
            <input type="text" name="search" id="search" autocomplete="off" placeholder="Enter a username...">
            <br>
            <input type="submit" value="Follow!">
        </form>
        <br>

        <?php
            if (!empty($_POST)){
                $conn = new mysqli("oceanus.cse.buffalo.edu", "elijahhu", "50284336", "cse442_2022_spring_team_d_db");
                if ($conn->connect_error) {
                    die("Connect could not succeed due to: " . $conn->connect_error);
                }

                $search = $_POST["search"];
                if(isset($search) && !empty($search)){
                    $query = $conn->prepare("SELECT * FROM users where username=?");
                    $query->bind_param("s", $search);
                    if ($query->execute() === TRUE) {
                        $res = $query->get_result();
                        $data = $res->fetch_assoc();
                        $msg = "No registered user with this username.";
                        if($res->num_rows == 0){
                            echo '<div class="msg">'.$msg.'</div>';
                        } else {
                            if($_SESSION["username"] === $search){
                                $msg = "You can't follow yourself!";
                                echo '<div class="msg">'.$msg.'</div>';
                            } else {
                                // Grab current user's followers/following
                                $currUser = $_SESSION["username"];
                                $getFollowers = $conn->prepare("SELECT * FROM followers where username=?");
                                $getFollowers->bind_param("s", $currUser);
                                if ($getFollowers->execute() === TRUE) {
                                    // Update following of current user and update SQL table
                                    $followRes = $getFollowers->get_result();
                                    $followData = $followRes->fetch_assoc();
                                    $decodedJSON = json_decode($followData["followers"], true);
                                    if(!in_array($search, $decodedJSON["following"])){
                                        $decodedJSON["following"][] = $search;
                                        $jsonFollowers = json_encode($decodedJSON);
                                        $updatequery = $conn->prepare("UPDATE followers SET followers=? where username=?");
                                        $updatequery->bind_param("ss", $jsonFollowers, $currUser);
                                        if($updatequery->execute() === TRUE){
                                             // Grab followed user's followers/following
                                             $followedUser = $conn->prepare("SELECT * FROM followers where username=?");
                                             $followedUser->bind_param("s", $search);
                                             if($followedUser->execute() === TRUE){
                                                // Update followers of followed user's followers/following
                                                $followedRes = $followedUser->get_result();
                                                $followedData = $followedRes->fetch_assoc();
                                                $decodedFollow = json_decode($followedData["followers"], true);
                                                $decodedFollow["followers"][] = $currUser;
                                                $jsonQuery = json_encode($decodedFollow);
                                                $followedUpdate = $conn->prepare("UPDATE followers SET followers=? where username=?");
                                                $followedUpdate->bind_param("ss", $jsonQuery, $search);
                                                if($followedUpdate->execute() === TRUE){
                                                    $msg = "You've followed this user!";
                                                    echo '<div class="msg">'.$msg.'</div>';
                                                }
                                             }
                                        }
                                    } else {
                                        $msg = "You already follow this user!";
                                        echo '<div class="msg">'.$msg.'</div>';
                                    }
                                }
                            }
                        }
                    }
                }
            }
        ?>
    </div>
</div>