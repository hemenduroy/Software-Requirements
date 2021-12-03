<?php
include './config.php';
session_start();

function get_user($username, $password) {
    global $db;
    $hashed_password = hash('md5', $password . SALT);
    $users = $db->query("SELECT * FROM USERS WHERE username='$username' and password='$hashed_password'");
    while ($row = $users->fetchArray()) {
        return $row;
    }
    return null;
}

function get_posts() {
    global $db;
	$posts = array();
	$perm = $_SESSION['perm'];

    $query = $db->query("SELECT * FROM posts");

	while ($post = $query->fetchArray()) {
		$_perm = (string)$post['perm'];

		$_post = [
			'author' => (string)$post['author'],
            'title' => (string)$post['title'],
            'password' => (string)$post['password'],
			'desc' => (string)$post['desc']
		];

		if ($perm === 'admin') {
			if ($_perm === 'admin') {
				array_push($posts, $_post);
			}
			else {
				array_push($posts, $_post);
			}
		}
		else if ($perm === $_perm) array_push($posts, $_post);
	}

	return array_reverse($posts);
}

function logged_in() {
	return !empty($_SESSION['username']);
}

function post($title, $password, $desc) {
    global $db;
    $username = $_SESSION['username'];
    $perm = $_SESSION['perm'];
    $db->exec("INSERT INTO posts(author, desc, title, password, perm) VALUES ('$username', '$desc', '$title', '$password', '$perm')");
}

function stupid_hash($content) {
    $h = "";
    $array = str_split($content);
    $char = $content[0];
    $h_byt = chr(((ord($char) >> 3) | (ord($char) << 5)) & 0xff);
    $h = $h . $h_byt;
    foreach ($array as $char) {
        $h_byt_ = chr(((ord($char) >> 3) | (ord($char) << 5)) & 0xff);
        $h = $h . $h_byt;
    }
    return $h;
}

