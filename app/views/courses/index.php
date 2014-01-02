<div class="container">
	<div>
		<div class="page-header">
			<h1>Elenco Corsi</h1>
		</div>
		<?php require_once('app/views/shared/_notifications.php') ?>
		<div id="edit-course"></div>
		<?php if(user_signed_in()){ ?>
			<div class="pull-right" style="margin-bottom: 10px;">
	  			<a href="/courses/new_course" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle fa-fw"></i> Aggiungi Corso</a>
			</div>
			<div class="modal fade" id="AddCourseModal" tabindex="-1" role="dialog" aria-hidden="true">
				<form class="form-horizontal" role="form" method="POST" action="/courses/create">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Aggiungi Corso</h4>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label class="col-lg-2 control-label">Codice</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" name="code" placeholder="Codice">
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-2 control-label">Nome</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" name="name" placeholder="Nome">
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-2 control-label">Anno</label>
									<div class="col-lg-10">
										<input type="number" class="form-control" name="year" placeholder="Anno">
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		<?php } ?>
		<?php require_once("app/views/courses/_courses_list.php"); ?>
	</div>
</div>