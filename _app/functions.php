<?php
include_once "connexiondb.php";
if (!isset($db)) {
    $db = null;
}

if (!function_exists("e")){
    function e(string $string)
    {
        return strip_tags(htmlspecialchars(strtolower($string)));
    }
}

if (!is_callable($db)) {
    $db = dbConnect();
}
if (!function_exists("page")){
function page(){
    $page = "";
    if (isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != ""){
        $page = $_SERVER['QUERY_STRING'];
        $page = explode("/",$page)[0];
        $page = explode(".",$page);
        if (isset($page[1])) {
            $validate = explode(".",$page[1]);
            $validate = "_controllers/".$validate[0].".php";   
        }
        if ($page[0] == "form-validate" && is_file($validate)){
            include $validate;
            exit();
        }else if (isset($page[1])){
            if ($page[1] != "html" && $page[0] != "index") {
                return "404";   
            }
        }else{
            return "404";
        }
    }else{
        $page = [];
        $page[] = "index";
    }
    return $page[0];
}
}
if (!function_exists("page_active")){
function page_active($file)
{
    $page = "";
    if (isset($_SERVER['QUERY_STRING'])){
        $page = page();
    }
    if ($page == ""){
        $page = "index";
    }
    if($page == $file)
    {
        return "active animated pulse infinite";
    }
    else
    {
        return "";
    }
}
}

if (!function_exists("is_already_in_use")){
function is_already_in_use($field,$value,$table)
{
    global $db;
    $q = $db->prepare("SELECT id FROM $table WHERE $field = ?");
    $q->execute([$value]);
    $count = $q->rowCount();
    $q->closeCursor();
    return $count;
}
}

if (!function_exists("vue_loder")) {
    function vue_loader(string $statics, array $array = null)
    {
        if (is_file("_statics/$statics")) {
            if (is_array($array)) {
                extract($array);
            }
            include_once "_statics/$statics";
        }
        
    }
}

if (!function_exists("navbar")) {
    function navbar()
    {
                
    }
}

if (!function_exists("deconnect")) {
    function deconnect()
    {
        if (isset($_SESSION)) {
            session_destroy();
            unset($_SESSION);
            header("location: ".$GLOBALS['domain']);
        } 
    }
}

if (!function_exists("redirect")) {
    function redirect(string $page = null)
    {
        header("location: ".$GLOBALS['domain'].$page);       
    }
}