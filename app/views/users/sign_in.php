<div class="container">
	<?php require_once('app/views/shared/_notifications.php') ?>
	<form role="form" method="POST" action="/users/authenticate">
		<fieldset>
			<legend>Authenticazione</legend>
			<div class="form-group">
				<label class="col-lg-2 control-label">Username o Email</label>
				<input type="text" class="form-control" name="login" placeholder="Username o Email">
			</div>
			<div class="form-group">
				<label class="col-lg-2 control-label">Password</label>
				<input type="password" class="form-control" name="password" placeholder="Password">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-default">Accedi</button>
			</div>
		</fieldset>
	</form>
</div>