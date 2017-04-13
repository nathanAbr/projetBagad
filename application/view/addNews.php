<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="application/assets/css/style.css" type="text/css" />
    <link rel="stylesheet" href="application/assets/css/form.css" type="text/css" />
</head>
<body>
	<form method="post" action="index.php?pages=News&module=create_news">
		<div class="login-form">	
			
			<h1>Creation d'une actualité</h1>
			<h3 class="error">
				<?php if(isset($error_message)){echo $error_message;} ?>
			</h3>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="titre" id="titre" name="titre">
				<i class="fa fa-user"></i>
			</div>
			<div>
				<p>Choisir une Image</p>
				<input type="file" accept="image/*"  value="Image" id="image" name="image">
			</div>
			<div class="form-descrip">
				<textarea class="form-descrip" type="text" class="form-control"  id="description" name="description">Description</textarea>
			</div>
			<div class="valCan-btn">
				<button class="valid-btn" name="valid">Valider</button>  
				<button class="cancel-btn" name="cancel">Annuler</button>
			</div>
		</div>
	</form>
</body>