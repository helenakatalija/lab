<?php


#we only want to set that HTTP only works. 
ini_set('session.cookie_httponly', true);


session_start ();


# if the user ip is set you want to set it later
if (isset($_SESSION['userip']) === false){
    
# the session is stored on the server. The adress that you come from
    $_SESSION['userip'] = $_SERVER['REMOTE_ADDR'];
}

#want to see if the session is true to the IP adress. If its not, detroy the session.
if ($_SESSION['userip'] !== $_SERVER['REMOTE_ADDR']){

    session_unset();
    session_destroy();
    
}