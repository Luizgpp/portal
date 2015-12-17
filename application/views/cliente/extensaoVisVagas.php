<div class="corpo">
	<div class="visualizar-vaga">
		<div class="row">
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">

				<?php foreach ($vaga as $vg) { ?>

				<div class="sigla-visualizar-vaga">
					<span class="inset-text-effect"><?php echo $vg->sigla_curso; ?></span>
				</div>
				
				<h1><?php echo $vg->titulo; ?></h1>
				<div class="row visualizar-vaga-corpo">
					<form action="" method="POST" class="form-horizontal" role="form">
						<div class="form-group">
							<label for="inputCurso" class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label">Curso</label>
							<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
								<select name="vagas" id="inputCurso" class="col-xs-3 col-sm-3 col-md-3 col-lg-3 form-control" required="required" disabled>
									<option value=""><?php echo $vg->sigla_curso; ?></option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputVagas" class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label">Número de Vagas</label>
							<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
								<select name="vagas" id="inputVagas" class="col-xs-3 col-sm-3 col-md-3 col-lg-3 form-control" required="required" disabled>
									<option value=""><?php echo $vg->numero_vagas; ?></option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="textareaDescricao" class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label">Descrição</label>
							<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
								<textarea name="descricao" id="textareaDescricao" class="form-control" rows="4" required="required" disabled><?php echo $vg->descricao; ?></textarea>
							</div>
						</div>	

						<div class="form-group">
							<label for="textareaDescricao" class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label">Requisitos</label>
							<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
								<textarea name="descricao" id="textareaDescricao" class="form-control" rows="4" required="required" disabled><?php echo $vg->requisito; ?></textarea>
							</div>
						</div>	
						
						<div class="form-group">
							<label for="textareaDescricao" class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label">Benefícios</label>
							<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

								<?php 
								$pos1 = strstr($vg->beneficios_id, "1");
								$pos2 = strstr($vg->beneficios_id, "2");
								$pos3 = strstr($vg->beneficios_id, "3");
								?>

								<?php if ($pos1 == true) { ?>
								<label class="checkbox-inline">
									<input type="checkbox" id="inlineCheckbox1" value="option1" disabled checked> Transporte
								</label>
								<?php }else{ ?>	
								<label class="checkbox-inline">
									<input type="checkbox" id="inlineCheckbox1" value="option1" disabled > Transporte
								</label>
								<?php }?>

								<?php if ($pos2 == true) { ?>
								<label class="checkbox-inline">
									<input type="checkbox" id="inlineCheckbox2" value="option2" disabled checked> Alimentação
								</label>
								<?php }else{ ?>	
								<label class="checkbox-inline">
									<input type="checkbox" id="inlineCheckbox2" value="option2" disabled> Alimentação
								</label>
								<?php }?>

								<?php if ($pos3 == true) { ?>
								<label class="checkbox-inline">
									<input type="checkbox" id="inlineCheckbox3" value="option3" disabled checked> Auxilio Saúde
								</label>
								<?php }else{ ?>
								<label class="checkbox-inline">
									<input type="checkbox" id="inlineCheckbox3" value="option3" disabled> Auxilio Saúde
								</label>	
								<?php }?>

								<label class="checkbox-inline">
									Outros
									<textarea name="descricao" id="textareaDescricao" class="form-control" rows="4" required="required" disabled><?php echo $vg->outros_beneficios; ?></textarea>							
								</label>

								<?php if ($vg->remunerado) { ?>
								<label class="radio-inline col-xs-3 col-sm-3 col-md-3 col-lg-3">
									<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked disabled> Remunerado
									<input type="text" name="valor" id="inputValor" class=" form-control" value="R$ <?php echo $vg->valor_bolsa; ?>" required="required" pattern="" title="" disabled>
								</label>
								<label class="radio-inline">
									<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" disabled> Não Remunerado
								</label>
								<?php }else{ ?>
								<label class="radio-inline col-xs-3 col-sm-3 col-md-3 col-lg-3">
									<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"  disabled> Remunerado
									<input type="text" name="valor" id="inputValor" class=" form-control" value="" required="required" pattern="" title="" disabled>
								</label>
								<label class="radio-inline">
									<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" checked disabled> Não Remunerado
								</label>
								<?php } ?>	

							</div>
						</div>
						<?php } ?>
					</form>
				</div>

				

			</div>
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
				<h1>Inscritos</h1>
				
				<?php echo form_open('extvagas/aprovarAluno'); ?>
				<?php foreach ($inscritos as $inscrito) { ?>

				<div class="inscritos col-xs-8 col-sm-8 col-md-8 col-lg-8 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
					<spam class="inscritos-aprovar" align="center">
						<strong>Aprovar</strong>

						<?php if ($inscrito->selecionado) { ?>
						<div class="checkbox" >
							<label>
								<input class="big-checkbox" type="checkbox" name="selecionado" checked>
							</label>
						</div>
						<?php }else{ ?>	
						<div class="checkbox" >
							<label>
								<input class="big-checkbox" type="checkbox" name="selecionado">
							</label>
						</div>
						<?php } ?>

					</spam>
					<div class="descricao-inscrito">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<spam>Nome: </spam><?php echo $inscrito->nome; ?>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<spam>Prontuário: </spam> <?php echo $inscrito->prontuario; ?>

						</div>
					</div>
					<div class="descricao-inscrito">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<spam>Semestre:</spam> 2º Semestre
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<spam>Curso: </spam> <?php echo $inscrito->sigla; ?>
						</div>

						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" hidden>
							<input type="text" name="aluno" value="<?php echo $inscrito->alunos_id; ?>">
							<input type="text" name="vagaid" value="<?php echo $inscrito->vagas_id; ?>">
						</div>

					</div>
				</div>
				<?php } ?>

				<div class="btn-enviar col-xs-1 col-sm-1 col-md-1 col-lg-1 col-sm-offset-9 col-md-offset-9 col-lg-offset-9">
					<button type="submit" class="btn btn-success">Submit</button>	
				</div>
				
			</form>

		</div>
	</div>
</div>
</div>
</div>
</div>