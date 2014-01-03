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
		<div class="jumbotron conainer">
			<h1><strong><span class="text-success">Great</span><span class="text-danger">Notes</span></strong></h1>
		</div>
		<div class="navbar navbar-default" role="navigation">
			<div class="container">
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
						<div class="navbar-text">Benvenuto, <strong><?= current_user()->username ?></strong></div>
						<a  class="btn btn-default btn-sm navbar-btn" href="/users/sign_out">Esci</a>
					</div>
				<? }else{ ?>
					<div class="navbar-right">
						<a class="btn btn-primary btn-sm navbar-btn" href="/users/sign_up">Registrazione</a>
						<a class="btn btn-default btn-sm navbar-btn" href="/users/sign_in">Accedi</a>
					</div>
				<? } ?>
			</div>
		</div>
		<?php
			echo $output;
		?>
		<hr>
		<footer>
			<div class="container">
				<p>
					Designed and built by <strong><span class="text-danger">Groza Sergiu</span></strong>. 
					Powered by <a href="http://getbootstrap.com/" target="_blank">Bootstrap</a>,
					<a href="http://fontawesome.io/" target="_blank">Font Awesome</a> and
					<a href="http://www.tinymce.com/" target="_blank">TinyMCE</a> open source projects.
				</p>
			</div>
		</footer>
	</body>
</html>