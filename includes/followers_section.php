<div class="followers-box">
    <div class = heading>
        <h1>Your followers:</h1>
    </div>

    <div class="inner">
        <?php
            $conn = new mysqli("oceanus.cse.buffalo.edu", "elijahhu", "50284336", "cse442_2022_spring_team_d_db");
            if ($conn->connect_error) {
                die("Connect could not succeed due to: " . $conn->connect_error);
            }
            $currUser = $_SESSION["username"];
            $getFollowers = $conn->prepare("SELECT * FROM followers where username=?");
            $getFollowers->bind_param("s", $currUser);
            if($getFollowers->execute() === TRUE){
                $res = $getFollowers->get_result();
                $data = $res->fetch_assoc();
                $decodedFollowers = json_decode($data["followers"], true);
                $followers = $decodedFollowers["followers"];
                foreach($followers as $follower){
                    echo '<div class="msg" font-size=500px>'.$follower.'</div>';
                }
            }
        ?>
    </div>
</div>