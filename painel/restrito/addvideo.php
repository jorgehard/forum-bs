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
						<li>
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
                    </ol><hr/>
                </section>
                <section class="content">
				<section class="connectedSortable">                            
						<fieldset>
							 <form action="" method="post" enctype="multipart/form-data">
								<div class="body" style="background:#EDEDED">
										<div class="form-group">
											<input type="text" name="video" style="width:100%" autocomplete="off">
											<p class="help-block">Somente link do youtube<br/>Exemplo - https://www.youtube.com/watch?v=VjZ5tgjPVfU</p>
										</div>
								</div>
								<div class="footer">                                                               
									<input class="btn bg-azul bg-olive btn-block" type="submit" name="submit" value="Postar" />
								</div>
							</form>
						</fieldset>
								<?php
							 
									require_once("../config.php");
									if ($mysqli->connect_errno) {
										echo "<p>Erro no banco de dados {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
										exit();
									}
									if(isset($_POST['submit'])){
										$palavra = $_POST['video'];
										$nome1 = $dados['completo'];
										$array = explode('=',$palavra);
										if($array[0] == 'https://www.youtube.com/watch?v'){
											$final = end($array);
											$string_sql = "INSERT INTO videos (id,link,nome) VALUES (null,'$final','$nome1')"; //String com consulta SQL da inserção
											$result = $mysqli->query($string_sql);
											echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=addvideo.php'>";
										}else{
											echo "<script>alert('Link fora dos padrões'); location.href='addvideo.php';</script>";
										}
									}
							?>
						<section class="content2">
							<h1>
								<small>Videos</small><hr/>
							</h1>
						</section>
						<?php 			
														
									$vid = mysqli_query($mysqli, "SELECT * FROM videos ORDER BY data DESC LIMIT 20");
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
					</section>
						</aside>
				</div>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>

    </body>
</html>