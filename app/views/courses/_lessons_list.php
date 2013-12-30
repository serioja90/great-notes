<div class="pull-right" style="margin-bottom: 10px;">
	<a data-toggle="modal" href="#AddLessonModal" class="btn btn-primary">Aggiungi Lezione</a>
</div>
<div class="modal fade" id="AddLessonModal" tabindex="-1" role="dialog" aria-hidden="true">
	<form class="form-horizontal" role="form" method="POST" action="/courses/add_lesson">
		<input type="hidden" name="course_id" value="<?= $course->id ?>" />
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Aggiungi Lezione</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-1 input-group input-group-lg">
							<input id="date" type="text" name="date" class="form-control" placeholder="Data Lezione">
							<span id="calendar-button" class="input-group-addon" style="cursor: pointer;">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
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
<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>Giorno</th>
			<th>Data</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($lessons as $lesson){ ?>
			<tr>
				<td><?= date("l",strtotime($lesson->date)) ?></td>
				<td><?= $lesson->date ?></td>
			</tr>
		<? } ?>
	</tbody>
</table>
<script type="text/javascript">
	jQuery(function($){
		$(document).ready(function(){
			$('#date').datepicker({
				dateFormat: "yy-mm-dd"
			});
			$("#calendar-button").click(function(){
				$("#date").datepicker("show");
			});
		});
	});
</script>