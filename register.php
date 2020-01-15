<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title >POORGAMES</title>
	<meta name="description" content="Jesteś biedny i nie stać Cię na gierki< Klikaj na POORGAMES! " />
	<meta name="keywords" content="poorgames,snake,2048,pong,tetris,zbijak" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome,opera=1" />
	<link rel="stylesheet" href="style4.css" type="text/css"/>
	<link href="https://fonts.googleapis.com/css?family=Lato:400,900&amp;subset=latin-ext" rel="stylesheet" type="text/css">


</head>
<body>

	<div id="container">

    <div id="topbar">
      <div id="topbarL">
        <img src="logo.png" >
      </div>
      <div id="topbarR">
        <div class="title"><h1>POORGAMES</h1></div>
      </div>
    </div>


		<div id="content">
			<div class="header">
				<h2>Rejestracja</h2>
			</div>
    <form method="post" action="register.php">
    	<?php include('errors.php'); ?>
    	<div class="input-group">
    	  <label>Nazwa użytkownika</label>
    	  <input type="text" name="username" value="<?php echo $username; ?>">
    	</div>
    	<div class="input-group">
    	  <label>Email</label>
    	  <input type="email" name="email" value="<?php echo $email; ?>">
    	</div>
    	<div class="input-group">
    	  <label>Hasło</label>
    	  <input type="password" name="password_1">
    	</div>
    	<div class="input-group">
    	  <label>Potwierdź hasło</label>
    	  <input type="password" name="password_2">
    	</div>
    	<div class="input-group">
    	  <button type="submit" class="btn" name="reg_user">Utwórz</button>
    	</div>
    	<p>
    		Posiadasz już konto? <a href="login.php"> Zaloguj się! </a>
    	</p>
    </form>
		</div>

	</div>

</body>
</html>
