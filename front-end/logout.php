<?php
include('./includes/config.php');
session_start();
session_unset();
session_destroy();
$delete_cart = "delete from cart";
mysqli_query($connection, $delete_cart);
header('location: index.php');
?>
