
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
	<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
        <?php echo validation_errors(); ?>
        <?php echo form_open('cadempresa/cadastrar') ?>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="CNPJ">CNPJ</label>
                    <input type="text" id="CNPJ" name="cnpj" class="form-control" data-mask="99.999.999/9999-99 " required>
                </div>
                <div class="form-group col-md-6">
                    <label for="razaoSoc">Razão Social</label>
                    <input type="text" id="razaoSoci" name="razaoSoci" class="form-control" required>
                </div>
                <div class="form-group col-md-8">
                    <label for="nomeFanta">Nome Fantasia</label>
                    <input type="text" id="nomeFanta" name="nomeFanta" class="form-control" required>
                </div>
                <div class="form-group col-md-8">
                    <label for="endereco">Endereço</label>
                    <input type="text" id="endereco" name="endereco" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="numero">Número</label>
                    <input type="text" id="numero" name="numero" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="bairro">Bairro</label>
                    <input type="text" id="bairro" name="bairro" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="complemento">Complemento</label>
                    <input type="text" id="complemento" name="complemento" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="estado">Estado</label>
                    <select class="form-control" id="estado" name="estado" required >
                    <option value="1">São Paulo</option></select>
                </div>
                <div class="form-group col-md-6">
                    <label for="cidade">Cidade</label>
                    <select class="form-control" id="cidade" name="cidade" required>
                    <?php foreach ($cidades AS $cidade):?>
                        <option value ="<?php echo $cidade->id; ?>">
                        <?php echo $cidade->nome; ?>
                        </option>
                    <?php endforeach; ?>
                    
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="CEP">CEP</label>
                    <input class="form-control" id="CEP" name="cep" data-mask="99999-999" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="Email">Email</label>
                    <input type="email" id="Email" name="email" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="Contato">Contato</label>
                    <input type="text" id="Contato" name="contato" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="Telefone">Telefone</label>
                    <input class="form-control" id="Telefone" name="telefone" data-mask="(99)-9999-9999" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="Senha">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="ConSenha">Confirmar Senha</label>
                    <input type="password" class="form-control" id="conSenha" name="consenha" required>
                </div>
            </div>
            <button  id="botaoenviar" type="submit" class="btn btn-success">Enviar</button>   
        <?php echo form_close(); ?>
	</div>
   
</div>
