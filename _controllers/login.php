<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
    if (isset($email, $pwd)) {
        $email = e($email);
        $q = $db->prepare("SELECT * FROM users WHERE pseudo = :pseudo OR email = :email");
        $q->execute([
            "pseudo" => $email,
            "email" => $email
        ]);
        $user = [];
        while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
            $user = $r;
        }
        if (password_verify($pwd, $user["mdp"])) {
            $_SESSION['user'] = $user;
            header("location: ".$GLOBALS['domain']."index.html"); 
        }else{
            echo "Pseudo / Mot de passe incorrect";
        }

    } else {
        echo "Erreur inconnu";
    }
    
} else {
    vue_loader("login.php");
}