<?php if(!empty($_SESSION['errors'])){ ?>
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<?php 
			foreach($_SESSION['errors'] as $msg){
				echo $msg.'<br>';
			} 
		?>
	</div>
<? } ?>

<?php if(!empty($_SESSION['notice'])){ ?>
	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<?php 
			foreach($_SESSION['notice'] as $msg){
				echo $msg.'<br>';
			} 
		?>
	</div>
<? } ?>