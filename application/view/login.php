<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="application/assets/css/style.css" type="text/css" />
    <link rel="stylesheet" href="application/assets/css/form.css" type="text/css" />
</head>
<body>
<form method="post" action="http://bagad.local/projetBagad/index.php?pages=Users&module=login">
<div class="login-form">  
    <h3 class="error"><?php if(isset($error_message)){echo $error_message;} ?></h3>
    <h1>Login</h1>
    <div class="form-group ">
        <input type="text" class="form-control" placeholder="Username " id="UserName" name="login">
        <i class="fa fa-user"></i>
    </div>
    <div class="form-group log-status">
        <input type="password" class="form-control" placeholder="Password" id="Passwod" name="password">
        <i class="fa fa-lock"></i>
    </div>
    <span class="alert">Invalid Credentials</span>
    <a class="link" href="#">Lost your password?</a>
    <input type="submit" class="log-btn" />
</div>
</form>

<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
</body>
</html>