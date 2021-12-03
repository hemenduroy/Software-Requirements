<?php
define('DB_PATH', '/home/chall/service/rw/database.sqlite3');
define('SALT', 'thisvaluecouldnotbeguessed');

function init_db() {
    if (!file_exists(DB_PATH)) {
        $db = new SQLite3(DB_PATH);
        $db->exec("CREATE TABLE users (id INTEGER PRIMARY KEY, username VARCHAR(255), name VARCHAR(255), lastname VARCHAR(255), email VARCHAR(255), password VARCHAR(255), perm VARCHAR(255))");
        $db->exec("CREATE TABLE posts (id INTEGER PRIMARY KEY, author VARCHAR(255), title VARCHAR(255), password VARCHAR(255), desc VARCHAR(255), perm VARCHAR(255))");

        $db->exec("INSERT INTO users(username, name, lastname, email, password, perm) VALUES ('test', 'test', 'user', 'user@example.com', '0b97022e9ddf9206699bf8a23ff5b5b4', 'user')");
        $db->exec("INSERT INTO users(username, name, lastname, email, password, perm) VALUES ('admin', 'super', 'admin', 'admin@example.com', 'a0acd004528bd852a64109208df6da53', 'admin')");
        $db->exec("INSERT INTO users(username, name, lastname, email, password, perm) VALUES ('FlagPusher', 'Flag', 'Pusher', 'flagpusher@example.com', '02762f72bf967a051b225853bb0a9fc3', 'flagpusher')");

        $db->exec("INSERT INTO posts(author, title, password, desc, perm) VALUES ('test', 'Today', '', 'What a great day today!', 'user')");
        $db->exec("INSERT INTO posts(author, title, password, desc, perm) VALUES ('test', 'Yesterday', '', 'I slept too much yesterday...', 'user')");
        $db->exec("INSERT INTO posts(author, title, password, desc, perm) VALUES ('FlagPusher', 'Flag', '', 'This is where flags will be stored.', 'flagpusher')");
    }
}

init_db();
$db = new SQLite3(DB_PATH);

