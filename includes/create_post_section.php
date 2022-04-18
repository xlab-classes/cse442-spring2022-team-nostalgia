                    <div class="info-box">
                        <div class="heading">
                            <h1>Create a post!</h1>
                        </div>
                        <div class="inner">
                            <div class="details">
                                <p>Rules:</p>
                                <ul>
                                    <li>
                                        Keep it clean.
                                    </li>
                                    <li>
                                        Don't spam.
                                    </li>
                                    <li>
                                        TODO: Add more.
                                    </li>
                                </ul>
                            </div>
                            <div class="post-textarea">
                                <form method="post" enctype="multipart/form-data">
                                    Post Title:
                                    <br>
                                    <textarea class="post-title" name="post-title" placeholder="Title" maxlength="255"></textarea>
                                    <br>   
                                    Post Body:
                                    <br>
                                    <textarea class="post-body" name="post-body" placeholder="Write your post here!" maxlength="40000"></textarea>
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
                                        
                                        $userid = $_SESSION["userid"];
                                        $title = $_POST["post-title"];
                                        $slug = makeSlug($title);

                                        // test if slug is used, if so add number
                                        $count = 0;
                                        $slug_query = "SELECT * FROM posts where title='$title'";
                                        $result = $conn->query($slug_query);
                                        $count = $result->num_rows;
                                        if ($count) {
                                            $slug = $slug . '-' . $count;
                                        }

                                        $image = 'logo.png'; //TODO
                                        $body = $_POST["post-body"];

                                        $query = "INSERT INTO posts (user_id, title, slug, views, image, body, published, created_at, updated_at) 
                                                VALUES('$userid', '$title', '$slug', 0, '$image', '$body', 1, now(), now())";
                                        $conn->query($query);
                                        echo '<div class="msg">Post created. Check it out <a href="single_post.php?post-slug='.$slug.'">here.</a></div>';
                                    }
                                ?>
                            </div> <!-- /post-textarea -->
                        </div> <!-- /inner -->
                    </div> <!-- /info-box -->