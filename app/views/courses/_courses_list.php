<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>Codice</th>
			<th>Nome</th>
			<th>Anno</th>
			<th>Azioni</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($courses as $course){ ?>
			<tr>
				<td><?= $course->code ?></td>
				<td><?= $course->name ?></td>
				<td><?= $course->year ?></td>
				<td>
					<div class="btn-group">
						<a href="/courses/details?id=<?=$course->id ?>" class="btn btn-default">Dettagli</a>
						<?php if(user_signed_in() && current_user()->is_admin()){ ?>
							<button class="btn btn-default" onclick="editCourse(<?= $course->id ?>);return false;">
								Modifica
							</button>
							<a 	href="/courses/delete?id=<?= $course->id ?>" 
								class="btn btn-default"
								onclick="return confirm(
									'Il corso \'<?= $course->code ?>\' verrà cancellato. Procedere comunque?'
								);">
								Cancella
							</a>
						<? } ?>
					</div>
				</td>
			</tr>
		<? } ?>
	</tbody>
</table>
<?php if(user_signed_in() && current_user()->is_admin()){ ?>
<script type="text/javascript">
	function editCourse(course_id){
		$.ajax({
			type: "POST",
			data: {id: course_id},
			url: "/courses/edit",
			success: function(response){
				$("#edit-course").html(response);
			},
			error: function(){
				console.error("Something went wrong while calling '/courses/edit'.");
			}
		});
	}
</script>
<? } ?>