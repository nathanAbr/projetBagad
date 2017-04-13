<h1>Ajouter un membre</h1>
<?php if(isset($success)){ ?>
    <div class="alert-success"><?php echo $success; ?></div>
<?php } ?>
<form method="post" action="index.php?pages=Membres&module=addMembre">
    <div class="info_profil">
        <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" class="form-control" value=""/>
        </div>
        <div class="form-group">
            <label for="secondName">Prénom :</label>
            <input type="text" name="secondName" id="secondName" class="form-control" value=""/>
        </div>
        <div class="form-group">
            <label for="ddn">Date de naissance :</label>
            <input type="date" name="ddn" id="ddn" class="form-control" value=""/>
        </div>
        <div class="form-group">
            <label for="mail">Mail :</label>
            <input type="text" name="mail" id="mail" class="form-control" value=""/>
        </div>
        <div class="form-group">
            <label for="tel">Téléphone :</label>
            <input type="text" name="tel" id="tel" class="form-control" value=""/>
        </div>
        <div class="form-group">
            <label for="rue1">Adresse :</label>
            <input type="text" name="rue1" id="rue1" class="form-control" value=""/>
        </div>
        <div class="form-group">
            <label for="rue2">Complément 1 :</label>
            <input type="text" name="rue2" id="rue2" class="form-control" value=""/>
        </div>
        <div class="form-group">
            <label for="complement">Complément 2 :</label>
            <input type="text" name="complement" id="complement" class="form-control" value=""/>
        </div>
        <div class="form-group">
            <label for="ville">Ville :</label>
            <input type="text" name="ville" id="ville" class="form-control" value=""/>
        </div>
        <div class="form-group">
            <label for="cp">Code postal :</label>
            <input type="text" name="cp" id="cp" class="form-control" value=""/>
        </div>
        <div class="form-group">
            <label for="pays">Pays :</label>
            <input type="text" name="pays" id="pays" class="form-control" value=""/>
        </div>
        <div class="form-group">
            <label>Instrument :</label>
            <select class="form-control" name="instrument">
                <?php foreach($instruments as $instrument){ ?>
                    <option value="<?php echo $instrument['idInstrument']; ?>"><?php echo $instrument['nom']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Groupe :</label>
            <select class="form-control" name="groupe">
                <?php foreach($groupes as $groupe){ ?>
                    <option value="<?php echo $groupe['idgroupe']; ?>"><?php echo $groupe['nomGroupe']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Rôles :</label>
            <div class="groupe_role">
                <?php foreach($roles as $role){ ?>
                    <label for="role-<?php echo $role['idRole']; ?>" class="role"><?php echo $role["libelle"]; ?>
                        <input type="checkbox" values="<?php echo $role['idRole']; ?>" name="roles[]" id="role-<?php echo $role['idRole']; ?> class="checkRole"/>
                    </label>
                <?php } ?>
            </div>
        </div>
        <input type="submit" class="log-btn btn" value="Enregistrer" name="save"/>
    </div>
</form>