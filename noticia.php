<?php
include("painel/config.php");
$con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

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
	<link href='http://fonts.googleapis.com/css?family=Open+Sans|Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
 
  </head>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&appId=747715585264156&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
   	<body class="bg-geral">
		<div class="container-fluid top">
			<div class="container" style="width:800px;">
			<a href="index.php"><img src="img/logo.png" alt="" class="img-responsive" width="800px"/></a>
			</div>
		</div>
		<div class="container-fluid menu">
			<nav class="container-fluid" id="menufixo" role="navigation">
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
	<div class="container sombra" id="bg-branco" style="padding-top:20px;"> 
		<div class="container-fluid">

         <div class="col-sm-9 blog-main">

          <div class="blog-post">
			<?php
				if(isset($_GET['id'])) {
					$id = $_GET['id'];
				}
				$sql = mysqli_query($con, "SELECT * FROM news where id = '$id'");
				$conta = mysqli_num_rows($sql);
				$mes = array(
					'01' => 'Janeiro',
					'02' => 'Fevereiro',
					'03' => 'Março',
					'04' => 'Abril',
					'05' => 'Maio',
					'06' => 'Junho',
					'07' => 'Julho',
					'08' => 'Agosto',
					'09' => 'Setembro',
					'10' => 'Outubro',
					'11' => 'Novembro',
					'12' => 'Dezembro'
				);
				if($conta <= 0) {
					echo '<h2>Nada encontrado...</h2>';
				} else {
					while($res = mysqli_fetch_array($sql)) {
			?>

			<section id="paginanoticia">
				<span><?php echo $res['titulo']."</a>"; ?></span>
				<h5>Por <?php echo $res['autor']. ' - ' . date('d', strtotime($res['data'])). " de " .$mes[date('m', strtotime($res['data']))]. " de ". date('Y', strtotime($res['data'])); ?></h5>
							    <img alt="" src="painel/restrito/imagens/<?php echo $res['imagem']; ?>" height="350px" width="100%">
				<p><?php echo $res['texto'];?></p>
			</section>
			<?php }} ?>
          </div>
		  
        </div><!-- /.blog-main -->
		<div class="col-sm-3 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <div id="topolateral"> Nossos Servidores</div>
			<div class="lateral">
				<div class="col-xs-2 col-md-1"><img src="img/ser1.png" alt="" width="25px"/></div><div class="col-xs-14 col-md-10" style="margin-right:10px;"><span class="tihead">San Andreas Multiplayer</span></div>
					<ul>
						<li>» RPG: <?php echo $ipv['sa_rpg']; ?></li>
						<li>» TDM: <?php echo $ipv['sa_tdm']; ?></li>
					</ul>
				<div class="col-xs-2 col-md-1"><img src="img/ser2.png" alt="" width="25px"/></div><div class="col-xs-14 col-md-10" style="margin-right:10px;"><span class="tihead">TeamSpeak 3</span></div>
					<ul>
						<li>» TS3: <?php echo $ipv['ts3']; ?></li>
					</ul>
				<div class="col-xs-2 col-md-1"><img src="img/ser3.png" alt="" width="25px"/></div><div class="col-xs-14 col-md-10" style="margin-right:10px;"><span class="tihead">Minecraft</span></div>
					<ul>
						<li>» BSCraft: <?php echo $ipv['minecraft']; ?></li>
					</ul>
				<div class="col-xs-2 col-md-1"><img src="img/ser4.png" alt="" width="25px"/></div><div class="col-xs-14 col-md-10" style="margin-right:10px;"><span class="tihead">Multi Theft Auto</span></div>
					<ul>
						<li>» MTA DayZ: <?php echo $ipv['mta_dayz']; ?></li>
						<li>» MTA Tactics : <?php echo $ipv['mta_tactics']; ?></li>
						<li>» MTA RPG : <?php echo $ipv['mta_rpg']; ?></li>
					</ul>
					
			</div>
          </div>  
          <div class="sidebar-module">
            <div id="topolateral">Parceiros</div>
			<div class="lateral">
				<a href="https://www.facebook.com/agenciatoktok"><img src="img/parceiro1.png" class="img-responsive parceiros" alt="Parceiros"/></a>
				<a href="http://www.centralvendasbrasil.com/"><img src="img/parceiro2.png" class="img-responsive parceiros" alt="Parceiros"/></a>         
			</div>
          </div>
		  <div class="sidebar-module">
            <div class="lateral">
              <div class="fb-like-box" data-href="https://www.facebook.com/pages/AtlasWare/917232678302349" data-width="auto" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="false"></div>
            </div>
          </div>
        </div><!-- /.blog-sidebar -->
      </div><!-- /.container-fluid -->
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
</html>