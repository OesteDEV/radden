<?php
session_start();


// -- eliminamos el usuario
if(isset($_SESSION['user_id'])){
	unset($_SESSION['user_id']);
}

session_destroy();
print "<script>window.location='index.php';</script>";
?>