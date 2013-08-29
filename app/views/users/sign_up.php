<div class="container">
	<?php require_once('app/views/shared/_notifications.php') ?>
	<form role="form" method="POST" action="/users/register">
		<div class="row login-form col-lg-4 col-lg-offset-4">
			<fieldset>
				<legend>Registrazione</legend>
				<div class="col-lg-12">
					<div class="form-group">
						<label class="control-label">Username</label>
						<input 	type="text" 
								class="form-control" 
								name="username" 
								placeholder="Username" 
								value="<?= isset($username)?$username:"" ?>">
					</div>
					<div class="form-group">
						<label class="control-label">Email</label>
						<input 	type="email" 
								class="form-control" 
								name="email" 
								placeholder="Email" 
								value="<?= isset($email)?$email:"" ?>">
					</div>
					<div class="form-group">
						<label class="control-label">Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<div class="form-group">
						<label class="control-label">Conferma Password</label>
						<input type="password" class="form-control" name="confirm_password" placeholder="Conferma Password">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Invia</button>
						<a href="/users/sign_in">Ho già un account</a>
					</div>
				</div>
			</fieldset>
		</div>
	</form>
</div>