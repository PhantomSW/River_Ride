<?php 
session_start();
session_destroy();
$msg = 'Vous avez été déconnecté(e) avec succès.';
header('location: index.php?type=success&message=' . $msg);
exit();
?>