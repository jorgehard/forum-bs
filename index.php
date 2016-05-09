<?php
include("painel/config.php");

	$dip = mysqli_query($con, "SELECT * FROM ips");
	$ipv = mysqli_fetch_array($dip);
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="BSGAMES - Comunidade de Games">
    <meta name="author" content="jorgehenrique@live.com">
    <link rel="icon" href="">

    <title>Brasil Servers Games</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">   
    <script src="js/ie-emulation-modes-warning.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
  </head>
	<body class="bg-geral">
		<div class="container-fluid top">
			<div class="container" style="width:800px;">
			<a href="index.php"><img src="img/logo.png" alt="" class="img-responsive" width="800px"/></a>
			</div>
		</div>
		<div class="container-fluid menu menub">
			<nav class="row" id="menufixo" role="navigation">
			  <div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">BSGames</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
				  <ul class="nav navbar-nav ">
					<li class="active"><a href="index.php">Home</a></li>
					<li><a href="sobre.php">Sobre</a></li>
					<li><a href="http://brasilservers.com.br/forum/">Forum</a></li>
					<li><a href="contato.php">Contato</a></li>
					<!--<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categorias<span class="caret"></span></a>
					  <ul class="dropdown-menu" role="menu">
						<li><a href="#">---</a></li>
						<li><a href="#">---</a></li>
						<li><a href="#">---</a></li>
						<li><a href="#">---</a></li>
						<li><a href="#">---</a></li>
						<li class="divider"></li>
						<li class="dropdown-header">Outras categorias</li>
						<li><a href="#">Parceiros</a></li>
						<li><a href="#">Sugestões</a></li>
					  </ul>
					</li>-->
				  </ul>
				  <ul class="nav navbar-nav navbar-right">
					<li><a href="videos.php">Videos</a></li>
					<li><a href="fotos.php">Fotos</a></li>
					<li><a href="#">Redes Sociais</a></li>
				  </ul>
				</div>
			  </div>
			</nav>
		</div>
<!------------------------------------------------------------------------------------------------------------------------------------------>
		<div class="container hidden-xs">
			<div class="container-fluid">
				<div class="carousel" id="carousel-985470">
					<ol class="carousel-indicators">
						<?php  
							$sql = "SELECT * FROM news LIMIT 5";
							$query = mysqli_query($con, $sql);
							$contador = mysqli_num_rows($query);
							for($i = 0; $i < $contador; ++$i) {
						?>
						<?php if(!$i) {?>
							<li class="active" data-slide-to="0" data-target="#carousel-985470">
							</li>
						<?php } else { ?>
							<li  data-slide-to="<?php echo $i;?>" data-target="#carousel-985470">
							</li>
						<?php } } ?>
					</ol>
				<div class="carousel-inner">
					<?php 
						$sql = "SELECT titulo, id, imagem, resumo FROM news ORDER BY data DESC LIMIT 5";
						$query = mysqli_query($con, $sql);
						if(!$query) {
							echo mysqli_error($con); 
						} else {
							$aux = true;
							while($res = mysqli_fetch_assoc($query)) {
								if($aux) { 
									echo "<div class='item active'>";
									$aux = false;
								} else {
									echo "<div class='item'>"; 
								} ?>
								<a href = "noticia.php?id=<?php echo $res['id']; ?>">
								<img alt="" src="painel/restrito/imagens/<?php echo $res['imagem']; ?>" width="100%" height="100%"/> 
									<h3>	
											<span class="carousel-titulo"> <?php echo $res['titulo'];?> </span> 
									</h3>
									<div class="carousel-resumo">
										<h5>	
											<p class="center"> <?php echo $res['resumo'];?></p> 
										</h5>
									</div>
								<div class="carousel-caption" style="background:#000; border-radius:90%; top:290px; opacity:0.7"> 
								</div>
								</a>
							</div>
							<?php } ?>
						<?php } ?>
				</div> 	
						<a class="left carousel-control" href="#carousel-985470" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Anterior</span>
						</a> 
						<a class="right carousel-control" href="#carousel-985470" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Proximo</span>
						</a>
				</div>
			</div>
		</div><!-- /.carousel -->
	<!------------------------------------------------------------------------------------------------------------------------------------------>  
		<div class="container random meiob">
			<div class="container blog-main" style="margin: 0 auto; float: none;"> 
			<?php
					
				$noi = mysqli_query($con, "SELECT * FROM news ORDER by data DESC LIMIT 3");
				$tno = mysqli_num_rows($noi);
				if($tno <= 0) {
					echo '<h2>Nada encontrado...</h2>';
				} else {
					while($inoi = mysqli_fetch_array($noi)) {
					?><div style=" margin-left:20px; height:260px; float:left;">
						<div class="col-lg-4" style="padding:10px; float:left; font-size:12px; width:350px; height:200px;">
						  <h4><?php echo $inoi['titulo'];?></h4>
						  <p><?php echo substr($inoi['resumo'], 0, 300).'...';?> </p>
					   </div>
					   <p style="clear:both;"><a href = "noticia.php?id=<?php echo $inoi['id']; ?>" class="btn btn-primary" role="button">Visualizar &raquo;</a></p>
					   </div>
				<?php }}?>
			</div>
		</div>
		<div class="container-fluid">
			<div class="container sombra centro center">
				<p class="titulo">OLÁ! SEJAM MUITO BEM VINDOS. <span>BRASIL SERVERS GAMES</span><br/>
											A COMUNIDADE DE JOGOS QUE MAIS CRESCE NO BRASIL!</p>
				<div class="divcent">
				<div class="servers floatme">
									<div class="col-xs-6 col-sm-3 c">
									<img src="img/ser1.png" alt="" width="60px"/>
									<ul>
										<li> RPG: <?php echo $ipv['sa_rpg']; ?></li>
										<li> TDM: <?php echo $ipv['sa_tdm']; ?></li>
									</ul>
									</div>
									<div class="col-xs-6 col-sm-3">
									<img src="img/ser2.png" alt="" width="60px"/>
									<ul>
										<li> TS3: <?php echo $ipv['ts3']; ?></li>
									</ul>
									</div>
									<div class="col-xs-6 col-sm-3">
									<img src="img/ser3.png" alt="" width="60px"/>
									<ul>
										<li> BSCraft: <?php echo $ipv['minecraft']; ?></li>
									</ul>
									</div>
									<div class="col-xs-6 col-sm-3">
									<img src="img/ser4.png" alt="" width="60px"/>
									<ul>
										<li> MTA DayZ: <?php echo $ipv['mta_dayz']; ?></li>
										<li> MTA Tactics : <?php echo $ipv['mta_tactics']; ?></li>
										<li> MTA RPG : <?php echo $ipv['mta_rpg']; ?></li>
									</ul>
									</div>
								</div>
					<div class="container">
						<div class="">
							<div>
								<div class="circulo est1 ">
									<span>
									<img src="img/icon1.png" alt="" />
									<h5>Opine</h5>
									<p>Sua opnião conta, e muito! Sempre opnie para fazer do nosso servidor sua cara!                   </p>
									</span>
								</div>
							</div>
							<div>
								<div class="circulo est2">
									<span>
									<img src="img/icon2.png" alt="" />
									<h5>Divirta-se</h5>
									<p>Sua diversão é a nossa maior realização!</p>
									</span>
								</div>
							</div>
							<div>
								<div class="circulo est1">
									<span>
									<img src="img/icon3.png" alt="" />
									<h5>Somos Incriveis</h5>
									<p>Garantia total de diversao e entretenimento.</p>
									</span>
								</div>
							</div>
							<div>
								<div class="circulo est2">
									<span>
									<img src="img/icon4.png" alt="" />
									<h5>Somos Diferentes</h5>
									<p>Sempre inovando para a felicidade da galera!</p>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="">
					<div class="headertop"><i class="glyphicon glyphicon-picture"></i><span> Videos <a href="videos.php" style="color:#333; text-decoration:none;"> Ver Todos</a></span> </div>
					<?php 			
														
									$vid = mysqli_query($con, "SELECT * FROM videos ORDER BY data DESC LIMIT 1");
									$videos = mysqli_num_rows($vid);
									if($videos <= 0) {
										echo '<h4>Nada encontrado...</h4>';
									} else {
										while($vi = mysqli_fetch_array($vid)) {
											
											
									
								?>
                        			<div class="embed-responsive embed-responsive-16by9">
										<iframe class="embed-responsive-item" src="//www.youtube.com/embed/<?php echo $vi['link'];?>" frameborder="0" allowfullscreen></iframe>
									</div><br/>
						<?php }} ?>
					</div>
					<div class="headertop"><i class="glyphicon glyphicon-picture"></i><span> Ultimas Fotos <a href="fotos.php" style="color:#333; text-decoration:none;"> Ver Todas</a></span> </div>
					<div>
					 <?php include("random.php");?>
					</div>
					<!--<div class="col-xs-6">
					A
					</div>
					<div class="col-xs-6">
					A
					</div>-->
				</div>
			</div>
		</div>
		</div>
		<div class="container credger">
			<div class="creditos">
			<div class="headercred"><span>Todos Direitos Reservados. Brasil Servers Games &copy; 2015.<small>Desenvolvido por jorgehenrique@live.com</small></span></div>
		</div>
	</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/modernizr.custom.79639.js"></script>
		<script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.carousel').carousel({
            interval: 3000,
            cycle: true
        });
    });
</script>
</html>
