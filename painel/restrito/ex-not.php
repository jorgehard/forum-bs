<?php  
	require "../config.php";
	require "../funcoes.php";
	if(isset($_GET['id'])) {
		$id = (int) $_GET['id'];
	}
	$sql = "select * from news where id = $id";
	$query = mysqli_query($con, $sql);
	$res = mysqli_fetch_assoc($query);
	if($query->num_rows > 0) {
		$sql = "DELETE FROM news WHERE id = $id";
		$query = mysqli_query($con, $sql);
		if(!$query) {
			echo mysqli_error($con);
		} else {
			echo "<script>alert('Noticia deletada com sucesso!!!');</script>";
			echo "<script>window.location = 'editar.php';</script>";
		}
	} else {
		echo "Esse registro não existe";
	}
?>