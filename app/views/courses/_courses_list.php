<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Codice</th>
			<th>Nome</th>
			<th>Anno</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($courses as $course){ ?>
			<tr>
				<td><?= $course->id ?></td>
				<td><?= $course->code ?></td>
				<td><?= $course->name ?></td>
				<td><?= $course->year ?></td>
			</tr>
		<? } ?>
	</tbody>
</table>