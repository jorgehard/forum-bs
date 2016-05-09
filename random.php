<html>
<body>
								<?php 			
														
									$img = mysqli_query($con, "SELECT * FROM img ORDER BY data DESC LIMIT 5");
									$galeria = mysqli_num_rows($img);
									if($galeria <= 0) {
										echo '<h4>Nada encontrado...</h4>';
									} else {
										while($res = mysqli_fetch_array($img)) {
								?>
									<?php echo "<a href = 'painel/restrito/galeria/".$res['image']."'>"?>
									<section id="section1" class="container"/>
										<figure class="legenda-imagem">
										<img class="" style="width:180px; height:120px;"src="painel/restrito/galeria/<?php echo $res['image']; ?>" alt=""/>
										<figcaption><span><?php echo $res['nome']; ?></span><br/><span><?php echo $res['data']; ?></span></figcaption>
										</figure>
									</section>
									</a>
									<?php }} ?>
	</body>
</html>