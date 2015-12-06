<?php
include_once('connection.php');

// Database
function getUser($username) {
    global $db;

    $a = $db->prepare('SELECT * FROM users WHERE username = ?');
    $a->execute(array($username));

    return $a->fetch();
}

function getUserEmail($username) {
    global $db;
    $a = $db->prepare('SELECT email FROM users WHERE username = ?');
    $a->execute(array($username));
    return $a->fetch();
}

function changeUserPass($username, $password) {
    global $db;
    $a = $db->prepare('UPDATE users SET password = ? WHERE users.username = ?');
    $a->execute(array(sha1($password), $username));
    return true;
}

function changeUserEmail($username, $email) {
    global $db;
    $a = $db->prepare('UPDATE users SET email = ? WHERE users.username = ?');
    $a->execute(array($email, $username));
    return true;
}

function getUsers() {
    global $db;

    $a = $db->prepare('SELECT username FROM users');
    $a->execute();

    return $a->fetchAll();
}

function isRegistered($username) {
    return getUser($username) !== false;
}

function checkCredentials($username, $password) {
    global $db;

    $a = $db->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
    $a->execute(array($username, sha1($password)));

    return $a->fetch() !== false;
}

// User actions
function registerUser($username, $email, $password) {
    global $db;

    if (isRegistered($username)) return false;

    $a = $db->prepare('INSERT INTO users VALUES (?, ?, ?)');
    $a->execute(array($username, $email, sha1($password)));

    return true;
}

function deleteUser($username) {
    global $db;

    if (!isRegistered($username)) return false;

    $a = $db->prepare('DELETE FROM users WHERE username = ?');
    $a->execute(array($username));

    return true;
}
