<?php
session_start();
include("../config.php");
include("../funcoes.php");
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
date_default_timezone_set('America/Sao_Paulo');
protegepagina();
?>
<?php    
	$nome = $_SESSION['logado'];

	$pnome = mysqli_query($mysqli, "SELECT email, profile, CONCAT(first_name,' ',last_name) AS completo FROM users WHERE username LIKE '{$nome}'");
	$dados = mysqli_fetch_array($pnome);
	
	$dip = mysqli_query($mysqli, "SELECT * FROM ips");
	$ipv = mysqli_fetch_array($dip);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BSGames | Painel</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <link href="css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
		<link href="../../css/estilo.css" rel="stylesheet" type="text/css" />
		<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8">
		<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		
		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="//cdn.ckeditor.com/4.4.1/full/ckeditor.js"></script>
		<script src="ckeditor/ckeditor.js"></script>
		<script src="ckeditor/adapters/jquery.js"></script>
		
		<script>
			CKEDITOR.disableAutoInline = true;

			$( document ).ready( function() {
				$( '#texto' ).ckeditor(); 
			} );

			function setValue() {
				$( '#texto' ).val( $( 'input#val' ).val() );
			}

		</script>
</head>
<body class="wysihtml5-supported  pace-done fixed skin-black">
<script language="JavaScript">
<!--
function autoResize(id){
    var newheight;
    var newwidth;

    if(document.getElementById){
        newheight=document.getElementById(id).contentWindow.document .body.scrollHeight;
        newwidth=document.getElementById(id).contentWindow.document .body.scrollWidth;
    }

    document.getElementById(id).height= (newheight) + "px";
    document.getElementById(id).width= (newwidth) + "px";
}
//-->
</script>
        <header class="header">
            <a href="index.php" class="logo">
                BSGames
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>

							<span><?php echo $dados['completo']?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header bg-light-blue">
                                    <img src="profile/<?php echo $dados['profile'];?>" alt="User image" class="img-circle">
                                    <p>
                                        <span><?php echo $dados['completo']; ?></span>
                                        <small><span><?php echo $dados['email']?></span></small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href='?acao=true' class="btn btn-default btn-flat">Deslogar</a>
                                    </div>
														<?php
														if(isset($_GET['acao']) && $_GET['acao'] == 'true'){
															session_unset();
															echo "<script>location.href='../index.php'</script>";
														}
														?>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <aside class="left-side sidebar-offcanvas">
                <section class="sidebar">
                    <div class="user-panel">
                        <div class="pull-left image">
							<img src="profile/<?php echo $dados['profile'];?>" alt="User image" class="img-circle">
                        </div>
                        <div class="pull-left info">
                            <p>Olá, <?php echo $_SESSION['logado']; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <ul class="sidebar-menu">
                        <li>
                            <a href="index.php">
                                <i class="fa fa-home"></i> <span>Home</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="membros.php">
                                <i class="fa fa-users"></i> 
								<span>Membros</span> 
								<i class="fa fa-angle-left pull-right"></i>
                            </a>
                        </li>
						<li class="treeview">
                            <a href="noticias.php">
                                <i class="fa fa-picture-o"></i> <span>Galeria</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="addfoto.php"><i class="fa fa-angle-double-right"></i> Fotos</a></li>
                                <li><a href="addvideo.php"><i class="fa fa-angle-double-right"></i> Videos</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="registro.php">
                                <i class="fa fa-folder-open"></i> 
								<span>Registrar</span> 
								<i class="fa fa-angle-left pull-right"></i>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="noticias.php">
                                <i class="fa fa-edit"></i> <span>Noticias</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="addnoticia.php"><i class="fa fa-angle-double-right"></i> Adicionar</a></li>
                                <li><a href="editar.php"><i class="fa fa-angle-double-right"></i> Editar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="avisos.php">
                                <i class="fa fa-exclamation-triangle"></i> <span>Avisos</span>
                            </a>
                        </li>
						<li class="active">
                            <a href="ips.php">
                                <i class="glyphicon glyphicon-info-sign"></i> <span>IPS</span>
                            </a>
                        </li>
                        <li class="disabled">
                            <a>
                                <i class="fa fa-envelope"></i> <span>Email</span>
                                <small class="badge pull-right bg-red">Manutenção</small>
                            </a>
                        </li>
                        <li>
                            <a href="?acao=true">
                                <i class="fa fa-power-off"></i> <span>Sair</span>
                            </a>
                        </li>
                    </ul>
                </section>
            </aside>
            <aside class="right-side">
                <section class="content-header">
                    <h1>
                        <small>Notificações</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    </ol>
                </section>
                <section class="content">
				<section class="connectedSortable">     
								<div class="servers">
									<div class="col-xs-6 col-sm-3 c">
									<img src="../../img/ser1.png" alt="" width="60px"/>
									<ul>
										<li> RPG: <?php echo $ipv['sa_rpg']; ?></li>
										<li> TDM: <?php echo $ipv['sa_tdm']; ?></li>
									</ul>
									</div>
									<div class="col-xs-6 col-sm-3">
									<img src="../../img/ser2.png" alt="" width="60px"/>
									<ul>
										<li> TS3: <?php echo $ipv['ts3']; ?></li>
									</ul>
									</div>
									<div class="col-xs-6 col-sm-3">
									<img src="../../img/ser3.png" alt="" width="60px"/>
									<ul>
										<li> BSCraft: <?php echo $ipv['minecraft']; ?></li>
									</ul>
									</div>
									<div class="col-xs-6 col-sm-3">
									<img src="../../img/ser4.png" alt="" width="60px"/>
									<ul>
										<li> MTA DayZ: <?php echo $ipv['mta_dayz']; ?></li>
										<li> MTA Tactics : <?php echo $ipv['mta_tactics']; ?></li>
										<li> MTA RPG : <?php echo $ipv['mta_rpg']; ?></li>
									</ul>
									</div>
								</div>				
								<div class="center" style="width:200">
									<form action="" method="post" enctype="multipart/form-data">
									<div class="icoe">RPG</div>
									<div class="input-group">
										<div class="input-group-addon"><div class="iconsa"></div></div><input class="form-control" name="sa_rpg" value="<?php echo $ipv['sa_rpg']; ?>" placeholder="RPG" autocomplete="off" required autofocus/>
                                    </div><br/>
									<div class="icoe">TDM</div>
									<div class="input-group">
										<div class="input-group-addon"><div class="iconsa"></div></div><input class="form-control" name="sa_tdm" value="<?php echo $ipv['sa_tdm']; ?>" placeholder="TDM" required/>
									</div><br/>
									<div class="icoe">TS3</div>
									<div class="input-group">
										<div class="input-group-addon"><div class="iconts3"></div></div><input class="form-control" name="ts3" value="<?php echo $ipv['ts3']; ?>" placeholder="TS3" required/>
									</div><br/>
									<div class="icoe">Minecraft</div>
									<div class="input-group">
										<div class="input-group-addon"><div class="iconmine"></div></div><input class="form-control" name="minecraft" value="<?php echo $ipv['minecraft']; ?>" placeholder="MINECRAFT" required/>
									</div><br/>
									<div class="icoe">DayZ</div>
									<div class="input-group">
										<div class="input-group-addon"><div class="iconmta"></div></div><input class="form-control" name="mta_dayz" value="<?php echo $ipv['mta_dayz']; ?>" placeholder="MTA DAYZ" required/>
									</div><br/>
									<div class="icoe">Tactics</div>
									<div class="input-group">
										<div class="input-group-addon"><div class="iconmta"></div></div><input class="form-control" name="mta_tactics" value="<?php echo $ipv['mta_tactics']; ?>" placeholder="MTA TACTICS" required/>
									</div><br/>
									<div class="icoe">RPG</div>
									<div class="input-group">
										<div class="input-group-addon"><div class="iconmta"></div></div><input class="form-control" name="mta_rpg" value="<?php echo $ipv['mta_rpg']; ?>" placeholder="MTA RPG" required/>
									</div><br/>
										<div>
                                            <input type="submit" name="submit" value="Alterar" class="btn btn-success">
                                        </div>
									</form>
                                </div>
							<?php
							 
									require_once("../config.php");
									if ($mysqli->connect_errno) {
										echo "<p>Erro no banco de dados {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
										exit();
									}
									
									if(isset($_POST['submit'])){
										$sa_rpg = $_POST['sa_rpg'];
										$sa_tdm = $_POST['sa_tdm'];
										$ts3 = $_POST['ts3'];
										$minecraft = $_POST['minecraft'];
										$mta_dayz = $_POST['mta_dayz'];
										$mta_tactics = $_POST['mta_tactics'];
										$mta_rpg = $_POST['mta_rpg'];
										$stringql = "UPDATE ips SET sa_rpg='$sa_rpg', 
																	sa_tdm='$sa_tdm', 
																	ts3='$ts3', 
																	minecraft='$minecraft',
																	mta_dayz='$mta_dayz', 
																	mta_tactics='$mta_tactics', 
																	mta_rpg='$mta_rpg'"; //String com consulta SQL da inserção
										
										if ($con->query($stringql)) {
												echo "<script>alert('IP Alterado'); location.href='ips.php';</script>";
											} else {
												echo "<p>Problemas com o servidor {$mysqli->errno} : {$mysqli->error}</p>";
												exit();
											}
										echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=ips.php'>";
										
									}
							?>	
                
				</section>
				</section> </aside>
				</div>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>
    </body>
</html>