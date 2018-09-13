<?php
if (!isset($_SESSION['user'])) {
    header("location: ".$GLOBALS['domain']."login.html");
}
