<?php

class DBGastbok {


    protected $gastbok = [];
    
    function __construct() {
        // Databasanslutning
        $this->db = new mysqli('localhost', 'admin', 'password', 'guestbook');
        if($this->db->connect_errno > 0){
            die('Fel vid anslutning [' . $db->connect_error . ']');
        }
        
        // Laddar in inläggen från databasen
        $this->loadPosts();
    }
    
    function loadPosts() {
        // Fyller på inlägg om det finns några
        $sql = "SELECT * FROM guestbookposts ORDER BY postdate DESC";
        if(!$result = $this->db->query($sql)){
            die('Fel vid SQL-fråga [' . $db->error . ']');
        }

        while($row = $result->fetch_assoc()){
            $this->gastbok[] = $row;
        }

        return $this->gastbok;
    }

    function loadDataJSON($numrows) {
        $sql = "SELECT * FROM guestbookposts LIMIT $numrows";
        $result = $this->db->query($sql);
    
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }


    function addPost($name, $post) {
        $sql = "INSERT INTO guestbookposts(username, post)VALUES('$name', '$post');";
        $result = $this->db->query($sql);
    }

    function getPost($id) {
        $sql = "SELECT * FROM guestbookposts WHERE id = $id;";
        $result = $this->db->query($sql);

        return $result->fetch_assoc();
    }

    function updatePost($id, $name, $post) {
        $sql = "UPDATE guestbookposts SET username = '$name', post = '$post', postdate = CURRENT_TIMESTAMP WHERE id = $id;";
        $result = $this->db->query($sql);

        return $result;
    }
    
    function removePost($id) {
        $sql = "DELETE FROM guestbookposts WHERE id = $id;";
        $result = $this->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function getGastbok() {
        return $this->gastbok;
    }

    function loginUser($username, $password) {
        $username = $this->db->real_escape_string($username);
        $password = $this->db->real_escape_string($password);

        $sql = "SELECT username FROM users WHERE username = '$username' AND password = '$password';";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION['username'] = $username;
            echo "du har loggat in som " . $_SESSION['username'];

            return true;
        } else {

            return false;
        }
    }
}

?>