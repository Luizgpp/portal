					<?php 
					if(isset($error)){
						echo "<p class='alert alert-danger' align='center'>".$error ."</p>";
					}
					?>
<div class="row menu" >
	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
		<div class="btn-group  btn-group-justified" role="group" aria-label="...">
			<div class="btn-group" role="group">
				<button onclick="window.location='<?php echo site_URL('cadempresa'); ?>'" type="button" class="btn btn-success btn-lg">É Empresa? <p>Cadastre-se</p></button>
			</div>
			<div class="btn-group" role="group">
				<button type="button" data-toggle="popover-cadastro-aluno" data-placement="bottom" class="btn btn-success btn-lg">É Aluno? <p>Cadastre-se</p></button>
				<div id="popover-cadastro-aluno" class="hide">
					<form class="form-group" role="form">
						<div class="form-group cad-aluno">
							<p>Informe seu prontuário para receber um email de cadastro.</p>
							<input placeholder="Prontuário" class="form-control" type="text"> 
							<button type="submit" class="btn btn-primary">Cadastrar</button>                                 
						</div>
					</form>
				</div>
			</div>
			<div class="btn-group" role="group">
				<button type="button" class="btn btn-success btn-lg">Sobre o Portal <p>IFSP</p></button>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
			<?php echo form_open('Principal/pesquisa'); ?>
			<select name="cursos" id="inputCursos" class="form-control select" >
				<option value="0">Todos</option>
				<option value="1">TADS</option>
				<option value="2">INFO</option>
				<option value="3">EDIF</option>
				<option value="4">MAT</option>
				<option value="5">EVEN</option>
			</select>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">			
			<div id="busca">
				<div class="input-group">
					<input type="search" name="pesquisa" id="inputBusca" class="form-control input-lg" value="" title="">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-default btn-lg">Buscar</button>
					</span>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="row vagas-container corpo">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<?php
		$i = 0;
		foreach ($vagas as $vaga) {
			if(($i % 2) == 0){?>
			<div class="vagas">
				<div class="sigla">
					<span class="inset-text-effect"><?php echo $vaga['Sigla_Curso'] ?></span>
				</div>

				<div class="vaga-descri">
					<a href="#" idvaga ="<?php echo $vaga['id']?>" data-toggle="modal" class="modal1" data-target="#myModal">
						<h3><?php echo $vaga['titulo'] ?></h3>
						<spam><?php echo $vaga['nome'] ?> - <?php echo $vaga['sigla'] ?></spam>
					</div>
				</a>
				<spam class="num-vagas"><?php echo $vaga['numero_vagas']; ?></spam>
			</div>
			<?php }$i++;} ?>
		</div>
		<!-- fim coluna vagas 1 -->
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<?php
			$i = 0;
			foreach ($vagas as $vaga) {
				if(($i % 2) != 0){?>
				<div class="vagas">
					<div class="sigla">
						<span class="inset-text-effect"><?php echo $vaga['Sigla_Curso'] ?></span>
					</div>

					<div class="vaga-descri">

						<a href="#" idvaga ="<?php echo $vaga['id']?>" data-toggle="modal" class="modal1" id="idModal" data-target="#myModal">
							<h3><?php echo $vaga['titulo'] ?></h3>
							<spam><?php echo $vaga['nome'] ?> - <?php echo $vaga['sigla'] ?></spam>
						</div>
					</a>
					<spam class="num-vagas"><?php echo $vaga['numero_vagas']; ?></spam>
				</div>
				<?php }$i++;}?>

			</div>
			<!-- fim coluna vagas 2 -->
		</div>
	</div>

	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Vaga de Estágio</h3>
				</div>
				<div class="modal-body">
					<label for="titulo"> Titulo da Vaga: </label>
					<p id="titulo" ></p>
					<label for="cidade"> Cidade: </label>
					<p id="cidade"></p>
					<label for="estado"> Estado: </label>
					<p id="estado"></p>
					<label for="nVagas"> Numero de Vagas: </label>
					<p id="nVagas"></p>
					<label for="desc"> Descrição do estágio: </label>
					<p id="desc"></p>
					<label for="requisitos"> Requisitos: </label>
					<p id="requisitos"></p>
					<label for="remuneracao"> Valor da Remuneração: </label>
					<p id="remuneracao"> </p>
					<label for="benificios"> Beneficios: </label>
					<p id="benificios"></p>
					<label for="outrosbenificios"> Outros Beneficios: </label>
					<p id="outrosbenificios"></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					<a href="" id="link"><button type="button" class="btn btn-default">Candidatar-se</button></a>
				</div>
			</div>

		</div>
	</div>
	<script>
		$(document).ready(function(){
			$('.modal1').click(function (){
				var idvaga = $(this).attr('idvaga');
				
				$.ajax({
					url: "<?php echo base_url(); ?>Principal/modal",
					type: 'POST',
					data: {idvaga: idvaga},					
					success: function(result){
						var vaga = $.parseJSON(result);						
						
						$('.modal-body #titulo').text(vaga[0].titulo);
						$('.modal-body #nVagas').text(vaga[0].numero_vagas);
						$('.modal-body #desc').text(vaga[0].descricao);
						$('.modal-body #requisitos').text(vaga[0].requisito);
						$('.modal-body #remuneracao').text(vaga[0].valor_bolsa);
						$('.modal-body #benificios').text(vaga[0].Beneficio);
						$('.modal-body #outrosbenificios').text(vaga[0].outros_beneficios);
						$('.modal-body #cidade').text(vaga[0].nome);
						$('.modal-body #estado').text(vaga[0].sigla); 
						$('.modal-footer #link').attr('href','<?php echo site_url("Principal/candidatar");?>'+ "/" + idvaga + "/" + 3);

					},
					error: function(result){
						console.log("erro");
					}

				});
			});    
		});
</script>