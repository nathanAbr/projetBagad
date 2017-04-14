<section class= "event-section">
	<div>
		<button class="ajout-btn" onclick="location.href='index.php?pages=News&module=showForm';" name="ajout-btn">Ajout Actu</button>
	</div>
	<div>
		<p>	
			<?php if(!empty($succes)){echo $message;} ?>
		</p>		
	</div>
	<?php foreach($news as $item){ ?>
		
		<div class='event'>
			<div class="entete">
				<h1 class="titre">
					<?php echo $item['titre']; ?>
				</h1>
				<div class="date">
					<p>Publié le: </p>
					<div >
						<?php echo date('d M Y', strtotime($item['date'])); ?>
					</div>
					<div >
						<?php echo date('à G:i', strtotime($item['date'])); ?>
					</div>
				</div>
				
			</div>
			<div class="image"></div>
			<p class="description">
				<?php echo $item['description']; ?>
				<?php echo $item['idActualite']; ?>
			</p>
			<button class="modif-btn" onclick="location.href='index.php?pages=News&module=showUpdate&param=<?php echo $item['idActualite']; ?>';" name="modif-btn">Modifier</button>
			<button class="modif-btn" id="delete-btn" name="delete-btn" onclick="btnClickDelete(<?php echo $item['idActualite']; ?>);">Supprimer</button>
			<div class="signature">
				<?php echo $item['prenom'].' '.$item['nom']; ?>
			</div>
			<div id="modal-<?php echo $item['idActualite']; ?>" class="modal">
				<div class="modal-content">
				    <div class="modal-header">
				      <span class="close croix" onclick="Close(<?php echo $item['idActualite']; ?>);">&times;</span>
				      <h2>Voulez vous vraiment supprimer ?</h2>
				    </div>
				    <div class="modal-body">
				      <a class="valid-btn" name="valid-btn" href="index.php?pages=News&module=delete_news&param=<?php echo $item['idActualite']; ?>">Valider</a>
				      <button class="close cancel-btn " onclick="Close(<?php echo $item['idActualite']; ?>);" name="valid-btn">Annuler</button>
				    </div>
			  </div>
			</div>
			
		</div>
	<?php } ?>
</section>


