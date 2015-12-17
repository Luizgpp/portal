<div class="corpo">
	<div class="cadastro-vagas">
		<div class="row">
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
				<?php echo validation_errors(); ?>
                <?php echo form_open('cadadm/cadastrarAdm', 'class="form-horizontal"')  ?>
					<div class="form-group">
						<legend>Cadastrar Administrador</legend>
					</div>
					
					<div class="form-group">
						<label for="prontuario" class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label">Prontuário</label>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
							<input type="text" name="prontuario" id="prontuario" class="form-control"  required="required" data-mask="9999999">
						</div>
					</div>

					<div class="form-group">
						<label for="nome" class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label">Nome</label>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
							<input type="text" name="nome" id="nome" class="form-control"  required="required">
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label">Email</label>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
							<input type="text" name="email" id="email" class="form-control"  required="required">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-9">
							<button type="submit" class="btn btn-primary">Enviar</button>
						</div>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>

</div>