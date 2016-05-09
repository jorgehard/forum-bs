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

	$pnome = mysqli_query($mysqli, "SELECT profile, CONCAT(first_name,' ',last_name) AS completo FROM users WHERE username LIKE '{$nome}'");
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
                       <!--
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <ul class="menu">
                                        <li
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="img/avatar5.png" class="img-circle" alt="User Image"/>
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="img/avatar5.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    AdminLTE Design Team
                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="img/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Developers
                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="img/avatar5.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Sales Department
                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="img/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Reviewers
                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <!--
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                  
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-people info"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning danger"></i> Very long description here that may not fit into the page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users warning"></i> 5 new members joined
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-cart success"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-person danger"></i> You changed your logado
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-tasks"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                    
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li><-
                                            <a href="#">
                                                <h3>
                                                    Create a nice theme
                                                    <small class="pull-right">40%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li><!-- Task item --
                                            <a href="#">
                                                <h3>
                                                    Some task I need to do
                                                    <small class="pull-right">60%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">60% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item --
                                        <li><!-- Task item --
                                            <a href="#">
                                                <h3>
                                                    Make beautiful transitions
                                                    <small class="pull-right">80%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">80% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item --
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>

							<span><?php echo $dados['completo']?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header bg-light-blue">
                                    <img src="img/avatar5.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <span><?php echo $dados['completo']; ?></span>
                                        <small><span><?php echo "Arrumar Depois"?></span></small>
                                    </p>
                                </li>
                                <!-- Menu Body --
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
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
                            <img src="img/avatar5.png" class="img-circle" alt="User Image" />
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
								<span>Membros</span> <!--<small class="badge pull-right bg-green">new</small>-->
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
                        <li class="active">
                            <a href="registro.php">
                                <i class="fa fa-folder-open"></i> 
								<span>Registrar</span> <!--<small class="badge pull-right bg-green">new</small>-->
								<i class="fa fa-angle-right pull-right"></i>
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
                <section class="content">
				<section class="connectedSortable">   			
				<div class="form-box geral" id="login-box" style="margin-top:-40px;">
				<?php if($_SESSION['cargo']){ ?>	
					<div class="header bg-azul">Registro | BSGames</div>
					<fieldset>
						 <form action="" method="post" enctype="multipart/form-data">
							<div class="body" style="background:#EDEDED">
								<div class="form-group">
									<input class="form-control" type="text" name="username" placeholder="Login" autocomplete="off" required autofocus/>
								</div>
								<div class="form-group">
									<input class="form-control" type="password" name="password" placeholder="Senha" required/>
								</div>          
								<div class="form-group">
									<input class="form-control" type="text" name="first_name" autocomplete="off" placeholder="Primeiro Nome" required/>
								</div>   
								<div class="form-group">
									<input class="form-control" type="text" name="last_name" autocomplete="off" placeholder="Ultimo Nome" required/>
								</div>
								<div class="form-group">
									<input class="form-control" type="text" name="email" autocomplete="off" placeholder="E-mail" required/>
								</div> 
								<div class="form-group">
									<select name="cargo">
										<option value="0">Moderador</option>
										<option value="1">Administrador</option>
									</select>
								</div>
								<div class="form-group">
									<input type="file" name="arquivo" required/><br/>
								</div> 
							</div>
							<div class="footer">                                                               
								<input class="btn bg-azul bg-olive btn-block" type="submit" name="submit" value="Cadastrar" />
							</div>
						</form>
					</fieldset>
				<?php }else{
					echo "<div class=\"callout callout-danger\">
                                <h3>Registro de Administradores!</h3>
                                <p>Você não tem permissão para criar novos usuarios, somente administradores gerais podem fazer isso!!!</p>
							</div>";
				}
				?>
				</div> 
	  <?php
		require_once("../config.php");
		if ($con->connect_errno) {
			echo "<p>Erro no banco de dados {$con->connect_errno} : {$con->connect_error}</p>";
			exit();
		}
		
		if(isset($_POST['submit'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$firstname = $_POST['first_name'];
			$lastname = $_POST['last_name'];	
			$email = $_POST['email']; 

			$up['pasta'] = 'profile/'; 
			$up['tamanho'] = 1024 * 1024 * 2; 
			$up['extensoes'] = array('jpg', 'png', 'gif'); 
			$up['renomeia'] = true; 

			$extensao = explode('.', $_FILES['arquivo']['name']); 
			$file_extension = end($extensao);
			if (array_search($file_extension, $up['extensoes']) === false) {
				echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
			}
			else if ($up['tamanho'] < $_FILES['arquivo']['size']) {
				echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb."; 
			} else {
				if ($up['renomeia'] == true) { 
					$nome_final = time().'.jpg';
				} else {
					$nome_final = $_FILES['arquivo']['name'];
				}
				if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $up['pasta'] . $nome_final)) {
					$exists = 0;
					$result = $con->query("SELECT username FROM users WHERE username = '{$username}' LIMIT 1");
					if ($result->num_rows == 1) {
						$exists = 1;
					} 
					if ($exists == 1) {
						echo "<script>alert('USUARIO JA EXISTE'); location.href='register.php';</script>"; 
					} else {
						$sql = "INSERT  INTO `users` (id, username, password, first_name, last_name, email, profile) 
								VALUES ('', '$username', '$password', '$firstname', '$lastname', '$email', '$nome_final')";
				 
						if ($con->query($sql)) {
							echo "<script>alert('Registrado com sucesso'); location.href='registro.php';</script>";
						} else {
							echo "<p>Problemas com o servidor {$con->errno} : {$con->error}</p>";
							exit();
						}
					}		
				}		
			}	
		}
?>
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