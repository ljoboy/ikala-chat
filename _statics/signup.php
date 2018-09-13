<form action="signup.html" method="post">
    <label for="">Pseudo : </label>
    <input class="form-control" type="text" name="pseudo" required/>
    
    <label for="">Email : </label>
    <input class="form-control" type="email" name="email" required/>
    
    <label for="">Nom complet : </label>
    <input class="form-control" type="text" name="nom_complet" required/>
    
    <label for="">Date Naissance : </label>
    <input class="form-control" type="date" name="date_n" required/>
    
    <label for="">Mot de passe : </label>
    <input class="form-control" type="password" name="password" required/>
    
    <label for="">Confirmer : </label>
    <input class="form-control" type="password" name="confirmer" required/>
    
    <label for="">Genre : </label>
    <br/>
    Femme
    <input class="form-control" type="radio" name="genre" value="f"/>
    Homme
    <input class="form-control" type="radio" name="genre" value="m"/>
    
    <input class="btn btn-lg btn-success" type="submit" name="enregistrer" value="Enregistrer"/>
</form>