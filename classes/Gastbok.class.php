<?php

class Gastbok {
    protected $gastbok = [];

    function __construct() {
        // Inleder med att rensa hela filen
        $txt = fopen("./data/data.txt", "w+") or die("Kunde ej öppna filen.");
        fwrite($txt, "");
        fclose($txt);

        if(filesize("./data/array.obj")>0) {
            $this->gastbok = unserialize(file_get_contents("./data/array.obj"));
            $this->loadTxtFile();
        }

    }

    function loadTxtFile() {
        // Fyller på inlägg om det finns några
        if($this->gastbok) {
            foreach($this->gastbok as $post) {
                $values = array_values($post);
                $txtpost = implode(',', $values);
                $txt = fopen("./data/data.txt", "a+") or die("Kunde ej öppna filen.");

                fwrite($txt, $txtpost . "\n");
                fclose($txt);
            }
        }
    }


    function addPost($name, $msg, $date) {
        $inlagg = new Inlagg($name, $msg, $date);
        $newPost = $inlagg->getPost();

        array_unshift($this->gastbok, $newPost);
        
        //Sparar serialiserad array
        file_put_contents("./data/array.obj",serialize($this->gastbok));

        $this->loadTxtFile();
    }
    
    function removePost($ind) {
        unset($this->gastbok[$ind]);

        // // Sparar serialiserad array
        file_put_contents("./data/array.obj",serialize($this->gastbok));
    }

    function getGastbok() {
        return $this->gastbok;
    }
}

?>