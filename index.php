<?php
  session_start();

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "Musisz najpierw się zalogować";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title >POORGAMES</title>
	<meta name="description" content="Jesteś biedny i nie stać Cię na gierki< Klikaj na POORGAMES! " />
	<meta name="keywords" content="poorgames,snake,2048,pong,tetris,zbijak" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome,opera=1" />
	<link rel="stylesheet" href="style2.css" type="text/css"/>
	<link href="https://fonts.googleapis.com/css?family=Lato:400,900&amp;subset=latin-ext" rel="stylesheet" type="text/css">

</head>
<body>

	<div id="container">



		</br>

		<div id="topbar">
			<div id="topbarL">
				<img src="logo.png" >
			</div>
			<div id="topbarR">
        <div class="title"><h1>POORGAMES</h1></div>
				<?php if (isset($_SESSION['success'])) : ?>
	      <div class="error success" >
	        <h3>
	          <?php
	            echo $_SESSION['success'];
	            unset($_SESSION['success']);
	          ?>
	        </h3>
	      </div>
	    <?php endif ?>


	    <?php  if (isset($_SESSION['username'])) : ?>
	      <p class="slowo">Profil: <strong><?php echo $_SESSION['username']; ?></strong></p>
	      <p class="slowo1"> <a href="index.php?logout='1'" style="text-decoration:none; color:red;">Wyloguj</a> </p>
	    <?php endif ?>
			</div>
		</div>


		<div id="content">
		 <span class="bigtitle">Kliknij se gierkę!</span>
		 <div class="dottedline"></div>
		 <a href="2048/index.html"><div id="box"></div></a>
	   <a href="zbijak/index.html"><div id="box1"></div></a>
	   <a href="wonsz/index.html"><div id="box2"></div></a>
	   <a href="pong/index.html"><div id="box3"></div></a>
	   <a href="tetris/index.html"><div id="box4"></div></a>
		</div>

	</div>

</body>
</html>
