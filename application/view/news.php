<section class= "event-section">
	<div>
		<button class="ajout-btn" onclick="location.href='index.php?pages=News&module=showForm';" name="ajout-btn">Ajout Actu</button>
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
			</p>
			<button class="modif-btn" onclick="location.href='index.php?pages=News&module=showForm&param=<?php echo $item['idActualite']; ?>';" name="modif-btn">Modifier</button>
			<div class="signature">
				<?php echo $item['prenom'].' '.$item['nom']; ?>
			</div>
		</div>
	<?php } ?>
</section>