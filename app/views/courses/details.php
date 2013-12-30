<div class="container">
	<div>
		<div class="page-header">
			<h1>Dettagli Corso <small><?= $course->code ?></small></h1>
		</div>
		<?php require_once('app/views/shared/_notifications.php') ?>
		<div class="well">
			<div class="row">
				<div class="col-lg-7">
					<div class="row">
						<div class="col-lg-4">
							<div class="alert alert-success text-right">Codice</div>
						</div>
						<div class="col-lg-8">
							<div class="alert alert-info"><?= $course->code ?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="alert alert-success text-right">Nome</div>
						</div>
						<div class="col-lg-8">
							<div class="alert alert-info"><?= $course->name ?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="alert alert-success text-right">Anno del Corso</div>
						</div>
						<div class="col-lg-8">
							<div class="alert alert-info"><?= $course->year ?></div>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<?php require_once("app/views/courses/_lessons_list.php"); ?>
				</div>
			</div>
		</div>
	</div>
</div>