<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="application/assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="application/assets/css/news.css">
	</head>
	<body>
		<section class= "news-section">
			<?php foreach($news as $item){ ?>
				<div class='showNews-form'>
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
					
					<div class="signature">
						<?php echo $item['prenom'].' '.$item['nom']; ?>
					</div>
				</div>
			<?php } ?>
		</section>
	</body>
</html>