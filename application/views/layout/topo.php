<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>

	<link rel="stylesheet" type="text/css" href="<?php echo(CSS. 'bootstrap.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo(CSS. 'estilo.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo(CSS. 'jasny-bootstrap.min.css') ?>">
	<link async href="http://fonts.googleapis.com/css?family=Aladin" data-generated="http://enjoycss.com" rel="stylesheet" type="text/css"/>
	<link async href="http://fonts.googleapis.com/css?family=Antic" data-generated="http://enjoycss.com" rel="stylesheet" type="text/css"/>
	
	<script src="<?php echo(JS. 'jquery-2.1.4.min.js'); ?>"></script>
	<script src="<?php echo(JS. 'bootstrap.js'); ?>"></script>
	<script src="<?php echo(JS. 'menufixedtop.js'); ?>"></script>
    <script src="<?php echo(JS. 'jasny-bootstrap.min.js'); ?>"></script>
	

</head>
<body>
	<div class="container-fluid topo">
		<div class="row ">
			<div class="fundo"></div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" >
				<img src="<?php echo(IMG. 'logoIFSP.png'); ?>" id="logo">
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<h1 class="neon-text">Portal de Estágios IFSP</h1>
			</div>
			<?php 
				if(!$this->session->logado){
			 ?>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<button type="button" data-placement="bottom" data-toggle="popover-login" data-html="true" id="btnlogin" class="btn btn-default">Login</button>
				<div id="popover-login" class="hide">
					<?php echo form_open('login/logar','class="form-inline"'); ?>
						<div class="form-group login">
							<input placeholder="Email" name="email" class="form-control" type="text"> 
							<input placeholder="Senha" name="senha" class="form-control" type="password">
							<button type="submit" class="btn btn-primary btn-sm">Logar-se</button>
							<a href="cadastro_usuario.php"><p> Ainda não cadastrado? Clique aqui</p></a>

                             
						</div>
					<?php echo form_close(); ?>
				</div>
			</div>
			<?php }
			else{ ?>
				
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<h4><?php echo $this->session->nome; ?></h4>
				<a href="<?php echo site_url('login/logout'); ?>" type="button" data-placement="bottom" data-toggle="popover-login" data-html="true" id="btnlogin" class="btn btn-default">logout</a>

				<?php if($this->session->tipo == 1){ ?>
				<a href="<?php echo site_url('extvagas/index'); ?>"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
				<?php  }?>
			</div>
			<?php } ?>
		</div>
	</div>