<!-- DOCTYPE HTML -->
<html>
	<head>
		<title>Great Notes</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<link rel="stylesheet/less" href="/app/assets/less/bootstrap.less">
		<link rel="stylesheet" type="text/css" href="/app/assets/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="/app/assets/css/jquery-ui.min.css">
		<link rel="stylesheet" type="text/css" href="/app/assets/css/base.css">
		<script type="text/javascript" src="/app/assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="/app/assets/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="/app/assets/js/less.js"></script>
		<script type="text/javascript" src="/app/assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/app/assets/js/tinymce/tinymce.min.js"></script>
	</head>
	<body>
		<div class="navbar navbar-default" role="navigation">
			<div class="container">
				<a class="navbar-brand" href="/notes/index">Great Notes</a>
				<ul class="nav navbar-nav">
					<li class="<?= (controller()=='' || controller()=='notes')?'active':'' ?>">
						<a href="/notes/index"><span class="fa fa-files-o fa-fw"></span> Appunti</a>
					</li>
					<li class="<?= (controller()=='courses'?'active':'') ?>" >
						<a href="/courses/index"><span class="fa fa-briefcase fa-fw"></span> Corsi</a>
					</li>
					<?php if(user_signed_in()){ ?>
						<li class="<?= (controller()=='users'?'active':'') ?>">
							<a href="/users/profile"> <span class="fa fa-user fa-fw"></span> Profilo</a>
						</li>
					<? } ?>
				</ul>
				<?php if(user_signed_in()){ ?>
					<div class="navbar-right">
						Benvenuto, <strong><?= current_user()->username ?></strong>
						<a  class="btn btn-danger navbar-btn" href="/users/sign_out">Esci</a>
					</div>
				<? }else{ ?>
					<div class="navbar-right">
						<a class="btn btn-success btn-sm navbar-btn" href="/users/sign_up">Registrazione</a>
						<a class="btn btn-default btn-sm navbar-btn" href="/users/sign_in">Accedi</a>
					</div>
				<? } ?>
			</div>
		</div>
		<?php
			echo $output;
		?>
		<br />
		<div class="navbar navbar-inverse container-fluid text-center">
			<p class="navbar-text">
				Developed and powered by Groza Sergiu. <?= date("Y") ?>
			</p>
		</div>
	</body>
</html>