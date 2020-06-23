<?php
session_start();
session_destroy();
$_SESSION['etat']='disconect';
include('/var/www/html/index.php');
?>