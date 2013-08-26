<div class="container">
	<?php require_once('app/views/shared/_notifications.php') ?>
	<form role="form" method="POST" action="/users/authenticate">
		<div class="row login-form col-lg-4 col-lg-offset-4">
			<fieldset>
				<legend>Authenticazione</legend>
				<div class="col-lg-12">
					<div class="form-group">
						<label class="control-label">Username o Email</label>
						<input 	type="text" 
								class="form-control" 
								name="login" 
								placeholder="Username o Email" 
								value="<?= isset($login)?$login:"" ?>">
					</div>
					<div class="form-group">
						<label class="control-label">Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Accedi</button>
						<a href="/users/register" class="btn btn-success">Registrazione</a>
					</div>
				</div>
			</fieldset>
		</div>
	</form>
</div>