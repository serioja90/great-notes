<!-- DOCTYPE HTML -->
<html>
	<head>
		<title>Great Notes</title>
	</head>
	<link rel="stylesheet" type="text/css" href="/app/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/app/assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="/app/assets/css/base.css">
	<script type="text/javascript" src="/app/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="/app/assets/js/bootstrap.min.js"></script>
	<style type="text/css">
	</style>
	<body>
		<div class="navbar navbar-static-top navbar-inverse">
			<div class="navbar-inner">
				<div class="container">
					<a class="navbar-brand" href="/notes/index">Great Notes</a>
					<ul class="nav navbar-nav">
						<li class="<?= (controller()=='' || controller()=='notes')?'active':'' ?>">
							<a href="/notes/index"><span class="glyphicon glyphicon-list-alt"></span> Appunti</a>
						</li>
						<li class="<?= (controller()=='courses'?'active':'') ?>" >
							<a href="/courses/index"><span class="glyphicon glyphicon-briefcase"></span> Corsi</a>
						</li>
						<?php if(user_signed_in()){ ?>
							<li class="<?= (controller()=='users'?'active':'') ?>">
								<a href="/users/profile"> <span class="glyphicon glyphicon-user"></span> Profilo</a>
							</li>
						<? } ?>
					</ul>
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Cerca">
						</div>
					</form>
					<?php if(user_signed_in()){ ?>
						<div class="pull-right" style="color: #FFF;">
							Benvenuto, <strong><?= current_user()->username ?></strong>
							<a class="btn btn-danger navbar-btn" href="/users/sign_out">Esci</a>
						</div>
					<? }else{ ?>
						<div class="pull-right">
							<a class="btn btn-default navbar-btn" href="/users/sign_up">Registrazione</a>
							<a class="btn btn-default navbar-btn" href="/users/sign_in">Entra</a>
						</div>
					<? } ?>
				</div>
			</div>
		</div>
		<?php
			echo $output;
		?>
	</body>
</html>