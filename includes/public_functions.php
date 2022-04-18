<?php

/* gets all posts for posts.php page */
function getPublishedPosts() {
	$conn = new mysqli("oceanus.cse.buffalo.edu", "elijahhu", "50284336", "cse442_2022_spring_team_d_db");
    if ($conn->connect_error) die("Connect could not succeed due to: " . $conn->connect_error);
	$query = "SELECT * FROM posts WHERE published=true";
	$result = $conn->query($query);
	$posts = $result->fetch_all(MYSQLI_ASSOC);
	return $posts;
}

/* gets single post for single_post.php?post-slug=<?php echo $post['slug']; ?> */
function getPost($slug) {
	$conn = new mysqli("oceanus.cse.buffalo.edu", "elijahhu", "50284336", "cse442_2022_spring_team_d_db");
	$post_slug = $_GET['post-slug'];
	$query = "SELECT * FROM posts WHERE slug='$post_slug' AND published=true"; // published for later, if we do admin stuff
	$result = $conn->query($query);
	$post = $result->fetch_assoc();
	return $post;
}

/* get user array by the id we store in SESSION */
function getUserById($id) {
    $conn = new mysqli("oceanus.cse.buffalo.edu", "elijahhu", "50284336", "cse442_2022_spring_team_d_db");
    $query = "SELECT * FROM users WHERE id=$id LIMIT 1";
    $result = $conn->query($query);
    $user = $result->fetch_assoc();
    // returned as array: ['id'=>14 'username' => 'Robbygold9', 'password'=> '$2y$10$...']
    return $user; 
}

/* creates a slug for URL, e.g. How to cook chicken => how-to-cook-chicken */
function makeSlug(String $string) {
    $string = strtolower($string);
    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
    return $slug;
}

?>