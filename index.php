<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();
}

require_once "_app/init.php";
require_once "_app/functions.php";
$page_e = page();
//TODO: Better handle this one
// if ($page_e == "login" || $page_e == "signup") {
//     require_once "_app/connectedVerify.php";
// }
if ($page_e == "disconnect") {
    deconnect();
}
ob_start();
$page = "_controllers/".$page_e.".php";
if (is_file($page)){
    include_once $page;
}else{
    $page = "_statics/".$page_e.".php";
}
if (is_file($page) and $page != "_statics/index.php"){
    include_once $page;
}else{
    include_once '_statics/index.php';
}

$contenu = ob_get_clean();
ob_end_clean();
include_once '_inc/header.php';
echo $contenu;
include_once '_inc/footer.php';