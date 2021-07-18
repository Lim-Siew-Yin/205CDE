<?php

    //constant
    define ("HOST",'localhost');
    define ("USERNAME", 'root');
    define ("PASSWORD", '');
    define ("DATABASE", 'veterinary');

    //create connection
    $conn = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);

    if(!$conn){
        die('Connection Failed: '.mysqli_connect_error());
    }

?>
