<?php 
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BSGAMES | Painel</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		       <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>	
       <script src="../js/ie-emulation-modes-warning.js"></script>
	   <link href="../css/estilo.css" rel="stylesheet" type="text/css"/>
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
	<div class="backgroundlogin"></div>
        <div class="form-box geral" id="login-box">
            <div class="header bg-azul">BSGames</div>
			<fieldset>
             <form action=" " method="post">
                <div class="body" style="background:#EDEDED">
                    <div class="form-group">
                       <input class="form-control" type="text" name="username" placeholder="Login" required autofocus/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Senha" required/>
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Lembrar-me
                    </div>
                </div>
                <div class="footer">                                                               
					<input class="btn bg-azul bg-olive btn-block" type="submit" name="submit" value="Entrar" />
                    
                    <p style="text-align:center;">Este site é de acesso restrito |<a href="#"> Acesse nosso site</a></p>
                </div>
            </form>
			</fieldset>
            <div class="margin text-center">
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>
            </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
<?php
// establishing the MySQLi connection
 
        require_once("config.php");
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        #CONEXAO
        if ($mysqli->connect_errno) {
            echo "<p>Erro no banco de dados {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
            exit();
        }
		
		if(isset($_POST['submit'])){
			$username = $_POST['username'];
			$password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username LIKE '{$username}' AND password LIKE '{$password}' LIMIT 1";
        $result = $mysqli->query($sql);
        if (!$result->num_rows == 1) {
            echo "<script>alert('Usuário invalido'); location.href='index.php';</script>";
        }else{		
            $_SESSION['logado'] = $_POST['username'];// Session para proteger pagina 
			$valores = mysqli_fetch_assoc($result);
			$_SESSION['cargo'] = $valores['cargo'];
			echo "<script>location.href='restrito/index.php'</script>";
        }
}
?>	
    </body>
</html>