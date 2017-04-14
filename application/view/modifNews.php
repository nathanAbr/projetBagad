<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="application/assets/css/style.css" type="text/css" />
    <link rel="stylesheet" href="application/assets/css/form.css" type="text/css" />
</head>
<body>
	<form method="post" action="index.php?pages=News&module=update_news&param=<?php echo $news[0]['idActualite']; ?>">
		<div class="login-form">	
			
			<h1>Creation d'une actualité</h1>
			<h3 class="error">
				<?php if(isset($error_message)){echo $error_message;} ?>
			</h3>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="titre" 
				value="<?php if(isset($news[0]['titre'])){echo $news[0]['titre'];} ?>" 
				id="titre" name="titre">
				<i class="fa fa-user"></i>
			</div>
			<div>
				<p>Choisir une Image</p>
				<input type="file" accept="image/*" 
				value="<?php if(isset($news[0]['image'])){echo $news[0]['image'];} ?>"  
				id="image" name="image">
			</div>
			<div class="form-descrip">
				<textarea class="form-descrip" type="text" class="form-control" placeholder="description" id="description" name="description"><?php if(isset($news[0]['description'])){echo $news[0]['description'];} ?></textarea>
			</div>
			<div class="valCan-btn">
				<button class="valid-btn" name="valid">Valider</button>  
				<button class="cancel-btn" name="cancel">Annuler</button>
			</div>
		</div>
	</form>
</body>