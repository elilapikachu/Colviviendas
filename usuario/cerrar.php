<?php
session_start();
session_unset();
session_destroy();
header("location: ../usuario/login.php");
exit;
