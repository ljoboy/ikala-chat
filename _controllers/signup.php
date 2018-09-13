<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
    extract($_POST);
    if (isset($pseudo, $email, $nom_complet, $date_n, $password, $confirmer, $genre)) {
        $pseudo = e($pseudo);
        $email = e($email);
        $nom_complet = e($nom_complet);
        $date_n = e($date_n);
        $genre = e($genre);
        if($password === $confirmer){
            $password = password_hash($password, PASSWORD_BCRYPT);
            $q = $db->prepare("INSERT INTO users(pseudo, email,nom_complet, mdp, date_naiss, sexe, date_compte) 
            VALUES(:pseudo, :email, :nom, :mdp, :date_naiss, :sexe, now())");
            $q->execute([
                "pseudo" => $pseudo,
                "email" => $email,
                "nom" => $nom_complet,
                "mdp" => $password,
                "date_naiss" => $date_n,
                "sexe" => $genre
            ]);
            header("location: ".$GLOBALS['domain']."login.html");
            exit;
        }else{
            $data["erreur"] = "Les mots de passe ne correspondent pas"; 
            vue_loader("signup.php", $data);
        }
    }else{
        $data["erreur"] = "Verifier que vous avez rempli tous les champs"; 
        vue_loader("signup.com", $data);
    }
} else {
    vue_loader("signup.php");
}