<html>
	<body>
		<?php
			if(isset($_GET['id'])) {
	     		$pg = $_GET['id'];
	     	}
	     	if(isset($_GET['pg'])) {
	     		$pg = $_GET['pg'];
	     	} else {
	     		$pg = 1;
	     	}
	     	$quantidade = 9;
			
	     	$inicio = ($pg * $quantidade) - $quantidade;
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
	        $sql = mysqli_query($con, "SELECT * FROM news ORDER by data DESC LIMIT $inicio, $quantidade");
	        $conta = mysqli_num_rows($sql);
	        if($conta <= 0) {
	        	echo '<h2>Nada encontrado...</h2>';
	        } else {
	        	while($res = mysqli_fetch_array($sql)) {
	    ?>
			<?php echo "<a href = 'noticia.php?id=".$res['id']."'>"?>
			<section class="container conteudonoticia" style="width:auto">
			    <div class=" conteudo1 blog-post">
					<img style="float:left;"src="painel/restrito/imagens/<?php echo $res['imagem']; ?>" width="100%" height="100%" alt=""/>
				</div>
				<div class="blog-post">
					<span><?php echo $res['titulo']; ?></span>
					<h5 class="blog-post-title"><img src="img/user.svg" alt="User" class="icone"> <?php echo $res['autor']. ' &nbsp;&nbsp;&nbsp;<img src="img/hora.svg" alt="Data" class="icone">  ' . date('d', strtotime($res['data'])). " de " .$mes[date('m', strtotime($res['data']))]. " de ". date('Y', strtotime($res['data'])); ?></h5>
					<p class="blog-post-meta"><?php echo substr($res['resumo'], 0, 200).'...';?></p>
				</div>
			</section>
			</a>
			<?php }} ?>
	<br/>		
	<section class = "contar">

       	<?php
         $sql2 = mysqli_query($con, "SELECT * FROM news");
         $total = mysqli_num_rows($sql2);
         $paginas = ceil($total / $quantidade);
         $links = 5;
         echo "<a href = '?pg=1' ><span class = 'primeira'> Primeira </span>  </a>";
         for($i = $pg-$links; $i <= $pg-1; $i++) {
         	if($i > 0) {
         		echo "<a href = '?pg=".$i."' class='numeros'>" .$i. "</a>"."";
         	}
         }
         echo "<a href=#>$pg</a>"."";
         for($i = $pg+1; $i <= $pg+$links; $i++) {
         	if($i < $paginas) {
         		echo "<a href = '?pg=".$i."'>" .$i. "</a>"."";
         	}
         }
         echo "<a href='?pg=".$paginas."'> <span class = 'ultima'> Ultima</span></a>";
		?>
    </section>
	</body>