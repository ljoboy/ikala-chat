<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
$GLOBALS = [
    "appName" => "Ikala-Chat",
    "domain" => "http://".$_SERVER["SERVER_NAME"]."/glody/",
    "path" => [
        "appFolder" => "_app"
    ],
    "author" => "Glody TSHIBAKA",
    "siteName" => "www.ikala-chat.com",
    "version" => "1.0.0",
    "db" => [
        "host" => "localhost",
        "username" => "root",
        "password" => "",
        "name" => "ikaladb"],
    "tagLine" => "Improviser et s'adapter"     
    ];