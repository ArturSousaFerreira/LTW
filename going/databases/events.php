<?php
include_once('connection.php');

function getEvent($id) {
    global $db;

    $a = $db->prepare('SELECT * FROM events WHERE id = ?');
    $a->execute(array($id));

    return $a->fetch();
}

function getEvents() {
    global $db;

    $a = $db->prepare('SELECT * FROM events ORDER BY date ASC');
    $a->execute();

    return $a->fetchAll();
}

function printEvent($event) {
    return $event['date'] . ' | ' . $event['type'] . ' | ' . $event['description'];
}

function getUserEvents($username) {
    global $db;
    $a = $db->prepare('SELECT * FROM events WHERE creator = ? ORDER BY date ASC');
    $a->execute(array($username));

    return $a->fetchAll();
}

function getUserRegisteredEvents($username) {
    global $db;
    $a = $db->prepare('
SELECT * FROM events
WHERE id IN
(SELECT event_id FROM event_registrations WHERE user = ?)');
    $a->execute(array($username));

    return $a->fetchAll();
}

function getComments($id) {
    global $db;

    $a = $db->prepare('SELECT * FROM event_comments WHERE event_id = ?');
    $a->execute(array($id));

    return $a->fetchAll();
}

function getRegistered($id) {
    global $db;

    $a = $db->prepare('SELECT * FROM event_registrations WHERE event_id = ?');
    $a->execute(array($id));

    return $a->fetchAll();
}

function isRegisteredInEvent($id, $user) {
    global $db;

    $a = $db->prepare('SELECT * FROM event_registrations
WHERE event_id = ? AND user = ?');
    $a->execute(array($id, $user));

    return $a->fetch() !== false;
}

function unregisterEvent($id, $user) {
    global $db;

    if (!isRegisteredInEvent($id, $user)) return false;

    $a = $db->prepare('DELETE FROM event_registrations
WHERE user = ? AND event_id = ?');
    $a->execute(array($user, $id));

    return true;
}

function registerEvent($id, $user) {
    global $db;

    if (isRegisteredInEvent($id, $user)) return false;

    $a = $db->prepare('INSERT INTO event_registrations VALUES(?, ?)');
    $a->execute(array($user, $id));

    return true;
}

function deleteEvent($id) {
    global $db;

    $a = $db->prepare('DELETE FROM event_comments WHERE event_id = ?');
    $a->execute(array($id));

    $a = $db->prepare('DELETE FROM event_registrations WHERE event_id = ?');
    $a->execute(array($id));

    $a = $db->prepare('DELETE FROM events WHERE id = ?');
    $a->execute(array($id));

    return true;
}

function editEvent($id, $date, $description, $type) {
    global $db;

    $a = $db->prepare('UPDATE events SET date = ?, description = ?, type = ? WHERE events.id = ?');
    $a->execute(array($date, $description, $type, $id));

    return true;
}

function createEvent($date, $description, $type, $creator, $image) {
    global $db;
    if(isset($image)){
        $errors= array();
        $file_name = $image['name'];
        $file_size =$image['size'];
        $file_tmp =$image['tmp_name'];
        $file_type=$image['type'];
        $file_ext=strtolower(end(explode('.',$image['name'])));
        $extensions= array("jpeg","jpg","png");
        if(in_array($file_ext,$extensions)=== false){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        if($file_size > 2097152){
            $errors[]='File size must be at most 2 MB';
        }
        if(empty($errors)==true){
            $pathToImage = "../img/".$file_name;
            move_uploaded_file($file_tmp, $pathToImage);
            echo "Success";
            $a = $db->prepare('INSERT INTO events VALUES(null, ?, ?, ?, ?, ?)');
            $a->execute(array($date, $description, $type, $creator, $pathToImage));
            return true;
        }
        else{
            print_r($errors);
        }
    }
}

function createComment($event_id, $author, $text) {
    global $db;
    if ($text == '') return false;

    $a = $db->prepare('INSERT INTO event_comments VALUES(null, ?, ?, ?)');
    $a->execute(array($event_id, $author, $text));

    return true;
}

?>
