<?php
require "init.php";
require "functions.php";

session_unset();
session_destroy();

redirect_to("Home_Page.html");

?>