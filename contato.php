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
	<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
  </head>
<div id="fb-root"></div>
   	<body class="bg-geral">
		<div class="container-fluid top">
			<div class="container" style="width:800px;">
			<a href="index.php"><img src="img/logo.png" alt="" class="img-responsive" width="800px"/></a>
			</div>
		</div>
		<div class="container-fluid menu">
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
    <div class="container sombra" id="bg-branco" style="padding-top:20px;"> 
<!-------------------------------------------------------------------------------------------------------------------------------------->  
      <div class="container-fluid">

         <div class="blog-main">

          <div class="blog-post">
			 <div class="box box-info">
                                <div class="box-header">
                                    <i class="fa fa-envelope"></i>
                                    <h3 class="box-title">Contato</h3>
                                </div>
                                <div class="box-body">
                                    <form action="#" method="post">
										<div class="form-group">
                                            <input type="text" class="form-control" name="cont-nome" placeholder="Nome Completo"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="cont-email" placeholder="E-mail"/>
                                        </div>
										<div class="form-group">
                                            <input type="text" class="form-control" name="cont-assunto" placeholder="Assunto"/>
                                        </div>
                                        <div>
                                            <textarea placeholder="Mensagem" name="cont-texto" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        </div>
                                </div>
                                 <div class="box-footer">
                                        <input type="submit" name="submit" value="Enviar" class="btn btn-primary"/>
                                 </div>
									</form>
                            </div>
							<?php
							 
									require_once("painel/config.php");
									if ($con->connect_errno) {
										echo "<p>Erro no banco de dados {$con->connect_errno} : {$con->connect_error}</p>";
										exit();
									}
									if(isset($_POST['submit'])){
										$nome = $_POST['cont-nome'];
										$email = $_POST['cont-email'];
										$assunto = $_POST['cont-assunto'];
										$texto = $_POST['cont-texto'];
										$string_sql = "INSERT INTO contato (id,nome,email,assunto,texto) VALUES (null,'$nome','$email','$assunto','$texto')"; //String com consulta SQL da inserção
										$query = mysqli_query($con, $string_sql);
										if(!$query) {
											echo mysqli_error($con);
										}else{
										
											echo "<div style='width:100%; height:420px; position:relative; bottom:420px; background:#fff;'><div class=\"callout callout-danger\" style='position:relative; margin:0 auto;width:400px; opacity:0.8;'>
													<h4 style='text-align:center;'>Mensagem enviada com sucesso!!! Entraremos em contato em breve <br/></h4></div></div>";
											echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=index.php'>";
										}
									}
							?>
          </div><!-- /.blog-post -->

        </div><!-- /.blog-main -->

      </div><!-- /.row -->
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