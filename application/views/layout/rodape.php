<footer class="footer">
	<div class="row rodape">
		<blockquote>
			<p>Instituto Federal de Educação, Ciência e Tecnologia - Campus Campos do Jordão</p>
			<footer>Powered by <cite title="Source Title">Sheep Systems</cite></footer>
		</blockquote>
	</div>
</footer>
</body>

<script type="text/javascript">
	$(document).ready(function() {
		$('.menu').scrollToFixed({
			preFixed: function() { 
				$(this).children().removeClass().addClass('col-xs-12 col-sm-12 col-md-12 col-lg-12');
				$(this).find('button').removeClass('btn-lg').addClass('btn-sm');
			},
			postFixed: function() { $(this).children().removeClass().addClass('col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2');
			$(this).find('button').removeClass('btn-sm').addClass('btn-lg');
		}
	});
	});
</script>

<script type="text/javascript">
	$("[data-toggle=popover-login]").popover({
		html: true, 
		content: function() {
			return $('#popover-login').html();
		}
	});

	$("[data-toggle=popover-cadastro-aluno]").popover({
		html: true, 
		content: function() {
			return $('#popover-cadastro-aluno').html();
		}
	});
</script>

<script type="text/javascript">
	function esconderValor(){
		if(document.getElementById('remunerado').checked){
			document.getElementById('valorRemunerado').disabled = false;
		}else{
			document.getElementById('valorRemunerado').disabled = true;
		}
	}
</script>




</html>