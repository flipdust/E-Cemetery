<?php

session_start();

?>

<script>alert('Are you sure you want to logout?')</script>

<?php
session_destroy();
header("Location: login.php");


?>
