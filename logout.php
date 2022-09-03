<?php

session_start();

session_unset();

session_destroy();

header("Location: /curso-php/sesion_3");

?>