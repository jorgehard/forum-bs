<html>
<head>
    <title>Formulario Cadastro</title>
	<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8">
    <link rel = "stylesheet" href = "css/csslogin.css" type = "text/css">
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
</head>
<body>

<?php
include("../config.php");

if($result = $con->query("SELECT * FROM users"));{

		while($row = $result->fetch_object()){
		  echo "<div class=\"php\"><img src='profile/$row->profile' alt='' width='100px' height='100px'/><br/> <span>Nome:</span> $row->first_name $row->last_name <br/><span>Email:</span> $row->email <br/><br/></div>";
		}
	    
	
   }
?>
</body>
</html>