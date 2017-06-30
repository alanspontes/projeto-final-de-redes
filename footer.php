</main>
		<footer>
			<div align="center" class="logo-rodape logo wow bounceInUp" data-wow-duration="1s" data-wow-delay="3s">
				<a href="index.html">
					<img src="images/logo-rodape.png" alt="Logo Rodape">
				</a>
				<br><br><p>2017 <i class="fa fa-copyright"></i> Todos os Direitos Reservados</p>
			</div>

		</footer>
	</div>
	
	<script src="bower_components/jquery/dist/jquery.min.js"></script>
	<script src="bower_components/wow/dist/wow.min.js"></script>
	<script>
		$(function(){

			$('.toggle').click(function(){
				$('.menu-responsivo').toggleClass('ativo');
				$(this).toggleClass('ativo');
			});
			new WOW().init();
		});
	</script>
</body>
</html>