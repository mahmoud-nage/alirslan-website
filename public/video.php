<?php
session_start();
$path = '/'.'uploads/'.$_SESSION[$_GET['video']];

return $path;
?>