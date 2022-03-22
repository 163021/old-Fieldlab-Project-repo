<?php
session_start();
session_destroy();
echo "<h2> Je word uitgelogd, moment geduld...";
header("refresh: 3; url= ../");
?>