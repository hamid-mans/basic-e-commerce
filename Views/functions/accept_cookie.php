<?php
setcookie('boom', true, time()+3600*24, '/', '', true, true);
header('location: ../index.php');
?>