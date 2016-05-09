<?php  
	require "../config.php";
	require "../funcoes.php";
	if(isset($_GET['id'])) {
		$id = (int) $_GET['id'];
	}
	$sql = "select * from contato where id = $id";
	$query = mysqli_query($con, $sql);
	$res = mysqli_fetch_assoc($query);
	if($query->num_rows > 0) {
		$sql = "delete from contato where id = $id";
		$query = mysqli_query($con, $sql);
		if(!$query) {
			echo mysqli_error($con);
		} else {
			echo "<script>alert('Contato deletado com sucesso');</script>";
			echo "<script>window.location = 'index.php';</script>";
		}
	} else {
		echo "Esse registro não existe";
	}
?>