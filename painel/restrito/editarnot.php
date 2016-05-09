<?php
session_start();
include("../config.php");
include("../funcoes.php");
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
protegepagina();
date_default_timezone_set('America/Sao_Paulo');
$nome = $_SESSION['logado']
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

							<span><?php echo $dados['completo']; ?><i class="caret"></i></span>
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
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Editar Noticia</li>
                    </ol>
                </section>
                <section class="content">
				<section id="tudonoticia">
			<?php
				if(isset($_GET['id'])) {
					$id = $_GET['id'];
				}
				$sql = mysqli_query($con, "SELECT * FROM news where id = '$id'");
				$conta = mysqli_num_rows($sql);
				if($conta <= 0) {
					echo '<h2>Nada encontrado...</h2>';
				} else {
					while($res = mysqli_fetch_array($sql)) {
			?>
			<div class="container-fluid">
				<div class="center">
					<a href="ex-not.php?id=<?php echo $res['id'];?>" class="excl btn-sm" data-dismiss="alert" aria-hidden="true"><i class="fa fa-trash-o"></i>  Excluir Noticia</a>
				</div>
			</div>
				<img alt="" src="imagens/<?php echo $res['imagem']; ?>" height="350px" width="100%">
			</section>
				<section id="noticia">
					<form action=" " method="post" enctype="multipart/form-data">
						<label>Titulo:</label><br/> 
							<div class="input-group">
								<span class="input-group-addon"><i class="fa  fa-tag"></i></span>
								<input type="text" class="form-control" name="titulo" value="<?php echo $res['titulo']; ?>"maxlength="200" required/><br />
							</div>
						<label>Autor:</label><br/><div class="input-group"><span class="input-group-addon"><i class="fa  fa-group"></i></span><input class="form-control" type="text" name="autor" value = "<?php echo $res['autor']; ?>"/><br/></div>
					   
						<label>Imagem:</label><br/><input type="file" name="arquivo" value="" required /><?php echo "<h4 class=\"help-block\">".$res['imagem']."</h4>"; ?><br/><br/>

						<label>Resumo:</label><br/>
						<textarea class="textarea" id="resumo" name="resumo" maxlength="600" placeholder="Resumo" style="resize: none; width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #CCC; padding: 10px;" required><?php echo $res['resumo']; ?></textarea></br>
						<label>Noticia:</label> <br/> 
						<textarea cols="80" id="texto" name="texto" rows="10" required><?php echo $res['texto']; ?></textarea><br/>
					  <br/>
						<input style="width:100%" class="btn bg-maroon btn-sm" type="submit" name="noticia" value="Postar" />
					</form>
				</section>
				<?php }} ?>
								<?php
								require_once("../config.php");
								if ($mysqli->connect_errno) {
									echo "<p>Erro no banco de dados {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
									exit();
								}
								
								if(isset($_POST['noticia'])){
									$titulo    = $_POST['titulo'];
									$texto   = $_POST['texto'];
									$autor = $_POST["autor"];
									$resumo = $_POST["resumo"];
									$_UP['pasta'] = 'imagens/';

									$_UP['tamanho'] = 1024 * 1024 * 2; 

									$_UP['extensoes'] = array('jpg', 'png', 'gif');
									$_UP['renomeia'] = true;

									$_UP['erros'][0] = 'Não houve erro';
									$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
									$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
									$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
									$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

										if ($_FILES['arquivo']['error'] != 0) {
											die("Não foi possível fazer o upload, erro:<br />" . [$_FILES['arquivo']['error']]);
											exit; 
										}
										$extensao = explode('.', $_FILES['arquivo']['name']);
										$file_extension = end($extensao);
										if (array_search($file_extension, $_UP['extensoes']) === false) {
											echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
										}
										else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
											echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
										}
										else {
											if ($_UP['renomeia'] == true) {
												$nome_final = time().'.jpg';
											} else {
												$nome_final = $_FILES['arquivo']['name'];
											}
											if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
												$sql = "UPDATE news SET titulo = '$titulo', 
																		texto = '$texto', 
																		autor = '$autor', 
																		resumo = '$resumo', 
																		imagem = '$nome_final'
														WHERE id = $id";
										 
												if ($mysqli->query($sql)) {
													echo "<script>alert('Noticia alterada com sucesso'); location.href='editar.php';</script>";
												} else {
													echo "<p>Problemas com o servidor {$mysqli->errno} : {$mysqli->error}</p>";
													exit();
												}
											} else {
												 echo "Não foi possível enviar o arquivo, tente novamente";
											}
										}
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