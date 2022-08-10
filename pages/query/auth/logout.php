<?php 
setcookie ("loginId", "", time() - (60*60*24*7), '/dental-supplies/');
setcookie ("fullname", "", time() - (60*60*24*7), '/dental-supplies/');
setcookie ("role", "", time() - (60*60*24*7), '/dental-supplies/');
setcookie ("project", "", time() - (60*60*24*7), '/dental-supplies/');
session_start();
if (session_destroy()) {
    header("Location:../../");
}
?>