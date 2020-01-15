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
				<h2>Logowanie</h2>
			</div>
      <form method="post" action="login.php">
      	<?php include('errors.php'); ?>
      	<div class="input-group">
      		<label>Nazwa użytkownika</label>
      		<input type="text" name="username" >
      	</div>
      	<div class="input-group">
      		<label>Hasło</label>
      		<input type="password" name="password">
      	</div>
      	<div class="input-group">
      		<button type="submit" class="btn" name="login_user">Zaloguj się</button>
      	</div>
      	<p>
      		Nie posiadasz konta? <a href="register.php"> Załóż je! </a>
      	</p>
      </form>
		</div>

	</div>

</body>
</html>
