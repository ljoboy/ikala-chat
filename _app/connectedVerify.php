<?php
if (isset($_SESSION['user'])) {
    redirect();
}elseif (!isset($_SESSION['user'])) {
    redirect("login.html");
}