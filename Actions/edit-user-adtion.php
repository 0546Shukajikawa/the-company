<?php
    include '../Classess/User.php';

    #Instantiate an object
    $user = new User;

    #call the method
    $user->updata($_POST,$_FILES);
?>