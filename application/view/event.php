<section class="event-section">

<?php
//var_dump($_SESSION['users'][0]['prenom']);
 if($_SESSION['users'][0]['groupe'] == 'bureau'){?>
  <button id="btnCreate" class="btnEdit, btnCreate" type="button" >Ajouter un évènement</button>
 
 
 
<div id="modal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
   

<div>

  <form method="post" id="createForm" class="form" action="index.php?pages=Event&module=createEvent">
  <h3>Ajoutez un évènement</h3>
    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nomEvent" placeholder="Nom de l'évènement">

	<div class ="dateBlock">
	<div class ="date" >
    <label for="dateDebut">Debut de l'évènement</label>
    <input type="date" id="dateDebut" name="debutEvent" placeholder="Debut">
	</div>
	<div class ="date">
	<label for="dateFin">Fin de l'évènement</label>
    <input type="date" id="dateFin" name="finEvent" placeholder="Fin">
	</div>
	</div>

	<label for="cachet">Montant du cachet</label>
    <input type="text" id="cachet" name="cachetEvent" placeholder="Montant">
	
	<label for="cachet">Description de l'évènement</label>
    <textarea type="text" id="cachet" name="descriptionEvent" placeholder="Description"></textarea>
	
	<label for="image">Image de l'évènement</label>
	<input type="file" accept="image/*"  value="Image" id="image" name="imageEvent">
	
	
    <h3>Lieu</h3>
    <input type="text"  id="rue1" name="rue1Event" placeholder="Rue N°1">
	<input type="text"  id="rue2" name="rue2Event" placeholder="Rue N°2">
	<input type="text"  id="complement" name="complementEvent" placeholder="Complement">
	<input type="text"  id="ville" name="villeEvent" placeholder="Ville">
	<input type="text"  id="cp" name="cpEvent" placeholder="Code postal">
	<input type="text"  id="pays" name="paysEvent" placeholder="Pays">
     
	
	<h3>Type de l'évènement</h3>
    <select id="type" name="typeEvent">
	<?php foreach ($typeEvent as $type){ ?>
      <option value="<?php echo $type['idType'];?> " > <?php echo $type['libelle'] ; ?></option>
	<?php } ?>
    </select>
	
	
	<h3>Associez un référent exterieur (organisateur)</h3>
    <input type="text"  id="nomRef" name="nomRefEvent" placeholder="Nom">
	<input type="text"  id="prenomRef" name="prenomRefEvent" placeholder="Prenom">
	<input type="text"  id="telRef" name="telRefEvent" placeholder="N° téléphone">
	<input type="email"  id="mailRef" name="mailRefEvent" placeholder="Adresse mail">
	
	
	<label for="createur">Createur de l'évènement</label>
	<input type="text" id="createur" name="createurEvent" value="<?php echo $_SESSION['users'][0]['prenom']; ?>">
  
    <input type="submit" class="submit" value="Enregistrer">
  </form>
  
  <form  method="POST" id="deleteForm" class="form" action="index.php?pages=Event&module=deleteEvent">
  <h3>Etes-vous certain de vouloir supprimer cet évènement ?</h3>
    <h4 id="supNomEvent"></h4>
    <input type="hidden" id="supIdEvent" name="idEvent">
    <input type="submit" class="submit" value="Oui">
	<input id="btnCloseSup" type="button" class="submit" value="Non" >
  </form>
  
  <form  method="POST" id="updateForm" class="form" action="index.php?pages=Event&module=UpdateEvent">
  <h3>Mettez à jour l'évènement</h3>
    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nomEvent" placeholder="Nom de l'évènement">
	
    <div class ="dateBlock">
	<div class ="date">
    <label for="dateDebut">Debut de l'évènement</label>
    <input type="date" id="dateDebut" name="debutEvent" placeholder="Debut">
	</div>
	<div class ="date">
	<label for="dateFin">Fin de l'évènement</label>
    <input type="date" id="dateFin" name="finEvent" placeholder="Fin">
	</div>
	</div>

	<label for="cachet">Montant du cachet</label>
    <input type="text" id="cachet" name="cachetEvent" placeholder="Montant">
	
	<label for="description">Description de l'évènement</label>
    <textarea id="description" name="descriptionEvent" placeholder="Description"></textarea>
	
	<label for="image">Image de l'évènement</label>
	<input type="file" accept="image/*"  value="Image" id="image" name="imageEvent">
	
   <h3>Lieu</h3>
    <input type="text"  id="rue1" name="rue1Event" placeholder="Rue N°1">
	<input type="text"  id="rue2" name="rue2Event" placeholder="Rue N°2">
	<input type="text"  id="ville" name="villeEvent" placeholder="Ville">
	<input type="text"  id="cp" name="cpEvent" placeholder="Code postal">
	<input type="text"  id="pays" name="paysEvent" placeholder="Pays">
	
	<h3>Type d'évènement</h3>
    <select id="type" name="typeEvent">
      <option value="australia">Sortie</option>
      <option value="canada">Concours</option>
      <option value="usa">Réunion</option>
    </select>
	
	<h3>Référent exterieur (organisateur)</h3>
    <input type="text"  id="nomRef" name="nomRefEvent" placeholder="Nom">
	<input type="text"  id="prenomRef" name="prenomRefEvent" placeholder="Prenom">
	<input type="text"  id="telRef" name="telRefEvent" placeholder="N° téléphone">
	<input type="email"  id="mailRef" name="mailRefEvent" placeholder="Adresse mail">
	
	<label for="createur">Createur de l'évènement</label>
	<input type="text" id="createur" name="createurEvent" value="">
	
	
	<input type="submit" class="submit" value="Mettre à jour">
  </form>
</div>
  </div>

</div>
<?php } ?>



<?php 
foreach($event as $item){ ?>
        <div class="event">
            <h1><?php echo $item['eventNom']; ?></h1>
			<span> Date: du <?php echo date('d M Y', strtotime($item['dateDebut'])); ?> au <?php echo date('d M Y', strtotime($item['dateFin'])); ?></span>
            <p>
               <?php echo $item['description']; ?>
            </p>
			<button name="" onclick="openModalDelete('<?php echo $item['eventNom'],- $item['idEvenement']?>')" class="btnEdit, btnDelete" type="button">Supprimer l'évènement</button>
			<button name="" onclick="openModalUpdate('<?php echo $item['eventNom'],- $item['idEvenement']?>')" class="btnEdit, btnUpdate" type="button">Modifier l'évènement</button>
        </div>
<?php } ?>
</section>
