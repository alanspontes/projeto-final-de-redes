<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Projeto Final de Redes</title>
	<meta name="viewport" content="width=device-width,
	initial-scale=1">
	<link rel="stylesheet" 	href="css/geral.css">
	<link rel="stylesheet"  href="bower_components/wow/css/libs/animate.css">
	<link rel="stylesheet"  href="css/plugins.css">
	<link rel="stylesheet"  href="css/<?php echo $style; ?>.css">
</head>
<body>

	<?php include('includes/organisms/menu-responsivo.php'); ?>

	<div class="layout">
		<header>
			<div class="container">
				<div class="logo wow slideInLeft" data-wow-duration="1s" data-wow-delay="1s">
				<a href="index.html">
					<img src="images/logo-topo2.png" alt="Logo Topo ADK">
				</a>
				</div>	
				<div class="links">	
					<?php include('includes/organisms/menu.php'); ?>
					
	
				<a class="toggle" href="javascript:;">
					<span></span>
					<span></span>
					<span></span>
				</a>


					<ul class="social wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
						<li>
							<a href="https://github.com/alanspontes/projeto-final-de-redes/tree/master" target="_blank"><i class="fa fa-github-alt" ></i></a>
						</li>
					</ul>
				</div>
				<h1><strong><?php echo $cabecalho; ?></strong></h1>
			</div>
		</header>

		<main>