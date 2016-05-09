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
                        <li class="active">
                            <a href="index.php">
                                <i class="fa fa-home"></i> <span>Home</span>
                                <i class="fa fa-angle-right pull-right"></i>
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
                    </ol>
                </section>
                    <div class="container-fluid">
                        <div class="center col-xs-12 col-md-8">
									<?php 			
														
									$aviso = mysqli_query($con, "SELECT * FROM avisos ORDER BY id DESC LIMIT 3");
									$conta = mysqli_num_rows($aviso);
									if($conta <= 0) {
										echo '<h4>Nada encontrado...</h4>';
									} else {
										while($res = mysqli_fetch_array($aviso)) {
											switch ($res['categ']) {
											case 0:
												echo "<div class=\"alert alert-info alert-dismissable\"><i class=\"fa fa-info\"></i>
												<h4>".$res['titulo']."</h4><p>".$res['texto']."</p></div>";
												break;
											case 1:
												echo "<div class=\"alert alert-warning alert-dismissable\">
													  <i class=\"fa fa-warning\"></i>
												<h4>".$res['titulo']."</h4><p>".$res['texto']."</p></div>";
												break;
											case 2:
												echo "<div class=\"callout callout-danger\">
												<h4>".$res['titulo']."</h4><p>".$res['texto']."</p></div>";
												break;	
											}
									}} ?>

                        </div>
                    </div>
				<section class="content-header">
                    <h1>
                        <small>Geral</small>
                    </h1>
                </section>
                <section class="content">
				<section class="connectedSortable">                            
							<div class="box box-success">
                                <div class="box-header">
                                    <i class="fa fa-comments-o"></i>
                                    <h3 class="box-title">Chat</h3>
                                </div>
                                <div class="box-body chat" id="chat-box Layer1" style="width:100%; height:300px; z-index:1; overflow: auto">
								
								<?php 			
														
									$chat = mysqli_query($con, "SELECT * FROM chat ORDER BY id DESC");
									$conta = mysqli_num_rows($chat);
									if($conta <= 0) {
										echo '<h4>Nada encontrado...</h4>';
									} else {
										while($res = mysqli_fetch_array($chat)) {
								?>
									<div class="item">
									    <img src="profile/<?php echo $res['foto']; ?>" alt="user image" class="online">
                                        <p class="message">
                                            <a href="#" class="name">
                                                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> <?php echo $res['data']; ?></small>
                                                <?php echo $res['nome']; ?>
                                            </a>
                                            <span><?php echo $res['msg']; ?></span>
                                        </p>
                                    </div>
									<?php }} ?>

                                </div>
                                <div class="box-footer">
									<form action="" method="post" enctype="multipart/form-data">
									<div class="input-group">
                                        <input class="form-control" name="msg" placeholder="Escreva a mensagem" autocomplete="off" required autofocus/>
                                        <div class="input-group-btn">
                                            <input type="submit" name="submit" class="btn btn-success">
                                        </div>
									</div>
									</form>
                                </div>
                            </div>
							
							<?php
							 
									require_once("../config.php");
									if ($mysqli->connect_errno) {
										echo "<p>Erro no banco de dados {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
										exit();
									}
									
									if(isset($_POST['submit'])){
										$msg = $_POST['msg'];
										$nome1 = $dados['completo'];
										$foto = $dados['profile'];
										$string_sql = "INSERT INTO chat (id,nome,msg,foto) VALUES (null,'$nome1','$msg','$foto')"; //String com consulta SQL da inserção
										$result = $mysqli->query($string_sql);
										echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=index.php'>";
										
									}
							?>	
                            <div class="box box-primary">
                                <div class="box-header">
                                    <i class="ion ion-clipboard"></i>
                                    <h3 class="box-title">Contatos</h3>
                                </div>
                                <div class="box-body">
                                    <ul class="todo-list">
									<?php
									$contato = mysqli_query($con, "SELECT * FROM contato ORDER BY data DESC");
									$contnum = mysqli_num_rows($contato);
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
									if($contnum <= 0) {
										echo '<h4>Nenhum contato feito...</h4>';
									} else {
										while($cont = mysqli_fetch_array($contato)) {
											
									?>
                                        <li>
										<a href="msgcontato.php?id=<?php echo $cont['id'];?>" style="text-decoration:none; color:#333; ">
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
                                            <span class="text"><?php echo $cont['assunto'];?></span>
                                            <small class="label label-danger" style="float:right;"><i class="fa fa-clock-o"></i> <?php echo date('d', strtotime($cont['data'])). "/" .date('m', strtotime($cont['data'])); ?></small>
										</a>
                                        </li>
									
									<?php }}?>
                                    </ul>
                                </div>

                            </div>
                            <div class="box box-info disabled">
                                <div class="box-header">
                                    <i class="fa fa-envelope"></i>
                                    <h3 class="box-title">Email</h3>
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <form action="#" method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="emailto" placeholder="Email to:"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="subject" placeholder="Subject"/>
                                        </div>
                                        <div>
                                            <textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="box-footer clearfix">
                                    <button class="pull-right btn btn-default" id="sendEmail">Enviar <i class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>

                        </section>
					
</section> </aside>
        </div>
			</div>
		</div>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>

    </body>
</html>