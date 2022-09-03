<?php

try{
    $conn = mysqli_connect(
        'us-cdbr-east-06.cleardb.net',
        'b4693e416d2a8d',
        'ee475556',
        'heroku_037ea72dd53e42e'
    );
}catch(Exception $e){
    echo "Database Not Connected".$e->getMessage();
}


?>