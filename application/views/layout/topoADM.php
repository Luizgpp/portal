<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Extensão Gerenciar Empresa</title>
	<link rel="stylesheet" type="text/css" href="<?php echo(CSS. 'bootstrap.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo(CSS. 'estilo.css') ?>">
	<link async href="http://fonts.googleapis.com/css?family=Aladin" data-generated="http://enjoycss.com" rel="stylesheet" type="text/css"/>
	<link async href="http://fonts.googleapis.com/css?family=Antic" data-generated="http://enjoycss.com" rel="stylesheet" type="text/css"/>
	
	<script src="<?php echo(JS. 'jquery-2.1.4.min.js'); ?>"></script>
	<script src="<?php echo(JS. 'bootstrap.js'); ?>"></script>
	<script src="<?php echo(JS. 'menufixedtop.js'); ?>"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row ext-topo">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<img src="<?php echo IMG. 'logoIFSP.png'  ?>">
				<spam>Portal de Estágio IFSP</spam>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<h1>Extensão</h1>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<h4><?php echo $this->session->nome; ?></h4>
				<a href="<?php echo site_url('login/logout'); ?>" type="button" data-placement="bottom" data-toggle="popover-login" data-html="true" id="btnlogin" class="btn btn-default">logout</a>
			</div>
		</div>
	</div>

	<div class="row menu">
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
			<div class="btn-group  btn-group-justified" role="group" aria-label="...">
				<div class="btn-group" role="group">
					<a href=" <?php echo site_URL('extempresa'); ?> " type="button" class="btn btn-default btn-lg">Gerenciar Empresas</a>
				</div>
				<div class="btn-group" role="group">
					<a href=" <?php echo site_URL('extvagas'); ?> " type="button" class="btn btn-default btn-lg">Gerenciar Vagas</a>
				</div>
				<div class="btn-group" role="group">
					<a href=" <?php echo site_URL('cadvaga'); ?> " type="button" class="btn btn-default btn-lg">Cadastrar Vagas</a>
				</div>
				<div class="btn-group" role="group">
					<a href=" <?php echo site_URL('cadadm'); ?> " type="button" class="btn btn-default btn-lg">Cadastrar Administrador</a>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">