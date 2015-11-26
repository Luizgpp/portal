
<div class="row menu" >
	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
		<div class="btn-group  btn-group-justified" role="group" aria-label="...">
			<div class="btn-group" role="group">
				<button type="button" class="btn btn-success btn-lg">É Empresa? <p>Cadastre-se</p></button>
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
					<h3><?php echo $vaga['titulo'] ?></h3>
					<spam><?php echo $vaga['nome'] ?> - <?php echo $vaga['sigla'] ?></spam>
				</div>
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
						<h3><?php echo $vaga['titulo'] ?></h3>
						<spam><?php echo $vaga['nome'] ?> - <?php echo $vaga['sigla'] ?></spam>
					</div>
					<spam class="num-vagas"><?php echo $vaga['numero_vagas']; ?></spam>
				</div>
				<?php }$i++;}?>

			</div>
			<!-- fim coluna vagas 2 -->
		</div>
	</div>
