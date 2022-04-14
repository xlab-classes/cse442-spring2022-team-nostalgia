<div class="following-box">
    <div class = heading>
        <h1>You follow:</h1>
    </div>

    <div class="inner">
        <?php
            $conn = new mysqli("oceanus.cse.buffalo.edu", "elijahhu", "50284336", "cse442_2022_spring_team_d_db");
            if ($conn->connect_error) {
                die("Connect could not succeed due to: " . $conn->connect_error);
            }
            $currUser = $_SESSION["username"];
            $getFollowing = $conn->prepare("SELECT * FROM followers where username=?");
            $getFollowing->bind_param("s", $currUser);
            if($getFollowing->execute() === TRUE){
                $res = $getFollowing->get_result();
                $data = $res->fetch_assoc();
                $decodedFollowing = json_decode($data["followers"], true);
                $following = $decodedFollowing["following"];
                foreach($following as $follow){
                    echo '<div class="msg" font-size=500px>'.$follow.'</div>';
                }
            }
        ?>
    </div>
</div>