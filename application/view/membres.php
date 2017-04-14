<h1>Mon profil</h1>
<div class="info_profil">
    <div class="form-group">
        <label for="name">Nom :</label>
        <input type="text" name="name" id="name" class="form-control" value="<?php echo $_SESSION['users'][0]['nom']; ?>"/>
    </div>
    <div class="form-group">
        <label for="secondName">Prénom :</label>
        <input type="text" name="secondName" id="secondName" class="form-control" value="<?php echo $_SESSION['users'][0]['prenom']; ?>"/>
    </div>
    <div class="form-group">
        <label for="mail">Mail :</label>
        <input type="text" name="mail" id="mail" class="form-control" value="<?php echo $_SESSION['users'][0]['mail']; ?>"/>
    </div>
    <div class="form-group">
        <label for="tel">Téléphone :</label>
        <input type="text" name="tel" id="tel" class="form-control" value="<?php echo $_SESSION['users'][0]['telephone']; ?>"/>
    </div>
    <div class="form-group">
        <label for="adresse">Adresse :</label>
        <input type="text" name="adresse" id="adresse" class="form-control" value="<?php echo $_SESSION['users'][0]['rue']; ?>"/>
    </div>
    <div class="form-group">
        <label for="ville">Ville :</label>
        <input type="text" name="ville" id="ville" class="form-control" value="<?php echo $_SESSION['users'][0]['ville']; ?>"/>
    </div>
    <div class="form-group">
        <label for="cp">Code postal :</label>
        <input type="text" name="cp" id="cp" class="form-control" value="<?php echo $_SESSION['users'][0]['codePostale']; ?>"/>
    </div>
    <div class="form-group">
        <label for="groupe">Groupe :</label>
        <input type="text" name="groupe" id="groupe" class="form-control" value="<?php echo $_SESSION['users'][0]['groupe']; ?>"/>
    </div>
</div>