<?php require_once('app/views/shared/_notifications.php') ?>
<?php if(isset($course)){ ?>
	<div class="modal fade" id="EditCourseModal" tabindex="-1" role="dialog" aria-hidden="true">
		<form class="form-horizontal" role="form" method="POST" action="/courses/update">
			<input type="hidden" name="id" value="<?= $course->id ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Modifica Corso</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label class="col-lg-2 control-label">Codice</label>
							<div class="col-lg-10">
								<input 	type="text" 
										class="form-control" 
										name="code" 
										placeholder="Codice" 
										value="<?= $course->code ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label">Nome</label>
							<div class="col-lg-10">
								<input 	type="text" 
										class="form-control" 
										name="name" 
										placeholder="Nome"
										value="<?= $course->name ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label">Anno</label>
							<div class="col-lg-10">
								<input 	type="number" 
										class="form-control" 
										name="year" 
										placeholder="Anno"
										value="<?= $course->year ?>">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
						<button type="submit" class="btn btn-primary">Salva</button>
					</div>
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript">
		$("#EditCourseModal").modal("show");
	</script>
<? } ?>